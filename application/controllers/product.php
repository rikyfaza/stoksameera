<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * SameeraHijabStore
 *
 * Online Store Hijab Fashion
 *
 * @author		Fazacorp Dev Team
 * @copyright	Copyright (c) 2015, FazaLab, Inc.
 * @license		currently have no license
 * @link		http://stok.sameerahijabstore.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Sameerahijabstore Product Class
 *
 * Class controller yang menangani proses transaksi dengan dengan tabel tbl_product
 *
 * @package		Application
 * @category	Controllers
 * @author		Fazacorp Dev Team
 */
 
 
class Product extends MY_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><i class="icon fa fa-ban"></i>','</div>');
	}
	
	public function index()
	{
		$page_data['content'] = 'product/list_product';
		$page_data['lang_line'] = 'system_catalog_name';
		$page_data['lang_line_small'] = 'system_catalog_name_small';
		$page_data['active_page'] = 'catalog';
		$page_data['query'] = $this->Product_model->fetch_product();
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function new_product()
	{
		$this->load->model('Product_category_model');
		$page_data['content'] = 'product/new_product';
		$page_data['lang_line'] = 'system_catalog_name';
		$page_data['lang_line_small'] = 'common_form_elements_new_product';
		$page_data['active_page'] = 'catalog';
		$page_data['list_category'] = $this->Product_category_model->fetch_product_category();
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function create_product(){
		// set validation rules for insert new product
		$this->form_validation->set_rules('prod_name', $this->lang->line('product_prod_name'), 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('prod_unit_price', $this->lang->line('product_prod_unit_price'), 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('prod_selling_price', $this->lang->line('product_prod_selling_price'), 'required|min_length[1]|max_length[255]');
		
		if ($this->form_validation->run() == FALSE){
			$this->new_product();
		}else{
			$data = array(
					'prod_name' => mysql_real_escape_string($this->input->post('prod_name')),
					'prod_description' => mysql_real_escape_string($this->input->post('prod_description')),
					'prod_color' => mysql_real_escape_string($this->input->post('prod_color')),
					'prod_size' => mysql_real_escape_string($this->input->post('prod_size')),
					'prod_unit_price' => mysql_real_escape_string($this->input->post('prod_unit_price')),
					'prod_selling_price' => mysql_real_escape_string($this->input->post('prod_selling_price')),
					'prod_category' => mysql_real_escape_string($this->input->post('prod_category')),
			);
			
			if ($this->Product_model->new_product($data)){
				if($this->input->post('returnbackto')==null){
					redirect('product/index');
				}else{
					redirect('purchase/add_product/'.$this->input->post('returnbackto'));
				}
			}else{
				// error
				// load view and flash sess error
			}
		}
	}
	
	public function update_product_view($prod_code){
		$page_data['content'] = 'product/update_product';
		$page_data['lang_line'] = 'system_catalog_name';
		$page_data['lang_line_small'] = 'system_catalog_update_small';
		$page_data['active_page'] = 'catalog';
		$this->load->model('Product_category_model');
		
		if(isset($prod_code)){
			$prod_code_use = $prod_code;
		}else{
			$prod_code_use = $this->uri->segment(3);
		}
		$page_data['list_category'] = $this->Product_category_model->fetch_product_category();
		
		$page_data['query'] = $this->Product_model->fetch_product_by_code($prod_code_use);
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function update_product(){
		
		// set validation rules for insert new product
		$this->form_validation->set_rules('prod_name', $this->lang->line('product_prod_name'), 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('prod_unit_price', $this->lang->line('product_prod_unit_price'), 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('prod_selling_price', $this->lang->line('product_prod_selling_price'), 'required|min_length[1]|max_length[255]');
		
		if ($this->form_validation->run() == FALSE){
			$this->update_product_view(mysql_real_escape_string($this->input->post('prod_code')));
		}else{
			$data = array(
					'prod_name' => mysql_real_escape_string($this->input->post('prod_name')),
					'prod_description' => mysql_real_escape_string($this->input->post('prod_description')),
					'prod_color' => mysql_real_escape_string($this->input->post('prod_color')),
					'prod_size' => mysql_real_escape_string($this->input->post('prod_size')),
					'prod_unit_price' => mysql_real_escape_string($this->input->post('prod_unit_price')),
					'prod_selling_price' => mysql_real_escape_string($this->input->post('prod_selling_price')),
					'prod_category' => mysql_real_escape_string($this->input->post('prod_category')),
					'prod_code' => mysql_real_escape_string($this->input->post('prod_code')),
			);
			
			if ($this->Product_model->update_product($data)){
				redirect('product/index');
			}else{
				// error
				// load view and flash sess error
			}
		}
	}
	
	public function delete_product(){
		$prod_code = $this->uri->segment(3);
		if ($this->Product_model->delete_product($prod_code)){
			redirect('product/index');
		}else{
		}
	}
}
// END Product class

/* End of file product.php */
/* Location: ./application/controllers/product.php */
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
 * Sameerahijabstore Purchase Class
 *
 * Class controller yang menangani proses pembelian oleh administrator pada vendor untuk sejumlah produk
 *
 * @package		Application
 * @category	Controllers
 * @author		Fazacorp Dev Team
 */
 
 
class Purchase extends MY_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Purchase_model');
		$this->load->model('Vendor_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><i class="icon fa fa-ban"></i>','</div>');
	}
	
	public function index(){
		$page_data['content'] = 'purchase/list_purchase';
		$page_data['lang_line'] = 'system_purchase_name';
		$page_data['lang_line_small'] = 'system_purchase_name_small';
		$page_data['active_page'] = 'order';
		$page_data['query'] = $this->Purchase_model->fetch_purchase_join();
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function new_purchase(){
		$page_data['content'] = 'purchase/new_purchase';
		$page_data['lang_line'] = 'system_purchase_name';
		$page_data['lang_line_small'] = 'common_form_elements_new_purchase';
		$page_data['active_page'] = 'order';
		$page_data['list_vendor'] = $this->Vendor_model->fetch_vendor();
		$num_res = (float)$this->Purchase_model->count_results(date('Y-m-d'));
		$page_data['num_res'] = $num_res+1;
		//$page_data['num_res'] = $this->Purchase_model->count_results(date('Y-m-d'));
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function fetch_product_name(){
		$data = array();
		$term = trim(strip_tags($_GET['term'])); 
		$a_json = array();
		$a_json_row = array();
		$data['searchTerm'] = $this->Purchase_model->fetch_product_name( $term );
		echo json_encode($data['searchTerm']);
	}
	
	public function create_purchase(){
		// set validation rules for insert new product
		$this->form_validation->set_rules('purchase_date', $this->lang->line('purchase_purchase_date'), 'required');
		$this->form_validation->set_rules('vendor_code', $this->lang->line('purchase_vendor_name'), 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('factur_code', $this->lang->line('purchase_invoice_num'), 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('payment_date', $this->lang->line('purchase_payment_date'), 'required');
		$this->form_validation->set_rules('freight_cost', $this->lang->line('purchase_freight_cost'), 'required|min_length[1]|max_length[255]');
		
		if ($this->form_validation->run() == FALSE){
			$this->new_purchase();
		}else{
			$data = array(
				'purchase_date'			=>	mysql_real_escape_string($this->input->post('purchase_date')),
				'vendor_code'			=>	mysql_real_escape_string($this->input->post('vendor_code')),
				'factur_code'			=>	mysql_real_escape_string($this->input->post('factur_code')),
				'payment_date'			=>	mysql_real_escape_string($this->input->post('payment_date')),
				'freight_cost'			=>	mysql_real_escape_string($this->input->post('freight_cost')),
				'total_payment_amount'	=>  mysql_real_escape_string($this->input->post('total_payment_amount')),
			);
			
			
			if ($purchase_id = $this->Purchase_model->new_purchase($data)){
				redirect('purchase/add_product/'.$purchase_id);
			}else{
				// error
				// load view and flash sess error
			}
		}
	}
	
	public function add_product($uri){
		$page_data['content'] = 'purchase/add_product';
		$page_data['lang_line'] = 'system_purchase_name';
		$page_data['lang_line_small'] = 'common_form_elements_new_product';
		$page_data['active_page'] = 'order';
		
		if(!isset($uri)){
			$uri = $this->uri->segment(3);
		} else {
			$uri = $uri;
		}
		
		$page_data['query'] = $this->Purchase_model->fetch_purchase_join_by_purchase_id($uri);
		$page_data['queryproduct'] = $this->Purchase_model->fetch_purchased_product($uri);
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function add_product_to_purchase(){
		$this->form_validation->set_rules('product_name', $this->lang->line('product_prod_name'), 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('product_qty', $this->lang->line('common_form_element_product_qty'), 'required|min_length[1]|max_length[255]|numeric');
		$this->form_validation->set_rules('product_price', $this->lang->line('form_label_unit_price'), 'required|min_length[1]|max_length[255]|numeric');
		$this->form_validation->set_rules('product_discount', $this->lang->line('common_form_element_product_dsc'), 'min_length[1]|max_length[255]|numeric');
		
		if ($this->form_validation->run() == FALSE){
			$this->add_product($this->input->post('purchase_id'));
		}else{
			$data = array(
				'purchase_id'	=> mysql_real_escape_string($this->input->post('purchase_id')),
				'prod_code'		=> mysql_real_escape_string($this->input->post('product_code')),
				'quantity'		=> mysql_real_escape_string($this->input->post('product_qty')),
				'unit_price'	=> mysql_real_escape_string($this->input->post('product_price')),
				'discount'		=> mysql_real_escape_string($this->input->post('product_discount')),
			);
			
			if ($this->Purchase_model->add_product_to_purchase($data)){
				
				/* action for logging transaction */
				$this->load->model('Log_model');
				if ($log_id = $this->Log_model->create_log(date('y-m-d'), $this->input->post('product_code'), $this->input->post('product_qty'), 'Purchases to vendor')){
					$query = 'UPDATE `tbl_purchase_detail` SET `log_id` = ? WHERE `purchase_id` = ? AND `prod_code` = ?';
					$this->db->query($query, array($log_id, $this->input->post('purchase_id'), $this->input->post('product_code') ));
				}
				/* end of logging transaction*/
				
				redirect('purchase/add_product/'.$this->input->post('purchase_id'));
			}else{
				// error
				// load view and flash sess error
			}
		}
	}
		
	public function delete_selected_product(){
		$prod_code = $this->uri->segment(3);
		$purchase_id = $this->uri->segment(4);
		if ($this->Purchase_model->delete_selected_product($prod_code, $purchase_id)){
			redirect('purchase/add_product/'.$purchase_id);
		}else{
		}
	}
	
	public function update_purchase_view($purchase_id){
		$page_data['content'] = 'purchase/update_purchase';
		$page_data['lang_line'] = 'system_purchase_name';
		$page_data['lang_line_small'] = 'system_purchase_update_small';
		$page_data['active_page'] = 'order';
		$this->load->model('Product_category_model');
		
		if(isset($purchase_id)){
			$purchase_id_use = $purchase_id;
		}else{
			$purchase_id_use = $this->uri->segment(3);
		}
		
		$page_data['list_vendor'] = $this->Vendor_model->fetch_vendor();
		$page_data['query'] = $this->Purchase_model->fetch_purchase_by_id($purchase_id);
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function update_purchase(){
		// set validation rules for insert new product
		$this->form_validation->set_rules('purchase_date', $this->lang->line('purchase_purchase_date'), 'required');
		$this->form_validation->set_rules('vendor_code', $this->lang->line('purchase_vendor_name'), 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('factur_code', $this->lang->line('purchase_invoice_num'), 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('payment_date', $this->lang->line('purchase_payment_date'), 'required');
		$this->form_validation->set_rules('freight_cost', $this->lang->line('purchase_freight_cost'), 'required|min_length[1]|max_length[255]');
		
		if ($this->form_validation->run() == FALSE){
			$this->update_purchase_view($this->input->post('purchase_id'));
		}else{
			$data = array(
				'purchase_date'	=> mysql_real_escape_string($this->input->post('purchase_date')),
				'vendor_code'		=> mysql_real_escape_string($this->input->post('vendor_code')),
				'factur_code'		=> mysql_real_escape_string($this->input->post('factur_code')),
				'payment_date'	=> mysql_real_escape_string($this->input->post('payment_date')),
				'freight_cost'	=> mysql_real_escape_string($this->input->post('freight_cost')),
				'purchase_id'		=> mysql_real_escape_string($this->input->post('purchase_id')),
			);
			
			if ($this->Purchase_model->update_purchase($data)){
				redirect('purchase/index');
			}else{
				// error
				// load view and flash sess error
			}
		}
	}
	
	public function delete_purchase(){
		$purchase_id = $this->uri->segment(3);
		if ($this->Purchase_model->delete_purchase($purchase_id)){
			redirect('purchase/index');
		}else{
		}
	}
	
	public function list_purchase(){
		$page_data['content'] = 'purchase/view_purchase';
		$page_data['lang_line'] = 'system_purchase_name';
		$page_data['lang_line_small'] = 'system_purchase_name_small';
		$page_data['active_page'] = 'order';
		$page_data['queryheader'] = $this->Purchase_model->fetch_purchase_join_by_purchase_id($this->uri->segment(3));
		$page_data['queryproduct'] = $this->Purchase_model->fetch_purchased_product($this->uri->segment(3));
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
}
// END Purchase class

/* End of file purchase.php */
/* Location: ./application/controllers/purchase.php */
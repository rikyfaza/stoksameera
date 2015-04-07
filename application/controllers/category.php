<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category extends MY_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Product_category_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><i class="icon fa fa-ban"></i>','</div>');
	}
	
	public function index(){
		$page_data['content'] = 'prod_category/list_category';
		$page_data['lang_line'] = 'system_prod_category_name';
		$page_data['lang_line_small'] = 'system_prod_category_name_small';
		$page_data['active_page'] = 'catalog';
		$page_data['query'] = $this->Product_category_model->fetch_product_category();
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function new_product_category(){
		$page_data['content'] = 'prod_category/new_product_category';
		$page_data['lang_line'] = 'system_prod_category_name';
		$page_data['lang_line_small'] = 'common_form_elements_new_category';
		$page_data['active_page'] = 'catalog';
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function create_product_category(){
		$this->form_validation->set_rules('prod_cat_name', $this->lang->line('product_prod__cat_name'), 'required|min_length[1]|max_length[255]');
		
		if ($this->form_validation->run() == FALSE){
			$this->new_product_category();
		}else{
			$data = array(
				'prod_cat_name' => mysql_real_escape_string($this->input->post('prod_cat_name')),
				'prod_cat_desc' => mysql_real_escape_string($this->input->post('prod_cat_desc')),
			);
			
			if ($this->Product_category_model->new_product_category($data)){
				redirect('category/index');
			}else{
				// error
				// load view and flash sess error
			}
		}
	}
	
	public function delete_product_category(){
	
	}
	
	public function update_product_category_view($prod_category){
		$page_data['content'] = 'prod_category/update_product_category';
		$page_data['lang_line'] = 'system_prod_category_name';
		$page_data['lang_line_small'] = 'system_prod_category_update_small';
		$page_data['active_page'] = 'catalog';
		
		if(isset($prod_category)){
			$prod_category_use = $prod_category;
		}else{
			$prod_category_use = $this->uri->segment(3);
		}
		
		$page_data['query'] = $this->Product_category_model->fetch_product_category_by_code($prod_category_use);
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function update_product_category(){
		$this->form_validation->set_rules('prod_cat_name', $this->lang->line('product_prod__cat_name'), 'required|min_length[1]|max_length[255]');
		
		if ($this->form_validation->run() == FALSE){
			$this->update_product_category_view(mysql_real_escape_string($this->input->post('prod_category')));
		}else{
			$data = array(
				'prod_cat_name' => mysql_real_escape_string($this->input->post('prod_cat_name')),
				'prod_cat_desc' => mysql_real_escape_string($this->input->post('prod_cat_desc')),
				'prod_category' => mysql_real_escape_string($this->input->post('prod_category')),
			);
			
			if ($this->Product_category_model->update_product_category($data)){
				redirect('category/index');
			}else{
				// error
				// load view and flash sess error
			}
		}
	}
}

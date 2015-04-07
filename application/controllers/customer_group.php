<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_group extends MY_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Customer_group_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><i class="icon fa fa-ban"></i>','</div>');
	}
	
	public function index()
	{
		$page_data['content'] = 'customer_group/list_cust_group';
		$page_data['lang_line'] = 'system_cust_group_name';
		$page_data['lang_line_small'] = 'system_cust_group_name_small';
		$page_data['active_page'] = 'customers';
		$page_data['query'] = $this->Customer_group_model->fetch_cust_group();
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function new_cust_group()
	{
		$page_data['content'] = 'customer_group/new_cust_group';
		$page_data['lang_line'] = 'system_cust_group_name';
		$page_data['lang_line_small'] = 'common_form_elements_new_cust_group';
		$page_data['active_page'] = 'customers';
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function create_cust_group(){
		// set validation rules for insert new customer group
		$this->form_validation->set_rules('cust_group_name', $this->lang->line('cust_group_name'), 'required|min_length[1]|max_length[255]');
		
		if ($this->form_validation->run() == FALSE){
			$this->new_cust_group();
		}else{
			$data = array(
					'cust_group_name' => mysql_real_escape_string($this->input->post('cust_group_name')),
					'cust_group_desc' => mysql_real_escape_string($this->input->post('cust_group_desc')),
			);
			
			if ($this->Customer_group_model->new_cust_group($data)){
				redirect('customer_group/index');
			}else{
				// error
				// load view and flash sess error
			}
		}
	}
	
	public function update_cust_group_view($cust_group){
		$page_data['content'] = 'customer_group/update_cust_group';
		$page_data['lang_line'] = 'system_cust_group_name';
		$page_data['lang_line_small'] = 'system_cust_group_update_small';
		$page_data['active_page'] = 'customers';
				
		if(isset($cust_group)){
			$cust_group_use = $cust_group;
		}else{
			$cust_group_use = $this->uri->segment(3);
		}
				
		$page_data['query'] = $this->Customer_group_model->fetch_cust_group_by_code($cust_group);
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function update_cust_group(){
		// set validation rules for update customer group
		$this->form_validation->set_rules('cust_group_name', $this->lang->line('cust_group_name'), 'required|min_length[1]|max_length[255]');
		
		if ($this->form_validation->run() == FALSE){
			$this->update_cust_group_view(mysql_real_escape_string($this->input->post('cust_group')));
		}else{
			$data = array(
					'cust_group_name' 	=> mysql_real_escape_string($this->input->post('cust_group_name')),
					'cust_group_desc' 	=> mysql_real_escape_string($this->input->post('cust_group_desc')),
					'cust_group' 		=> mysql_real_escape_string($this->input->post('cust_group')),
			);
			
			if ($this->Customer_group_model->update_cust_group($data)){
				redirect('customer_group/index');
			}else{
				// error
				// load view and flash sess error
			}
		}
	}
	
	public function delete_cust_group(){
		$cust_group = $this->uri->segment(3);
		if ($this->Customer_group_model->delete_cust_group($cust_group)){
			redirect('customer_group/index');
		}else{
		}
	}
}

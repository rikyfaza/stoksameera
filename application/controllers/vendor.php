<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Vendor extends MY_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Vendor_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><i class="icon fa fa-ban"></i>','</div>');
	}
	
	public function index()
	{
		$page_data['content'] = 'vendor/list_vendor';
		$page_data['lang_line'] = 'system_vendor_name';
		$page_data['lang_line_small'] = 'system_vendor_name_small';
		$page_data['active_page'] = 'catalog';
		$page_data['query'] = $this->Vendor_model->fetch_vendor();
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function new_vendor()
	{
		$page_data['content'] = 'vendor/new_vendor';
		$page_data['lang_line'] = 'system_vendor_name';
		$page_data['lang_line_small'] = 'system_vendor_name_small';
		$page_data['active_page'] = 'catalog';
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function create_vendor(){
		// set validation rules for insert new product
		$this->form_validation->set_rules('vendor_name', $this->lang->line('vendor_ven_name'), 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('vendor_mobile_phone', $this->lang->line('vendor_ven_mobile_phone'), 'required|min_length[1]|max_length[255]|numeric');
		$this->form_validation->set_rules('vendor_address1', $this->lang->line('vendor_ven_address1'), 'required|min_length[1]|max_length[255]');
		
		if ($this->form_validation->run() == FALSE){
			$this->new_vendor();
		}else{
			$data = array(
					'vendor_name' => mysql_real_escape_string($this->input->post('vendor_name')),
					'vendor_office_phone' => mysql_real_escape_string($this->input->post('vendor_office_phone')),
					'vendor_mobile_phone' => mysql_real_escape_string($this->input->post('vendor_mobile_phone')),
					'vendor_email' => mysql_real_escape_string($this->input->post('vendor_email')),
					'vendor_address1' => mysql_real_escape_string($this->input->post('vendor_address1')),
					'vendor_address2' => mysql_real_escape_string($this->input->post('vendor_address2')),
					'vendor_postal_code' => mysql_real_escape_string($this->input->post('vendor_postal_code')),
					'vendor_city' => mysql_real_escape_string($this->input->post('vendor_city')),
					'vendor_province' => mysql_real_escape_string($this->input->post('vendor_province')),
					'vendor_country' => mysql_real_escape_string($this->input->post('vendor_country')),
			);
			
			if ($this->Vendor_model->new_vendor($data)){
				redirect('vendor/index');
			}else{
				// error
				// load view and flash sess error
			}
		}
	}
	
	public function update_vendor_view($vendor_code){
		$page_data['content'] = 'vendor/update_vendor';
		$page_data['lang_line'] = 'system_vendor_name';
		$page_data['lang_line_small'] = 'system_vendor_name_small';
		$page_data['active_page'] = 'catalog';
		
		if(isset($vendor_code)){
			$vendor_code_use = $vendor_code;
		}else{
			$vendor_code_use = $this->uri->segment(3);
		}
		
		$page_data['query'] = $this->Vendor_model->fetch_vendor_by_code($vendor_code);
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function update_vendor(){
		// set validation rules for insert new product
		$this->form_validation->set_rules('vendor_name', $this->lang->line('vendor_ven_name'), 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('vendor_mobile_phone', $this->lang->line('vendor_ven_mobile_phone'), 'required|min_length[1]|max_length[255]|numeric');
		$this->form_validation->set_rules('vendor_address1', $this->lang->line('vendor_ven_address1'), 'required|min_length[1]|max_length[255]');
		
		if ($this->form_validation->run() == FALSE){
			$this->update_product_view(mysql_real_escape_string($this->input->post('vendor_code')));
		}else{
			$data = array(
					'vendor_name' => mysql_real_escape_string($this->input->post('vendor_name')),
					'vendor_office_phone' => mysql_real_escape_string($this->input->post('vendor_office_phone')),
					'vendor_mobile_phone' => mysql_real_escape_string($this->input->post('vendor_mobile_phone')),
					'vendor_email' => mysql_real_escape_string($this->input->post('vendor_email')),
					'vendor_address1' => mysql_real_escape_string($this->input->post('vendor_address1')),
					'vendor_address2' => mysql_real_escape_string($this->input->post('vendor_address2')),
					'vendor_postal_code' => mysql_real_escape_string($this->input->post('vendor_postal_code')),
					'vendor_city' => mysql_real_escape_string($this->input->post('vendor_city')),
					'vendor_province' => mysql_real_escape_string($this->input->post('vendor_province')),
					'vendor_country' => mysql_real_escape_string($this->input->post('vendor_country')),
					'vendor_code' => mysql_real_escape_string($this->input->post('vendor_code')),
			);
			
			if ($this->Vendor_model->update_vendor($data)){
				redirect('vendor/index');
			}else{
				// error
				// load view and flash sess error
			}
		}
	}
	
	public function delete_vendor(){
		$vendor_code = $this->uri->segment(3);
		if ($this->Vendor_model->delete_vendor($vendor_code)){
			redirect('vendor/index');
		}else{
		}
	}
}

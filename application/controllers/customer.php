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
 * Sameerahijabstore Customer Class
 *
 * Class controller yang menangani proses transaksi dengan dengan tabel tbl_Customer
 *
 * @package		Application
 * @category	Controllers
 * @author		Fazacorp Dev Team
 */
 

class Customer extends MY_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Customer_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><i class="icon fa fa-ban"></i>','</div>');
	}
	
	public function index()
	{
		$page_data['content'] = 'customer/list_customer';
		$page_data['lang_line'] = 'system_cust_name';
		$page_data['lang_line_small'] = 'system_cust_name_small';
		$page_data['active_page'] = 'customers';
		$page_data['query'] = $this->Customer_model->fetch_customer();
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function new_customer()
	{
		$this->load->model('Customer_group_model');
		$page_data['content'] = 'customer/new_customer';
		$page_data['lang_line'] = 'system_cust_name';
		$page_data['lang_line_small'] = 'common_form_elements_new_cust';
		$page_data['active_page'] = 'customers';
		$page_data['list_group'] = $this->Customer_group_model->fetch_cust_group();
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function create_customer(){
		// set validation rules for insert new customer
		$this->form_validation->set_rules('cust_name', $this->lang->line('customer_cust_name'), 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('cust_mobile_phone', $this->lang->line('customer_cust_mobile_phone'), 'required|min_length[1]|max_length[255]|numeric');
		$this->form_validation->set_rules('cust_postal_code', $this->lang->line('customer_cust_postal_code'), 'min_length[1]|max_length[5]|numeric');
		
		if ($this->form_validation->run() == FALSE){
			$this->new_customer();
		}else{
			$data = array(
					'cust_name' => mysql_real_escape_string($this->input->post('cust_name')),
					'cust_home_phone' => mysql_real_escape_string($this->input->post('cust_home_phone')),
					'cust_mobile_phone' => mysql_real_escape_string($this->input->post('cust_mobile_phone')),
					'cust_email' => mysql_real_escape_string($this->input->post('cust_email')),
					'cust_address1' => mysql_real_escape_string($this->input->post('cust_address1')),
					'cust_address2' => mysql_real_escape_string($this->input->post('cust_address2')),
					'cust_postal_code' => mysql_real_escape_string($this->input->post('cust_postal_code')),
					'cust_city' => mysql_real_escape_string($this->input->post('cust_city')),
					'cust_province' => mysql_real_escape_string($this->input->post('cust_province')),
					'cust_country' => mysql_real_escape_string($this->input->post('cust_country')),
					'cust_group' => mysql_real_escape_string($this->input->post('cust_group')),
			);
			
			if ($this->Customer_model->new_customer($data)){
				redirect('customer/index');
			}else{
				// error
				// load view and flash sess error
			}
		}
	}
	
	public function update_customer_view($cust_id){
		$page_data['content'] = 'customer/update_customer';
		$page_data['lang_line'] = 'system_cust_name';
		$page_data['lang_line_small'] = 'system_cust_name_small';
		$page_data['active_page'] = 'customers';
		$this->load->model('Customer_group_model');
		
		if(isset($cust_id)){
			$cust_id_use = $cust_id;
		}else{
			$cust_id_use = $this->uri->segment(3);
		}
		$page_data['list_group'] = $this->Customer_group_model->fetch_cust_group();
		
		$page_data['query'] = $this->Customer_model->fetch_customer_by_id($cust_id);
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function update_customer(){
		
		// set validation rules for insert update customer
		$this->form_validation->set_rules('cust_name', $this->lang->line('customer_cust_name'), 'required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('cust_mobile_phone', $this->lang->line('customer_cust_mobile_phone'), 'required|min_length[1]|max_length[255]|numeric');
		$this->form_validation->set_rules('cust_postal_code', $this->lang->line('customer_cust_postal_code'), 'min_length[1]|max_length[5]|numeric');
		
		if ($this->form_validation->run() == FALSE){
			$this->update_customer_view(mysql_real_escape_string($this->input->post('cust_id')));
		}else{
			$data = array(
					'cust_name' => mysql_real_escape_string($this->input->post('cust_name')),
					'cust_home_phone' => mysql_real_escape_string($this->input->post('cust_home_phone')),
					'cust_mobile_phone' => mysql_real_escape_string($this->input->post('cust_mobile_phone')),
					'cust_email' => mysql_real_escape_string($this->input->post('cust_email')),
					'cust_address1' => mysql_real_escape_string($this->input->post('cust_address1')),
					'cust_address2' => mysql_real_escape_string($this->input->post('cust_address2')),
					'cust_postal_code' => mysql_real_escape_string($this->input->post('cust_postal_code')),
					'cust_city' => mysql_real_escape_string($this->input->post('cust_city')),
					'cust_province' => mysql_real_escape_string($this->input->post('cust_province')),
					'cust_country' => mysql_real_escape_string($this->input->post('cust_country')),
					'cust_group' => mysql_real_escape_string($this->input->post('cust_group')),
					'cust_id' => mysql_real_escape_string($this->input->post('cust_id')),
			);
			
			if ($this->Customer_model->update_customer($data)){
				redirect('customer/index');
			}else{
				// error
				// load view and flash sess error
			}
		}
	}
	
	public function delete_customer(){
		$cust_id = $this->uri->segment(3);
		if ($this->Customer_model->delete_customer($cust_id)){
			redirect('customer/index');
		}else{
		}
	}
}
// END Customer class

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */
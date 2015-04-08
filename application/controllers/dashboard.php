<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
// this is dashboard
class Dashboard extends MY_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}
	
	public function index() 
	{
		$page_data['content'] = 'dashboard/index';
		$page_data['lang_line'] = 'system_dashboard_name';
		$page_data['lang_line_small'] = 'system_dashboard_name_small';
		$page_data['active_page'] = 'dashboard';
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}

	public function pagenotfound() 
	{	
		$page_data['content'] = 'common/404';
		$page_data['lang_line'] = 'system_404';
		$page_data['lang_line_small'] = 'system_404_small';
		$page_data['active_page'] = 'dashboard';
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}

}


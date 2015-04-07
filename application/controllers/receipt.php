<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * SameeraHijabStore
 *
 * Online Store Hijab Fashion
 *
 * @author			Fazacorp Dev Team
 * @copyright		Copyright (c) 2015, FazaLab, Inc.
 * @license			currently have no license
 * @link				http://stok.sameerahijabstore.com
 * @since				Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Sameerahijabstore Receipt Class
 *
 * Class controller yang menangani proses penerimaan produk yang di pesan pada vendor
 *
 * @package		Application
 * @category	Controllers
 * @author		Fazacorp Dev Team
 */
 
 
class Receipt extends MY_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Receipt_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><i class="icon fa fa-ban"></i>','</div>');
	}
	
	public function index(){
		$page_data['content'] = 'receipt/order_list';
		$page_data['lang_line'] = 'system_receipt_name';
		$page_data['lang_line_small'] = 'system_receipt_name_small';
		$page_data['active_page'] = 'order';
		$page_data['query'] = $this->Receipt_model->fetch_order_list();
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function order_detail(){
		$page_data['content'] = 'receipt/order_detail';
		$page_data['lang_line'] = 'system_receipt_detail_name';
		$page_data['lang_line_small'] = 'system_receipt_name_small';
		$page_data['active_page'] = 'order';
		$purchase_id = $this->uri->segment(3);
		$page_data['query'] = $this->Receipt_model->order_detail($purchase_id);
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function history_index(){
		$page_data['content'] = 'receipt/history_order_list';
		$page_data['lang_line'] = 'system_receipt_name_history';
		$page_data['lang_line_small'] = 'system_receipt_name_small';
		$page_data['active_page'] = 'order';
		$page_data['query'] = $this->Receipt_model->history_fetch_order_list();
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function history_order_detail(){
		$page_data['content'] = 'receipt/history_order_detail';
		$page_data['lang_line'] = 'system_receipt_detail_name';
		$page_data['lang_line_small'] = 'system_receipt_name_small';
		$page_data['active_page'] = 'order';
		$purchase_id = $this->uri->segment(3);
		$page_data['query'] = $this->Receipt_model->history_order_detail($purchase_id);
		
		$this->load->view('common/header');
		$this->load->view('common/main_header');
		$this->load->view('common/sidebar', $page_data);
		$this->load->view('common/content', $page_data);
		$this->load->view('common/footer');
	}
	
	public function save_received(){
		$count = count($this->input->post('prod_code'));
		$purchase_id = $this->input->post('purchase_id');
		$prod_code_arr = $this->input->post('prod_code');
		$quantity_received_arr = $this->input->post('quantity_received');
		
		for($i = 0; $i < $count; $i++){
			$this->Receipt_model->save_received($quantity_received_arr[$i], $prod_code_arr[$i], $purchase_id);
		}
		redirect('/receipt/index');
	}
}
// END Receipt class

/* End of file receipt.php */
/* Location: ./application/controllers/receipt.php */
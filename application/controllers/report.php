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
 * Sameerahijabstore Report Class
 *
 * Class controller yang menangani proses pembuatan semua jenis report
 *
 * @package		Application
 * @category	Controllers
 * @author		Fazacorp Dev Team
 */
 
 
class Report extends MY_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><i class="icon fa fa-ban"></i>','</div>');
	}
	
	public function inventory_list_view(){
	
	}
	
	public function active_inventory_view(){
	
	}
	
	public function out_of_stock_view(){
	
	}
	
	public function vendor_list_view(){
	
	}
}
// END Report class

/* End of file report.php */
/* Location: ./application/controllers/report.php */
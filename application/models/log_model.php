<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
 * Sameerahijabstore Log_model Class
 *
 * Class yang menangani proses logging semua transaksi
 *
 * @package		Models
 * @category	Models
 * @author		Fazacorp Dev Team
 */
 
 
class Log_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function create_log($log_date, $log_prod_code, $log_amount, $log_story){
		do 
		{
			$log_id = rand(11111111,99999999);;
			$this->db->where('log_id = ', $log_id);
			$this->db->from('tbl_log_trans');
			$num = $this->db->count_all_results();	
		} while ($num >= 1);
		
		$log_data = array(
			'log_id'			  =>	$log_id,
			'log_date'			=>	$log_date,
			'log_prod_code'	=>	$log_prod_code,
			'log_amount'		=>	$log_amount,
			'log_story'			=>	$log_story,
		);
		
		// save to tbl_log_trans
		if ($this->db->insert('tbl_log_trans', $log_data)){
			return $log_id;
		}else{
			return false;
		}
	}
}
// END Purchase_model class

/* End of file Log_model.php */
/* Location: ./application/models/Log_model.php */
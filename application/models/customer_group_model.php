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
 * Sameerahijabstore Customer_group_model Class
 *
 * Class yang menangani proses transaksi dengan dengan tabel tbl_Customer_Group
 *
 * @package		Application
 * @category	Models
 * @author		Fazacorp Dev Team
 */
 
 
class Customer_group_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function fetch_cust_group(){
		// fetch all data cust group
		$query = "SELECT * FROM `tbl_cust_group` ";
		return $result = $this->db->query($query);
	}
	
	function fetch_cust_group_by_code($cust_group){
		// fetch data cust group by code
		$query = "SELECT * FROM `tbl_cust_group` WHERE `cust_group` = ? LIMIT 1";
		return $result = $this->db->query($query, array($cust_group));
	}
	
	function new_cust_group($data){
		// get random and unique cust group code
		do 
		{
			$cust_group = rand(11111111,99999999);;
			$this->db->where('cust_group = ', $cust_group);
			$this->db->from('tbl_cust_group');
			$num = $this->db->count_all_results();	
		} while ($num >= 1);
		
		// get data from array $data
		$cust_group_data = array(
			'cust_group'		=>	$cust_group,
			'cust_group_name'	=>	$data['cust_group_name'],
			'cust_group_desc'	=>	$data['cust_group_desc'],
		);
		
		// save to tbl_product
		if ($this->db->insert('tbl_cust_group', $cust_group_data)){
			return true;
		}else{
			return false;
		}
	}
	
	function update_cust_group($data){
		// query update tbl_cust_group
		$query = "UPDATE `tbl_cust_group` SET `cust_group_name` = ?, `cust_group_desc` = ? WHERE `cust_group` = ? ";
		
		// execute query and get parameters
		if ( $this->db->query($query, array( $data['cust_group_name'], $data['cust_group_desc'], $data['cust_group'] ))){
			return true;
		}else{
			return false;
		}
	}
	
	function delete_cust_group($cust_group){
		// delete data product by code
		$query = "DELETE FROM `tbl_cust_group` WHERE `cust_group` = ? ";
		if ( $this->db->query($query , array($cust_group)) ){
			return true;
		}else{
			return false;
		}
	}

}
// END Customer_group_model class

/* End of file Customer_group_model.php */
/* Location: ./application/models/Customer_group_model.php */
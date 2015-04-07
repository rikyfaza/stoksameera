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
 * Sameerahijabstore Customer_model Class
 *
 * Class yang menangani proses transaksi dengan dengan tabel tbl_Customer
 *
 * @package		Application
 * @category	Models
 * @author		Fazacorp Dev Team
 */
 
class Customer_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function fetch_customer(){
		// fetch all data customer
		$query = "SELECT * FROM `tbl_customer` ";
		return $result = $this->db->query($query);
	}
	
	function fetch_customer_by_id($cust_id){
		// fetch data customer by id
		$query = "SELECT * FROM `tbl_customer` WHERE `cust_id` = ? LIMIT 1";
		return $result = $this->db->query($query, array($cust_id));
	}
			
	function new_customer($data){
		// get random and unique customer id
		do 
		{
			$cust_id = rand(11111111,99999999);;
			$this->db->where('cust_id = ', $cust_id);
			$this->db->from('tbl_customer');
			$num = $this->db->count_all_results();	
		} while ($num >= 1);
		
		// get data from array $data
		$customer_data = array(
			'cust_id' 			=> $cust_id,
			'cust_name'			=>	$data['cust_name'],
			'cust_home_phone'	=>	$data['cust_home_phone'],
			'cust_mobile_phone'	=>	$data['cust_mobile_phone'],
			'cust_email'		=>	$data['cust_email'],
			'cust_address1'		=>	$data['cust_address1'],
			'cust_address2'		=>	$data['cust_address2'],
			'cust_postal_code'	=>	$data['cust_postal_code'],
			'cust_city'			=>	$data['cust_city'],
			'cust_province'		=>	$data['cust_province'],
			'cust_country'		=>	$data['cust_country'],
			'cust_group'		=>	$data['cust_group'],
		);
		
		// save to tbl_customer
		if ($this->db->insert('tbl_customer', $customer_data)){
			return true;
		}else{
			return false;
		}
	}
	
	function update_customer($data){
		// query update tbl_customer
		$query = "UPDATE `tbl_customer` SET `cust_name` = ?, `cust_home_phone` = ?, `cust_mobile_phone` = ?, `cust_email` = ?, `cust_address1` = ?, `cust_address2` = ?, `cust_postal_code` = ?, `cust_city` = ?, `cust_province` = ?, `cust_country` = ?, `cust_group` = ? WHERE `cust_id` = ? ";
		
		// execute query and get parameters
		if ( $this->db->query($query, array( $data['cust_name'], $data['cust_home_phone'], $data['cust_mobile_phone'], $data['cust_email'], $data['cust_address1'], $data['cust_address2'], $data['cust_postal_code'], $data['cust_city'], $data['cust_province'], $data['cust_country'], $data['cust_group'], $data['cust_id'] ))){
			return true;
		}else{
			return false;
		}
	}
	
	function delete_customer($cust_id){
		// delete data customer by id
		$query = "DELETE FROM `tbl_customer` WHERE `cust_id` = ? ";
		if ( $this->db->query($query , array($cust_id)) ){
			return true;
		}else{
			return false;
		}
	}

}
// END Customer_model class

/* End of file customer_model.php */
/* Location: ./application/models/customer_model.php */
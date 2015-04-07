<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function fetch_vendor(){
		// fetch all data product
		$query = "SELECT * FROM `tbl_vendor` ";
		return $result = $this->db->query($query);
	}
	
	function fetch_vendor_by_code($vendor_code){
		// fetch data product by code
		$query = "SELECT * FROM `tbl_vendor` WHERE `vendor_code` = ? LIMIT 1";
		return $result = $this->db->query($query, array($vendor_code));
	}
	
	function new_vendor($data){
		// get random and unique product code
		do 
		{
			$vendor_code = rand(11111111,99999999);;
			$this->db->where('vendor_code = ', $vendor_code);
			$this->db->from('tbl_vendor');
			$num = $this->db->count_all_results();	
		} while ($num >= 1);
		
		// get data from array $data
		$vendor_data = array(
			'vendor_code'			=>	$vendor_code,
			'vendor_name'			=>	$data['vendor_name'],
			'vendor_office_phone'	=>	$data['vendor_office_phone'],
			'vendor_mobile_phone'	=>	$data['vendor_mobile_phone'],
			'vendor_email'			=>	$data['vendor_email'],
			'vendor_address1'		=>	$data['vendor_address1'],
			'vendor_address2'		=>	$data['vendor_address2'],
			'vendor_postal_code'	=>	$data['vendor_postal_code'],
			'vendor_city'			=>	$data['vendor_city'],
			'vendor_province'		=>	$data['vendor_province'],
			'vendor_country'		=>	$data['vendor_country'],
		);
		
		// save to tbl_product
		if ($this->db->insert('tbl_vendor', $vendor_data)){
			return true;
		}else{
			return false;
		}
	}
	
	function update_vendor($data){
		// query update tbl_product
		$query = "UPDATE `tbl_vendor` SET `vendor_name` = ?, `vendor_office_phone` = ?, `vendor_mobile_phone` = ?, `vendor_email` = ?, `vendor_address1` = ?, `vendor_address2` = ?, `vendor_postal_code` = ?, `vendor_city` = ?, `vendor_province` = ? , `vendor_country` = ? WHERE `vendor_code` = ? ";
		
		// execute query and get parameters
		if ( $this->db->query($query, array( $data['vendor_name'], $data['vendor_office_phone'], $data['vendor_mobile_phone'], $data['vendor_email'], $data['vendor_address1'], $data['vendor_address2'], $data['vendor_postal_code'], $data['vendor_city'], $data['vendor_province'], $data['vendor_country'], $data['vendor_code'] ))){
			return true;
		}else{
			return false;
		}
	}
	
	function delete_vendor($vendor_code){
		// delete data product by code
		$query = "DELETE FROM `tbl_vendor` WHERE `vendor_code` = ? ";
		if ( $this->db->query($query , array($vendor_code)) ){
			return true;
		}else{
			return false;
		}
	}
	
	
}
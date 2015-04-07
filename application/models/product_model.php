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
 * Sameerahijabstore Product_model Class
 *
 * Class yang menangani proses transaksi dengan dengan tabel tbl_Product
 *
 * @package		Application
 * @category	Models
 * @author		Fazacorp Dev Team
 */
 
 
class Product_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function fetch_product(){
		// fetch all data product
		$query = "SELECT * FROM `tbl_product` ";
		return $result = $this->db->query($query);
	}
	
	function fetch_product_by_code($prod_code){
		// fetch data product by code
		$query = "SELECT * FROM `tbl_product` WHERE `prod_code` = ? LIMIT 1";
		return $result = $this->db->query($query, array($prod_code));
	}
	
	function fetch_product_by_name($prod_name){
		// fetch data product by name
		$query = "SELECT * FROM `tbl_product` WHERE `prod_name` like '?%' ";
		return $result = $this->db->query($query, array($prod_name));
	}
	
	function new_product($data){
		// get random and unique product code
		do 
		{
			$prod_code = rand(11111111,99999999);;
			$this->db->where('prod_code = ', $prod_code);
			$this->db->from('tbl_product');
			$num = $this->db->count_all_results();	
		} while ($num >= 1);
		
		// get data from array $data
		$product_data = array(
			'prod_code'			=>	$prod_code,
			'prod_name'			=>	$data['prod_name'],
			'prod_description'	=>	$data['prod_description'],
			'prod_color'		=>	$data['prod_color'],
			'prod_size'			=>	$data['prod_size'],
			'prod_unit_price'	=>	filter_var($data['prod_unit_price'], FILTER_SANITIZE_NUMBER_FLOAT),
			'prod_selling_price'=>	filter_var($data['prod_selling_price'], FILTER_SANITIZE_NUMBER_FLOAT),
			'prod_category'		=>	$data['prod_category'],
		);
		
		// save to tbl_product
		if ($this->db->insert('tbl_product', $product_data)){
			return true;
		}else{
			return false;
		}
	}
	
	function update_product($data){
		// query update tbl_product
		$query = "UPDATE `tbl_product` SET `prod_name` = ?, `prod_description` = ?, `prod_color` = ?, `prod_size` = ?, `prod_unit_price` = ?, `prod_selling_price` = ?, `prod_category` = ? WHERE `prod_code` = ? ";
		
		// execute query and get parameters
		if ( $this->db->query($query, array( $data['prod_name'], $data['prod_description'], $data['prod_color'], $data['prod_size'], filter_var($data['prod_unit_price'], FILTER_SANITIZE_NUMBER_FLOAT), filter_var($data['prod_selling_price'], FILTER_SANITIZE_NUMBER_FLOAT), $data['prod_category'], $data['prod_code'] ))){
			return true;
		}else{
			return false;
		}
	}
	
	function delete_product($prod_code){
		// delete data product by code
		$query = "DELETE FROM `tbl_product` WHERE `prod_code` = ? ";
		if ( $this->db->query($query , array($prod_code)) ){
			return true;
		}else{
			return false;
		}
	}

}
// END Product_model class

/* End of file product_model.php */
/* Location: ./application/models/product_model.php */
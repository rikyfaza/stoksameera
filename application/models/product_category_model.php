<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_category_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function fetch_product_category(){
		// fetch all data product
		$query = "SELECT * FROM `tbl_product_category` ";
		return $result = $this->db->query($query);
	}
	
	function fetch_product_category_by_code($prod_category){
		// fetch data product by code
		$query = "SELECT * FROM `tbl_product_category` WHERE `prod_category` = ? LIMIT 1";
		return $result = $this->db->query($query, array($prod_category));
	}
	
	function new_product_category($data){
		// get random and unique category product code
		do 
		{
			$prod_category = rand(11111111,99999999);;
			$this->db->where('prod_category = ', $prod_category);
			$this->db->from('tbl_product_category');
			$num = $this->db->count_all_results();	
		} while ($num >= 1);
		
		// get data from array $data
		$product_category_data = array(
			'prod_category'		=>	$prod_category,
			'prod_cat_name'		=>	$data['prod_cat_name'],
			'prod_cat_desc'		=>	$data['prod_cat_desc'],
		);
		
		// save to tbl_product_category
		if ($this->db->insert('tbl_product_category', $product_category_data)){
			return true;
		}else{
			return false;
		}
	}
	
	function update_product_category($data){
		// query update tbl_product_category
		$query = "UPDATE `tbl_product_category` SET `prod_cat_name` = ?, `prod_cat_desc` = ? WHERE `prod_category` = ?";
		
		// execute query
		if ($this->db->query($query, array($data['prod_cat_name'], $data['prod_cat_desc'], $data['prod_category']))){
			return true;
		}else{
			return false;
		}
	}
}

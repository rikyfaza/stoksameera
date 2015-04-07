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
 * Sameerahijabstore Receipt_model Class
 *
 * Class yang menangani proses transaksi penerimaan produk yang dipesan pada vendor
 *
 * @package		Application
 * @category	Models
 * @author		Fazacorp Dev Team
 */
 
 
class Receipt_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function fetch_order_list(){
		$query = 
			"SELECT
			`tbl_purchase`.`purchase_id`
			, `tbl_purchase`.`factur_code`
			, `tbl_purchase`.`purchase_date`
			, `tbl_vendor`.`vendor_name`
			, `tbl_purchase`.`payment_date`
			, `tbl_purchase`.`freight_cost`
			, `tbl_purchase`.`total_payment_amount`
			, SUM(`tbl_purchase_detail`.`quantity`) AS quantity
			, SUM(`tbl_purchase_detail`.`quantity_received`) AS quantity_received
			FROM
					`db_sameerahijab`.`tbl_purchase`
					INNER JOIN `db_sameerahijab`.`tbl_vendor` 
							ON (`tbl_purchase`.`vendor_code` = `tbl_vendor`.`vendor_code`)
					INNER JOIN `db_sameerahijab`.`tbl_purchase_detail` 
							ON (`tbl_purchase_detail`.`purchase_id` = `tbl_purchase`.`purchase_id`)
			GROUP BY `tbl_purchase`.`factur_code` 
			HAVING quantity <> quantity_received;";
		return $this->db->query($query);
	}
	
	function history_fetch_order_list(){
		$query = 
			"SELECT
			`tbl_purchase`.`purchase_id`
			, `tbl_purchase`.`factur_code`
			, `tbl_purchase`.`purchase_date`
			, `tbl_vendor`.`vendor_name`
			, `tbl_purchase`.`payment_date`
			, `tbl_purchase`.`freight_cost`
			, `tbl_purchase`.`total_payment_amount`
			, SUM(`tbl_purchase_detail`.`quantity`) AS quantity
			, SUM(`tbl_purchase_detail`.`quantity_received`) AS quantity_received
			FROM
					`db_sameerahijab`.`tbl_purchase`
					INNER JOIN `db_sameerahijab`.`tbl_vendor` 
							ON (`tbl_purchase`.`vendor_code` = `tbl_vendor`.`vendor_code`)
					INNER JOIN `db_sameerahijab`.`tbl_purchase_detail` 
							ON (`tbl_purchase_detail`.`purchase_id` = `tbl_purchase`.`purchase_id`)
			GROUP BY `tbl_purchase`.`factur_code` 
			HAVING quantity = quantity_received;";
		return $this->db->query($query);
	}
	
	function order_detail($purchase_id){
		$query = 
			"SELECT
			`tbl_purchase_detail`.`purchase_id`
			, `tbl_product`.`prod_code`
			, `tbl_product`.`prod_name` 
			, `tbl_purchase_detail`.`quantity`
			, `tbl_purchase_detail`.`quantity_received`
			, `tbl_purchase_detail`.`quantity` - `tbl_purchase_detail`.`quantity_received` AS difference
			FROM
					`db_sameerahijab`.`tbl_purchase_detail`
					INNER JOIN `db_sameerahijab`.`tbl_product` 
							ON (`tbl_purchase_detail`.`prod_code` = `tbl_product`.`prod_code`)
			WHERE  `tbl_purchase_detail`.`purchase_id` = '".$purchase_id."';";
		return $this->db->query($query);
	}
	
	function history_order_detail($purchase_id){
		$query = 
			"SELECT
			`tbl_purchase_detail`.`purchase_id`
			, `tbl_product`.`prod_code`
			, `tbl_product`.`prod_name` 
			, `tbl_purchase_detail`.`quantity`
			, `tbl_purchase_detail`.`quantity_received`
			, `tbl_purchase_detail`.`quantity` - `tbl_purchase_detail`.`quantity_received` AS difference
			FROM
					`db_sameerahijab`.`tbl_purchase_detail`
					INNER JOIN `db_sameerahijab`.`tbl_product` 
							ON (`tbl_purchase_detail`.`prod_code` = `tbl_product`.`prod_code`)
			WHERE  `tbl_purchase_detail`.`purchase_id` = '".$purchase_id."';";
		return $this->db->query($query);
	}
	
	function save_received($quantity_received_arr, $prod_code_arr, $purchase_id_arr){
		$query = "UPDATE `tbl_purchase_detail` SET `quantity_received` = ? WHERE `prod_code` = ? AND  `purchase_id` = ?";	
		if ( $this->db->query($query, array($quantity_received_arr, $prod_code_arr, $purchase_id_arr))){
			return true;
		}else{
			return false;
		}
	}
}
// END Receipt_model class

/* End of file receipt_model.php */
/* Location: ./application/models/receipt_model.php */
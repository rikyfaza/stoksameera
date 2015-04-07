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
 * Sameerahijabstore Purchase_model Class
 *
 * Class yang menangani proses transaksi dengan dengan tabel tbl_purchase
 *
 * @package		Application
 * @category	Models
 * @author		Fazacorp Dev Team
 */
 
 
class Purchase_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function count_results($purchase_date) {
		$this->db->where('purchase_date', $purchase_date);
		$this->db->from('tbl_purchase');
		return $this->db->count_all_results();
	}
	
	function fetch_purchase(){
		// fetch all data purchase
		$query = "SELECT * FROM `tbl_purchase` ";
		return $result = $this->db->query($query);
	}
	
	function fetch_purchase_join(){
		$query = "SELECT `tbl_purchase`.`purchase_id`, `tbl_purchase`.`purchase_date`, `tbl_purchase`.`vendor_code`, `tbl_vendor`.`vendor_name`, `tbl_purchase`.`factur_code`, `tbl_purchase`.`payment_date`, `tbl_purchase`.`freight_cost`, `tbl_purchase`.`total_payment_amount` FROM `db_sameerahijab`.`tbl_purchase` INNER JOIN `db_sameerahijab`.`tbl_vendor` ON (`tbl_purchase`.`vendor_code` = `tbl_vendor`.`vendor_code`);";
		return $result = $this->db->query($query);
	}
	
	function fetch_purchase_join_by_purchase_id($purchase_id){
		$query = "SELECT `tbl_purchase`.`purchase_id`, `tbl_purchase`.`purchase_date`, `tbl_purchase`.`vendor_code`, `tbl_vendor`.`vendor_name`, `tbl_purchase`.`factur_code`, `tbl_purchase`.`payment_date`, `tbl_purchase`.`freight_cost`, `tbl_purchase`.`total_payment_amount` FROM `db_sameerahijab`.`tbl_purchase` INNER JOIN `db_sameerahijab`.`tbl_vendor` ON (`tbl_purchase`.`vendor_code` = `tbl_vendor`.`vendor_code`) WHERE `tbl_purchase`.`purchase_id` = '".$purchase_id."' ;";
		return $result = $this->db->query($query);
	}
	
	function fetch_purchased_product($purchase_id){
		$query = "SELECT tbl_product.`prod_code`, tbl_product.`prod_name`, tbl_purchase_detail.`quantity`, tbl_purchase_detail.`unit_price`, tbl_purchase_detail.`discount`, tbl_purchase_detail.`subtotal` FROM tbl_product INNER JOIN tbl_purchase_detail ON tbl_product.`prod_code` = tbl_purchase_detail.`prod_code` WHERE tbl_purchase_detail.`purchase_id` = '".$purchase_id."';";
		return $result = $this->db->query($query);
	}
	
	function fetch_purchase_by_id($purchase_id){
		// fetch data purchase by code
		$query = "SELECT * FROM `tbl_purchase` WHERE `purchase_id` = ? LIMIT 1";
		return $result = $this->db->query($query, array($purchase_id));
	}
	
	function new_purchase($data){
		// get random and unique purchase id
		do 
		{
			$purchase_id = rand(11111111,99999999);;
			$this->db->where('purchase_id = ', $purchase_id);
			$this->db->from('tbl_purchase');
			$num = $this->db->count_all_results();	
		} while ($num >= 1);
		
		$purchase_date = date_create($data['purchase_date']);
		$purchase_date = date_format($purchase_date, 'Y-m-d');
		
		$payment_date = date_create($data['payment_date']);
		$payment_date = date_format($payment_date, 'Y-m-d');
		
		// get data from array $data
		$purchase_data = array(
			'purchase_id'			=>	$purchase_id,
			'purchase_date'			=>	$purchase_date,
			'vendor_code'			=>	$data['vendor_code'],
			'factur_code'			=>	$data['factur_code'],
			'payment_date'			=>	$payment_date,
			'freight_cost'			=>	filter_var($data['freight_cost'], FILTER_SANITIZE_NUMBER_FLOAT),
			'total_payment_amount'	=>  (float)$data['total_payment_amount'],
		);
		
		// save to tbl_purchase
		if ($this->db->insert('tbl_purchase', $purchase_data)){
			return $purchase_id;
		}else{
			return false;
		}
	}
	
	/* search autocomplete product name */
	function fetch_product_name( $term ){
		$a_json = array();
		$data = array();
		$Q = $this->db->query('SELECT prod_code, prod_name, prod_unit_price FROM tbl_product WHERE prod_name LIKE "'.$term.'%"');
		if($Q->num_rows() > 0){foreach($Q->result_array() as $row){
			//$data['id'] = $row['idmeasure'];
			//$data['value'] = $row['name'];
			$data['label'] = $row['prod_name'];
			$data['data'] = $row['prod_code'].'|'.$row['prod_unit_price'];
			array_push($a_json, $data);
		}}
    return $a_json;
	}
	
	function add_product_to_purchase($data){
		$Q = $this->db->query('SELECT prod_code FROM tbl_purchase_detail WHERE prod_code = "'.$data['prod_code'].'" ');
		if($Q->num_rows() > 0){
			$this->session->set_flashdata('error', 'Cannot insert duplicate product!');
			redirect('purchase/add_product/'.$data['purchase_id'],'refresh');
		}
		
		$purchase_data = array(
			'purchase_id'	=> $data['purchase_id'],
			'prod_code'		=> $data['prod_code'],
			'quantity'		=> $data['quantity'],
			'unit_price'	=> $data['unit_price'],
			'discount'		=> $data['discount'],
			'subtotal'		=> (double)$data['quantity'] * (double)$data['unit_price'] - (double)$data['discount'],
		);
		$this->db->insert('tbl_purchase_detail', $purchase_data);
		
		$querytotal = $this->db->query('SELECT SUM(subtotal) as total FROM tbl_purchase_detail WHERE purchase_id = "'.$data['purchase_id'].'" ');
		if($querytotal->num_rows() > 0){foreach($querytotal->result_array() as $row){ $total_payment_amount = $row['total']; }}
		
		$total = array(
			'total_payment_amount' => $total_payment_amount
		);
		$this->db->where('purchase_id',$data['purchase_id']);
		$this->db->update('tbl_purchase', $total);
		
		return true;
		
	}
	
	function delete_selected_product($prod_code, $purchase_id){
		// delete data selected product by code and purchase id
		$query = "DELETE FROM `tbl_purchase_detail` WHERE `prod_code` = ? AND purchase_id = ?";
		if ( $this->db->query($query , array($prod_code, $purchase_id)) ){
			
			/* delete log transaction */
			$query = $this->db->query('SELECT `log_id` FROM `tbl_purchase_detail` WHERE `purchase_id` = "'.$purchase_id.'" ');
			if($query->num_rows() > 0){foreach($query->result_array() as $row){ $this->db->query('DELETE FROM `tbl_log_trans` WHERE `log_id` = "'.$row['log_id'].'" '); }}
			
			/* do update total payment amount*/
			$querytotal = $this->db->query('SELECT SUM(subtotal) as total FROM tbl_purchase_detail WHERE purchase_id = "'.$purchase_id.'" ');
			if($querytotal->num_rows() > 0){foreach($querytotal->result_array() as $row){ $total_payment_amount = $row['total']; }}
			
			$total = array(
				'total_payment_amount' => $total_payment_amount
			);
			$this->db->where('purchase_id',$purchase_id);
			$this->db->update('tbl_purchase', $total);

			return true;			
		}else{
			return false;
		}
	}
	
	function update_purchase($data){
		$query = "UPDATE `tbl_purchase` SET `purchase_date` = ?, `vendor_code` = ?, `factur_code` = ?, `payment_date` = ?, `freight_cost` = ? WHERE `purchase_id` = ?";
		
		$purchase_date = date_create($data['purchase_date']);
		$purchase_date = date_format($purchase_date, 'Y-m-d');
		
		$payment_date = date_create($data['payment_date']);
		$payment_date = date_format($payment_date, 'Y-m-d');
		
		// execute query and get parameters
		if ( $this->db->query($query, array( $purchase_date, $data['vendor_code'], $data['factur_code'], $payment_date, filter_var($data['freight_cost'], FILTER_SANITIZE_NUMBER_FLOAT), $data['purchase_id'] ))){
			return true;
		}else{
			return false;
		}
	}
	
	function delete_purchase($purchase_id){
		
		$query = $this->db->query('SELECT `log_id` FROM `tbl_purchase_detail` WHERE `purchase_id` = "'.$purchase_id.'" ');
		if($query->num_rows() > 0){foreach($query->result_array() as $row){ $this->db->query('DELETE FROM `tbl_log_trans` WHERE `log_id` = "'.$row['log_id'].'" '); }}
		
		/* delete from tbl_purchase_detail */
		$query = "DELETE FROM `tbl_purchase_detail` WHERE `purchase_id` = ? ";
		$this->db->query($query , array($purchase_id));
		
		/* delete from tbl_purchase */
		$query = "DELETE FROM `tbl_purchase` WHERE `purchase_id` = ? ";
		if ( $this->db->query($query , array($purchase_id)) ){
			return true;
		}else{
			return false;
		}
		
	}
}
// END Purchase_model class

/* End of file Purchase_model.php */
/* Location: ./application/models/Purchase_model.php */
<style>
.table > tbody > tr > td{
	padding:3px;
	padding-left:12px;
}
</style>

 <script>
$(function() {
	$('#example1').tooltip();
});
</script>

<!--
<div class="col-md-3" style='margin-bottom:10px;float:right'>
	<a class="btn btn-block btn-social btn-foursquare" href="<?php echo site_url().'/purchase/new_purchase'; ?>">
		<i class="fa fa-plus"></i> <?php echo $this->lang->line('common_form_elements_new_purchase'); ?>
	</a>
</div>
-->

<section class="content">
	<div class="row">
		<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			  <h3 class="box-title"><?php echo $this->lang->line('common_table_receipt'); ?></h3>
			</div><!-- /.box-header -->
			<div class="box-body">
			  <table id="example1" class="table table-bordered table-striped">
				<thead style="background-color:#f39c12;">
				  <tr>
						<th>Invoice Num</th>
						<th>Vendor</th>
						<th>Purchase Date</th>
						<th>Payment Date</th>
						<th>Sum of Order</th>
						<th>Sum of Received</th>
						<th>Freight Cost (Rp)</th>
						<th>Total Payment (Rp)</th>
						<th>Action</th>
				  </tr>
				</thead>
				<tbody>
				<?php foreach($query->result() as $result) : ?>
				  <tr>
					<td><?php echo $result->factur_code; ?></td>
					<td><?php echo $result->vendor_name; ?></td>
					<td><?php echo date_format(date_create($result->purchase_date), 'd/M/Y'); ?></td>
					<td><?php echo date_format(date_create($result->payment_date), 'd/M/Y'); ?></td>
					<td style='text-align:right'><?php echo $result->quantity; ?></td>
					<td style='text-align:right'><?php echo $result->quantity_received; ?></td>
					<td style='text-align:right'><?php echo number_format($result->freight_cost); ?></td>
					<td style='text-align:right'><?php echo number_format($result->total_payment_amount); ?></td>
					<td>
						
						<div class="btn-group">
						  <a href="<?php echo site_url().'/receipt/history_order_detail/'.$result->purchase_id; ?>" title='Detail amount of order and received product' class='btn btn-primary'><i class="fa fa-search"></i> <?php print $this->lang->line('common_form_elements_detail'); ?></a>
						</div>
						
					</td>
				  </tr>
				<?php endforeach; ?>  
				</tbody>
				<tfoot style="background-color:#f39c12;">
				  <tr>
						<th>Invoice Num</th>
						<th>Vendor</th>
						<th>Purchase Date</th>
						<th>Payment Date</th>
						<th>Sum of Order</th>
						<th>Sum of Received</th>
						<th>Freight Cost (Rp)</th>
						<th>Total Payment (Rp)</th>
						<th>Action</th>
				  </tr>
				</tfoot>
			  </table>
			</div><!-- /.box-body -->
			
		  </div><!-- /.box -->
		</div>
	</div>
</section>

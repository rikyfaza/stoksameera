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
		
			<?php echo form_open('receipt/save_received','role="form"') ; ?>
			
			<div class="box-header">
			  <h3 class="box-title"><?php echo $this->lang->line('common_table_receipt'); ?></h3>
			</div><!-- /.box-header -->
			<div class="box-body">
			  <table id="example1" class="table table-bordered table-striped">
				<thead style="background-color:#f39c12;">
				  <tr>
						<th>Product Code</th>
						<th>Product Name</th>
						<th>Ordered</th>
						<th>Received</th>
						<th>Difference</th>
				  </tr>
				</thead>
				<tbody>
				<?php foreach($query->result() as $result) : ?>
				  <tr>
					<td><?php echo $result->prod_code; ?></td>
					<td><?php echo $result->prod_name; ?></td>
					<td style='text-align:right;'><?php echo $result->quantity; ?></td>
					<td style='max-width:50px;'><input type='text' style='max-width:100px;' class="form-control" name='quantity_received[]' id='quantity_received' value='<?php echo (($result->quantity_received==null)?'0':$result->quantity_received); ?>' /></td>
					<td style='text-align:right'><?php echo $result->difference; ?></td>
				  </tr>
					<input type='hidden' name='prod_code[]' id='prod_code' value='<?php echo $result->prod_code; ?>' />
				<?php endforeach; ?>
				
				<input type='hidden' name='purchase_id' id='purchase_id' value='<?php echo $result->purchase_id; ?>' />
				
				</tbody>
				<tfoot style="background-color:#f39c12;">
				  <tr>
						<th>Product Code</th>
						<th>Product Name</th>
						<th>Ordered</th>
						<th>Received</th>
						<th>Difference</th>
				  </tr>
				</tfoot>
			  </table>
				<button class='btn btn-primary' type='submit'> <?php print $this->lang->line('common_form_elements_save_change'); ?></button> &nbsp;&nbsp;
				<a href="<?php print site_url().'/receipt/index'; ?>" class='btn btn-primary'> <?php print $this->lang->line('common_form_elements_cancel'); ?></a>
				
				<?php echo form_close() ; ?>
				
			</div><!-- /.box-body -->
			
		  </div><!-- /.box -->
		</div>
	</div>
</section>

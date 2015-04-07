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
					<td style='text-align:right;'><?php echo $result->quantity_received; ?></td>
					<td style='text-align:right'><?php echo $result->difference; ?></td>
				  </tr>
				<?php endforeach; ?>
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
				<a href="<?php print site_url().'/receipt/history_index'; ?>" class='btn btn-primary'> <?php print $this->lang->line('common_form_elements_go_back'); ?></a>
			</div><!-- /.box-body -->
		  </div><!-- /.box -->
		</div>
	</div>
</section>

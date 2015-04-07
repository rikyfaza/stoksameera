<style>
.table > tbody > tr > td{
	padding:3px;
	padding-left:12px;
}
</style>

<div class="col-md-3" style='margin-bottom:10px;float:right'>
	<a class="btn btn-block btn-social btn-foursquare" href="<?php echo site_url().'/purchase/new_purchase'; ?>">
		<i class="fa fa-plus"></i> <?php echo $this->lang->line('common_form_elements_new_purchase'); ?>
	</a>
</div>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			  <h3 class="box-title"><?php echo $this->lang->line('common_table_purchase'); ?></h3>
			</div><!-- /.box-header -->
			<div class="box-body">
				
				<?php foreach($queryheader->result() as $result) : ?>
				<dl class="dl-horizontal">
					<dt>Purchase Invoice</dt><dd><?php print $result->factur_code; ?></dd>
					<dt>Purchase Date</dt><dd><?php print date_format(date_create($result->purchase_date),'d/M/Y'); ?></dd>
					<dt>Vendor</dt><dd><?php print $result->vendor_name; ?></dd>
					<dt>Payment Date</dt><dd><?php print date_format(date_create($result->payment_date),'d/M/Y'); ?></dd>
					<dt>Freight Cost</dt><dd><?php print 'Rp.  '.number_format($result->freight_cost).',-'; ?></dd>
					<dt>&nbsp;</dt><dd></dd>
					<dt>Total Payment</dt><dd style='font-weight:bold;font-size:1.2em;'><?php print 'Rp.  '.number_format($result->total_payment_amount).',-'; ?></dd>
				</dl>
				<?php endforeach; ?>
				
			  <table  class="table table-bordered table-striped table-condensed">
				<thead style="background-color:#f39c12;">
				  <tr>
					<th>Product Code</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Unit Price (Rp)</th>
					<th>Discount (Rp)</th>
					<th>Subtotal (Rp)</th>
				  </tr>
				</thead>
				<tbody>
				<?php foreach($queryproduct->result() as $result) : ?>
				  <tr>
					<td><?php echo $result->prod_code; ?></td>
					<td><?php echo $result->prod_name; ?></td>
					<td style='text-align:right'><?php echo $result->quantity; ?></td>
					<td style='text-align:right'><?php echo number_format($result->unit_price); ?></td>
					<td style='text-align:right'><?php echo number_format($result->discount); ?></td>
					<td style='text-align:right'><?php echo number_format($result->subtotal); ?></td>
				
				  </tr>
				<?php endforeach; ?>  
				</tbody>
				<tfoot style="background-color:#f39c12;">
				  <tr>
					<th>Product Code</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Unit Price (Rp)</th>
					<th>Discount (Rp)</th>
					<th>Subtotal (Rp)</th>
				  </tr>
				</tfoot>
			  </table>
				<br />
				<a href="<?php print site_url().'/purchase/index'; ?>" class='btn btn-primary'> Done</a>
			</div><!-- /.box-body -->
			
		  </div><!-- /.box -->
		</div>
	</div>
</section>

			
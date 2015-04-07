<script>
$().ready(function() {
	
	$('#product_name').autocomplete({
		source: "<?php print site_url().'/purchase/fetch_product_name' ?>",			
		minLength: 1,
		dataType: "json",
		select: function ( event, ui) {
      //console.log((ui.item.data).substring(9,100));
			$('#product_price').val((ui.item.data).substring(9,100));
			$('#product_qty').val('1');
			$('#product_discount').val('0');
			$('#product_code').val((ui.item.data).substring(0,8));
    }
	}); 
	
});
</script>

<style>
.ui-autocomplete {
  font-size:.85em;
}
.table > tbody > tr > td{
	padding:3px;
	padding-left:12px;
}
</style>

<section class="content">


	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
				<?php foreach($query->result() as $result) : ?>
					<h3 class="box-title">Purchase Invoice : <?php print $result->factur_code; ?></h3>
					<div class="box-tools pull-right">
						<!-- Buttons, labels, and many other things can be placed here! -->
						<!-- Here is a label for example -->
						<span class="label label-primary">Purchasing Product</span>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body">
				
					
					<dl class="dl-horizontal">
						<dt>Purchase Date</dt><dd><?php print date_format(date_create($result->purchase_date),'d/M/Y'); ?></dd>
						<dt>Vendor</dt><dd><?php print $result->vendor_name; ?></dd>
						<dt>Payment Date</dt><dd><?php print date_format(date_create($result->payment_date),'d/M/Y'); ?></dd>
						<dt>Freight Cost</dt><dd><?php print 'Rp.  '.number_format($result->freight_cost).',-'; ?></dd>
						<dt>&nbsp;</dt><dd></dd>
						<dt>Total Payment</dt><dd style='font-weight:bold;font-size:1.2em;'><?php print 'Rp.  '.number_format($result->total_payment_amount).',-'; ?></dd>
					</dl>
					
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			  <h3 class="box-title"><?php echo $this->lang->line('common_table_purchase_product'); ?></h3>
			</div><!-- /.box-header -->
			
			<div class="box-header" style='text-align:right' >
				<a href="<?php print site_url().'/product/new_product/'.$this->uri->segment(3); ?>" class='btn btn-primary' >If product doesn't exists on database.&nbsp;&nbsp; Add new product here!</a>
			</div>
			<?php
				if ($this->session->flashdata('error'))
				{
					echo "<div class='alert alert-danger'><i class='icon fa fa-ban'></i>";
					echo $this->session->flashdata('error');
					echo "</div>";
				}
			?>
			<?php echo validation_errors(); ?>
			
			<div class="box-header bg-yellow disabled color-palette" style='margin: 10px 10px 10px 10px;'>
				<table border='0' style='width:100%;'>
					<tr style='color:#000;font-weight:bold;'>
						<td style='width:50%'>Product Name</td>
						<td style='width:10%'>Quantity</td>
						<td style='width:15%'>Unit Price</td>
						<td style='width:15%'>Discount</td>
						<td style='width:10%'>Action</td>
					</tr>
					<tr>
						<?php echo form_open('purchase/add_product_to_purchase','role="form"') ; ?>
						<input type='hidden' name='uri_segment' id='uri_segment' value='<?php print $this->uri->segment(3); ?>' />
						<td style='padding-right:10px'><input type="text" name='product_name' class="form-control" id="product_name" placeholder='search product...' value="<?php echo set_value('product_name'); ?>" /></td>
						<td style='padding-right:10px'><input type="text" name='product_qty' class="form-control"  id="product_qty" value="<?php echo set_value('product_qty'); ?>" /></td>
						<td style='padding-right:10px'><input type="text" name='product_price' class="form-control" id="product_price" value="<?php echo set_value('product_price'); ?>"/></td>
						<td style='padding-right:10px'><input type="text" name='product_discount' class="form-control" id="product_discount" value="<?php echo set_value('product_discount'); ?>" /></td>
						<input type='hidden' name='purchase_id' value='<?php print $result->purchase_id; ?>' />
						<input type='hidden' name='product_code' id='product_code' value="<?php echo set_value('product_code'); ?>" />
						<td style='padding-right:10px'><button class='btn btn-primary'><i class="fa fa-plus"></i> <?php print $this->lang->line('common_form_elements_add_purchase'); ?></button></td>
						<?php echo form_close() ; ?>
					</tr>
				</table>
			</div><!-- /.box-header -->
			<?php endforeach; ?>  
			
			<div class="box-body">
			  <table id="example1" class="table table-bordered table-striped table-condensed">
				<thead style="background-color:#f39c12;">
				  <tr>
					<th>Product Code</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Unit Price (Rp)</th>
					<th>Discount (Rp)</th>
					<th>Subtotal (Rp)</th>
					<th>Action</th>
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
					<td>
						<div class="btn-group">
						  <a href="<?php echo site_url().'/purchase/delete_selected_product/'.$result->prod_code.'/'.$this->uri->segment(3); ?>" onclick="return confirm('Are you sure you want to delete this data?');" class='btn btn-danger'><i class="fa fa-times"></i> <?php print $this->lang->line('common_form_elements_action_delete'); ?> </a>
						</div>
					</td>
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
					<th>Action</th>
				  </tr>
				</tfoot>
			  </table>
				<a href="<?php print site_url().'/purchase/index'; ?>" class='btn btn-primary'> Done</a>
			</div><!-- /.box-body -->
		  </div><!-- /.box -->
		</div>
	</div>
</section>

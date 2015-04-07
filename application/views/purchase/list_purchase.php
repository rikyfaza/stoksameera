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
			  <table id="example1" class="table table-bordered table-striped">
				<thead style="background-color:#f39c12;">
				  <tr>
					<th>Invoice Num</th>
					<th>Vendor</th>
					<th>Purchase Date</th>
					<th>Payment Date</th>
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
					<td style='text-align:right'><?php echo number_format($result->freight_cost); ?></td>
					<td style='text-align:right'><?php echo number_format($result->total_payment_amount); ?></td>
					<td>
						<div class="btn-group">
						  <a href="<?php echo site_url().'/purchase/update_purchase_view/'.$result->purchase_id; ?>" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> <?php print $this->lang->line('common_form_elements_action_edit'); ?></a>
						  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo site_url().'/purchase/list_purchase/'.$result->purchase_id; ?>" ><i class="fa fa-search"></i> <?php print $this->lang->line('common_form_elements_view'); ?></a></li>
								
								<li class="divider"></li>
								
								<li><a href="<?php echo site_url().'/purchase/add_product/'.$result->purchase_id; ?>" ><i class="fa fa-plus"></i> <?php print $this->lang->line('common_form_elements_add_product'); ?></a></li>
								
								<li class="divider"></li>
								
								<li><a href="<?php echo site_url().'/purchase/delete_purchase/'.$result->purchase_id; ?>" onclick="return confirm('Are you sure you want to delete this data?');" ><i class="fa fa-times"></i> Delete</a></li>
						  </ul>
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

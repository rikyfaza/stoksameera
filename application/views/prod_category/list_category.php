<style>
.table > tbody > tr > td{
	padding:3px;
	padding-left:12px;
}
</style>

<div class="col-md-3" style='margin-bottom:10px;float:right'>
	<a class="btn btn-block btn-social btn-foursquare" href="<?php echo site_url().'/category/new_product_category'; ?>">
		<i class="fa fa-plus"></i> <?php echo $this->lang->line('common_form_elements_new_category'); ?>
	</a>
</div>

<section class="content">
	  <div class="row">
		<div class="col-xs-12">
		
		<div class="box">
			<div class="box-header">
			  <h3 class="box-title"><?php echo $this->lang->line('common_table_product_category'); ?></h3>
			</div><!-- /.box-header -->
			<div class="box-body">
			  <table id="example1" class="table table-bordered table-striped">
				<thead style="background-color:#f39c12;">
				  <tr>
					<th>Name</th>
					<th>Description</th>
					<th>Action</th>
				  </tr>
				</thead>
				<tbody>
				<?php foreach($query->result() as $result) : ?>
				  <tr>
					<td> <?php echo $result->prod_cat_name; ?></td>
					<td> <?php echo $result->prod_cat_desc; ?></td>
					<td>
						<div class="btn-group">
						  <a href="<?php echo site_url().'/category/update_product_category_view/'.$result->prod_category; ?>" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>
						  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo site_url().'/category/delete_product_category/'.$result->prod_category; ?>" onclick="return confirm('Are you sure you want to delete this data?');" ><i class="fa fa-times"></i> Delete</a></li>
						  </ul>
						</div>
					</td>
				  </tr>
				<?php endforeach; ?>  
				</tbody>
				<tfoot style="background-color:#f39c12;">
				  <tr>
					<th>Name</th>
					<th>Description</th>
					<th>Action</th>
				  </tr>
				</tfoot>
			  </table>
			</div><!-- /.box-body -->
		  </div><!-- /.box -->
		</div>
	</div>
</section>

			
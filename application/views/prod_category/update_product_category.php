<!-- right column -->
<div class="col-md-7">
  <!-- general form elements disabled -->
  <div class="box box-warning">
	<div class="box-header">
	  <h3 class="box-title"><?php echo $this->lang->line('common_form_elements_form_update_product_cat'); ?></h3>
	</div><!-- /.box-header -->
	
	<div class="box-body">
	  <!--<form role="form">-->
	  <?php foreach($query->result() as $result) : ?>
	  <?php echo validation_errors(); ?>
	  <?php echo form_open('category/update_product_category','role="form"') ; ?>		
	  
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_name'); ?></label>
		  <input type="text" name='prod_cat_name' id='prod_cat_name' class="form-control" placeholder="product category name ..." value="<?php print $result->prod_cat_name; ?>" />
		</div>
		
		<!-- textarea -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_description'); ?></label>
		  <textarea name="prod_cat_desc" id="prod_cat_desc" class="form-control" rows="3" placeholder="product category description ..."><?php print $result->prod_cat_desc; ?></textarea>
		</div>
		
		<input type='hidden' name='prod_category' id='prod_category' value='<?php print $result->prod_category; ?>' />
		
		<div class="form-group">
			<button class="btn btn-success" type="submit" ><?php echo $this->lang->line('common_form_elements_update'); ?></button>
			<a href="<?php echo site_url().'/category/index'; ?>" class="btn btn-warning" style='float:right'><?php echo $this->lang->line('common_form_elements_cancel'); ?></a>
		</div>
			  
	  <?php echo form_close() ; ?>
	  <?php endforeach; ?>
	  
	</div><!-- /.box-body -->
  </div><!-- /.box -->
</div>
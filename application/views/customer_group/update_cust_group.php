
<!-- right column -->
<div class="col-md-7">
  <!-- general form elements disabled -->
  <div class="box box-warning">
	<div class="box-header">
	  <h3 class="box-title"><?php echo $this->lang->line('common_form_elements_form_update_cust_group'); ?></h3>
	</div><!-- /.box-header -->
	
	<div class="box-body">
	  <!--<form role="form">-->
	  <?php foreach($query->result() as $result) : ?>
	  <?php echo validation_errors(); ?>
	  <?php echo form_open('customer_group/update_cust_group','role="form"') ; ?>		
	  
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_name'); ?></label>
		  <input type="text" name='cust_group_name' id='cust_group_name' class="form-control" placeholder="customer group name ..." value="<?php print $result->cust_group_name; ?>" />
		</div>
		
		<!-- textarea -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_description'); ?></label>
		  <textarea name="cust_group_desc" id="cust_group_desc" class="form-control" rows="3" placeholder="customer group description ..."><?php print $result->cust_group_desc; ?></textarea>
		</div>
		
		<input type='hidden' name='cust_group' id='cust_group' value='<?php print $result->cust_group; ?>' />
		
		<div class="form-group">
			<button class="btn btn-success" type="submit" ><?php echo $this->lang->line('common_form_elements_update'); ?></button>
			<a href="<?php echo site_url().'/customer_group/index'; ?>" class="btn btn-warning" style='float:right'><?php echo $this->lang->line('common_form_elements_cancel'); ?></a>
		</div>
		
	  <?php echo form_close() ; ?>
	  <?php endforeach; ?>
	</div><!-- /.box-body -->
  </div><!-- /.box -->
</div>

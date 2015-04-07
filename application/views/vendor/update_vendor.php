<!-- right column -->
<div class="col-md-7">
  <!-- general form elements disabled -->
  <div class="box box-warning">
	<div class="box-header">
	  <h3 class="box-title"><?php echo $this->lang->line('common_form_elements_form_update_vendor'); ?></h3>
	</div><!-- /.box-header -->
	
	<div class="box-body">
	  <!--<form role="form">-->
	  <?php foreach($query->result() as $result) : ?>
	  <?php echo validation_errors(); ?>
	  <?php echo form_open('vendor/update_vendor','role="form"') ; ?>		
	  
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_name'); ?></label>
		  <input type="text" name='vendor_name' id='vendor_name' class="form-control" placeholder="vendor name ..." value="<?php print $result->vendor_name; ?>" />
		</div>
		
		<!-- textarea -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_office_phone'); ?></label>
		  <div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'><i class="fa fa-phone"></i></span>
				<input type="text" name='vendor_office_phone' id='vendor_office_phone' class="form-control" placeholder="vendor office phone ..." value="<?php print $result->vendor_office_phone; ?>" />
		  </div>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_mobile_phone'); ?></label>
		  <div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'><i class="fa fa-mobile-phone"></i></span>
		  <input type="text" name="vendor_mobile_phone" id="vendor_mobile_phone" class="form-control" placeholder="vendor mobile phone ..." value="<?php print $result->vendor_mobile_phone; ?>" />
		  </div>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_email'); ?></label>
		  <div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'><i class="fa fa-envelope"></i></span>
		  <input type="text" name="vendor_email" id="vendor_email" class="form-control" placeholder="vendor email ..." value="<?php print $result->vendor_email; ?>" />
		  </div>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_addres1'); ?></label>
		  <div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'><i class="fa fa-home"></i></span>
		  <input type="text" name="vendor_address1" id="vendor_address1" class="form-control" placeholder="vendor address1 ..." value="<?php print $result->vendor_address1; ?>" />
		  </div>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_addres2'); ?></label>
		  <div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'><i class="fa fa-home"></i></span>
		  <input type="text" name="vendor_address2" id="vendor_address2" class="form-control" placeholder="vendor address2 ..." value="<?php print $result->vendor_address2; ?>" />
		  </div>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_postal_code'); ?></label>
		  <input type="text" name="vendor_postal_code" id="vendor_postal_code" class="form-control" placeholder="vendor postal code ..." value="<?php print $result->vendor_postal_code; ?>" />
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_city'); ?></label>
		  <input type="text" name="vendor_city" id="vendor_city" class="form-control" placeholder="vendor city ..." value="<?php print $result->vendor_city; ?>" />
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_province'); ?></label>
		  <input type="text" name="vendor_province" id="vendor_province" class="form-control" placeholder="vendor province ..." value="<?php print $result->vendor_province; ?>" />
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_country'); ?></label>
		  <input type="text" name="vendor_country" id="vendor_country" class="form-control" placeholder="vendor country ..." value="<?php print $result->vendor_country; ?>" />
		</div>
		
		<input type='hidden' name='vendor_code' id='vendor_code' value='<?php print $result->vendor_code; ?>' />
		
		<div class="form-group">
			<button class="btn btn-success" type="submit" ><?php echo $this->lang->line('common_form_elements_update'); ?></button>
			<a href="<?php echo site_url().'/vendor/index'; ?>" class="btn btn-warning" style='float:right'><?php echo $this->lang->line('common_form_elements_cancel'); ?></a>
		</div>
		
	  <?php echo form_close() ; ?>
	  <?php endforeach; ?>
	</div><!-- /.box-body -->
  </div><!-- /.box -->
</div>

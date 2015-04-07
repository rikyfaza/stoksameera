<!-- right column -->
<div class="col-md-7">
  <!-- general form elements disabled -->
  <div class="box box-warning">
	<div class="box-header">
	  <h3 class="box-title"><?php echo $this->lang->line('common_form_elements_form_update_cust'); ?></h3>
	</div><!-- /.box-header -->
	
	<div class="box-body">
	  <!--<form role="form">-->
	  <?php foreach($query->result() as $result) : ?>
	  <?php echo validation_errors(); ?>
	  <?php echo form_open('customer/update_customer','role="form"') ; ?>		
	  
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_name'); ?></label>
		  <input type="text" name='cust_name' id='cust_name' class="form-control" placeholder="customer name ..." value="<?php print $result->cust_name; ?>" />
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_home_phone'); ?></label>
		  <div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'><i class="fa fa-phone"></i></span>
				<input type="text" name='cust_home_phone' id='cust_home_phone' class="form-control" placeholder="customer home phone ..." value="<?php print $result->cust_home_phone; ?>" />
		  </div>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_mobile_phone'); ?></label>
		  <div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'><i class="fa fa-mobile-phone"></i></span>
		  <input type="text" name="cust_mobile_phone" id="cust_mobile_phone" class="form-control" placeholder="customer mobile phone ..." value="<?php print $result->cust_mobile_phone; ?>" />
		  </div>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_email'); ?></label>
		  <div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'><i class="fa fa-envelope"></i></span>
		  <input type="text" name="cust_email" id="cust_email" class="form-control" placeholder="customer email ..." value="<?php echo print $result->cust_email; ?>" />
		  </div>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_addres1'); ?></label>
		  <div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'><i class="fa fa-home"></i></span>
		  <input type="text" name="cust_address1" id="cust_address1" class="form-control" placeholder="customer address1 ..." value="<?php print $result->cust_address1; ?>" />
		  </div>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_addres2'); ?></label>
		  <div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'><i class="fa fa-home"></i></span>
		  <input type="text" name="cust_address2" id="cust_address2" class="form-control" placeholder="customer address2 ..." value="<?php print $result->cust_address2; ?>" />
		  </div>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_postal_code'); ?></label>
		  <input type="text" name="cust_postal_code" id="cust_postal_code" class="form-control" placeholder="customer postal code ..." value="<?php print $result->cust_postal_code; ?>" />
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_city'); ?></label>
		  <input type="text" name="cust_city" id="cust_city" class="form-control" placeholder="customer city ..." value="<?php print $result->cust_city; ?>" />
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_province'); ?></label>
		  <input type="text" name="cust_province" id="cust_province" class="form-control" placeholder="customer province ..." value="<?php print $result->cust_province; ?>" />
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_country'); ?></label>
		  <input type="text" name="cust_country" id="cust_country" class="form-control" placeholder="customer country ..." value="<?php print $result->cust_country; ?>" />
		</div>
		
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_group'); ?></label>
		  <select class="form-control" name="cust_group" id="cust_group" >
		  <option><none></option>
		  <?php foreach($list_group->result() as $resultlist) : ?>
			<option value='<?php print $resultlist->cust_group; ?>' <?php print(($result->cust_group==$resultlist->cust_group)?'selected':''); ?>><?php print $resultlist->cust_group_name; ?></option>
		  <?php endforeach; ?>	
		  </select>
		</div>
		
		<input type='hidden' name='cust_id' id='cust_id' value='<?php print $result->cust_id; ?>' />
		
		<div class="form-group">
			<button class="btn btn-success" type="submit" ><?php echo $this->lang->line('common_form_elements_update'); ?></button>
			<a href="<?php echo site_url().'/customer/index'; ?>" class="btn btn-warning" style='float:right'><?php echo $this->lang->line('common_form_elements_cancel'); ?></a>
		</div>
		
	  <?php echo form_close() ; ?>
	  <?php endforeach; ?>
	  
	</div><!-- /.box-body -->
  </div><!-- /.box -->
</div>

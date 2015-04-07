<style>
.ui-widget {
    font-family: Verdana,Arial,sans-serif;
    font-size: 0.85em;
}
</style>

<!-- right column -->
<div class="col-md-7">
  <!-- general form elements disabled -->
  <div class="box box-warning">
	<div class="box-header">
	  <h3 class="box-title"><?php echo $this->lang->line('common_form_elements_form_update_purchase'); ?></h3>
	</div><!-- /.box-header -->
	
	<div class="box-body">
	  <!--<form role="form">-->
	  <?php foreach($query->result() as $result) : ?>
	  <?php echo validation_errors(); ?>
	  <?php echo form_open('purchase/update_purchase','role="form"') ; ?>		
	  
		<!-- text input -->
		
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_purchase_date'); ?></label>
		  <div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'><i class="fa fa-calendar"></i></span>
				<input type="text" name='purchase_date' class="form-control" value="<?php print date_format(date_create($result->purchase_date),'m/d/Y'); ?>" id="purchase_date"/>		
		  </div>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_factur_number'); ?> [format : INV_year_month_date_seriesnumber]</label>
		  <input type="text" name='factur_code' id='factur_code' class="form-control" placeholder="invoice number ..." value="<?php print $result->factur_code ?>" />
		</div>
				
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('vendor_ven_name'); ?></label>
		  <select class="form-control" name="vendor_code" id="vendor_code" >
		  <option><none></option>
		  <?php foreach($list_vendor->result() as $resultlist) : ?>
			<option value='<?php print $resultlist->vendor_code; ?>' <?php print(($result->vendor_code==$resultlist->vendor_code)?'selected':''); ?> ><?php print $resultlist->vendor_name; ?></option>
		  <?php endforeach; ?>	
		  </select>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_payment_date'); ?></label>
		  <div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'><i class="fa fa-calendar"></i></span>
				<input type="text" name="payment_date" id="payment_date" class="form-control" value="<?php echo date_format(date_create($result->payment_date),'m/d/Y'); ?>"/>
		  </div>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_freight_cost'); ?></label>
		  <div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'>Rp</span>
				<input type="text" name="freight_cost" id="freight_cost" class="form-control" placeholder="freight cost ..." value="<?php echo number_format($result->freight_cost); ?>" />
		  </div>
		</div>
		
		<input type='hidden' name='purchase_id' id='purchase_id' value='<?php print $result->purchase_id; ?>' />
		
		<!-- text input 
		<div class="form-group">
		  <label><?php //echo $this->lang->line('form_label_total_payment'); ?></label>
		  <div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'>Rp</span>
				<input type="text" name="total_payment_amount" id="total_payment_amount" class="form-control" placeholder="total payment amount ..." value="<?php //echo set_value('total_payment_amount'); ?>" disabled />
		  </div>
		</div>
		-->
		
		<div class="form-group">
			<button class="btn btn-success" type="submit" ><?php echo $this->lang->line('common_form_elements_save'); ?></button>
			<a href="<?php echo site_url().'/purchase/index'; ?>" class="btn btn-warning" style='float:right'><?php echo $this->lang->line('common_form_elements_cancel'); ?></a>
		</div>
		
	  <?php echo form_close() ; ?>
	  <?php endforeach; ?>
	</div><!-- /.box-body -->
  </div><!-- /.box -->
</div>

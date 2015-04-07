<!-- right column -->
<div class="col-md-7">
  <!-- general form elements disabled -->
  <div class="box box-warning">
	<div class="box-header">
	  <h3 class="box-title"><?php echo $this->lang->line('common_form_elements_form_input_product'); ?></h3>
	</div><!-- /.box-header -->
	
	<div class="box-body">
	  <!--<form role="form">-->
	  <?php echo validation_errors(); ?>
	  <?php echo form_open('product/create_product','role="form"') ; ?>		
	  
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_name'); ?></label>
		  <input type="text" name='prod_name' id='prod_name' class="form-control" placeholder="product name ..." value="<?php echo set_value('prod_name'); ?>" />
		</div>
		
		<!-- textarea -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_description'); ?></label>
		  <textarea name="prod_description" id="prod_description" class="form-control" rows="3" placeholder="product description ..."><?php echo set_value('prod_description'); ?></textarea>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_color'); ?></label>
		  <input type="text" name="prod_color" id="prod_color" class="form-control" placeholder="product color ..." value="<?php echo set_value('prod_color'); ?>" />
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_size'); ?></label>
		  <div class="radio">
			<label><input type="radio" name="prod_size" id="prod_size1" value="S" checked>S </label>&nbsp;&nbsp;&nbsp;&nbsp;
			<label><input type="radio" name="prod_size" id="prod_size2" value="M" >M </label>&nbsp;&nbsp;&nbsp;&nbsp;
			<label><input type="radio" name="prod_size" id="prod_size3" value="L" >L </label>&nbsp;&nbsp;&nbsp;&nbsp;
			<label><input type="radio" name="prod_size" id="prod_size4" value="XL" >XL </label>&nbsp;&nbsp;&nbsp;&nbsp;
			<label><input type="radio" name="prod_size" id="prod_size5" value="XXL" >XXL </label>&nbsp;&nbsp;&nbsp;&nbsp;
		  </div>
		</div>
		
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_unit_price'); ?></label>
			<div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'>Rp</span>
				<input type="text" name="prod_unit_price" id="prod_unit_price" class="form-control" placeholder="product unit price ..." value="<?php echo set_value('prod_unit_price'); ?>" />
			 </div>
		</div>
		
				
		<!-- text input -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_selling_price'); ?></label>
			<div class="input-group">
				<span class="input-group-addon" style='font-weight:bold'>Rp</span>
					<input type="text" name="prod_selling_price" id="prod_selling_price" class="form-control" placeholder="product selling price ..." value="<?php echo set_value('prod_selling_price'); ?>" />
			</div>
		</div>
		
		<!-- select -->
		<div class="form-group">
		  <label><?php echo $this->lang->line('form_label_category'); ?></label>
		  <select class="form-control" name="prod_category" id="prod_category" >
		  <option><none></option>
		  <?php foreach($list_category->result() as $result) : ?>
			<option value='<?php print $result->prod_category; ?>'><?php print $result->prod_cat_name; ?></option>
		  <?php endforeach; ?>	
		  </select>
		</div>
		
		<div class="form-group">
			<button class="btn btn-success" type="submit" ><?php echo $this->lang->line('common_form_elements_save'); ?></button>
			<a href="<?php echo site_url().'/product/index'; ?>" class="btn btn-warning" style='float:right'><?php echo $this->lang->line('common_form_elements_cancel'); ?></a>
		</div>
		
	  <?php echo form_close() ; ?>
	  
	</div><!-- /.box-body -->
  </div><!-- /.box -->
</div>

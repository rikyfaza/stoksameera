	<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->lang->line($lang_line); ?>
            <small><?php echo $this->lang->line($lang_line_small); ?></small>
          </h1>
		  
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $this->lang->line($lang_line); ?></li>
          </ol>
        </section>
		
		<!-- Main content -->
        <section class="content">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<?php if(isset($content)) $this->load->view($content); ?>
			</div>
		</section> <!-- Main content -->

       
      </div><!-- /.content-wrapper -->
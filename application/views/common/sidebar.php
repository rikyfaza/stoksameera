<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
	  <!-- Sidebar user panel -->
	  <div class="user-panel">
		<div class="pull-left image">
		  <img src="<?php echo base_url().'dist/img/5dca0ec005928a9b1e12c7add4bbb4ab.jpg'; ?>" class="img-circle" alt="User Image" />
		</div>
		<div class="pull-left info">
		  <p><?php echo $this->lang->line('system_user_name'); ?></p>

		  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		</div>
	  </div>
	  
	  <!-- search form 
	  <form action="#" method="get" class="sidebar-form">
		<div class="input-group">
		  <input type="text" name="q" class="form-control" placeholder="Search..."/>
		  <span class="input-group-btn">
			<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
		  </span>
		</div>
	  </form>
	  <!-- /.search form -->
	  
	  <!-- sidebar menu: : style can be found in sidebar.less -->
	  <ul class="sidebar-menu">
		<li class="header">MAIN NAVIGATION</li>
		<li class="<?php echo (($active_page=='dashboard')?'active treeview':'treeview');?>">
		  <a href="<?php echo site_url().'/dashboard/index'; ?>" >
			<i class="fa fa-dashboard"></i> <span>Dashboard</span> 
		  </a>   
		</li>
	   
		<li class="<?php echo (($active_page=='catalog')?'active treeview':'treeview');?>">
		  <a href="#">
			<i class="fa fa-book"></i>
			<span>Catalog</span>
			<i class="fa fa-angle-left pull-right"></i>
		  </a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo site_url().'/product/index'; ?>"><i class="fa fa-circle-o"></i> Products</a></li>
			<li><a href="<?php echo site_url().'/category/index'; ?>"><i class="fa fa-circle-o"></i> Categories</a></li>
			<li><a href="<?php echo site_url().'/vendor/index'; ?>"><i class="fa fa-circle-o"></i> Vendors</a></li>
		  </ul>
		</li>
		
		<li class="<?php echo (($active_page=='customers')?'active treeview':'treeview');?>">
		  <a href="#">
			<i class="fa fa-users"></i>
			<span>Customers</span>
			<i class="fa fa-angle-left pull-right"></i>
		  </a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo site_url().'/customer/index'; ?>"><i class="fa fa-circle-o"></i> Customers</a></li>
			<li><a href="<?php echo site_url().'/customer_group/index'; ?>"><i class="fa fa-circle-o"></i> Groups</a></li>
		  </ul>
		</li>
		
		<li class="<?php echo (($active_page=='order')?'active treeview':'treeview');?>">
		  <a href="#">
			<i class="fa fa-archive"></i>
			<span>Orders</span>
			<i class="fa fa-angle-left pull-right"></i>
		  </a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo site_url().'/purchase/index'; ?>"><i class="fa fa-circle-o"></i> Purchases to Vendor </a></li>
			<li>
				<a href="#"><i class="fa fa-circle-o"></i> Receipt of Orders <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo site_url().'/receipt/index'; ?>"><i class="fa fa-circle-o"></i> Active Orders</a></li>
						<li><a href="<?php echo site_url().'/receipt/history_index'; ?>"><i class="fa fa-circle-o"></i> History</a></li>
					</ul>
			</li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Purchases From Customer</a></li>
		  </ul>
		</li>
		
		<li class="treeview">
		  <a href="#">
			<i class="fa fa-print"></i>
			<span>Reports</span>
			<i class="fa fa-angle-left pull-right"></i>
		  </a>
		  <ul class="treeview-menu">
			<li><a href="#"><i class="fa fa-circle-o"></i> Inventory List Report</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Active Inventory Report</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Out of Stock Report</a></li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Vendor List Report</a></li>
		  </ul>
		</li>
		
	  </ul>
	</section>
	<!-- /.sidebar -->
 </aside>
<?php
	$this->load->view('common/header');
	$this->load->view('common/main_header');
	$this->load->view('common/sidebar');
	$this->load->view('common/content', $page_data);
	$this->load->view('common/footer');
	
?>
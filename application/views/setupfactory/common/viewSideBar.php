<?php $this->load->view('setupfactory/common/viewTopHeader.php');?>
<?php
	if( FALSE == isset( $this->session->userdata['logged_in']['user_id'] ) ) {
		redirect('csetupfactory','refresh');
	}

	if( TRUE == isset( $this->session->userdata['profile_pic']['profile_pic'] ) && '' != $this->session->userdata['profile_pic']['profile_pic']  && NULL != $this->session->userdata['profile_pic']['profile_pic'] ){

		$strPicSrc = $this->session->userdata['profile_pic']['profile_pic'];

	} else {
		$strPicSrc = base_url()."assets/images/factory/default_profile_pic.png";
	}
?>
<!-- Common Custom CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/styles/dashboard/dashboard-sidebar-style.css " type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/dashboard/dashboard-sidebar-script.js" ></script>
<BODY class="body-back-color">
<div id="loading-gif" class="se-pre-con"></div>
<!-- Use any element to open the sidenav -->
<div class="fixed-top container-fluid" style="margin:0px; padding: 0px">
	<button onclick="openNav()" type="button" class="btn btn-outline-primary border-0 float-left">
		<i class="fa fa-bars fa-2x" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Menu"></i>
	</button>
	<a class="float-right btn btn-outline-primary border-0" href="<?php echo base_url();?>csetupfactory/fcunlock/signOut" data-toggle="tooltip" data-placement="left" title="Log Out"><i class="fas fa-sign-out-alt fa-2x"></i></a>
</div>
<div id="mySidenav" class="sidenav bg-primary">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div style="" class="d-flex justify-content-center" id="div_sidebar_img">
  	<img src="<?php echo $strPicSrc;?>" class="rounded-circle img-fluid sidebar-image" style="">
  </div>
  <div style="padding-left: 15%; padding-bottom: 20px">
	<a href="<?php echo base_url();?>csetupfactory">DASHBOAD</a>
	<a href="<?php echo base_url();?>csetupfactory/fcuserdetailfactory">GENERAL DETAIL</a>
	<a href="<?php echo base_url();?>csetupfactory/fcuserpersonaldetailfactory">PERSONAL DETAILS</a>
	<a href="<?php echo base_url();?>csetupfactory/fcusereducationaldetailfactory">EDUCATIONAL DETAILS</a>
	<a href="<?php echo base_url();?>csetupfactory/fcuserskilldetailfactory">SKILL DETAILS</a>
	<a href="<?php echo base_url();?>csetupfactory/fcusercompanydetailfactory">COMPANY DETAILS</a>
	<a href="<?php echo base_url();?>csetupfactory/fcuserprojectdetailfactory">PROJECT DETAILS</a>
	<a href="<?php echo base_url();?>csetupfactory/fcuseractivitydetailfactory">EXTRA ACTIVITIES</a>
 </div>
</div>




<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">
 
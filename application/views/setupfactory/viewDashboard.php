<?php $this->load->view('setupfactory/common/viewSideBar');

	if( TRUE == isset( $this->session->userdata['logged_in']['user_id'] ) ) {
?>
<div class="container content-div">
	
	<h3>Welcome <?php echo $this->session->userdata['logged_in']['first_name'].' '.$this->session->userdata['logged_in']['last_name'];?></h3>
	<p>Your mail id is <?php echo $this->session->userdata['logged_in']['email_address'];?> and your Id is : <?php echo $this->session->userdata['logged_in']['user_id'];?></p>
	<a href="<?php echo base_url();?>csetupfactory/fcuserdetailfactory">ADD YOUR DETAIL</a>

</div>
<?php $this->load->view('setupfactory/common/viewFooter');?>
<?php
	}else {

		echo 'hii';
		redirect('csetupfactory','refresh');
	}
?>

	



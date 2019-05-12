
<?php

$this->load->view('setupfactory/common/viewSideBar');
	
	if( TRUE == isset( $this->session->userdata['profile_pic']['profile_pic'] ) && '' != $this->session->userdata['profile_pic']['profile_pic'] && NULL != $this->session->userdata['profile_pic']['profile_pic'] ){

		$strPicSrc = $this->session->userdata['profile_pic']['profile_pic'];

	} else {
		$strPicSrc = base_url()."assets/images/factory/default_profile_pic.png";
	}

	
?>



<div class="container content-div">
	<div class="row">
		
	  	<div class="col-md-12  col-lg-8 offset-lg-2 col-sm-12 col-xs-12">

	  		<?php
			
		 	if( ( NULL !== $this->session->flashdata( 'message' ) ) && ( 'user_details' == $this->session->flashdata( 'controller' ) ) ){
		?>
			<div class="dashboard-message <?php if( 'success' == $this->session->flashdata( 'message_type' ) ) {?> message-success <?php }else{?> message-fail <?php }?>" style="margin-top: 0px !important; padding-left:30px; padding-right: 30px;" id="div_msg">
				<?php echo $this->session->flashdata('message');?>
					
			</div>
	<?php }?>
	  		
	  		<h3  class="text-center">MANAGE YOUR DETAIL</h3>			
			
				<?php 
			
		    $attributes = array('class' => 'form-adduser card', 'id' => 'formAdduser', 'name' => 'formAdduser', 'style' => 'padding: 20px');
		    echo form_open_multipart('csetupfactory/fcuserdetailfactory/addUpdateUser',$attributes); 
		?>
			  <div class="row">
				  <!----<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
					  <div class="form-group justify-content-center d-flex">
					    
					  	<img src="<?php echo base_url();?>assets/images/factory/default_profile_pic.png" class="rounded-circle img-fluid sidebar-image custom-file-control" style="height: 150px; width: 150px">	  
					  </div>					  
				  </div>--->
				  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
					  <div class="form-group justify-content-center d-flex ">
					    <label class = "" >
					    	<input type="file" id="file" class="custom-file-input" name="profile_pic" id="imageUpload" onchange="readURL(this)">
					    	
					    	<!---<img src="<?php echo $strPicSrc;?>" class="rounded-circle img-fluid sidebar-image custom-file-control  upload-label" style="height: 150px; width: 150px; margin:auto !important; padding:0px !important;" onmouseover="pointupload(this)" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Upload Picture" id="imagePreview">-->
					    	<div class="rounded-circle img-fluid custom-file-control  upload-label profile-pic-div text-center" style=" background-image: url('<?php echo $strPicSrc;?>') !important;" onmouseover="pointupload(this)" onmouseout="pointout(this)" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Upload Picture" id="imagePreview" ><i class="fas fa-camera fa-2x rounded-circle profile-pic-upload-icon" style="" ></i>
					    	</div>
						</label>
						<input type="hidden" name="profile_pic_name" value="<?php echo $profile_pic;?>"" id="hid_profile_pic_name">
					</div>
					  
					  					  
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
					  <div class="form-group">
					    <label for="txt_add_edit_first_name">First Name</label>
					    <input type="text" class="form-control" id="txt_add_edit_first_name" placeholder="First Name" name="first_name" value="<?php echo $first_name;?>" required>
					    <?php 
					      	$strCheck[0] = 'N'.form_error('first_name');
					      	if( 'N' !==  $strCheck[0] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('first_name');?></label>
					  	<?php }?>
					  </div>
				  </div>
				  <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
					  <div class="form-group">
					    <label for="txt_add_edit_middle_name">Middle Name</label>
					    <input type="text" class="form-control" id="txt_add_edit_middle_name" placeholder="Middle Name" name="middle_name" value="<?php echo $middle_name;?>">					    
					  </div>
				  </div>
				  <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
					  <div class="form-group">
					    <label for="txt_add_edit_last_name">Last Name</label>
					    <input type="text" class="form-control" id="txt_add_edit_last_name" placeholder="Last Name" name="last_name" value="<?php echo $last_name;?>" required>
					    <?php 
					      	$strCheck[1] = 'N'.form_error('last_name');
					      	if( 'N' !==  $strCheck[1] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('last_name');?></label>
					  	<?php }?>
					  </div>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
					  <div class="form-group">
					    <label for="txt_email_address">Email address</label>
					    <input type="email" class="form-control" id="txt_email_address" placeholder="name@example.com" name="email_address" value="<?php echo $email_address;?>" required>
					  </div>

					    <?php 
					      	$strCheck[2] = 'N'.form_error('email_address');
					      	if( 'N' !==  $strCheck[2] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('email_address');?></label>
					  	<?php }?>
				  </div>
			 </div>
			 <div class="row">
				 <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
					  <div class="form-group">
					    <label for="txt_date_of_birth">Date of Birth</label>
					    <input type="text" class="form-control datepic" id="txt_date_of_birth" placeholder="dd/mm/yyyy" name="birth_date" value="<?php echo $birth_date;?>" required readonly>
					  </div>

					    <?php 
					      	$strCheck[3] = 'N'.form_error('birth_date');
					      	if( 'N' !==  $strCheck[3] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('birth_date');?></label>
					  	<?php }?>
				 </div>
				 <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
					  <div class="form-group">
					    <label for="sel_gender">Gender</label>
					    <select class="form-control" id="sel_gender" name="gender" required>
					      <option value="N" <?php if('M' != $gender || 'F' != $gender ){ echo 'selected'; } ?> >Select</option>
					      <option value="M" <?php if('M' == $gender ){ echo 'selected'; } ?>  >Male</option>
					      <option value="F" <?php if('F' == $gender ){ echo 'selected'; } ?> >Female</option>
					    </select>
					  </div>

					    <?php 
					      	$strCheck[4] = 'N'.form_error('gender');
					      	if( 'N' !==  $strCheck[4] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('gender');?></label>
					  	<?php }?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
				  <div class="form-group">
				    <label for="txt_contact_1">Primary Contact Number</label>
				    <input type="number" class="form-control" id="txt_contact_1" placeholder="0000000000" name="contact_no1" value="<?php echo $contact_no1;?>" required>
				  </div>

				    <?php 
					      	$strCheck[5] = 'N'.form_error('contact_no1');
					      	if( 'N' !==  $strCheck[5] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('contact_no1');?></label>
					  	<?php }?>
				</div> 
				<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
				  <div class="form-group">
				    <label for="txt_contact_2">Secondary Contact Number</label>
				    <input type="number" class="form-control" id="txt_contact_2" placeholder="0000000000" name="contact_no2" value="<?php echo $contact_no2;?>">
				  </div>

				    <?php 
					      	$strCheck[11] = 'N'.form_error('contact_no2');
					      	if( 'N' !==  $strCheck[11] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('contact_no2');?></label>
					  	<?php }?>
				</div>
			</div>
			 <!-- <div class="form-group">
			    <label for="exampleFormControlSelect2">Example multiple select</label>
			    <select multiple class="form-control" id="exampleFormControlSelect2">
			      <option>1</option>
			      <option>2</option>
			      <option>3</option>
			      <option>4</option>
			      <option>5</option>
			    </select>
			  </div>-->
			  <div class="row">
				  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
					  <div class="form-group">
					    <label for="txt_current_add">Current Address</label>
					    <textarea class="form-control" id="txt_current_add" rows="3" name="current_address" required><?php if(null != set_value('current_address')){echo set_value('current_address');}else{ echo $current_address;}?></textarea>
					  </div>

					    <?php 
					      	$strCheck[6] = 'N'.form_error('current_address');
					      	if( 'N' !==  $strCheck[6] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('current_address');?></label>
					  	<?php }?>
					  <label class="float-right">
					  	<div class="checkbox">
						    <label>
						      <input id="chekaddress" name="chekaddress" type="checkbox"  onchange="checkaddress(this)"  <?php if (true == $same_addr){ echo 'checked'; } ?>>
						      Current address is my Permenent address.
						    </label>
						 </div>
				          <input type="hidden" name="same_addr" id="hid_same_addr" value="<?php echo $same_addr;?>">
				      </label>
				 </div>
		      </div>
	     	  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			  		<div class="form-group">
					    <label for="txt_per_add">Permenant Address</label>
					    <textarea class="form-control" id="txt_per_add" rows="3" name="per_address" required><?php if(null != set_value('per_address')){echo set_value('per_address');}else{ echo $per_address;}?></textarea>
			  		</div>

					    <?php 
					      	$strCheck[7] = 'N'.form_error('per_address');
					      	if( 'N' !==  $strCheck[7] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('per_address');?></label>
					  	<?php }?>
				</div>
	   		  </div>
			  <div class="row">
				<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
				  	<div class="form-group">
					    <label for="txt_city">City</label>
					    <input type="text" class="form-control" id="txt_city" placeholder="City" name="city" value="<?php echo $city;?>" required>
				  	</div>

					    <?php 
					      	$strCheck[8] = 'N'.form_error('city');
					      	if( 'N' !==  $strCheck[8] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('city');?></label>
					  	<?php }?>
				</div>
				<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
				 	<div class="form-group">
				    	<label for="txt_state">State</label>
				    	<input type="text" class="form-control" id="txt_state" placeholder="State" name="state" value="<?php echo $state;?>" required>
				  	</div>

				    	<?php 
					      	$strCheck[9] = 'N'.form_error('state');
					      	if( 'N' !==  $strCheck[9] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('state');?></label>
					  	<?php }?>
			 	</div>
			 	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
				  	<div class="form-group">
					    <label for="txt_country">Country</label>
					    <input type="text" class="form-control" id="txt_country" placeholder="Country" name="country" value="<?php echo $country;?>" required>
				  	</div>

					    <?php 
					      	$strCheck[10] = 'N'.form_error('country');
					      	if( 'N' !==  $strCheck[10] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('country');?></label>
					  	<?php }?>
			  	</div>
			  </div>
			  <div class="row">
				  <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
					  <div class="form-group">
					    <label for="txt_facebook_link">Facebook profile Link</label>
					    <input type="text" class="form-control" id="txt_facebook_link" placeholder="https//:facebook.com/profile" name="facebook_link" value="<?php echo $facebook_link;?>">
					  </div>
					  <?php 
					      	$strCheck[11] = 'N'.form_error('facebook_link');
					      	if( 'N' !==  $strCheck[11] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('facebook_link');?></label>
					  	<?php }?>
				  </div>
				  <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
					  <div class="form-group">
					    <label for="txt_linkedin_link">Linked In Link</label>
					    <input type="text" class="form-control" id="txt_linkedin_link" placeholder="https//:linkedin.com/profile" name="linkedin_link" value="<?php echo $linkedin_link;?>">
					  </div>
					  <?php 
					      	$strCheck[11] = 'N'.form_error('linkedin_link');
					      	if( 'N' !==  $strCheck[11] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('linkedin_link');?></label>
					  	<?php }?>
				  </div>
				  <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
					  <div class="form-group">
					    <label for="txt_twitter_link">Twitter Link</label>
					    <input type="text" class="form-control" id="txt_twitter_link" placeholder="https//:twitter.com/profile" name="twitter_link" value="<?php echo $twitter_link;?>">
					  </div>
					  <?php 
					      	$strCheck[11] = 'N'.form_error('twitter_link');
					      	if( 'N' !==  $strCheck[11] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('twitter_link');?></label>
					  	<?php }?>
				  </div>			  
			  </div>
			  <div class="row">
				  <input type="hidden" name="id" id="hid_id" value="<?php echo $id;?>">
				  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				  	<button type="Submit" class="btn btn-outline-primary btn-lg btn-block">Submit</button>
				  </div>
			  </div>
			</form>
	  		
	  	</div>
	</div>


</div>

<?php $this->load->view('setupfactory/common/viewFooter');?>
	


<?php //include_once("application/views/setupfactory/common/viewTopHeader.php"); ?>

<?php $this->load->view('setupfactory/common/viewTopHeader.php');?>
<!-- Custom styles for this template -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/styles/dashboard/loginpage.css " type="text/css" media="screen" />
</HEAD>
<BODY class="text-center">
	<div id="div_login" class="col-lg-12" <?php if( 'signup' == $strShowFormValue ){?> style="display: none"<?php } ?> >
		<?php
			
		 	if( ( NULL !== $this->session->flashdata( 'message' )  ) ){
		?>
			<div class="dashboard-message <?php if( 'success' == $this->session->flashdata( 'message_type' ) ) {?> message-success <?php } else{?> message-fail <?php }?>">
				<?php echo $this->session->flashdata('message');?>
					
			</div>
	<?php }?>
	    <?php 
		 
		    $attributes = array('class' => 'form-signin card', 'id' => 'formSignin', 'name' => 'formSignin');
		    echo form_open('csetupfactory/fcunlock/signIn',$attributes); 

		    $strSetUserName ='';
		    if ( NULL != set_value('user_name', NULL ) ) {

		    	$strSetUserName = set_value('user_name');

		    } else if( NULL != get_cookie('entryn') ) {

		    	$strSetUserName = get_cookie('entryn');
		    }

		    $strSetPassword ='';
		    if ( NULL != set_value('password', NULL )  ) {

		    	$strSetPassword = set_value('password');

		    } else if( NULL != get_cookie('entryp') ) {
		    	
		    	$strSetPassword = get_cookie('entryp');
		    }

		    $boolIsChecked = FALSE;
		    if( ( NULL != get_cookie('entryp') ) && ( NULL != get_cookie('entryn') ) ) {
		    	$boolIsChecked = TRUE;
		    }

		?>
	    	

	      <img class="mb-2" src="<?php echo base_url();?>assets/images/common/logo.png" alt="" width="150" style="margin: auto">
	      <h2 class="h5 mb-6 font-weight-normal text-danger">Unlock and Get In</h2>
	      <label for="inputEmail_login" class="sr-only">Email address</label>
	      <input type="text" id="inputEmail_login" name="user_name" class="form-control" placeholder="Email address or Username" required autofocus maxlength="50" value="<?php echo trim($strSetUserName); ?>">

	      <?php 
		      	
		      	if( ( FALSE ===  $arrmixValidationError['result'] && FALSE ===  $arrmixValidationError['val_username'] ) && ( 'signin' == $strShowFormValue ) ){
		      ?>
		      <label class="error message-fail form-control">Email Id or User Name Reuired!</label>
		  <?php }?>

	      <label for="inputPassword_login" class="sr-only">Password</label>
	      <input type="password" id="inputPassword_login" name="password" class="form-control" placeholder="Password" required maxlength="200" value="<?php echo trim($strSetPassword); ?>">

	      <?php 
		      	
		      	if( ( FALSE ===  $arrmixValidationError['result'] && FALSE ===  $arrmixValidationError['val_password'] ) && ( 'signin' == $strShowFormValue ) ){
		      ?>
		      <label class="error message-fail form-control">Password Reuired!</label>
		  <?php }?>

	      <div class="checkbox mb-3">
	        <label>
	          <input id="chekRemember_login" name="chekRemember_login" type="checkbox" value="" onchange="checkRememberMe(this)" <?php if( TRUE === $boolIsChecked ){ echo 'checked'; }?> > Remember me
	        </label>
	        <input type="hidden" name="remember_me_value" id ="remember_me_value" value="<?php if( TRUE === $boolIsChecked ){ echo 1; } else { echo 0; }?>">
	      </div>
	      <button id="btnSubmit_login" class="btn btn-lg btn-primary btn-block mb-3" type="submit"><i class="fas fa-unlock-alt"></i> Unlock Now</button>
	      <button id="btnSignup_login" class="btn btn-lg btn-block btn-danger mb-3" type="button" onclick="hideandshow('div_login','div_signup')"><i class="fas fa-key"></i> Get your Key</button>
	      <p class=" mb-3 text-muted">&copy; 2018-2019</p>
	    </form>		
	</div>
	<div id="div_signup" class="col-lg-12" <?php if( 'signin' == $strShowFormValue ){?> style="display: none"<?php } ?>>
		<?php
			
		 	if( ( NULL !== $this->session->flashdata( 'message' )  ) ){
		?>
			<div class="dashboard-message <?php if( 'success' == $this->session->flashdata( 'message' ) ) {?> message-success <?php } else{?> message-success <?php }?>">
				<?php echo $this->session->flashdata('message');?>
					
			</div>
	<?php }?>
		<?php 
			
		    $attributes = array('class' => 'form-signin card', 'id' => 'formSignup', 'name' => 'formSignup');
		    echo form_open('csetupfactory/fcunlock/addSignUp',$attributes); 
		?>
		      <img class="mb-2" src="<?php echo base_url();?>assets/images/common/logo.png" alt="" width="150" style="margin: auto">
		      <h2 class="h5 mb-6 font-weight-normal text-danger">Register for keys.</h2>
		      <label for="inputFirstName_signup" class="sr-only">First Name</label>
		      <input type="text" id="inputFirstName_signup" name="first_name" class="form-control" placeholder="First Name" required autofocus maxlength="50" value="<?php echo set_value('first_name'); ?>">
		      <?php 
		      	$strCheck[0] = 'N'.form_error('first_name');
		      	if( ( 'N' !==  $strCheck[0] ) && ( 'signup' == $strShowFormValue ) ){
		      ?>
		      <label class="error message-fail form-control"><?php echo form_error('first_name');?></label>
		  <?php }?>
		      <label for="inputLastName_signup" class="sr-only">Last Name</label>
		      <input type="text" id="inputLastName_signup" name="last_name" class="form-control" placeholder="Last Name" required autofocus maxlength="50" value="<?php echo set_value('last_name'); ?>">
		      <?php 
		      	$strCheck[1] = 'N'.form_error('last_name');
		      	if( ( 'N' !==  $strCheck[1] ) && ( 'signup' == $strShowFormValue ) ){
		      ?>
		      <label class="error message-fail form-control"><?php echo form_error('last_name');?></label>
		  <?php }?>

		      <label for="inputEmail_signup" class="sr-only">Email address</label>
		      <input type="email" id="inputEmail_signup" name="email_address" class="form-control" placeholder="Email address" required autofocus maxlength="50" value="<?php echo set_value('email_address'); ?>">
		      <?php 
		      	$strCheck[2] = 'N'.form_error('email_address');
		      	if( ( 'N' !==  $strCheck[2] ) && ( 'signup' == $strShowFormValue ) ){
		      ?>
		      <label class="error message-fail form-control"><?php echo form_error('email_address');?></label>
		  <?php }?>

		      <label for="inputPassword_signup" class="sr-only">Password</label>
		      <input type="password" id="inputPassword_signup" name="password" class="form-control" placeholder="Password" required autofocus maxlength="200">
		      <?php 
		      	$strCheck[3] = 'N'.form_error('password');
		      	if( ( 'N' !==  $strCheck[3] ) && ( 'signup' == $strShowFormValue ) ){
		      ?>
		      <label class="error message-fail form-control"><?php echo form_error('password');?></label>
		  <?php }?>

		      <label for="inputConfirmPassword_signup" class="sr-only"> Confirm Password</label>
		      <input type="password" id="inputConfirmPassword_signup" name="confirm_p" class="form-control mb-3" placeholder=" Confirm Password" required autofocus maxlength="200">
		      <?php 
		      	$strCheck[4] = 'N'.form_error('confirm_p');
		      	if( ( 'N' !==  $strCheck[4] ) && ( 'signup' == $strShowFormValue ) ){
		      ?>
		      <label class="error message-fail form-control"><?php echo form_error('confirm_p');?></label>
		  <?php }?>

		      <button id="btnSubmit_signup" class="btn btn-lg btn-primary btn-block mb-3" type="submit"><i class="fas fa-key"></i> Give me Keys</button>
		      <button id="btnCancel_signup" class="btn btn-lg btn-block btn-danger mb-3" type="button" onclick="resetform('#formSignup'), hideandshow('div_signup','div_login')" ><i class="fas fa-ban"></i> Cancel</button>
		      <p class=" mb-3 text-muted">&copy; 2018-2019</p>
		    </form>
	</div>

<?php $this->load->view('setupfactory/common/viewFooter.php');?>
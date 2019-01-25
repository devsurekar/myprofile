
<?php $this->load->view('setupfactory/common/viewSideBar');?>


<div class="container content-div">
	<div class="row">
	  	<div class="col-md-12  col-lg-8 offset-lg-2 col-sm-12 col-xs-12">
	  		<?php
			
		 	if( ( NULL !== $this->session->flashdata( 'message' ) ) && ( 'personal_details' == $this->session->flashdata( 'controller' ) ) ){
		?>
			<div class="dashboard-message <?php if( 'success' == $this->session->flashdata( 'message_type' ) ) {?> message-success <?php }else{?> message-fail <?php }?>" style="margin-top: 0px !important; padding-left:30px; padding-right: 30px;" id="div_msg">
				<?php echo $this->session->flashdata('message');?>
					
			</div>
	<?php }?>

	  		<h3>MANAGE PERSONAL DETAIL</h3>
	  		<?php 
			
		    $attributes = array('class' => 'card', 'id' => 'formAddpersonalDetails', 'name' => 'formAddpersonalDetails', 'style' => 'padding: 20px');
		    echo form_open('csetupfactory/fcuserpersonaldetailfactory/addUpdatePersonalDetail',$attributes); 
		?>			
			<form class="card" style="padding: 20px">
			  <div class="row">
				 <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
					  <div class="form-group">
					    <label for="sel_gender">Marital Status</label>
					    <select class="form-control" id="sel_marital" name="marital_status">
					      <option value="N" <?php if( "N" == $marital_status ){echo "Selected";}?> >Select</option>
					      <option value="S" <?php if( "S" == $marital_status ){echo "Selected";}?> >Single</option>
					      <option value="M" <?php if( "M" == $marital_status ){echo "Selected";}?> >Married</option>
					    </select>
					    <?php 
					      	$strCheck[0] = 'N'.form_error('marital_status');
					      	if( 'N' !==  $strCheck[0] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('marital_status');?></label>
					  	<?php }?>
					  </div>
				</div>
			</div>
			<div class="row">
				  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
					  <div class="form-group">
					    <label for="txt_hobby">Hobbies (eg. Photography, Travailing, Playing)</label>
					    <textarea class="form-control" id="txt_hobby" rows="3" name="hobby"><?php if(null != set_value('hobby')){echo set_value('hobby');}else{ echo $hobby;}?></textarea>
					    <?php 
					      	$strCheck[1] = 'N'.form_error('hobby');
					      	if( 'N' !==  $strCheck[1] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('hobby');?></label>
					  	<?php }?>
					  </div>
				 </div>
		      </div>
	     	  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			  		<div class="form-group">
					    <label for="txt_strenth">Strenth  (eg. Can handle work pressure, Adoptable, Efficiencent)</label>
					    <textarea class="form-control" id="txt_strenth" rows="3" name="strenth"><?php if(null != set_value('strenth')){echo set_value('strenth');}else{ echo $strenth;}?></textarea>
					    <?php 
					      	$strCheck[2] = 'N'.form_error('strenth');
					      	if( 'N' !==  $strCheck[2] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('strenth');?></label>
					  	<?php }?>
			  		</div>
				</div>
	   		  </div>
			  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			  		<div class="form-group">
					    <label for="txt_weaknes">Weakness (eg. Imotional, Icecreams, Chocolates)</label>
					    <textarea class="form-control" id="txt_weaknes" rows="3" name="weaknes"><?php if(null != set_value('weaknes')){echo set_value('weaknes');}else{ echo $weaknes;}?></textarea>
					    <?php 
					      	$strCheck[3] = 'N'.form_error('weaknes');
					      	if( 'N' !==  $strCheck[3] ){
					      ?>
					      <label class="error message-fail form-control"><?php echo form_error('weaknes');?></label>
					  	<?php }?>
			  		</div>
				</div>
	   		  </div>
			  <div class="row">
				  <input type="hidden" name="user_details__id" id="hid_user_details_id" value="<?php echo $this->session->userdata['logged_in']['user_id'];?>">
				  <input type="hidden" name="id" id="hid_personaldetails_id" value="<?php echo $id;?>">
				  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				  	<button type="Submit" class="btn btn-outline-primary btn-lg btn-block">Submit</button>
				  </div>
			  </div>
			</form>
	  		
	  	</div>
	</div>


</div>
<?php $this->load->view('setupfactory/common/viewFooter');?>
	


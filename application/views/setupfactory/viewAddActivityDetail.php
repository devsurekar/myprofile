
<?php $this->load->view('setupfactory/common/viewSideBar');?>


<div class="container content-div">
	<div class="row">
	  	<div class="col-md-12  col-lg-8 offset-lg-2 col-sm-12 col-xs-12">
	  		<?php
			
		 	if( ( NULL !== $this->session->flashdata( 'message' ) ) && ( 'activity_details' == $this->session->flashdata( 'controller' ) ) ){
			?>
		<div class="dashboard-message <?php if( 'success' == $this->session->flashdata( 'message_type' ) ) {?> message-success <?php }else{?> message-fail <?php }?>" style="margin-top: 0px !important; padding-left:30px; padding-right: 30px;" id="div_msg">
				<?php echo $this->session->flashdata('message');?>
					
		</div>
			<?php }?>

		<div class="alert alert-danger" style="display:none">

		</div>
		<div class="alert alert-success" style="display:none">

		</div>
	  		<h3  class="text-center">MANAGE EXTRA CRRICULAR DETAIL</h3>
	  		<?php
			
		    $attributes = array('class' => 'card', 'id' => 'formAddActivityDetails', 'name' => 'formAddActivityDetails', 'style' => 'padding: 20px');
		    echo form_open('csetupfactory/fcuseractivitydetailfactory/addUpdateActivityDetail',$attributes); 
			?>				
			<!---<form class="card" style="padding: 20px" id="form_activity">--->
			<section id="section_activity">
				<!------------------>
				<?php if( false == $arrmixActivityData ) { ?>
				<div class="top-row"  id="divrow_id_0">
			    <div class="row">
				  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">				  	
					  <div class="form-group">
					  <a href="#" id="0" onclick="deleteSection(this)" class="badge badge-danger float-right" style="margin-top: 20px; padding:10px"> Remove Activity</a>					  	
					    <label for="txt_add_edit_heading">Heading</label>
					    <input type="text" class="form-control" id="txt_add_edit_heading_0" placeholder="Activity heading" name="heading">
					  </div>
				  </div>
		       	</div>	   		  
			  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			  		<div class="form-group">
					    <label for="txt_activity_discription">Discription</label>
					    <textarea class="form-control" id="txt_activity_discription_0" rows="3" name="discription"></textarea>
					    <input type="hidden" name="activity_id_0" id="hid_id_0" value="0">
			  		</div>
				</div>
	   		  </div>
	   		   <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
						<div class="checkbox">
						    <label>
						      <input type="checkbox" id="check_showonwebsite_0" name="check_showonwebsite_0" checked > Show on website
						    </label>
						 </div>
					</div>
				</div>	   		  
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">				    
						<div class="checkbox">
						    <label>
						      <input type="checkbox" id="check_showonresume_0" name="check_showonresume_0" checked >
						      Show on resume
						    </label>
						 </div>
					</div>
				</div>
	   		  </div>
	   		  
	   		</div>
	   		  <!------------------------->
	   		   <?php } 
	   		  else {
						foreach($arrmixActivityData AS $intIndex=> $arrmixActivityData) {?>

				<div class="top-row"   id="divrow_id_<?php echo $intIndex; ?>">
				<div class="row">
				  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">				  	
					  <div class="form-group">
					  <a href="#" id="<?php echo $intIndex;?>" onclick="deleteSection(this)" class="badge badge-danger float-right" style="margin-top: 20px; padding:10px"> Remove Activity</a>					  	
					    <label for="txt_add_edit_heading">Heading</label>
					    <input type="text" class="form-control" id="txt_add_edit_heading<?php echo '_'.$intIndex;?>" placeholder="Activity heading" name="heading" value="<?php echo $arrmixActivityData->heading;?>">
					  </div>
				  </div>
		       	</div>	   		  
			  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			  		<div class="form-group">
					    <label for="txt_activity_discription">Discription</label>
					    <textarea class="form-control" id="txt_activity_discription<?php echo '_'.$intIndex;?>" rows="3" name="discription"><?php echo $arrmixActivityData->discription;?></textarea>
					    <input type="hidden" name="activity_id_<?php echo 'row_'. $intIndex;?>" id="hid_id<?php echo '_'.$intIndex;?>" value="<?php echo $arrmixActivityData->id;?>">
			  		</div>
				</div>
	   		  </div>
	   		 <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
						<div class="checkbox">
						    <label>
						      <input type="checkbox" id="check_showonwebsite<?php echo '_'.$intIndex;?>" name="check_showonwebsite<?php echo '_'.$intIndex;?>" <?php if( '1' == $arrmixActivityData->show_on_website) { echo 'checked';}?> > Show on website
						    </label>
						 </div>
					</div>
				</div>	   		  
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">				    
						<div class="checkbox">
						    <label>
						      <input type="checkbox" id="check_showonresume<?php echo '_'.$intIndex;?>" name="check_showonresume<?php echo '_'.$intIndex;?>" <?php if( '1' == $arrmixActivityData->show_on_resume) { echo 'checked';}?> > Show on resume
						    </label>
						 </div>
					</div>
				</div>
	   		  </div>
	   		</div>

				<!------------------------->
				<?php }
					}
					?>
	   		</section>
	   		<caption>
			     	<button type="button" class="btn btn-primary" id="btn_add_edu_row" onclick="addActivitySection(1)">
					  ADD MORE ACTIVITIES
					</button>
			</caption>
			  <div class="row">
				  <input type="hidden" name="id" id="hid_id" value="<?php echo $this->session->userdata['logged_in']['user_id'];?>">
				  <input type="hidden" name="row_count" id="hid_row_count" value="<?php if(isset($intIndex)){ echo $intIndex;} else{ echo 0;} ?>">
				  <input type="hidden" name="delete_id" id="hid_delete" value="0">
				  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				  <button type="button" class="btn btn-outline-primary btn-lg btn-block" onclick="submitActivityDetails()">Submit</button>
				  </div>
			  </div>
			</form>
	  		
	  	</div>
	</div>


</div>
<?php $this->load->view('setupfactory/common/viewFooter');?>
	


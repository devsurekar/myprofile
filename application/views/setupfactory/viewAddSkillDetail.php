
<?php $this->load->view('setupfactory/common/viewSideBar');?>


<div class="container content-div">
	<div class="row">
	  	<div class="col-md-12  col-lg-12 col-sm-12 col-xs-12">
	  		<?php
			
		 	if( ( NULL !== $this->session->flashdata( 'message' ) ) && ( 'skill_details' == $this->session->flashdata( 'controller' ) ) ){
			?>
			<div class="dashboard-message <?php if( 'success' == $this->session->flashdata( 'message_type' ) ) {?> message-success <?php }else{?> message-fail <?php }?>" style="margin-top: 0px !important; padding-left:30px; padding-right: 30px;" id="div_msg">
				<?php echo $this->session->flashdata('message');?>
					
			</div>
			<?php }?>

			 <div class="alert alert-danger" style="display:none">

			 </div>
			 <div class="alert alert-success" style="display:none">

			 </div>
	  		<h3  class="text-center">MANAGE SKILL DETAIL</h3>
	  		<?php
			
		    $attributes = array('class' => 'card', 'id' => 'formAddSkillDetails', 'name' => 'formAddSkillDetails', 'style' => 'padding: 20px');
		    echo form_open('csetupfactory/fcuserskilldetailfactory/addUpdateSkillDetail',$attributes); 
				?>				
			<!---<form class="card" style="padding: 20px">-->
			  <div class="row">
					<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
						  <div class="table-responsive">						  	
							  <table class="table">							     
								  <thead>
								    <tr>
								      <th scope="col">Skill</th>
								      <th scope="col">Version</th>
								      <th scope="col">Exprience</th>
								      <th scope="col">Show on website</th>
								      <th scope="col">Show on resume</th>
								      <th scope="col">Delete</th>
								    </tr>
								  </thead>
								  <tbody id="skill_table_tbody">
								  	<?php if( false == $arrmixSkillData ) { ?>
								  	<tr id="skl_tr_0">
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_skill_0" placeholder="Java/PHP/.Net" name="skillDetails['row_0'][skill]" value="">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_version_0" placeholder="1/2.1/3" name="skillDetails['row_0'][version]" value="">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_exprience_0" placeholder="2/4.1" name="skillDetails['row_0'][exprience]" value="">
										    <input type="hidden" name="skillDetails['row_0'][id]" id="hid_id_0" value="0">
										</div>
								      </td>
								      <td>
								      	<div class="form-group text-center">
										    <div class="checkbox">
											    <label>
											      <input type="checkbox" id="check_showonwebsite_0" name="skillDetails['row_0'][show_on_website]" checked>
											    </label>
											 </div>
										</div>
								      </td>
								      <td>
								      	<div class="form-group text-center">
										    <div class="checkbox">
											    <label>
											      <input type="checkbox" id="check_showonresume_0" name="skillDetails['row_0'][show_on_resume]" checked>
											    </label>
											 </div>
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <a href="#" id="0" onclick="deleteRow(this)" class="badge badge-danger rounded-circle float-right" style="margin-top: 20px"><i class="fas fa-minus fa-1x"></i></a>
										</div>
								      </td>
								    </tr>
								<?php } else{
									foreach($arrmixSkillData AS $intIndex=> $arrmixSkillData){?>
									<tr id="skl_tr<?php echo '_'.$intIndex;?>">
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_skill<?php echo '_'.$intIndex;?>" placeholder="Java/PHP/.Net" name="skillDetails[<?php echo 'row_'. $intIndex;?>][skill]" value="<?php echo $arrmixSkillData->skill;?>">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_version<?php echo '_'.$intIndex;?>" placeholder="1/2.1/3" name="skillDetails[<?php echo 'row_'. $intIndex;?>][version]" value="<?php echo $arrmixSkillData->version;?>">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_exprience<?php echo '_'.$intIndex;?>" placeholder="2/4.1" name="skillDetails[<?php echo 'row_'. $intIndex;?>][exprience]" value="<?php echo $arrmixSkillData->exprience;?>">
										    <input type="hidden" name="skillDetails[<?php echo 'row_'. $intIndex;?>][id]" id="hid_id<?php echo '_'.$intIndex;?>" value="<?php echo $arrmixSkillData->id;?>">
										</div>
								      </td>
								      <td>
								      	<div class="form-group text-center">
											<div class="checkbox">
											    <label>
											      <input type="checkbox" id="check_showonwebsite<?php echo '_'.$intIndex;?>" name="skillDetails[<?php echo 'row_'. $intIndex;?>][show_on_website]" <?php if( '1' == $arrmixSkillData->show_on_website) { echo 'checked';}?> >
											    </label>
											 </div>
										</div>
								      </td>
								      <td>
								      	<div class="form-group text-center">				    
											<div class="checkbox">
											    <label>
											      <input type="checkbox" id="check_showonresume<?php echo '_'.$intIndex;?>" name="skillDetails[<?php echo 'row_'. $intIndex;?>][show_on_resume]" <?php if( '1' == $arrmixSkillData->show_on_resume) { echo 'checked';}?> >
											    </label>
											 </div>
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <a href="#" id="<?php echo $intIndex;?>" onclick="deleteRow(this)" class="badge badge-danger rounded-circle float-right" style="margin-top: 20px"><i class="fas fa-minus fa-1x"></i></a>
										</div>
								      </td>
								    </tr>
								<?php } }?>
								  </tbody>
							  </table>
						  </div>
							  <caption>
							     	<button type="button" class="btn btn-primary" id="btn_add_edu_row" onclick="addSkillRow(1)">
									  ADD MORE
									</button>
							</caption>
					</div>
			   </div>
			   <div class="row">
				  <input type="hidden" name="user_details_id" id="hid_user_id" value="<?php echo $this->session->userdata['logged_in']['user_id'];?>">
				  <input type="hidden" name="row_count" id="hid_row_count" value="<?php if(isset($intIndex)){ echo $intIndex;} else{ echo 0;} ?>">
				  <input type="hidden" name="delete_id" id="hid_delete" value="0">
				  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				  	<button type="button" class="btn btn-outline-primary btn-lg btn-block" onclick="submitSkillDetails()">Submit</button>
				  </div>
			   </div>
			</form>
	  		
	  	</div>
	</div>


</div>
<?php $this->load->view('setupfactory/common/viewFooter');?>
	


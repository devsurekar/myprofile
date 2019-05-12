
<?php $this->load->view('setupfactory/common/viewSideBar');?>


<div class="container content-div">
	<div class="row">
	  	<div class="col-md-12  col-lg-12 col-sm-12 col-xs-12">
	  		<?php
			
		 	if( ( NULL !== $this->session->flashdata( 'message' ) ) && ( 'project_details' == $this->session->flashdata( 'controller' ) ) ){
			?>
			<div class="dashboard-message <?php if( 'success' == $this->session->flashdata( 'message_type' ) ) {?> message-success <?php }else{?> message-fail <?php }?>" style="margin-top: 0px !important; padding-left:30px; padding-right: 30px;" id="div_msg">
				<?php echo $this->session->flashdata('message');?>
					
			</div>
			<?php }?>

			 <div class="alert alert-danger" style="display:none">

			 </div>
			 <div class="alert alert-success" style="display:none">

			 </div>
	  		<h3  class="text-center">MANAGE PROJECT DETAIL</h3>
	  		<?php
			
		    $attributes = array('class' => 'card', 'id' => 'formAddProjectDetails', 'name' => 'formAddProjectDetails', 'style' => 'padding: 20px');
		    echo form_open('csetupfactory/fcuserprojectdetailfactory/addUpdateProjectDetail',$attributes); 
				?>					
			<!----<form class="card" style="padding: 20px" id="form_project">-->
			<section id="section_project">
				<!------------------>
				<?php if( false == $arrmixProjectData ) { ?>
			<div class="top-row"  id="divrow_id_0">
			  <div class="row">
				 <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
					  <div class="form-group">
					  	<a href="#" id="0" onclick="deleteSection(this)" class="badge badge-danger float-right" style="margin-top: 20px; padding:10px"> Remove Project</a>
					    <label for="sel_project_type">Project Type</label>
					    <select class="form-control" id="sel_project_type_0" name="project_type">
					      <option value="N">Select</option>
					      <option value="A">Academic Project</option>
					      <option value="C">Company Project</option>
					      <option value="B">Back Pocket Project</option>
					    </select>
					  </div>
				 </div>
			  </div>
			  <div class="row">
				  <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
					  <div class="form-group">
					    <label for="txt_add_edit_project_name">Project Name</label>
					    <input type="text" class="form-control" id="txt_add_edit_project_name_0" placeholder="Project Name" name="project_name">
					  </div>
				 </div>
		       	 <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_degree_name">Degree Name</label>
					    <input type="text" class="form-control" id="txt_add_edit_degree_name_0" placeholder="Degree Name" name="degree_name">
			  		</div>
				</div>	   		 
			  	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_technology">Technology</label>
					    <input type="text" class="form-control" id="txt_add_edit_technology_0" placeholder="Technology (PHP,MYSQL,JAVASCRIPT)" name="technology">
			  		</div>
				</div>
			   </div>
			   <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_domain">Domain</label>
					    <input type="text" class="form-control" id="txt_add_edit_domain_0" placeholder="Domain (Telicomunication)" name="domain">
			  		</div>
				</div>
	   		   	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_team_size">Team Size</label>
					    <input type="text" class="form-control" id="txt_add_edit_team_size_0" placeholder="Time Size" name="team_size">
			  		</div>
				</div>
	   		   	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_duration">Duration</label>
					    <input type="text" class="form-control" id="txt_add_edit_duration_0" placeholder="Duration in years (1.5)" name="duration">
			  		</div>
				</div>
	   		  </div>
	   		  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
					    <label for="txt_add_edit_responsibility">Responsibility</label>
					    <input type="text" class="form-control" id="txt_add_edit_responsibility_0" placeholder="Responsibility (Development)" name="responsibility">
			  		</div>
				</div>
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
					    <label for="txt_add_edit_contribution">Contribution</label>
					    <input type="text" class="form-control" id="txt_add_edit_contribution_0" placeholder="Contribution" name="contribution">
			  		</div>
				</div>
	   		  </div>	   		  
			  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			  		<div class="form-group">
					    <label for="txt_project_description">Project Description</label>
					    <textarea class="form-control" id="txt_project_description_0" rows="3" name="project_description"></textarea>
			  		</div>
				</div>
	   		  </div>
	   		  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
					    <label for="txt_add_edit_remark">Remark</label>
					    <input type="text" class="form-control" id="txt_add_edit_remark_0" placeholder="Remark" name="contribution">
			  		</div>
				</div>	   		  
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
					    <label for="txt_add_edit_project_link">Project Link</label>
					    <input type="text" class="form-control" id="txt_add_edit_project_link_0" placeholder="http://www.myprojectsweb.com/" name="project_link">
					    <input type="hidden" name="project_id_0" id="hid_id_0" value="0">
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
						foreach($arrmixProjectData AS $intIndex=> $arrmixProjectData) {?>

			   <div class="top-row"  id="divrow_id_<?php echo $intIndex; ?>">
			   <div class="row">
				 <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
					  <div class="form-group">
					  	<a href="#" id="<?php echo $intIndex;?>" onclick="deleteSection(this)" class="badge badge-danger float-right" style="margin-top: 20px; padding:10px"> Remove Project</a>
					    <label for="sel_project_type">Project Type</label>
					    <select class="form-control" id="sel_project_type<?php echo '_'.$intIndex;?>" name="project_type">
					      <option value="N">Select</option>
					      <option value="A" <?php if ("A" == $arrmixProjectData->project_type){  echo "selected" ; } ?> >Academic Project</option>
					      <option value="C" <?php if ("C" == $arrmixProjectData->project_type){  echo "selected"; } ?> >Company Project</option>
					      <option value="B"  <?php if ("B" == $arrmixProjectData->project_type){  echo "selected"; } ?> >Back Pocket Project</option>
					    </select>
					  </div>
				 </div>
			  </div>
			  <div class="row">
				  <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
					  <div class="form-group">
					    <label for="txt_add_edit_project_name">Project Name</label>
					    <input type="text" class="form-control" id="txt_add_edit_project_name<?php echo '_'.$intIndex;?>" placeholder="Project Name" name="project_name" value="<?php echo $arrmixProjectData->project_name;?>">
					  </div>
				 </div>
		       	 <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_degree_name">Degree Name</label>
					    <input type="text" class="form-control" id="txt_add_edit_degree_name<?php echo '_'.$intIndex;?>" placeholder="Degree Name" name="degree_name" value="<?php echo $arrmixProjectData->degree_name;?>">
			  		</div>
				</div>	   		 
			  	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_technology">Technology</label>
					    <input type="text" class="form-control" id="txt_add_edit_technology<?php echo '_'.$intIndex;?>" placeholder="Technology (PHP,MYSQL,JAVASCRIPT)" name="technology" value="<?php echo $arrmixProjectData->technology;?>">
			  		</div>
				</div>
			   </div>
			   <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_domain">Domain</label>
					    <input type="text" class="form-control" id="txt_add_edit_domain<?php echo '_'.$intIndex;?>" placeholder="Domain (Telicomunication)" name="domain" value="<?php echo $arrmixProjectData->domain;?>">
			  		</div>
				</div>
	   		   	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_team_size">Team Size</label>
					    <input type="text" class="form-control" id="txt_add_edit_team_size<?php echo '_'.$intIndex;?>" placeholder="Time Size" name="team_size" value="<?php echo $arrmixProjectData->team_size;?>">
			  		</div>
				</div>
	   		   	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_duration">Duration</label>
					    <input type="text" class="form-control" id="txt_add_edit_duration<?php echo '_'.$intIndex;?>" placeholder="Duration in years (1.5)" name="duration" value="<?php echo $arrmixProjectData->duration;?>">
			  		</div>
				</div>
	   		  </div>
	   		  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
					    <label for="txt_add_edit_responsibility">Responsibility</label>
					    <input type="text" class="form-control" id="txt_add_edit_responsibility<?php echo '_'.$intIndex;?>" placeholder="Responsibility (Development)" name="responsibility" value="<?php echo $arrmixProjectData->responsibility;?>">
			  		</div>
				</div>
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
					    <label for="txt_add_edit_contribution">Contribution</label>
					    <input type="text" class="form-control" id="txt_add_edit_contribution<?php echo '_'.$intIndex;?>" placeholder="Contribution" name="contribution" value="<?php echo $arrmixProjectData->contribution;?>">
			  		</div>
				</div>
	   		  </div>	   		  
			  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			  		<div class="form-group">
					    <label for="txt_project_description">Project Description</label>
					    <textarea class="form-control" id="txt_project_description<?php echo '_'.$intIndex;?>" rows="3" name="project_description"><?php echo $arrmixProjectData->project_discription;?></textarea>
			  		</div>
				</div>
	   		  </div>
	   		  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
					    <label for="txt_add_edit_remark">Remark</label>
					    <input type="text" class="form-control" id="txt_add_edit_remark<?php echo '_'.$intIndex;?>" placeholder="Remark" name="contribution" value="<?php echo $arrmixProjectData->contribution;?>">
			  		</div>
				</div>	   		  
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
					    <label for="txt_add_edit_project_link">Project Link</label>
					    <input type="text" class="form-control" id="txt_add_edit_project_link<?php echo '_'.$intIndex;?>" placeholder="http://www.myprojectsweb.com/" name="project_link" value="<?php echo $arrmixProjectData->project_link;?>">
					    <input type="hidden" name="project_id_<?php echo 'row_'. $intIndex;?>" id="hid_id<?php echo '_'.$intIndex;?>" value="<?php echo $arrmixProjectData->id;?>">
			  		</div>
				</div>
	   		  </div>
	   		  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
						<div class="checkbox">
						    <label>
						      <input type="checkbox" id="check_showonwebsite<?php echo '_'.$intIndex;?>" name="check_showonwebsite<?php echo '_'.$intIndex;?>" <?php if( '1' == $arrmixProjectData->show_on_website) { echo 'checked';}?> > Show on website
						    </label>
						 </div>
					</div>
				</div>	   		  
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">				    
						<div class="checkbox">
						    <label>
						      <input type="checkbox" id="check_showonresume<?php echo '_'.$intIndex;?>" name="check_showonresume<?php echo '_'.$intIndex;?>" <?php if( '1' == $arrmixProjectData->show_on_resume) { echo 'checked';}?> > Show on resume
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
			     	<button type="button" class="btn btn-primary" id="btn_add_edu_row" onclick="addProjectSection(1)">
					  ADD MORE PROJECT
					</button>
			</caption>
			  <div class="row">
				  <input type="hidden" name="id" id="hid_id" value="<?php echo $this->session->userdata['logged_in']['user_id'];?>">
				  <input type="hidden" name="row_count" id="hid_row_count" value="<?php if(isset($intIndex)){ echo $intIndex;} else{ echo 0;} ?>">
				  <input type="hidden" name="delete_id" id="hid_delete" value="0">
				  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				  	<button type="button" class="btn btn-outline-primary btn-lg btn-block" onclick="submitProjectDetails()">Submit</button>
				  </div>
			  </div>
			</form>
	  		
	  	</div>
	</div>


</div>
<?php $this->load->view('setupfactory/common/viewFooter');?>
	


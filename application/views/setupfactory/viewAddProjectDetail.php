
<?php $this->load->view('setupfactory/common/viewSideBar');?>


<div class="container content-div">
	<div class="row">
	  	<div class="col-md-12  col-lg-8 offset-lg-2 col-sm-12 col-xs-12">

	  		<h3>MANAGE PROJECT DETAIL</h3>			
			<form class="card" style="padding: 20px" id="form_project">
			<section id="section_project">
				<!------------------>
			  <div class="row">
				 <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
					  <div class="form-group">
					    <label for="sel_project_type">Project Type</label>
					    <select class="form-control" id="sel_project_type" name="project_type">
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
					    <input type="text" class="form-control" id="txt_add_edit_project_name" placeholder="Project Name" name="project_name">
					  </div>
				 </div>
		       	 <div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_degree_name">Degree Name</label>
					    <input type="text" class="form-control" id="txt_add_edit_degree_name" placeholder="Degree Name" name="degree_name">
			  		</div>
				</div>	   		 
			  	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_technology">Technology</label>
					    <input type="text" class="form-control" id="txt_add_edit_technology" placeholder="Technology (PHP,MYSQL,JAVASCRIPT)" name="technology">
			  		</div>
				</div>
			   </div>
			   <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_domain">Domain</label>
					    <input type="text" class="form-control" id="txt_add_edit_domain" placeholder="Domain (Telicomunication)" name="domain">
			  		</div>
				</div>
	   		   	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_team_size">Team Size</label>
					    <input type="text" class="form-control" id="txt_add_edit_team_size" placeholder="Time Size" name="team_size">
			  		</div>
				</div>
	   		   	<div class="col-sm-12 col-xs-12 col-md-4 col-lg-4">
			  		<div class="form-group">
					    <label for="txt_add_edit_duration">Duration</label>
					    <input type="text" class="form-control" id="txt_add_edit_duration" placeholder="Duration in years (1.5)" name="duration">
			  		</div>
				</div>
	   		  </div>
	   		  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
					    <label for="txt_add_edit_responsibility">Responsibility</label>
					    <input type="text" class="form-control" id="txt_add_edit_responsibility" placeholder="Responsibility (Development)" name="responsibility">
			  		</div>
				</div>
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
					    <label for="txt_add_edit_contribution">Contribution</label>
					    <input type="text" class="form-control" id="txt_add_edit_contribution" placeholder="Contribution" name="contribution">
			  		</div>
				</div>
	   		  </div>	   		  
			  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			  		<div class="form-group">
					    <label for="txt_project_description">Project Description</label>
					    <textarea class="form-control" id="txt_project_description" rows="3" name="project_description"></textarea>
			  		</div>
				</div>
	   		  </div>
	   		  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
					    <label for="txt_add_edit_remark">Remark</label>
					    <input type="text" class="form-control" id="txt_add_edit_remark" placeholder="Remark" name="contribution">
			  		</div>
				</div>	   		  
			  	<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
			  		<div class="form-group">
					    <label for="txt_add_edit_project_link">Project Link</label>
					    <input type="text" class="form-control" id="txt_add_edit_project_link" placeholder="http://www.myprojectsweb.com/" name="project_link">
			  		</div>
				</div>
	   		  </div>
	   		  <!------------------------->
	   		</section>
	   		<caption>
			     	<button type="button" class="btn btn-primary" id="btn_add_edu_row" onclick="addProjectSection(1)">
					  ADD MORE PROJECT
					</button>
			</caption>
			  <div class="row">
				  <input type="hidden" name="id" id="hid_id" value="<?php echo $this->session->userdata['logged_in']['user_id'];?>">
				  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				  	<button type="button" class="btn btn-outline-primary btn-lg btn-block">Submit</button>
				  </div>
			  </div>
			</form>
	  		
	  	</div>
	</div>


</div>
<?php $this->load->view('setupfactory/common/viewFooter');?>
	


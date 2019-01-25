
<?php $this->load->view('setupfactory/common/viewSideBar');?>


<div class="container content-div">
	<div class="row">
	  	<div class="col-md-12  col-lg-8 offset-lg-2 col-sm-12 col-xs-12">

	  		<h3>MANAGE SKILL DETAIL</h3>			
			<form class="card" style="padding: 20px">
			  <div class="row">
					<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
						  <div class="table-responsive-sm">						  	
							  <table class="table">							     
								  <thead>
								    <tr>
								      <th scope="col">Skill</th>
								      <th scope="col">Version</th>
								      <th scope="col">Exprience</th>
								      <th scope="col">Delete</th>
								    </tr>
								  </thead>
								  <tbody id="skill_table_tbody">
								  	<tr>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_skill" placeholder="Java/PHP/.Net" name="skill" value="">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_version" placeholder="1/2.1/3" name="version" value="">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_exprience" placeholder="2/4.1" name="exprience" value="">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <a href="#" onclick="deleteRow(this)" class="badge badge-danger rounded-circle float-right" style="margin-top: 20px"><i class="fas fa-minus fa-1x"></i></a>
										</div>
								      </td>
								    </tr>
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
	


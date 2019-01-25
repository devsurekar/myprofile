
<?php $this->load->view('setupfactory/common/viewSideBar');?>


<div class="container content-div">
	<div class="row">
	  	<div class="col-md-12  col-lg-8 offset-lg-2 col-sm-12 col-xs-12">

	  		<h3>MANAGE EDUCATIONAL DETAIL</h3>			
			<form class="card" style="padding: 20px">
			  <div class="row">
					<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
						  <div class="table-responsive-sm">						  	
							  <table class="table">							     
								  <thead>
								    <tr>
								      <th scope="col">Standard</th>
								      <th scope="col">Institute</th>
								      <th scope="col">Board</th>
								      <th scope="col">Year</th>
								      <th scope="col">Percentage</th>
								      <th scope="col">Delete</th>
								    </tr>
								  </thead>
								  <tbody id="edu_table_tbody">
								  	<tr id="edu_tr_0">
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_standard_0" placeholder="BE/ME/MCA" name="qualification" value="">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_institute_0" placeholder="YMN School" name="institute" value="">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_board_0" placeholder="Central" name="board" value="">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_passing_year_0" placeholder="2014" name="passing_year" value="">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_percentage_0" placeholder="60" name="percentage" value="">
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
							     	<button type="button" class="btn btn-primary" id="btn_add_edu_row" onclick="addEduRow(1)">
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
	


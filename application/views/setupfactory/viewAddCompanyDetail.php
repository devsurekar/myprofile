
<?php $this->load->view('setupfactory/common/viewSideBar');?>


<div class="container content-div">
	<div class="row">
	  	<div class="col-md-12  col-lg-8 offset-lg-2 col-sm-12 col-xs-12">

	  		<h3>MANAGE COMPANY DETAIL</h3>			
			<form class="card" style="padding: 20px">
			  <div class="row">
					<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
						  <div class="table-responsive-sm">						  	
							  <table class="table">							     
								  <thead>
								    <tr>
								      <th scope="col">Working</th>
								      <th scope="col">Company</th>
								      <th scope="col">City</th>
								      <th scope="col">Country</th>
								      <th scope="col">Joining</th>
								      <th scope="col">Leaving</th>							      
								      <th scope="col">Delete</th>
								    </tr>
								  </thead>
								  <tbody id="comp_table_tbody">
								  	<tr id="tr_comp_0">
								  	  <td>
								      	<div class="form-check">
										  <input style="margin-top: 40px" class="form-check-input position-static" type="radio" name="radio_comp" id="radio_comp_0" value="0" aria-label="...">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_comp_name_0" placeholder="Tata Cons" name="comp_name" value="">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_city_0" placeholder="Pune" name="city" value="">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_country_0" placeholder="India" name="country" value="">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_join_date_0" placeholder="23/10/2018" name="join_date" value="">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_leaving_date_0" placeholder="23/09/2023" name="leaving_date" value="">
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
							     	<button type="button" class="btn btn-primary" id="btn_add_edu_row" onclick="addCompRow(1)">
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
	



<?php $this->load->view('setupfactory/common/viewSideBar');?>


<div class="container content-div">
	<div class="row">
	  	<div class="col-md-12  col-lg-12  col-sm-12 col-xs-12">
	  		<?php
			
		 	if( ( NULL !== $this->session->flashdata( 'message' ) ) && ( 'company_details' == $this->session->flashdata( 'controller' ) ) ){
			?>
			<div class="dashboard-message <?php if( 'success' == $this->session->flashdata( 'message_type' ) ) {?> message-success <?php }else{?> message-fail <?php }?>" style="margin-top: 0px !important; padding-left:30px; padding-right: 30px;" id="div_msg">
				<?php echo $this->session->flashdata('message');?>
					
			</div>
			<?php }?>

			 <div class="alert alert-danger" style="display:none">

			 </div>
			 <div class="alert alert-success" style="display:none">

			 </div>
	  		<h3  class="text-center">MANAGE COMPANY DETAIL</h3>
	  		<?php
			
		    $attributes = array('class' => 'card', 'id' => 'formAddCompanyDetails', 'name' => 'formAddCompanyDetails', 'style' => 'padding: 20px');
		    echo form_open('csetupfactory/fcusercompanydetailfactory/addUpdateCompanyDetail',$attributes); 
				?>			
			<!--<form class="card" style="padding: 20px">-->
			  <div class="row">
					<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
						  <div class="table-responsive">						  	
							  <table class="table">							     
								  <thead>
								    <tr>
								      <th scope="col">Working</th>
								      <th scope="col">Company</th>
								      <th scope="col">City</th>
								      <th scope="col">Country</th>
								      <th scope="col">Designetion</th>
								      <th scope="col">Joining</th>
								      <th scope="col">Leaving</th>
								      <th scope="col">Show on website</th>
								      <th scope="col">Show on resume</th>						      
								      <th scope="col">Delete</th>
								    </tr>
								  </thead>
								  <tbody id="comp_table_tbody">
								  	<?php if( false == $arrmixCompanyData ) { ?>
								  	<tr id="tr_comp_0">
								  	  <td>
								      	<div class="radio">
									      	<label>
											  <input style="margin-top: 40px" class="form-check-input position-static" type="radio" name="radio_comp" id="radio_comp_0" value="0" aria-label="...">
											</label>
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_compname_0" placeholder="Tata Cons" name="comp_name" value="">
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
										    <input type="text" class="form-control" id="txt_designation_0" placeholder="Software Developer" name="designetion" value="">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control datepic" id="txt_joindate_0" placeholder="23/10/2018" name="join_date" value="" readonly>
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control datepic" id="txt_leavingdate_0" placeholder="23/09/2023" name="leaving_date" value="" readonly>
										    <input type="hidden" name="hid_id" id="hid_id_0" value="0">
										</div>
								      </td>
								      <td>
								      	<div class="form-group text-center">
										    <div class="checkbox">
											    <label>
											      <input type="checkbox" id="check_showonwebsite_0" name="check_showonwebsite_0" checked>
											    </label>
											 </div>
										</div>
								      </td>
								      <td>
								      	<div class="form-group text-center">
										    <div class="checkbox">
											    <label>
											      <input type="checkbox" id="check_showonresume_0" name="check_showonresume_0" checked>
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
									foreach($arrmixCompanyData AS $intIndex=> $arrmixCompanyData){?>
									<tr id="tr_comp<?php echo '_'.$intIndex;?>">
								  	  <td>
								      	<div class="radio">
								      		<label>
										  <input style="margin-top: 40px" class="form-check-input position-static" type="radio" name="radio_comp" id="radio_comp<?php echo '_'.$intIndex;?>" value="0" aria-label="..." <?php if ($arrmixCompanyData->current_company_flag){ echo 'checked'; } ?> >
										   </label>
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_compname<?php echo '_'.$intIndex;?>" placeholder="Tata Cons" name="comp_name" value="<?php echo $arrmixCompanyData->comp_name;?>">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_city<?php echo '_'.$intIndex;?>" placeholder="Pune" name="city" value="<?php echo $arrmixCompanyData->city;?>">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_country<?php echo '_'.$intIndex;?>" placeholder="India" name="country" value="<?php echo $arrmixCompanyData->country;?>">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_designation<?php echo '_'.$intIndex;?>" placeholder="Software Developer" name="designetion" value="<?php echo $arrmixCompanyData->designation;?>">
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control datepic" id="txt_joindate<?php echo '_'.$intIndex;?>" placeholder="23/10/2018" name="join_date" value="<?php echo $arrmixCompanyData->join_date;?>" readonly>
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control datepic" id="txt_leavingdate<?php echo '_'.$intIndex;?>" placeholder="23/09/2023" name="leaving_date" value="<?php echo $arrmixCompanyData->leaving_date;?>"  readonly>
										     <input type="hidden" name="" id="hid_id<?php echo '_'.$intIndex;?>" value="<?php echo $arrmixCompanyData->id;?>">
										</div>
								      </td>
								      <td>
								      	<div class="form-group text-center">
											<div class="checkbox">
											    <label>
											      <input type="checkbox" id="check_showonwebsite<?php echo '_'.$intIndex;?>" name="check_showonwebsite<?php echo '_'.$intIndex;?>" <?php if( '1' == $arrmixCompanyData->show_on_website) { echo 'checked';}?> >
											    </label>
											 </div>
										</div>
								      </td>
								      <td>
								      	<div class="form-group text-center">				    
											<div class="checkbox">
											    <label>
											      <input type="checkbox" id="check_showonresume<?php echo '_'.$intIndex;?>" name="check_showonresume<?php echo '_'.$intIndex;?>" <?php if( '1' == $arrmixCompanyData->show_on_resume) { echo 'checked';}?> >
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
							     	<button type="button" class="btn btn-primary" id="btn_add_edu_row" onclick="addCompRow(1)">
									  ADD MORE
									</button>
							</caption>
					</div>
			   </div>
			   <div class="row">
				  <input type="hidden" name="id" id="hid_id" value="<?php echo $this->session->userdata['logged_in']['user_id'];?>">
				  <input type="hidden" name="row_count" id="hid_row_count" value="<?php if(isset($intIndex)){ echo $intIndex;} else{ echo 0;} ?>">
				  <input type="hidden" name="delete_id" id="hid_delete" value="0">
				  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				  	<button type="button" class="btn btn-outline-primary btn-lg btn-block" onclick="submitCompanyDetails()">Submit</button>
				  </div>
			   </div>
			</form>
	  		
	  	</div>
	</div>


</div>
<?php $this->load->view('setupfactory/common/viewFooter');?>
	


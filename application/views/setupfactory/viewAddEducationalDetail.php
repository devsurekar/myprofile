
<?php $this->load->view('setupfactory/common/viewSideBar');?>


<div class="container content-div">
	<div class="row">
	  	<div class="col-md-12  col-lg-12 col-sm-12 col-xs-12">
	  		<?php
			
		 	if( ( NULL !== $this->session->flashdata( 'message' ) ) && ( 'educational_details' == $this->session->flashdata( 'controller' ) ) ){
		?>
			<div class="dashboard-message <?php if( 'success' == $this->session->flashdata( 'message_type' ) ) {?> message-success <?php }else{?> message-fail <?php }?>" style="margin-top: 0px !important; padding-left:30px; padding-right: 30px;" id="div_msg">
				<?php echo $this->session->flashdata('message');?>
					
			</div>
	<?php }?>

			 <div class="alert alert-danger" style="display:none">

			 </div>
			 <div class="alert alert-success" style="display:none">

			 </div>
	  		<h3 class="text-center">MANAGE EDUCATIONAL DETAIL</h3>
				<?php
			
		    $attributes = array('class' => 'card', 'id' => 'formAddEducationalDetails', 'name' => 'formAddEducationalDetails', 'style' => 'padding: 20px');
		    echo form_open('csetupfactory/fcusereducationaldetailfactory/addUpdateEducationalDetail',$attributes); 
				?>	
			  <div class="row">
					<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
						  <div class="table-responsive">						  	
							  <table class="table" id="edu_table">							     
								  <thead>
								    <tr>
								      <th scope="col">Standard</th>
								      <th scope="col">Institute</th>
								      <th scope="col">Board</th>
								      <th scope="col">Year</th>
								      <th scope="col">Percentage</th>
								      <th scope="col">Show on website</th>
								      <th scope="col">Show on resume</th>
								      <th scope="col">Delete</th>
								    </tr>
								  </thead>
								  <tbody id="edu_table_tbody">
								  	<?php if( false == $arrmixEducationalData ) { ?>
								  	<tr id="edu_tr_0">
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_standard_0" placeholder="BE/ME/MCA" name="educationalDetails['row_0'][qualification]" value="" >								    
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_institute_0" placeholder="YMN School" name="educationalDetails['row_0'][institute]" value="" >
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_board_0" placeholder="Central" name="educationalDetails['row_0'][board]" value="" >
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_passing_year_0" placeholder="2014" name="educationalDetails['row_0'][passing_year]" value="" >
										</div>
								      </td>
								      <td>
								      	<div class="form-group">
										    <input type="text" class="form-control" id="txt_percentage_0" placeholder="60" name="educationalDetails['row_0'][percentage]" value="" >
										    <input type="hidden" name="educationalDetails['row_0'][id]" id="hid_id_0" value="0">
										</div>
								      </td>
								      <td>
								      	<div class="form-group text-center">
										    <div class="checkbox">
											    <label>
											      <input type="checkbox" id="check_showonwebsite_0" name="educationalDetails['row_0'][show_on_website]" checked>
											    </label>
											 </div>
										</div>
								      </td>
								      <td>
								      	<div class="form-group text-center">
										    <div class="checkbox">
											    <label>
											      <input type="checkbox" id="check_showonresume_0" name="educationalDetails['row_0'][show_on_resume]" checked>
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
									<?php }else{ 
										foreach($arrmixEducationalData AS $intIndex=> $arrmixEducationalData){?>
											<tr id="edu_tr<?php echo '_'.$intIndex;?>">
										      <td>
										      	<div class="form-group">
												    <input type="text" class="form-control" id="txt_standard<?php echo '_'.$intIndex;?>" placeholder="BE/ME/MCA" name="educationalDetails[<?php echo 'row_'. $intIndex;?>][qualification]" value="<?php echo $arrmixEducationalData->qualification;?>" >	    
												</div>
										      </td>
										      <td>
										      	<div class="form-group">
												    <input type="text" class="form-control" id="txt_institute<?php echo '_'.$intIndex;?>" placeholder="YMN School" name="educationalDetails[<?php echo 'row_'. $intIndex;?>][institute]" value="<?php echo $arrmixEducationalData->institute;?>" >
												</div>
										      </td>
										      <td>
										      	<div class="form-group">
												    <input type="text" class="form-control" id="txt_board<?php echo '_'.$intIndex;?>" placeholder="Central" name="educationalDetails[<?php echo 'row_'. $intIndex;?>][board]" value="<?php echo $arrmixEducationalData->board;?>" >
												</div>
										      </td>
										      <td>
										      	<div class="form-group">
												    <input type="text" class="form-control" id="txt_passing_year<?php echo '_'.$intIndex;?>" placeholder="2014" name="educationalDetails[<?php echo 'row_'. $intIndex;?>][passing_year]" value="<?php echo $arrmixEducationalData->passing_year;?>" >
												</div>
										      </td>
										      <td>
										      	<div class="form-group">
												    <input type="text" class="form-control" id="txt_percentage<?php echo '_'.$intIndex;?>" placeholder="60" name="educationalDetails[<?php echo 'row_'. $intIndex;?>][percentage]" value="<?php echo $arrmixEducationalData->percentage;?>" >
												    <input type="hidden" name="educationalDetails[<?php echo 'row_'. $intIndex;?>][id]" id="hid_id<?php echo '_'.$intIndex;?>" value="<?php echo $arrmixEducationalData->id;?>">
												</div>
										      </td>
										      <td>
										      	<div class="form-group text-center">
													<div class="checkbox">
													    <label>
													      <input type="checkbox" id="check_showonwebsite<?php echo '_'.$intIndex;?>" name="educationalDetails[<?php echo 'row_'. $intIndex;?>][show_on_website]" <?php if( '1' == $arrmixEducationalData->show_on_website) { echo 'checked';}?> >
													    </label>
													 </div>
												</div>
										      </td>
										      <td>
										      	<div class="form-group text-center">				    
													<div class="checkbox">
													    <label>
													      <input type="checkbox" id="check_showonresume<?php echo '_'.$intIndex;?>" name="educationalDetails[<?php echo 'row_'. $intIndex;?>][show_on_resume]" <?php if( '1' == $arrmixEducationalData->show_on_resume) { echo 'checked';}?> >
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
							     	<button type="button" class="btn btn-primary" id="btn_add_edu_row" onclick="addEduRow()">
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
				  		<button type="button" class="btn btn-outline-primary btn-lg btn-block" onclick="submitEducationalDetails()">Submit</button>
				  	</div>
			   </div>
			</form>
	  		
	  	</div>
	</div>


</div>
<?php $this->load->view('setupfactory/common/viewFooter');?>
	


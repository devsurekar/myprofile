
<?php $this->load->view('setupfactory/common/viewSideBar');?>


<div class="container content-div">
	<div class="row">
	  	<div class="col-md-12  col-lg-8 offset-lg-2 col-sm-12 col-xs-12">

	  		<h3>MANAGE EXTRA CRRICULAR DETAIL</h3>			
			<form class="card" style="padding: 20px" id="form_project">
			<section id="section_activity">
				<!------------------>
			    <div class="row">
				  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
					  <div class="form-group">
					    <label for="txt_add_edit_heading">Heading</label>
					    <input type="text" class="form-control" id="txt_add_edit_heading" placeholder="Activity heading" name="heading">
					  </div>
				  </div>
		       	</div>	   		  
			  <div class="row">
			  	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			  		<div class="form-group">
					    <label for="txt_activity_discription">Discription</label>
					    <textarea class="form-control" id="txt_activity_discription" rows="3" name="discription"></textarea>
			  		</div>
				</div>
	   		  </div>
	   		  <!------------------------->
	   		</section>
	   		<caption>
			     	<button type="button" class="btn btn-primary" id="btn_add_edu_row" onclick="addActivitySection(1)">
					  ADD MORE ACTIVITIES
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
	


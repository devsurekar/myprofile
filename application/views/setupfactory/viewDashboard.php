<?php $this->load->view('setupfactory/common/viewSideBar');

	if( TRUE == isset( $this->session->userdata['logged_in']['user_id'] ) ) {

		if( TRUE == isset( $this->session->userdata['profile_pic']['profile_pic'] ) && '' != $this->session->userdata['profile_pic']['profile_pic'] && NULL != $this->session->userdata['profile_pic']['profile_pic'] ) {

			$strPicSrc = $this->session->userdata['profile_pic']['profile_pic'];

		} else {
			$strPicSrc = base_url()."assets/images/factory/default_profile_pic.png";
		}
?>
<div class="container">
	<div class="row" style="margin-bottom: 20px">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">			
			<div style="" class="d-flex justify-content-center" id="div_dashboard_img">
			  	<img src="<?php echo $strPicSrc;?>" class="rounded-circle img-fluid dashboard-image" style="">
			</div> 
			<h2>‘Hi’ <br>I am <?php echo $this->session->userdata['logged_in']['first_name'].' '.$this->session->userdata['logged_in']['last_name'];?></h2><i class="fas fa-edit fa-x float-right text-primary"  data-toggle="modal" data-target="#dashboardModel" data-whatever="About Me" style="cursor: pointer;"></i>
			<h3>About Me</h3>
			<p>
				<?php if( false == $arrmixDashBoardData ||  '' == $arrmixDashBoardData[0]->about_you ) { ?>
					Your ‘About Me’ should convey who you are and what you’re doing, how you got there, and where you’re looking to go next. Use it to describe your credentials, expertise, and goals.
				<?php } 
	   		  else {
	   		  		echo $arrmixDashBoardData[0]->about_you;
						
					} ?>
			</p>
			<input type="hidden" name="hid_user_details_id" id="hid_user_details_id" value="<?php if( TRUE == isset( $this->session->userdata['logged_in']['user_id'] ) ) { echo $this->session->userdata['logged_in']['user_id'];}else{echo 0;} ?>">
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="card text-white bg-primary mb-3" data-toggle="modal" data-target="#dashboardModel" data-whatever="Total Views" style="cursor: pointer;">
					  <div class="card-body">
					    <h6 class="card-subtitle mb-2 text-white">Total Views</h6>
					    <i class="fas fa-eye fa-3x"></i>
					    <h3 class="float-right"><?php if( false == isset($arrmixDashBoardData[0]->view_count)){echo 0;}else{ echo $arrmixDashBoardData[0]->view_count; } ?></h3>
					    <input type="hidden" id="hid_user_views" name="hid_user_views" value='<?php echo base_url("csetupfactory/fcuseractivitydetailfactory/addUpdateActivityDetail");?>'>
					  </div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">		
					<div class="card text-white bg-success mb-3" data-toggle="modal" data-target="#dashboardModel" data-whatever="Resume Downloads" style="cursor: pointer;">
					  <div class="card-body">
					    <h6 class="card-subtitle mb-2 text-white">Resume Downloads</h6>
					    <i class="fas fa-download fa-3x"></i>
					   	<h3 class="float-right"><?php if( false == isset($arrmixDashBoardData[0]->download_count)){echo 0;}else{ echo $arrmixDashBoardData[0]->download_count; } ?></h3>
					  </div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">		
					<div class="card text-white bg-danger mb-3" data-toggle="modal" data-target="#dashboardModel" data-whatever="Recived Messages" style="cursor: pointer;">
					  <div class="card-body">
					    <h6 class="card-subtitle mb-2 text-white">Recived Messages</h6>
					    <i class="fas fa-comment-alt fa-3x"></i>
					    <h3 class="float-right" id="lbl_msg_count"><?php if( true == empty($arrmixMessageDetails)){echo 0;}else{ echo count($arrmixMessageDetails); } ?></h3>
					    <input type="hidden" name="hid_message_url" id="hid_message_url" value='<?php echo base_url("csetupfactory/fcusermessagedetailfactory/getMessageDetail");?>'>
					  </div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">		
					<div class="card text-white bg-warning mb-3" data-toggle="modal" data-target="#dashboardModel" data-whatever="Total Projects" style="cursor: pointer;">
					  <div class="card-body">
					    <h6 class="card-subtitle mb-2 text-white">Total Projects</h6>
					    <i class="fas fa-project-diagram fa-3x"></i>
					    <h3 class="float-right"><?php if( true == empty($arrmixProjectDetails)){echo 0;}else{ echo count($arrmixProjectDetails); } ?></h3>
					  </div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">		
			<div class="card mb-3  text-center bg-light">
			  <div class="card-body">
			    <div class="circlechart" data-percentage="60" style="margin-top: 16px; margin-bottom: 16px;">Profile Completed</div>
			  </div>
			</div>
		</div>
	</div>


	<!--------------------------------------------------------->

<div class="modal fade" id="dashboardModel" tabindex="-1" role="dialog" aria-labelledby="dashboardModelLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dashboardModelLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="formDashboard_aboutMe">
          <!---<div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>--->
          <div class="form-group">
            <label for="message-text" class="col-form-label" id="lbl_txt_aboutMe">( Write about yourself in 250 carectors. This will display on your Web Profile.  )</label>
            <textarea class="form-control" id="txt_aboutMe" maxlength="250" rows="4" onkeyup="countTextAreaChar(this)"><?php if( false == $arrmixDashBoardData ||  '' == $arrmixDashBoardData[0]->about_you ) { ?>Your ‘About Me’ should convey who you are and what you’re doing, how you got there, and where you’re looking to go next. Use it to describe your credentials, expertise, and goals.
				<?php } 
	   		  else {
	   		  		echo $arrmixDashBoardData[0]->about_you;
						
					} ?></textarea>
            <label class="float-right col-form-label" id="txt_aboutMe_count_message">250 remaining</label>
          </div>
        </form>
        <form id="formDashboard_totalViews" class="table-responsive">
          <div class="form-group">
            <table class="table">
			  <thead class="">
			    <tr>
			      <th scope="col"># Country</th>
			      <th scope="col" class="text-right">Views</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td><span class="flag-icon flag-icon-in"></span> India</td>
			      <td class="text-right">437464</td>
			    </tr>
			    <tr>
			      <td><span class="flag-icon flag-icon-gr"></span> Germany</td>
			      <td class="text-right">5789</td>
			    </tr>
			    <tr>
			      <td><span class="flag-icon flag-icon-us"></span> United States</td>
			      <td class="text-right">9687</td>
			    </tr>
			  </tbody>
			</table>
          </div>
        </form>
        <form id="formDashboard_resumeDownloads">
          <!---<div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>--->
          <div class="form-group">
            <label for="message-text" class="col-form-label" id="lbl_txt_aboutMe">( Write about yourself in 250 carectors. This will display on your Web Profile.  )</label>
            <textarea class="form-control" id="txt_aboutMe" maxlength="250" rows="4" onkeyup="countTextAreaChar(this)"></textarea>
            <label class="float-right col-form-label" id="txt_aboutMe_count_message">250 remaining</label>
          </div>
        </form>
         <?php 
				  	if( true == empty($arrmixMessageDetails)){
				?>
				  	<p class="text-danger">You dont have messages!</p>
				<?php
				  	} else { 
        		$this->load->view( "setupfactory/viewMessageDetail", $arrmixMessageDetails );
    	}?>
        <form id="formDashboard_totalProjects">
          <div class="form-group">
            <table class="table">
			  <thead class="">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Title</th>
			      <th scope="col" class="text-right">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
				  	if( true == empty($arrmixProjectDetails)){
				?>
				  	<p class="text-danger">You dont have projects!</p>
				<?php
				  	} else { 
				  		foreach($arrmixProjectDetails AS $index=>$arrmixProjectDetail){
				?>
				  			<tr>
						      <th scope="col"><?php echo $index+1;?></th>
						      <td><?php echo $arrmixProjectDetail->project_name;?></td>
						      <td class="text-right">
						      	<a href="<?php echo base_url().'csetupfactory/fcuserprojectdetailfactory#divrow_id_'.$index;?>"><i class="fas fa-eye fa-x float-right text-primary" style="cursor: pointer;" id="<?php echo $arrmixProjectDetail->id; ?>"></i></a>
						      </td>
						    </tr>
				<?php
				  		} 
				  	} 
			  	?>
			   </tbody>
			</table>
          </div>
        </form>
        <form id="formDashboard_profileCompleted">
          <!---<div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>--->
          <div class="form-group">
            <label for="message-text" class="col-form-label" id="lbl_txt_aboutMe">( Write about yourself in 250 carectors. This will display on your Web Profile.  )</label>
            <textarea class="form-control" id="txt_aboutMe" maxlength="250" rows="4" onkeyup="countTextAreaChar(this)"></textarea>
            <label class="float-right col-form-label" id="txt_aboutMe_count_message">250 remaining</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-save">Save</button>
      </div>
    </div>
  </div>
</div>
	<!-------------------------------------------------------->

</div>
<?php $this->load->view('setupfactory/common/viewFooter');?>
<?php
	} else {
		redirect('csetupfactory','refresh');
	}
?>

	



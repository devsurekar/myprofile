<form id="formDashboard_recivedMessages" class="table-responsive" action="<?php echo base_url().'csetupfactory/fcusermessagedetailfactory';?>">
		  <div id="accordion">
		  	<?php 
						  	foreach($arrmixMessageDetails AS $index=>$arrmixMessageDetail){
						?>
		  <div class="card">
		  	<a data-toggle="collapse" data-parent="#accordion" href="<?php echo '#collapse_'. $arrmixMessageDetail->id; ?>" aria-expanded="true"
            aria-controls="<?php echo 'collapse_'. $arrmixMessageDetail->id; ?>">
			    <div class="card-header" id="<?php echo 'heading_'. $arrmixMessageDetail->id; ?>">
			      <h6 class="mb-0">
			      	
	            <i class="fas fa-envelope fa-x text-primary"></i>
			          <?php echo $arrmixMessageDetail->msg_title;?>	
			      
			      </h6>
			      <i class="fas fa-chevron-down fa-1x float-right text-primary btn"  data-toggle="tooltip" data-placement="left" data-original-title="See Message"></i>
			      <i class="fas fa-trash-alt fa-1x float-right text-primary btn"  data-toggle="tooltip" data-placement="right" data-original-title="Delete" onclick="ajaxrequest('<?php echo base_url().'csetupfactory/fcusermessagedetailfactory/deletemessagedetailbyids';?>', <?php echo $arrmixMessageDetail->id;?>, <?php echo $arrmixMessageDetail->user_details_id;?>)" ></i>
			       <i class="fas fa-reply fa-1x float-right text-primary btn"  data-toggle="tooltip" data-placement="left" data-original-title="Reply"></i>
			       <span>From: <?php echo $arrmixMessageDetail->msg_email_id;?>	</span>
			    </div>
			</a>
		    <div id="<?php echo 'collapse_'. $arrmixMessageDetail->id; ?>" class="collapse" aria-labelledby="<?php echo 'heading_'. $arrmixMessageDetail->id; ?>" data-parent="#accordion">
		      <div class="card-body">
		        <?php echo $arrmixMessageDetail->msg_message;?>
		      </div>
		    </div>
		  </div>
		<?php }?>
		</div>
        </form>
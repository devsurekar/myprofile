<?php
?>

	</div><!---------main div end-------->
</BODY>
<FOOTER class="fixed-bottom  bg-primary text-white">
	<div class="container  d-flex justify-content-center">
		<span>Designed & Developed by Devendrakumar Surekar</span>
	</div>
</FOOTER>
<script type="text/javascript">
	 var deleted_ids = new Array();
	$(function(){
    $(".message-success").hide(10000);
    $('.circlechart').circlechart(); // Initialization
       /*$('#txt_date_of_birth').datepicker({
       		format:'yyyy-mm-dd',       		
            showOtherMonths: true
        });*/

       $('body').on('focus',".datepic", function(){
       		
    		$(this).datepicker({
       		format:'yyyy-mm-dd',       		
            showOtherMonths: true
        });
		});

$('#dashboardModel').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  if('About Me' == recipient){

    modal.find('.modal-title').text(recipient).css('color','');
    modal.find('.modal-body').show();
    $('#formDashboard_totalViews').hide();
    $('#formDashboard_resumeDownloads').hide();
    $('#formDashboard_recivedMessages').hide();
    $('#formDashboard_totalProjects').hide();
    $('#formDashboard_profileCompleted').hide();
    $('#formDashboard_aboutMe').show();
    modal.find('.btn-save').show();    
    modal.find('.modal-body input').val(recipient);

  }
  else if('Total Views' == recipient){

    ajaxrequest($('#hid_user_views').val());
    
    modal.find('.modal-title').text(recipient).css('color','');
    modal.find('.modal-body').show();
    $('#formDashboard_aboutMe').hide();
    $('#formDashboard_resumeDownloads').hide();
    $('#formDashboard_recivedMessages').hide();
    $('#formDashboard_totalProjects').hide();
    $('#formDashboard_profileCompleted').hide();
    $('#formDashboard_totalViews').show();
    modal.find('.btn-save').hide();    
    modal.find('.modal-body input').val(recipient);

  }
  else if('Resume Downloads' == recipient){

    modal.find('.modal-title').text(recipient).css('color','');
    modal.find('.modal-body').show();
    $('#formDashboard_aboutMe').hide();
    $('#formDashboard_totalViews').hide();
    $('#formDashboard_recivedMessages').hide();
    $('#formDashboard_totalProjects').hide();
    $('#formDashboard_profileCompleted').hide();
    $('#formDashboard_resumeDownloads').show();
    modal.find('.btn-save').show();    
    modal.find('.modal-body input').val(recipient);

  }
  else if('Recived Messages' == recipient){

    modal.find('.modal-title').text(recipient).css('color','');
    modal.find('.modal-body').show();
    $('#formDashboard_aboutMe').hide();
    $('#formDashboard_totalViews').hide();
    $('#formDashboard_resumeDownloads').hide();
    $('#formDashboard_totalProjects').hide();
    $('#formDashboard_profileCompleted').hide();
    $('#formDashboard_recivedMessages').show();
    modal.find('.btn-save').hide();    
    modal.find('.modal-body input').val(recipient);

  }
  else if('Total Projects' == recipient){

    modal.find('.modal-title').text(recipient).css('color','');
    modal.find('.modal-body').show();
    $('#formDashboard_aboutMe').hide();
    $('#formDashboard_totalViews').hide();
    $('#formDashboard_resumeDownloads').hide();
    $('#formDashboard_recivedMessages').hide();
    $('#formDashboard_profileCompleted').hide();
    $('#formDashboard_totalProjects').show();
    modal.find('.btn-save').hide();    
    modal.find('.modal-body input').val(recipient);

  }
  else if('Profile Completed' == recipient){

    modal.find('.modal-title').text(recipient).css('color','');
    modal.find('.modal-body').show();
    $('#formDashboard_aboutMe').hide();
    $('#formDashboard_totalViews').hide();
    $('#formDashboard_resumeDownloads').hide();
    $('#formDashboard_recivedMessages').hide();
    $('#formDashboard_totalProjects').hide();
    $('#formDashboard_profileCompleted').show();
    modal.find('.btn-save').show();    
    modal.find('.modal-body input').val(recipient);

  }
  else {

    modal.find('.modal-title').text('This is not valid action!').css('color','red');
    modal.find('.modal-body').hide();
    modal.find('.btn-save').hide();

  }
  
  
});
             
});

function ajaxrequest(strUrl,deleted_ids = null, message_reply_id = null) {
    jQuery.ajax({
    type: "POST",
    url: strUrl,
    dataType : 'json', // data type
    data: {user_details_id: $("#hid_user_details_id").val(),deletedid:deleted_ids,messagereplyid:message_reply_id},
    success: function(res) {
      if($.isEmptyObject(res.error)) {

                if( null != deleted_ids ) {
                  //alert('Message deleted successfully');
                  reloadMessageModel(deleted_ids);
              }

              } else{

                alert('Request fail !');

              }
    }
  });
}

function reloadMessageModel() {
    jQuery.ajax({
    type: "POST",
    url: $('#formDashboard_recivedMessages').attr('action') ,
    dataType : 'json',
    data: {user_details_id: $("#hid_user_details_id").val(),reload_message:1},
    success: function(res) {

      if($.isEmptyObject(res.error)) {

                //if( null != deleted_ids ) {
                 // var obj = JSON.parse(res);
                 var strAccordionContent = '';
                 for(var index = 0; index < res.length; index++){

                    strAccordionContent += '<div class="card"><a data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ res[index].id +'" aria-expanded="true" aria-controls="collapse_'+ res[index].id+'"><div class="card-header" id="heading_'+ res[index].id+'"><h6 class="mb-0"> <i class="fas fa-envelope fa-x text-primary"></i> ' +res[index].msg_title+'</h6><i class="fas fa-trash-alt fa-1x float-right text-primary btn"  data-toggle="tooltip" data-placement="right" data-original-title="Delete" onclick="ajaxrequest(\''+ $('#formDashboard_recivedMessages').attr('action')+'/deletemessagedetailbyids\',' +res[index].id+',' + $("#hid_user_details_id").val()+')" ></i> <i class="fas fa-reply fa-1x float-right text-primary btn"  data-toggle="tooltip" data-placement="left" data-original-title="Reply"></i><span>From: ' +res[index].msg_email_id+ '</span></div></a><div id="collapse_'+ res[index].id+'" class="collapse" aria-labelledby="heading_'+ res[index].id+'" data-parent="#accordion"><div class="card-body">'+res[index].msg_message+'</div></div></div>';

                 }
                  
                  $('#accordion').html('');
                  $('#accordion').append(strAccordionContent);
                  $('#lbl_msg_count').html(res.length);
                  alert('Message Deleted successfully !');
              } else{

                  alert('Not able to delete Message !');

              }
    }
  });
}

</script>
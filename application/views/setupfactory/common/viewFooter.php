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
	$( function() {
    $(".se-pre-con").fadeOut("slow");
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

        //ajaxrequest($('#hid_user_views').val());
        
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


</script>
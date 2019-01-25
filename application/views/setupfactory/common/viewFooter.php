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
	$(function(){
    $(".message-success").hide(10000);
       $('#txt_date_of_birth').datepicker({
       		format:'yyyy-mm-dd',       		
            showOtherMonths: true
        });
});
	
</script>
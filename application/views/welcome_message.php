<?php include_once("application/views/setupfactory/common/viewTopHeader.php");?>
</HEAD>
<BODY class="text-center">
	<br>
	<img class="mb-4" src="<?php echo base_url();?>assets/images/common/logo.png" alt="logo" width="300">
    <h2 class="h5 mb-6 font-weight-normal text-danger">Welcome to my profile</h2>
	<?php echo anchor('csetupfactory', 'Let\'s go to your setup factory', 'class=" btn btn-outline-primary "') ?>
	<?php echo anchor('cshowcase', 'Let\'s go to your showcase', 'class=" btn btn-outline-primary "') ?>
	<p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
<?php //include_once("application/views/setupfactory/common/viewFooter.php");?>
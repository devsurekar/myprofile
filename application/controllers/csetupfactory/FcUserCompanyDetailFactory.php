<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcUserCompanyDetailFactory extends CI_Controller{

		public function index(){

			if (TRUE == checkSession() ) {
				$this->load->view("setupfactory/viewAddCompanyDetail");
			} else {
				redirect('csetupfactory','refresh');
			}
		}

	}
?>

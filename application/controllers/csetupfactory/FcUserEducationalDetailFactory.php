<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcUserEducationalDetailFactory extends CI_Controller{

		public function index(){

			if (TRUE == checkSession() ) {
				$this->load->view("setupfactory/viewAddEducationalDetail");
			} else {
				redirect('csetupfactory','refresh');
			}
		}

	}
?>

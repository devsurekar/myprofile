<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcUserProjectDetailFactory extends CI_Controller{

		public function index() {

			if (TRUE == checkSession() ) {
				$this->load->view("setupfactory/viewAddProjectDetail");
			} else {
				redirect('csetupfactory','refresh');
			}
		}

	}
?>

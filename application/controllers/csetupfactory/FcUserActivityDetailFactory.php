<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcUserActivityDetailFactory extends CI_Controller{

		public function index() {

			if (TRUE == checkSession() ) {
				$this->load->view("setupfactory/viewAddActivityDetail");
			} else {
				redirect('csetupfactory','refresh');
			}
		}

	}
?>

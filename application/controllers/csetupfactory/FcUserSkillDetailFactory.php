<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcUserSkillDetailFactory extends CI_Controller{

		public function index(){

			if (TRUE == checkSession() ) {
				$this->load->view("setupfactory/viewAddSkillDetail");
			} else {
				redirect('csetupfactory','refresh');
			}
		}

	}
?>

<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcDashboard extends CI_Controller{

		public function index(){
			$this->load->view("setupfactory/viewDashboard");
		}

	}
?>
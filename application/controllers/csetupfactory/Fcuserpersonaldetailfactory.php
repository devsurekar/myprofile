<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcUserPersonalDetailFactory extends CI_Controller{

		public function index(){

			if (TRUE == checkSession() ) {
				$this->load->model('setupfactory/ModelPersonalDetails','personaldetails');

				$arrmixResult = $this->personaldetails->getPersonalDetailsByUserId( $this->session->userdata['logged_in']['user_id'] );

				if( false != $arrmixResult ){
					$this->load->view("setupfactory/viewAddPersonalDetail", $arrmixResult );
				}
				
			} else {
				redirect('csetupfactory','refresh');
			}
		}

		public function addUpdatePersonalDetail() {
			
			if ( TRUE == checkSession() ) {
				
 				$this->load->library('form_validation');
 				//print_r($this->form_validation); echo 'hiii'; exit;

 				$this->session->set_flashdata('controller', '');
 				$this->session->set_flashdata('controller', 'personal_details');
				if ( FALSE === $this->form_validation->run() ){
						$this->session->set_flashdata('message', "Fail: Please enter valid details metioned bellow !");
						$this->session->set_flashdata('message_type', 'fail'); 
	                	$this->index();
	                	return;
	                }			
				
				$this->load->model('setupfactory/ModelPersonalDetails','personaldetails');

				$intPersonalDetailsId = $this->input->Post('id');
				if ( false == isset( $intPersonalDetailsId ) ) { 
					$intPersonalDetailsId = null;
				}

				$arrmixResult = $this->personaldetails->addUpdate( $intPersonalDetailsId );

				if( false != $arrmixResult ){

					$this->session->set_flashdata('message', "Success: Update Successful !");
					$this->session->set_flashdata('message_type', 'success'); 
					//customclearcache();
					$this->index();

				} else {

					$this->session->set_flashdata('message', "Fail: Update Failed !");
					$this->session->set_flashdata('message_type', 'fail');
					//customclearcache();
					//redirect('csetupfactory','refresh');
					$this->index();
				}
			
			} else {

				$this->session->set_flashdata('message', "Fail: Update Failed !");
				$this->session->set_flashdata('message_type', 'fail'); 				
				redirect('csetupfactory','refresh');
			}

		}

		public function checkCustomAlpha($str) 
		{
		    if ( !preg_match('/^[a-z .,\-]+$/i',$str) )
		    {
		    	$this->form_validation->set_message('checkCustomAlpha', 'Please enter valid details!');
		        return false;
		    } else {
		    	return true;
		    }
		}

	}
?>

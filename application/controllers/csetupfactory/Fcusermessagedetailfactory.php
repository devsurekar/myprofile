<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcUserMessageDetailFactory extends CI_Controller{

		public function index(){

			if (TRUE == checkSession() ) {

				$this->load->model('setupfactory/ModelMessageDetails','messagedetails');

				

				if( 1 == $_REQUEST['reload_message'] ){
					$success[] = "Success: Update Successful !";
					//print_r($arrmixResult['arrmixMessageData']); exit;
				 //echo '=====';
					echo json_encode($this->messagedetails->getMessageDetailsByUserId( $this->session->userdata['logged_in']['user_id'] )); exit;
				  }	

				  $arrmixResult['arrmixMessageData'] = $this->messagedetails->getMessageDetailsByUserId( $this->session->userdata['logged_in']['user_id'] );
						
				$this->load->view( "setupfactory/viewMessageDetail", $arrmixResult );
				//$this->load->view("setupfactory/viewAddSkillDetail");
			} else {
				redirect('csetupfactory','refresh');
			}
		}

		public function deleteMessageDetailByIds($strIntIds=NULL){
			if ( TRUE == checkSession() ) {
				if ( NULL == $strIntIds ){ $strIntIds = $_REQUEST['deletedid'];}
				$this->load->model('setupfactory/ModelMessageDetails','messagedetails');

				if ( true == $this->messagedetails->deleteMessageDetailsByIdsAndUserId( $strIntIds, $this->session->userdata['logged_in']['user_id'] ) )	{
					
					$success[] = "Success: Update Successful !";
					echo json_encode(['success'=>$success]); exit;

				} else{

					$errors[] = "Fail: Update Failed !";
					echo json_encode(['error'=>$errors]); exit;

				}					
				
				
			} else {
				echo false; exit;
			}

		}

	}
?>

<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcUserActivityDetailFactory extends CI_Controller{

		public function index() {

			if (TRUE == checkSession() ) {

				$this->load->model('setupfactory/ModelActivityDetails','activitydetails');

				$arrmixResult['arrmixActivityData'] = $this->activitydetails->getActivityDetailsByUserId( $this->session->userdata['logged_in']['user_id'] );	
						
				$this->load->view( "setupfactory/viewAddActivityDetail", $arrmixResult );
			} else {
				redirect('csetupfactory','refresh');
			}
		}

		public function addUpdateActivityDetail() {

			if ( TRUE == checkSession() ) {
				
 				$this->load->library('form_validation');

 				$this->session->set_flashdata('controller', '');
 				$this->session->set_flashdata('controller', 'activity_details');

 				$arrmixActivityData = json_decode( $this->input->Post( 'activity_details' ), true );

 				// if all data is deleted
 				if ( 1 == empty($arrmixActivityData[0]) AND NULL !== $this->input->Post( 'delete_ids' ) ){

 					$strDeletedActivityDetailsIds = $this->input->Post( 'delete_ids' ); 


					if( false == $this->deleteActivityDetailByIds( $strDeletedActivityDetailsIds ) ) {
							
							$errors[] = "Fail: Update while deleting details Failed !";
							echo json_encode(['error'=>$errors]); exit;
						}
						else{
							
							$success[] = "Success: Update Successful !";
							echo json_encode(['success'=>$success]); exit;
						}
 				}
 				// if all data is deleted

 				if ( NULL !== $arrmixActivityData ) {
					$errors = array();
					foreach( $arrmixActivityData as $postedIndex=> $posted ){

						$id = $arrmixActivityData[$postedIndex]['id'];
						

						//validation
						$stractivity_check = $this->heading_check($arrmixActivityData[$postedIndex]['heading']);

						if( true !== $stractivity_check ) {

							$errors[] = "txt_add_edit_heading_".$postedIndex.":".$stractivity_check;
							//$errors["txt_standard_".$postedIndex]['message'] = $strqulification_check;

						}

						$strdiscription_check = $this->discription_check($arrmixActivityData[$postedIndex]['discription']);

						if( true !== $strdiscription_check ) {

							$errors[] = "txt_activity_discription_".$postedIndex.":".$strdiscription_check;
							//$errors["txt_standard_".$postedIndex]['message'] = $strqulification_check;

						}

						

					}
				}
				//exit;
					
				if(!empty(array_filter($errors))){					
					
            		echo json_encode(['error'=>$errors]); exit;
            	}
            		//validation;
	                	

				$this->load->model('setupfactory/ModelActivityDetails','activitydetails');

				$arrmixResult = $this->activitydetails->addUpdate();

				if( false != $arrmixResult ){

					$strActivityDetailsIds = $this->input->Post( 'delete_ids' ); 


					if( null !== $strActivityDetailsIds ) {

						if( false == $this->deleteActivityDetailByIds( $strActivityDetailsIds ) ) { 

							//$this->session->set_flashdata('message', "Fail: Update while deleting details Failed !");
							//$this->session->set_flashdata('message_type', 'fail');
							//$this->index();
							$errors[] = "Fail: Update while deleting details Failed !";
							echo json_encode(['error'=>$errors]); exit;
						}

					}
					

					//$this->session->set_flashdata('message', "Success: Update Successful !");
					//$this->session->set_flashdata('message_type', 'success'); 
					//customclearcache();
					//$this->index();
					$success[] = "Success: Update Successful !";
					echo json_encode(['success'=>$success]); exit;

				} else {

					///$this->session->set_flashdata('message', "Fail: Update Failed !");
					///$this->session->set_flashdata('message_type', 'fail');
					//customclearcache();
					//redirect('csetupfactory','refresh');
					///$this->index();
					$errors[] = "Fail: Update Failed !";
					echo json_encode(['error'=>$errors]); exit;
				}
			
			} else {

				$this->session->set_flashdata('message', "Fail: Update Failed !");
				$this->session->set_flashdata('message_type', 'fail'); 	
				//$message ='success';	
				//return json_encode($message);		
				redirect('csetupfactory','refresh');
			}

		}

		public function deleteActivityDetailByIds($strIntIds){
			if ( TRUE == checkSession() ) {
				
				$this->load->model('setupfactory/ModelActivityDetails','activitydetails');

				if ( true == $this->activitydetails->deleteActivityDetailsByIdsAndUserId( $strIntIds, $this->session->userdata['logged_in']['user_id'] ) )	{
					return true;

				} else{

					return false;

				}					
				
				
			} else {
				return false;
			}

		}

		public function heading_check($str)
        {
                if ( empty($str) )
                { 
                        $message = "Heading required!";
                        return $message;
                }
                else  if (!preg_match('/^[0-9,a-z .,\-]+$/i',trim($str)))
                {
                        $message = "Enter valid Heading!";
                        return $message;
                }
                else if ( 50 < strlen($str) ) {

                	 $message = "Maximum length of Heading should be less than 50 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function discription_check($str)
        {
                if (!empty($str) && !preg_match('/^[0-9,a-z .,\-]+$/i',trim($str)))
                {
                        $message = "Enter valid Description!";
                        return $message;
                }
                else if ( 250 < strlen($str) ) {

                	 $message = "Maximum length of description should be less than 250 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

	}
?>

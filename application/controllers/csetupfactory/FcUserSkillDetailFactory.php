<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcUserSkillDetailFactory extends CI_Controller{

		public function index(){

			if (TRUE == checkSession() ) {

				$this->load->model('setupfactory/ModelSkillDetails','skilldetails');

				$arrmixResult['arrmixSkillData'] = $this->skilldetails->getSkillDetailsByUserId( $this->session->userdata['logged_in']['user_id'] );	
						
				$this->load->view( "setupfactory/viewAddSkillDetail", $arrmixResult );
				//$this->load->view("setupfactory/viewAddSkillDetail");
			} else {
				redirect('csetupfactory','refresh');
			}
		}


		public function addUpdateSkillDetail() {

			if ( TRUE == checkSession() ) {
				
 				$this->load->library('form_validation');

 				$this->session->set_flashdata('controller', '');
 				$this->session->set_flashdata('controller', 'skill_details');

 				$arrmixSkillData = json_decode( $this->input->Post( 'skill_details' ), true );

 				//print_r($arrmixSkillData);
 				// if all data is deleted
                if ( 1 == empty($arrmixSkillData[0]) AND NULL !== $this->input->Post( 'delete_ids' ) ){

                    $strDeletedSkillDetailsIds = $this->input->Post( 'delete_ids' ); 


                    if( false == $this->deleteSkillDetailByIds( $strDeletedSkillDetailsIds ) ) {
                            
                            $errors[] = "Fail: Update while deleting details Failed !";
                            echo json_encode(['error'=>$errors]); exit;
                        }
                        else{
                            
                            $success[] = "Success: Update Successful !";
                            echo json_encode(['success'=>$success]); exit;
                        }
                }
                // if all data is deleted
 				if ( NULL !== $arrmixSkillData ) {
					$errors = array();
					foreach( $arrmixSkillData as $postedIndex=> $posted ){

						$id = $arrmixSkillData[$postedIndex]['id'];
						

						//validation
						$strskill_check = $this->skill_check($arrmixSkillData[$postedIndex]['skill']);

						if( true !== $strskill_check ) {

							$errors[] = "txt_skill_".$postedIndex.":".$strskill_check;
							//$errors["txt_standard_".$postedIndex]['message'] = $strqulification_check;

						}

						$strversion_check = $this->version_check($arrmixSkillData[$postedIndex]['version']);

						if( true !== $strversion_check ) {

							$errors[] = "txt_version_".$postedIndex.":".$strversion_check;
							//$errors["txt_institute_".$postedIndex]['message'] = $strinstitute_check;

						}

						$strexp_check = $this->float_check($arrmixSkillData[$postedIndex]['exprience'],'Experience');

						if( true !== $strexp_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_exprience_".$postedIndex.":".$strexp_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}
					}
				}
				//exit;
					
				if(!empty(array_filter($errors))){					
					
            		echo json_encode(['error'=>$errors]); exit;
            	}
            		//validation;
	                	

				$this->load->model('setupfactory/ModelSkillDetails','skilldetails');

				$arrmixResult = $this->skilldetails->addUpdate();

				if( false != $arrmixResult ){

					$strSkillDetailsIds = $this->input->Post( 'delete_ids' ); 


					if( null !== $strSkillDetailsIds ) {

						if( false == $this->deleteSkillDetailByIds( $strSkillDetailsIds ) ) { 

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

		public function deleteSkillDetailByIds($strIntIds){
			if (TRUE == checkSession() ) {
				
				$this->load->model('setupfactory/ModelSkillDetails','skilldetails');

				if ( true == $this->skilldetails->deleteSkillDetailsByIdsAndUserId( $strIntIds, $this->session->userdata['logged_in']['user_id'] ) )	{
					return true;

				} else{

					return false;

				}					
				
				
			} else {
				return false;
			}

		}

		public function skill_check($str)
        {
                if ( empty($str) )
                { 
                        $message = "Skill required!";
                        return $message;
                }
                else  if (!ctype_alnum($str))
                {
                        $message = "Enter valid skill!";
                        return $message;
                }
                else if ( 50 < strlen($str) ) {

                	 $message = "Maximum length of skill should be less than 50 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function version_check($str)
        {
                if (!ctype_alnum($str))
                {
                        $message = "Enter valid version!";
                        return $message;
                }
                else if ( 50 < strlen($str) ) {

                	 $message = "Maximum length of version should be less than 50 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function float_check($val, $name)
        {
                if ( empty($val) )
                { 
                        $message = $name." required!";
                        return $message;
                }
                else if(!filter_var($val, FILTER_VALIDATE_FLOAT))
                {
                        $message = "Enter valid $name!";
                        return $message;
                }
                else if ( 100 < $val  ) {

                	 $message = "Enter valid $name!";
                        return $message;
                }
                else{
                	return true;
                }
        }

	}
?>

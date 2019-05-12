<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcUserEducationalDetailFactory extends CI_Controller {

		public function index(){

			if (TRUE == checkSession() ) {
				
				$this->load->model('setupfactory/ModelEducationalDetails','educationaldetails');

				$arrmixResult['arrmixEducationalData'] = $this->educationaldetails->getEducationalDetailsByUserId( $this->session->userdata['logged_in']['user_id'] );	
						
				$this->load->view( "setupfactory/viewAddEducationalDetail", $arrmixResult );
				
			} else {
				redirect('csetupfactory','refresh');
			}
		}

		public function addUpdateEducationalDetail() {

			if ( TRUE == checkSession() ) {
				
 				$this->load->library('form_validation');

 				$this->session->set_flashdata('controller', '');
 				$this->session->set_flashdata('controller', 'educational_details');

 				$arrmixEducationalData = json_decode( $this->input->Post( 'educational_details' ), true );

 				//print_r($arrmixEducationalData);
 				// if all data is deleted
                if ( 1 == empty($arrmixEducationalData[0]) AND NULL !== $this->input->Post( 'delete_ids' ) ){

                    $strDeletedEducationalDetailsIds = $this->input->Post( 'delete_ids' ); 


                    if( false == $this->deleteEducationalDetailByIds( $strDeletedEducationalDetailsIds ) ) {
                            
                            $errors[] = "Fail: Update while deleting details Failed !";
                            echo json_encode(['error'=>$errors]); exit;
                        }
                        else{
                            
                            $success[] = "Success: Update Successful !";
                            echo json_encode(['success'=>$success]); exit;
                        }
                }
                // if all data is deleted
 				if ( NULL !== $arrmixEducationalData ) {
					$errors = array();
					foreach( $arrmixEducationalData as $postedIndex=> $posted ){

						$id = $arrmixEducationalData[$postedIndex]['id'];
						

						//validation
						$strqulification_check = $this->qulification_check($arrmixEducationalData[$postedIndex]['qualification']);

						if( true !== $strqulification_check ) {

							$errors[] = "txt_standard_".$postedIndex.":".$strqulification_check;
							//$errors["txt_standard_".$postedIndex]['message'] = $strqulification_check;

						}

						$strinstitute_check = $this->institute_check($arrmixEducationalData[$postedIndex]['institute']);

						if( true !== $strinstitute_check ) {

							$errors[] = "txt_institute_".$postedIndex.":".$strinstitute_check;
							//$errors["txt_institute_".$postedIndex]['message'] = $strinstitute_check;

						}

						$strboard_check = $this->board_check($arrmixEducationalData[$postedIndex]['board']);

						if( true !== $strboard_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_board_".$postedIndex.":".$strboard_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}

						$strpassingyear_check = $this->passingyear_check($arrmixEducationalData[$postedIndex]['passing_year']);

						if( true !== $strpassingyear_check ) {

							$errors[] = "txt_passing_year_".$postedIndex.":".$strpassingyear_check;
							//$errors["txt_passing_year_".$postedIndex]['message'] = $strpassingyear_check;

						}

						$strpercentage_check = $this->percentage_check($arrmixEducationalData[$postedIndex]['percentage']);

						if( true !== $strpercentage_check ) {

							$errors[]= "txt_percentage_".$postedIndex.":".$strpercentage_check;
							//$errors["txt_percentage_".$postedIndex]['message'] = $strpercentage_check;

						}
					}
				}
				//exit;
					
				if(!empty(array_filter($errors))){					
					
            		echo json_encode(['error'=>$errors]); exit;
            	}
            		//validation;
	                	

				$this->load->model('setupfactory/ModelEducationalDetails','educationaldetails');

				$arrmixResult = $this->educationaldetails->addUpdate();

				if( false != $arrmixResult ){

					$strEducationalDetailsIds = $this->input->Post( 'delete_ids' ); 


					if( null !== $strEducationalDetailsIds ) {

						if( false == $this->deleteEducationalDetailByIds( $strEducationalDetailsIds ) ) { 

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

		public function deleteEducationalDetailByIds($strIntIds){
			if (TRUE == checkSession() ) {
				
				$this->load->model('setupfactory/ModelEducationalDetails','educationaldetails');

				if ( true == $this->educationaldetails->deleteEducationalDetailsByIdsAndUserId( $strIntIds, $this->session->userdata['logged_in']['user_id'] ) )	{
					return true;

				} else{

					return false;

				}					
				
				
			} else {
				return false;
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

		public function qulification_check($str)
        {
                if ( empty($str) )
                { 
                        $message = "Qualification required!";
                        return $message;
                }
                else  if (!ctype_alnum($str))
                {
                        $message = "Enter valid qualification!";
                        return $message;
                }
                else if ( 20 < strlen($str) ) {

                	 $message = "Maximum length of qualification should be less than 20 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function institute_check($strinstitute)
        {
                if ( empty($strinstitute) )
                { 
                        $message = "Institute required!";
                        return $message;
                }
                else  if (!ctype_alnum($strinstitute))
                {
                        $message = "Enter valid Institute!";
                        return $message;
                }
                else if ( 200 < strlen($strinstitute) ) {

                	 $message = "Maximum length of Institute should be less than 200 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function board_check($strboard)
        {
                if ( empty($strboard) )
                { 
                        $message = "Board required!";
                        return $message;
                }
                else  if (!ctype_alnum($strboard))
                {
                        $message = "Enter valid board!";
                        return $message;
                }
                else if ( 100 < strlen($strboard) ) {

                	 $message = "Maximum length of board should be less than 100 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function passingyear_check($year)
        {
                if ( empty($year) )
                { 
                        $message = "Passing year required!";
                        return $message;
                }
                else if(!filter_var($year, FILTER_VALIDATE_INT))
                {
                        $message = "Enter valid Passing year!";
                        return $message;
                }
                else if ( 4 < strlen($year) || 1950 > $year || date("Y") < $year ) {

                	 $message = "Passing year should be in between 1950 to ".date("Y")." !";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function percentage_check($val)
        {
                if ( empty($val) )
                { 
                        $message = "Percentage required!";
                        return $message;
                }
                else if(!filter_var($val, FILTER_VALIDATE_INT))
                {
                        $message = "Enter valid Percentage!";
                        return $message;
                }
                else if ( 100 < $val  ) {

                	 $message = "Enter valid Percentage!";
                        return $message;
                }
                else{
                	return true;
                }
        }

	}
?>

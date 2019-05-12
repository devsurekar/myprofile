<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcUserCompanyDetailFactory extends CI_Controller{

		public function index(){

			if (TRUE == checkSession() ) {

				$this->load->model('setupfactory/ModelCompanyDetails','comapanydetails');

				$arrmixResult['arrmixCompanyData'] = $this->comapanydetails->getCompanyDetailsByUserId( $this->session->userdata['logged_in']['user_id'] );	
						
				$this->load->view( "setupfactory/viewAddCompanyDetail", $arrmixResult );
			} else {
				redirect('csetupfactory','refresh');
			}
		}


		public function addUpdateCompanyDetail() {

			if ( TRUE == checkSession() ) {
				
 				$this->load->library('form_validation');

 				$this->session->set_flashdata('controller', '');
 				$this->session->set_flashdata('controller', 'company_details');

 				$arrmixCompanyData = json_decode( $this->input->Post( 'company_details' ), true );

 				//print_r($arrmixCompanyData);
 				 // if all data is deleted
                if ( 1 == empty($arrmixCompanyData[0]) AND NULL !== $this->input->Post( 'delete_ids' ) ){

                    $strDeletedCompanyDetailsIds = $this->input->Post( 'delete_ids' ); 


                    if( false == $this->deleteCompanyDetailByIds( $strDeletedCompanyDetailsIds ) ) {
                            
                            $errors[] = "Fail: Update while deleting details Failed !";
                            echo json_encode(['error'=>$errors]); exit;
                        }
                        else{
                            
                            $success[] = "Success: Update Successful !";
                            echo json_encode(['success'=>$success]); exit;
                        }
                }
                // if all data is deleted

 				if ( NULL !== $arrmixCompanyData ) {
					$errors = array();
					foreach( $arrmixCompanyData as $postedIndex=> $posted ){

						$id = $arrmixCompanyData[$postedIndex]['id'];
						

						//validation
						$strcompany_name_check = $this->company_name_check($arrmixCompanyData[$postedIndex]['comp_name']);

						if( true !== $strcompany_name_check ) {

							$errors[] = "txt_compname_".$postedIndex.":".$strcompany_name_check;
							//$errors["txt_standard_".$postedIndex]['message'] = $strqulification_check;

						}

						$strcity_check = $this->city_check($arrmixCompanyData[$postedIndex]['city']);

						if( true !== $strcity_check ) {

							$errors[] = "txt_city_".$postedIndex.":".$strcity_check;
							//$errors["txt_institute_".$postedIndex]['message'] = $strinstitute_check;

						}

						$strjoin_date_check = $this->join_date_check($arrmixCompanyData[$postedIndex]['join_date']);

						if( true !== $strjoin_date_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_joindate_".$postedIndex.":".$strjoin_date_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}

						$strleaving_date_check = $this->leaving_date_check($arrmixCompanyData[$postedIndex]['leaving_date'], $arrmixCompanyData[$postedIndex]['join_date']);

						if( true !== $strleaving_date_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_leavingdate_".$postedIndex.":".$strleaving_date_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}

						$strdesignation_check = $this->designation_check($arrmixCompanyData[$postedIndex]['designation']);

						if( true !== $strdesignation_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_designation_".$postedIndex.":".$strdesignation_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}

						$strcountry_check = $this->country_check($arrmixCompanyData[$postedIndex]['country']);

						if( true !== $strcountry_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_country_".$postedIndex.":".$strcountry_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}


					}
				}
				//exit;
					
				if(!empty(array_filter($errors))){					
					
            		echo json_encode(['error'=>$errors]); exit;
            	}
            		//validation;
	                	

				$this->load->model('setupfactory/ModelCompanyDetails','comapanydetails');

				$arrmixResult = $this->comapanydetails->addUpdate();

				if( false != $arrmixResult ){

					$strCompanyDetailsIds = $this->input->Post( 'delete_ids' ); 


					if( null !== $strCompanyDetailsIds ) {

						if( false == $this->deleteCompanyDetailByIds( $strCompanyDetailsIds ) ) { 

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

		public function deleteCompanyDetailByIds($strIntIds){
			if ( TRUE == checkSession() ) {
				
				$this->load->model('setupfactory/ModelCompanyDetails','comapanydetails');

				if ( true == $this->comapanydetails->deleteCompanyDetailsByIdsAndUserId( $strIntIds, $this->session->userdata['logged_in']['user_id'] ) )	{
					return true;

				} else{

					return false;

				}					
				
				
			} else {
				return false;
			}

		}

		public function company_name_check($str)
        {
                if ( empty($str) )
                { 
                        $message = "Company name required!";
                        return $message;
                }
                else  if (!preg_match('/^[0-9,a-z .,\-]+$/i',trim($str)))
                {
                        $message = "Enter valid Company name!";
                        return $message;
                }
                else if ( 50 < strlen($str) ) {

                	 $message = "Maximum length of Company name should be less than 50 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function city_check($str)
        {
                if ( empty($str) )
                { 
                        $message = "City required!";
                        return $message;
                }
                else  if (!ctype_alpha($str))
                {
                        $message = "Enter valid City!";
                        return $message;
                }
                else if ( 50 < strlen($str) ) {

                	 $message = "Maximum length of City should be less than 50 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function join_date_check($str)
        {
                if ( empty($str) )
                { 
                        $message = "Join date required!";
                        return $message;
                }
                else  if (DateTime::createFromFormat('Y-m-d', $str) === false)
                {
                        $message = "Enter valid Join date!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function leaving_date_check($str, $dateStartDate)
        {
                if ( !empty($str) && DateTime::createFromFormat('Y-m-d', $str) === false )
                {
                        $message = "Enter valid Leaving date!";
                        return $message;
                }
                else if ( !empty($str) && ( strtotime($dateStartDate) > strtotime($str) ) ) {

                	 $message = "Leaving date should be greater than Start date!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function designation_check($str)
        {
                if ( empty($str) )
                { 
                        $message = "Designation required!";
                        return $message;
                }
                else  if (!ctype_alpha(str_replace(" ", "", $str)))
                {
                        $message = "Enter valid Designation!";
                        return $message;
                }
                else if ( 50 < strlen($str) ) {

                	 $message = "Maximum length of Designation should be less than 50 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }
        
        public function country_check($str)
        {
                if ( empty($str) )
                { 
                        $message = "Country required!";
                        return $message;
                }
                else  if (!ctype_alpha($str))
                {
                        $message = "Enter valid Country!";
                        return $message;
                }
                else if ( 50 < strlen($str) ) {

                	 $message = "Maximum length of Country should be less than 50 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

	}
?>

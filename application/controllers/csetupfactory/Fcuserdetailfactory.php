<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcUserDetailFactory extends CI_Controller {

		public function index(){

			if (TRUE == checkSession() ) {
				
				$this->load->model('setupfactory/ModelUserDetails','userdetails');

				$arrmixResult = $this->userdetails->getUserDetailsByUserId( $this->session->userdata['logged_in']['user_id'] );

				if( false != $arrmixResult ){

					$this->load->view("setupfactory/viewAddUserDetail", $arrmixResult );
				}
			} else {
				
				customclearcache();
				redirect('csetupfactory','refresh');
			}
		}

		public function addUpdateUser() {
			
			if ( TRUE == checkSession() && true == isset( $_POST['first_name'] ) && true == isset( $_POST['email_address'] ) ) {


				if( $_POST['email_address'] != $this->session->userdata['logged_in']['email_address'] ) {
					$this->form_validation->set_rules('email_address', 'Email', 'required|is_unique[user_details.email_address]|max_length[50]|valid_email');
				}
 
 				$this->load->library('form_validation');
 				$this->session->set_flashdata('controller', '');
 				$this->session->set_flashdata('controller', 'user_details');
				if ( FALSE === $this->form_validation->run() ){
						$this->session->set_flashdata('message', "Fail: Please enter valid details metioned bellow !");
						$this->session->set_flashdata('message_type', 'fail'); 					
	                	$this->index();
	                	return;
	                }			
				
				$this->load->model('setupfactory/ModelUserDetails','userdetails');

				$arrmixResult = $this->userdetails->addUpdate( $this->session->userdata['logged_in']['user_id'] );

				if( false != $arrmixResult ){					
				
				
					$arrmixUploadResult = $this->pic_upload();	
					//print_r($arrmixUploadResult); exit;				

					if( 'true' == $arrmixUploadResult['boolistrue'] ) {
						$this->session->set_flashdata('message', "Success: Update Successful !");
						$this->session->set_flashdata('message_type', 'success'); 
						customclearcache();
						$this->index();
					} else {

						$message = 'Fail:'.$arrmixUploadResult['result']['error']. '!';

						$this->session->set_flashdata('message', $message);
						$this->session->set_flashdata('message_type', 'fail');
						customclearcache();
						//redirect('csetupfactory','refresh');
						$this->index();
					}
				}
			
			} else {
				$this->session->set_flashdata('message', "Fail: Update Failed !");
				$this->session->set_flashdata('message_type', 'fail'); 
				
				redirect('csetupfactory','refresh');
			}

		}


		public function pic_upload()
        {
        	$ext ='';
        	if( true == isset( $_FILES['profile_pic']['name'] ) ) {
        		$ext = pathinfo( $_FILES['profile_pic']['name'], PATHINFO_EXTENSION ); 
        	}

				$strFileName = 'userProfilePic_'.(( string ) $this->session->userdata['logged_in']['user_id'] ).'.'.$ext;
				
        	if ( true == isset( $this->session->userdata['logged_in']['user_id'] ) && '' != $ext  ) {

                $config['upload_path']          ='./assets/images/common/';
                $config['allowed_types']        = 'jpg';
                $config['max_size']             = 2000;
                $config['max_width']            = 1024;
                $config['max_height']           = 1000;
                $config['overwrite']           = true;
                $config['file_name']           = $strFileName;

                $this->load->library('upload');
                $this->upload->initialize($config);


                if ( ! $this->upload->do_upload('profile_pic'))
                {
                        $data = array('error' => $this->upload->display_errors());

                        $boolIsTrue = 'false';
                    
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $boolIsTrue = 'true';
                     

                }
                $arrmixUploadResult['boolistrue'] = $boolIsTrue;
                $arrmixUploadResult['result'] = $data;
			} else {

                $arrmixUploadResult['boolistrue'] = 'true';
                $arrmixUploadResult['result'] = 'Successful Session not created or file not uploaded';
            }

                
                return $arrmixUploadResult;

        }

        function checkDateFormat($date) {

	        	$pattern = "/[0-9]{4}-[0-9]{2}-[0-9]{2}/";
				if (true == preg_match( $pattern , $date )) {
				
					return true;
				}
				else{

					$this->form_validation->set_message('checkDateFormat', 'Please enter valid date!');
					return false;
				}
				
				
			}

			function checkUrl($strUrl) {

	        	if ( false == isset($strUrl) || '' == $strUrl ) {
	        		return true; 
	        	}

	        	$url = filter_var($strUrl, FILTER_SANITIZE_URL);

				// Validate url
				if (filter_var($url, FILTER_VALIDATE_URL)) {
				    return true;
				} else {
					$this->form_validation->set_message('checkUrl', "$url is not a valid URL");	
				    return false;
				}
				
				
			}

			public function checkCustomAlpha($str) 
			{
			    if ( !preg_match('/^[A-Za-z0-9 .,\-]+$/i',$str) )
			    {
			    	$this->form_validation->set_message('checkCustomAlpha', 'Please enter valid details!');
			        return false;
			    } else {
			    	return true;
			    }
			}


			public function updateAboutMe()
			{
				if ( TRUE == checkSession() ) {

					$this->load->library('form_validation');

	 				$this->session->set_flashdata('controller', '');
	 				$this->session->set_flashdata('controller', 'user_details');

	 				$strAboutMe = trim($this->input->Post( 'straboutme' ));
					
				 	if ( NULL != $strAboutMe ||  '' != $strAboutMe) {
						$errors = array();
						$strdiscription_check = $this->discription_check($strAboutMe);

						if( true != $strdiscription_check ) {

							$errors[] = "txt_aboutMe:".$strdiscription_check;

						}
					} else{
						$errors[] = "txt_aboutMe:Enter valid Description!";
					}

					if(!empty(array_filter($errors))){	

            			echo json_encode(['error'=>$errors]); exit;
            		}

            		$this->load->model('setupfactory/ModelUserDetails','userdetails');

					$arrmixResult = $this->userdetails->updateAboutMe($this->session->userdata['logged_in']['user_id']);

					if ( true == $arrmixResult ) {
						$success[] = "Success: Update Successful !";
						echo json_encode(['success'=>$success]); exit;
					} else{
						$errors[] = "Fail: Update Failed !";
						echo json_encode(['error'=>$errors]); exit;
					}

				} else{
					$this->session->set_flashdata('message', "Fail: Update Failed !");
					$this->session->set_flashdata('message_type', 'fail'); 
					redirect('csetupfactory','refresh');
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
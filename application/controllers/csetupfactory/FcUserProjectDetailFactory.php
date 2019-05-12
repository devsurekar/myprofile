<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcUserProjectDetailFactory extends CI_Controller{

		public function index() {

			if (TRUE == checkSession() ) {

				$this->load->model('setupfactory/ModelProjectDetails','projectdetails');

				$arrmixResult['arrmixProjectData'] = $this->projectdetails->getProjectDetailsByUserId( $this->session->userdata['logged_in']['user_id'] );	
						
				$this->load->view( "setupfactory/viewAddProjectDetail", $arrmixResult );
			} else {
				redirect('csetupfactory','refresh');
			}
		}

		public function addUpdateProjectDetail() {

			if ( TRUE == checkSession() ) {
				
 				$this->load->library('form_validation');

 				$this->session->set_flashdata('controller', '');
 				$this->session->set_flashdata('controller', 'project_details');

 				$arrmixProjectData = json_decode( $this->input->Post( 'project_details' ), true );

                // if all data is deleted
                if ( 1 == empty($arrmixProjectData[0]) AND NULL !== $this->input->Post( 'delete_ids' ) ){

                    $strDeletedProjectDetailsIds = $this->input->Post( 'delete_ids' ); 


                    if( false == $this->deleteProjectDetailByIds( $strDeletedProjectDetailsIds ) ) {
                            
                            $errors[] = "Fail: Update while deleting details Failed !";
                            echo json_encode(['error'=>$errors]); exit;
                        }
                        else{
                            
                            $success[] = "Success: Update Successful !";
                            echo json_encode(['success'=>$success]); exit;
                        }
                }
                // if all data is deleted

 				//print_r($arrmixProjectData);
 				if ( NULL !== $arrmixProjectData ) {
					$errors = array();
					foreach( $arrmixProjectData as $postedIndex=> $posted ){

						$id = $arrmixProjectData[$postedIndex]['id'];
						

						//validation
						$strproject_type_check = $this->project_type_check($arrmixProjectData[$postedIndex]['project_type']);

						if( true !== $strproject_type_check ) {

							$errors[] = "sel_project_type_".$postedIndex.":".$strproject_type_check;
							//$errors["txt_standard_".$postedIndex]['message'] = $strqulification_check;

						}

						$strproject_name_check = $this->project_name_check($arrmixProjectData[$postedIndex]['project_name']);

						if( true !== $strproject_name_check ) {

							$errors[] = "txt_add_edit_project_name_".$postedIndex.":".$strproject_name_check;
							//$errors["txt_standard_".$postedIndex]['message'] = $strqulification_check;

						}

						$strdegree_check = $this->degree_name_check($arrmixProjectData[$postedIndex]['degree_name']);

						if( true !== $strdegree_check ) {

							$errors[] = "txt_add_edit_degree_name_".$postedIndex.":".$strdegree_check;
							//$errors["txt_institute_".$postedIndex]['message'] = $strinstitute_check;

						}

						$strtechnology_check = $this->technology_check($arrmixProjectData[$postedIndex]['technology']);

						if( true !== $strtechnology_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_add_edit_technology_".$postedIndex.":".$strtechnology_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}

						$strdomain_check = $this->domain_check($arrmixProjectData[$postedIndex]['domain']);

						if( true !== $strdomain_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_add_edit_domain_".$postedIndex.":".$strdomain_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}

						$strteam_size_check = $this->team_size_check($arrmixProjectData[$postedIndex]['team_size']);

						if( true !== $strteam_size_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_add_edit_team_size_".$postedIndex.":".$strteam_size_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}

						$strduration_check = $this->duration_check($arrmixProjectData[$postedIndex]['duration']);

						if( true !== $strduration_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_add_edit_duration_".$postedIndex.":".$strduration_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}

						$strresponsibility_check = $this->responsibility_check($arrmixProjectData[$postedIndex]['responsibility']);

						if( true !== $strresponsibility_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_add_edit_responsibility_".$postedIndex.":".$strresponsibility_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}

						$strcontribution_check = $this->contribution_check($arrmixProjectData[$postedIndex]['contribution']);

						if( true !== $strcontribution_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_add_edit_contribution_".$postedIndex.":".$strcontribution_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}

						$strproject_description_check = $this->project_description_check($arrmixProjectData[$postedIndex]['project_description']);

						if( true !== $strproject_description_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_project_description_".$postedIndex.":".$strproject_description_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}

						$strproject_url_check = $this->project_url_check($arrmixProjectData[$postedIndex]['project_link']);

						if( true !== $strproject_url_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_add_edit_project_link_".$postedIndex.":".$strproject_url_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}

						$strremark_check = $this->remark_check($arrmixProjectData[$postedIndex]['remark']);

						if( true !== $strremark_check ) {

							//echo "txt_board_".$postedIndex.":".$strboard_check;
							$errors[]= "txt_add_edit_remark_".$postedIndex.":".$strremark_check;
							//$errors["txt_board_".$postedIndex]['message'] = $strboard_check;

						}

					}
				}
				//exit;
					
				if(!empty(array_filter($errors))){					
					
            		echo json_encode(['error'=>$errors]); exit;
            	}
            		//validation;
	                	

				$this->load->model('setupfactory/ModelProjectDetails','projectdetails');

				$arrmixResult = $this->projectdetails->addUpdate();

				if( false != $arrmixResult ){

					$strProjectDetailsIds = $this->input->Post( 'delete_ids' ); 


					if( null !== $strProjectDetailsIds ) {

						if( false == $this->deleteProjectDetailByIds( $strProjectDetailsIds ) ) { 

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

		public function deleteProjectDetailByIds($strIntIds){
			if ( TRUE == checkSession() ) {
				
				$this->load->model('setupfactory/ModelProjectDetails','projectdetails');

				if ( true == $this->projectdetails->deleteProjectDetailsByIdsAndUserId( $strIntIds, $this->session->userdata['logged_in']['user_id'] ) )	{
					return true;

				} else{

					return false;

				}					
				
				
			} else {
				return false;
			}

		}

		public function project_type_check($str)
        {
                if ( empty($str) || 'N' == $str )
                { 
                        $message = "Project type required!";
                        return $message;
                }
                else{
                	return true;
                }
        }

		public function project_name_check($str)
        {
                if ( empty($str) )
                { 
                        $message = "Project name required!";
                        return $message;
                }
                else  if (!preg_match('/^[0-9,a-z .,\-]+$/i',trim($str)))
                {
                        $message = "Enter valid Project Name!";
                        return $message;
                }
                else if ( 50 < strlen($str) ) {

                	 $message = "Maximum length of Project Name should be less than 50 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function degree_name_check($str)
        {
                if (!empty($str) && !preg_match('/^[0-9,a-z .,\-]+$/i',trim($str)))
                {
                        $message = "Enter valid Degree Name!";
                        return $message;
                }
                else if ( 50 < strlen($str) ) {

                	 $message = "Maximum length of Degree Name should be less than 50 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function technology_check($str)
        {
                if ( empty($str) )
                { 
                        $message = "Technology required!";
                        return $message;
                }
                else  if (!preg_match('/^[0-9,a-z .,\-]+$/i',trim($str)))
                {
                        $message = "Enter valid Technology!";
                        return $message;
                }
                else if ( 250 < strlen($str) ) {

                	 $message = "Maximum length of Technology should be less than 250 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function domain_check($str)
        {
                if ( empty($str) )
                { 
                        $message = "Domain required!";
                        return $message;
                }
                else  if (!preg_match('/^[0-9,a-z .,\-]+$/i',trim($str)))
                {
                        $message = "Enter valid Domain!";
                        return $message;
                }
                else if ( 150 < strlen($str) ) {

                	 $message = "Maximum length of Domain should be less than 150 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function responsibility_check($str)
        {
                if ( empty($str) )
                { 
                        $message = "Responsibility required!";
                        return $message;
                }
                else  if (!preg_match('/^[0-9,a-z .,\-]+$/i',trim($str)))
                {
                        $message = "Enter valid Responsibility!";
                        return $message;
                }
                else if ( 150 < strlen($str) ) {

                	 $message = "Maximum length of Responsibility should be less than 150 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function contribution_check($str)
        {
                if ( empty($str) )
                { 
                        $message = "Contribution required!";
                        return $message;
                }
                else  if (!preg_match('/^[0-9,a-z .,\-]+$/i',trim($str)))
                {
                        $message = "Enter valid contribution!";
                        return $message;
                }
                else if ( 150 < strlen($str) ) {

                	 $message = "Maximum length of contribution should be less than 150 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

         public function project_description_check($str)
        {
                if ( empty($str) )
                { 
                        $message = "Project description required!";
                        return $message;
                }
                else  if (!preg_match('/^[0-9,a-z .,\-]+$/i',trim($str)))
                {
                        $message = "Enter valid Project description!";
                        return $message;
                }
                else if ( 250 < strlen($str) ) {

                	 $message = "Maximum length of Project description should be less than 250 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function remark_check($str)
        {
                if (!empty($str) && !preg_match('/^[0-9,a-z .,\-]+$/i',trim($str)))
                {
                        $message = "Enter valid Project remark!";
                        return $message;
                }
                else if ( 100 < strlen($str) ) {

                	 $message = "Maximum length of Project remark should be less than 100 characters!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function team_size_check($str)
        {
                if(!empty($str) && !filter_var($str, FILTER_VALIDATE_INT))
                {
                        $message = "Enter valid team size!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function duration_check($str)
        {
                if(!empty($str) && !filter_var($str, FILTER_VALIDATE_FLOAT))
                {
                        $message = "Enter valid duration!";
                        return $message;
                }
                else{
                	return true;
                }
        }

        public function project_url_check($val)
        {
                if(!empty($str) && !filter_var($val, FILTER_VALIDATE_URL))
                {
                        $message = "Enter valid Project Url!";
                        return $message;
                }
                else{
                	return true;
                }
        }

	}
?>

<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class FcUnlock extends CI_Controller {

		function __construct() {

			parent::__construct();
			$arrmixPassData = [];
		}

		public function index($strShowForm, $data = NULL ) {
 			if( FALSE == checkSession() ) {

	 			if($strShowForm == '$1'){$strShowForm='signin';}
				$arrmixPassData['strShowFormValue'] = $strShowForm;
				$arrmixPassData['arrmixValidationError'] = $data;
				$this->load->view("setupfactory/viewUnlock", $arrmixPassData);
				
			} else {

				$this->load->model('setupfactory/ModelDashBoard','dashboard');
				$this->load->model('setupfactory/ModelProjectDetails','projectdetails');
				$this->load->model('setupfactory/ModelMessageDetails','messagedetails');
				$this->load->model('setupfactory/ModelUserViews','userviews');

				$arrmixDashBoardData['arrmixDashBoardData'] = $this->dashboard->getDashBoardDetailsByUserId( $this->session->userdata['logged_in']['user_id'] );
				$arrmixProjectDetails = $this->projectdetails->getProjectDetailsByUserId($this->session->userdata['logged_in']['user_id'] );
				$arrmixMessageDetails = $this->messagedetails->getMessageDetailsByUserId($this->session->userdata['logged_in']['user_id'] );
				//user views
				$arrmixUserViews = $this->userviews->getUserViewDetails();
				//user views

				$arrmixDashBoardData ['arrmixProjectDetails']= $arrmixProjectDetails;
				$arrmixDashBoardData ['arrmixMessageDetails']= $arrmixMessageDetails;
				$arrmixDashBoardData ['arrmixUserViews']= $arrmixUserViews;

				$this->load->view("setupfactory/viewDashboard", $arrmixDashBoardData);
			}
		}

		public function addSignUp() {

			if( FALSE == checkSession() ) {
				$this->form_validation->set_rules('first_name', 'First Name', 'required|max_length[50]|alpha');
				$this->form_validation->set_rules('last_name', 'Last Name', 'required|max_length[50]|alpha');
				$this->form_validation->set_rules('password', 'Password', 'required|max_length[200]');
				$this->form_validation->set_rules('confirm_p', 'password Confirmation', 'required|matches[password]|max_length[200]');
				$this->form_validation->set_rules('email_address', 'Email', 'required|is_unique[user_details.email_address]|max_length[50]|valid_email');

				if (FALSE === $this->form_validation->run()){

	                	$this->index('signup');
	                	
	                }else {
	                

						$this->load->model('setupfactory/ModelUserDetails','userdetails');
						$boolIsResult = $this->userdetails->addUpdate();

						if( TRUE == $boolIsResult ){
							$this->session->set_flashdata('message', "Success: Registered Successfully!"); 
							$this->session->set_flashdata('message_type', "success");
						}else if( FALSE == $boolIsResult ) {
							$this->session->set_flashdata('message', "Fail: Registration Failed!");
							$this->session->set_flashdata('message_type', "fail");
						}else {
							$this->session->set_flashdata( $boolIsResult );// exception
							$this->session->set_flashdata('message_type', "fail");
						}
						
						redirect('csetupfactory','refresh');
					}
			} else {
				$this->load->model('setupfactory/ModelDashBoard','dashboard');
				$arrmixDashBoardData['arrmixDashBoardData'] = $this->dashboard->getDashBoardDetailsByUserId( $this->session->userdata['logged_in']['user_id'] );
				$this->load->view("setupfactory/viewDashboard", $arrmixDashBoardData);
			}
		}

		public function signIn() {

			$arrmixValidationErrors = $this->validateReuiredSignIn();

			if( FALSE == $arrmixValidationErrors['result'] ){
				$this->index( 'signin', $arrmixValidationErrors );
			}else 
			{ 
					$this->load->model('setupfactory/ModelUserDetails','userdetails');
					$this->load->model('setupfactory/ModelProjectDetails','projectdetails');
					$this->load->model('setupfactory/ModelMessageDetails','messagedetails');
					$this->load->model('setupfactory/ModelUserViews','userviews');

					$arrmixCookieRememberMeToken = array(
					    'name'   => 'remember_me_token',
					    'value'  => uniqid(),
					    'expire' => time() + (86400 * 15),  // Two weeks
					    'path'   => '/'
					);					
						

					$arrmixResult = $this->userdetails->signIn($arrmixCookieRememberMeToken);
					

					if( TRUE === is_array( $arrmixResult ) && true == isset( $arrmixResult[0]->id ) ) {

						$arrmixProjectDetails = $this->projectdetails->getProjectDetailsByUserId($arrmixResult[0]->id);
						$arrmixMessageDetails = $this->messagedetails->getMessageDetailsByUserId($arrmixResult[0]->id);
						//user views
						$result = $this->userviews->addUpdate($arrmixResult[0]->id);
						$arrmixUserViews = $this->userviews->getUserViewDetails();
						//user views
						

						set_cookie($arrmixCookieRememberMeToken); // set token

						$arrmixDashBoardData = array();
						$arrmixSessionData = array(
						'user_id' => $arrmixResult[0]->id,
						'email_address' => $arrmixResult[0]->email_address,
						'first_name' => $arrmixResult[0]->first_name,
						'last_name' => $arrmixResult[0]->last_name,
						'user_name' => $arrmixResult[0]->user_name,
						'password' => $arrmixResult[0]->password,
						'about_you' => $arrmixResult[0]->about_you,
						'view_count' => $arrmixResult[0]->view_count,
						'download_count' => $arrmixResult[0]->download_count );

						$arrmixDashBoardData ['arrmixDashBoardData']= $arrmixResult;
						$arrmixDashBoardData ['arrmixProjectDetails']= $arrmixProjectDetails;
						$arrmixDashBoardData ['arrmixMessageDetails']= $arrmixMessageDetails;
						$arrmixDashBoardData ['arrmixUserViews']= $arrmixUserViews;

						 $this->session->set_userdata( 'logged_in', $arrmixSessionData );

						 $arrmixSessionDataprofilepic = array(
						'profile_pic' => $arrmixResult[0]->profile_pic);

						 $this->session->set_userdata( 'profile_pic', $arrmixSessionDataprofilepic );

						if( 1 === (int)$_POST['remember_me_value'] ){
							$arrmixCookieRememberMeUserName = array(
							    'name'   => 'entryn',
							    'value'  => $arrmixSessionData['user_name'],
							    'expire' => time() + (86400 * 15),  // Two weeks
							    'path'   => '/'
							);	

							$arrmixCookieRememberMePassword = array(
							    'name'   => 'entryp',
							    'value'  => $arrmixSessionData['password'],
							    'expire' => time() + (86400 * 15),  // Two weeks
							    'path'   => '/'
							);							
							set_cookie($arrmixCookieRememberMeUserName);// set remember me
							set_cookie($arrmixCookieRememberMePassword);// set remember me
						}else {
							
							delete_cookie('entryp');
							delete_cookie('entryn');
						}

						$this->load->view("setupfactory/viewDashboard", $arrmixDashBoardData);

					}else if( FALSE === $arrmixResult || false == isset( $arrmixResult[0]->id) ) {

						$this->session->set_flashdata('message', "Fail: User Name or Password not valid, Please try again!");
						$this->session->set_flashdata('message_type', "fail");
						redirect('csetupfactory','refresh');
					}else {
						$this->session->set_flashdata( $arrmixResult );// exception
						$this->session->set_flashdata('message_type', "fail");
						redirect('csetupfactory','refresh');
					}

					
			}

		}

				// Logout from admin page
		public function signOut() {
			// Removing session data
			$sess_array = array(
			'username' => ''
			);
			$sess_arraypro = array(
			'profile_pic' => ''
			);

			$boolIsResult= $this->removeTokenBYUserIdAndToken();
			if( TRUE == $boolIsResult ) {
				$this->session->unset_userdata('logged_in', $sess_array);
				$this->session->unset_userdata('profile_pic', $sess_arraypro);
				$this->session->set_flashdata('message', "Sign Out Successfully!");
				$this->session->set_flashdata('message_type', "success");
				delete_cookie('remember_me_token');
			} else {
				$this->session->set_flashdata('message', "Sign Out fail!");
				$this->session->set_flashdata('message_type', "fail");
			}
			redirect('csetupfactory','refresh');
		}

		public function removeTokenBYUserIdAndToken(){

			$this->load->model('setupfactory/ModelUserDetails','userdetails');

			$arrmixCookieRememberMe ['value'] = get_cookie('remember_me_token');

			$arrmixCookieRememberMe ['set'] = FALSE;

			if( TRUE == isset( $this->session->userdata['logged_in']['user_id'] ) ) {

				$intUserId['id'] = $this->session->userdata['logged_in']['user_id'];
			}

			$result = $this->userdetails->setRememberMeValues($arrmixCookieRememberMe, $intUserId);

			return $result;
			
		}
		public function validateReuiredSignIn() {

		if( ( TRUE == isset( $_POST['user_name'] ) ) && ( TRUE == isset( $_POST['password'] ) ) ) {
			$strUserName = $_POST['user_name'];
			$strPassword = $_POST['password']; 

			$arrmixResult['result'] = TRUE;
			$arrmixResult['val_username'] = TRUE;
			$arrmixResult['val_password'] = TRUE;

			if( '' == $strUserName || NULL == $strUserName ) {

				$arrmixResult['result'] = FALSE;
				$arrmixResult['val_username'] = FALSE;

			}else if( '' == $strPassword || NULL == $strPassword ){

				$arrmixResult['result'] = FALSE;
				$arrmixResult['val_password'] = FALSE;

			}
		}else{
				$arrmixResult['result'] = FALSE;
				$arrmixResult['val_password'] = FALSE;
				$arrmixResult['val_username'] = FALSE;
		}
			return $arrmixResult;
		}
			
	}
?>
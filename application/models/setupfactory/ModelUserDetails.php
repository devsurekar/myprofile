<?php

class ModelUserDetails extends CI_Model {

	protected $m_id;
	protected $m_user_name;
	protected $m_password;
	protected $m_confirm_p;
	protected $m_first_name;
	protected $m_middle_name;
	protected $m_last_name;
	protected $m_birth_date;
	protected $m_gender;
	protected $m_email_address;
	protected $m_contact_no1;
	protected $m_contact_no2;
	protected $m_current_address;
	protected $m_same_addr;
	protected $m_per_address;
	protected $m_city;
	protected $m_pincode;
	protected $m_state;
	protected $m_country;
	protected $m_about_you;
	protected $m_profile_pic;
	protected $m_resume_pic;
	protected $m_facebook_link;
	protected $m_linkedin_link;
	protected $m_twitter_link;
	protected $m_remember_me_value;
	protected $m_remember_me_expire_date;
	protected $m_status;
	protected $m_entered_by;
	protected $m_entered_date;
	protected $m_approved_by;
	protected $m_approved_date;
	function __construct() {

		parent::__construct();
		
	}
	public function addUpdate( $id=null ) {

		try{

			if($id == null) {

				$this->m_first_name = $this->input->Post('first_name');
				$this->m_last_name = $this->input->Post('last_name');
				$this->m_email_address = $this->input->Post('email_address');
				$this->m_password = $this->input->Post('password');
				$this->m_entered_date = date('Y-m-d H:i:s');
				$arrmixUserDetails = array(
				    'user_name' => $this->m_email_address,
				    'first_name' => $this->m_first_name,
				    'last_name' => $this->m_last_name,
				    'email_address' => $this->m_email_address,
				    'password' => $this->m_password,
				    'entered_date' => $this->m_entered_date
			    );
				$this->db->set($arrmixUserDetails);
				if( $this->db->insert('user_details',$this) ){ 
					$intInsertId = $this->db->insert_id();
					$intRoleId = 3;
					$arrmixUserRoleDetails = array(
						'user_details_id' => $intInsertId, 
						'role_details_id' => $intRoleId, 
						'status' => 'A', 
						'entry_by' => $intInsertId,
						'entry_date' => $this->m_entered_date 
					);

					$this->db->set($arrmixUserRoleDetails);
					if( $this->db->insert('user_roles',$this) ){
						return true;
					}else{
						return false;
					}

				}else{
					return false;
				}

			}
			else if($id != null) {

				$this->m_first_name 		= $this->input->Post('first_name');
				$this->m_middle_name 		= $this->input->Post('middle_name');
				$this->m_last_name 			= $this->input->Post('last_name');
				$this->m_email_address 		= $this->input->Post('email_address');
				$this->m_birth_date 		= $this->input->Post('birth_date');
				$this->m_gender 			= $this->input->Post('gender');
				$this->m_contact_no1 		= $this->input->Post('contact_no1');
				$this->m_contact_no2 		= $this->input->Post('contact_no2');
				$this->m_current_address 	= $this->input->Post('current_address');
				$this->m_same_addr			= $this->input->Post('same_addr');
				$this->m_per_address 		= $this->input->Post('per_address');
				$this->m_city 				= $this->input->Post('city');
				$this->m_pincode 			= $this->input->Post('pincode');
				$this->m_state 				= $this->input->Post('state');
				$this->m_country 			= $this->input->Post('country');
				$this->m_facebook_link 		= $this->input->Post('facebook_link');
				$this->m_linkedin_link 		= $this->input->Post('linkedin_link');
				$this->m_twitter_link 		= $this->input->Post('twitter_link');
				$this->m_entered_by 		= $this->input->Post('entered_by');				
				$this->m_entered_date 		= date('Y-m-d H:i:s');

				$strProfilePicName = $this->input->Post('profile_pic_name');

				//echo isset( $strProfilePicName ); echo $strProfilePicName; exit;

				if ( true == isset( $strProfilePicName ) && '' != $strProfilePicName ) {
					
						$this->m_profile_pic = $strProfilePicName;
					

				} else if ( true == isset( $_FILES['profile_pic']['name'] ) ) {

					
					$ext = pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION);
					$this->m_profile_pic = base_url()."assets/images/common/userProfilePic_".$id.'.'.$ext;

				} else {

					$this->m_profile_pic = NULL;
				}

				
                        $arrmixSessionDataprofilepic = array(
						'profile_pic' => $this->m_profile_pic);

						 $this->session->set_userdata( 'profile_pic', $arrmixSessionDataprofilepic );

				$arrmixUserDetails = array(

				    'user_name' 		=> $this->m_email_address,
				    'first_name' 		=> $this->m_first_name,
				    'middle_name' 		=> $this->m_middle_name,
				    'last_name' 		=> $this->m_last_name,
				    'email_address' 	=> $this->m_email_address,
				    'birth_date' 		=> $this->m_birth_date,
					'gender' 			=> $this->m_gender,
					'contact_no1' 		=> $this->m_contact_no1,
					'contact_no2' 		=> $this->m_contact_no2,
					'current_address' 	=> $this->m_current_address,
					'same_addr' 		=> $this->m_same_addr,
					'per_address' 		=> $this->m_per_address,
					'city' 				=> $this->m_city,
					'pincode' 			=> $this->m_pincode,
					'state' 			=> $this->m_state,
					'country' 			=> $this->m_country,
					'facebook_link' 	=> $this->m_facebook_link,
					'linkedin_link' 	=> $this->m_linkedin_link,
					'twitter_link' 		=> $this->m_twitter_link,
					'entered_by' 		=> $this->m_entered_by,
				    'entered_date' 		=> $this->m_entered_date,
				    'profile_pic' 		=> $this->m_profile_pic
			    );

			   	$this->db->set($arrmixUserDetails);
			   	$this->db->where('id',$id);
				if( $this->db->update('user_details',$this) ) {

					return true;

				}
				else {

					return false;
				}
			}
		}
		catch( Exception $e ) {
  			return 'Message: ' .$e->getMessage();
		}
	}

	public function signIn($arrmixCookieRememberMe){

		try{

			

			$this->m_email_address = $this->input->Post('user_name');
			$this->m_password = $this->input->Post('password');	

			$condition = "user_name =" . "'" . $this->m_email_address . "' AND " . "password =" . "'" . $this->m_password . "' AND ". "email_address =" . "'" . $this->m_email_address . "'";			

			$this->db->select('user_details.id,user_details.email_address, user_details.first_name, user_details.last_name, user_details.user_name, user_details.password, user_details.about_you, user_details.profile_pic, sum(user_views.view_count) AS view_count, user_resume.download_count');
			$this->db->from('user_details');
			$this->db->join('user_views', 'user_details.id = user_views.user_details_id', 'left');
			$this->db->join('user_resume', 'user_details.id = user_resume.user_details_id', 'left');
			$this->db->where($condition);			
			$query = $this->db->get();
			//echo $this->db->last_query(); exit;

			if (1 == $query->num_rows() ) {

				$boolIsTrue = TRUE;	
					// set remember me token
				$boolIsTrue = $this->setRememberMeValues($arrmixCookieRememberMe, $query->result() );

				if( TRUE === $boolIsTrue ) {
					return $query->result();
				}else {
					return false;
				}

			} else {
				return false;
			}

		}
		catch( Exception $e ){
			return 'Message: ' .$e->getMessage();
		}
	}// end signin

	public function setRememberMeValues($arrmixCookieRememberMe, $arrmixResult){

		if ( FALSE == isset( $arrmixCookieRememberMe ['set'] ) ) {
			$this->m_remember_me_value = $arrmixCookieRememberMe ['value'];
			$this->m_remember_me_expire_date = '271672672';
			$intUserId = $arrmixResult[0]->id;
			$data=array('remember_me_value'=>$this->m_remember_me_value, 'remember_me_expire_date'=>$this->m_remember_me_expire_date );		
			$this->db->where('id',$intUserId);
		} else {

			$this->m_remember_me_value = $arrmixCookieRememberMe ['value'];
			$this->m_remember_me_expire_date = '271672672';
			$intUserId = $arrmixResult['id'];
			$data=array('remember_me_value'=>NULL, 'remember_me_expire_date'=>NULL );
			$arrmixWhere= array('id' => $intUserId, 'remember_me_value' => $this->m_remember_me_value );		
			$this->db->where($arrmixWhere);
		}


		$result = $this->db->update('user_details',$data);

		return $result;
	}

	public function removeToken( $strToken ){

		if (NULL != $strToken ){

		}else{
			return FALSE;
		}
	}

	public function getUserDetailsByUserId($id = null) {

		$condition = "id =" . $id ;
		$this->db->select('*');
		$this->db->from('user_details');
		$this->db->where($condition);
		$query = $this->db->get();

		if (1 == $query->num_rows() ) {

			return $query->row();
		}
		else {
			return false;
		}

	}
	
}

?>
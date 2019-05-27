<?php

class ModelUserViews extends CI_Model {

	protected $m_id;
	protected $m_view_country;
	protected $m_view_country_code;
	protected $m_view_count;
	protected $m_user_details_id;

	function __construct() {

		parent::__construct();
		
	}
	public function addUpdate( $intUserId = null ) {

		try{

			if( null == $intUserId ){ 

				$intUserId = $this->session->userdata['logged_in']['user_id'];
			}

			$arrmixUserIpDetails = $this->getUserIpDetails();

			$arrmixUserViewDetails = $this->getUserViewDetails( $arrmixUserIpDetails['geoplugin_countryName'], $intUserId );

			if( false == $arrmixUserViewDetails){

				$id = null;

			}else{

				$id = $arrmixUserViewDetails[0]->id;
			}

			if( null == $id ) {

				$this->m_view_country 		= $arrmixUserIpDetails['geoplugin_countryName'];
				$this->m_view_country_code 	= strtolower($arrmixUserIpDetails['geoplugin_countryCode']);
				$this->m_view_count 		= 1;
				$this->m_user_details_id 	= $intUserId;
				
				$arrmixUserViews = array(
				    'view_country' 			=> $this->m_view_country,
				    'view_country_code' 	=> $this->m_view_country_code,
				    'view_count' 			=> $this->m_view_count,
				    'user_details_id' 		=> $this->m_user_details_id
			    );

				$this->db->set($arrmixUserViews);
				if( $this->db->insert('user_views',$this) ){ 
					return true;

				}else{
					return false;
				}

			}
			else if($id != null) {

				$this->m_view_country 		= $arrmixUserIpDetails['geoplugin_countryName'];
				$this->m_view_country_code 	= strtolower($arrmixUserIpDetails['geoplugin_countryCode']);
				$this->m_view_count 		= $arrmixUserViewDetails[0]->view_count+1;
				$this->m_user_details_id 	= $intUserId;
				
				$arrmixUserViews = array(
				    'view_country' 			=> $this->m_view_country,
				    'view_country_code' 	=> $this->m_view_country_code,
				    'view_count' 			=> $this->m_view_count,
				    'user_details_id' 		=> $this->m_user_details_id
			    );

			   	$this->db->set($arrmixUserViews);
			   	$this->db->where('id',$id);
				if( $this->db->update('user_views',$this) ) {

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

	public function getUserViewDetails($strCountryName = NULL, $intUserId= NULL){

		$this->db->select('user_views.id, user_views.view_count, user_views.view_country, user_views.view_country_code');

		$this->db->from('user_views');

		if( NULL != $strCountryName && NULL != $intUserId ){

			$condition = "user_views.user_details_id =" . $intUserId . " AND user_views.view_country = '" . $strCountryName ."'";
			$this->db->where($condition);

		} else if( NULL == $strCountryName && NULL != $intUserId ){

			$condition = "user_views.user_details_id =" . $intUserId;
			$this->db->where($condition);

		}

		$query = $this->db->get();

		if ( 0 < $query->num_rows() ) {

			
			return $query->result();
		}
		else {
			
			return false;
		}

	}

	public function getUserIpAddress(){

		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	        //ip from share internet
		        return $_SERVER['HTTP_CLIENT_IP'];
		    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		        //ip pass from proxy
		        return $_SERVER['HTTP_X_FORWARDED_FOR'];
		    }else{
		        return $_SERVER['REMOTE_ADDR'];
		    }
	}

	public function getUserIpDetails(){

		$ip = $this->getUserIpAddress();		
		return unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
	}
	
}

?>
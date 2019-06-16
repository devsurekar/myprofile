<?php

class ModelCompanyDetails extends CI_Model {

	protected $m_id;
	protected $m_comp_name;
	protected $m_city;
	protected $m_join_date;
	protected $m_leaving_date;
	protected $m_designation;
	protected $m_country;
	protected $m_current_company_flag;
	protected $m_user_details_id;
	protected $m_status;
	protected $m_entry_by;
	protected $m_entry_date;
	protected $m_approved_by;
	protected $m_approved_date;
	
	function __construct() {

		parent::__construct();
		
	}
	public function addUpdate( $id = null ) {
		$arrmixCompanyData = json_decode( $this->input->Post( 'company_details' ), true );

		try{

			$arrmixCompanyDetailsAdd	=	array();
			$arrmixCompanyDetailsUpdate	=	array();

			if ( NULL !== $arrmixCompanyData ) {

				foreach( $arrmixCompanyData as $postedIndex=> $posted ){

					$id = $arrmixCompanyData[$postedIndex]['id'];

					if( 0 == $id ) {

						$this->m_comp_name 				= trim($arrmixCompanyData[$postedIndex]['comp_name']);
						$this->m_city 					= trim($arrmixCompanyData[$postedIndex]['city']);
						$this->m_join_date 				= trim($arrmixCompanyData[$postedIndex]['join_date']);
						$this->m_leaving_date 			= trim($arrmixCompanyData[$postedIndex]['leaving_date']);
						$this->m_designation 			= trim($arrmixCompanyData[$postedIndex]['designation']);
						$this->m_country 				= trim($arrmixCompanyData[$postedIndex]['country']);
						$this->m_user_details_id 		= $this->session->userdata['logged_in']['user_id'];
						$this->m_entry_date 			= date('Y-m-d H:i:s');
						$this->m_entry_by 				= $this->session->userdata['logged_in']['user_id'];
						$this->m_current_company_flag 	= $arrmixCompanyData[$postedIndex]['current_company_flag'];
						$this->m_show_on_website 		= $arrmixCompanyData[$postedIndex]['show_on_website'];
						$this->m_show_on_resume 		= $arrmixCompanyData[$postedIndex]['show_on_resume'];
						
						$arrmixCompanyDetails = array(
						    'comp_name' 			=> $this->m_comp_name,
						    'city' 					=> $this->m_city,
						    'join_date' 			=> $this->m_join_date,
						    'leaving_date' 			=> $this->m_leaving_date,
						    'designation' 			=> $this->m_designation,
						    'country' 				=> $this->m_country,
						    'user_details_id' 		=> $this->m_user_details_id,
						    'entry_by' 				=> $this->m_entry_by,
						    'entry_date' 			=> $this->m_entry_date,
						    'current_company_flag'	=> $this->m_current_company_flag,
						    'show_on_website' 		=> $this->m_show_on_website,
						    'show_on_resume' 		=> $this->m_show_on_resume
					    );

						$arrmixCompanyDetailsAdd[] = $arrmixCompanyDetails;

					}
					else if($id != null) {

						$this->m_id 					= $id;
						$this->m_comp_name 				= trim($arrmixCompanyData[$postedIndex]['comp_name']);
						$this->m_city 					= trim($arrmixCompanyData[$postedIndex]['city']);
						$this->m_join_date 				= trim($arrmixCompanyData[$postedIndex]['join_date']);
						$this->m_leaving_date 			= trim($arrmixCompanyData[$postedIndex]['leaving_date']);
						$this->m_designation 			= trim($arrmixCompanyData[$postedIndex]['designation']);
						$this->m_country 				= trim($arrmixCompanyData[$postedIndex]['country']);
						$this->m_user_details_id 		= $this->session->userdata['logged_in']['user_id'];
						$this->m_entry_date 			= date('Y-m-d H:i:s');
						$this->m_entry_by 				= $this->session->userdata['logged_in']['user_id'];
						$this->m_current_company_flag 	= $arrmixCompanyData[$postedIndex]['current_company_flag'];
						$this->m_show_on_website 		= $arrmixCompanyData[$postedIndex]['show_on_website'];
						$this->m_show_on_resume 		= $arrmixCompanyData[$postedIndex]['show_on_resume'];
						
						$arrmixCompanyDetails = array(
							'id' 					=> $this->m_id,
						    'comp_name' 			=> $this->m_comp_name,
						    'city' 					=> $this->m_city,
						    'join_date' 			=> $this->m_join_date,
						    'leaving_date' 			=> $this->m_leaving_date,
						    'designation' 			=> $this->m_designation,
						    'country' 				=> $this->m_country,
						    'user_details_id' 		=> $this->m_user_details_id,
						    'entry_by' 				=> $this->m_entry_by,
						    'entry_date' 			=> $this->m_entry_date,
						    'current_company_flag' 	=> $this->m_current_company_flag,
						    'show_on_website' 		=> $this->m_show_on_website,
						    'show_on_resume' 		=> $this->m_show_on_resume
					    );

						$arrmixCompanyDetailsUpdate[] = $arrmixCompanyDetails;

					}// if

				}// end for
		}//end if


					$result = true;
					
					if( true == !empty( $arrmixCompanyDetailsAdd ) ) {
						if( $this->db->insert_batch('company_details',$arrmixCompanyDetailsAdd) ){ 
							$result = true;

						}else{
							$result = false;
						}
					}

					if( true == $result ){

						if( true == !empty( $arrmixCompanyDetailsUpdate ) ){

							if( $this->db->update_batch('company_details',$arrmixCompanyDetailsUpdate,'id') ){ 
								$result = true;

							}else{

								$result = true; // if no changes it is returning false
							}
						}						

					}

					return $result;

			
		}
		catch( Exception $e ) {
  			return 'Message: ' .$e->getMessage();
		}
	}


	public function getCompanyDetailsByUserId($intUserId = null) {

		$condition = "user_details_id =" . $intUserId ;
		$this->db->select('*');
		$this->db->from('company_details');
		$this->db->where($condition);
		$this->db->order_by('join_date', 'DESC');
		$query = $this->db->get();

		if ( 0 < $query->num_rows() ) {

			return $query->result();
		}
		else {
			return false;
		}

	}

	public function deleteCompanyDetailsByIdsAndUserId( $strIds = NULL, $intUserId = null){

			if ( NULL != $strIds && NULL != $intUserId ) {

				
				$arrintIds = array_map( 'intval', explode(',', $strIds) );
				$condition = "user_details_id =" . $intUserId ;
				$this->db->where_in('id', $arrintIds );
				$this->db->where( $condition );
				if ( $this->db->delete('company_details') ) {

					return true;
				}
				else {

					return false;
				}
			}
	}
	
}

?>
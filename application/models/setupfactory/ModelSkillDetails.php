<?php

class ModelSkillDetails extends CI_Model {

	protected $m_id;
	protected $m_skill;
	protected $m_skill_id;
	protected $m_version;
	protected $m_exprience;
	protected $m_user_details_id;
	protected $m_status;
	protected $m_entered_by;
	protected $m_entered_date;
	protected $m_approved_by;
	protected $m_approved_date;
	protected $m_show_on_website;
	protected $m_show_on_resume;

	function __construct() {

		parent::__construct();
		
	}
	
	public function addUpdate( $id = null ) {
		$arrmixSkillData = json_decode( $this->input->Post( 'skill_details' ), true );

		try{
			$arrmixSkillDetailsAdd	=	array();
			$arrmixSkillDetailsUpdate	=	array();

			if ( NULL !== $arrmixSkillData ) {

				foreach( $arrmixSkillData as $postedIndex=> $posted ){

					$id = $arrmixSkillData[$postedIndex]['id'];

					if( 0 == $id ) {

						$this->m_skill 				= trim($arrmixSkillData[$postedIndex]['skill']);
						$this->m_version 			= trim($arrmixSkillData[$postedIndex]['version']);
						$this->m_exprience 			= trim($arrmixSkillData[$postedIndex]['exprience']);
						$this->m_user_details_id 	= $this->session->userdata['logged_in']['user_id'];
						$this->m_entered_date 		= date('Y-m-d H:i:s');
						$this->m_entered_by 		= $this->session->userdata['logged_in']['user_id'];
						$this->m_show_on_website 	= $arrmixSkillData[$postedIndex]['show_on_website'];
						$this->m_show_on_resume 	= $arrmixSkillData[$postedIndex]['show_on_resume'];
						
						$arrmixSkillDetails = array(
						    'skill' 			=> $this->m_skill,
						    'version' 			=> $this->m_version,
						    'exprience' 		=> $this->m_exprience,
						    'user_details_id' 	=> $this->m_user_details_id,
						    'entered_by' 		=> $this->m_entered_by,
						    'entered_date' 		=> $this->m_entered_date,
						    'show_on_website' 	=> $this->m_show_on_website,
						    'show_on_resume' 	=> $this->m_show_on_resume
					    );

						$arrmixSkillDetailsAdd[] = $arrmixSkillDetails;

					}
					else if($id != null) {

						$this->m_id 				= $id;
						$this->m_skill 				= trim($arrmixSkillData[$postedIndex]['skill']);
						$this->m_version 			= trim($arrmixSkillData[$postedIndex]['version']);
						$this->m_exprience 			= trim($arrmixSkillData[$postedIndex]['exprience']);
						$this->m_user_details_id 	= $this->session->userdata['logged_in']['user_id'];
						$this->m_entered_date 		= date('Y-m-d H:i:s');
						$this->m_entered_by 		= $this->session->userdata['logged_in']['user_id'];
						$this->m_show_on_website 	= $arrmixSkillData[$postedIndex]['show_on_website'];
						$this->m_show_on_resume 	= $arrmixSkillData[$postedIndex]['show_on_resume'];
						
						$arrmixSkillDetails = array(
						    'id' 				=> $this->m_id,
						    'skill' 			=> $this->m_skill,
						    'version' 			=> $this->m_version,
						    'exprience' 		=> $this->m_exprience,
						    'user_details_id' 	=> $this->m_user_details_id,
						    'entered_by' 		=> $this->m_entered_by,
						    'entered_date' 		=> $this->m_entered_date,
						    'show_on_website' 	=> $this->m_show_on_website,
						    'show_on_resume' 	=> $this->m_show_on_resume
					    );

						$arrmixSkillDetailsUpdate[] = $arrmixSkillDetails;

					}// if

				}// end for
		}//end if


					$result = true;
					
					if( true == !empty( $arrmixSkillDetailsAdd ) ) {
						if( $this->db->insert_batch('user_skills',$arrmixSkillDetailsAdd) ){ 
							$result = true;

						}else{
							$result = false;
						}
					}

					if( true == $result ){

						if( true == !empty( $arrmixSkillDetailsUpdate ) ){

							if( $this->db->update_batch('user_skills',$arrmixSkillDetailsUpdate,'id') ){ 
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


	public function getSkillDetailsByUserId($intUserId = null) {

		$condition = "user_details_id =" . $intUserId ;
		$this->db->select('*');
		$this->db->from('user_skills');
		$this->db->where($condition);
		$query = $this->db->get();

		if ( 0 < $query->num_rows() ) {

			return $query->result();
		}
		else {
			return false;
		}

	}

	public function deleteSkillDetailsByIdsAndUserId( $strIds = NULL, $intUserId = null){

			if ( NULL != $strIds && NULL != $intUserId ) {

				
				$arrintIds = array_map( 'intval', explode(',', $strIds) );
				$condition = "user_details_id =" . $intUserId ;
				$this->db->where_in('id', $arrintIds );
				$this->db->where( $condition );
				if ( $this->db->delete('user_skills') ) {

					return true;
				}
				else {

					return false;
				}
			}
	}
	
}

?>
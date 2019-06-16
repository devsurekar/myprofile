<?php

class ModelEducationalDetails extends CI_Model {

	protected $m_id;
	protected $m_qualification;
	protected $m_institute;
	protected $m_board;
	protected $m_passing_year;
	protected $m_percentage;
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
		$arrmixEducationalData = json_decode( $this->input->Post( 'educational_details' ), true );

		try{
			$arrmixEducationalDetailsAdd	=	array();
			$arrmixEducationalDetailsUpdate	=	array();

			if ( NULL !== $arrmixEducationalData ) {

				foreach( $arrmixEducationalData as $postedIndex=> $posted ){

					$id = $arrmixEducationalData[$postedIndex]['id'];

					if( 0 == $id ) {

						$this->m_qualification 		= trim($arrmixEducationalData[$postedIndex]['qualification']);
						$this->m_institute 			= trim($arrmixEducationalData[$postedIndex]['institute']);
						$this->m_board 				= trim($arrmixEducationalData[$postedIndex]['board']);
						$this->m_passing_year 		= trim($arrmixEducationalData[$postedIndex]['passing_year']);
						$this->m_percentage 		= trim($arrmixEducationalData[$postedIndex]['percentage']);
						$this->m_user_details_id 	= $this->session->userdata['logged_in']['user_id'];
						$this->m_entered_date 		= date('Y-m-d H:i:s');
						$this->m_entered_by 		= $this->session->userdata['logged_in']['user_id'];
						$this->m_show_on_website 	= $arrmixEducationalData[$postedIndex]['show_on_website'];
						$this->m_show_on_resume 	= $arrmixEducationalData[$postedIndex]['show_on_resume'];
						$arrmixEducationalDetails = array(
						    'qualification' 	=> $this->m_qualification,
						    'institute' 		=> $this->m_institute,
						    'board' 			=> $this->m_board,
						    'passing_year' 		=> $this->m_passing_year,
						    'percentage' 		=> $this->m_percentage,
						    'user_details_id' 	=> $this->m_user_details_id,
						    'entry_by' 			=> $this->m_entered_by,
						    'entry_date' 		=> $this->m_entered_date,
						    'show_on_website' 	=> $this->m_show_on_website,
						    'show_on_resume' 	=> $this->m_show_on_resume
					    );

						$arrmixEducationalDetailsAdd[] = $arrmixEducationalDetails;

					}
					else if($id != null) {

						$this->m_id = $id;
						$this->m_qualification 		= trim($arrmixEducationalData[$postedIndex]['qualification']);
						$this->m_institute 			= trim($arrmixEducationalData[$postedIndex]['institute']);
						$this->m_board 				= trim($arrmixEducationalData[$postedIndex]['board']);
						$this->m_passing_year 		= trim($arrmixEducationalData[$postedIndex]['passing_year']);
						$this->m_percentage 		= trim($arrmixEducationalData[$postedIndex]['percentage']);
						$this->m_user_details_id 	= $this->session->userdata['logged_in']['user_id'];
						$this->m_entered_date 		= date('Y-m-d H:i:s');
						$this->m_entered_by 		= $this->session->userdata['logged_in']['user_id'];
						$this->m_show_on_website 	= $arrmixEducationalData[$postedIndex]['show_on_website'];
						$this->m_show_on_resume 	= $arrmixEducationalData[$postedIndex]['show_on_resume'];

						$arrmixEducationalDetails = array(
						    'id' 				=> $this->m_id,
						    'qualification' 	=> $this->m_qualification,
						    'institute' 		=> $this->m_institute,
						    'board' 			=> $this->m_board,
						    'passing_year' 		=> $this->m_passing_year,
						    'percentage' 		=> $this->m_percentage,
						    'user_details_id' 	=> $this->m_user_details_id,
						    'entry_by' 			=> $this->m_entered_by,
						    'entry_date' 		=> $this->m_entered_date,
						    'show_on_website' 	=> $this->m_show_on_website,
						    'show_on_resume' 	=> $this->m_show_on_resume
					    );

						$arrmixEducationalDetailsUpdate[] = $arrmixEducationalDetails;

					}// if

				}// end for
		}//end if


					$result = true;
					
					if( true == !empty( $arrmixEducationalDetailsAdd ) ) {
						if( $this->db->insert_batch('educational_details',$arrmixEducationalDetailsAdd) ){ 
							$result = true;

						}else{
							$result = false;
						}
					}

					if( true == $result ){

						if( true == !empty( $arrmixEducationalDetailsUpdate ) ){

							if( $this->db->update_batch('educational_details',$arrmixEducationalDetailsUpdate,'id') ){ 
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


	public function getEducationalDetailsByUserId($intUserId = null) {

		$condition = "user_details_id =" . $intUserId ;
		$this->db->select('*');
		$this->db->from('educational_details');
		$this->db->where($condition);
		$query = $this->db->get();

		if ( 0 < $query->num_rows() ) {

			return $query->result();
		}
		else {
			return false;
		}

	}

	public function deleteEducationalDetailsByIdsAndUserId( $strIds = NULL, $intUserId = null){

			if ( NULL != $strIds && NULL != $intUserId ) {

				
				$arrintIds = array_map( 'intval', explode(',', $strIds) );
				$condition = "user_details_id =" . $intUserId ;
				$this->db->where_in('id', $arrintIds );
				$this->db->where( $condition );
				if ( $this->db->delete('educational_details') ) {

					return true;
				}
				else {
					return false;
				}
			}
	}
	
}

?>
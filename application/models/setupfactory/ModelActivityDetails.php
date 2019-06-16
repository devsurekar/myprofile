<?php

class ModelActivityDetails extends CI_Model {

	protected $m_id;
	protected $m_discription;
	protected $m_heading;
	protected $m_user_details_id;
	protected $m_status;
	protected $m_entered_by;
	protected $m_entered_date;
	protected $m_approved_by;
	protected $m_approved_date;

	function __construct() {

		parent::__construct();
		
	}
	
	public function addUpdate( $id = null ) {
		$arrmixActivityData = json_decode( $this->input->Post( 'activity_details' ), true );

		try{
			$arrmixActivityDetailsAdd	=	array();
			$arrmixActivityDetailsUpdate	=	array();

			if ( NULL !== $arrmixActivityData ) {

				foreach( $arrmixActivityData as $postedIndex=> $posted ){

					$id = $arrmixActivityData[$postedIndex]['id'];

					if( 0 == $id ) {

						$this->m_discription 				= trim($arrmixActivityData[$postedIndex]['discription']);
						$this->m_heading 			= trim($arrmixActivityData[$postedIndex]['heading']);
						$this->m_user_details_id 	= trim($this->session->userdata['logged_in']['user_id']);
						$this->m_entered_date 		= date('Y-m-d H:i:s');
						$this->m_entered_by 		= $this->session->userdata['logged_in']['user_id'];
						$this->m_show_on_website 		= $arrmixActivityData[$postedIndex]['show_on_website'];
						$this->m_show_on_resume 		= $arrmixActivityData[$postedIndex]['show_on_resume'];
						
						$arrmixActivityDetails = array(
						    'discription' 			=> $this->m_discription,
						    'heading' 			=> $this->m_heading,
						    'user_details_id' 	=> $this->m_user_details_id,
						    'entered_by' 		=> $this->m_entered_by,
						    'entered_date' 		=> $this->m_entered_date,
						    'show_on_website' 		=> $this->m_show_on_website,
						    'show_on_resume' 		=> $this->m_show_on_resume
					    );

						$arrmixActivityDetailsAdd[] = $arrmixActivityDetails;

					}
					else if($id != null) {

						$this->m_id 				= $id;
						$this->m_discription 				= trim($arrmixActivityData[$postedIndex]['discription']);
						$this->m_heading 			= trim($arrmixActivityData[$postedIndex]['heading']);
						$this->m_user_details_id 	= $this->session->userdata['logged_in']['user_id'];
						$this->m_entered_date 		= date('Y-m-d H:i:s');
						$this->m_entered_by 		= $this->session->userdata['logged_in']['user_id'];
						$this->m_show_on_website 		= $arrmixActivityData[$postedIndex]['show_on_website'];
						$this->m_show_on_resume 		= $arrmixActivityData[$postedIndex]['show_on_resume'];
						$arrmixActivityDetails = array(
						    'id' 				=> $this->m_id,
						    'discription' 		=> $this->m_discription,
						    'heading' 			=> $this->m_heading,
						    'user_details_id' 	=> $this->m_user_details_id,
						    'entered_by' 		=> $this->m_entered_by,
						    'entered_date' 		=> $this->m_entered_date,
						    'show_on_website' 		=> $this->m_show_on_website,
						    'show_on_resume' 		=> $this->m_show_on_resume
					    );

						$arrmixActivityDetailsUpdate[] = $arrmixActivityDetails;

					}// if

				}// end for
		}//end if


					$result = true;
					
					if( true == !empty( $arrmixActivityDetailsAdd ) ) {
						if( $this->db->insert_batch('extra_curricular',$arrmixActivityDetailsAdd) ){ 
							$result = true;

						}else{
							$result = false;
						}
					}

					if( true == $result ){

						if( true == !empty( $arrmixActivityDetailsUpdate ) ){

							if( $this->db->update_batch('extra_curricular',$arrmixActivityDetailsUpdate,'id') ){ 
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


	public function getActivityDetailsByUserId($intUserId = null) {

		$condition = "user_details_id =" . $intUserId ;
		$this->db->select('*');
		$this->db->from('extra_curricular');
		$this->db->where($condition);
		$query = $this->db->get();

		if ( 0 < $query->num_rows() ) {

			return $query->result();
		}
		else {
			return false;
		}

	}

	public function deleteActivityDetailsByIdsAndUserId( $strIds = NULL, $intUserId = null){

			if ( NULL != $strIds && NULL != $intUserId ) {

				
				$arrintIds = array_map( 'intval', explode(',', $strIds) );
				$condition = "user_details_id =" . $intUserId ;
				$this->db->where_in('id', $arrintIds );
				$this->db->where( $condition );
				if ( $this->db->delete('extra_curricular') ) {

					return true;
				}
				else {

					return false;
				}
			}
	}
	
}

?>
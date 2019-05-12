<?php

class ModelMessageDetails extends CI_Model {

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
	
	public function getMessageDetailsByUserId($intUserId = null) {

		$condition = "messages.user_details_id =" . $intUserId ;

		$this->db->select('*');
		$this->db->from('messages');
		$this->db->where($condition);

		$query = $this->db->get();

		if ( 0 < $query->num_rows() ) {

			return $query->result();
		}
		else {
			return false;
		}

	}

	public function deleteMessageDetailsByIdsAndUserId( $strIds = NULL, $intUserId = null){

			if ( NULL != $strIds && NULL != $intUserId ) {

				
				$arrintIds = array_map( 'intval', explode(',', $strIds) );
				$condition = "user_details_id =" . $intUserId ;
				$this->db->where_in('id', $arrintIds );
				$this->db->where( $condition );
				if ( $this->db->delete('messages') ) {

					return true;
				}
				else {

					return false;
				}
			}
	}
	
}

?>
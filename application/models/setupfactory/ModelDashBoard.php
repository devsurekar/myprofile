<?php

class ModelDashBoard extends CI_Model {

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
	
	public function getDashBoardDetailsByUserId($intUserId = null) {

		$condition = "user_details.id =" . $intUserId ;

		$this->db->select('user_details.id,user_details.email_address, user_details.first_name, user_details.last_name, user_details.user_name, user_details.password, user_details.about_you, user_details.profile_pic, sum(user_views.view_count) AS view_count, user_resume.download_count');
		$this->db->from('user_details');
		$this->db->join('user_views', 'user_details.id = user_views.user_details_id', 'left');
		$this->db->join('user_resume', 'user_details.id = user_resume.user_details_id', 'left');
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
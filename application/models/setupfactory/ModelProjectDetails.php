<?php

class ModelProjectDetails extends CI_Model {

	protected $m_id;
	protected $m_project_name;
	protected $m_degree_name;
	protected $m_technology;
	protected $m_domain;
	protected $m_team_size;
	protected $m_duration;
	protected $m_responsibility;
	protected $m_contribution;
	protected $m_remark;
	protected $m_project_discription;
	protected $m_project_image;
	protected $m_project_doc;
	protected $m_project_link;
	protected $m_project_type;
	protected $m_user_details_id;
	protected $m_status;
	protected $m_entry_by;
	protected $m_entry_date;
	protected $m_approved_by;
	protected $m_approved_date;
	protected $m_show_on_website;
	protected $m_show_on_resume;
	
	function __construct() {

		parent::__construct();
		
	}
	public function addUpdate( $id = null ) {
		$arrmixProjectData = json_decode( $this->input->Post( 'project_details' ), true );

		try{

			$arrmixProjectDetailsAdd	=	array();
			$arrmixProjectDetailsUpdate	=	array();

			if ( NULL !== $arrmixProjectData ) {

				foreach( $arrmixProjectData as $postedIndex=> $posted ){

					$id = $arrmixProjectData[$postedIndex]['id'];

					if( 0 == $id ) {

						$this->m_project_type 			= $arrmixProjectData[$postedIndex]['project_type'];
						$this->m_project_name 			= $arrmixProjectData[$postedIndex]['project_name'];
						$this->m_degree_name 			= $arrmixProjectData[$postedIndex]['degree_name'];
						$this->m_technology 			= $arrmixProjectData[$postedIndex]['technology'];
						$this->m_domain					= $arrmixProjectData[$postedIndex]['domain'];
						$this->m_team_size 				= $arrmixProjectData[$postedIndex]['team_size'];
						$this->m_duration 				= $arrmixProjectData[$postedIndex]['duration'];
						$this->m_responsibility 		= $arrmixProjectData[$postedIndex]['responsibility'];
						$this->m_contribution 			= $arrmixProjectData[$postedIndex]['contribution'];
						$this->m_remark 				= $arrmixProjectData[$postedIndex]['remark'];
						$this->m_project_discription 	= $arrmixProjectData[$postedIndex]['project_description'];
						$this->m_project_link 			= $arrmixProjectData[$postedIndex]['project_link'];
						$this->m_user_details_id 		= $this->session->userdata['logged_in']['user_id'];
						$this->m_entry_date 			= date('Y-m-d H:i:s');
						$this->m_entry_by 				= $this->session->userdata['logged_in']['user_id'];
						$this->m_show_on_website 		= $arrmixProjectData[$postedIndex]['show_on_website'];
						$this->m_show_on_resume 		= $arrmixProjectData[$postedIndex]['show_on_resume'];

						$arrmixProjectDetails = array(
						    'project_type' 			=> $this->m_project_type,
						    'project_name' 			=> $this->m_project_name,
						    'degree_name' 			=> $this->m_degree_name,
						    'technology' 			=> $this->m_technology,
						    'domain' 				=> $this->m_domain,
						    'team_size' 			=> $this->m_team_size,
						    'duration' 				=> $this->m_duration,
						    'responsibility' 		=> $this->m_responsibility,
						    'contribution' 			=> $this->m_contribution,
						    'remark' 				=> $this->m_remark,
						    'project_discription' 	=> $this->m_project_discription,
						    'project_link' 			=> $this->m_project_link,
						    'user_details_id' 		=> $this->m_user_details_id,
						    'entry_by' 				=> $this->m_entry_by,
						    'entry_date' 			=> $this->m_entry_date,
						    'show_on_website' 		=> $this->m_show_on_website,
						    'show_on_resume' 		=> $this->m_show_on_resume
					    );

						$arrmixProjectDetailsAdd[] = $arrmixProjectDetails;

					}
					else if($id != null) {

						$this->m_id 					= $id;
						$this->m_project_type 			= $arrmixProjectData[$postedIndex]['project_type'];
						$this->m_project_name 			= $arrmixProjectData[$postedIndex]['project_name'];
						$this->m_degree_name 			= $arrmixProjectData[$postedIndex]['degree_name'];
						$this->m_technology 			= $arrmixProjectData[$postedIndex]['technology'];
						$this->m_domain					= $arrmixProjectData[$postedIndex]['domain'];
						$this->m_team_size 				= $arrmixProjectData[$postedIndex]['team_size'];
						$this->m_duration 				= $arrmixProjectData[$postedIndex]['duration'];
						$this->m_responsibility 		= $arrmixProjectData[$postedIndex]['responsibility'];
						$this->m_contribution 			= $arrmixProjectData[$postedIndex]['contribution'];
						$this->m_remark 				= $arrmixProjectData[$postedIndex]['remark'];
						$this->m_project_discription	= $arrmixProjectData[$postedIndex]['project_description'];
						$this->m_project_link 			= $arrmixProjectData[$postedIndex]['project_link'];
						$this->m_user_details_id 		= $this->session->userdata['logged_in']['user_id'];
						$this->m_entry_date 			= date('Y-m-d H:i:s');
						$this->m_entry_by 				= $this->session->userdata['logged_in']['user_id'];
						$this->m_show_on_website 		= $arrmixProjectData[$postedIndex]['show_on_website'];
						$this->m_show_on_resume 		= $arrmixProjectData[$postedIndex]['show_on_resume'];

						$arrmixProjectDetails = array(
							'id' 					=> $this->m_id,
						    'project_type' 			=> $this->m_project_type,
						    'project_name' 			=> $this->m_project_name,
						    'degree_name' 			=> $this->m_degree_name,
						    'technology' 			=> $this->m_technology,
						    'domain' 				=> $this->m_domain,
						    'team_size' 			=> $this->m_team_size,
						    'duration' 				=> $this->m_duration,
						    'responsibility' 		=> $this->m_responsibility,
						    'contribution' 			=> $this->m_contribution,
						    'remark' 				=> $this->m_remark,
						    'project_discription' 	=> $this->m_project_discription,
						    'project_link' 			=> $this->m_project_link,
						    'user_details_id' 		=> $this->m_user_details_id,
						    'entry_by' 				=> $this->m_entry_by,
						    'entry_date' 			=> $this->m_entry_date,
						    'show_on_website' 		=> $this->m_show_on_website,
						    'show_on_resume' 		=> $this->m_show_on_resume
					    );

						$arrmixProjectDetailsUpdate[] = $arrmixProjectDetails;

					}// if

				}// end for
		}//end if


					$result = true;
					
					if( true == !empty( $arrmixProjectDetailsAdd ) ) {
						if( $this->db->insert_batch('projects',$arrmixProjectDetailsAdd) ){ 
							$result = true;

						}else{
							$result = false;
						}
					}

					if( true == $result ){

						if( true == !empty( $arrmixProjectDetailsUpdate ) ){

							if( $this->db->update_batch('projects',$arrmixProjectDetailsUpdate,'id') ){ 
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


	public function getProjectDetailsByUserId($intUserId = null) {

		$condition = "user_details_id =" . $intUserId ;
		$this->db->select('*');
		$this->db->from('projects');
		$this->db->where($condition);
		$query = $this->db->get();

		if ( 0 < $query->num_rows() ) {

			return $query->result();
		}
		else {
			return false;
		}

	}

	public function getCountProjectsByUserId($intUserId = null) {

		$condition = "user_details_id =" . $intUserId ;
		$this->db->select('COUNT(*) AS project_count');
		$this->db->from('projects');
		$this->db->where($condition);
		$query = $this->db->get();

		if ( 0 < $query->num_rows() ) {

			return $query->result();
		}
		else {
			return false;
		}

	}

	public function deleteProjectDetailsByIdsAndUserId( $strIds = NULL, $intUserId = null){

			if ( NULL != $strIds && NULL != $intUserId ) {

				
				$arrintIds = array_map( 'intval', explode(',', $strIds) );
				$condition = "user_details_id =" . $intUserId ;
				$this->db->where_in('id', $arrintIds );
				$this->db->where( $condition );
				if ( $this->db->delete('projects') ) {

					return true;
				}
				else {

					return false;
				} 
			}
	}
	
}

?>
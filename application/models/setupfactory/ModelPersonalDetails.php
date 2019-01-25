<?php

class ModelPersonalDetails extends CI_Model {

	protected $m_id;
	protected $m_marital_status;
	protected $m_hobby;
	protected $m_strenth;
	protected $m_weaknes;
	protected $m_user_details__id;
	protected $m_status;
	protected $m_entered_by;
	protected $m_entered_date;
	protected $m_approved_by;
	protected $m_approved_date;
	function __construct() {

		parent::__construct();
		
	}
	public function addUpdate( $id = null ) {

		try{

			if( null == $id ) {

				$this->m_marital_status 	= $this->input->Post('marital_status');
				$this->m_hobby 				= $this->input->Post('hobby');
				$this->m_strenth 			= $this->input->Post('strenth');
				$this->m_weaknes 			= $this->input->Post('weaknes');
				$this->m_user_details__id 	= $this->session->userdata['logged_in']['user_id'];
				$this->m_entered_date 		= date('Y-m-d H:i:s');
				$this->m_entered_by 		= $this->session->userdata['logged_in']['user_id'];
				
				$arrmixPersonalDetails = array(
				    'marital_status' 	=> $this->m_marital_status,
				    'hobby' 			=> $this->m_hobby,
				    'strenth' 			=> $this->m_strenth,
				    'weaknes' 			=> $this->m_weaknes,
				    'user_details__id' 	=> $this->m_user_details__id,
				    'entered_by' 		=> $this->m_entered_by,
				    'entered_date' 		=> $this->m_entered_date
			    );
				$this->db->set($arrmixPersonalDetails);
				if( $this->db->insert('personal_details',$this) ){ 
					return true;

				}else{
					return false;
				}

			}
			else if($id != null) {

				$this->m_marital_status 	= $this->input->Post('marital_status');
				$this->m_hobby 				= $this->input->Post('hobby');
				$this->m_strenth 			= $this->input->Post('strenth');
				$this->m_weaknes 			= $this->input->Post('weaknes');
				$this->m_user_details__id 	= $this->session->userdata['logged_in']['user_id'];
				$this->m_entered_date 		= date('Y-m-d H:i:s');
				$this->m_entered_by 		= $this->session->userdata['logged_in']['user_id'];

				$arrmixPersonalDetails = array(

				    'marital_status' 	=> $this->m_marital_status,
				    'hobby' 			=> $this->m_hobby,
				    'strenth' 			=> $this->m_strenth,
				    'weaknes' 			=> $this->m_weaknes,
				    'user_details__id' 	=> $this->m_user_details__id,
				    'entered_by' 		=> $this->m_entered_by,
				    'entered_date' 		=> $this->m_entered_date
			    );

			   	$this->db->set($arrmixPersonalDetails);
			   	$this->db->where('id',$id);
				if( $this->db->update('personal_details',$this) ) {

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


	public function getPersonalDetailsByUserId($intUserId = null) {

		$condition = "user_details__id =" . $intUserId ;
		$this->db->select('*');
		$this->db->from('personal_details');
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
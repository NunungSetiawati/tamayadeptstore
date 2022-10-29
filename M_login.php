<?php

class M_login extends CI_model
{

	public function __construct()
	{
		parent::__construct();
		//$this->db = $this->load->database('dbserverpurnama', TRUE);    
		// $this->dbproxy = $this->load->database('dbproxy', TRUE);
	}

	public function cek_login($user, $password, $table)
	{
		return $this->db->query("SELECT * FROM $table where _fldsnama='" . $this->db->escape_str($user) . "' AND _fldspassword='" . $this->db->escape_str($password) . "'");
	}

	
}

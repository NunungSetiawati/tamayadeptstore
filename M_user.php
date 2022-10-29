<?php
class M_user extends CI_Model {
	
	 public function __construct()
 {
  parent::__construct();
  
 }
	public function list_menu() {
		$query = $this->db->query('SELECT * FROM tbl_admin ORDER BY id ASC');
		return $query->result_array();
	} 
	
	public function tambah($data) {
		$this->db->insert('tbl_admin', $data);
	}
	
	// Hapus password
	public function delete($where) {
		$this->db->where($where);
		$this->db->delete('tbl_admin');
	}
	
	//Edit 
	public function edit($where,$table){
		return $this->db->get_where($table,$where);
	}
	function update($where,$data){
		$this->db->where($where);
		$this->db->update('tbl_admin',$data);
	}			
}	
?>
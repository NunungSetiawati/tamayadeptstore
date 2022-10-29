<?php 
ob_start(); 
class user extends CI_Controller{
 
	function __construct(){
			parent::__construct();
			$this->load->model('M_user');
			$this->load->helper('konfigurasi_helper');
	}
 
	function index(){
		$data['user'] = $this->M_user->list_menu();
		$this->load->view('layout/V_header',$data);
		$this->load->view('layout/V_sidebar',$data);
		$this->load->view('V_user',$data);
		$this->load->view('layout/V_footer',$data);
	}
 
	
	public function tambah()
	{ 
		$user = $this->input->post('_fldsnama');
		$password = md5($this->input->post('_fldspassword'));

			$data = array(
				'_fldsnama' => $user,
				'_fldspassword' => $password
			);
			$this->M_user->tambah($data);
			redirect('user');
		
	}
	
	// Menghapus menu
	public function delete($id)
	{
		$where = array('id' => $id);
		$this->M_user->delete($where);
		redirect('user');
	}	
	
	public function update()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('_fldsnama');
		$password = md5($this->input->post('_fldspassword'));
		
			$data = array(
				'_fldsnama' => $nama,
				'_fldspassword' => $password,
			);
			$where = array(
				'id' => $id
			);

		$this->M_user->update($where, $data, 'tbl_admin');
		redirect('user');
	}
  

}
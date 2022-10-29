<?php

defined('BASEPATH') or exit('No direct script access allowed');
class home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		$this->load->helper('konfigurasi_helper');
	}
 
	function index()
	{
		if (isset($_POST['submit'])) {
			$user = $this->input->post('_fldsnama');
			$password = $this->input->post('_fldspassword');
			$cek = $this->M_login->cek_login($user, $password, 'tbl_admin'); 
			$row = $cek->row_array();
			$total = $cek->num_rows();
			if ($total > 0) {
				$this->session->set_userdata(array('user' => $row['_flds_user']));
				redirect($this->uri->segment(1) . '/utama');
			} else {
				$data['title'] = 'Nama User atau Password salah!';
				$this->load->view('V_login', $data);
			}
		} else {
			$data['title'] = 'Admin &rsaquo; Log In';
			$this->load->view('V_login', $data);
		}
	}

	function utama()
	{  
		$data['title'] = 'Selamat Anda Berhasil Login';
		$this->load->view('layout/V_header',$data);
		$this->load->view('layout/V_sidebar',$data);
		$this->load->view('layout/V_content',$data);
		$this->load->view('layout/V_footer',$data); 
	}

		// Fungsi melakukan logout
	public function logout()
	{
		$this->session->unset_userdata(array('nama' =>''));
		redirect('home');
	}

 
}

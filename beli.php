<?php
date_default_timezone_set('Asia/Jakarta');
defined('BASEPATH') or exit('No direct script access allowed');
class beli extends CI_Controller
{ 
	public function __construct() {
		parent::__construct();
		$this->load->model('M_beli');
		$this->load->model('M_data');
		$this->load->helper('konfigurasi_helper');
	}
  
	function index() { 
		$data['beli'] = $this->M_beli->list_menu();
		$data['brg'] = $this->M_data->list_menu();
		$this->load->view('layout/V_header',$data);
		$this->load->view('layout/V_sidebar',$data);
		$this->load->view('V_beli',$data);
		$this->load->view('layout/V_footer',$data);
	} 
	
	public function tambah()
	{
		$_fldsnamabrg = $this->input->post('_fldsnamabrg');
		$_flddtgl = $this->input->post('_flddtgl');
		$_fldsjml = $this->input->post('_fldsjml');
		$_fldsmerk = $this->input->post('_fldsmerk');
		$_fldsjenis = $this->input->post('_fldsjenis');
		$_fldsharga = $this->input->post('_fldsharga');
		$_fldstotal = $this->input->post('_fldstotal');
		$_fldsdiskon = $this->input->post('_fldsdiskon');
		$id = $this->input->post('id');

		$data = array(
			'_fldsnamabrg' => $_fldsnamabrg,
			'_flddtgl' => $_flddtgl,
			'_fldsjml' => $_fldsjml,
			'_fldsmerk' => $_fldsmerk,
			'_fldsjenis' => $_fldsjenis,
			'_fldsharga' => $_fldsharga,
			'_fldstotal' => $_fldstotal,
			'_fldsdiskon' => $_fldsdiskon,
			'id' => $id
		);
		$this->M_beli->tambah($data);
		redirect('beli');
	}
	// Menghapus menu
	public function delete($id)
	{
		$where = array('id' => $id);
		$this->M_beli->delete($where);
		redirect('beli');
	}

	public function update()
	{
		$id = $this->input->post('id');
		$_fldsnamabrg = $this->input->post('_fldsnamabrg');
		$_flddtgl = $this->input->post('_flddtgl');
		$_fldsjml = $this->input->post('_fldsjml');
		$_fldsmerk = $this->input->post('_fldsmerk');
		$_fldsjenis = $this->input->post('_fldsjenis');
		$_fldsharga = $this->input->post('_fldsharga');
		$_fldstotal = $this->input->post('_fldstotal');
		$_fldsdiskon = $this->input->post('_fldsdiskon');
		
		$data = array(
			'_fldsnamabrg' => $_fldsnamabrg,
			'_flddtgl' => $_flddtgl,
			'_fldsjml' => $_fldsjml,
			'_fldsmerk' => $_fldsmerk,
			'_fldsjenis' => $_fldsjenis,
			'_fldsharga' => $_fldsharga,
			'_fldstotal' => $_fldstotal,
			'_fldsdiskon' => $_fldsdiskon,
		);
		$where = array(
			'id' => $id
		);
		$this->M_beli->update($where, $data, 'tbl_pembelian');
		redirect('beli');
	}


}
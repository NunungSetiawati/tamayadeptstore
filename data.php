<?php
date_default_timezone_set('Asia/Jakarta');
defined('BASEPATH') or exit('No direct script access allowed');
class data extends CI_Controller
{ 
	public function __construct() {
		parent::__construct();
		$this->load->model('M_data');
		$this->load->helper('konfigurasi_helper');
	}
  
	function index() { 
	$data['brg'] = $this->M_data->list_menu();
		$this->load->view('layout/V_header',$data);
		$this->load->view('layout/V_sidebar',$data);
		$this->load->view('V_data',$data);
		$this->load->view('layout/V_footer',$data);
	} 
	
	public function tambah()
	{
		$_fldsnamabrg = $this->input->post('_fldsnamabrg');
		$_fldsmerk = $this->input->post('_fldsmerk');
		$_fldsjenis = $this->input->post('_fldsjenis');
		$_fldsharga = $this->input->post('_fldsharga');
		$_flditotal = $this->input->post('_flditotal');
		$_fldsnorak = $this->input->post('_fldsnorak');
		$id = $this->input->post('id');

		$data = array(
			'_fldsnamabrg' => $_fldsnamabrg,
			'_fldsmerk' => $_fldsmerk,
			'_fldsjenis' => $_fldsjenis,
			'_fldsharga' => $_fldsharga,
			'_flditotal' => $_flditotal,
			'_fldsnorak' => $_fldsnorak,
			'id' => $id
		);
		$this->M_data->tambah($data);
		redirect('Data');
	}
	// Menghapus menu
	public function delete($id)
	{
		$where = array('id' => $id);
		$this->M_data->delete($where);
		redirect('Data');
	}

	public function update()
	{
		$id = $this->input->post('id');
		$_fldsnamabrg = $this->input->post('_fldsnamabrg');
		$_fldsmerk = $this->input->post('_fldsmerk');
		$_fldsjenis = $this->input->post('_fldsjenis');
		$_fldsharga = $this->input->post('_fldsharga');
		$_flditotal = $this->input->post('_flditotal');
		$_fldsnorak = $this->input->post('_fldsnorak');
		$data = array(
			'_fldsnamabrg' => $_fldsnamabrg,
			'_fldsmerk' => $_fldsmerk,
			'_fldsjenis' => $_fldsjenis,
			'_fldsharga' => $_fldsharga,
			'_flditotal' => $_flditotal,
			'_fldsnorak' => $_fldsnorak,
		);
		$where = array(
			'id' => $id
		);
		$this->M_data->update($where, $data, 'tbl_barang');
		redirect('Data');
	}


}
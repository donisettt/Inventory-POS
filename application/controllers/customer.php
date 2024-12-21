<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('customer_model');
  }
	
	public function index()
	{
		$data['title'] = 'Customer';
		$data['customer'] = $this->customer_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('customer/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$kode = 	$this->customer_model->buat_kode();
		$customer = $this->input->post('customer');
		$notelp = 	$this->input->post('notelp');
		$alamat = 	$this->input->post('alamat');
		
		$data=array(
			'id_customer'=> $kode,
			'nama_customer'=> $customer,
			'notelp'=> $notelp,
			'alamat'=> $alamat
		);

		$this->customer_model->tambah_data($data, 'customer');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('customer');
	}

	public function proses_ubah()
	{
		$kode = 	$this->input->post('idcustomer');
		$customer = $this->input->post('customer');
		$notelp = 	$this->input->post('notelp');
		$alamat = 	$this->input->post('alamat');
		
		$data=array(
			'nama_customer'=> $customer,
			'notelp'=> $notelp,
			'alamat'=> $alamat
		);

		$where = array(
			'id_customer'=>$kode
		);

		$this->customer_model->ubah_data($where, $data, 'customer');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('customer');
	}

	public function proses_hapus($id)
	{
		$where = array('id_customer' => $id );
		$this->customer_model->hapus_data($where, 'customer');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('customer');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_customer' => $id );
    	$data = $this->customer_model->detail_data($where, 'customer')->result();
    	echo json_encode($data);
	}

}

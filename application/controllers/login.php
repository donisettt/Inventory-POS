<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('login_model');
  }



	public function index()
	{
		
		$this->load->view('templates/header_login');
		$this->load->view('login/index');
		$this->load->view('templates/footer_login');
	}

	public function proses_login()
	{
		$username = $this->input->post('user');
		$password = $this->input->post('pwd');

		// Menyiapkan kondisi untuk query
		$where = array(
			'username' => $username,
			'password' => md5($password)
		);

		// Mengecek data login
		$cek = $this->login_model->cek_login($where, 'user')->num_rows();
		$data = $this->login_model->cek_login($where, 'user')->row_array();

		if ($cek > 0) {
			// Mengecek status user (misalnya status 1 adalah aktif, 0 adalah tidak aktif)
			if ($data['status'] == 'Tidak Aktif') {
				// Jika status tidak aktif, kirimkan respons gagal
				$respon = array('respon' => 'inactive');
				echo json_encode($respon);
			} else {
				// Menyimpan data login ke session jika status aktif
				$userdata = [
					'id_user' => $data['id_user'],
					'username' => $data['nama'],
					'status' => $data['status'],
					'level' => $data['level'],
					'foto' => $data['foto']
				];

				$this->session->set_userdata('login_session', $userdata);

				// Mengirimkan respons sukses
				$respon = array('respon' => 'success');
				echo json_encode($respon);
			}
		} else {
			// Jika login gagal karena username atau password salah
			$respon = array('respon' => 'failed');
			echo json_encode($respon);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('login_session');
		redirect('login');
		
	}
}

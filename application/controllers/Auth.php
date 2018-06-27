<?php

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_user');
        $this->load->model('Model_guru');
        $this->load->model('Model_siswa');
    }

    function index() {
        $this->load->view('auth/login');
    }

    function chek_login() {
        if (isset($_POST['submit'])) {
            // proses login disini

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $loginUser = $this->Model_user->chekLogin($username, $password);
            $loginGuru = $this->Model_guru->chekLogin($username, $password);
            $loginsiswa = $this->Model_siswa->chekLogin($username, $password);
            if (!empty($loginUser)) {
                // sukses login user
                $this->session->set_userdata($loginUser);
                redirect('siswa');
            } elseif (!empty($loginGuru)) {
                // login guru
                $session = array(
                    'nama_lengkap'  =>  $loginGuru['nama_guru'],
                    'id_level_user' =>  3,
                    'id_guru'       =>  $loginGuru['id_guru']);
                $this->session->set_userdata($session);
                redirect('jadwal');
            } elseif (!empty($loginsiswa)) {
                // login guru
                $session = array(
                    'nama_lengkap'  =>  $loginsiswa['nama_siswa'],
                    'id_level_user' =>  2,
                    'nim'       =>  $loginsiswa['nim']);
                $this->session->set_userdata($session);
                redirect('nilai_siswa');
            }
            else {
                // gagal login
                redirect('auth');
            }
        } else {
            redirect('auth');
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

}
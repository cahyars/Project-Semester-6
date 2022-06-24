<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');
    }

    public function index()
    {
        if ($this->session->userdata('role')) {
            redirect('login');
        }
        $this->load->view('view_login');
    }

    public function proses_login()
    {
        $this->load->model('m_login');
        $this->m_login->ceklogin();
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}

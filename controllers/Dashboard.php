<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');
        if (!_is_logged_in()) {
            redirect("login");
        }
    }

    public function index()
    {
        $data['user']       = $this->M_Login->view_user();
        $this->load->view('view_dashboard', $data);
    }
}

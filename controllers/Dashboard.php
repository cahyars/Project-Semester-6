<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');
        $this->load->model('M_Room');
    }

    public function index()
    {
        $data['user']       = $this->M_Login->view_user();
        $this->load->view('view_dashboard', $data);
    }

    public function room()
    {
        $data['rooms']       = $this->M_Room->view_room();
        $this->load->view('view_room', $data);
    }
}

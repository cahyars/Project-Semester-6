<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activity extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Activity');
        $this->load->model('M_Login');
        $this->load->model('M_Product');
        $this->load->model('M_Room');
        if (!_is_logged_in()) {
            redirect("login");
        }
    }

    public function index()
    {
        $data['activities'] = $this->M_Activity->view_activity();
        $this->load->view('view_activity', $data);
    }

    public function user_activity()
    {
        $user_id    =   $_SESSION['id'];
        $data['activities'] = $this->M_Activity->view_user_activity($user_id);
        $this->load->view('view_user_activity', $data);
    }

    public function add()
    {
        $data['activity_room'] = $this->M_Room->view_room();
        $data['activity_prod'] = $this->M_Product->view_product();
        $data['user'] = $this->M_Login->view_user();
        $this->load->view('add_act', $data);
    }

    public function add_process()
    {
        $data['activity']   = $this->M_Activity->add_process();
        $msg    = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'success',
            background: '#d7ffc7',
            title: 'Kegiatan berhasil diinput, Silahkan tunggu konfirmasi!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata("pesan", $msg);
        redirect("activity/add_activity_products");
    }

    public function process_add_activity_products()
    {
        $act_id = $this->uri->segment(3);
        $data['activity_prod']   = $this->M_Activity->add_process_product();
        $msg    = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'success',
            background: '#d7ffc7',
            title: 'Kegiatan berhasil diinput, Silahkan tunggu konfirmasi!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata("pesan", $msg);
        redirect("activity/add_activity_products/$act_id");
    }

    // Meampilkan Form Permintaan barang
    public function add_activity_products()
    {
        $id = $this->uri->segment(3);
        $data['activity_prod'] = $this->M_Product->view_product();
        $this->load->view('add_activity_products', $data, $id);
    }

    public function detail_activity_products($id)
    {
        $data['activity'] = $this->M_Activity->view_activity_products($id);
        $this->load->view('detail_activity_products', $data);
    }

    public function status_update($event_id)
    {
        $this->M_Activity->status_update($event_id);
        $msg                = "<script>Swal.fire({
							  toast: 'true',
							  position: 'top-end',
							  icon: 'info',
							  background: '#dbecff',
							  title: 'Status Kegiatan berhasil diubah!',
							  showConfirmButton: false,
							  timer: 3000
							})</script>";
        $this->session->set_flashdata('pesan', $msg);
        redirect('activity');
    }
}

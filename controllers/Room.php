<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Room extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Room');
    }

    public function add()
    {
        $this->load->view('add_room');
    }

    public function add_process()
    {
        $data['room']   = $this->M_Room->add_process();
        $msg    = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'success',
            background: '#d7ffc7',
            title: 'Data Ruangan berhasil ditambahkan!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata("message", $msg);
        redirect("dashboard/room");
    }

    public function edit_room($id)
    {
        $data['room']    = $this->M_Room->edit_room($id);
        $this->load->view('edit_room', $data);
    }
    // Proses_Update
    public function edit_process($id)
    {
        $this->M_Room->edit_process($id);
        $msg    = "<script>Swal.fire({
				  toast: 'true',
				  position: 'top-end',
				  icon: 'success',
				  background: '#d7ffc7',
				  title: 'Ruangan berhasil diperbarui!',
				  showConfirmButton: false,
				  timer: 3000
				})</script>";
        $this->session->set_flashdata('pesan', $msg);
        redirect("dashboard/room");
    }

    public function delete($id)
    {
        $this->M_Room->delete_room($id);
        $msg                = "<script>Swal.fire({
							  toast: 'true',
							  position: 'top-end',
							  icon: 'info',
							  background: '#dbecff',
							  title: 'Ruangan berhasil dihapus!',
							  showConfirmButton: false,
							  timer: 3000
							})</script>";
        $this->session->set_flashdata('pesan', $msg);
        redirect('dashboard/room');
    }
}

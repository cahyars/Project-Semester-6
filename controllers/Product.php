<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Product');
        $this->load->model('M_Activity');
        if (!_is_logged_in()) {
            redirect("login");
        }
    }

    public function index()
    {
        $data['prod'] = $this->M_Product->view_product();
        $this->load->view('view_product', $data);
    }

    public function add()
    {
        $this->load->view('add_product');
    }

    public function add_process()
    {
        $data['product']   = $this->M_Product->add_process();
        $msg    = "<script>Swal.fire({
            toast: 'true',
            position: 'top-end',
            icon: 'success',
            background: '#d7ffc7',
            title: 'Data Barang berhasil ditambahkan!',
            showConfirmButton: false,
            timer: 3000
          })</script>";
        $this->session->set_flashdata("message", $msg);
        redirect("product");
    }

    public function edit_product($id)
    {
        $data['prod']    = $this->M_Product->edit_product($id);
        $this->load->view('edit_product', $data);
    }
    // Proses_Update
    public function edit_process($id)
    {
        $this->M_Product->edit_process($id);
        $msg    = "<script>Swal.fire({
				  toast: 'true',
				  position: 'top-end',
				  icon: 'success',
				  background: '#d7ffc7',
				  title: 'Barang berhasil diperbarui!',
				  showConfirmButton: false,
				  timer: 3000
				})</script>";
        $this->session->set_flashdata('pesan', $msg);
        redirect("product");
    }

    public function delete($id)
    {
        $this->M_Product->delete_product($id);
        $msg                = "<script>Swal.fire({
							  toast: 'true',
							  position: 'top-end',
							  icon: 'info',
							  background: '#dbecff',
							  title: 'Barang berhasil dihapus!',
							  showConfirmButton: false,
							  timer: 3000
							})</script>";
        $this->session->set_flashdata('pesan', $msg);
        redirect('product');
    }
}

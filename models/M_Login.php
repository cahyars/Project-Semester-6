<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Login extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ceklogin()
    {
        //variable
        $user     = $this->input->post('username');
        $pass    = MD5($this->input->post('password'));
        $q        = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
        $db        = $this->db->query($q);
        if ($db->num_rows() != 0) {
            $db = $db->row();
            if ($db->role == "admin") {
                // $data	= array('role' => 'Admin', ); 
                $_SESSION['username'] = $db->username;
                $_SESSION['id'] = $db->id;
                $_SESSION['name'] = $db->name;
                $_SESSION['role'] = "Admin";

                $msg    = "<script>Swal.fire({
						  icon: 'success',
						  title: 'Selamat datang Admin',
						  showConfirmButton: false,
						  timer: 1500
						})</script>";
                $this->session->set_flashdata("pesan", $msg);
                redirect('dashboard');
            }

            if ($db->role == "operator") {
                //$data	= array('role'=>'Member',); 
                $_SESSION['username'] = $db->username;
                $_SESSION['id'] = $db->id;
                $_SESSION['name'] = $db->name;
                $_SESSION['role'] = "Petugas";

                $msg    = "<script>Swal.fire({
						  icon: 'success',
						  title: 'Selamat datang Petugas',
						  showConfirmButton: false,
						  timer: 1500
						})</script>";
                $this->session->set_flashdata("pesan", $msg);
                redirect('dashboard');
            }

            if ($db->role == "officer") {
                //$data	= array('role'=>'Member',); 
                $_SESSION['username'] = $db->username;
                $_SESSION['id'] = $db->id;
                $_SESSION['name'] = $db->name;
                $_SESSION['role'] = "Wakasek Sarpras";

                $msg    = "<script>Swal.fire({
						  icon: 'success',
						  title: 'Selamat datang Wakasek Sarpras',
						  showConfirmButton: false,
						  timer: 1500
						})</script>";
                $this->session->set_flashdata("pesan", $msg);
                redirect('dashboard');
            }
            if ($db->role == "teacher") {
                //$data	= array('role'=>'Member',); 
                $_SESSION['username'] = $db->username;
                $_SESSION['id'] = $db->id;
                $_SESSION['name'] = $db->name;
                $_SESSION['role'] = "Guru";

                $msg    = "<script>Swal.fire({
						  icon: 'success',
						  title: 'Selamat datang',
						  showConfirmButton: false,
						  timer: 1500
						})</script>";
                $this->session->set_flashdata("pesan", $msg);
                redirect('dashboard');
            }
        } else {
            $msg    = "<script>Swal.fire({
						  icon: 'error',
						  title: 'User atau Password Salah',
						  showConfirmButton: false,
						  timer: 1500
						})</script>";
            $this->session->set_flashdata("pesan", $msg);
            redirect('index.php/login');
        }
    }

    public function proses_adduser()
    {
        $data    =    array(
            "username"    => $this->input->post('username'),
            "password"    => MD5($this->input->post('password')),
            "role"        => $this->input->post('role')
        );
        $this->db->insert("tbl_user", $data);
        $msg    = "<script>Swal.fire({
				  toast: 'true',
				  position: 'top-end',
				  icon: 'success',
				  background: '#d7ffc7',
				  title: 'User berhasil ditambahkan!',
				  showConfirmButton: false,
				  timer: 3000
				})</script>";
        $this->session->set_flashdata("pesan", $msg);
        redirect("dashboard");
    }

    public function view_user()
    {
        return $this->db->query("SELECT * FROM users")->result();
    }

    public function hapus_user($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete("tbl_user");
    }
}

<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Room extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function view_room()
    {
        return $this->db->query("SELECT * FROM rooms")->result();
    }

    public function add_process()
    {
        $lokasi_file     = $_FILES['photo']['tmp_name'];
        $tipe_file         = $_FILES['photo']['type'];
        $nama_file         = $_FILES['photo']['name'];
        $direktori         = "assets/foto/$nama_file";
        if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, $direktori);
        }

        $data    =    array(
            "photo" => $nama_file,
            "room_name" => $this->input->post('name'),
            "description" => $this->input->post('description')
        );
        $this->db->insert("rooms", $data);
    }

    public function edit_room($id)
    {
        $this->db->where("id", $id);
        return $this->db->get("rooms")->row();
    }

    public function edit_process($id)
    {
        $lokasi_file     = $_FILES['photo']['tmp_name'];
        $tipe_file         = $_FILES['photo']['type'];
        $nama_file         = $_FILES['photo']['name'];
        $direktori         = "assets/photo/$nama_file";
        if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, $direktori);

            $data    =    array(
                "photo" => $nama_file,
                "room_name" => $this->input->post('name'),
                "description" => $this->input->post('description')
            );

            $this->db->where("id", $id);
            return $this->db->update("rooms", $data);
        } else {

            $data    = array(
                "photo" => $nama_file,
                "room_name" => $this->input->post('name'),
                "description" => $this->input->post('description')
            );

            $this->db->where("id", $id);
            return $this->db->update("rooms", $data);
        }
    }

    public function delete_room($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete("rooms");
    }
}

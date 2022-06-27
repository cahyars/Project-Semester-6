<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Product extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function view_product()
    {
        return $this->db->query("SELECT * FROM products")->result();
    }

    public function add_process()
    {
        $data    =    array(
            "product_name" => $this->input->post('name'),
            "stock" => $this->input->post('stock'),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        );
        $this->db->insert("products", $data);
    }

    public function edit_product($id)
    {
        $this->db->where("id", $id);
        return $this->db->get("products")->row();
    }

    public function edit_process($id)
    {
        $data    =    array(
            "product_name" => $this->input->post('product_name'),
            "stock" => $this->input->post('stock')
        );

        $this->db->where("id", $id);
        return $this->db->update("products", $data);
    }

    public function delete_product($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete("products");
    }
}

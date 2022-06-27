<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Activity extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function view_activity()
    {
        return $this->db->query("SELECT * FROM activities JOIN rooms ON activities.room_id=rooms.id JOIN users ON activities.user_id=users.id")->result();
    }

    public function view_user_activity($user_id)
    {
        return $this->db->query("SELECT * FROM activities JOIN rooms ON activities.room_id=rooms.id JOIN users ON activities.user_id=users.id WHERE activities.user_id='$user_id'")->result();
    }

    public function view_activity_products($id)
    {
        return $this->db->query(
            "SELECT * FROM activity_products JOIN products ON activity_products.product_id=products.id JOIN activities ON activities.event_id=activity_products.activity_id WHERE activities.event_id='$id';"
        )->result();
    }

    public function detail_activity($id)
    {
        $this->db->where("id", $id);
        return $this->db->get("activities")->row();
    }

    public function status_update($event_id)
    {
        $data    =    array(
            "status" => $this->input->post('status'),
            "approver" => $this->input->post('approver')
        );

        $this->db->where("event_id", $event_id);
        return $this->db->update("activities", $data);
    }

    public function add_process()
    {
        $data    =    array(
            "event_name" => $this->input->post('event_name'),
            "room_id" => $this->input->post('room_id'),
            "date" => $this->input->post('date'),
            "start" => $this->input->post('start'),
            "end" => $this->input->post('end'),
            "user_id" => $this->input->post('user_id'),
            "status" => "pending",
            "notes" => $this->input->post('notes'),
            "with_internet" => $this->input->post('with_internet'),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        );
        $this->db->insert("activities", $data);
    }

    public function add_process_product()
    {
        // $query = "insert into activity_products values($activity_id, $product_id, $amount_of_product)";
        // $this->db->query($query);

        // $product_id = $this->input->post('product');
        // for ($i = 0; $i < sizeof($product_id); $i++) {
        //     $data1 = array(
        //         "product_id" => $product_id[$i]
        //     );
        $act_id = $this->uri->segment(3);
        $data = array(
            "activity_id" => $act_id,
            "product_id" => $this->input->post('product'),
            "amount_of_products" => $this->input->post('amount'),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        );
        $this->db->insert("activity_products", $data);
    }
    // }
}

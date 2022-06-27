<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Activity_Products extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function view_activity_products($id)
    {
        return $this->db->query(
            "SELECT * FROM activity_products JOIN products ON activity_products.product_id=products.id JOIN activities ON activities.event_id=activity_products.activity_id WHERE activities.event_id='$id';"
        )->result();
    }
}

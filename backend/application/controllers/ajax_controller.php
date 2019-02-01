<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_already_logged_in();

    }

    public function rmv_package_tag()
    {
        if($this->input->post())
        {
            $term_id = $this->input->post('term_id');
            $hotel_id = $this->input->post('hotel_id');

            $this->db->where('hotel_id', $hotel_id);
            $this->db->where('term_id', $term_id);
            $this->db->delete('tbl_hotel_tags');

            $this->db->where('term_id', $term_id);
            $this->db->get('tbl_taxonomy_terms')->row_array();


            echo "success";


        }
    }
}
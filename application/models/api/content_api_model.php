<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Content_api_model extends CI_Model
{
    public function get_about_us()
    {
        $query = $this->db->query("select c.* from igc_content c join igc_content_tags ct on c.content_id = ct.content_id join igc_taxonomy_terms t on ct.term_id =
       t.term_id where t.term_name='about-gonepal-holidays' and c.delete_status = '0' and c.publish_status = '1'");
        $result = $query->row_array();
        return $result;
    }

    public function get_content_detail($term_name)
    {
        $query = $this->db->query("select c.* from igc_content c join igc_content_tags ct on c.content_id = ct.content_id join igc_taxonomy_terms t on ct.term_id =
       t.term_id where t.term_name='$term_name' and c.delete_status = '0' and c.publish_status = '1'");
        $result = $query->row_array();
        return $result;
    }

}
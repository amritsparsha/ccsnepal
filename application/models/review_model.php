<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Review_model extends CI_Model{

    public function get_review_detail($slug)
    {
        $query = $this->db->query("select r.*, p.package_id, p.package_name, p.package_duration, p.featuredimg from igc_review r join  igc_package_review pr on r.review_id = pr.review_id join igc_package p on
        pr.package_id = p.package_id where r.review_url = '$slug'");
        $result = $query->row_array();
        return $result;
    }


    public function get_all_reviews($start_point, $per_page)
    {
        $query = $this->db->query("select r.*, p.package_id, p.package_name, p.package_duration, p.packageimg from igc_review r join  igc_package_review pr on r.review_id = pr.review_id join igc_package p on
        pr.package_id = p.package_id order by created limit {$start_point},{$per_page} ");
        $result = $query->result_array();
        return $result;
    }


    public function count_reviews()
    {
        $query = $this->db->query("select * from igc_review r join  igc_package_review pr on r.review_id = pr.review_id join igc_package p on
        pr.package_id = p.package_id");
        $result = $query->num_rows();
        return $result;
    }


}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Adventure_model extends CI_Model
{
    public function get_adventures()
    {
        $query = $this->db->query("select activity_id,activity_name,activity_url,featured_img,banner_img,description from igc_activity
    where publish_status='1' and delete_status='0' order by created desc");
        $result = $query->result_array();
        return $result;
    }

    public function count_adventures()
    {
        $this->db->where('publish_status', '1');
        $this->db->where('delete_status', '0');
        $result = $this->db->get('igc_activity')->num_rows();
        return $result;
    }
    
    //function to get adventure related packages
    
    public function get_related_packages($id)
    {
        $query = $this->db->query("select p.package_id, p.featuredimg, p.package_name,p.package_url, 
p.rating, p.package_duration,p.description ,pp.pprice,c.code from igc_package p join igc_package_price pp on p.package_id = pp.package_id
        join igc_currency_setting c on pp.currency_id = c.currency_id join igc_activity_packages ap on p.package_id= ap.package_id
         join igc_activity a on ap.activity_id = a.activity_id where a.activity_id = '$id' and  p.status='1' and
        p.delete_status='0' and pp.is_front = 'Y'");
        $result = $query->result_array();
        return $result;
    }

}
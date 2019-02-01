<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_model extends CI_Model{
    public function get_news($start_point=0, $per_page=0)
    {
        $query = $this->db->query("select * from igc_news
    where publish_status='1' and delete_status='0' order by created desc limit
		{$start_point},{$per_page}");
        $result = $query->result_array();
        return $result;
    }

    public function count_news()
    {
        $this->db->where('publish_status','1');
        $this->db->where('delete_status','0');
        $result = $this->db->get('igc_news')->num_rows();
        return $result;
    }
    public function get_latest_news($limit)
    {
      $this->db->where('delete_status',"0")->where('publish_status','1')->where('content_type',"latest_news");
      $this->db->order_by('created',"DESC");
      $this->db->limit($limit);
      $result=$this->db->get('igc_content')->result_array();
      return $result;
    }

    public function get_detail_news($ref)
    {
      $this->db->where('delete_status',"0")->where('publish_status','1')->where('content_ref_no',$ref);
      $result=$this->db->get('igc_content')->row_array();
      return $result;
    }
    public function get_all_news()
    {
      $this->db->where('delete_status',"0")->where('publish_status','1')->where('content_type',"latest_news");
      $this->db->order_by('created',"DESC");
      // $this->db->limit($limit);
      $result=$this->db->get('igc_content')->result_array();
      return $result;
    }


}
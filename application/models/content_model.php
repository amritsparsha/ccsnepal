<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Content_model extends CI_Model{


    public function get_content_tabs($content_id)
    {
        $this->db->where('content_id', $content_id);
        $result = $this->db->get('igc_content_tabs')->row_array();
        return $result;
    }

      public function get_content_comments($content_id)
      {
          $this->db->where('approved_status', '1');
          $this->db->where('content_id', $content_id);
          $result = $this->db->get('igc_content_comments')->result_array();
          return $result;
      }

     public function get_content_tags($content_id)
     {
         $query = $this->db->query("select t.term_id, t.term_name from igc_taxonomy_terms t join  igc_content_tags c on t.term_id = c.term_id where
         c.content_id = '$content_id' order by t.term_name");
         $result = $query->result_array();
         return $result;
     }

public function get_emagazine()
      {
          $this->db->where('publish_status', '1');
          
          $result = $this->db->get('igc_emagazine')->row_array();
          return $result;
      }


    public function get_blog_list()
    {
    $query = $this->db->query("select content_id, content_title,content_url,content_page_title,content_body,featured_img, created from igc_content
    where publish_status='1' and delete_status='0' and content_type='Article' order by created desc limit 0,2");
        $result = $query->result_array();
        return $result;
    }

    public function get_blogs($start_point=0, $per_page=0)
    {
        $query = $this->db->query("select content_id,content_title,content_url,content_page_title,content_body,featured_img, created from igc_content
    where publish_status='1' and delete_status='0' and content_type='Article' order by created desc limit
		{$start_point},{$per_page}");
        $result = $query->result_array();
        return $result;
    }

    public function count_blogs()
    {
        $this->db->where('content_type','Article');
        $this->db->where('publish_status','1');
        $this->db->where('delete_status','0');
        $result = $this->db->get('igc_content')->num_rows();
        return $result;
    }


    public function get_about_front_detail()
    {
       $query = $this->db->query("select c.* from igc_content c join igc_content_tags ct on c.content_id = ct.content_id join igc_taxonomy_terms t on ct.term_id =
       t.term_id where t.term_name='about-incentive' and c.publish_status= '1' and c.delete_status= '0' ");
        $result = $query->row_array();
        return $result;
    }


    //get service offer list

    public function get_service_offer_list($start_point=0, $per_page=0)
    {
        $query = $this->db->query("select c.* from igc_content c join igc_content_tags ct on c.content_id = ct.content_id join igc_taxonomy_terms t on ct.term_id =
       t.term_id where c.publish_status= '1' and c.delete_status= '0' and t.term_name='service-we-offer' order by created desc limit
		{$start_point},{$per_page}");
        $result = $query->result_array();
        return $result;
    }

    //get service offer list

    public function get_destination_list($start_point=0, $per_page=0)
    {
        $query = $this->db->query("select t.term_name, c.* from igc_content c join igc_content_tags ct on c.content_id = ct.content_id join igc_taxonomy_terms t on ct.term_id =
       t.term_id where c.publish_status= '1' and c.delete_status= '0' and t.term_name='top-destination' order by created desc limit
    {$start_point},{$per_page}");
        $result = $query->result_array();
        return $result;
    }

    public function get_term_list($content_id)
    {
        $query = $this->db->query("select t.*, ct.* from igc_content_tags ct join igc_taxonomy_terms t on ct.term_id =
       t.term_id where ct.content_id = '$content_id' and t.term_name = 'top-destination'");
        $result = $query->row_array();
        return $result;
    }





}

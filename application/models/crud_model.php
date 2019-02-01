<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model
{
    public function wasted_cv($date)
    {
        $this->db->where('customer_id',NULL)->where('created < ',$date);
        return $this->db->get("tbl_cust_uploaded_cv")->result_array();

    }
    public function search($search)
    {
        $this->db->like('job_title',$search);
        $this->db->where('delete_status',"0")->where('publish_status','1')->where('super_publish_status','1');
        $result=$this->db->get("tbl_job_post_all")->result_array();
        return $result;
    }

    public function get_all($table)
    {
        $result = $this->db->get($table)->result_array();
        return $result;
    }
    
      public function get_active_records($table)
    {
        $this->db->where('publish_status', "1");
        $result = $this->db->get($table)->result_array();
        return $result;
    }


    public function get_not_deleted($table)
    {
        $this->db->where('delete_status', "0");
        $result = $this->db->get($table)->result_array();
        return $result;
    }

    //get popup data
    public function get_popup(){

        $this->db->where('publish_status', '1');
        $this->db->where('delete_status', '0');
        $result = $this->db->get('igc_popup')->row_array();
        return $result;
    }

    public function get_active_not_delete_all($field_name,$table)
    {
        $this->db->where('publish_status','1');
        $this->db->where('delete_status','0');
        $this->db->order_by($field_name,'Desc');
        $result = $this->db->get($table)->result_array();
        return $result;
    }

    //function for the autocomplete
     public function Getdestination($keyword) {        
        
        $this->db->like("destination", $keyword);
        return $this->db->get('igc_destination')->result_array();
    }

    //function for the autocomplete trek
     public function Getregion($keyword) {        
        
        $this->db->like("region_name", $keyword);
        return $this->db->get('igc_regions')->result_array();
    }


    //function to  get  detail

    public function get_detail($id, $field_name, $table)
    {
        $this->db->where($field_name, $id);
        $result = $this->db->get($table)->row_array();
        return $result;
    }

    //function to  get  detail

    public function get_active_not_deleted_detail($id, $field_name, $table)
    {
        $this->db->where('publish_status', '1');
        $this->db->where('delete_status', '0');
        $this->db->where($field_name, $id);
        $result = $this->db->get($table)->row_array();
        return $result;
    }


//get detail for the status 
    public function get_active_not_deleted_details($id, $field_name, $table)
    {
        $this->db->where('status', '1');
        $this->db->where('delete_status', '0');
        $this->db->where($field_name, $id);
        $result = $this->db->get($table)->row_array();
        return $result;
    }

    public function get_active_not_delete_records($id, $field_name, $table)
    {
        $this->db->where('publish_status', '1');
        $this->db->where('delete_status', '0');
        $this->db->where($field_name, $id);
        $result = $this->db->get($table)->result_array();
        return $result;
    }


    public function get_not_deleted_detail($id, $field_name, $table)
    {
        $this->db->where($field_name, $id);
        $this->db->where('delete_status', "0");
        $result = $this->db->get($table)->row_array();
        return $result;
    }


    //function to count

    public function count_active_not_deleted_records($id, $field_name, $table)
    {
        $this->db->where($field_name, $id);
        $this->db->where('publish_status', "1");
        $this->db->where('delete_status', "0");
        $result = $this->db->get($table)->num_rows();
        return $result;
    }


    public function get_not_deleted_row($id, $field_name, $table)
    {
        $this->db->where($field_name, $id);
        $this->db->where('delete_status', "0");
        $result = $this->db->get($table)->row_array();
        return $result;
    }


    public function not_deleted_total($table)
    {
        $this->db->where('delete_status', "0");
        $result = $this->db->get($table)->num_rows();
        return $result;
    }


//function to insert

    public function insert($insert, $table)
    {
        $result = $this->db->insert($table, $insert);
        if ($result) {
            return $result;
        } else {
            return false;

        }
    }

    //function to insert and return id

    public function insert_return_id($insert, $table)
    {
        $this->db->insert($table, $insert);
        $result = $this->db->insert_id();
        if ($result) {
            return $result;
        } else {
            return false;

        }
    }


    //function to update

    public function update($id, $field_name, $update, $table)
    {
        $this->db->where($field_name, $id);
        $result = $this->db->update($table, $update);
        if ($result) {
            return $result;
        } else {
            return false;

        }
    }


    public function soft_delete($id, $field_name, $table)
    {
        $update['updated'] = date('Y-m-d:H:i:s');
        $update['delete_status'] = "1";
        $this->db->where($field_name, $id);
        $result = $this->db->update($table, $update);
        if ($result) {
            return $result;
        } else {
            return false;
        }

    }

    public function delete($id, $field_name, $table)
    {

        $this->db->where($field_name, $id);
        $result = $this->db->delete($table);
        if ($result) {
            return $result;
        } else {
            return false;
        }

    }


    public function get_detail_rows($id, $field_name, $table)
    {
        $this->db->where($field_name, $id);
        $result = $this->db->get($table)->result_array();
        return $result;
    }


    public function get_detail_records($id, $field_name, $table)
    {
        $this->db->where($field_name, $id);
        $this->db->where('delete_status', '0');
        $result = $this->db->get($table)->result_array();
        return $result;
    }


    //get active and not deleted

    public function get_active_not_deleted($id, $field_name, $table)
    {
        $this->db->where($field_name, $id);
        $this->db->where('publish_status', '1');
        $this->db->where('delete_status', '0');
        $result = $this->db->get($table)->result_array();
        return $result;
    }

    //function mail server settings

    public function get_mail_info()
    {
        $this->db->where('delete_status', '0');
        $this->db->where('active_status', '1');
        $result = $this->db->get('igc_mail_server_setting')->row_array();
        return $result;


    }


//function to get forex rate

public function get_forex($date, $start_point=0, $per_page=0)
{
   $query = $this->db->query("select * from igc_forex_detail where publish_status = '1' and forex_id in (select forex_id from igc_forex_index where forex_date='$date' and delete_status='0') limit {$start_point},{$per_page}");
   $result =  $query->result_array();
   return $result;
}

//function get parent menu

public function get_parent_footer_menu()
{
    $this->db->select('content_id');
    $this->db->select('content_page_title');
    $this->db->where('delete_status','0')->where('publish_status','1')->where('group_id','1')->where('parent_id','0')->where('show_on_menu','Y');
    $this->db->order_by('position','ASC');
    $result =  $this->db->get('igc_content')->result_array();
    return $result;

}

    public function get_parent_footer_sub_menu($parent_id)
    {
        $this->db->select('content_id');
        $this->db->select('content_page_title');
        $this->db->select('content_url');
        $this->db->where('delete_status','0')->where('publish_status','1')->where('group_id','1')->where('parent_id',$parent_id)->where('show_on_menu','Y');
        $this->db->order_by('position','ASC');
        $result =  $this->db->get('igc_content')->result_array();
        return $result;

    }


    public function get_parent_header_menu($code)
    {
        $this->db->select('category_name');
        $this->db->select('category_url');
        $this->db->where('delete_status','0')->where('publish_status','1')->where('category_code', $code)->where('group_id','1')->where('parent_id','0');
        $this->db->order_by('position','ASC');
        $result =  $this->db->get(' igc_package_category')->result_array();
        return $result;

    }

    /** IH */

    public function get_accommodation()
    {
        $this->db->where('status','1');
        $result =  $this->db->get('igc_accommodation_setting')->result_array();
        return $result;

    }


    //function get atos setting

    public function get_atos_setting()
    {
        $this->db->where('delete_status','0');
        $this->db->where('active_status','1');
        $result =  $this->db->get('igc_atos_setting')->row_array();
        return $result;
    }


    //function get paypal setting

    public function get_paypal_setting()
    {
        $this->db->where('delete_status','0');
        $this->db->where('publish_status','1');
        $result =  $this->db->get('igc_paypal_setting')->row_array();
        return $result;
    }
    public function get_where($table,$array)
    {
        if(count($array) > 0)
        {
            foreach ($array as $key => $value) {
                $this->db->where("$key","$value"); 
            }
        }
        $result = $this->db->get($table)->result_array();
        return $result;
    }
    public function get_where_order($table,$array,$order_field,$order)
    {
        if(count($array) > 0)
        {
            foreach ($array as $key => $value) {
                $this->db->where("$key","$value"); 
            }
        }
        $this->db->order_by("$order_field","$order");
        $result = $this->db->get($table)->result_array();
        return $result;
    }
     public function get_where_order_limit($table,$array,$order_field,$order,$limit)
    {
        if(count($array) > 0)
        {
            foreach ($array as $key => $value) {
                $this->db->where("$key","$value"); 
            }
        }
        $this->db->order_by("$order_field","$order");
        $this->db->limit($limit);
        $result = $this->db->get($table)->result_array();
        return $result;
    }
     public function get_and_or_where_order_limit($table,$array_and,$array_or,$order_field,$order,$limit)
    {
        if(count($array_and) > 0)
        {
            foreach ($array_and as $key => $value) {
                $this->db->where("$key","$value"); 
            }
        }
        if(count($array_or) > 0)
        { 
            $this->db->group_start();
                foreach ($array_or as $key => $value) {
                    $this->db->or_where("$key","$value"); 
                }
             $this->db->group_end();
        }

        $this->db->order_by("$order_field","$order");
        $this->db->limit($limit);
        $result = $this->db->get($table)->result_array();
        return $result;
    }
     public function get_where_order_pagination($table,$array,$orderBy,$order,$start_point,$limit){
        if(count($array) > 0){
            foreach($array as $key => $value){
                $this->db->where("$key","$value");
            }
        }
        $this->db->order_by($orderBy,$order);
        $this->db->limit($limit,$start_point);
        $result = $this->db->get($table)->result_array();
        return $result;
    }


    public function get_currency_symbol($id)
    {
        return $this->get_detail($id,'currency_id',"igc_currency_setting")['symbol'];
    }
    public function get_exp_comparision($exp)
    {
        if($exp=="mtoet")
        {
            $exp_detail="More Than or Equals To ";
        }
        elseif($exp=="ltoet")
        {
            $exp_detail="Less Than or Equals To ";
        }
        elseif($exp=="mt")
        {
            $exp_detail="More Than ";
        }
        elseif($exp=="lt")
        {
            $exp_detail="Less Than ";
        }
        else
        {
            $exp_detail="Equals To ";
        }
        return $exp_detail;
    }
    public function countdown_date($date)
    {
        $end_date=strtotime($date);
        $diff_time=$end_date-time();
        $week = floor($diff_time / (7*86400));
        $day =floor(($diff_time % (7*86400)) / 86400);

        $string="";
            if($week >0)
            {
                $string .= $week;
                $string .= "&nbsp;week ";
            }
            if($day >0)
            {
                $string .=", ";
                $string .= $day;
                $string .= "&nbsp;day  ";
            }
            if($week < 0 && $day <0)
            {
                $string .="Not Available";
            }
            $string .=" from now";
            return $string;
    }
    public function get_total_job_post($ref,$id)
    {
        $sql=$this->db->query("
                    SELECT *,COUNT(`job_id`) AS total FROM `tbl_job_post_all`
                    WHERE delete_status='0' AND publish_status='1' AND super_publish_status='1' AND ".$ref."=".$id."  
            ");
        $result=$sql->row_array();
        return $result;
    }
    public function get_job_location()
    {
        $sql=$this->db->query("
                    SELECT `job_id`,`job_title`,`job_location`,COUNT(*) AS total FROM `tbl_job_post_all`
                    WHERE delete_status='0' AND publish_status='1' AND super_publish_status='1'
                    GROUP BY LOWER(`job_location`) 
            ");
        $result=$sql->result_array();
        return $result;
    }
    public function get_job_with_location($location)
    {
        $sql=$this->db->query("
                    SELECT * FROM `tbl_job_post_all`
                    WHERE delete_status='0' AND publish_status='1' AND super_publish_status='1' AND  LOWER(`job_location`)='$location'
            ");
        $result=$sql->result_array();
        return $result;
    }
}
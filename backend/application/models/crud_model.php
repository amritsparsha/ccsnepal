<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model
{

    public function get_all($table)
    {
        $result = $this->db->get($table)->result_array();
        return $result;
    }

    public function get_all_contact($table)
    {
        $this->db->order_by('full_name');
        $result = $this->db->get($table)->result_array();
        return $result;
    }
    public function contact_name_by_id($id)
    {
        $query = $this->db->get_where('igc_contact', array("contact_id" => $id));
        $data  = $query->row_array();
        // if ($data['full_name']) {
        //     return $data['full_name'];
        // } else {
        //     return "NONE";
        // }
    }


    public function deals_name_by_id($id)
    {
        $query = $this->db->get_where('igc_deals', array("deals_id" => $id));
        $data  = $query->row_array();
        if ($data['name']) {
            return $data['name'];
        } else {
            return "NONE";
        }
    }



    public function user_name_by_id($id)
    {
        $query = $this->db->get_where('igc_users', array("user_id" => $id));
        $data  = $query->row_array();
        if ($data['username']) {
            return $data['username'];
        } else {
            return "NONE";
        }
    }


public function get_mail_info()
   {
       $this->db->where('delete_status', '0');
       $this->db->where('active_status', '1');
       $result = $this->db->get('igc_mail_server_setting')->row_array();
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



    public function get_all_contact_by_company()
    {

        $sql = "SELECT * FROM igc_contact WHERE is_company='1' ";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function get_all_orderby_name($table)
    {
        $this->db->order_by('name');
        $result = $this->db->get($table)->result_array();
        return $result;
    }



    public function get_not_deleted($table)
    {
        $this->db->where('delete_status', "0");
        $result = $this->db->get($table)->result_array();
        return $result;
    }


    //function to  get  detail

    public function get_detail($id, $field_name, $table)
    {
        $this->db->where($field_name, $id);
        $result = $this->db->get($table)->row_array();
        return $result;
    }


//    public function get_active_not_deleted($table)
//    {
//        $this->db->where('act')
//    }




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

    public function whole_update($update, $table)
    {
        $result = $this->db->update($table, $update);
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

    public function get_row_last_id($field_name, $table)
    {
        $query =  $this->db->query("select $field_name from $table where $field_name ="."("."select max($field_name) from $table".")
        ");

        $result= $query->row_array();
        return $result;

    }


    //function to check url exist or not

    public function check_url($id,$field_id, $url, $field_url, $table)
    {
        $sql= $this->db->query("select $field_url from $table where '$field_id' <> '$id'and $field_url ='$url'");
        $result = $sql->result_array();
        return $result;
    }


    public function check_multiple_condition($id1, $field_name1,$id2, $field_name2,$table)
    {
        $this->db->where($field_name1, $id1);
        $this->db->where($field_name2, $id2);
        $result = $this->db->get($table)->row_array();
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
    
    public function get_cur_ref($ref)
    {
        if($ref=="above")
        {
            return "Above";
        }
        elseif($ref="below")
        {
            return "Below";
        }
        else
        {
            return "Equal";
        }
    }
     public function get_star_rating($avg)
    {
        $star='';

        if ($avg==0):
                                        $star .= '<i class="fa fa-star-o lang-star"></i>';
        elseif ($avg >= 1):    
                                        $star .='<i class="fa fa-star lang-star"></i>';
        endif;

        if ($avg < 2):
                                        $star .='<i class="fa fa-star-o lang-star"></i>';
        elseif ($avg >= 2):    
                                        $star .='<i class="fa fa-star lang-star"></i>';        
        endif;

        if ($avg < 3):
                                        $star .='<i class="fa fa-star-o lang-star"></i>';
        elseif ($avg >= 3):    
                                        $star .='<i class="fa fa-star lang-star"></i>';
        endif;

         if ($avg < 4):
                                        $star .='<i class="fa fa-star-o lang-star"></i>';
        elseif ($avg >= 4):    
                                        $star .='<i class="fa fa-star lang-star"></i>';
        endif;

         if ($avg < 5):
                                        $star .='<i class="fa fa-star-o lang-star"></i>';
        elseif ($avg == 5):    
                                        $star .='<i class="fa fa-star lang-star"></i>';
        endif;

       return $star;
    }



}
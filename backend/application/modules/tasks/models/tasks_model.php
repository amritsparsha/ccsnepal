<?php
class Tasks_model extends  CI_Model
{
    public function count_total_tasks()
    {
        $result = $this->db->get('igc_tasks')->num_rows();
        return $result;
    }


   // public function insert_tasks_assign($insert){
   //    $result =  $this->db->insert('igc_tasks_assign', $insert);

   //      if($result)
   //      {
   //          return $result;
   //      }
   //      else{
   //          return false;
   //      }
   //  }


  public function insert_tasks_assign($insert){
      $result =  $this->db->insert('igc_tasks_assign', $insert);

        if($result)
        {
            return $result;
        }
        else{
            return false;
        }
    }

    public function delete_tasks_assign($tasks_id)
    {
        $update['delete_status']="1";
        $this->db->where("tasks_id", $tasks_id);
        $result = $this->db->update("igc_tasks_assign", $update);
        if ($result) {
            return $result;
        } else {
            return false;

        }
    }


    public function insert_tasks_assign_details($insert){
        $result =  $this->db->insert('igc_tasks_detail', $insert);

        if($result)
        {
            return $result;
        }
        else{
            return false;
        }
    }


    public function get_tasks_list()
    {
        $this->db->where('delete_status','0');
        $this->db->order_by('tasks_id','desc');
        $result = $this->db->get('igc_tasks')->result_array();
        return $result;
    }

    public function get_tasks_detail($tasks_id)
    {

      $this->db->where('delete_status','0');
        $this->db->where('tasks_id', $tasks_id);
        $result =  $this->db->get('igc_tasks')->row_array();
        return $result;
    }
     
    public function check_name_exist($tasks_url, $tasks_id)
   {

       $this->db->where('tasks_url', $tasks_url)->where('tasks_id <>', $tasks_id)->where('delete_status','0');
       $row = $this->db->get('igc_tasks')->row_array();

       return $row;
   }

    public function get_tasks_price($tasks_id)
    {
        $this->db->where('tasks_id', $tasks_id);
        $result = $this->db->get('igc_tasks_price')->result_array();
        return $result;
    }

    public  function get_each_price($tasks_id,$accommodation_id, $currency_id){

        $query =  $this->db->query("select pprice, is_front from igc_tasks_price where tasks_id = '$tasks_id'
         and accommodation_id = '$accommodation_id' and currency_id = '$currency_id'");

        $result = $query->row_array();
        return $result;
    }


    public  function  get_accommodations()
    {
        $this->db->where('status','1');
        $result = $this->db->get('igc_accommodation_setting')->result_array();
        return $result;
    }

    public  function  get_currencies()
    {
    
        $result = $this->db->get('igc_currency_setting')->result_array();
        return $result;
    }

    public function insert_tasks($insert){
         $this->db->insert('igc_tasks', $insert);
        $result =  $this->db->insert_id();
        if($result)
        {
            return $result;
        }
        else{
            return false;
        }
    }


    public function update_tasks($insert, $tasks_id){
        $this->db->where('tasks_id', $tasks_id);
        $result = $this->db->update('igc_tasks', $insert);

        if($result)
        {
            return $result;
        }
        else{
            return false;
        }
    }



 

    //function to delete tasks price

    public function delete_tasks_price($tasks_id)
    {
        $this->db->where('tasks_id', $tasks_id);
        $result = $this->db->delete('igc_tasks_price');
        return $result;
    }


    //function to delete tasks

    public function delete_tasks($tasks_id)
    {
        $update['delete_status'] = "1";
        $update['updated'] = date('Y-m-d:H:i:s');
        $this->db->where('tasks_id', $tasks_id);
        $result = $this->db->update('igc_tasks', $update);
        if($result)
        {
            return $result;
        }
        else{
            return false;
        }
    }



   //function get booking list

    public function get_all_tasks_booking()
    {
        $query = $this->db->query("select pb.booking_id, pb.tasks_id, pb.reference_no, pb.trip_type,pb.arrival_date,pb.created, pb.booking_status,c.email,c.first_name,c.middle_name, c.last_name
         from igc_tasks_booking pb join igc_tasks_customer c on pb.customer_id = c.customer_id where pb.delete_status = '0'");
        $result = $query->result_array();
        return $result;
    }



    //function get booking detail

    public function booking_detail($booking_id)
    {
        $query = $this->db->query("select pb.booking_id,pb.booking_status, pb.reference_no,pb.amount,pb.total_amount,p.tasks_name, c.code, pc.email,pc.first_name, pc.customer_id from igc_tasks_booking pb join igc_tasks p on pb.tasks_id = p.tasks_id join
         igc_currency_setting c on pb.currency_id = c.currency_id join igc_tasks_customer pc on pb.customer_id = pc.customer_id where pb.booking_id = '$booking_id' ");
        $result = $query->row_array();
        return $result;
    }

    //function to update booking


    public function booking_update($booking_id,$customer_id, $update)
    {
        $this->db->where('booking_id', $booking_id);
        $this->db->where('customer_id', $customer_id);
        $result = $this->db->update('igc_tasks_booking', $update);
        if($result)
        {
            return true;
        }
        else{
            return false;
        }
    }


    //code to update customer info

    public function customer_update($customer_id, $update)
    {
        $this->db->where('customer_id', $customer_id);
        $result = $this->db->update('igc_tasks_customer', $update);
        if($result)
        {
            return true;
        }
        else{
            return false;
        }
    }




    //function to get booking tasks detail

    public function booking_tasks_detail($booking_id)
    {
        $query = $this->db->query("select pb.*,pc.*,p.tasks_id,p.tasks_name,p.tasks_duration, a.name,
      c.code from igc_tasks_booking pb
        join igc_accommodation_setting a on pb.accommodation_id =  a.accommodation_id join igc_tasks_customer pc
         on pb.customer_id = pc.customer_id join igc_tasks p on pb.tasks_id = p.tasks_id join igc_currency_setting c on
         pb.currency_id = c.currency_id where pb.booking_id = '$booking_id'");
        $result = $query->row_array();
        return $result;
    }



    //function to check booking status

    public function check_booking_status($booking_id)
    {
        $this->db->select('booking_status');
        $this->db->where('booking_id', $booking_id);
        $result = $this->db->get('igc_tasks_booking')->row_array();
        return $result;

    }


    //function get tasks price

    public function get_pprice($tasks_id, $accommodation_id)
    {
        $query = $this->db->query("select c.code, pp.currency_id, pp.pprice from igc_tasks_price pp join igc_currency_setting c on
        pp.currency_id = c.currency_id where pp.tasks_id = '$tasks_id' and pp.accommodation_id = '$accommodation_id'");
        $result = $query->result_array();
        return $result;
    }

//function get_tasks accommodation

    public function  get_tasks_accommodation($tasks_id)
    {
        $query= $this->db->query("select a.accommodation_id, a.name from igc_accommodation_setting a join igc_tasks_price pp on
        a.accommodation_id = pp.accommodation_id where pp.tasks_id = '$tasks_id' group by pp.accommodation_id");
        $result = $query->result_array();
        return $result;

    }

    //function to check tag and insert



    //function get added tags of tasks

    public function get_added_tags($tasks_id)
    {

        $query = $this->db->query("select tt.term_id,tt.term_name from igc_taxonomy_terms tt join igc_tasks_tags pt on tt.term_id = pt.term_id
         where pt.tasks_id = '$tasks_id'");
        $result = $query->result_array();
        return $result;

    }

    //function to get available tags

    public function get_available_tags($tasks_id)
    {

        $query = $this->db->query("select term_id, term_name from igc_taxonomy_terms where term_id not in(select term_id from igc_tasks_tags where tasks_id = '$tasks_id');");
        $result = $query->result_array();
        return $result;

    }
    public function countdown_date($date)
    {
        $date1=date_create($date);
        $date2=date_create(date('Y-m-d'));
        $diff=date_diff($date2,$date1);

        $day = $diff->format("%a");
        $day .= " Days";
        if($day == 1)
        {
            $day="Tomorrow";
        }
        

        return $day;
    }











}
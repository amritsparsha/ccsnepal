<?php

class invoices_model extends CI_Model
{

    public function __construct()
    {
        //parent::CI_Model();
    }

    public function invoices_list()
    {
        $sql   = "SELECT * FROM igc_invoices";
        $query = $this->db->query($sql);

        return $query->result_array();
    }


      public function insert_invoices_bill($insert){
      $result =  $this->db->insert('igc_invoices_bill', $insert);

        if($result)
        {
            return $result;
        }
        else{
            return false;
        }
    }




    public function invoices_list_will_bill($bill_number)
    {
        $options = array('id' => $bill_number);
        $query   = $this->db->get_where('igc_invoices_bill', $options);

        return $query->result_array();

    }

    public function get_active_invoices_list()
    {
        $query = $this->db->get_where('igc_invoices', array('publish_status' => 1));
        return $query->result_array();
    }

}

/* End of file category_management_model.php */
/* Location: ./system/application/models/category_management_model.php */

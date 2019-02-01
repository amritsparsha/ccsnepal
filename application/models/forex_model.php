<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Forex_model extends CI_Model
{

    public function get_forex_rates($forex_date)
    {
        $query= $this->db->query("select fd.* from igc_forex_detail fd join igc_forex_index fi on fd.forex_id =  fi.forex_id where fi.forex_date='$forex_date' and fd.publish_status='1' and fi.delete_status='0'");
        $result =  $query->result_array();
        return $result;
    }
}

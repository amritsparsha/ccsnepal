<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Package_api_model extends CI_Model
{


    //function to get all categories
    public function get_categories()
    {

        $this->db->where('delete_status','0');
        $this->db->where('publish_status','1');
        $this->db->where('show_mobile','Y');
        $this->db->order_by('position');
        $result =  $this->db->get('igc_package_category')->result_array();
        return $result;

    }


    //function to get all categories related packages
    public function get_related_packages($slug)
    {

        $query = $this->db->query("select p.package_id, p.packageimg, p.package_name,p.package_url,p.description, p.rating, p.package_duration ,pp.pprice,c.code, c.symbol from
        igc_package_category ps join igc_category_packages cp on ps.category_id = cp.category_id join igc_package p on cp.package_id = p.package_id
        join igc_package_price pp on p.package_id = pp.package_id
        join igc_currency_setting c on pp.currency_id = c.currency_id  where p.show_mobile='Y' and  p.status='1' and p.delete_status = '0' and
        ps.category_url = '$slug' and ps.publish_status= '1' and ps.delete_status= '0' and publish_status= '1' and pp.is_front = 'Y' order by p.created desc");
        $result = $query->result_array();
        return $result;
    }

    //function to package detail

    public function get_package_detail($slug)
    {
        $this->db->where('delete_status','0');
        $this->db->where('status','1');
        $this->db->where('package_url',$slug);
        $result =  $this->db->get('igc_package')->row_array();
        return $result;
    }

    //function to get accommodations

    public function get_accommodations($package_id)
    {
        $query = $this->db->query("select a.accommodation_id, a.name, c.currency_id,c.code,pp.pprice from igc_accommodation_setting a JOIN 
igc_package_price pp on a.accommodation_id = pp.accommodation_id join igc_currency_setting c on pp.currency_id =  c.currency_id WHERE 
pp.package_id = '$package_id' and a.status = '1'");
        $result = $query->result_array();
        return $result;
    }

    public function get_booking_amount_currency($code)
    {
        $query =  $this->db->query("select b.total_amount, c.code from igc_package_booking b join igc_currency_setting c on b.currency_id =  c.currency_id
where b.booking_code='$code'");
        $result =  $query->row_array();
        return $result;
    }

    //function to get booking package detail

    public function booking_package_detail($booking_code)
    {
        $query = $this->db->query("select pb.*,pc.*,p.package_id,p.package_name,p.package_duration, a.name,
      c.code from igc_package_booking pb
        join igc_accommodation_setting a on pb.accommodation_id =  a.accommodation_id join igc_site_users pc
         on pb.customer_id = pc.customer_id join igc_package p on pb.package_id = p.package_id join igc_currency_setting c on
         pb.currency_id = c.currency_id where pb.booking_code = '$booking_code'");
        $result = $query->row_array();
        return $result;
    }


    public function booking_package_fixed_detail($booking_id)
    {
        $query = $this->db->query("select pb.*,pc.*,p.package_id,p.package_name,p.package_duration,
      c.code from igc_package_booking pb join igc_site_users pc
         on pb.customer_id = pc.customer_id join igc_package p on pb.package_id = p.package_id join igc_currency_setting c on
         pb.currency_id = c.currency_id where pb.booking_id = '$booking_id'");
        $result = $query->row_array();
        return $result;
    }

}


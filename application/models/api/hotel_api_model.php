<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hotel_api_model extends CI_Model
{
    function get_hotel_list()
    {
        $query  = $this->db->query("select h.id, h.name,h.slug,h.hotelimg,h.created,h.updated,h.rating,h.startingprice,c.code from igc_hotel h 
join igc_currency_setting c on h.currency_id =  c.currency_id where h.status='1' and delete_status='0'");
        $result =  $query->result_array();
        return $result;
    }

    public function get_hotel_detail($slug)
    {
        $query  = $this->db->query("select h.*,c.code,c.symbol,co.name as country_name from igc_hotel h 
join igc_currency_setting c on h.currency_id =  c.currency_id join igc_country co on h.country_id = co.id where h.slug='$slug' and h.status='1' and delete_status='0'");
        $result =  $query->row_array();
        return $result;
    }

    public function get_parent_features($hotel_id)
    {
        $query  = $this->db->query("select f.id,f.features_name from igc_features_setting f
join hotel_features hf on f.id =  hf.features_id  where f.parent_id = '0' and  hf.hotel_id='$hotel_id' and f.status='1' and f.delete_status='0'");
        $result =  $query->result_array();
        return $result;

    }

    public function get_child_features($feature_id)
    {
        $query  = $this->db->query("select features_name from igc_features_setting  where parent_id = '$feature_id' and status='1' and delete_status='0'");
        $result =  $query->result_array();
        return $result;

    }


    public function hotel_rooms($hotel_id)
    {
        $query  = $this->db->query("select hr.*, c.code, c.symbol from igc_hotel_room  hr join igc_currency_setting c on hr.currency_id =  c.currency_id where 
hr.hotel_id = '$hotel_id' and hr.publish_status='1' and hr.delete_status='0' and hr.available_room > 0");
        $result =  $query->result_array();
        return $result;
    }

    public function get_room_detail($hotel_id, $hotel_room_id)
    {
        $query  = $this->db->query("select hr.*, c.currency_id,c.code, c.symbol from igc_hotel_room  hr join igc_currency_setting c on hr.currency_id =  c.currency_id where 
hr.hotel_id = '$hotel_id' and hr.hotelroom_id= '$hotel_room_id' and hr.publish_status='1' and hr.delete_status='0'");
        $result =  $query->row_array();
        return $result;
    }


//code to get hotel booking

    public function get_hotel_booked_detail($code)
    {
        $query = $this->db->query("select hb.*, c.* , cu.* from igc_hotel_booking hb join igc_site_users c on hb.customer_id= 
c.customer_id join igc_currency_setting cu on hb.currency_id = cu.currency_id
      where hb.booking_code = '$code'");
        $result =  $query->row_array();
        return $result;
    }

    public function get_hotel_booked_data($hotel_id, $hotel_room_id)
    {
        $query = $this->db->query("select h.name as hotel_name, r.available_room, r.name as room_name from igc_hotel h join igc_hotel_room r on h.id = r.hotel_id
      where h.id = '$hotel_id' and r.hotelroom_id = '$hotel_room_id'");
        $result =  $query->row_array();
        return $result;
    }

    public function get_hotel_albums_images($hotel_id)
    {
        $query = $this->db->query("select a.album_id as path_id, i.caption, i.name from igc_image i join igc_album a on i.album_id = a.album_id join igc_hotel_album ha on a.album_id =
  ha.album_id where ha.hotel_id= '$hotel_id' and  i.publish_status ='1' and i.delete_status='0' and  a.publish_status ='1' and a.delete_status='0'");
        $result = $query->result_array();

        return $result;
    }


    public function update_hotel_room($hotel_id, $hotel_room_id , $update)
    {
        $this->db->where('hotelroom_id', $hotel_room_id);
        $this->db->where('hotel_id', $hotel_id);
        $result =  $this->db->update('igc_hotel_room', $update);
        if($result)
        {
            return $result;
        }
        else{
            return false;
        }

    }
}
?>
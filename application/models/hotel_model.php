<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_model extends CI_Model
{

	public function get_detail(){

		$this->db->where('delete_status', '0');
		$this->db->where('status', '1');
		$result= $this->db->get('igc_hotel')->result_array();
		return $result;
	}

	 public function get_hotel_albums_images($hotel_id)
    {
        $query = $this->db->query("select a.album_id as path_id, i.caption, i.name from igc_image i join igc_album a on i.album_id = a.album_id join igc_hotel_album ha on a.album_id =
  ha.album_id where ha.hotel_id= '$hotel_id' and  i.publish_status ='1' and i.delete_status='0' and  a.publish_status ='1' and a.delete_status='0'");
        $result = $query->result_array();

        return $result;
    }

    public function get_room_albums_images($hotelroom_id)
    {
        $query = $this->db->query("select a.album_id as path_id, i.caption, i.name from igc_image i join igc_album a on i.album_id = a.album_id join room_album ra on a.album_id =
  ra.album_id where ra.hotelroom_id= '$hotelroom_id' and  i.publish_status ='1' and i.delete_status='0' and  a.publish_status ='1' and a.delete_status='0'");
        $result = $query->result_array();
        return $result;
    }

    public function get_features_name(){

        $this->db->where('delete_status', '0');
        $this->db->where('parent_id', '0');
        $result = $this->db->get('igc_features_setting')->result_array();
        return $result;
    }

     //getting information of child
    public function get_child($id){

        $this->db->where('delete_status', '0');
        $this->db->where('parent_id', $id);
        $result = $this->db->get('igc_features_setting')->result_array();
        return $result;
            
    }

    //getting the records of the hotel feature table of same id
    public function get_hotel_feature($hotel_id, $features_id){
        
        $this->db->where('hotel_id', $hotel_id);
        $this->db->where('features_id', $features_id);
        $result= $this->db->get('hotel_features')->row_array();
    
        return $result;
    }

    //getting the records of the room feature table of same id
    public function get_room_feature($hotelroom_id, $features_id){
        
        $this->db->where('hotelroom_id', $hotelroom_id);
        $this->db->where('features_id', $features_id);
        $result= $this->db->get('room_features')->row_array();
    
        return $result;
    }

    public function get_hotel_room_detail($hotel_id, $hotel_room_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $this->db->where('hotelroom_id', $hotel_room_id);
        $this->db->where('delete_status', '0');
        $this->db->where('publish_status', '1');
        $result =  $this->db->get('igc_hotel_room')->row_array();
        return $result;
    }

    //get country according to the publish status
    public function get_country(){
        $this->db->where('publish_status','1');
        $result = $this->db->get('igc_country')->result_array();
        return $result;
    }


    public function get_search_hotels($country, $city, $rating, $price_from, $price_to)
    {
        $query = $this->db->query("
        select h.id, h.hotelimg, h.status, h.delete_status, h.name as hotel_name, h.slug, h.rating, h.city, h.currency_id, h.category ,h.description, h.startingprice, c.code, con.name, s.name as category
        from igc_hotel h join igc_currency_setting c on h.currency_id = c.currency_id join igc_country con on h.country_id = con.id join igc_hotel_setting s on h.category = s.id where h.status='1' and delete_status='0' and h.city like '%$city%' and con.name like '%$country%' and h.startingprice like '%$price_from%' and h.startingprice like '%$price_to%' and s.name like '%$rating%' group by h.id");
        $result = $query->result_array();
       
        return $result;
    }

    public function get_hotel_category()
    {
        $this->db->order_by('created', 'ASC');
        $this->db->where('status','1');
        $result = $this->db->get('igc_hotel_setting')->result_array();
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
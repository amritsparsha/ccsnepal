<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Package_model extends CI_Model
{

    /** IH */
    public function get_all_categories($code)
    {
        $query = $this->db->query("select * from igc_package_category where publish_status='1' and delete_status= '0' and show_front='1' and category_code = '$code' order by position");
        $result = $query->result_array();
        return $result;
    }
    
    //get sub categories
    public function get_subcategories($parent_id)
    {
        $this->db->where('publish_status', '1');
        $this->db->where('delete_status', '0');
        $this->db->where('parent_id', $parent_id);
        $this->db->order_by('position');
        $result = $this->db->get('igc_package_category')->result_array();
        return $result;
    }


/** IH */
    public function get_show_front($code, $start, $per_page)
    {
        $query = $this->db->query("select * from igc_package_category where publish_status='1' and delete_status= '0' and show_front='1' and category_code = '$code' order by position limit $start,$per_page");
        $result = $query->result_array();
        return $result;
    }


    //function to count get packages by categories

    public function count_active_packages($category_id)
    {
        $query = $this->db->query("select p.* from igc_package_category  pc join igc_category_packages cp on pc.category_id = cp.category_id
join igc_package p on cp.package_id = p.package_id where p.status='1' and p.delete_status='0' and cp.category_id = '$category_id'");
        $result = $query->num_rows();
        return $result;
    }

    //function to count get packages by categories

    public function minimum_active_price($category_id)
    {
        $query = $this->db->query("select min(pp.pprice) as minimum_price, c.code, c.symbol from igc_package_category  pc join igc_category_packages cp on pc.category_id = cp.category_id
join igc_package p on cp.package_id = p.package_id join igc_package_price pp on p.package_id = pp.package_id join igc_currency_setting c on pp.currency_id = c.currency_id where p.status='1' and p.delete_status='0' and 
pp.is_front = 'Y' and cp.category_id = '$category_id'");
        $result = $query->row_array();
        return $result;
    }

    //function to get categories
    /** IH */
//    public function get_categories($code)
//    {
//        $query = $this->db->query("select category_id, category_name,featured_img, category_url from igc_package_category  where publish_status='1' and category_code = '$code' order by category_name");
//        $result = $query->result_array();
//        return $result;
//
//    }


//     public function get_sub_categories($category_id)
//     {
//
//        $this->db->where('category_id', $category_id);
//        $this->db->where('publish_status', '1');
//        $result = $this->db->get('igc_package_subcategory')->result_array();
//        return $result;
//     }

    //function to get all subcategories of related categories
//    public function get_sub_categories($category_id)
//    {
//        $this->db->select('sub_category_id');
//        $this->db->select('sub_category_name');
//        $this->db->select('sub_category_url');
//        $this->db->where('category_id', $category_id);
//        $this->db->where('publish_status', '1');
//        $result = $this->db->get('igc_package_subcategory')->result_array();
//        return $result;
//    }

    //function to get package info
    /** IH */
    public function get_package_info($term_name, $start_point, $per_page)
    {
        $query = $this->db->query("select p.package_id,p.tourcode, p.featuredimg, p.package_name,p.description, p.package_url, p.rating, p.package_duration ,pp.pprice,c.code,c.symbol from
        igc_taxonomy_terms t join igc_package_tags pt on t.term_id = pt.term_id join igc_package p on pt.package_id = p.package_id
        join igc_package_price pp on p.package_id = pp.package_id
        join igc_currency_setting c on pp.currency_id = c.currency_id  where p.status='1' and p.delete_status = '0' and show_front= '1' and
        t.term_name = '$term_name' and pp.is_front = 'Y' order by p.created desc limit $start_point,$per_page");
        $result = $query->result_array();
        return $result;
    }

    //function to get show front departures
    /** IH */
    public function show_front_departures($term_name, $start_point, $per_page)
    {
        $today =  date('Y-m-d');
        $query = $this->db->query("select p.package_name,p.package_url, pd.departure_id, pd.departure_date, pd.available_no, dp.price, c.code from  igc_package_departure
       pd join igc_departure_price dp on pd.departure_id =  dp.departure_id join igc_package p on pd.package_id= p.package_id join igc_package_tags pt 
         on p.package_id =  pt.package_id join  igc_taxonomy_terms t on pt.term_id = t.term_id  join igc_currency_setting c on dp.currency_id = c.currency_id
         where p.status='1' and p.delete_status = '0' and p.show_front= '1' and  pd.publish_status='1' and pd.delete_status = '0' and dp.show_front= 'Y' and 
        t.term_name = '$term_name' and pd.available_no > 0 and pd.departure_date >'$today' order by pd.departure_date limit $start_point,$per_page"
     );
        $result = $query->result_array();
        return $result;
    }

    //function to get all fixed departures
    /** IH */
    public function get_all_fixed_departures($term_name, $start_point, $per_page)
    {
        $today =  date('Y-m-d');

        $query = $this->db->query("select p.package_id, p.featuredimg, p.package_name,p.package_url,p.description, p.rating, p.package_duration ,pd.departure_id, pd.departure_date, pd.available_no, dp.price,c.code from
       igc_package_departure
       pd join igc_departure_price dp on pd.departure_id =  dp.departure_id join igc_package p on pd.package_id= p.package_id join igc_package_tags pt 
         on p.package_id =  pt.package_id join  igc_taxonomy_terms t on pt.term_id = t.term_id  join igc_currency_setting c on dp.currency_id = c.currency_id
         where p.status='1' and p.delete_status = '0' and p.show_front= '1' and  pd.publish_status='1' and pd.delete_status = '0' and dp.show_front= 'Y' and 
        t.term_name = '$term_name' and pd.available_no > 0 and pd.departure_date >'$today' order by pd.departure_date limit {$start_point},{$per_page}");
        $result = $query->result_array();
        return $result;
    }



    //function to get related packages


    public function get_related_packages($slug, $start_point = 0, $per_page = 0)
    {

        $query = $this->db->query("select p.package_id, p.featuredimg, p.package_name,p.package_url,p.description, p.rating, p.package_duration ,pp.pprice,c.code from
        igc_package_category ps join igc_category_packages cp on ps.category_id = cp.category_id join igc_package p on cp.package_id = p.package_id
        join igc_package_price pp on p.package_id = pp.package_id
        join igc_currency_setting c on pp.currency_id = c.currency_id  where  p.status='1' and p.delete_status = '0' and
        ps.category_url = '$slug' and ps.publish_status= '1' and ps.delete_status= '0' and publish_status= '1' and pp.is_front = 'Y' order by p.created desc limit
		{$start_point},{$per_page}");
        $result = $query->result_array();
        return $result;
    }


    public function oldget_search_packages($slug)
    {
        $query = $this->db->query("
        select p.package_id, p.featuredimg, p.package_name,p.package_url, p.rating, p.package_duration ,pp.pprice,c.code
from igc_package_category pc join
        igc_package_subcategory ps on pc.category_id= ps.category_id join igc_category_packages cp
        on ps.sub_category_id = cp.sub_category_id join igc_package p on cp.package_id = p.package_id join igc_package_price pp
        on p.package_id = pp.package_id
        join igc_currency_setting c on pp.currency_id = c.currency_id
        where pc.category_name like '%$slug%' or ps.sub_category_name like '%$slug%' or p.package_name like '%$slug%' and p.status='1' and p.delete_status='1' group by p.package_id");
        $result = $query->result_array();
        return $result;
    }


    public function get_search_packages($destination, $trip_type)
    {
        $query = $this->db->query("
        select p.package_id, p.featuredimg, p.package_name,p.package_url, p.rating, p.package_duration,p.description, pp.accommodation_id ,pp.pprice, c.code from igc_package p join igc_package_price pp on p.package_id = pp.package_id join igc_currency_setting c on pp.currency_id = c.currency_id join igc_package_destination pd on p.package_id = pd.package_id join igc_destination d on pd.destination_id = d.destination_id where d.destination like '%$destination%' and pp.accommodation_id like '%$trip_type%' and p.status='1' and p.delete_status='0' group by p.package_id");
        $result = $query->result_array();
        return $result;
    }

    public function get_search($destination, $trip_type)
    {
        $query = $this->db->query("
        select p.package_id, p.featuredimg, p.package_name,p.package_url, p.rating, p.package_duration,p.description, pp.accommodation_id ,pp.pprice, c.code from igc_package p join igc_package_price pp on p.package_id = pp.package_id join igc_currency_setting c on pp.currency_id = c.currency_id where p.package_name like '%$destination%' and pp.accommodation_id like '%$trip_type%' and p.status='1' and p.delete_status='0' group by p.package_id");
        $result = $query->result_array();
        // print_r($result);
        // exit;
        return $result;
    }

    public function get_search_trek($destination, $trip_type)
    {
        $query = $this->db->query("
        select p.package_id, p.featuredimg, p.package_name,p.package_url, p.rating, p.package_duration,p.description, pp.accommodation_id ,pp.pprice, c.code from igc_package p join igc_package_price pp on p.package_id = pp.package_id join igc_currency_setting c on pp.currency_id = c.currency_id join igc_package_regions pr on p.package_id = pr.package_id join igc_regions r on pr.region_id = r.region_id where r.region_name like '%$destination%' and pp.accommodation_id like '%$trip_type%' and p.status='1' and p.delete_status='0' group by p.package_id");
        $result = $query->result_array();
        return $result;
    }


    //function to get search packages rows

    public function get_search_packages_number($slug)
    {

        $query = $this->db->query("select  p.package_id, p.featuredimg, p.package_name,p.package_url, p.rating, p.package_duration ,pp.pprice,c.code from
        igc_package_subcategory ps join igc_category_packages cp on ps.sub_category_id = cp.sub_category_id join igc_package p on cp.package_id = p.package_id
        join igc_package_price pp on p.package_id = pp.package_id
        join igc_currency_setting c on pp.currency_id = c.currency_id  where  p.status='1' and
        p.package_name like '$slug%' and p.delete_status='0' and pp.is_front = 'Y'");
        $result = $query->num_rows();
        return $result;
    }

    //function get total number of related packages

    public function total_related_packages($slug)
    {

        $query = $this->db->query("select * from
        igc_package_category ps join igc_category_packages cp on ps.category_id = cp.category_id join igc_package p on cp.package_id = p.package_id where  p.status='1' and p.delete_status = '0' and
        ps.category_url = '$slug' and ps.delete_status = '0' and ps.publish_status = '1'");
        $result = $query->num_rows();

        return $result;
    }


    //function get total number of related packages

    public function total_fixed_packages($term)
    {

        $today =  date('Y-m-d');

        $query = $this->db->query("select * from
       igc_package_departure
       pd join igc_departure_price dp on pd.departure_id =  dp.departure_id join igc_package p on pd.package_id= p.package_id join igc_package_tags pt 
         on p.package_id =  pt.package_id join  igc_taxonomy_terms t on pt.term_id = t.term_id 
         where p.status='1' and p.delete_status = '0' and p.show_front= '1' and  pd.publish_status='1' and pd.delete_status = '0' and dp.show_front= 'Y' and 
        t.term_name = '$term' and pd.available_no > 0 and pd.departure_date >'$today'");
        $result = $query->num_rows();
        return $result;
    }

    public function get_total_special($term_name)
    {
        $query = $this->db->query("select * from
        igc_taxonomy_terms t join igc_package_tags pt on t.term_id = pt.term_id join igc_package p on pt.package_id = p.package_id
        join igc_package_price pp on p.package_id = pp.package_id
        join igc_currency_setting c on pp.currency_id = c.currency_id  where p.status='1' and p.delete_status = '0' and show_front= '1' and
        t.term_name = '$term_name'");
        $result = $query->num_rows();
        return $result;
    }





    public function get_limited_package()
    {
        $query = $this->db->query("select package_id, featuredimg, package_name, rating, package_duration from
        igc_package where delete_status = '0' and status = '1' order by package_id desc ");
        $result = $query->result_array();
        return $result;

    }

    public function get_default_price($package_id)
    {
        $query = $this->db->query("select c.code, pp.pprice from igc_package_price pp join igc_currency_setting c on pp.currency_id =
       c.currency_id where pp.package_id = '$package_id' and pp.is_front = 'Y'");
        $result = $query->row_array();
        return $result;
    }

    //function to package detail

    public function get_package_detail($slug)
    {
        $this->db->where('package_url', $slug);
        $this->db->where('status', '1');
        $this->db->where('delete_status', '0');
        $result = $this->db->get('igc_package')->row_array();
        return $result;
    }

    //function to get package detail by id

    public function get_package_details($package_id)
    {
        $this->db->where('package_id', $package_id);
        $this->db->where('status', '1');
        $this->db->where('delete_status', '0');
        $result = $this->db->get('igc_package')->row_array();
        return $result;
    }

//function get_package accommodation

    public function get_package_accommodation($package_id)
    {
        $query = $this->db->query("select a.accommodation_id, a.name from igc_accommodation_setting a join igc_package_price pp on
        a.accommodation_id = pp.accommodation_id where pp.package_id = '$package_id' group by pp.accommodation_id");
        $result = $query->result_array();
        return $result;

    }

    //function get package price

    public function get_package_price($package_id, $accommodation_id)
    {
        $query = $this->db->query("select c.code,c.symbol,pp.currency_id, pp.pprice from igc_package_price pp join igc_currency_setting c on
        pp.currency_id = c.currency_id where pp.package_id = '$package_id' and pp.accommodation_id = '$accommodation_id'");
        $result = $query->result_array();
        return $result;
    }

    //function to get package itinerary

    public function get_package_itinerary($package_id)
    {
        $this->db->where('package_id', $package_id);
        $result = $this->db->get('igc_itinerary')->result_array();
        return $result;
    }

    //function get accommodation type

//    public function accommodation_type($accommodation_id)
//    {
//        $this->db->select('name');
//        $this->db->where('accommodation_id', $accommodation_id);
//        $result = $this->db->get('igc_accommodation_setting')->row_array();
//        return $result;
//    }

//function get currency type

//    public function currency_type($currency_id)
//    {
//        $this->db->select('code');
//        $this->db->where('currency_id', $currency_id);
//        $result = $this->db->get('igc_currency_setting')->row_array();
//        return $result;
//    }

    //function get package name

//    public function get_package_name($package_id)
//    {
//        $this->db->select('package_name');
//        $this->db->where('package_id', $package_id);
//        $result = $this->db->get('igc_package')->row_array();
//        return $result;
//    }

    //function to insert customer

    public function register($insert)
    {
        $this->db->insert('igc_package_customer', $insert);
        $result = $this->db->insert_id();
        return $result;
    }

    //function to create new booking

//    public function insert_booking($insert)
//    {
//        $result = $this->db->insert('igc_package_booking', $insert);
//        if ($result) {
//            return true;
//
//        } else {
//            return false;
//        }
//
//    }

    // function to check cipher

    public function check_cipher($cipher)
    {
        $this->db->where('booking_code', $cipher);
        $result = $this->db->get('igc_package_booking')->row_array();
        return $result;
    }


    //function to get booking package detail

//    public function booking_normal_package_detail($package_id)
//    {
//        $query = $this->db->query("select p.package_name,p.package_duration, pb.amount,pb.edited_amount, pb.calculation_type, pb.updated,pb.total_amount,pb.arrival_date,pb.trip_type,pb.no_of_person,
//pb.adult,pb.child,pb.infant,pb.extra_facility, pb.additional_info,pb.referedby, a.name,
// pc.email,pc.passport_no,pc.country,pc.city,pc.contact_no,pc.first_name,pc.middle_name,
//         pc.last_name,pc.customer_title ,c.code from igc_package_booking pb
//        join igc_accommodation_setting a on pb.accommodation_id =  a.accommodation_id join igc_site_users pc
//         on pb.customer_id = pc.customer_id join igc_package p on pb.package_id = p.package_id join igc_currency_setting
//          c on pb.currency_id = c.currency_id where p = '$package_id'");
//        $result = $query->row_array();
//        return $result;
//    }

    public function booking_package_nomral_detail($booking_id)
    {
        $query = $this->db->query("select pb.*,pc.*,p.package_id,p.package_name,p.package_duration, a.name,
      c.code from igc_package_booking pb
        join igc_accommodation_setting a on pb.accommodation_id =  a.accommodation_id join igc_site_users pc
         on pb.customer_id = pc.customer_id join igc_package p on pb.package_id = p.package_id join igc_currency_setting c on
         pb.currency_id = c.currency_id where pb.booking_id = '$booking_id'");
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



    //function to get booking id

    public function get_booking_id($booking_code)
    {
        $this->db->select('booking_id');
        $this->db->where('booking_code', $booking_code);
        $result = $this->db->get('igc_package_booking')->row_array();
        return $result;
    }


    //function to update booking status

    public function update_booking_status($booking_id, $update)
    {
        $this->db->where('booking_id', $booking_id);
        $result = $this->db->update('igc_package_booking', $update);
        return $result;
    }


 

  


    //function to get igcpay settings

    public function get_igcpay_settings()
    {
        $this->db->where('delete_status', '0');
        $this->db->where('active_status', '1');
        $result = $this->db->get('igc_payment_settings')->row_array();
        return $result;
    }

    public function get_home_package_review($start_point, $per_page)
    {
        $query = $this->db->query("select p.package_id, p.package_name, p.package_duration, p.featuredimg,p.rating, r.review_text,r.review_url,r.created, r.review_by from igc_package p join igc_package_review pr on
        p.package_id = pr.package_id join igc_review r on pr.review_id = r.review_id where p.status ='1' and p.delete_status='0' and r.publish_status='1' and r.show_front='1' and r.delete_status='0' order by p.created desc limit $start_point,$per_page");
        $result = $query->result_array();
        return $result;
    }

    public function get_package_review()
    {
        $query = $this->db->query("select p.package_id, p.package_name, p.package_duration, p.featuredimg,p.rating, r.review_text,r.review_url, r.review_by from igc_package p join igc_package_review pr on
        p.package_id = pr.package_id join igc_review r on pr.review_id = r.review_id where p.status ='1' and p.delete_status='0' and r.publish_status='1' and r.delete_status='0'");
        $result = $query->result_array();
        return $result;
    }

    //get album list

    public function get_package_albums($package_id)
    {
        $query = $this->db->query("select a.album_id, a.image_id, a.name from igc_album a join igc_package_album pa on a.album_id = pa.album_id
        where a.delete_status = '0' and a.publish_status='1' and pa.package_id ='$package_id' order by pa.album_id desc");
        $result = $query->result_array();
        return $result;
    }


    public function get_album_gallery($album_id)
    {
        $this->db->where('album_id', $album_id);
        $this->db->where('delete_status', '0');
        $this->db->where('publish_status', '1');
        $result = $this->db->get('igc_image')->result_array();
        return $result;

    }


    //function to get adventure

    public function get_adventure_front($start_point, $per_page)
    {
        $query = $this->db->query("select activity_name, activity_url, featured_img from igc_activity where publish_status ='1' and delete_status='0' and  show_front='1' order by created desc limit $start_point,$per_page");
        $result = $query->result_array();
        return $result;
    }

    //function to get all albums image IH

    public function get_package_albums_images($package_id)
    {
        $query = $this->db->query("select a.album_id as path_id, i.caption, i.name from igc_image i join igc_album a on i.album_id = a.album_id join igc_package_album pa on a.album_id =
  pa.album_id where pa.package_id= '$package_id' and  i.publish_status ='1' and i.delete_status='0' and  a.publish_status ='1' and a.delete_status='0'");
        $result = $query->result_array();
        return $result;
    }

    //get fixed depature price

    public function get_departure_price($depature_id)
    {
        $query =  $this->db->query("select d.currency_id, d.price,c.code,c.symbol from igc_departure_price d join igc_currency_setting c on
d.currency_id =  c.currency_id where d.departure_id = '$depature_id'");
        $result = $query->result_array();
        return $result;
    }


    //get prrice by package , currency and accommodation


    public function get_pprice($package_id, $accommodation_id, $currency_id)
    {
        $this->db->select('pprice');
        $this->db->where('package_id', $package_id);
        $this->db->where('accommodation_id', $accommodation_id);
        $this->db->where('currency_id', $currency_id);
        $result = $this->db->get('igc_package_price')->row_array();
        return $result;
    }

    //get departure price by currency

    public function get_depart_price($departure_id, $currency_id)
    {
        $this->db->select('price');
        $this->db->where('departure_id', $departure_id);
        $this->db->where('currency_id', $currency_id);
        $result = $this->db->get('igc_departure_price')->row_array();
        return $result;
    }


    //function get booking amount and currency

    public function get_booking_amount_currency($code)
    {
        $query =  $this->db->query("select b.total_amount, c.code from igc_package_booking b join igc_currency_setting c on b.currency_id =  c.currency_id
where b.booking_code='$code'");
        $result =  $query->row_array();
        return $result;
    }


    public function get_booked_package_type($code)
    {
        $this->db->select('booking_id');
        $this->db->select('departure_id');
        $this->db->select('package_type');
        $this->db->where('booking_code', $code);
        $result =  $this->db->get('igc_package_booking')->row_array();
        return $result;
    }

    public function get_booking_data($code)
    {
        $query = $this->db->query("select p.package_name,pb.total_amount,c.code from igc_package_booking pb join igc_package p on pb.package_id = p.package_id join igc_currency_setting
          c on pb.currency_id = c.currency_id where pb.booking_code = '$code'");
        $result = $query->row_array();
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






}
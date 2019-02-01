<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Packages extends CI_Controller{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('site_settings_model', 'settings');
        $this->load->model('package_model','package');
        $this->load->model('crud_model','crud');
    }

    public  $table = "igc_package";
    public $field_name = "package_id";
    public  $redirect = "packages";

    public function index($slug)
    {

        $detail = $this->crud->get_active_not_deleted_detail($slug, 'category_url', 'igc_package_category');

        if(empty($detail)) {
            redirect('home');
        }
        $category_id = $detail['category_id'];
        $sub_categories = $this->package->get_subcategories($category_id);
        
        if (!empty($sub_categories)) {
            $data['menu'] = "";
            $data['sub_title'] =  $detail['category_name'];
            $data['categories'] =  $sub_categories;
            $data['meta_title'] =  $detail['meta_title'];
            $data['description'] =  $detail['description'];
            $data['meta_description'] =  $detail['meta_description'];
            $data['meta_keywords'] =  $detail['meta_keywords'];
            $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator');
            $this->load->view('header', $data);
            $this->load->view('package/category_listing');
            $this->load->view('footer');
        } else {
            redirect('packages/rel/' . $slug);
        }

    }



    public function related($slug, $page=0)
    {


        $detail = $this->crud->get_active_not_deleted_detail($slug, 'category_url', 'igc_package_category');
        if(empty($detail)) {
            redirect('home');
        }
        if($page < 1) {
            $page = 1;
        }
        $per_page = 15;
        $startpoint = ($page * $per_page) - $per_page;
        $data['packages']= $this->package->get_related_packages($slug, $startpoint, $per_page);
        $data['package_total'] = $this->package->total_related_packages($slug);
        $data['slug'] = $slug;
        $data['per_page'] = $per_page;
        $data['base_url'] = site_url('packages/rel/'.$slug);
        $data['current_page'] = $page;
        $data['sub_title'] =  $detail['category_name']." ";
        $data['menu']="";
        $data['meta_title'] =  $detail['meta_title'];
        $data['meta_description'] =  $detail['meta_description'];
        $data['meta_keywords'] =  $detail['meta_keywords'];
        $data['description'] =  $detail['description'];
        $data['featured_img'] =  $detail['featured_img'];	
        $data['scripts'] = array('themes/js/form-validator/jquery.form-validator');
        $this->load->view('header', $data);
        $this->load->view('package/package_list');
        $this->load->view('footer');
    }


    public function fixed_departures($term, $page=0)
    {

        if($page < 1) {
            $page = 1;
        }
        $per_page = 15;
        $startpoint = ($page * $per_page) - $per_page;
        $data['packages']= $this->package->get_all_fixed_departures($term, $startpoint, $per_page);
        $data['package_total'] = $this->package->total_fixed_packages($term);
        $data['slug'] = $term;
        $data['per_page'] = $per_page;
        $data['base_url'] = site_url('packages/fixed_departures/'.$term);
        $data['current_page'] = $page;
        $data['sub_title'] =  "Fixed Departures"." ";
        $data['menu']="";
        $this->load->view('header', $data);
        $this->load->view('package/departure_list');
        $this->load->view('footer');
    }

    public function special($page=0)
    {

        if($page < 1) {
            $page = 1;
        }
        $term="special";
        $per_page = 15;
        $startpoint = ($page * $per_page) - $per_page;
        $data['packages']= $this->package->get_package_info($term, $startpoint, $per_page);
        $data['package_total'] = $this->package->get_total_special($term);
        $data['slug'] = $term;
        $data['per_page'] = $per_page;
        $data['base_url'] = site_url('packages/special');
        $data['current_page'] = $page;
        $data['sub_title'] =  "Special Packages"." ";
        $data['menu']="";
        $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator');
        $this->load->view('header', $data);
        $this->load->view('package/special_list');
        $this->load->view('footer');
    }

    public function search()
    {

        if($this->input->post())
        {
           
            $term = $this->input->post('term');
            $trip_type = $this->input->post('trip_type');
            $destination = $this->input->post('destination');
            if($term =="tour"){

                $data['packages'] = $this->package->get_search_packages($destination, $trip_type);

            }
            if($term == "trek"){

                $data['packages'] = $this->package->get_search_trek($destination, $trip_type);
            }
            $data['sub_title'] =  "Search Result"." ";
            $data['menu']="";
            $data['search'] = $this->package->get_search($destination, $trip_type);
            // print_r($data['search']);
            // exit;
            $this->load->view('header', $data);
            $this->load->view('package/search_list');
            $this->load->view('footer');

        }
    }

    public function detail($category_slug, $slug)
    {


        $this->load->library('form_validation');
        if($this->input->post())
        {

            $this->form_validation->set_rules('accommodation_id', 'Accommodation', 'required');

            if($this->form_validation->run()) {


                $accommodation = $this->input->post('accommodation_id');
                $currency = $this->input->post('currency');
                $session['package_id'] = $this->input->post('package_id');
                $session['departure_id'] = $this->input->post('departure_id');
                $session['accommodation_id'] = $accommodation;
                $session['currency_id'] = $currency[$accommodation];
                $session['package_type'] = $this->input->post('package_type');
                $price_detail =  $this->package->get_pprice($session['package_id'],  $session['accommodation_id'],  $session['currency_id']);
                $session['amount'] = $price_detail['pprice'];
                $this->session->set_userdata('booking_data', $session);
                redirect('booking');

            }


        }

        $category_detail  = $this->crud->get_active_not_deleted_detail($category_slug, 'category_url', 'igc_package_category');

        $data['breadcrumb_label'] =  (isset($category_detail['category_name']) && $category_detail['category_name'] !="")? $category_detail['category_name']:"";
        $data['breadcrumb_link'] =  $category_slug;

        $detail = $this->package->get_package_detail($slug);

     

        if(empty($detail))
        {
            redirect('home');
        }
        $package_id = $detail['package_id'];
        $data['albums'] = $this->package->get_package_albums_images($package_id);

        $data['detail'] = $detail;
        $data['sub_title'] = $detail['package_name']." ";
        $data['meta_title'] = $detail['meta_title'];
        $data['meta_description'] = $detail['meta_description'];
        $data['meta_keywords'] = $detail['meta_keywords'];
        $data['menu']='';

        //setting for fb share

        $data['og_url']= 'packages/detail/'.$category_slug.'/'.$detail['package_url'];
        $data['og_title']= $detail['package_name'];
        $data['og_description']= substr($detail['description'],0,200);
        $data['og_image']= 'uploads/package/'.$package_id.'/'.$detail['packageimg'];
        $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator');
     

        $this->load->view('header', $data);
        $this->load->view('package/package_detail');
        $this->load->view('footer');
    }

    public function details($slug)
    {



        $this->load->library('form_validation');
        if($this->input->post())
        {

            $this->form_validation->set_rules('accommodation_id', 'Accommodation', 'required');

            if($this->form_validation->run()) {


                $accommodation = $this->input->post('accommodation_id');
                $currency = $this->input->post('currency');
                $session['package_id'] = $this->input->post('package_id');
                $session['departure_id'] = $this->input->post('departure_id');
                $session['accommodation_id'] = $accommodation;
                $session['currency_id'] = $currency[$accommodation];
                $session['package_type'] = $this->input->post('package_type');
                $price_detail =  $this->package->get_pprice($session['package_id'],  $session['accommodation_id'],  $session['currency_id']);
                $session['amount'] = $price_detail['pprice'];
                $this->session->set_userdata('booking_data', $session);
                redirect('booking');

            }


        }


        $data['breadcrumb_label'] = "";
        $data['breadcrumb_link'] =  "";

        $detail = $this->package->get_package_detail($slug);

        if(empty($detail))
        {
            redirect('home');
        }
        $package_id = $detail['package_id'];
        $data['albums'] = $this->package->get_package_albums_images($package_id);

        $data['detail'] = $detail;
        $data['sub_title'] = $detail['package_name']." ";
        $data['meta_title'] = $detail['meta_title'];
        $data['meta_description'] = $detail['meta_description'];
        $data['meta_keywords'] = $detail['meta_keywords'];
        $data['menu']='';

        //setting for fb share

        $data['og_url']= 'packages/details/'.$detail['package_url'];
        $data['og_title']= $detail['package_name'];
        $data['og_description']= substr($detail['description'],0,200);
        $data['og_image']= 'uploads/package/'.$package_id.'/'.$detail['packageimg'];
        $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator');


        $this->load->view('header', $data);
        $this->load->view('package/package_detail');
        $this->load->view('footer');
    }


    public function fixed($slug, $departure_id)
    {
        $this->load->library('form_validation');
        if($this->input->post())
        {

            $this->form_validation->set_rules('accommodation_id', 'Accommodation', 'required');

            if($this->form_validation->run()) {

//                $session['package_id'] = $this->input->post('package_id');
//                $session['departure_id'] = $this->input->post('departure_id');
//                $session['currency_id'] = $this->input->post('currency_id');
//                $session['accommodation_id'] = "0";

                $accommodation = $this->input->post('accommodation_id');
                $currency = $this->input->post('currency');
                $session['package_id'] = $this->input->post('package_id');
                $session['departure_id'] = $this->input->post('departure_id');
                $session['accommodation_id'] = $accommodation;
                $session['currency_id'] = $currency[$accommodation];


                $session['package_type'] = $this->input->post('package_type');
                $price_detail =  $this->package->get_depart_price($session['departure_id'],  $session['currency_id']);
                $session['amount'] = $price_detail['price'];
                $this->session->set_userdata('booking_data', $session);
                redirect('booking');

            }


        }

        $detail = $this->package->get_package_detail($slug);
        $departure_detail = $this->crud->get_detail($departure_id, 'departure_id','igc_package_departure');

        if(empty($detail))
        {
            redirect('home');
        }
        if( isset($departure_detail['available_no']) && $departure_detail['available_no'] < 1)
        {
            redirect('home');
        }


        $package_id = $detail['package_id'];
        $data['albums'] = $this->package->get_package_albums_images($package_id);
        $data['departure_id'] =  $departure_id;
        $data['departure_detail']= $departure_detail;
        $data['detail'] = $detail;
        $data['sub_title'] = $detail['package_name']." ";
        $data['meta_title'] = $detail['meta_title'];
        $data['meta_description'] = $detail['meta_description'];
        $data['meta_keywords'] = $detail['meta_keywords'];
        $data['menu']='';

        //setting for fb share

        $data['og_url']= 'packages/fixed/'.$detail['package_url'].'/'.$departure_id;
        $data['og_title']= $detail['package_name'];
        $data['og_description']= substr($detail['description'],0,200);
        $data['og_image']= 'uploads/package/'.$package_id.'/'.$detail['packageimg'];
        $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator');

        $this->load->view('header', $data);
        $this->load->view('package/fixed_depature_detail');
        $this->load->view('footer');
    }


}
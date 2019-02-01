<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Review extends CI_Controller{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('crud_model', 'crud');
        $this->load->model('review_model', 'review');
    }
    public  $table = "igc_review";
    public $field_name = "review_id";
    public  $redirect = "review";



    public function all($page=0)
    {

        if($page < 1) {
            $page = 1;
        }
        $per_page = 4;
        $startpoint = ($page * $per_page) - $per_page;
        $data['reviews']= $this->review->get_all_reviews($startpoint, $per_page);
        $data['total'] = $this->review->count_reviews();
        $data['per_page'] = $per_page;
        $data['base_url'] = site_url('review/all/');
        $data['current_page'] = $page;
        $data['menu'] = '';
        $this->load->view('header', $data);
        $this->load->view('review/review_list');
        $this->load->view('footer');
    }

    public function index($slug)
    {
        $data['detail'] = $this->crud->get_detail($slug, 'package_url', 'igc_package');

        if(empty($data['detail']))
        {
            redirect('home');
        }
        $this->load->library('form_validation');

        if($this->input->post()) {


//            print_r($this->input->post());
//            exit();

            $this->form_validation->set_rules('review_title', 'Review Title', 'trim|required|max_length[100]');
            $this->form_validation->set_rules('review_by', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('review_text', 'Review Text', 'trim|required|max_length[2500]');
            $this->form_validation->set_rules('captcha_code', 'Captcha Code', 'trim|required|callback_check_captcha');
            $this->form_validation->set_rules('package_id', 'Hidden Field', 'trim|required');

            if ($this->form_validation->run()) {


                $insert['review_by'] = $this->input->post('review_by');
                $insert['review_title'] = $this->input->post('review_title');
                $insert['review_url'] = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '-', $insert['review_title']));
                $insert['review_text'] = $this->input->post('review_text');
                $insert['created'] = date('Y-m-d:H:i:s');
                $insert['publish_status'] = "0";
                $insert['delete_status'] = "0";
                $result = $this->crud->insert_return_id($insert, $this->table);
                if ($result) {

                    $update['package_id'] = $this->input->post('package_id');
                    $update['review_id']= $result;
                    $this->crud->insert($update,'igc_package_review');
                    $data['success'] = "Your Review has been send successfully.";
                } else {
                    $data['error'] = "Unable to send the Review.";
                }

            }

        }



        $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator');
        $data['menu'] = '';
        $this->load->view('header', $data);
        $this->load->view('review/review_form');
        $this->load->view('footer');

    }


    public function detail($slug='')
    {

        $data['detail'] = $this->review->get_review_detail($slug);
        
        if(! empty($data['detail']))
        {
            $data['menu'] = '';
            $this->load->view('header', $data);
            $this->load->view('review/review_detail');
            $this->load->view('footer');
        }
        else{
            redirect('home');
        }

    }

    public function check_captcha($str)
    {

        if($str == $this->session->userdata('package_review_captcha'))
        {
            return TRUE;
        }
        else{
            $this->form_validation->set_message('check_captcha', 'The Captcha Code is Wrong.');
            return FALSE;
        }
    }

    public function captcha_setting()
    {
        $this->load->helper('captcha');

        $values = array(
            'word' => '',
            'word_length' => 4,
            'img_path' => 'captcha/review/',
            'img_url' => base_url() .'captcha/review/',
            'font_path' => base_url() . 'system/fonts/texb.ttf',

            'img_width' => '175',
            'img_height' => 55,
            'expiration' => 3600
        );
        $data = create_captcha($values);


        $this->session->set_userdata('package_review_captcha', $data['word']);

        echo $data['word'];

    }




}


    
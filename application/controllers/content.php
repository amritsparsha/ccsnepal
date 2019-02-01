<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Content extends CI_Controller{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('content_model','content');
        $this->load->library('form_validation');
        $this->load->model('crud_model','crud');

    }

    public  $table = "igc_content";
    public  $redirect = "content";
    public  $field_name = "content_url";
    public $language;

    public function detail($content_url='')
    {

        if($this->input->post())
        {
            $this->form_validation->set_rules('sender_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('sender_email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('message', 'Message', 'trim|required');
            $this->form_validation->set_rules('captcha_code', 'Captcha Code', 'trim|required|callback_check_captcha');
            $this->form_validation->set_rules('content_id', 'Hidden Field', 'trim|required');

            if ($this->form_validation->run()) {
                $content_url =  $this->input->post('content_url');
                $insert['sender_name'] = $this->input->post('sender_name');
                $insert['sender_email'] = $this->input->post('sender_email');
                $insert['message'] = $this->input->post('message');
                $insert['content_id'] = $this->input->post('content_id');
                $insert['comment_date'] = date('Y-m-d:H:i:s');
                $insert['approved_status'] = "0";
                $result = $this->crud_model->insert($insert, 'igc_content_comments');
                if ($result) {
                    $this->session->set_flashdata('success', "Your message has been send successfully.");
                    redirect($this->redirect.'/'.$content_url);
                } else {
                    $this->session->set_flashdata('error', "Unable to send your message.");
                    redirect($this->redirect.'/'.$content_url);
                }
            }

        }
        $data['scripts']= array('form_validator');
        $detail= $this->crud_model->get_active_not_deleted_detail($content_url, 'content_url', 'igc_content');
        $content_url= $detail['content_url'];
        $content_id = $detail['content_id'];
       
        if(empty($detail))
        {
            redirect('home');
        }

        $check_list = $this->content->get_term_list($content_id);
        if(!empty($check_list))
        {

            $data['destination']= $this->content->get_destination_list('0','100');
            $data['content']= $detail;
            $data['sub_title'] = $detail['content_page_title']." ";
            $data['meta_title'] = $detail['meta_title'];
            $data['meta_description'] = $detail['meta_description'];
            $data['meta_keywords'] = $detail['meta_keywords'];
            $data['menu'] = $content_url;
            $this->load->view('header', $data);
            $this->load->view('content/top-destination');
            $this->load->view('footer');
        }
        else{
            $data['content']= $detail;
            $data['sub_title'] = $detail['content_page_title']." ";
            $data['meta_title'] = $detail['meta_title'];
            $data['meta_description'] = $detail['meta_description'];
            $data['meta_keywords'] = $detail['meta_keywords'];
            $data['menu'] = $content_url;
            $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator');
            $this->load->view('header', $data);
            $this->load->view('content/page');
            $this->load->view('footer');

        }

    }


    public function service($content_url)
    {

        $detail= $this->crud_model->get_active_not_deleted_detail($content_url, 'content_url', 'igc_content');
        if(empty($detail))
        {
            redirect('home');
        }

        $data['services_offers']= $this->content->get_service_offer_list('0','100');
        $data['content']= $detail;
        $data['sub_title'] = $detail['content_page_title']." ";
        $data['meta_title'] = $detail['meta_title'];
        $data['meta_description'] = $detail['meta_description'];
        $data['meta_keywords'] = $detail['meta_keywords'];
        $data['menu'] = $content_url;
        $this->load->view('header', $data);
        $this->load->view('content/service-offer');
        $this->load->view('footer');

    }

     public function destination($content_url)
    {


        $detail= $this->crud_model->get_active_not_deleted_detail($content_url, 'content_url', 'igc_content');
        // print_r($detail);
        // exit;
        if(empty($detail))
        {
            redirect('home');
        }

        $data['destination']= $this->content->get_destination_list('0','100');
        $data['content']= $detail;
        $data['sub_title'] = $detail['content_page_title']." ";
        $data['meta_title'] = $detail['meta_title'];
        $data['meta_description'] = $detail['meta_description'];
        $data['meta_keywords'] = $detail['meta_keywords'];
        $data['menu'] = $content_url;
        $this->load->view('header', $data);
        $this->load->view('content/top-destination');
        $this->load->view('footer');

    }



    public function check_captcha($str)
    {

        if($str == $this->session->userdata('content_captcha'))
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
            'word_length' => 2,
            'img_path' => 'captcha/content/',
            'img_url' => base_url() .'captcha/content/',
            'font_path' => base_url() . 'system/fonts/texb.ttf',
            'font_size' => '300',
            'font_height' => 150,
            'img_width' => 175,
            'img_height' => 55,
            'expiration' => 3600
        );
        $data = create_captcha($values);


        $this->session->set_userdata('content_captcha', $data['word']);

        echo $data['word'];

    }


    public function plan()
    {
        $this->load->library('form_validation');

        if($this->input->post())
        {

            $this->form_validation->set_rules('country', 'Country', 'trim|required');
            $this->form_validation->set_rules('trip_type', 'Trip Type', 'trim|required');
            $this->form_validation->set_rules('start_date', 'Trip Start Date', 'trim|required');
            $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
            $this->form_validation->set_rules('price_range', 'Price Range', 'trim|required');
            $this->form_validation->set_rules('adult', 'Adult', 'trim|required');
            $this->form_validation->set_rules('child', 'Child', 'trim|required');
            $this->form_validation->set_rules('infant', 'Inafant', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('pcontact', 'Contact Number', 'trim|required');
            $this->form_validation->set_rules('captcha_code', 'Captcha Code', 'trim|required|callback_check_plan_captcha');


            if ($this->form_validation->run()) {
                $destinations =  $this->input->post('destination');
                $insert['trip_type'] = $this->input->post('trip_type');
                $insert['start_date'] = date("Y-m-d", strtotime($this->input->post('start_date')));
                $insert['end_date'] = date("Y-m-d", strtotime($this->input->post('end_date')));
                $insert['adult'] = $this->input->post('adult');
                $insert['child'] = $this->input->post('child');
                $insert['infant'] = $this->input->post('infant');
                $insert['full_name'] = $this->input->post('full_name');
                $insert['price_range'] = $this->input->post('price_range');
                $insert['contact_no'] = $this->input->post('pcontact');
                $insert['email'] = $this->input->post('email');
                $insert['country'] = $this->input->post('country');
                $insert['delete_status']="0";
                $result = $this->crud_model->insert_return_id($insert, 'igc_trip_quote');
                if ($result) {

                    if(! empty($destinations))
                    {
                        foreach ($destinations as $row => $value)
                        {
                            $inserts['destination_id'] =  $value;
                            $inserts['quote_id']= $result;
                            $this->crud_model->insert($inserts, 'igc_trip_plan_destination');
                        }
                    }
                    $this->session->set_flashdata('success', "Your message has been send successfully.");
                    redirect($this->redirect.'/'.'plan');
                } else {
                    $this->session->set_flashdata('error', "Unable to send your message.");
                    redirect($this->redirect.'/'.'plan');
                }
            }

        }
        $data['styles'] =  array('themes/css/jquery-ui');
        $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator','themes/js/jquery-ui.min');
        $this->load->view('header', $data);
        $this->load->view('content/holiday_plan');
        $this->load->view('footer');
    }



    public function plan_captcha_setting()
    {
        $this->load->helper('captcha');

        $values = array(
            'word' => '',
            'word_length' => 2,
            'img_path' => 'captcha/holiday_plan/',
            'img_url' => base_url() .'captcha/holiday_plan/',
            'font_path' => base_url() . 'system/fonts/texb.ttf',
            'font_size' => '300',
            'font_height' => 150,
            'img_width' => 175,
            'img_height' => 55,
            'expiration' => 3600
        );
        $data = create_captcha($values);


        $this->session->set_userdata('holiday_plan_captcha', $data['word']);

        echo $data['word'];

    }

    public function check_plan_captcha($str)
    {

        if($str == $this->session->userdata('holiday_plan_captcha'))
        {
            return TRUE;
        }
        else{
            $this->form_validation->set_message('check_plan_captcha', 'The Captcha Code is Wrong.');
            return FALSE;
        }
    }





}
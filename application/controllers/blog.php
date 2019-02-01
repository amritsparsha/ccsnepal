<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends CI_Controller{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('site_settings_model', 'settings');
        $this->load->model('content_model','content');


    }


    public function index($page=0)
    {
        if($page < 1) {
            $page = 1;
        }
        $per_page = 1;
        $startpoint = ($page * $per_page) - $per_page;
        $data['blogs']= $this->content->get_blogs($startpoint, $per_page);
        $data['total'] = $this->content->count_blogs();
        $data['per_page'] = $per_page;
        $data['base_url'] = site_url('blog/index/');
        $data['meta_title'] = $detail['meta_title'];
        $data['meta_description'] = $detail['meta_description'];
        $data['meta_keywords'] = $detail['meta_keywords'];
        $data['current_page'] = $page;
        $data['menu'] = '';
        $this->load->view('header', $data);
        $this->load->view('blog_list');
        $this->load->view('footer');
    }

    public function detail($slug)
    {
        if($this->input->post())
        {
            if($this->input->post())
            {
                $session_code = $this->session->userdata('blog_captcha');
                $captcha_code = $this->input->post('captcha_code');

                $remove_img = $session_code['time'].".jpg";


                $path = 'img/captcha/';

                @unlink($path.$remove_img);

                if($session_code['word'] == $captcha_code)
                {
                 $this->session->unset_userdata('blog_captcha');
                $insert['sender_name'] = $this->input->post('sender_name');
                $insert['sender_email'] = $this->input->post('sender_email');
                $insert['message'] = $this->input->post('message');
                $insert['content_id'] = $this->input->post('content_id');
                $insert['comment_date'] = date('Y-m-d:H:i:s');
                $insert['approved_status'] = "0";
                $result = $this->content->insert_comment($insert);
                if($result)
                {
                    $data['success']= "Your message has been send successfully.";
                }
                else{
                    $data['error']= "Unable to send the message.";
                }

                }
                else
                {
                    $data['error']= "Invalid Captcha.";
                }
            }
        }


        $data['scripts']= array('form_validator','validate');
        $detail= $this->content->get_page_detail($slug);
        $data['content'] = $detail;
        $data['menu'] = '';
        $data['sub_title'] = $detail['content_page_title']." "."-"." ";
        $data['meta_title'] = $detail['meta_title'];
        $data['meta_description'] = $detail['meta_description'];
        $data['meta_keywords'] = $detail['meta_keywords'];
        //setting for fb share
        $data['og_url']= 'blog/detail/'.$detail['content_url'];
        $data['og_title']= $detail['content_page_title'];
        $data['og_description']= substr($detail['content_body'],0,200);
        $data['og_image']= 'uploads/content/'.$detail['featured_img'];
        $data['sub_title']= $detail['content_page_title'] ." ";
        $this->load->view('header', $data);
        $this->load->view('blog_detail');
        $this->load->view('footer');
    }

    public function captcha_setting()
    {
        $this->load->helper('captcha');

        $values = array(
            'word' => '',
            'word_length' => 4,
            'img_path' => 'img/blog_captcha/',
            'img_url' => base_url() .'img/blog_captcha/',
            'font_path' => base_url() . 'system/fonts/texb.ttf',

            'img_width' => '175',
            'img_height' => 55,
            'expiration' => 3600
        );
        $data = create_captcha($values);


        $this->session->set_userdata('blog_captcha', $data);

        echo $data['image'];

    }
}
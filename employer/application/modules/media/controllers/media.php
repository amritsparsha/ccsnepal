<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Media extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();


    }


    public function index()
    {
        
        $data['title']= "Media";
        $this->load->view('header', $data);
        $this->load->view('media_list');
        $this->load->view('footer');
    }




}

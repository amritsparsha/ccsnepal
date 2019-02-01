<?php
class Form extends CI_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();

        // $this->load->model('package_model','package');


    }

    public function index()
    {
        $data['title']= "Package Form";
        $this->load->view('header', $data);
        $this->load->view('form');
        $this->load->view('footer');
    }
}
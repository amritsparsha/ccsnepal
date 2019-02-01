<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Forex extends CI_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('forex_model','forex');
    }

    public $table = "igc_forex_index";
    public $redirect = "forex";
    public $field_name = "forex_id";

    public function detail($forex_date)
    {

        if($this->input->post())
        {
            $forex_date= date("Y-m-d", strtotime($this->input->post('date')));
        }

        $data['records'] =  $this->forex->get_forex_rates($forex_date);
        $data['forex_date']= $forex_date;
        //code to load extra script in header
        $data['styles'] =  array('themes/css/jquery-ui');
        $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator','themes/js/jquery-ui.min');
        $this->load->view('header', $data);
        $this->load->view('forex/forex_detail');
        $this->load->view('footer');
    }
}
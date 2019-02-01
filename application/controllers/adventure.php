<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Adventure extends CI_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('adventure_model', 'adventure');


    }


    public function index()
    {


        $data['records'] = $this->adventure->get_adventures();
       // $data['total'] = $this->adventure->count_adventures();
        $data['sub_title'] =  "Adventure Sports"." ";
        $this->load->view('header', $data);
        $this->load->view('adventure/adventure_list');
        $this->load->view('footer');
    }

    public function detail($slug)
    {
        $data['detail'] =  $this->crud_model->get_active_not_deleted_detail($slug, 'activity_url', 'igc_activity');

        if(empty($data['detail'])){
            redirect('adventure/index');
        }

        $data['packages'] =  $this->adventure->get_related_packages($data['detail']['activity_id']);
        $data['sub_title'] =  $data['detail']['activity_name']." ";

        $this->load->view('header', $data);
        $this->load->view('adventure/adventure_detail');
        $this->load->view('footer');

    }
}

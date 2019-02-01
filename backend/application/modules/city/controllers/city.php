<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class City extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'tbl_cities';
        $data['city'] = $this->crud->get_not_deleted($table);
        $data['title']= "City List";
        $this->load->view('header', $data);
        $this->load->view('city_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $city_id = $this->input->post('city_id');
            $insert['city_name'] = $this->input->post('city_name');
            $insert['city_detail'] = $this->input->post('city_detail');
            $insert['state_id'] = $this->input->post('state_id');
            $insert['publish_status'] = $this->input->post('publish_status');

            if($city_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'tbl_cities';

                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New City has been added.');
                    redirect('city');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new City.');
                    redirect('city');
                }

            }
        else{

            $insert['updated'] = date('Y-m-d:H:i:s');

            $table = 'tbl_cities';
            $field_name = "city_id";
            $result = $this->crud->update($city_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','City has been updated.');
                redirect('city');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the City.');
                redirect('city');
            }

        }


        }
        $table = 'tbl_cities';
        $field_name = "city_id";
        $data['city'] = $this->crud->get_detail($id, $field_name, $table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit City";
        $this->load->view('header', $data);
        $this->load->view('city_form');
        $this->load->view('footer');
    }



    


    //function to delete Organization

    public function city_delete($city_id)
    {
        $table = 'tbl_cities';
        $field_name = "city_id";
        $result = $this->crud->soft_delete($city_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','City has been deleted.');
            redirect('city');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the City.');
            redirect('city');
        }

    }





}


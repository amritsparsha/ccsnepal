<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class State extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'tbl_state';
        $data['state'] = $this->crud->get_not_deleted($table);
        $data['title']= "City List";
        $this->load->view('header', $data);
        $this->load->view('state_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $state_id = $this->input->post('state_id');
            $insert['state_name'] = $this->input->post('state_name');
            $insert['state_detail'] = $this->input->post('state_detail');
            $insert['publish_status'] = $this->input->post('publish_status');

            if($state_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'tbl_state';

                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New City has been added.');
                    redirect('state');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new City.');
                    redirect('state');
                }

            }
        else{

            $insert['updated'] = date('Y-m-d:H:i:s');

            $table = 'tbl_state';
            $field_name = "state_id";
            $result = $this->crud->update($state_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','City has been updated.');
                redirect('state');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the City.');
                redirect('state');
            }

        }


        }
        $table = 'tbl_state';
        $field_name = "state_id";
        $data['state'] = $this->crud->get_detail($id, $field_name, $table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit State";
        $this->load->view('header', $data);
        $this->load->view('state_form');
        $this->load->view('footer');
    }



    


    //function to delete Organization

    public function state_delete($state_id)
    {
        $table = 'tbl_state';
        $field_name = "state_id";
        $result = $this->crud->soft_delete($state_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','City has been deleted.');
            redirect('state');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the City.');
            redirect('state');
        }

    }





}


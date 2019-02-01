<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Joblevel extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'tbl_joblevel';
        $data['joblevel'] = $this->crud->get_all($table);
        $data['title']= "Job Level List";
        $this->load->view('header', $data);
        $this->load->view('joblevel_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $joblevel_id = $this->input->post('joblevel_id');
            $insert['joblevel'] = $this->input->post('joblevel');
            $insert['joblevel_detail'] = $this->input->post('joblevel_detail');
            $insert['publish_status'] = $this->input->post('publish_status');

            if($joblevel_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'tbl_joblevel';

                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New Job Level has been added.');
                    redirect('joblevel');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new Job Level.');
                    redirect('joblevel');
                }

            }
        else{

            $insert['updated'] = date('Y-m-d:H:i:s');

            $table = 'tbl_joblevel';
            $field_name = "joblevel_id";
            $result = $this->crud->update($joblevel_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','Job Level has been updated.');
                redirect('joblevel');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the Job Level.');
                redirect('joblevel');
            }

        }


        }
        $table = 'tbl_joblevel';
        $field_name = "joblevel_id";
        $data['joblevel'] = $this->crud->get_detail($id, $field_name, $table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit Job Level";
        $this->load->view('header', $data);
        $this->load->view('joblevel_form');
        $this->load->view('footer');
    }



    


    //function to delete Organization

    public function joblevel_delete($joblevel_id)
    {
        $table = 'tbl_joblevel';
        $field_name = "joblevel_id";
        $result = $this->crud->delete($joblevel_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','Level has been deleted.');
            redirect('joblevel');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Level.');
            redirect('joblevel');
        }

    }





}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jobtype extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'tbl_jobtype';
        $data['jobtype'] = $this->crud->get_all($table);
        $data['title']= "Job Type List";
        $this->load->view('header', $data);
        $this->load->view('jobtype_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $comem_id = $this->input->post('comem_id');
            $insert['jobtype'] = $this->input->post('jobtype');
            $insert['jobtype_detail'] = $this->input->post('jobtype_detail');
            $insert['publish_status'] = $this->input->post('publish_status');

            if($comem_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'tbl_jobtype';

                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New Organization size has been added.');
                    redirect('jobtype');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new Organization size.');
                    redirect('jobtype');
                }

            }
        else{

            $insert['updated'] = date('Y-m-d:H:i:s');

            $table = 'tbl_jobtype';
            $field_name = "comem_id";
            $result = $this->crud->update($comem_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','Organization size has been updated.');
                redirect('jobtype');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the Organization size.');
                redirect('jobtype');
            }

        }


        }
        $table = 'tbl_jobtype';
        $field_name = "comem_id";
        $data['jobtype'] = $this->crud->get_detail($id, $field_name, $table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit Job Type";
        $this->load->view('header', $data);
        $this->load->view('jobtype_form');
        $this->load->view('footer');
    }



    


    //function to delete Organization

    public function jobtype_delete($comem_id)
    {
        $table = 'tbl_jobtype';
        $field_name = "comem_id";
        $result = $this->crud->delete($comem_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','Size has been deleted.');
            redirect('jobtype');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Size.');
            redirect('jobtype');
        }

    }





}


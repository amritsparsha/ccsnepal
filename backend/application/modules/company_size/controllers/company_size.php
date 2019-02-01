<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class company_size extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'tbl_company_size';
        $data['company_size'] = $this->crud->get_all($table);
        $data['title']= "Company Size List";
        $this->load->view('header', $data);
        $this->load->view('company_size_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $comem_id = $this->input->post('comem_id');
            $insert['company_size'] = $this->input->post('company_size');
            $insert['company_size_detail'] = $this->input->post('company_size_detail');
            $insert['publish_status'] = $this->input->post('publish_status');

            if($comem_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'tbl_company_size';

                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New Organization size has been added.');
                    redirect('company_size');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new Organization size.');
                    redirect('company_size');
                }

            }
        else{

            $insert['updated'] = date('Y-m-d:H:i:s');

            $table = 'tbl_company_size';
            $field_name = "comem_id";
            $result = $this->crud->update($comem_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','Organization size has been updated.');
                redirect('company_size');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the Organization size.');
                redirect('company_size');
            }

        }


        }
        $table = 'tbl_company_size';
        $field_name = "comem_id";
        $data['company_size'] = $this->crud->get_detail($id, $field_name, $table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit Organization Size";
        $this->load->view('header', $data);
        $this->load->view('company_size_form');
        $this->load->view('footer');
    }



    


    //function to delete Organization

    public function company_size_delete($comem_id)
    {
        $table = 'tbl_company_size';
        $field_name = "comem_id";
        $result = $this->crud->delete($comem_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','Size has been deleted.');
            redirect('company_size');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Size.');
            redirect('company_size');
        }

    }





}


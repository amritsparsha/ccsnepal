<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Organization_nature extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'tbl_org_nature';
        $data['org_nat'] = $this->crud->get_all($table);
        $data['title']= "Organization Nature List";
        $this->load->view('header', $data);
        $this->load->view('organization_nature_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $org_nature_id = $this->input->post('org_nature_id');
            $insert['org_nature_title'] = $this->input->post('org_nature_title');
            $insert['org_nature_detail'] = $this->input->post('org_nature_detail');
            $insert['publish_status'] = $this->input->post('publish_status');

            if($org_nature_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'tbl_org_nature';

                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New Organization Nature has been added.');
                    redirect('Organization_nature');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new Organization Nature.');
                    redirect('Organization_nature');
                }

            }
        else{

            $insert['updated'] = date('Y-m-d:H:i:s');

            $table = 'tbl_org_nature';
            $field_name = "org_nature_id";
            $result = $this->crud->update($org_nature_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','Organization Nature has been updated.');
                redirect('Organization_nature');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the Organization Nature.');
                redirect('Organization_nature');
            }

        }


        }
        $table = 'tbl_org_nature';
        $field_name = "org_nature_id";
        $data['org_nat'] = $this->crud->get_detail($id, $field_name, $table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit Organization Nature";
        $this->load->view('header', $data);
        $this->load->view('organization_nature_form');
        $this->load->view('footer');
    }



    


    //function to delete Organization

    public function org_nature_delete($org_nature_id)
    {
        $table = 'tbl_org_nature';
        $field_name = "org_nature_id";
        $result = $this->crud->delete($org_nature_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','Organization Nature has been deleted.');
            redirect('Organization_nature');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Organization Nature.');
            redirect('Organization_nature');
        }

    }





}


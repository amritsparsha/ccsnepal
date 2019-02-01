<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Company_ownership extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'tbl_company_ownership';
        $data['company_ownership'] = $this->crud->get_all($table);
        $data['title']= "Ownership Type List";
        $this->load->view('header', $data);
        $this->load->view('company_ownership_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $como_id = $this->input->post('como_id');
            $insert['company_ownership'] = $this->input->post('company_ownership');
            $insert['company_ownership_detail'] = $this->input->post('company_ownership_detail');
            $insert['publish_status'] = $this->input->post('publish_status');
            $folder_path = '../uploads/company_ownership/';
            $rand = md5(rand());
            $featuredimg= $rand. str_replace(" ","",$_FILES['featured_img']['name']);
            $featuredimgtmp=$_FILES['featured_img']['tmp_name'];


            if($como_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'tbl_company_ownership';
                if($_FILES['featured_img']['name'] !="")
                {
                    $insert['featured_img']= $featuredimg;

                        move_uploaded_file($featuredimgtmp,$folder_path.$featuredimg);

                }
                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New Ownership has been added.');
                    redirect('company_ownership');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new Ownership.');
                    redirect('company_ownership');
                }

            }
        else{

            $insert['updated'] = date('Y-m-d:H:i:s');
            if($_FILES['featured_img']['name'] !="")
                {
                    $pre_featured_img = $this->input->post('pre_featuredimg');

                    @unlink($folder_path.$pre_featured_img);

                    $insert['featured_img']= $featuredimg;

                    move_uploaded_file($featuredimgtmp,$folder_path.$featuredimg);

                }
            $table = 'tbl_company_ownership';
            $field_name = "como_id";
            $result = $this->crud->update($como_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','Ownership has been updated.');
                redirect('company_ownership');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the Ownership.');
                redirect('company_ownership');
            }

        }


        }
        $table = 'tbl_company_ownership';
        $field_name = "como_id";
        $data['company_ownership'] = $this->crud->get_detail($id, $field_name, $table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit Ownership";
        $this->load->view('header', $data);
        $this->load->view('company_ownership_form');
        $this->load->view('footer');
    }



    


    //function to delete Ownership

    public function company_ownership_delete($como_id)
    {
        $table = 'tbl_company_ownership';
        $field_name = "como_id";
        $result = $this->crud->delete($como_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','Ownership has been deleted.');
            redirect('company_ownership');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Ownership.');
            redirect('company_ownership');
        }

    }





}


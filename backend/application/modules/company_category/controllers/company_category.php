<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Company_category extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'tbl_company_category';
        $data['company_category'] = $this->crud->get_all($table);
        $data['title']= "Company Category List";
        $this->load->view('header', $data);
        $this->load->view('company_category_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $comc_id = $this->input->post('comc_id');
            $insert['company_category'] = $this->input->post('company_category');
            $insert['company_category_detail'] = $this->input->post('company_category_detail');
            $insert['publish_status'] = $this->input->post('publish_status');
            $folder_path = '../uploads/company_category/';
            $rand = md5(rand());
            $featuredimg= $rand. str_replace(" ","",$_FILES['featured_img']['name']);
            $featuredimgtmp=$_FILES['featured_img']['tmp_name'];


            if($comc_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'tbl_company_category';
                if($_FILES['featured_img']['name'] !="")
                {
                    $insert['featured_img']= $featuredimg;

                        move_uploaded_file($featuredimgtmp,$folder_path.$featuredimg);

                }
                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New Category has been added.');
                    redirect('company_category');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new Category.');
                    redirect('company_category');
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
            $table = 'tbl_company_category';
            $field_name = "comc_id";
            $result = $this->crud->update($comc_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','Category has been updated.');
                redirect('company_category');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the Category.');
                redirect('company_category');
            }

        }


        }
        $table = 'tbl_company_category';
        $field_name = "comc_id";
        $data['company_category'] = $this->crud->get_detail($id, $field_name, $table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit Category";
        $this->load->view('header', $data);
        $this->load->view('company_category_form');
        $this->load->view('footer');
    }



    


    //function to delete category

    public function company_category_delete($comc_id)
    {
        $table = 'tbl_company_category';
        $field_name = "comc_id";
        $result = $this->crud->delete($comc_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','Category has been deleted.');
            redirect('company_category');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Category.');
            redirect('company_category');
        }

    }





}


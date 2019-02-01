<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'tbl_company_employers';
        $data['contact'] = $this->crud->get_where($table,array("company_type"=>"0",'delete_status'=>'0','publish_status'=>'1','active_status'=>'Y'));
        $data['title']= "Contact List";
        $this->load->view('header', $data);
        $this->load->view('contact_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    // public function form($id=0)
    // {
    //     if($this->input->post())
    //     {
    //         $contact_id = $this->input->post('contact_id');
    //         $insert['full_name'] = $this->input->post('full_name');
    //         $insert['company_name'] = $this->input->post('company_name');
    //         $insert['email'] = $this->input->post('email');
    //         $insert['phone'] = $this->input->post('phone');
    //         $insert['designation'] = $this->input->post('designation');
    //         $insert['contact_address'] = $this->input->post('contact_address');
    //         $insert['date'] = $this->input->post('date');
    //         $insert['type'] = $this->input->post('type');
    //         $insert['contact_detail'] = $this->input->post('contact_detail');
    //          $folder_path = '../uploads/contacts/';
    //         $rand = md5(rand());
    //         $featuredimg= $rand. str_replace(" ","",$_FILES['featured_img']['name']);
    //         $featuredimgtmp=$_FILES['featured_img']['tmp_name'];


    //         if($contact_id =="")
    //         {
    //             $insert['created'] = date('Y-m-d:H:i:s');
    //             $table = 'igc_contact';
    //             if($_FILES['featured_img']['name'] !="")
    //             {
    //                 $insert['featured_img']= $featuredimg;

    //                     move_uploaded_file($featuredimgtmp,$folder_path.$featuredimg);

    //             }
    //             $result = $this->crud->insert($insert,$table);
    //             if($result)
    //             {

    //                 $this->session->set_flashdata('success','New contact has been added.');
    //                 redirect('contact');
    //             }
    //             else{
    //                 $this->session->set_flashdata('error','Unable to add new contact.');
    //                 redirect('contact');
    //             }

    //         }
    //     else{

    //         $insert['updated'] = date('Y-m-d:H:i:s');
    //         if($_FILES['featured_img']['name'] !="")
    //             {
    //                 $pre_featured_img = $this->input->post('pre_featuredimg');

    //                 @unlink($folder_path.$pre_featured_img);

    //                 $insert['featured_img']= $featuredimg;

    //                 move_uploaded_file($featuredimgtmp,$folder_path.$featuredimg);

    //             }
    //         $table = 'igc_contact';
    //         $field_name = "contact_id";
    //         $result = $this->crud->update($contact_id, $field_name, $insert, $table);
    //         if($result)
    //         {

    //             $this->session->set_flashdata('success','contact has been updated.');
    //             redirect('contact');
    //         }
    //         else{
    //             $this->session->set_flashdata('error','Unable to update the contact.');
    //             redirect('contact');
    //         }

    //     }


    //     }
    //     $table = 'igc_contact';
    //     $field_name = "contact_id";
    //     $data['contact'] = $this->crud->get_detail($id, $field_name, $table);
    //     $data['scripts'] = array('themes/js/form-validator');
    //     $data['script'] ="form_validator";
    //     $data['title']= "Add/Edit contact";
    //     $this->load->view('header', $data);
    //     $this->load->view('contact_form');
    //     $this->load->view('footer');
    // }



    


    // //function to delete category

    // public function contact_delete($contact_id)
    // {
    //     $table = 'igc_contact';
    //     $field_name = "contact_id";
    //     $result = $this->crud->delete($contact_id, $field_name, $table);
    //     if($result)
    //     {
    //         $this->session->set_flashdata('success','contact has been deleted.');
    //         redirect('contact');
    //     }
    //     else{
    //         $this->session->set_flashdata('error','Unable to delete the contact.');
    //         redirect('contact');
    //     }

    // }





}


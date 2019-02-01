<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Language extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'igc_language';
        $data['languages'] = $this->crud->get_all($table);
        $data['title']= "Language List";
        $this->load->view('header', $data);
        $this->load->view('language_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $language_id = $this->input->post('language_id');
            $insert['language'] = $this->input->post('language');
            $insert['language_detail'] = $this->input->post('language_detail');
            $insert['publish_status'] = $this->input->post('publish_status');

            if($language_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'igc_language';

                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New Language has been added.');
                    redirect('language');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new Language.');
                    redirect('language');
                }

            }
        else{

            $insert['updated'] = date('Y-m-d:H:i:s');

            $table = 'igc_language';
            $field_name = "language_id";
            $result = $this->crud->update($language_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','Language has been updated.');
                redirect('language');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the Language.');
                redirect('language');
            }

        }


        }
        $table = 'igc_language';
        $field_name = "language_id";
        $data['language'] = $this->crud->get_detail($id, $field_name, $table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit Language";
        $this->load->view('header', $data);
        $this->load->view('language_form');
        $this->load->view('footer');
    }



    


    //function to delete Organization

    public function language_delete($language_id)
    {
        $table = 'igc_language';
        $field_name = "language_id";
        $result = $this->crud->delete($language_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','language has been deleted.');
            redirect('language');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the language.');
            redirect('language');
        }

    }





}


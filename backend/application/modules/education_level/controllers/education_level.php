<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Education_level extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'igc_education_level';
        $data['education'] = $this->crud->get_all($table);
        $data['title']= "Education Level List";
        $this->load->view('header', $data);
        $this->load->view('education_level_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $education_level_id = $this->input->post('education_level_id');

            $insert['education_level'] = $this->input->post('education_level');
            $insert['education_level_detail'] = $this->input->post('education_level_detail');
            $insert['publish_status'] = $this->input->post('publish_status');


            if($education_level_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'igc_education_level';
                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New Education Level has been added.');
                    redirect('education_level');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new Education Level.');
                    redirect('education_level');
                }

            }
        else{

            $insert['updated'] = date('Y-m-d:H:i:s');
            $table = 'igc_education_level';
            $field_name = "education_level_id";
            $result = $this->crud->update($education_level_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','Education Level has been updated.');
                redirect('education_level');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the Education Level.');
                redirect('education_level');
            }

        }


        }
        $table = 'igc_education_level';
        $field_name = "education_level_id";
        $data['education'] = $this->crud->get_detail($id, $field_name, $table);
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit Education Level";
        $this->load->view('header', $data);
        $this->load->view('education_level_form');
        $this->load->view('footer');
    }



    


    //function to delete category

    public function education_level_delete($education_level_id)
    {
        $table = 'igc_education_level';
        $field_name = "education_level_id";
        $result = $this->crud->delete($education_level_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','Education Level has been deleted.');
            redirect('currency');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Education Level.');
            redirect('currency');
        }

    }





}


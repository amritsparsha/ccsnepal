<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jobs extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'tbl_job_post_all';
        $data['jobs'] = $this->crud->get_where($table,array('employer_ref'=>$this->session->userdata('admin_id'),'delete_status'=>'0'));
        $data['title']= "Jobs List";
        $this->load->view('header', $data);
        $this->load->view('jobs_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $job_id = $this->input->post('job_id');
            $insert['admin_ref'] = '0';
            $insert['employer_ref'] = $this->session->userdata('admin_id');
        // 1-basic job information
            $insert['job_title'] = $this->input->post('job_title');
            $insert['job_type'] = $this->input->post('job_type');
            $insert['No_vacancy'] = $this->input->post('No_vacancy');
            $insert['job_level'] = $this->input->post('job_level');
            $insert['job_category'] = $this->input->post('job_category');
            $insert['job_sub_category'] = $this->input->post('job_sub_category');
            $insert['availability_for'] = $this->input->post('availability_for');
            $insert['deadline'] = $this->input->post('deadline');
            $insert['job_location'] = $this->input->post('job_location');
            $insert['salary_type'] = $this->input->post('salary_type');
            $insert['min_currency_type'] = $this->input->post('min_currency_type');
            $insert['min_amount'] = $this->input->post('min_amount');
            $insert['salary_basis'] = $this->input->post('salary_basis');
            $insert['max_currency_type'] = $this->input->post('max_currency_type');
            $insert['max_amount'] = $this->input->post('max_amount');
        // 2-Job Specifictation
            $insert['pref_edu'] = $this->input->post('pref_edu');
            $insert['edu_program'] = $this->input->post('edu_program');
            $insert['require_edu'] = $this->input->post('require_edu');
            $insert['require_exp'] = $this->input->post('require_exp');
            $insert['exp_lt'] = $this->input->post('exp_lt');
            $insert['exp_year'] = $this->input->post('exp_year');
            $insert['require_skill'] = $this->input->post('require_skill');
            $insert['skill_req_set'] = $this->input->post('skill_req_set');
            $insert['job_specification'] = $this->input->post('job_specification');
        // 3-Job Description
            $insert['customize_jd'] = $this->input->post('customize_jd');
            $insert['description'] = $this->input->post('description');
        // 4-Vacancy Settings
            $insert['apply_online'] = $this->input->post('apply_online');
            $insert['apply_alternative'] = $this->input->post('apply_alternative');
            $insert['gender_sp'] = $this->input->post('gender_sp');
            $insert['gender'] = $this->input->post('gender');
            $insert['age_sp'] = $this->input->post('age_sp');
            $insert['age_lt'] = $this->input->post('age_lt');
            $insert['age_group'] = $this->input->post('age_group');
            $insert['show_og_name'] = $this->input->post('show_og_name');
            $insert['og_alt_name'] = $this->input->post('og_alt_name');
            $insert['og_alt_description'] = $this->input->post('og_alt_description');
            $insert['og_alt_name'] = $this->input->post('og_alt_name');
        // 6-set Auto Responder
            $insert['auto_res_status'] = $this->input->post('auto_res_status');
            $insert['email_template'] = $this->input->post('email_template');
        // 7-publish
            $insert['publish_status'] = $this->input->post('publish_status');
            $insert['super_publish_status'] = '0';

            if($job_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'tbl_job_post_all';

                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New Job Post has been added.');
                    redirect('jobs');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new Job Post.');
                    redirect('jobs');
                }

            }
        else{

            $insert['updated'] = date('Y-m-d:H:i:s');

            $table = 'tbl_job_post_all';
            $field_name = "job_id";
            $result = $this->crud->update($job_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','New Job Post has been updated.');
                redirect('jobs');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the New Job Post.');
                redirect('jobs');
            }

        }


        }
        $table = 'tbl_job_post_all';
        $field_name = "job_id";

        $data['jobs'] = $this->crud->get_detail($id, $field_name, $table);
        $data['job_types']=$this->crud->get_where("tbl_jobtype",array("delete_status"=>"0","publish_status"=>"1"));
        $data['job_levels']=$this->crud->get_where("tbl_joblevel",array("delete_status"=>"0","publish_status"=>"1"));
        $data['currencies']=$this->crud->get_where("igc_currency_setting",array("delete_status"=>"0","publish_status"=>"1"));
        $data['education_levels']=$this->crud->get_where("igc_education_level",array("delete_status"=>"0","publish_status"=>"1"));
        $data['job_category']=$this->crud->get_where("tbl_company_category",array("delete_status"=>"0","publish_status"=>"1"));
        

        $data['scripts'] = array('themes/js/form-validator');
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit Jobs";
        $this->load->view('header', $data);
        $this->load->view('jobs_form');
        $this->load->view('footer');
    }



    


    //function to delete Organization

    public function jobs_delete($job_id)
    {
        $table = 'tbl_job_post_all';
        $field_name = "job_id";
        $result = $this->crud->delete($job_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','Job Post has been deleted.');
            redirect('jobs');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Job Post.');
            redirect('jobs');
        }

    }
}


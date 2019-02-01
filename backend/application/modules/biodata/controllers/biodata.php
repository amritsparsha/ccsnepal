<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Biodata extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'tbl_biodata_all';
        $data['biodata'] = $this->crud->get_all($table);
        $data['title']= "Biodata List";
        $this->load->view('header', $data);
        $this->load->view('biodata_list');
        $this->load->view('footer');
    }
    public function biodata_detail($id)
    {
        $table = 'tbl_biodata_all';
        $data['biodata'] = $this->crud->get_detail($id,"biodata_id",$table);
        $data['title']= "Biodata Deatils";
        //$this->load->view('header', $data);
        $this->load->view('biodata_view_detail',$data);
        //$this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $biodata_id = $this->input->post('biodata_id');
        // 1-basic job preference
            $insert['job_category'] = $this->input->post('job_category');
            $insert['job_level'] = $this->input->post('job_level');
            $insert['availability_for'] = $this->input->post('availability_for');
            $insert['specialization'] = $this->input->post('specialization');
            $insert['skill'] = $this->input->post('skill');
            $insert['exp_currency_type'] = $this->input->post('exp_currency_type');
            $insert['exp_ref'] = $this->input->post('exp_ref');
            $insert['exp_amount'] = $this->input->post('exp_amount');
            $insert['exp_salary_basis'] = $this->input->post('exp_salary_basis');
            $insert['cur_currency_type'] = $this->input->post('cur_currency_type');
            $insert['cur_ref'] = $this->input->post('cur_ref');
            $insert['cur_amount'] = $this->input->post('cur_amount');
            $insert['cur_salary_basis'] = $this->input->post('cur_salary_basis');
            $insert['career_obj_summary'] = $this->input->post('career_obj_summary');
            $insert['job_location'] = $this->input->post('job_location');
        // 2-Job Basic Informations
            $insert['name'] = $this->input->post('name');
            $insert['gender'] = $this->input->post('gender');
            $insert['dob'] = $this->input->post('dob');
            $insert['marital_status'] = $this->input->post('marital_status');
            $insert['religion'] = $this->input->post('religion');
            $insert['country'] = $this->input->post('country');
            $insert['cur_address'] = $this->input->post('cur_address');
            $insert['per_address'] = $this->input->post('per_address');
            $insert['ref_number'] = $this->input->post('ref_number');
            $insert['contact_number'] = $this->input->post('contact_number');
        // 3-Education
              
        if(!empty($this->input->post('education_level')))
        {
               $insert['education_level']=implode("***",$this->input->post('education_level'));
               $insert['edu_program']=implode("***",$this->input->post('edu_program'));
               $insert['edu_board']=implode("***",$this->input->post('edu_board'));
               $insert['edu_institute']=implode("***",$this->input->post('edu_institute'));
               $insert['edu_cur_std']=implode("***",$this->input->post('edu_cur_std'));
               $insert['marks_ref']=implode("***",$this->input->post('marks_ref'));
               $insert['marks']=implode("***",$this->input->post('marks'));
               $insert['grad_year']=implode("***",$this->input->post('grad_year'));
               $insert['grad_month']=implode("***",$this->input->post('grad_month'));
               $insert['start_year']=implode("***",$this->input->post('start_year'));
               $insert['start_month']=implode("***",$this->input->post('start_month'));
        }
        // 4-Training
        if(!empty($this->input->post('training_name')))
        {
               $insert['training_name']=implode("***",$this->input->post('training_name'));
               $insert['institution_name']=implode("***",$this->input->post('institution_name'));
               $insert['duration']=implode("***",$this->input->post('duration'));
               $insert['duration_basis']=implode("***",$this->input->post('duration_basis'));
               $insert['comp_year']=implode("***",$this->input->post('comp_year'));
               $insert['comp_month']=implode("***",$this->input->post('comp_month'));
        }
        // 5-Work Experience
        if(!empty($this->input->post('org_name')))
        {
               $insert['org_name']=implode("***",$this->input->post('org_name'));
               $insert['org_nature']=implode("***",$this->input->post('org_nature'));
               $insert['exp_job_location']=implode("***",$this->input->post('exp_job_location'));
               $insert['exp_job_title']=implode("***",$this->input->post('exp_job_title'));
               $insert['exp_job_category']=implode("***",$this->input->post('exp_job_category'));
               $insert['exp_job_level']=implode("***",$this->input->post('exp_job_level'));
               $insert['exp_cur_work']=implode("***",$this->input->post('exp_cur_work'));
               $insert['exp_start_year']=implode("***",$this->input->post('exp_start_year'));
               $insert['exp_start_month']=implode("***",$this->input->post('exp_start_month'));
               $insert['exp_end_year']=implode("***",$this->input->post('exp_end_year'));
               $insert['exp_end_month']=implode("***",$this->input->post('exp_end_month'));
               $insert['exp_duties']=implode("***",$this->input->post('exp_duties'));
        }
         // 5-Work Experience
        if(!empty($this->input->post('language')))
        {
               $insert['language']=implode("***",$this->input->post('language'));
                  $read_rating=array();
                  $write_rating=array();
                  $speak_rating=array();
                  $listen_rating=array();
                for($i=0;$i<count($this->input->post('language'));$i++)
                {
                   $read_rating[]=$this->input->post('read_rating'.$i);
                   $write_rating[]=$this->input->post('write_rating'.$i);
                   $speak_rating[]=$this->input->post('speak_rating'.$i);
                   $listen_rating[]=$this->input->post('listen_rating'.$i);
                }
                 $insert['read_rating']=implode("***",$read_rating);
                 $insert['write_rating']=implode("***",$write_rating);
                 $insert['speak_rating']=implode("***",$speak_rating);
                 $insert['listen_rating']=implode("***",$listen_rating);
        }
        // 7-Social Accounts
        if(!empty($this->input->post('account_name')))
        {
               $insert['account_name']=implode("***",$this->input->post('account_name'));
               $insert['account_url']=implode("***",$this->input->post('account_url'));
        }
        // 8-Reference
        if(!empty($this->input->post('reference_name')))
        {
               $insert['reference_name']=implode("***",$this->input->post('reference_name'));
               $insert['ref_job_title']=implode("***",$this->input->post('ref_job_title'));
               $insert['ref_org_name']=implode("***",$this->input->post('ref_org_name'));
               $insert['ref_email']=implode("***",$this->input->post('ref_email'));
               $insert['ref_cont_place1']=implode("***",$this->input->post('ref_cont_place1'));
               $insert['ref_contact1']=implode("***",$this->input->post('ref_contact1'));
               $insert['ref_cont_place2']=implode("***",$this->input->post('ref_cont_place2'));
               $insert['ref_contact2']=implode("***",$this->input->post('ref_contact2'));
               $insert['ref_cont_place3']=implode("***",$this->input->post('ref_cont_place3'));
               $insert['ref_contact3']=implode("***",$this->input->post('ref_contact3'));
         }
         // 9-Other Information
               $insert['t_out_location']=$this->input->post('t_out_location');
               $insert['relocate_out_location']=$this->input->post('relocate_out_location');
               $insert['license_w2']=$this->input->post('license_w2');
               $insert['license_w4']=$this->input->post('license_w4');
               $insert['own_w2']=$this->input->post('own_w2');
               $insert['own_w4']=$this->input->post('own_w4');
        // 10-publish
                $insert['publish_status'] = $this->input->post('publish_status');

                $rand = md5(rand());
                $featuredimg=$rand. str_replace(" ","",$_FILES['featured_img']['name']);
                $featuredimgtmp=$_FILES['featured_img']['tmp_name'];

            $path = '../uploads/biodata/';
        //insert
            if($biodata_id =="")
            {
                $insert['featured_img']= $featuredimg;
                move_uploaded_file($featuredimgtmp,$path.$featuredimg);

                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'tbl_biodata_all';

                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New Biodata has been added.');
                    redirect('biodata');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new Biodata.');
                    redirect('biodata');
                }

            }
        //update
        else{
               $featuredimg_new = $_FILES['featured_img']['name'];

                if($featuredimg_new !="")
                {
                    $pre_featuredimg = $this->input->post('pre_featured_img');
                    @unlink($path.$pre_featuredimg);
                    move_uploaded_file($featuredimgtmp,$path.$featuredimg);
                    
                    $insert['featured_img'] = $featuredimg;

                }

               $insert['updated'] = date('Y-m-d:H:i:s');

               $extra['education_level']=null;
               $extra['edu_program']=null;
               $extra['edu_board']=null;
               $extra['edu_institute']=null;
               $extra['edu_cur_std']=null;
               $extra['marks_ref']=null;
               $extra['marks']=null;
               $extra['grad_year']=null;
               $extra['grad_month']=null;
               $extra['start_year']=null;
               $extra['start_month']=null;

               $extra['training_name']=null;
               $extra['institution_name']=null;
               $extra['duration']=null;
               $extra['duration_basis']=null;
               $extra['comp_year']=null;
               $extra['comp_month']=null;

               $extra['org_name']=null;
               $extra['org_nature']=null;
               $extra['exp_job_location']=null;
               $extra['exp_job_title']=null;
               $extra['exp_job_category']=null;
               $extra['exp_job_level']=null;
               $extra['exp_cur_work']=null;
               $extra['exp_start_year']=null;
               $extra['exp_start_month']=null;
               $extra['exp_end_year']=null;
               $extra['exp_end_month']=null;
               $extra['exp_duties']=null;

               $extra['read_rating']=null;
               $extra['write_rating']=null;
               $extra['speak_rating']=null;
               $extra['listen_rating']=null;
               
               $extra['account_name']=null;
               $extra['account_url']=null;

               $extra['reference_name']=null;
               $extra['ref_job_title']=null;
               $extra['ref_org_name']=null;
               $extra['ref_email']=null;
               $extra['ref_cont_place1']=null;
               $extra['ref_contact1']=null;
               $extra['ref_cont_place2']=null;
               $extra['ref_contact2']=null;
               $extra['ref_cont_place3']=null;
               $extra['ref_contact3']=null;

            $table = 'tbl_biodata_all';
            $field_name = "biodata_id";
            $this->crud->update($biodata_id, $field_name, $extra, $table);
            $result = $this->crud->update($biodata_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','New Biodata has been updated.');
                redirect('biodata');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the New Biodata.');
                redirect('biodata');
            }

        }


        }
        $table = 'tbl_biodata_all';
        $field_name = "biodata_id";

        $data['jobs'] = $this->crud->get_detail($id, $field_name, $table);

        $data['job_categories']=$this->crud->get_where("tbl_company_category",array("delete_status"=>"0","publish_status"=>"1"));
        $data['job_levels']=$this->crud->get_where("tbl_joblevel",array("delete_status"=>"0","publish_status"=>"1"));
        $data['currencies']=$this->crud->get_where("igc_currency_setting",array("delete_status"=>"0","publish_status"=>"1"));
        $data['religions']=$this->crud->get_where("igc_religion",array("delete_status"=>"0","publish_status"=>"1"));
        $data['countries']=$this->crud->get_where("igc_country",array("publish_status"=>"1"));
        $data['months']=$this->crud->get_where("igc_month",array("publish_status"=>"1"));
        $data['educations']=$this->crud->get_where("igc_education_level",array("delete_status"=>"0","publish_status"=>"1"));
        $data['org_natures']=$this->crud->get_where("tbl_org_nature",array("delete_status"=>"0","publish_status"=>"1"));
        $data['languages']=$this->crud->get_where("igc_language",array("delete_status"=>"0","publish_status"=>"1"));
        
        $data['styles'] = array('static/css/5star');
        $data['scripts'] = array('themes/js/form-validator');
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit Biodata";
        $this->load->view('header', $data);
        $this->load->view('biodata_form');
        $this->load->view('footer');
    }



    


    //function to delete Organization

    public function biodata_delete($biodata_id)
    {
        $table = 'tbl_biodata_all';
        $field_name = "biodata_id";
        $result = $this->crud->delete($biodata_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','Biodata has been deleted.');
            redirect('biodata');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Biodata.');
            redirect('biodata');
        }

    }
}
   
                                                                
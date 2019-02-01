<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Career extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        $this->load->model('crud_model', 'crud');

    }

    public  $table = "igc_career";
    public $field_name = "career_id";
    public  $redirect = "career";



    public function index()
    {

        $data['records'] = $this->crud->get_not_deleted($this->table);
        $data['title']= "Career";
        $this->load->view('header', $data);
        $this->load->view('career_list');
        $this->load->view('footer');
    }


    public function form($id=0)
    {
        if($this->input->post())
        {
            $career_id = $this->input->post('career_id');
            $insert['career_title'] = $this->input->post('career_title');

            $insert['job_location'] = $this->input->post('job_location');
            $insert['no_of_vacancy'] = $this->input->post('no_of_vacancy');
            $insert['basic_salary'] = $this->input->post('basic_salary');

            $insert['career_content'] = $this->input->post('career_content');
            $insert['publish_status'] = $this->input->post('publish_status');
            $insert['meta_description'] = $this->input->post('meta_description');
            $insert['meta_keywords'] = $this->input->post('meta_keywords');
            $insert['meta_title'] = $this->input->post('meta_title');
            $insert['publish_date'] = $this->input->post('publish_date');
            $insert['expire_date'] = $this->input->post('expire_date');
            $insert['career_url'] = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '-', $insert['career_title'])) ;
            $rand = md5(rand());
            $featuredimg=$rand. str_replace(" ","",$_FILES['featured_img']['name']);
            $featuredimgtmp=$_FILES['featured_img']['tmp_name'];
            $path = '../uploads/career/';
            $insert['delete_status'] = "0";
            if($career_id =="")
            {
                $insert['featured_img']= $featuredimg;
                $insert['created'] = date('Y-m-d:H:i:s');
                $result = $this->crud->insert($insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['career_title'];
                    $log['action_id']= "1";
                    $this->create_log($log);

                    //code to copy image
                    move_uploaded_file($featuredimgtmp,$path.$featuredimg);
                    $this->session->set_flashdata('success','Career has been added.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to add Career');
                    redirect($this->redirect);
                }

            }
            else{
                $featuredimg_new = $_FILES['featured_img']['name'];

                if($featuredimg_new !="")
                {
                    $pre_featuredimg = $this->input->post('pre_featured_img');
                    @unlink($path.$pre_featuredimg);
                    move_uploaded_file($featuredimgtmp,$path,$featuredimg);
                    $insert['featured_img'] = $featuredimg;

                }

                $insert['updated'] = date('Y-m-d:H:i:s');

                $result = $this->crud->update($career_id, $this->field_name, $insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['career_title'];
                    $log['action_id']= "2";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','Career has been updated.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to update the Career.');
                    redirect($this->redirect);
                }

            }


        }

        $data['detail'] = $this->crud->get_detail($id, $this->field_name, $this->table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['title']= "Add/Edit Career";
        $this->load->view('header', $data);
        $this->load->view('career_form');
        $this->load->view('footer');
    }



    //function to delete

    public function delete($id)
    {

        $detail = $this->crud->get_detail($id, $this->field_name, $this->table);
        $result = $this->crud->soft_delete($id, $this->field_name, $this->table);
        if($result)
        {

            //code to create log
            $log['module_title']=  $detail['career_title'];
            $log['action_id']= "3";
            $this->create_log($log);

            $this->session->set_flashdata('success','Career has been deleted.');
            redirect($this->redirect);
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Career.');
            redirect($this->redirect);
        }

    }


//function to create log

    public function create_log($insert)
    {

        $insert['ip_address'] = get_ip();
        $insert['user_id'] = $this->session->userdata('admin_id');
        $insert['date'] = date('Y-m-d:H:i:s');
        $insert['module_name'] =  "Career";
        $this->db->insert('igc_user_logs', $insert);
    }



}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jobs_newspaper extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        $this->load->model('crud_model', 'crud');

    }

    public  $table = "tbl_jobs_newspaper";
    public $field_name = "jobs_newsp_id";
    public  $redirect = "jobs_newspaper";



    public function index()
    {

        $data['records'] = $this->crud->get_where($this->table,array('delete_status'=>0));
        $data['title']= "Newspaper Jobs";
        $this->load->view('header', $data);
        $this->load->view('jobs_newspaper_list');
        $this->load->view('footer');
    }

    public function form($id=0)
    {
        if($this->input->post())
        {
            $id = $this->input->post('jobs_newsp_id');
            $insert['newsp_id']=$this->input->post('newsp_id');
            $insert['title'] = $this->input->post('title');
            $insert['description'] = $this->input->post('description');
            $insert['publish_status'] = $this->input->post('publish_status');
            $insert['delete_status'] = "0";

            $insert['slug'] = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '-', $insert['title'])) ;

            $rand = md5(rand());
            $featuredimg=$rand. str_replace(" ","",$_FILES['featured_img']['name']);
            $featuredimgtmp=$_FILES['featured_img']['tmp_name'];

            $path = '../uploads/jobs_newspaper/';

            if($id =="")
            {
                $insert['featured_img']= $featuredimg;
                $insert['created'] = date('Y-m-d:H:i:s');
                $result = $this->crud->insert($insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['title'];
                    $log['action_id']= "1";
                    $this->create_log($log);

                    //code to copy image
                    move_uploaded_file($featuredimgtmp,$path.$featuredimg);
                    $this->session->set_flashdata('success','Newspaper Jobs has been added.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to add Newspaper Jobs');
                    redirect($this->redirect);
                }

            }
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

                $result = $this->crud->update($id, $this->field_name, $insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['title'];
                    $log['action_id']= "2";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','Newspaper Jobs has been updated.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to update the Newspaper Jobs.');
                    redirect($this->redirect);
                }

            }


        }

        $data['detail'] = $this->crud->get_detail($id, $this->field_name, $this->table);
        $data['newspapers'] = $this->crud->get_where("igc_newspaper",array('delete_status'=>'0','publish_status'=>1));
        $data['scripts'] = array('themes/js/form-validator');
        $data['title']= "Add/Edit Newspaper Jobs";

        $this->load->view('header', $data);
        $this->load->view('jobs_newspaper_form');
        $this->load->view('footer');
    }



    //function to delete

    public function jobs_newspaper_delete($id)
    {

        $detail = $this->crud->get_detail($id, $this->field_name, $this->table);
        $result = $this->crud->soft_delete($id, $this->field_name, $this->table);
        if($result)
        {

            //code to create log
            $log['module_title']=  $detail['title'];
            $log['action_id']= "3";
            $this->create_log($log);

            $this->session->set_flashdata('success','Jobs Newspaper has been deleted.');
            redirect($this->redirect);
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Jobs Newspaper.');
            redirect($this->redirect);
        }

    }


//function to create log

    public function create_log($insert)
    {

        $insert['ip_address'] = get_ip();
        $insert['user_id'] = $this->session->userdata('admin_id');
        $insert['date'] = date('Y-m-d:H:i:s');
        $insert['module_name'] =  "Jobs Newspaper";
        $this->db->insert('igc_user_logs', $insert);
    }



}


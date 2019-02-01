<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class jobs_employeer extends MX_Controller{
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
        $data['jobs'] = $this->crud->get_where_order($table,array("admin_ref"=>0,"publish_status"=>1,"delete_status"=>0),"created","DESC");
        $data['title']= "Jobs List";
        $this->load->view('header', $data);
        $this->load->view('jobs_employeer_list');
        $this->load->view('footer');
    }
    public function permitted($enum)
    {
        $table = 'tbl_job_post_all';
        $data['jobs'] = $this->crud->get_where_order($table,array("admin_ref"=>0,"publish_status"=>1,"delete_status"=>0,"super_publish_status"=>$enum),"created","DESC");
        $data['title']= ($enum=="0")?"Not Permitted Job List":"Permitted Job List";
        $this->load->view('header', $data);
        $this->load->view('jobs_employeer_list');
        $this->load->view('footer');
    }

    public function permission_yes($id)
    {
        $update['updated']=date('Y-m-d:H:i:s');
        $update['super_publish_status']='1';
        $result=$this->crud->update($id,'job_id',$update,'tbl_job_post_all');
            redirect('jobs_employeer');
    }
    public function permission_no($id)
    {
        $update['updated']=date('Y-m-d:H:i:s');
        $update['super_publish_status']='0';
        $result=$this->crud->update($id,'job_id',$update,'tbl_job_post_all');
            redirect('jobs_employeer');
    }


    // public function jobs_delete($job_id)
    // {
    //     $table = 'tbl_job_post_all';
    //     $field_name = "job_id";
    //     $result = $this->crud->delete($job_id, $field_name, $table);
    //     if($result)
    //     {
    //         $this->session->set_flashdata('success','Job Post has been deleted.');
    //         redirect('jobs');
    //     }
    //     else{
    //         $this->session->set_flashdata('error','Unable to delete the Job Post.');
    //         redirect('jobs');
    //     }

    // }
}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_users_uploaded_cv extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        $this->load->model('crud_model','crud');
        $this->load->model('site_users_uploaded_cv_model', 'cv');

    }

    public  $table = "tbl_cust_uploaded_cv";
    public $field_name = "cuc_id";
    public  $redirect = "site_users_uploaded_cv";

    public function index()
    {

        $data['records'] = $this->cv->get_legal_uploaded_cv();
        $data['title']= "Site Users Uploaded CVs";
        $this->load->view('header', $data);
        $this->load->view('site_users_uploaded_cv_list');
        $this->load->view('footer');
    }

//     public function newspaper_delete($id)
//     {

//         $detail = $this->crud->get_detail($id, $this->field_name, $this->table);
//         $result = $this->crud->soft_delete($id, $this->field_name, $this->table);
//         if($result)
//         {

//             //code to create log
//             $log['module_title']=  $detail['title'];
//             $log['action_id']= "3";
//             $this->create_log($log);

//             $this->session->set_flashdata('success','Newspaper has been deleted.');
//             redirect($this->redirect);
//         }
//         else{
//             $this->session->set_flashdata('error','Unable to delete the Newspaper.');
//             redirect($this->redirect);
//         }

//     }


// //function to create log

//     public function create_log($insert)
//     {

//         $insert['ip_address'] = get_ip();
//         $insert['user_id'] = $this->session->userdata('admin_id');
//         $insert['date'] = date('Y-m-d:H:i:s');
//         $insert['module_name'] =  "Newspaper";
//         $this->db->insert('igc_user_logs', $insert);
//     }

}


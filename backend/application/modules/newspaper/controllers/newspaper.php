<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Newspaper extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        $this->load->model('crud_model', 'crud');

    }

    public  $table = "igc_newspaper";
    public $field_name = "newsp_id";
    public  $redirect = "newspaper";



    public function index()
    {

        $data['records'] = $this->crud->get_where($this->table,array('delete_status'=>0));
        $data['title']= "Newspaper";
        $this->load->view('header', $data);
        $this->load->view('newspaper_list');
        $this->load->view('footer');
    }

    public function form($id=0)
    {
        if($this->input->post())
        {
            $id = $this->input->post('newsp_id');
            $insert['title'] = $this->input->post('title');
            $insert['description'] = $this->input->post('description');
            $insert['publish_status'] = $this->input->post('publish_status');
            $insert['delete_status'] = "0";

            $insert['slug'] = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '-', $insert['title'])) ;

            if($id =="")
            {
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
                    $this->session->set_flashdata('success','Newspaper has been added.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to add Newspaper');
                    redirect($this->redirect);
                }

            }
            else{

                $insert['updated'] = date('Y-m-d:H:i:s');

                $result = $this->crud->update($id, $this->field_name, $insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['title'];
                    $log['action_id']= "2";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','Newspaper has been updated.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to update the Newspaper.');
                    redirect($this->redirect);
                }

            }


        }

        $data['detail'] = $this->crud->get_detail($id, $this->field_name, $this->table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['title']= "Add/Edit Newspaper";

        $this->load->view('header', $data);
        $this->load->view('newspaper_form');
        $this->load->view('footer');
    }



    //function to delete

    public function newspaper_delete($id)
    {

        $detail = $this->crud->get_detail($id, $this->field_name, $this->table);
        $result = $this->crud->soft_delete($id, $this->field_name, $this->table);
        if($result)
        {

            //code to create log
            $log['module_title']=  $detail['title'];
            $log['action_id']= "3";
            $this->create_log($log);

            $this->session->set_flashdata('success','Newspaper has been deleted.');
            redirect($this->redirect);
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Newspaper.');
            redirect($this->redirect);
        }

    }


//function to create log

    public function create_log($insert)
    {

        $insert['ip_address'] = get_ip();
        $insert['user_id'] = $this->session->userdata('admin_id');
        $insert['date'] = date('Y-m-d:H:i:s');
        $insert['module_name'] =  "Newspaper";
        $this->db->insert('igc_user_logs', $insert);
    }

}


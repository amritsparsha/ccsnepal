<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Services extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();

        $this->load->model('crud_model','crud');

    }

    public  $table = "igc_services";
    public $field_name = "services_id";
    public  $redirect = "services";

    public function index()
    {
        $data['records'] = $this->crud->get_all($this->table);
        $data['title']= "FAQ";
        $this->load->view('header', $data);
        $this->load->view('services_list');
        $this->load->view('footer');
    }

    //code to add/edit

    public function form($id=0)
    {
        if($this->input->post())
        {
            $folder_path = '../uploads/services/';
            $services_id = $this->input->post('services_id');
            $insert['services_title'] = $this->input->post('services_title');
            $insert['services_caption'] = $this->input->post('services_caption');
            $insert['publish_status'] = $this->input->post('publish_status');

           
            if($services_id =="")
            {
                
                $insert['created'] = date('Y-m-d:H:i:s');
                $result = $this->crud->insert($insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['services_title'];
                    $log['action_id']= "1";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','New Services has been added.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to add Services.');
                    redirect($this->redirect);
                }

            }
            else{

                $insert['updated'] = date('Y-m-d:H:i:s');
                

                $result = $this->crud->update($services_id, $this->field_name, $insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['services_title'];
                    $log['action_id']= "2";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','Services has been updated.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to update the Services.');
                    redirect($this->redirect);
                }

            }


        }

        $data['detail'] = $this->crud->get_detail($id, $this->field_name, $this->table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['title']= "Add/Edit FAQ";
        $this->load->view('header', $data);
        $this->load->view('services_form');
        $this->load->view('footer');
    }




    //function to delete

    public function delete($services_id)
    {
        $services_detail = $this->crud->get_detail($services_id,  $this->field_name, $this->table);

        $result = $this->crud->delete($services_id, $this->field_name, $this->table);
        if($result)
        {
            //code to create log
            $log['module_title']= $services_detail['services_title'];
            $log['action_id']= "3";
            $this->create_log($log);

            $path='../uploads/services/';
            @unlink($path.$services_detail['services_image']);
            $this->session->set_flashdata('success','FAQ has been deleted.');
            redirect($this->redirect);
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the FAQ.');
            redirect($this->redirect);
        }

    }


    //function to create log

    public function create_log($insert)
    {

        $insert['ip_address'] = get_ip();
        $insert['user_id'] = $this->session->userdata('admin_id');
        $insert['date'] = date('Y-m-d:H:i:s');
        $insert['module_name'] =  "FAQ";
        $this->db->insert('igc_user_logs', $insert);
    }

}


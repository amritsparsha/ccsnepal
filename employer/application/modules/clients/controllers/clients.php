<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Clients extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();

        $this->load->model('crud_model','crud');

    }

    public  $table = "igc_clients";
    public $field_name = "clients_id";
    public  $redirect = "clients";

    public function index()
    {
        $data['records'] = $this->crud->get_all($this->table);
        $data['title']= "Clients";
        $this->load->view('header', $data);
        $this->load->view('clients_list');
        $this->load->view('footer');
    }

    //code to add/edit

    public function form($id=0)
    {
        if($this->input->post())
        {
            $folder_path = '../uploads/clients/';
            $clients_id = $this->input->post('clients_id');
            $insert['clients_title'] = $this->input->post('clients_title');
            $url= strtolower(preg_replace('/[^A-Za-z0-9\-]/', '-', $insert['clients_title'])) ;
            $insert['clients_caption'] = $this->input->post('clients_caption');
            $insert['client_lnik'] = $this->input->post('client_lnik');
            $insert['publish_status'] = $this->input->post('publish_status');


            $check_url =  $this->crud->check_url($clients_id, 'category_id', $url, 'slug','igc_clients');
            if(!empty($check_url))
            {
                $insert['slug']= $url."-".rand(1, 50);
            }
            else
            {
                $insert['slug'] = $url;
            }

            $rand = md5(rand());
            $clients_image= $rand. str_replace(" ","",$_FILES['clients_image']['name']);
            $clients_imagetmp=$_FILES['clients_image']['tmp_name'];
            if($clients_id =="")
            {
                if($_FILES['clients_image']['name'] !="")
                {
                    $insert['clients_image']= $clients_image;

                    move_uploaded_file($clients_imagetmp,$folder_path.$clients_image);

                }
                $insert['created'] = date('Y-m-d:H:i:s');
                $result = $this->crud->insert($insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['clients_title'];
                    $log['action_id']= "1";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','New Clients has been added.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to add Clients.');
                    redirect($this->redirect);
                }

            }
            else{

                $insert['updated'] = date('Y-m-d:H:i:s');
                if($_FILES['clients_image']['name'] !="")
                {
                    $pre_clients_image = $this->input->post('pre_clients_image');

                    @unlink($folder_path.$pre_clients_image);

                    $insert['clients_image']= $clients_image;

                    move_uploaded_file($clients_imagetmp,$folder_path.$clients_image);

                }

                $result = $this->crud->update($clients_id, $this->field_name, $insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['clients_title'];
                    $log['action_id']= "2";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','Clients has been updated.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to update the Clients.');
                    redirect($this->redirect);
                }

            }


        }

        $data['detail'] = $this->crud->get_detail($id, $this->field_name, $this->table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['title']= "Add/Edit Clients";
        $this->load->view('header', $data);
        $this->load->view('clients_form');
        $this->load->view('footer');
    }




    //function to delete

    public function delete($clients_id)
    {
        $clients_detail = $this->crud->get_detail($clients_id,  $this->field_name, $this->table);

        $result = $this->crud->delete($clients_id, $this->field_name, $this->table);
        if($result)
        {
            //code to create log
            $log['module_title']= $clients_detail['clients_title'];
            $log['action_id']= "3";
            $this->create_log($log);

            $path='../uploads/clients/';
            @unlink($path.$clients_detail['clients_image']);
            $this->session->set_flashdata('success','Clients has been deleted.');
            redirect($this->redirect);
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Clients.');
            redirect($this->redirect);
        }

    }


    //function to create log

    public function create_log($insert)
    {

        $insert['ip_address'] = get_ip();
        $insert['user_id'] = $this->session->userdata('admin_id');
        $insert['date'] = date('Y-m-d:H:i:s');
        $insert['module_name'] =  "Clients";
        $this->db->insert('igc_user_logs', $insert);
    }

}


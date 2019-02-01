<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Team extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();

        $this->load->model('crud_model','crud');

    }

    public  $table = "igc_team";
    public $field_name = "team_id";
    public  $redirect = "team";

    public function index()
    {
        $data['records'] = $this->crud->get_all($this->table);
        $data['title']= "Team";
        $this->load->view('header', $data);
        $this->load->view('team_list');
        $this->load->view('footer');
    }

    //code to add/edit

    public function form($id=0)
    {
        if($this->input->post())
        {
            $folder_path = '../uploads/team/';
            $team_id = $this->input->post('team_id');
            $insert['team_title'] = $this->input->post('team_title');
            $insert['team_caption'] = $this->input->post('team_caption');
            $insert['team_description'] = $this->input->post('team_description');
            $insert['publish_status'] = $this->input->post('publish_status');

            $rand = md5(rand());
            $team_image= $rand. str_replace(" ","",$_FILES['team_image']['name']);
            $team_imagetmp=$_FILES['team_image']['tmp_name'];
            if($team_id =="")
            {
                if($_FILES['team_image']['name'] !="")
                {
                    $insert['team_image']= $team_image;

                    move_uploaded_file($team_imagetmp,$folder_path.$team_image);

                }
                $insert['created'] = date('Y-m-d:H:i:s');
                $result = $this->crud->insert($insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['team_title'];
                    $log['action_id']= "1";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','New team has been added.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to add team.');
                    redirect($this->redirect);
                }

            }
            else{

                $insert['updated'] = date('Y-m-d:H:i:s');
                if($_FILES['team_image']['name'] !="")
                {
                    $pre_team_image = $this->input->post('pre_team_image');

                    @unlink($folder_path.$pre_team_image);

                    $insert['team_image']= $team_image;

                    move_uploaded_file($team_imagetmp,$folder_path.$team_image);

                }

                $result = $this->crud->update($team_id, $this->field_name, $insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['team_title'];
                    $log['action_id']= "2";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','team has been updated.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to update the team.');
                    redirect($this->redirect);
                }

            }


        }

        $data['detail'] = $this->crud->get_detail($id, $this->field_name, $this->table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['title']= "Add/Edit Team";
        $this->load->view('header', $data);
        $this->load->view('team_form');
        $this->load->view('footer');
    }




    //function to delete

    public function delete($team_id)
    {
        $team_detail = $this->crud->get_detail($team_id,  $this->field_name, $this->table);

        $result = $this->crud->delete($team_id, $this->field_name, $this->table);
        if($result)
        {
            //code to create log
            $log['module_title']= $team_detail['team_title'];
            $log['action_id']= "3";
            $this->create_log($log);

            $path='../uploads/team/';
            @unlink($path.$team_detail['team_image']);
            $this->session->set_flashdata('success','Team has been deleted.');
            redirect($this->redirect);
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Team.');
            redirect($this->redirect);
        }

    }


    //function to create log

    public function create_log($insert)
    {

        $insert['ip_address'] = get_ip();
        $insert['user_id'] = $this->session->userdata('admin_id');
        $insert['date'] = date('Y-m-d:H:i:s');
        $insert['module_name'] =  "Team";
        $this->db->insert('igc_user_logs', $insert);
    }

}


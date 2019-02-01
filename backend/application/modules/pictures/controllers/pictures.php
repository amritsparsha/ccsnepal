<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pictures extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();

        $this->load->model('crud_model','crud');

    }

    public  $table = "igc_pictures";
    public $field_name = "pictures_id";
    public  $redirect = "pictures";

    public function index()
    {
        $data['records'] = $this->crud->get_all($this->table);
        $data['title']= "pictures";
        $this->load->view('header', $data);
        $this->load->view('pictures_list');
        $this->load->view('footer');
    }

    //code to add/edit

    public function form($id=0)
    {
        if($this->input->post())
        {
            $folder_path = '../uploads/pictures/';
            $pictures_id = $this->input->post('pictures_id');
            $insert['pictures_title'] = $this->input->post('pictures_title');
            $insert['pictures_caption'] = $this->input->post('pictures_caption');
            $insert['locate'] = $this->input->post('locate');
            $insert['publish_status'] = $this->input->post('publish_status');

            $rand = md5(rand());
            $pictures_image= $rand. str_replace(" ","",$_FILES['pictures_image']['name']);
            $pictures_imagetmp=$_FILES['pictures_image']['tmp_name'];
            if($pictures_id =="")
            {
                if($_FILES['pictures_image']['name'] !="")
                {
                    $insert['pictures_image']= $pictures_image;

                    move_uploaded_file($pictures_imagetmp,$folder_path.$pictures_image);

                }
                $insert['created'] = date('Y-m-d:H:i:s');
                $result = $this->crud->insert($insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['pictures_title'];
                    $log['action_id']= "1";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','New pictures has been added.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to add pictures.');
                    redirect($this->redirect);
                }

            }
            else{

                $insert['updated'] = date('Y-m-d:H:i:s');
                if($_FILES['pictures_image']['name'] !="")
                {
                    $pre_pictures_image = $this->input->post('pre_pictures_image');

                    @unlink($folder_path.$pre_pictures_image);

                    $insert['pictures_image']= $pictures_image;

                    move_uploaded_file($pictures_imagetmp,$folder_path.$pictures_image);

                }

                $result = $this->crud->update($pictures_id, $this->field_name, $insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['pictures_title'];
                    $log['action_id']= "2";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','pictures has been updated.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to update the pictures.');
                    redirect($this->redirect);
                }

            }


        }

        $data['detail'] = $this->crud->get_detail($id, $this->field_name, $this->table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['title']= "Add/Edit pictures";
        $this->load->view('header', $data);
        $this->load->view('pictures_form');
        $this->load->view('footer');
    }




    //function to delete

    public function delete($pictures_id)
    {
         $insert['delete_status'] = "0";
        $pictures_detail = $this->crud->get_detail($pictures_id,  $this->field_name, $this->table);

        $result = $this->crud->delete($pictures_id, $this->field_name, $this->table);
        if($result)
        {
            //code to create log
            $log['module_title']= $pictures_detail['pictures_title'];
            $log['action_id']= "3";
            $this->create_log($log);

            $path='../uploads/pictures/';
            @unlink($path.$pictures_detail['pictures_image']);
            $this->session->set_flashdata('success','pictures has been deleted.');
            redirect($this->redirect);
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the pictures.');
            redirect($this->redirect);
        }

    }


    //function to create log

    public function create_log($insert)
    {

        $insert['ip_address'] = get_ip();
        $insert['user_id'] = $this->session->userdata('admin_id');
        $insert['date'] = date('Y-m-d:H:i:s');
        $insert['module_name'] =  "pictures";
        $this->db->insert('igc_user_logs', $insert);
    }

}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();

        $this->load->model('crud_model','crud');

    }

    public  $table = "igc_gallery";
    public $field_name = "gallery_id";
    public  $redirect = "gallery";

    public function index()
    {
        $data['records'] = $this->crud->get_all($this->table);
        $data['title']= "Gallery";
        $this->load->view('header', $data);
        $this->load->view('gallery_list');
        $this->load->view('footer');
    }

    //code to add/edit

    public function form($id=0)
    {
        if($this->input->post())
        {
            $folder_path = '../uploads/gallery/';
            $gallery_id = $this->input->post('gallery_id');
            $insert['gallery_title'] = $this->input->post('gallery_title');
            $insert['gallery_caption'] = $this->input->post('gallery_caption');
            $insert['publish_status'] = $this->input->post('publish_status');

            $rand = md5(rand());
            $gallery_image= $rand. str_replace(" ","",$_FILES['gallery_image']['name']);
            $gallery_imagetmp=$_FILES['gallery_image']['tmp_name'];
            if($gallery_id =="")
            {
                if($_FILES['gallery_image']['name'] !="")
                {
                    $insert['gallery_image']= $gallery_image;

                    move_uploaded_file($gallery_imagetmp,$folder_path.$gallery_image);

                }
                $insert['created'] = date('Y-m-d:H:i:s');
                $result = $this->crud->insert($insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['gallery_title'];
                    $log['action_id']= "1";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','New Gallery has been added.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to add Gallery.');
                    redirect($this->redirect);
                }

            }
            else{

                $insert['updated'] = date('Y-m-d:H:i:s');
                if($_FILES['gallery_image']['name'] !="")
                {
                    $pre_gallery_image = $this->input->post('pre_gallery_image');

                    @unlink($folder_path.$pre_gallery_image);

                    $insert['gallery_image']= $gallery_image;

                    move_uploaded_file($gallery_imagetmp,$folder_path.$gallery_image);

                }

                $result = $this->crud->update($gallery_id, $this->field_name, $insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['gallery_title'];
                    $log['action_id']= "2";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','Gallery has been updated.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to update the Gallery.');
                    redirect($this->redirect);
                }

            }


        }

        $data['detail'] = $this->crud->get_detail($id, $this->field_name, $this->table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['title']= "Add/Edit Gallery";
        $this->load->view('header', $data);
        $this->load->view('gallery_form');
        $this->load->view('footer');
    }




    //function to delete

    public function delete($gallery_id)
    {
        $gallery_detail = $this->crud->get_detail($gallery_id,  $this->field_name, $this->table);

        $result = $this->crud->delete($gallery_id, $this->field_name, $this->table);
        if($result)
        {
            //code to create log
            $log['module_title']= $gallery_detail['gallery_title'];
            $log['action_id']= "3";
            $this->create_log($log);

            $path='../uploads/gallery/';
            @unlink($path.$gallery_detail['gallery_image']);
            $this->session->set_flashdata('success','Gallery has been deleted.');
            redirect($this->redirect);
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Gallery.');
            redirect($this->redirect);
        }

    }


    //function to create log

    public function create_log($insert)
    {

        $insert['ip_address'] = get_ip();
        $insert['user_id'] = $this->session->userdata('admin_id');
        $insert['date'] = date('Y-m-d:H:i:s');
        $insert['module_name'] =  "Gallery";
        $this->db->insert('igc_user_logs', $insert);
    }

}


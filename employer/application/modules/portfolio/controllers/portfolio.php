<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Portfolio extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();

        $this->load->model('crud_model','crud');

    }

    public  $table = "igc_portfolio";
    public $field_name = "portfolio_id";
    public  $redirect = "portfolio";

    public function index()
    {
        $data['records'] = $this->crud->get_all($this->table);
        $data['title']= "Portfolio";
        $this->load->view('header', $data);
        $this->load->view('portfolio_list');
        $this->load->view('footer');
    }

    //code to add/edit

    public function form($id=0)
    {
        if($this->input->post())
        {
            $folder_path = '../uploads/portfolio/';
            $portfolio_id = $this->input->post('portfolio_id');
            $insert['portfolio_title'] = $this->input->post('portfolio_title');
            $insert['portfolio_caption'] = $this->input->post('portfolio_caption');
            $insert['publish_status'] = $this->input->post('publish_status');

            $rand = md5(rand());
            $portfolio_image= $rand. str_replace(" ","",$_FILES['portfolio_image']['name']);
            $portfolio_imagetmp=$_FILES['portfolio_image']['tmp_name'];
            if($portfolio_id =="")
            {
                if($_FILES['portfolio_image']['name'] !="")
                {
                    $insert['portfolio_image']= $portfolio_image;

                    move_uploaded_file($portfolio_imagetmp,$folder_path.$portfolio_image);

                }
                $insert['created'] = date('Y-m-d:H:i:s');
                $result = $this->crud->insert($insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['portfolio_title'];
                    $log['action_id']= "1";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','New portfolio has been added.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to add portfolio.');
                    redirect($this->redirect);
                }

            }
            else{

                $insert['updated'] = date('Y-m-d:H:i:s');
                if($_FILES['portfolio_image']['name'] !="")
                {
                    $pre_portfolio_image = $this->input->post('pre_portfolio_image');

                    @unlink($folder_path.$pre_portfolio_image);

                    $insert['portfolio_image']= $portfolio_image;

                    move_uploaded_file($portfolio_imagetmp,$folder_path.$portfolio_image);

                }

                $result = $this->crud->update($portfolio_id, $this->field_name, $insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['portfolio_title'];
                    $log['action_id']= "2";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','portfolio has been updated.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to update the portfolio.');
                    redirect($this->redirect);
                }

            }


        }

        $data['detail'] = $this->crud->get_detail($id, $this->field_name, $this->table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['title']= "Add/Edit portfolio";
        $this->load->view('header', $data);
        $this->load->view('portfolio_form');
        $this->load->view('footer');
    }




    //function to delete

    public function delete($portfolio_id)
    {
        $portfolio_detail = $this->crud->get_detail($portfolio_id,  $this->field_name, $this->table);

        $result = $this->crud->delete($portfolio_id, $this->field_name, $this->table);
        if($result)
        {
            //code to create log
            $log['module_title']= $portfolio_detail['portfolio_title'];
            $log['action_id']= "3";
            $this->create_log($log);

            $path='../uploads/portfolio/';
            @unlink($path.$portfolio_detail['portfolio_image']);
            $this->session->set_flashdata('success','portfolio has been deleted.');
            redirect($this->redirect);
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the portfolio.');
            redirect($this->redirect);
        }

    }


    //function to create log

    public function create_log($insert)
    {

        $insert['ip_address'] = get_ip();
        $insert['user_id'] = $this->session->userdata('admin_id');
        $insert['date'] = date('Y-m-d:H:i:s');
        $insert['module_name'] =  "portfolio";
        $this->db->insert('igc_user_logs', $insert);
    }

}


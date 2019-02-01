<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Biodata_forward extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();

        $this->load->model('crud_model','crud');
    }

    public function index()
    {
        $table = 'tbl_biodata_forward';
        $data['biodata_forward'] = $this->crud->get_all($table);
        $data['title']= "Biodata Forward List";
        $this->load->view('header', $data);
        $this->load->view('biodata_forward_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $biodata_forward_id = $this->input->post('biodata_forward_id');
            $insert['bf_employer'] = $this->input->post('bf_employer');
            $insert['bf_biodata'] = implode(',',$this->input->post('bf_biodata'));
            $insert['bf_detail'] = $this->input->post('bf_detail');
            $insert['publish_status'] = $this->input->post('publish_status');

            if($biodata_forward_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'tbl_biodata_forward';

                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','Biodata has been forwarded.');
                    redirect('biodata_forward');
                }
                else{
                    $this->session->set_flashdata('error','Unable to forward new Biodata.');
                    redirect('biodata_forward');
                }

            }
        else{

            $insert['updated'] = date('Y-m-d:H:i:s');

            $table = 'tbl_biodata_forward';
            $field_name = "biodata_forward_id";
            $result = $this->crud->update($biodata_forward_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','Biodata Froward has been updated.');
                redirect('biodata_forward');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the Biodata Froward.');
                redirect('biodata_forward');
            }

        }


        }
        $table = 'tbl_biodata_forward';
        $field_name = "biodata_forward_id";

        $data['employers'] = $this->crud->get_where("tbl_company_employers",array("delete_status" =>0,"publish_status"=>1,"active_status"=>'Y'));
        $data['biodatas'] = $this->crud->get_where("tbl_biodata_all",array("delete_status" =>0,"publish_status"=>1));

        $data['bd_forward'] = $this->crud->get_detail($id, $field_name, $table);

        $data['scripts'] = array('themes/js/form-validator');
        $data['script'] ="form_validator";
        $data['title']= "Forward Biodata";
        $this->load->view('header', $data);
        $this->load->view('biodata_forward_form');
        $this->load->view('footer');
    }

    //function to delete Organization

    public function biodata_forward_delete($biodata_forward_id)
    {
        $table = 'tbl_biodata_forward';
        $field_name = "biodata_forward_id";
        $result = $this->crud->delete($biodata_forward_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','Biodata-Forward has been deleted.');
            redirect('biodata_forward');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Biodata-Forward.');
            redirect('biodata_forward');
        }

    }
}
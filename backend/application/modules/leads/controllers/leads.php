<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Leads extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'igc_leads';
        $data['leads'] = $this->crud->get_all_orderby_name($table);
        $data['title']= "Leads List";
        $this->load->view('header', $data);
        $this->load->view('leads_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $leads_id = $this->input->post('leads_id');
            $insert['leads_name'] = $this->input->post('leads_name');
            $insert['contact_id'] = $this->input->post('contact_id');
            // $insert['amount'] = $this->input->post('amount');
            // $insert['currency'] = $this->input->post('currency');
            // $insert['deal_stage'] = $this->input->post('deal_stage');
            // $insert['end_date'] = $this->input->post('end_date');
            $insert['leads_detail'] = $this->input->post('leads_detail');
             $folder_path = '../uploads/leadss/';
            $rand = md5(rand());
            $featuredimg= $rand. str_replace(" ","",$_FILES['featured_img']['name']);
            $featuredimgtmp=$_FILES['featured_img']['tmp_name'];


            if($leads_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'igc_leads';
                if($_FILES['featured_img']['name'] !="")
                {
                    $insert['featured_img']= $featuredimg;

                        move_uploaded_file($featuredimgtmp,$folder_path.$featuredimg);

                }
                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New leads has been added.');
                    redirect('leads');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new leads.');
                    redirect('leads');
                }

            }
        else{

            $insert['updated'] = date('Y-m-d:H:i:s');
            if($_FILES['featured_img']['name'] !="")
                {
                    $pre_featured_img = $this->input->post('pre_featuredimg');

                    @unlink($folder_path.$pre_featured_img);

                    $insert['featured_img']= $featuredimg;

                    move_uploaded_file($featuredimgtmp,$folder_path.$featuredimg);

                }
            $table = 'igc_leads';
            $field_name = "leads_id";
            $result = $this->crud->update($leads_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','Leads has been updated.');
                redirect('leads');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the leads.');
                redirect('leads');
            }

        }


        }
        $table = 'igc_leads';
        $field_name = "leads_id";
        $data['leads'] = $this->crud->get_detail($id, $field_name, $table);
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit leads";
        $this->load->view('header', $data);
        $this->load->view('leads_form');
        $this->load->view('footer');
    }



    


    //function to delete category

    public function leads_delete($leads_id)
    {
        $table = 'igc_leads';
        $field_name = "leads_id";
        $result = $this->crud->delete($leads_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','leads has been deleted.');
            redirect('leads');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the leads.');
            redirect('leads');
        }

    }





}


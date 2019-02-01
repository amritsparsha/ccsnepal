<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Invoices extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'igc_invoices';
        $data['invoices'] = $this->crud->get_all_orderby_name($table);
        $data['title']= "Invoices List";
        $this->load->view('header', $data);
        $this->load->view('invoices_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $invoices_id = $this->input->post('invoices_id');
            //$insert['title'] = $this->input->post('title');
            $insert['contact_id'] = $this->input->post('contact_id');
            $insert['invoice_number'] = $this->input->post('invoice_number');
           // $insert['currency'] = $this->input->post('currency');
            //$insert['deal_stage'] = $this->input->post('deal_stage');
            $insert['date'] = $this->input->post('date');
            $insert['invoices_detail'] = $this->input->post('invoices_detail');
             $folder_path = '../uploads/invoicess/';
            $rand = md5(rand());
            $featuredimg= $rand. str_replace(" ","",$_FILES['featured_img']['name']);
            $featuredimgtmp=$_FILES['featured_img']['tmp_name'];


            if($invoices_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'igc_invoices';
                if($_FILES['featured_img']['name'] !="")
                {
                    $insert['featured_img']= $featuredimg;

                        move_uploaded_file($featuredimgtmp,$folder_path.$featuredimg);

                }
                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New invoices has been added.');
                    redirect('invoices');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new invoices.');
                    redirect('invoices');
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
            $table = 'igc_invoices';
            $field_name = "invoices_id";
            $result = $this->crud->update($invoices_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','Invoices has been updated.');
                redirect('invoices');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the invoices.');
                redirect('invoices');
            }

        }


        }
        $table = 'igc_invoices';
        $field_name = "invoices_id";
        $data['invoices'] = $this->crud->get_detail($id, $field_name, $table);
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit invoices";
        $this->load->view('header', $data);
        $this->load->view('invoices_form');
        $this->load->view('footer');
    }



    


    //function to delete category

    public function invoices_delete($invoices_id)
    {
        $table = 'igc_invoices';
        $field_name = "invoices_id";
        $result = $this->crud->delete($invoices_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','invoices has been deleted.');
            redirect('invoices');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the invoices.');
            redirect('invoices');
        }

    }





}


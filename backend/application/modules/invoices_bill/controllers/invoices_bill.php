<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Invoices_bill extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'igc_invoices_bill';
        $data['invoices_bill'] = $this->crud->get_all_orderby_name($table);
        $data['title']= "Invoices_bill List";
        $this->load->view('header', $data);
        $this->load->view('invoices_bill_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $invoices_bill_id = $this->input->post('invoices_bill_id');
            //$insert['title'] = $this->input->post('title');
            $insert['desc'] = $this->input->post('desc');
            $insert['qty'] = $this->input->post('qty');
            $insert['price'] = $this->input->post('price');
            $insert['total'] = $this->input->post('total');
            //$insert['invoices_bill_detail'] = $this->input->post('invoices_bill_detail');
             $folder_path = '../uploads/invoices_bills/';
            $rand = md5(rand());
            $featuredimg= $rand. str_replace(" ","",$_FILES['featured_img']['name']);
            $featuredimgtmp=$_FILES['featured_img']['tmp_name'];


            if($invoices_bill_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'igc_invoices_bill';
                if($_FILES['featured_img']['name'] !="")
                {
                    $insert['featured_img']= $featuredimg;

                        move_uploaded_file($featuredimgtmp,$folder_path.$featuredimg);

                }
                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New invoices_bill has been added.');
                    redirect('invoices_bill');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new invoices_bill.');
                    redirect('invoices_bill');
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
            $table = 'igc_invoices_bill';
            $field_name = "invoices_bill_id";
            $result = $this->crud->update($invoices_bill_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','Invoices_bill has been updated.');
                redirect('invoices_bill');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the invoices_bill.');
                redirect('invoices_bill');
            }

        }


        }
        $table = 'igc_invoices_bill';
        $field_name = "invoices_bill_id";
        $data['invoices_bill'] = $this->crud->get_detail($id, $field_name, $table);
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit invoices_bill";
        $this->load->view('header', $data);
        $this->load->view('invoices_bill_form');
        $this->load->view('footer');
    }



    


    //function to delete category

    public function invoices_bill_delete($invoices_bill_id)
    {
        $table = 'igc_invoices_bill';
        $field_name = "invoices_bill_id";
        $result = $this->crud->delete($invoices_bill_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','invoices_bill has been deleted.');
            redirect('invoices_bill');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the invoices_bill.');
            redirect('invoices_bill');
        }

    }





}


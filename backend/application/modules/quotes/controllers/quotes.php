<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Quotes extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'igc_quotes';
        $data['quotes'] = $this->crud->get_all_orderby_name($table);
        $data['title']= "Quotes List";
        $this->load->view('header', $data);
        $this->load->view('quotes_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $quotes_id = $this->input->post('quotes_id');
            $insert['name'] = $this->input->post('name');
            $insert['quote_status'] = $this->input->post('quote_status');
            $insert['publish_status']  = $this->input->post('publish_status');
            $insert['amount'] = $this->input->post('amount');
            $insert['currency'] = $this->input->post('currency');
            $insert['res_person'] = $this->input->post('res_person');
            $insert['lead_id'] = $this->input->post('lead_id');
            $insert['deals_id'] = $this->input->post('deals_id');
            $insert['date'] = $this->input->post('date');
            $insert['quotes_detail'] = $this->input->post('quotes_detail');
             $folder_path = '../uploads/quotess/';
            $rand = md5(rand());
            $featuredimg= $rand. str_replace(" ","",$_FILES['featured_img']['name']);
            $featuredimgtmp=$_FILES['featured_img']['tmp_name'];


            if($quotes_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'igc_quotes';
                if($_FILES['featured_img']['name'] !="")
                {
                    $insert['featured_img']= $featuredimg;

                        move_uploaded_file($featuredimgtmp,$folder_path.$featuredimg);

                }
                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New quotes has been added.');
                    redirect('quotes');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new quotes.');
                    redirect('quotes');
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
            $table = 'igc_quotes';
            $field_name = "quotes_id";
            $result = $this->crud->update($quotes_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','quotes has been updated.');
                redirect('quotes');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the quotes.');
                redirect('quotes');
            }

        }


        }
        $table = 'igc_quotes';
        $field_name = "quotes_id";
        $data['quotes'] = $this->crud->get_detail($id, $field_name, $table);
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit quotes";
        $this->load->view('header', $data);
        $this->load->view('quotes_form');
        $this->load->view('footer');
    }



    


    //function to delete category

    public function quotes_delete($quotes_id)
    {
        $table = 'igc_quotes';
        $field_name = "quotes_id";
        $result = $this->crud->delete($quotes_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','quotes has been deleted.');
            redirect('quotes');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the quotes.');
            redirect('quotes');
        }

    }





}


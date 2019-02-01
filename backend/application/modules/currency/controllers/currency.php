<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Currency extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'igc_currency_setting';
        $data['currency'] = $this->crud->get_all($table);
        $data['title']= "Currency List";
        $this->load->view('header', $data);
        $this->load->view('currency_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $currency_id = $this->input->post('currency_id');
            $insert['currency_name'] = $this->input->post('currency_name');
             $insert['code'] = $this->input->post('code');
              $insert['symbol'] = $this->input->post('symbol');
              $insert['publish_status'] = $this->input->post('publish_status');


            if($currency_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'igc_currency_setting';
                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New currency has been added.');
                    redirect('currency');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new currency.');
                    redirect('currency');
                }

            }
        else{

            $insert['updated'] = date('Y-m-d:H:i:s');
            $table = 'igc_currency_setting';
            $field_name = "currency_id";
            $result = $this->crud->update($currency_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','Currency has been updated.');
                redirect('currency');
            }
            else{
                $this->session->set_flashdata('error','Unable to update the currency.');
                redirect('currency');
            }

        }


        }
        $table = 'igc_currency_setting';
        $field_name = "currency_id";
        $data['currency'] = $this->crud->get_detail($id, $field_name, $table);
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit currency";
        $this->load->view('header', $data);
        $this->load->view('currency_form');
        $this->load->view('footer');
    }



    


    //function to delete category

    public function currency_delete($currency_id)
    {
        $table = 'igc_currency_setting';
        $field_name = "currency_id";
        $result = $this->crud->delete($currency_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','currency has been deleted.');
            redirect('currency');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the currency.');
            redirect('currency');
        }

    }





}


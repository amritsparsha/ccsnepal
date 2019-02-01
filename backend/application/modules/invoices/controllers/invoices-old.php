<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Invoices extends MX_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model', 'crud');
        $this->load->model('invoices_model');

    }

    public function index()
    {
        $table            = 'igc_invoices';
        $data['invoices'] = $this->crud->get_all($table);
        $data['title']    = "Invoices List";
        $this->load->view('header', $data);
        $this->load->view('invoices_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id = 0)
    {
        if ($this->input->post()) {
            $invoices_id               = $this->input->post('invoices_id');
            $insert['contact_id']      = $this->input->post('contact_id');
           // $insert['invoices_num']    = $this->input->post('invoices_num');
            $insert['sub_total']       = $this->input->post('sub_total');
            //$insert['currency']        = $this->input->post('currency');
            $insert['discount']        = $this->input->post('discount');
            $insert['a_discount']      = $this->input->post('a_discount');
            $insert['tax']             = $this->input->post('tax');
            $insert['tax_amount']      = $this->input->post('tax_amount');
            $insert['total_amount']    = $this->input->post('total_amount');
            $insert['date']            = $this->input->post('date');
            $insert['invoices_detail'] = $this->input->post('invoices_detail');

            $invoices_bill_id = $this->input->post('assign_to');
            $addr = $this->input->post('addr');


            $folder_path               = '../uploads/invoicess/';
            $rand                      = md5(rand());
            $featuredimg               = $rand . str_replace(" ", "", $_FILES['featured_img']['name']);
            $featuredimgtmp            = $_FILES['featured_img']['tmp_name'];

            if ($invoices_id == "") {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table             = 'igc_invoices';
                if ($_FILES['featured_img']['name'] != "") {
                    $insert['featured_img'] = $featuredimg;

                    move_uploaded_file($featuredimgtmp, $folder_path . $featuredimg);

                }
                $result = $this->crud->insert($insert, $table);
                $insert_id = $this->db->insert_id();
                if ($result) {

                       if (!empty($invoices_bill_id)) {
                        // print_r($invoices_bill_id);
                        // exit();
                        foreach ($invoices_bill_id as $row) {
                            //print_r($row); exit();
                            $inserts['invoices_id'] = $insert_id;
                           // $inserts['assign_by']  = $this->session->userdata('admin_id');
                           // $inserts['desc'] = $desc[$row];
                            // print_r($value);
                            // exit();
                            $inserts['addr'] = $row;
                            // $inserts['is_front'] = ($is_front == $row) ? 'Y' : 'N';
                            if ($inserts['addr'] != "" || $inserts['addr'] != "0") {
                                $this->invoices_model->insert_invoices_bill($inserts);
                            }
                        }
                    }

                    $this->session->set_flashdata('success', 'New invoices has been added.');
                    redirect('invoices');
                } else {
                    $this->session->set_flashdata('error', 'Unable to add new invoices.');
                    redirect('invoices');
                }

            } else {

                $insert['updated'] = date('Y-m-d:H:i:s');
                if ($_FILES['featured_img']['name'] != "") {
                    $pre_featured_img = $this->input->post('pre_featuredimg');

                    @unlink($folder_path . $pre_featured_img);

                    $insert['featured_img'] = $featuredimg;

                    move_uploaded_file($featuredimgtmp, $folder_path . $featuredimg);

                }
                $table      = 'igc_invoices';
                $field_name = "invoices_id";
                $result     = $this->crud->update($invoices_id, $field_name, $insert, $table);
                if ($result) {

                    $this->session->set_flashdata('success', 'invoices has been updated.');
                    redirect('invoices');
                } else {
                    $this->session->set_flashdata('error', 'Unable to update the invoices.');
                    redirect('invoices');
                }

            }

        }
        $table            = 'igc_invoices';
        $field_name       = "invoices_id";
        $data['invoices'] = $this->crud->get_detail($id, $field_name, $table);
        $data['script']   = "form_validator";
        $data['title']    = "Add/Edit invoices";
        $this->load->view('header', $data);
        $this->load->view('invoices_form');
        $this->load->view('footer');
    }

    //function to delete category

    public function invoices_delete($invoices_id)
    {
        $table      = 'igc_invoices';
        $field_name = "invoices_id";
        $result     = $this->crud->delete($invoices_id, $field_name, $table);
        if ($result) {
            $this->session->set_flashdata('success', 'invoices has been deleted.');
            redirect('invoices');
        } else {
            $this->session->set_flashdata('error', 'Unable to delete the invoices.');
            redirect('invoices');
        }

    }


    public function invoices_view($invoices_id)
    {
        $data['info'] = $this->invoices_model->invoices_list_will_bill($invoices_id);
        print_r($data['info']);
        $data['title']    = "Invoices List";
        $this->load->view('header', $data);
        $this->load->view('invoices_view');
        $this->load->view('footer');

    }

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Company_employers extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model','crud');
        

    }

    public function index()
    {
        $table = 'tbl_company_employers';
        $data['company_employers'] = $this->crud->get_where($table,array("company_type"=>"2",'delete_status'=>'0','publish_status'=>'1','active_status'=>'Y'));
        $data['title']= "Employers List";
        $this->load->view('header', $data);
        $this->load->view('company_employers_list');
        $this->load->view('footer');
    }
    public function customer()
    {
        $table = 'tbl_company_employers';
        $data['customer'] = $this->crud->get_where($table,array("company_type"=>"1",'delete_status'=>'0','publish_status'=>'1','active_status'=>'Y'));
        $data['title']= "Customer List";
        $this->load->view('header', $data);
        $this->load->view('customer_list');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id=0)
    {
        if($this->input->post())
        {
            $come_id = $this->input->post('come_id');

            $insert['company_employers'] = $this->input->post('company_employers');
            $insert['company_employers_detail'] = $this->input->post('company_employers_detail');
            $insert['company_type'] = $this->input->post('company_type');

            if($insert['company_type'] == '0')
            {
                $redirect = site_url('contact');
            }
            elseif($insert['company_type'] =='1')
            {
                $redirect = site_url('company_employers/customer');
            }
            else
            {
                $redirect = site_url('company_employers');
            }

            if(!empty($this->input->post('lead_type')))
            {
                $insert['lead_type']=$this->input->post('lead_type');
            }

            $insert['employer_address'] = $this->input->post('employer_address');
            $insert['employer_email'] = $this->input->post('employer_email');
            $insert['employer_contact'] = $this->input->post('employer_contact');
            $insert['employer_website'] = $this->input->post('employer_website');

            $insert['como_id'] = $this->input->post('como_id');
            $insert['comc_id'] = $this->input->post('comc_id');
            $insert['comem_id'] = $this->input->post('comem_id');

            $insert['em_contact_person'] = $this->input->post('em_contact_person');
            $insert['em_contact_designation'] = $this->input->post('em_contact_designation');
            $insert['em_contact_email'] = $this->input->post('em_contact_email');
            $insert['em_contact_address'] = $this->input->post('em_contact_address');

            $insert['publish_status'] = $this->input->post('publish_status');
            $insert['employer_type']="System";
            $insert['active_status']="Y";

            $folder_path = '../uploads/company_employers/';
            $rand = md5(rand());
            $featuredimg= $rand. str_replace(" ","",$_FILES['featured_img']['name']);
            $featuredimgtmp=$_FILES['featured_img']['tmp_name'];


            if($come_id =="")
            {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table = 'tbl_company_employers';
                if($_FILES['featured_img']['name'] !="")
                {
                    $insert['featured_img']= $featuredimg;

                        move_uploaded_file($featuredimgtmp,$folder_path.$featuredimg);

                }
                $result = $this->crud->insert($insert,$table);
                if($result)
                {

                    $this->session->set_flashdata('success','New Company has been added.');
                    redirect($redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to add new Company.');
                    redirect($redirect);
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
            $table = 'tbl_company_employers';
            $field_name = "come_id";
            $result = $this->crud->update($come_id, $field_name, $insert, $table);
            if($result)
            {

                $this->session->set_flashdata('success','Company has been updated.');
                redirect($redirect);
            }
            else{
                $this->session->set_flashdata('error','Unable to update the Company.');
                redirect($redirect);
            }

        }


        }
        $table = 'tbl_company_employers';
        $field_name = "come_id";
        $data['company_employers'] = $this->crud->get_detail($id, $field_name, $table);

        $data['ownership_types'] = $this->crud->get_where("tbl_company_ownership",array('delete_status'=>0,'publish_status'=>1));
        $data['categories'] = $this->crud->get_where("tbl_company_category",array('delete_status'=>0,'publish_status'=>1));
        $data['company_sizes'] = $this->crud->get_where("tbl_company_size",array('delete_status'=>0,'publish_status'=>1));

        $data['scripts'] = array('themes/js/form-validator');
        $data['script'] ="form_validator";
        $data['title']= "Add/Edit Ownership";
        $this->load->view('header', $data);
        $this->load->view('company_employers_form');
        $this->load->view('footer');
    }

    public function ajax_company_lead()
    {
        $value=$this->input->post('comp_type');
        $output='';
?>
        <option value="0"  >New</option>
        <option value="1"  >Cold</option>
        <option value="2"  >Warm</option>
        <option value="3"  >Hot</option>
        <option value="4"  >NLWC (No Longerr with Company)</option>
        <option value="5"  >InActive</option>
        <option value="6"  >Active</option>
<?php
    }

    


    //function to delete Ownership

    public function company_employers_delete($come_id)
    {
        $table = 'tbl_company_employers';
        $field_name = "come_id";
        $result = $this->crud->soft_delete($come_id, $field_name, $table);
        if($result)
        {
            $this->session->set_flashdata('success','Company has been deleted.');
            redirect($_SERVER['HTTP_REFERER']);
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Company.');
            redirect($_SERVER['HTTP_REFERER']);
        }

    }





}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site_settings extends CI_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();

         $this->load->model('site_settings_model','setting');
    }

    public function index()
    {

        $data['setting'] = $this->setting->get_site_settings();

        $data['title']= "Site Settings";
        $this->load->view('header', $data);
        $this->load->view('site_settings');
        $this->load->view('footer');
    }


    public function site_form()
    {

        $id= $this->input->post('id');
        $insert['site_name'] = $this->input->post('site_name');
        $insert['site_slogan'] = $this->input->post('site_slogan');
        $insert['site_url'] = $this->input->post('site_url');
        $insert['feedback_email'] = $this->input->post('feedback_email');
        $insert['skype'] = $this->input->post('skype');
        $insert['facebook_link'] = $this->input->post('facebook_link');
        $insert['contact_number'] = $this->input->post('contact_number');
        $insert['whatsapp'] = $this->input->post('whatsapp');
        $insert['twiter_link'] = $this->input->post('twiter_link');
        $insert['youtube_link'] = $this->input->post('youtube_link');
        $insert['google_plus_link'] = $this->input->post('google_plus_link');
        $insert['linked_in'] = $this->input->post('linked_in');
        $insert['instagram'] = $this->input->post('instagram');
        $insert['contact_details'] = $this->input->post('contact_details');
        $insert['meta_title'] = $this->input->post('meta_title');
        $insert['meta_description'] = $this->input->post('meta_description');
        $insert['meta_keywords'] = $this->input->post('meta_keywords');


        if($id !="")
        {
          $result = $this->setting->update_site_settings($insert, $id);
          if($result)
          {
              $this->session->set_flashdata('success', 'Site Information has been Updated.');
              redirect('site_settings');
          }
            else{
                $this->session->set_flashdata('error', 'Unable to Update Site Information.');
                redirect('site_settings');
            }

        }
        else{
            $result = $this->setting->insert_site_settings($insert);
            if($result)
            {
                $this->session->set_flashdata('success', 'Site Information has been inserted.');
                redirect('site_settings');
            }
            else{
                $this->session->set_flashdata('error', 'Unable to insert Site Information.');
                redirect('site_settings');
            }

        }

    }



}
?>
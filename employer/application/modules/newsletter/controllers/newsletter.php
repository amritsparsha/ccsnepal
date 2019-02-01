<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Newsletter extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        $this->load->model('crud_model', 'crud');
        $this->load->model('site_settings_model','setting');
        $this->load->model('mail_setting_model','mail_setting');

    }

    public  $table = "newletter_create";
    public $field_name = "id";
    public  $redirect = "newsletter";



    public function index()
    {

        $data['records'] = $this->crud->get_not_deleted($this->table);
        $data['all_groups'] = $this->crud->get_not_deleted("subscriber_group");
        $data['title']= "Job";
        $this->load->view('header', $data);
        $this->load->view('newsletter_list');
        $this->load->view('footer');
    }


    public function form($id=0)
    {
        if($this->input->post())
        {
            //$news_id = $this->input->post('news_id');
            $insert['name'] = $this->input->post('name');
            $insert['title'] = $this->input->post('title');
            $insert['description'] = $this->input->post('description');
            $insert['status'] = $this->input->post('status');
            if($id <= 0)
            {
                $result = $this->crud->insert($insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['title'];
                    $log['action_id']= "1";
                    $this->create_log($log);

                    //code to copy image
                    $this->session->set_flashdata('success','Newsletter has been added.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to add Newsletter');
                    redirect($this->redirect);
                }

            }
            else{
                
                $result = $this->crud->update($id, $this->field_name, $insert, $this->table);
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['title'];
                    $log['action_id']= "2";
                    $this->create_log($log);

                    $this->session->set_flashdata('success','Newsletter has been updated.');
                    redirect($this->redirect);
                }
                else{
                    $this->session->set_flashdata('error','Unable to update the Newsletter.');
                    redirect($this->redirect);
                }

            }


        }

        
        $data['detail'] = $this->crud->get_detail($id, $this->field_name, $this->table);
        $data['scripts'] = array('themes/js/form-validator');
        $data['title']= "Add/Edit Newsletter Content";
        $this->load->view('header', $data);
        $this->load->view('newsletter_form');
        $this->load->view('footer');
    }
    
    public function groups(){
        $data['records'] = $this->crud->get_not_deleted("subscriber_group");
        $data['title']= "Subscriber Group";
        $this->load->view('header', $data);
        $this->load->view('group_list');
        $this->load->view('footer');
    }
    
    public function form_group($id=0)
    {
        if($this->input->post()){
            //$news_id = $this->input->post('news_id');
            $insert['group_name'] = $this->input->post('group_name');
            $insert['lists'] = serialize($this->input->post('lists'));
            
            if($id <= 0){
                $result = $this->crud->insert($insert, "subscriber_group");
                if($result)
                {
                    //code to create log
                    $log['module_title']=  $insert['group_name'];
                    $log['action_id']= "1";
                    $this->create_log($log);

                    //code to copy image
                    $this->session->set_flashdata('success','Group has been added.');
                    redirect('newsletter/groups');
                }
                else{
                    $this->session->set_flashdata('error','Unable to add Group');
                    redirect('newsletter/groups');
                }

            }
            else{
                $result = $this->crud->update($id, "id", $insert, "subscriber_group");
                if($result){
                    //code to create log
                    $log['module_title']=  $insert['group_name'];
                    $log['action_id']= "2";
                    $this->create_log($log);
                    $this->session->set_flashdata('success','Group has been updated.');
                    redirect('newsletter/groups');
                }
                else{
                    $this->session->set_flashdata('error','Unable to update the Group.');
                    redirect('newsletter/groups');
                }
            }
        }
        
        $data['id'] = $id;
        $data['subscribers'] = $this->crud->get_not_deleted("igc_subscribe_users");
        $data['detail'] = $this->crud->get_detail($id, "id", "subscriber_group");
        $data['scripts'] = array('themes/js/form-validator');
        $data['title']= "Add/Edit Group";
        $this->load->view('header', $data);
        $this->load->view('group_form');
        $this->load->view('footer');
    }
    
    public function submit_newsletter(){
        
        if($this->input->post()){
            $group_name = $this->input->post('group_name');
            $group_detail = $this->crud->get_detail($group_name, "id", "subscriber_group");
            $all_lists = unserialize($group_detail['lists']);
            $content_id = $this->input->post('content_id');
            $content_detail = $this->crud->get_detail($content_id, "id", "newletter_create");
            $files['logo_src'] = base_url()."/themes/img/find_user.png";
            $files['title'] = $content_detail['title'];
            $files['description'] = $content_detail['description'];
            $files['setting'] = $this->setting->get_site_settings();
            
            $this->load->library('encrypt');
            $server = $this->crud->get_mail_info();
            
            $password = $this->encrypt->decode($server['password']);
            $this->load->library('mailer');
            $mail  = new PHPMailer();
            
            $server_setting = $this->mail_setting->get_mail_setting_list();
            
            ob_start();
            $this->load->view('template_1',$files);
            $html = ob_get_contents();
            ob_end_clean();
                if($server['smtp_connect'] == "true"){ $mail->IsSMTP();}
                $mail->SMTPAuth   = true;
                $mail->SMTPSecure = $server['server_prefix'];
                $mail->Host       = $server['host'];
                $mail->Port       = $server['port'];
                $mail->Username   = $server['username'];
                $mail->Password   = $password;
                $mail->SetFrom($server['send_from_email'], $server['send_from_name']);
                $mail->AddReplyTo($server['reply_to_email'],$server['reply_to_name']);
                $mail->Subject    = $files['setting']['site_name']." Newsletter";
                $mail->MsgHTML($html);
            if(count($all_lists) > 0):
            foreach($all_lists as $list):
                $single_email = $this->crud->get_detail($list, "id", "igc_subscribe_users");
                $my_email = $single_email['email'];
                $mail->AddAddress($my_email, "");
            endforeach;
            endif;
                if($mail->Send()){ 
                   // return TRUE;
                }
                else{ 
                    //return FALSE; 
                }
            
            $this->session->set_flashdata('success','Email Send Successfully');
            redirect('newsletter');
        }
        
    }



    //function to delete

    public function delete($id){
        $detail = $this->crud->get_detail($id, $this->field_name, $this->table);
        $result = $this->crud->soft_delete($id, $this->field_name, $this->table);
        if($result){
            //code to create log
            $log['module_title']=  $detail['title'];
            $log['action_id']= "3";
            $this->create_log($log);

            $this->session->set_flashdata('success','Newsletter has been deleted.');
            redirect($this->redirect);
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Newsletter.');
            redirect($this->redirect);
        }
    }
    
    public function delete_group($id){
        $detail = $this->crud->get_detail($id, "id", "subscriber_group");
        $result = $this->crud->soft_delete($id, "id", "subscriber_group");
        if($result){
            //code to create log
            $log['module_title']=  $detail['group_name'];
            $log['action_id']= "3";
            $this->create_log($log);

            $this->session->set_flashdata('success','Group has been deleted.');
            redirect('newsletter/groups');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Group.');
            redirect('newsletter/groups');
        }
    }


//function to create log

    public function create_log($insert)
    {

        $insert['ip_address'] = get_ip();
        $insert['user_id'] = $this->session->userdata('admin_id');
        $insert['date'] = date('Y-m-d:H:i:s');
        $insert['module_name'] =  "Job";
        $this->db->insert('igc_user_logs', $insert);
    }



}


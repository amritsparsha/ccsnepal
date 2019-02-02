<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Content extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $this->load->model('content_model','content');
        $this->load->model('crud_model','crud');
        $this->load->model('site_settings_model','site_settings');
        $this->load->model('mail_setting/mail_setting_model','server');

        $this->load->library('encrypt');

    }

    public function index()
    {
        $data['records'] = $this->content->get_content_list();
        $data['title']= "Content List";
        $this->load->view('header', $data);
        $this->load->view('content_list');
        $this->load->view('footer');
    }

    public function form($id=0)
    {
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');

        if($this->input->post())
        {
            $this->form_validation->set_rules('content_title', 'content_title','required');
            $this->form_validation->set_rules('content_page_title', 'content_page_title', 'required|callback_check_name_exist['.$this->input->post('content_id').']');

            $this->form_validation->set_rules('content_ext_url', 'content_ext_url');
            $this->form_validation->set_rules('content_body', 'content_body');
            $this->form_validation->set_rules('content_type', 'content_type');
            $this->form_validation->set_rules('publish_status', 'publish_status');
            $this->form_validation->set_rules('show_on_menu', 'show_on_menu');

            $this->form_validation->set_rules('meta_title', 'meta_title');
            $this->form_validation->set_rules('meta_keywords', 'meta_keywords');
            $this->form_validation->set_rules('meta_description', 'meta_description');

            $this->form_validation->set_rules('tab1', 'tab1');
            $this->form_validation->set_rules('tab_description1', 'tab_description1');
            $this->form_validation->set_rules('tab2', 'tab2');
            $this->form_validation->set_rules('tab_description2', 'tab_description2');
            $this->form_validation->set_rules('tab3', 'tab3');
            $this->form_validation->set_rules('tab_description3', 'tab_description3');
            $this->form_validation->set_rules('tab4', 'tab4');
            $this->form_validation->set_rules('tab_tab_description4', 'tab_description4');
            $this->form_validation->set_rules('tab5', 'tab5');
            $this->form_validation->set_rules('tab_description5', 'tab_description5');

            if ($this->form_validation->run()) 
            {
                $folder_path = '../uploads/content/';
                $content_id = $this->input->post('content_id');

                $insert['content_title'] = $this->input->post('content_title') ;
                $insert['content_page_title'] = $this->input->post('content_page_title');
                $insert['content_ext_url'] = $this->input->post('content_ext_url');
                $insert['content_type'] = $this->input->post('content_type');
                $insert['content_body'] = $this->input->post('content_body');
                $insert['show_on_menu'] = $this->input->post('show_on_menu');
                $insert['publish_status'] = $this->input->post('publish_status');
                $insert['delete_status'] = "0";

                $insert['meta_title'] = $this->input->post('meta_title');
                $insert['meta_keywords'] = $this->input->post('meta_keywords');
                $insert['meta_description'] = $this->input->post('meta_description');

                $insert['content_url'] = strtolower(str_replace(" ","-",$insert['content_page_title']));


                //code to generate content URL and check if it is present
                $check_url = $this->crud->get_detail_except_id($content_id,"content_id",$insert['content_url'],"content_url","igc_content");
                while(count($check_url) > 0)
                {
                    $insert['content_url'] = strtolower(str_replace(" ","-",$insert['content_page_title']));
                    $check_url = $this->crud->get_detail_except_id($content_id,"content_id",$insert['content_url'],"content_url","igc_content");
                }

                //code to generate reference number and check if it is present
                $code = strtoupper(substr(md5(uniqid(rand(1234,9876).time().rand(1111,9999), true)), 3,7));
                $check_code = $this->crud->get_detail_except_id($content_id,"content_id",$code,"content_ref_no","igc_content");
                while(count($check_code) > 0)
                {
                    $code = strtoupper(substr(md5(uniqid(rand(1234,9876).time().rand(1111,9999), true)), 3,7));
                    $check_code = $this->crud->get_detail_except_id($content_id,"content_id",$code,"content_ref_no","igc_content");
                }
                $insert['content_ref_no']=$code;

                // content-type
                $content_type=$insert['content_type'];
                $tabs_content_type=array(
                                            'Page',
                                            'Article',
                                            'About',
                                            'Contact'
                                        );


                $rand = md5(rand());
                $featuredimg= $rand. str_replace(" ","",$_FILES['featured_img']['name']);
                $featuredimgtmp=$_FILES['featured_img']['tmp_name'];

                if($content_id =="")
                {
                    $insert['parent_id']= "0";
                    $insert['position']= "0";
                    $insert['group_id']= "1";
                    $insert['created'] = date('Y-m-d:H:i:s');

                    if($_FILES['featured_img']['name'] !="")
                    {
                        $insert['featured_img']= $featuredimg;
                        move_uploaded_file($featuredimgtmp,$folder_path.$featuredimg);
                    }
                    
                    $inserted_id = $this->content->content_insert($insert); //insert into content

                    if(in_array($content_type,$tabs_content_type))
                    {
                        $tabs['tab1'] = $this->input->post('tab1');
                        $tabs['tab_description1'] = $this->input->post('tab_description1');
                        $tabs['tab2'] = $this->input->post('tab2');
                        $tabs['tab_description2'] = $this->input->post('tab_description2');
                        $tabs['tab3'] = $this->input->post('tab3');
                        $tabs['tab_description3'] = $this->input->post('tab_description3');
                        $tabs['tab4'] = $this->input->post('tab4');
                        $tabs['tab_description4'] = $this->input->post('tab_description4');
                        $tabs['tab5'] = $this->input->post('tab5');
                        $tabs['tab_description5'] = $this->input->post('tab_description5');

                        $tabs['content_id']= $inserted_id;

                        $this->content->tab_insert($tabs); // insert tabs
                    }

                    if($inserted_id)
                    {
                        //code to create log
                        $log['module_title']= $insert['content_page_title'];
                        $log['action_id']= "1";
                        $this->create_log($log);

                        $this->session->set_flashdata('success','New Content has been inserted.');
                        redirect('content');
                    }
                    else{
                        $this->session->set_flashdata('error','Unable to insert the new content.');
                        redirect('content');
                    }
                } //insert end
                else
                {  //update
                    $insert['updated'] = date('Y-m-d:H:i:s');
                    if($_FILES['featured_img']['name'] !="")
                    {
                        $pre_featured_img = $this->input->post('pre_featuredimg');
                        @unlink($folder_path.$pre_featured_img);
                        $insert['featured_img']= $featuredimg;
                        move_uploaded_file($featuredimgtmp,$folder_path.$featuredimg);
                    }

                    $result = $this->content->content_update($insert, $content_id); //update into content

                    if(in_array($content_type,$tabs_content_type))
                    {
                        $tabs['tab1'] = $this->input->post('tab1');
                        $tabs['tab_description1'] = $this->input->post('tab_description1');
                        $tabs['tab2'] = $this->input->post('tab2');
                        $tabs['tab_description2'] = $this->input->post('tab_description2');
                        $tabs['tab3'] = $this->input->post('tab3');
                        $tabs['tab_description3'] = $this->input->post('tab_description3');
                        $tabs['tab4'] = $this->input->post('tab4');
                        $tabs['tab_description4'] = $this->input->post('tab_description4');
                        $tabs['tab5'] = $this->input->post('tab5');
                        $tabs['tab_description5'] = $this->input->post('tab_description5');

                        $tab_data = $this->content->tab_detail($content_id);

                        if(!empty($tab_data))
                        {
                            $this->content->tab_update($tabs, $content_id);
                        }
                        else
                        {
                            $tabs['content_id'] = $content_id;
                            $this->content->tab_insert($tabs);
                        }
                    }
                    if($result)
                    {
                        //code to create log
                        $log['module_title']= $insert['content_page_title'];
                        $log['action_id']= "2";
                        $this->create_log($log);

                        $this->session->set_flashdata('success','Content has been updated.');
                        redirect('content');
                    }
                    else{
                        $this->session->set_flashdata('error','Unable to update the content.');
                        redirect('content');
                    }
                } //end of updating code
            }//validation run end
        }//post end

    // ==============================================================================
        $content = $this->content->get_content_detail($id);
        $tab = $this->content->tab_detail($id);

        if(!empty($content) && !empty($tab))
        {
             $data['content'] = array_merge($content, $tab);
        } 
    // ================================================================================
        $data['scripts'] = array('themes/js/form-validator');
        $data['title']= "Add/Edit Content";

        $this->load->view('header', $data);
        $this->load->view('content_form');
        $this->load->view('footer');
    }

    public function check_name_exist($str, $content_id)
    {
        $string = str_replace(" ","-",$str);
        $name = $this->content->check_name_exist($string, $content_id);
        
        if(empty($name))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_name_exist', 'Content page title already exist.');
            return FALSE;
        }

    }



    public function comment($id)
    {
        $detail= $this->crud->get_detail($id, 'content_id', 'igc_content');
        if($detail['content_type']=="Page")
        {
            redirect('content');
        }
        $data['page_title'] = $detail['content_page_title'];
        $data['records'] = $this->crud->get_detail_rows($id, 'content_id', 'igc_content_comments');
        $data['title']= "Publish/UnPublish Comment";
        $this->load->view('header', $data);
        $this->load->view('comment_list');
        $this->load->view('footer');
    }

    public function comment_active()
    {
        if($this->input->post())
        {
            $id = $this->input->post('id');
            $update['approved_status']="1";
            $this->crud->update($id, 'comment_id', $update, 'igc_content_comments');
            //code to create log
            $log['module_title']= "Content Comment Id"."(".$id.")";
            $log['action_id']= "2";
            $this->create_log($log);
            echo "success";
        }
    }

    public function comment_inactive()
    {
        if($this->input->post())
        {
            $id = $this->input->post('id');
            $update['approved_status']="0";
            $this->crud->update($id, 'comment_id', $update, 'igc_content_comments');
            //code to create log
            $log['module_title']= "Content Comment Id"."(".$id.")";
            $log['action_id']= "2";
            $this->create_log($log);
            echo "success";
        }
    }

    //comment delete

    public function comment_delete($id)
    {
        $result = $this->crud->delete($id,'comment_id','igc_content_comments');
        if($result)
        {
            //code to create log
            $log['module_title']= "Content Comment Id"."(".$id.")";
            $log['action_id']= "3";
            $this->create_log($log);

            $this->session->set_flashdata('success','Comment has been deleted.');
            redirect('content');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the Comment.');
            redirect('content');
        }
    }




    //code to soft delete the content

    public function delete($content_id)
    {
        $content_detail = $this->crud->get_detail($content_id, 'content_id', 'igc_content');
        $result = $this->content->delete_content($content_id);
        if($result)
        {
            //code to create log
            $log['module_title']= $content_detail['content_page_title'];
            $log['action_id']= "3";
            $this->create_log($log);

            $path='../uploads/content/';
            @unlink($path.$content_detail['featured_img']);
            $this->session->set_flashdata('success','Content has been deleted.');
            redirect('content');
        }
        else{
            $this->session->set_flashdata('error','Unable to delete the content.');
            redirect('content');
        }
    }



//code to add new tags in content

    public function add_tags($content_id, $tags)
    {
        if ($tags != '') {
            $tagIn = trim(preg_replace('/\s+/', ',', $tags));
            $tags = explode(',', $tagIn);

            $this->content->insert_tags($tags, $content_id);
        }

    }

    public function rmv_content_tag()
    {
        if($this->input->post())
        {
            $term_id = $this->input->post('term_id');
            $content_id = $this->input->post('content_id');

            $this->db->where('content_id', $content_id);
            $this->db->where('term_id', $term_id);
            $this->db->delete('igc_content_tags');

            echo "success";


        }
    }


    public function send($content_id)
    {
        $content_detail = $this->crud->get_detail($content_id, 'content_id', 'igc_content');
        $subscribes = $this->content->get_subscribers();
        if(! empty($content_detail) && $content_detail['content_type'] == 'Article' && ! empty($subscribes))
        {
            $site_settings = $this->site_settings->get_site_settings();
            $server_url = $site_settings['site_url'].'/index.php/blog/detail/'.$content_detail['content_url'];
            $server = $this->server->active_mail_server();

            $password = $this->encrypt->decode($server['password']);



            $this->load->library('mailer');

            $mail  = new PHPMailer();


            $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>'.$site_settings['site_name'].' Article</title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">
    <div style="margin:0 0 10px"> <img alt="SansuiTrek" src="http://sansuitrek.com/templates/gk_music/images/logo.png"> </div>
    <p>Dear Subscribers</p>

    <table width="100%" cellspacing="0" cellpadding="5" border="0">

        <tbody>
        <tr>
           <p> Our new article has been published.
          In order to read the article please click the article Link. '.'<a href="'.$server_url.'">'.$server_url.'</a>'.'</p>
        </tr>


        <tr>
            <td colspan="2" style="background:#EEE; text-align:left;">Thanks and Regards,<br />
                SunsuiTrek<br />
                Tel:<strong>+977-1-4414739 / 4005043/44</strong><br />
                <a href="http://sansuitrek.com/" target="_blank" style="color:#46216F; text-decoration:underline;">www.sansuitrek.com</a></td>
        </tr>
        <tr>
            <td colspan="2" style="background:#EEE; text-align:left;"><br />
                IGC Technology<br />
                Tel:<strong>+977-01-4005043/4005044</strong><br />
                <a href="http://igctech.com.np/" target="_blank" style="color:#46216F; text-decoration:underline;">www.igctech.com.np</a></td>
        </tr>


        </tbody>
    </table>
</div>
</body>
</html>' ;

            if($server['smtp_connect'] == "true")
            {
                $mail->IsSMTP(); // telling the class to use SMTP
            }

            $mail->SMTPAuth   = true;                  // enable SMTP authentication

            $mail->SMTPSecure = $server['server_prefix'];                 // sets the prefix to the servier

            $mail->Host       =  $server['host'];      // sets GMAIL as the SMTP server

            $mail->Port       = $server['port'];                  // set the SMTP port for the GMAIL server

            $mail->Username   = $server['username'];  // GMAIL username

            $mail->Password   = $password;          // GMAIL password

            $mail->SetFrom($server['send_from_email'], $server['send_from_name']);

            $mail->AddReplyTo($server['reply_to_email'],$server['reply_to_name']);

            $mail->Subject    = $site_settings['site_name']." Newsletter";


            $mail->MsgHTML($body);

            foreach($subscribes as $rows)
            {
                $mail->AddAddress($rows['email'], $site_settings['site_name']);
            }



            if(!$mail->Send())
            {
                $this->session->set_flashdata('error', 'Unable to Send the Email.Please Check Your Internet Connection.');
                redirect('content');

            }
            else{
                $this->session->set_flashdata('success', 'NewsLetter has been Send.');
                redirect('content');
            }

        }
        else{
            $this->session->set_flashdata('error', 'Unable to Send the Newsletter');
            redirect('content');
        }

    }

    //function to create log

    public function create_log($insert)
    {

        $insert['ip_address'] = get_ip();
        $insert['user_id'] = $this->session->userdata('admin_id');
        $insert['date'] = date('Y-m-d:H:i:s');
        $insert['module_name'] =  "Content";
        $this->db->insert('igc_user_logs', $insert);
    }


}
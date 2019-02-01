<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Tasks extends MX_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();
        $this->load->model('crud_model', 'crud');
        $this->load->model('tasks_model', 'mtasks');
        $this->load->model('site_settings_model');

        $this->load->library('mailer');
        $this->load->library('encrypt');
    }

    public function index()
    {
        $table         = 'igc_tasks';
        $data['tasks'] = $this->crud->get_all($table);
        $data['title'] = "Tasks List";
        $this->load->view('header', $data);
        $this->load->view('tasks_list');
        $this->load->view('footer');
    }


    public function assignment()
    {
        $table         = 'igc_tasks';
        $data['tasks'] = $this->crud->get_all($table);
        $data['title'] = "Assignment List";
        $this->load->view('header', $data);
        $this->load->view('assignment');
        $this->load->view('footer');
    }


    public function assigned_by_me()
    {
        $table         = 'igc_tasks';
        $data['tasks'] = $this->crud->get_all($table);
        $data['title'] = "Assigned List";
        $this->load->view('header', $data);
        $this->load->view('assigned_list');
        $this->load->view('footer');
    }


    public function form($id = 0)
    {
         //print_r($_POST); exit();
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');

        if ($this->input->post()) {

            $tasks_id = $this->input->post('tasks_id');
            $insert['title']      = $this->input->post('title');
            $insert['contact_id'] = $this->input->post('contact_id');
            $insert['assign_date'] = $this->input->post('assign_date');
            // $insert['end_date']    = $this->input->post('end_date');
            $insert['task_type']   = $this->input->post('task_type');
            $insert['assign_by'] = $this->session->userdata('admin_id');
            $insert['tasks_status'] = $this->input->post('tasks_status');
            $assign_to = $this->input->post('assign_to');
            $tasks_detail = $this->input->post('tasks_detail');

            if ($tasks_id == "") {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table             = 'igc_tasks';
                $result    = $this->crud->insert($insert, $table);
                $insert_id = $this->db->insert_id();

                if ($result) {


                    if (!empty($assign_to)) {
                        foreach ($assign_to as $key=> $row) {
                                $inserts['tasks_id'] = $insert_id;
                                $inserts['assign_by']  = $this->session->userdata('admin_id');
                                $inserts['assign_to'] = $row;
                                $inserts['tasks_detail'] = $tasks_detail[$key];

                                if ($inserts['assign_to'] != "" || $inserts['assign_to'] != "0") {
                                    $this->mtasks->insert_tasks_assign($inserts);
                                }
                                $user_detail=$this->crud->get_detail($row,"user_id","igc_users");
                                $this->send_assignment_mail($user_detail['email'],$insert,$inserts['tasks_detail']);
                        }
                    }
                     $this->session->set_flashdata('success', 'Successfully added new tasks.');
                    redirect('tasks');
                } 
                else 
                {
                    $this->session->set_flashdata('error', 'Unable to add new tasks.');
                    redirect('tasks');
                }

            } 
            else 
            {

                $insert['updated'] = date('Y-m-d:H:i:s');
                $table      = 'igc_tasks';
                $field_name = "tasks_id";
                $result     = $this->crud->update($tasks_id, $field_name, $insert, $table);
                 $insert_id = $tasks_id;
                if ($result) 
                {
                    $this->mtasks->delete_tasks_assign($insert_id);
                    if (!empty($assign_to)) {
                        foreach ($assign_to as $key=> $row) {
                                $inserts['tasks_id'] = $insert_id;
                                $inserts['assign_by']  = $this->session->userdata('admin_id');
                                $inserts['assign_to'] = $row;
                                $inserts['tasks_detail'] = $tasks_detail[$key];

                                if ($inserts['assign_to'] != "" || $inserts['assign_to'] != "0") {
                                    $this->mtasks->insert_tasks_assign($inserts);
                                }
                                
                                $user_detail=$this->crud->get_detail($row,"user_id","igc_users");
                                $this->send_assignment_mail($user_detail['email'],$insert,$inserts['tasks_detail']);
                        }
                    }
                    $this->session->set_flashdata('success', 'Tasks has been updated.');
                    redirect('tasks');
                } 
                else 
                {
                    $this->session->set_flashdata('error', 'Unable to update the tasks.');
                    redirect('tasks');
                }
            }

        }
        $table          = 'igc_tasks';
        $field_name     = "tasks_id";
        $data['tasks']  = $this->crud->get_detail($id, $field_name, $table);
        $tasks_assign  = $this->crud->get_where("igc_tasks_assign",array("tasks_id"=>$id,"delete_status"=>"0"));
        $ts=array();
        foreach($tasks_assign as $key=>$row)
        {
            $ts[$row['assign_to']]=$row;
        }
        $data['tasks_assign']=$ts;
        $data['script'] = "form_validator";
        $data['title']  = "Add/Edit tasks";
        $this->load->view('header', $data);
        $this->load->view('tasks_form');
        $this->load->view('footer');
    }

    //function to delete category

    public function tasks_delete($tasks_id)
    {
        $table      = 'igc_tasks';
        $field_name = "tasks_id";
        $result     = $this->crud->delete($tasks_id, $field_name, $table);
        if ($result) {
            $this->session->set_flashdata('success', 'tasks has been deleted.');
            redirect('tasks');
        } else {
            $this->session->set_flashdata('error', 'Unable to delete the tasks.');
            redirect('tasks');
        }

    }


    public function list_task_report($id){
        $data['records'] = $this->crud->get_detail_rows($id, 'tasks_id', 'task_report');
        $data['service_id'] = $id;
        $data['title']= "Task Report";
        $this->load->view('header', $data);
        $this->load->view('list_task_report');
        $this->load->view('footer');
    }

    public function add_task_report($id = 0){

        if($this->input->post()){

            $insert['title'] = $this->input->post('title');
            $insert['title_ar'] = $this->input->post('title_ar');
            $insert['description'] = $this->input->post('description');
            $insert['description_ar'] = $this->input->post('description_ar');

            if(strlen($_FILES['image']['name']) > 0){
                $extension = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
                $allowed_type = array('jpg','jpeg','png','gif','bmp','pdf','doc','docx');
                if(in_array($extension,$allowed_type)){
                    $folderPath = "../uploads/tasks_image/";
                    $imageName = time()."_".rand(1111,9999)."_photo.".$extension;
                    move_uploaded_file($_FILES['image']['tmp_name'],$folderPath.$imageName);
                    $insert['image'] = $imageName;
                }else{
                    $this->session->set_flashdata('error','Image Type Support Only');
                    redirect('tasks/list_task_report/'.$this->input->post('tasks_id'));
                }
            }else{
                if($id > 0){
                    $insert['image'] = $_POST['image_img'];
                }else{
                    $insert['image'] = "";
                }
            }

            if($id == null || $id <= 0){
                //Insert Here
                $insert['tasks_id'] = $this->input->post('tasks_id');
                $insert['added_date'] = date('Y-m-d h:i:s');
                $insert['added_by'] = "admin";
                $this->crud->insert($insert, "task_report");
            }else{
                //Update Here
                $insert['edit_date'] = date('Y-m-d h:i:s');
                $insert['edit_by'] = "admin";
                $this->crud->update($id, "id", $insert, "task_report");
            }

            $this->session->set_flashdata('success','Success');
            redirect('tasks/list_task_report/'.$this->input->post('tasks_id'));

        }else{
            $this->session->set_flashdata('error','Error');
            redirect('tasks');
        }

    }

    public function delete_task_report($id){

        $delete = $this->crud->delete($id, "id", "task_report");
        if($delete){
            $this->session->set_flashdata('success','Success');
            redirect('tasks/list_task_report/'.$this->input->post('tasks_id'));
        }else{
            $this->session->set_flashdata('error','Error');
            redirect('tasks/list_task_report/'.$this->input->post('tasks_id'));
        }

    }

//function to send assignment email

    public function send_assignment_mail($email, $records,$task_detail)
    {
        $site_settings = $this->site_settings_model->get_site_settings();
        $server = $this->crud->get_mail_info();

        $password = $this->encrypt->decode($server['password']);

        $contact = $this->crud->get_detail($records['contact_id'],'contact_id',"igc_contact");
        if($records['tasks_status'] =='0')
        {
            $tasks_status="Not Started";
        }
        elseif($records['tasks_type'] =='1')
        {
            $tasks_status="Working On";

        }
        else
        {
            $tasks_status="Completed";

        }

        if($records['task_type'] =='0')
        {
            $task_type="Urgent";
        }
        elseif($records['task_type'] =='1')
        {
            $task_type="Medium";

        }
        else
        {
            $task_type="Normal";

        }

        // $server_url = base_url().'index.php/login/account_activation/'.$md5;

        $mail  = new PHPMailer();

        $body = '<!DOCTYPE HTML>
                <html>
                <head>
                    <meta charset="utf-8">
                    <title>'. $site_settings['site_name']. ' Task Assignment</title>
                </head>

                <body>
                <div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">
                  <div style="margin:0 0 10px"> <img alt="Image" src="'.base_url().'/themes/images/logos/navbar-logo.png"> </div>


                    <table width="100%" cellspacing="0" cellpadding="5" border="0">

                        <tbody>
                        <tr>
                            <td>Task Title:</td>
                            <td>'.$records['title'].'</td>
                        </tr>
                         <tr>
                            <td>Task Type:</td>
                            <td>'.$task_type.'</td>
                        </tr>
                         <tr>
                            <td>Task Status:</td>
                            <td>'.$tasks_status.'</td>
                        </tr>
                        <tr>
                            <td>Contact:</td>
                            <td>'.$contact['company_name'].' ('.$contact['full_name'].' )</td>
                        </tr>
                        <tr>
                            <td>Task Detail:</td>
                            <td>'.$task_detail.'</td>
                        </tr>
                         <tr>
                            <td>Assign Date:</td>
                            <td>'.date_converter($records['assign_date']).'</td>
                        </tr>
                        <tr>
                            <td>Assigned By:</td>
                            <td>'.$this->crud->get_detail($records['assign_by'],"user_id","igc_users")['username'].'</td>
                        </tr>
            
                        <tr>
                            <td colspan="2" style="background:#EEE; text-align:left;">Thanks and Regards,<br />
                                CCS Nepal Team<br />
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
        // $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)

        $mail->SMTPAuth   = true;                  // enable SMTP authentication

        $mail->SMTPSecure = $server['server_prefix'];                 // sets the prefix to the servier

        $mail->Host       =  $server['host'];      // sets GMAIL as the SMTP server

        $mail->Port       = $server['port'];                  // set the SMTP port for the GMAIL server

        $mail->Username   = $server['username'];  // GMAIL username

        $mail->Password   = $password;          // GMAIL password

        $mail->SetFrom($server['send_from_email'], $server['send_from_name']);

        $mail->AddReplyTo($server['reply_to_email'],$server['reply_to_name']);

        $mail->Subject    = $site_settings['site_name']." Task Assignment";


        $mail->MsgHTML($body);



        $mail->AddAddress($email, $server['send_from_name']);



      if(! $mail->Send())
       {
           return FALSE;

      }
        else
        {

            return TRUE;

        }

    }





}

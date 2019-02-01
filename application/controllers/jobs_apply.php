<?php

class Jobs_apply extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('login_model', 'login');
        $this->load->model('crud_model', 'crud');
		$this->load->library('form_validation');
		$this->load->model('site_settings_model', 'site_settings');
	}

	public function login()
	{
        if($this->input->post())
        {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[pass_confirmation]');
            $this->form_validation->set_rules('pass_confirmation', 'Password Confirmation', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_user_exist['.$this->input->post('password').']');
            if ($this->form_validation->run()) {
            	$job_id = $this->input->post('job_id');
                $email = $this->input->post('email');
                $password = md5($this->input->post('password'));
                    $customer = $this->login->check_user($email, $password);

                    if ($customer) 
                    {
                        $this->session->set_userdata('email', $email);
                        $this->session->set_userdata('customer_id', $customer['customer_id']);
						$this->apply($job_id);
                     } 
                     else 
                     {
                            $this->session->set_flashdata('error', 'Unable to maintain session .Please try again Later.');
							if(!empty($_SERVER['HTTP_REFERER'])){
							    redirect($_SERVER['HTTP_REFERER']);
							} 
							else {
							   redirect('home');
							}
                     }
            }
            else
            {
            	$this->session->set_flashdata('error', validation_errors());
            	if(!empty($_SERVER['HTTP_REFERER'])){
					redirect($_SERVER['HTTP_REFERER']);
				} 
				else {
					redirect('home');
				}

            }

        }
		if(!empty($_SERVER['HTTP_REFERER'])){
			redirect($_SERVER['HTTP_REFERER']);
		} 
		else {
			redirect('home');
		}
	}
	 public function check_user_exist($str, $password)
    {

        $user = $this->login->check_user($str, md5($password));
        if(! empty($user))
        {
           return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_user_exist', 'Invalid Email and Password.');
            return FALSE;
        }

    }
	public function apply($job_id)
	{
		$applied_job_check=$this->crud->get_where("tbl_users_applied_jobs",array('customer_id'=>$this->session->userdata('customer_id'),'job_id'=>$job_id));
		if(count($applied_job_check) > 0){
				$this->session->set_flashdata('error', 'You have already applied for the Job');
            	if(!empty($_SERVER['HTTP_REFERER'])){
					redirect($_SERVER['HTTP_REFERER']);
				} 
				else {
					redirect('home');
				}
		}
		$jobs=$this->crud->get_detail($job_id,'job_id',"tbl_job_post_all");

		$insert['job_id']=$job_id;
		$insert['customer_id']=$this->session->userdata('customer_id');
		$insert['created']=date('Y-m-d:H:i:s');
		$this->crud->insert($insert,"tbl_users_applied_jobs");
		//mail to site_users
		$result_users=$this->send_mail_users($jobs);
		$result_employers=$this->send_mail_employers($jobs);
		$result_super_admin=$this->send_mail_super_admin($jobs);
        redirect('jobs_apply/applied_jobs');
	}
    public function applied_jobs()
    {
        $site_settings = $this->site_settings_model->get_site_settings();
        $data['applied_jobs']=$this->crud->get_where("tbl_users_applied_jobs",array('customer_id'=>$this->session->userdata('customer_id')));

        $data['jobs']=array();
        $data['employer']=array();
        foreach ($data['applied_jobs'] as $key => $value) 
        {
            $data['jobs'][$key]=$this->crud->get_detail($value['job_id'],"job_id","tbl_job_post_all");
            if($data['jobs'][$key]['employer_ref'] == 0)
            {
                $data['employer'][$key]['company_employers']=$site_settings['site_name'];
            }
            else
            {
                $data['employer'][$key]=$this->crud->get_detail($data['jobs'][$key]['employer_ref'],"come_id","tbl_company_employers");
            }
        }
        $data['title']="Applied Jobs";
        $this->load->view('header',$data);
        $this->load->view('jobs/customer_applied_jobs');
        $this->load->view('footer');
    }

	 //function to send account activation email

    public function send_mail_users($jobs)
    {
        $this->load->library('encrypt');
        $this->load->library('mailer');


        $site_settings = $this->site_settings_model->get_site_settings();
        $server = $this->crud->get_mail_info();

        $password = $this->encrypt->decode($server['password']);
        $mail  = new PHPMailer(); 

        $email=$this->session->userdata('email');
           
        if($jobs['salary_type']=="0")
        {
            $offered_salary= $this->crud->get_currency_symbol($jobs['min_currency_type'])." ".$jobs['min_amount'];
        }
        else
        {
            $offered_salary= $this->crud->get_currency_symbol($jobs['min_currency_type'])." ".$jobs['min_amount']."-".$this->crud->get_currency_symbol($jobs['min_currency_type'])." ".$jobs['max_amount'];
        }

        


        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>'. $site_settings['site_name']. ' Applied Job Post </title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">
  <div style="margin:0 0 10px"> <img alt="'.$site_settings['site_name'].'" src="'.base_url().'/themes/images/logos/navbar-logo.png"> </div>
		<center><h3>You Have Applied For The Job</h3></center>
    <table width="100%" cellspacing="0" cellpadding="5" border="1">
        <tbody>
		<tr>
			<th>Jobs:</th>
			<th>Description:</th>
		</tr>
		<tr>
			<td>Title</td>
			<td>'.$jobs['job_title'].'</td>
		</tr>	
		<tr>
			<td>Job Category</td>
			<td>'.$this->crud->get_detail($jobs['job_category'],'comc_id','tbl_company_category')['company_category'].'</td>
		</tr>	
		<tr>
			<td>Job Level</td>
			<td>'.$this->crud->get_detail($jobs['job_level'],'joblevel_id','tbl_joblevel')['joblevel'].'</td>
		</tr>		
		<tr>
			<td>Job Type</td>
			<td>'.$this->crud->get_detail($jobs['job_type'],'comem_id','tbl_jobtype')['jobtype'].'</td>
		</tr>		
		<tr>
			<td>Job Location</td>
			<td>'.$jobs['job_location'].'</td>
		</tr>
		<tr>
			<td>Offered Salary</td>
			<td>'.$offered_salary.'</td>
		</tr>
		<tr>
			<td>Job Description</td>
			<td>'.$jobs['description'].'</td>
		</tr>		
        <tr>
            <td colspan="2" style="background:#800000; text-align:left;" align="center">
            		Thanks and Regards,<br />
                '.$site_settings['site_name'].' Team<br />
                 Tel:<strong>+977-1-4437892</strong><br />
                <a href="http://www.ccsnepal.com/" target="_blank" style="color:#46216F; text-decoration:underline;">info@ccsnepal.com</a>
            </td>
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

        $mail->Subject    = $site_settings['site_name']." User-Job Application";

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
    public function send_mail_super_admin($jobs)
    {
        $this->load->library('encrypt');
        $this->load->library('mailer');

        $site_users=$this->crud->get_detail($this->session->userdata('customer_id'),'customer_id',"igc_site_users");

        $site_settings = $this->site_settings_model->get_site_settings();
        $server = $this->crud->get_mail_info();

        $password = $this->encrypt->decode($server['password']);
        $mail  = new PHPMailer(); 
         
         $email=$server['username'];

        if($jobs['salary_type']=="0")
        {
            $offered_salary= $this->crud->get_currency_symbol($jobs['min_currency_type'])." ".$jobs['min_amount'];
        }
        else
        {
            $offered_salary= $this->crud->get_currency_symbol($jobs['min_currency_type'])." ".$jobs['min_amount']."-".$this->crud->get_currency_symbol($jobs['min_currency_type'])." ".$jobs['max_amount'];
        }

        


        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>'. $site_settings['site_name']. ' Applied Job Post </title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">
  <div style="margin:0 0 10px"> <img alt="'.$site_settings['site_name'].'" src="'.base_url().'/themes/images/logos/navbar-logo.png"> </div>
		<center><h3>User Has applied For Your Company</h3></center><br>
		<center><h2>'.$site_users['first_name'].' '.$site_users['last_name'].'</h2></center>
    <table width="100%" cellspacing="0" cellpadding="5" border="1">
        <tbody>
		<tr>
			<th>Jobs:</th>
			<th>Description:</th>
		</tr>
		<tr>
			<td>Title</td>
			<td>'.$jobs['job_title'].'</td>
		</tr>	
		<tr>
			<td>Job Category</td>
			<td>'.$this->crud->get_detail($jobs['job_category'],'comc_id','tbl_company_category')['company_category'].'</td>
		</tr>	
		<tr>
			<td>Job Level</td>
			<td>'.$this->crud->get_detail($jobs['job_level'],'joblevel_id','tbl_joblevel')['joblevel'].'</td>
		</tr>		
		<tr>
			<td>Job Type</td>
			<td>'.$this->crud->get_detail($jobs['job_type'],'comem_id','tbl_jobtype')['jobtype'].'</td>
		</tr>		
		<tr>
			<td>Job Location</td>
			<td>'.$jobs['job_location'].'</td>
		</tr>
		<tr>
			<td>Offered Salary</td>
			<td>'.$offered_salary.'</td>
		</tr>
		<tr>
			<td>Job Description</td>
			<td>'.$jobs['description'].'</td>
		</tr>		
        <tr>
            <td colspan="2" style="background:#800000; text-align:left;" align="center">
            		Thanks and Regards,<br />
                '.$site_settings['site_name'].' Team<br />
                 Tel:<strong>+977-1-4437892</strong><br />
                <a href="http://www.ccsnepal.com/" target="_blank" style="color:#46216F; text-decoration:underline;">info@ccsnepal.com</a>
            </td>
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

        $mail->Subject    = $site_settings['site_name']." SupderAdmin-Job Application";

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
     public function send_mail_employers($jobs)
    {
        $this->load->library('encrypt');
        $this->load->library('mailer');
        $site_users=$this->crud->get_detail($this->session->userdata('customer_id'),'customer_id',"igc_site_users");

        $site_settings = $this->site_settings_model->get_site_settings();
        $server = $this->crud->get_mail_info();

        $password = $this->encrypt->decode($server['password']);
        $mail  = new PHPMailer(); 



        if($jobs['employer_ref'] > 0)
        {
        	//$employer=$this->crud->get_detail($jobs['employer_ref'],'come_id','tbl_company_employers');
        	$email=$this->crud->get_detail($jobs['employer_ref'],'come_id','tbl_company_employers')['employer_email'];
        }
        else
        {
        	//$employer="admin";
        	$email=$server['username'];
        }
           
        if($jobs['salary_type']=="0")
        {
            $offered_salary= $this->crud->get_currency_symbol($jobs['min_currency_type'])." ".$jobs['min_amount'];
        }
        else
        {
            $offered_salary= $this->crud->get_currency_symbol($jobs['min_currency_type'])." ".$jobs['min_amount']."-".$this->crud->get_currency_symbol($jobs['min_currency_type'])." ".$jobs['max_amount'];
        }

        


        $body = '<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>'. $site_settings['site_name']. ' Applied Job Post </title>
</head>

<body>
<div style="width:580px;margin:0 auto;font:12px Arial,Helvetica,sans-serif;background:#fff">
  <div style="margin:0 0 10px"> <img alt="'.$site_settings['site_name'].'" src="'.base_url().'/themes/images/logos/navbar-logo.png"> </div>
		<center><h3>User Has applied For Your Company</h3></center><br>
		<center><h2>'.$site_users['first_name'].' '.$site_users['last_name'].'</h2></center>
    <table width="100%" cellspacing="0" cellpadding="5" border="1">
        <tbody>
		<tr>
			<th>Jobs:</th>
			<th>Description:</th>
		</tr>
		<tr>
			<td>Title</td>
			<td>'.$jobs['job_title'].'</td>
		</tr>	
		<tr>
			<td>Job Category</td>
			<td>'.$this->crud->get_detail($jobs['job_category'],'comc_id','tbl_company_category')['company_category'].'</td>
		</tr>	
		<tr>
			<td>Job Level</td>
			<td>'.$this->crud->get_detail($jobs['job_level'],'joblevel_id','tbl_joblevel')['joblevel'].'</td>
		</tr>		
		<tr>
			<td>Job Type</td>
			<td>'.$this->crud->get_detail($jobs['job_type'],'comem_id','tbl_jobtype')['jobtype'].'</td>
		</tr>		
		<tr>
			<td>Job Location</td>
			<td>'.$jobs['job_location'].'</td>
		</tr>
		<tr>
			<td>Offered Salary</td>
			<td>'.$offered_salary.'</td>
		</tr>
		<tr>
			<td>Job Description</td>
			<td>'.$jobs['description'].'</td>
		</tr>		
        <tr>
            <td colspan="2" style="background:#800000; text-align:left;" align="center">
            		Thanks and Regards,<br />
                '.$site_settings['site_name'].' Team<br />
                 Tel:<strong>+977-1-4437892</strong><br />
                <a href="http://www.ccsnepal.com/" target="_blank" style="color:#46216F; text-decoration:underline;">info@ccsnepal.com</a>
            </td>
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

        $mail->Subject    = $site_settings['site_name']." Employer-Job Application";

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
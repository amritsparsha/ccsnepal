 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MX_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('login_model', 'login');
        $this->load->model('crud_model', 'crud');


    }
    public function index()
    {
        is_logged_in();
        $data = array();

        $data['title'] = "Login";
        //$this->load->helper('form_helper');
        $this->load->library('form_validation');

        if ($this->input->post())
        {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');

            if ($this->form_validation->run()) {

                $username =  $this->input->post('username');
                $password =  md5($this->input->post('password'));
                $admin = $this->login->check_user($username, $password);
                if(! empty($admin)) {
                    $this->session->set_userdata('username', $username);
                    $this->session->set_userdata('admin_id', $admin['come_id']);
                    // $this->session->set_userdata('permission', $admin['permission']);
                    redirect('dashboard');
                } else {
                    $data['error'] = "Invalid Username / Password.";
                }
            }


        }

        $this->load->view('login.php', $data);
    }




    //function to activate account

    public function account_activation($code)
    {
        $detail =  $this->login->get_activation_detail($code);
        if(!empty($detail))
        {
            $update['active_status'] =  "Y";
            $update['updated']= date('Y-m-d:H:i:s');
            $result =  $this->crud->update($code,'activation_code', $update, 'tbl_company_employers');
            if($result)
            {
                $this->session->set_flashdata('success','Your account has been activated successfully.');
                redirect('login');
            }
            else{
                $this->session->set_flashdata('error','Unable to activate your account.');
                redirect('login');
            }
        }
        else{
            redirect('registration');
        }
    }



    public function logout()
    {
        $this->load->model('login_model', 'login');
        $user_id= $this->session->userdata('admin_id');
        $date = date("Y-m-d H:i:s");
        $this->login->update_info($date , $user_id);
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('permission');
        redirect();
    }
}
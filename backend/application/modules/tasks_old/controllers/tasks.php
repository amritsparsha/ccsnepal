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
        // print_r($_POST); exit();
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('form_validation');

        if ($this->input->post()) {

            $tasks_id = $this->input->post('tasks_id');
            // $assign_to  = $this->input->post('assign_to');
            $insert['title']      = $this->input->post('title');
            $insert['contact_id'] = $this->input->post('contact_id');
            $insert['assign_date'] = $this->input->post('assign_date');
            $insert['end_date']    = $this->input->post('end_date');
            $insert['task_type']   = $this->input->post('task_type');
            $insert['assign_by'] = $this->session->userdata('admin_id');
            // $insert['assign_to'] = $this->input->post('assign_to');
            $insert['tasks_status'] = $this->input->post('tasks_status');
            $insert['tasks_detail'] = $this->input->post('tasks_detail');
            // $assign_to = array("1", "2", "3");
            $assign_to = $this->input->post('assign_to');
            $folder_path    = '../uploads/taskss/';
            $rand           = md5(rand());
            $featuredimg    = $rand . str_replace(" ", "", $_FILES['featured_img']['name']);
            $featuredimgtmp = $_FILES['featured_img']['tmp_name'];

            if ($tasks_id == "") {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table             = 'igc_tasks';
                if ($_FILES['featured_img']['name'] != "") {
                    $insert['featured_img'] = $featuredimg;

                    move_uploaded_file($featuredimgtmp, $folder_path . $featuredimg);
                }
                $result    = $this->crud->insert($insert, $table);
                $insert_id = $this->db->insert_id();

                if ($result) {

                    if (!empty($assign_to)) {
                        // print_r($assign_to);
                        // exit();
                        foreach ($assign_to as $row) {
                            //print_r($row); exit();
                            $inserts['tasks_id'] = $insert_id;
                            $inserts['assign_by']  = $this->session->userdata('admin_id');
                            // $inserts['currency_id'] = $currency_id[$row];
                            // print_r($value);
                            // exit();
                            $inserts['assign_to'] = $row;
                            // $inserts['is_front'] = ($is_front == $row) ? 'Y' : 'N';
                            if ($inserts['assign_to'] != "" || $inserts['assign_to'] != "0") {
                                $this->mtasks->insert_tasks_assign($inserts);
                            }
                        }
                    }
                    $this->session->set_flashdata('success', 'New tasks has been added.');
                    redirect('tasks');
                } else {
                    $this->session->set_flashdata('error', 'Unable to add new tasks.');
                    redirect('tasks');
                }

            } else {

                $insert['updated'] = date('Y-m-d:H:i:s');
                if ($_FILES['featured_img']['name'] != "") {
                    $pre_featured_img = $this->input->post('pre_featuredimg');

                    @unlink($folder_path . $pre_featured_img);

                    $insert['featured_img'] = $featuredimg;

                    move_uploaded_file($featuredimgtmp, $folder_path . $featuredimg);

                }
                $table      = 'igc_tasks';
                $field_name = "tasks_id";
                $result     = $this->crud->update($tasks_id, $field_name, $insert, $table);
                if ($result) {

                    $this->session->set_flashdata('success', 'Tasks has been updated.');
                    redirect('tasks');
                } else {
                    $this->session->set_flashdata('error', 'Unable to update the tasks.');
                    redirect('tasks');
                }
            }

        }
        $table          = 'igc_tasks';
        $field_name     = "tasks_id";
        $data['tasks']  = $this->crud->get_detail($id, $field_name, $table);
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




}

<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Todo extends MX_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        //check_admin();

        $this->load->model('crud_model', 'crud');

    }

    public function index()
    {
        $table         = 'igc_todo';
        $data['todo'] = $this->crud->get_all($table);
        $data['title'] = "Todo List";
        $this->load->view('header', $data);
        $this->load->view('todo_list');
        $this->load->view('footer');
    }



    public function todo_all()
    {
        $table         = 'igc_todo';
        $data['todo'] = $this->crud->get_all($table);
        $data['title'] = "All Todo List";
        $this->load->view('header', $data);
        $this->load->view('todo_all');
        $this->load->view('footer');
    }

    //code to add/edit region

    public function form($id = 0)
    {
        if ($this->input->post()) {
            $todo_id             = $this->input->post('todo_id');
            $insert['title']      = $this->input->post('title');
            //$insert['contact_id'] = $this->input->post('contact_id');

            $insert['assign_date'] = $this->input->post('assign_date');
            $insert['end_date']    = $this->input->post('end_date');
            $insert['todo_type']   = $this->input->post('todo_type');

            $insert['assign_to']   = $this->input->post('assign_to');
            $insert['publish_status']   = $this->input->post('publish_status');
            $user_id= $this->session->userdata('admin_id');

            $insert['assign_by']   = $user_id;

            $insert['todo_status'] = $this->input->post('todo_status');

            $insert['todo_detail'] = $this->input->post('todo_detail');
            $folder_path            = '../uploads/todos/';
            $rand                   = md5(rand());
            $featuredimg            = $rand . str_replace(" ", "", $_FILES['featured_img']['name']);
            $featuredimgtmp         = $_FILES['featured_img']['tmp_name'];

            if ($todo_id == "") {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table             = 'igc_todo';
                if ($_FILES['featured_img']['name'] != "") {
                    $insert['featured_img'] = $featuredimg;

                    move_uploaded_file($featuredimgtmp, $folder_path . $featuredimg);

                }
                $result = $this->crud->insert($insert, $table);
                if ($result) {

                    $this->session->set_flashdata('success', 'New todo has been added.');
                    redirect('todo');
                } else {
                    $this->session->set_flashdata('error', 'Unable to add new todo.');
                    redirect('todo');
                }

            } else {

                $insert['updated'] = date('Y-m-d:H:i:s');
                if ($_FILES['featured_img']['name'] != "") {
                    $pre_featured_img = $this->input->post('pre_featuredimg');

                    @unlink($folder_path . $pre_featured_img);

                    $insert['featured_img'] = $featuredimg;

                    move_uploaded_file($featuredimgtmp, $folder_path . $featuredimg);

                }
                $table      = 'igc_todo';
                $field_name = "todo_id";
                $result     = $this->crud->update($todo_id, $field_name, $insert, $table);
                if ($result) {

                    $this->session->set_flashdata('success', 'Todo has been updated.');
                    redirect('todo');
                } else {
                    $this->session->set_flashdata('error', 'Unable to update the todo.');
                    redirect('todo');
                }

            }

        }
        $table          = 'igc_todo';
        $field_name     = "todo_id";
        $data['todo']  = $this->crud->get_detail($id, $field_name, $table);
        $data['script'] = "form_validator";
        $data['title']  = "Add/Edit todo";
        $this->load->view('header', $data);
        $this->load->view('todo_form');
        $this->load->view('footer');
    }

    //function to delete category

    public function todo_delete($todo_id)
    {
        $table      = 'igc_todo';
        $field_name = "todo_id";
        $result     = $this->crud->delete($todo_id, $field_name, $table);
        if ($result) {
            $this->session->set_flashdata('success', 'todo has been deleted.');
            redirect('todo');
        } else {
            $this->session->set_flashdata('error', 'Unable to delete the todo.');
            redirect('todo');
        }

    }

}

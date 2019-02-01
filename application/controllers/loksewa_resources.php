<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Loksewa_resources extends CI_Controller{
    private $per_page;
    public function __Construct()
    {
        parent::__Construct();
        $this->load->model('site_settings_model', 'settings');
        $this->load->model('loksewa_resources_model','loksewa');
        $this->load->model('crud_model','crud');

        $this->load->library('pagination');
        $this->per_page=3;
    }
    public function latest_resources($ref_no)
    {
            $detail= $this->loksewa->get_detail_resources($ref_no);
            $data['content']= $detail;
            if(count($data['content']) == 0)
            {
                redirect('home');
            }
            $data['sub_title'] = $detail['content_page_title']." ";
            $data['meta_title'] = $detail['meta_title'];
            $data['meta_description'] = $detail['meta_description'];
            $data['meta_keywords'] = $detail['meta_keywords'];
            $data['menu'] = $detail['content_url'];

            $data['recent_jobs'] = $this->crud->get_where_order_limit('tbl_job_post_all',array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1),"deadline","DESC",7);

            // 
            $site_settings=$this->site_settings_model->get_site_settings();
            $logo = $this->db->query("SELECT * FROM igc_pictures WHERE locate ='1' AND delete_status ='0'");
            $logors = $logo->result_array();
            foreach($logors  as $logos )
            {
                $path = 'uploads/pictures/';
                if (file_exists($path.$logos['pictures_image']) && $logos['pictures_image'] !="")
                {
                    $logo_image=$path.$logos['pictures_image'];
                }
            }
            // 

            $data['employer_image']=array();

            foreach ($data['recent_jobs'] as $key => $value) 
            {
                if($value['employer_ref'] == 0 )
                {
                     $data['employer_image'][$key] = $logo_image;
                }
                else
                {
                     $data['employer_image'][$key]= "uploads/company_employers/".$this->crud->get_detail($value['employer_ref'],"come_id","tbl_company_employers")['featured_img'];
                }
            }

            $data['scripts'] =  array('themes/js/form-validator/jquery.form-validator');
            $this->load->view('header', $data);
            $this->load->view('loksewa_resources/loksewa_resources_detail');
            $this->load->view('footer');
    }
     public function all_resources($start_point='')
    {
            $all_resources=$this->loksewa->get_all_resources();

            $data['recent_jobs'] = $this->crud->get_where_order_limit('tbl_job_post_all',array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1),"deadline","DESC",7);
              // 
            $site_settings=$this->site_settings_model->get_site_settings();
            $logo = $this->db->query("SELECT * FROM igc_pictures WHERE locate ='1' AND delete_status ='0'");
            $logors = $logo->result_array();
            foreach($logors  as $logos )
            {
                $path = 'uploads/pictures/';
                if (file_exists($path.$logos['pictures_image']) && $logos['pictures_image'] !="")
                {
                    $logo_image=$path.$logos['pictures_image'];
                }
            }
            // 

            $data['employer_image']=array();

            foreach ($data['recent_jobs'] as $key => $value) 
            {
                if($value['employer_ref'] == 0 )
                {
                     $data['employer_image'][$key] = $logo_image;
                }
                else
                {
                     $data['employer_image'][$key]= "uploads/company_employers/".$this->crud->get_detail($value['employer_ref'],"come_id","tbl_company_employers")['featured_img'];
                }
            }

            //pagination
                $start_point = ($start_point!='')? $start_point : 0;
                $count = count($all_resources);
                $page = "all_resources";
            //end of pagination
            $this->pagination("0",$start_point,$count,$page);

            $data['all_resources']=array_slice($all_resources,$start_point,$this->per_page);

            $this->load->view('header', $data);
            $this->load->view('loksewa_resources/loksewa_resources_list');
            $this->load->view('footer');
    }
    //paginations
    
    public function pagination($id,$start_point,$count,$page)
    {
            if($id=="0")
            {
                $config['base_url'] =  site_url('loksewa_resources/'.$page);
                $config['uri_segment'] = 3;
            }
            else
            {
                $config['base_url'] =  site_url('loksewa_resources/'.$page.'/'.$id);
                $config['uri_segment'] = 4;
            }
                $config['total_rows'] = $count;
                $config['per_page'] = $this->per_page;
              
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';

                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';

                $config['cur_tag_open'] = '<li class="active"><a>';
                $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

                $config['first_link'] = false;
                $config['last_link'] = false;

                $config['next_link'] = 'Â»';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';

                $config['prev_link'] = 'Â«';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';

                $this->pagination->initialize($config); 
    }

}
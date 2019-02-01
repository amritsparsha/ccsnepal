<?php
 class Jobs extends CI_Controller
 {
 	public function __construct()
 	{
 		parent::__construct();

 		$this->load->library('pagination');
 		$this->load->model('crud_model','crud');
 		$this->load->model('site_settings_model');
        $this->load->library('form_validation');

 		$this->per_page=3;
 	}

 	public $table="tbl_job_post_all";
 	private $per_page;


 	public function jobs_detail($id)
 	{
        // if(!empty($this->session->flashdata('error')))
        // {
        //     $data['error_from_job_apply']=$this->session->flashdata('error');
        // }
        // else
        // {
        //     $data['error_from_job_apply']=false;
        // }
 		$data['jobs']=$this->crud->get_detail($id,"job_id",$this->table);
 		$data['skills']=explode(",",$data['jobs']['skill_req_set']);

 		if($data['jobs']['admin_ref'] > 0 && $data['jobs']['employer_ref'] == 0)
 		{
 			$publisher=$data['jobs']['admin_ref'];
 			$data['publisher']="admin";

 			$data['company_jobs']['records']=$this->crud->get_where_order_limit($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1,'employer_ref '=>0),"deadline","DESC",3);
 			$data['company_jobs']['admin']="1";
            $data['email']=$this->site_settings_model->get_site_settings()['feedback_email'];
 		}
 		else
 		{
 			$publisher=$data['jobs']['employer_ref'];

 			$data['publisher']=$this->crud->get_detail($publisher,"come_id","tbl_company_employers");

 			$data['company_jobs']['records']=$this->crud->get_where_order_limit($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1,'employer_ref'=>$data['publisher']['come_id']),"deadline","DESC",3);
 			$data['company_jobs']['admin']="0";
 			$data['company_jobs']['emps']=$this->get_jobs_emps($data['company_jobs']['records']);
            $data['email']=$this->crud->get_detail($data['jobs']['employer_ref'],"come_id","tbl_company_employers")['employer_email'];
 		}

 		$data['similar_jobs']=$this->crud->get_where_order_limit($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1,'job_category'=>$data['jobs']['job_category']),"deadline","DESC",5);

 		$data['similar_jobs_emps']=$this->get_jobs_emps($data['similar_jobs']);

 		$this->load->view('header',$data);
 		$this->load->view('jobs/job_details');
 		$this->load->view('footer');
 	}

 	public function get_jobs_emps($jobs)
 	{
 		$result=array();
 		foreach($jobs as $key=>$job)
 		{
 			$emp_id=$job['employer_ref'];		//if admin only then employer_ref=0;else assigned to employer or emp=id
 			$result[$key]=$emp_id;
 		}
 		return $result;
 	}

 	public function all_jobs($start_point='')
 	{
 		$data['title_main']="All";
 		$data['title_second']="Jobs";
 		$all_jobs=$this->crud->get_where_order($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1),"deadline","DESC");
 		
    //pagination
		$start_point = ($start_point!='')? $start_point : 0;
        $count = count($all_jobs);
        $page = "jobs-list";
    //end of pagination
        $this->pagination("0",$start_point,$count,$page);

        $data['all_jobs']=$this->crud->get_where_order_pagination($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1),"deadline","DESC",$start_point,$this->per_page);

 		$this->load->view('header',$data);
 		$this->load->view('jobs/job_category');
 		$this->load->view('footer');
 	}

 	public function jobs_category($id,$start_point='')
 	{
 		$data['jobs_cat_detail']=$this->crud->get_detail($id,"comc_id","tbl_company_category");
 		$all_jobs=$this->crud->get_where_order($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1,'job_category'=>$id),"deadline","DESC");

    //pagination
		$start_point = ($start_point!='')? $start_point : 0;
        $count = count($all_jobs);
        $page = "jobs-category";
    //end of pagination
    
        $this->pagination($id,$start_point,$count,$page);

        $data['all_jobs']=$this->crud->get_where_order_pagination($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1,'job_category'=>$id),"deadline","DESC",$start_point,$this->per_page);

 		$data['title']=$data['jobs_cat_detail']['company_category'];
 		$data['title_main']=$data['jobs_cat_detail']['company_category'];
 		$data['title_second']="Jobs";

 		$this->load->view('header',$data);
 		$this->load->view('jobs/job_category');
 		$this->load->view('footer');
 	}
 	public function jobs_level($id,$start_point='')
 	{
 		$data['jobs_level_detail']=$this->crud->get_detail($id,"joblevel_id","tbl_joblevel");

 		$data['title']=$data['jobs_level_detail']['joblevel'];
 		$data['title_main']=$data['jobs_level_detail']['joblevel'];
 		$data['title_second']="Jobs";

 		$all_jobs=$this->crud->get_where_order($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1,'job_level'=>$id),"deadline","DESC");

 		 //pagination
		$start_point = ($start_point!='')? $start_point : 0;
        $count = count($all_jobs);
        $page = "jobs-level";
    //end of pagination
    
        $this->pagination($id,$start_point,$count,$page);

        $data['all_jobs']=$this->crud->get_where_order_pagination($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1,'job_level'=>$id),"deadline","DESC",$start_point,$this->per_page);

 		$this->load->view('header',$data);
 		$this->load->view('jobs/job_category');
 		$this->load->view('footer');
 	}
 	public function jobs_type($id,$start_point='')
 	{
 		$data['jobs_type_detail']=$this->crud->get_detail($id,"comem_id","tbl_jobtype");

 		$data['title']=$data['jobs_type_detail']['jobtype'];
 		$data['title_main']=$data['jobs_type_detail']['jobtype'];
 		$data['title_second']="Jobs";

 		$all_jobs=$this->crud->get_where_order($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1,'job_type'=>$id),"deadline","DESC");
    //pagination
		$start_point = ($start_point!='')? $start_point : 0;
        $count = count($all_jobs);
        $page = "jobs-type";
    //end of pagination
        $this->pagination($id,$start_point,$count,$page);

        $data['all_jobs']=$this->crud->get_where_order_pagination($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1,'job_type'=>$id),"deadline","DESC",$start_point,$this->per_page);

 		$this->load->view('header',$data);
 		$this->load->view('jobs/job_category');
 		$this->load->view('footer');
 	}
 	public function jobs_emps_cat($id,$start_point='')
 	{
		$start_point = ($start_point!='')? $start_point : 0;
        $page = "jobs-employer";

 		$site_settings=$this->site_settings_model->get_site_settings();
 		$data['jobs']=$this->crud->get_detail($id,"job_id",$this->table);

 		if($data['jobs']['admin_ref'] > 0 && $data['jobs']['employer_ref'] == 0)
 		{
 			$all_jobs=$this->crud->get_where_order($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1,'admin_ref >'=>0),"deadline","DESC");

 			$data['title']=$site_settings['site_name'];
	 		$data['title_main']=$site_settings['site_name'];
	 		$data['title_second']="Jobs";
	 		 //pagination
 		
	        $count = count($all_jobs);
	        $this->pagination($id,$start_point,$count,$page);

        	$data['all_jobs']=array_slice($all_jobs,$start_point,$this->per_page);
 		}
 		else
 		{	
 			$all_jobs=$this->crud->get_where_order($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1,'employer_ref'=>$data['jobs']['employer_ref']),"deadline","DESC");

 			$data['title']=$this->crud->get_detail($data['jobs']['employer_ref'],"come_id","tbl_company_employers")['company_employers'];
	 		$data['title_main']=$this->crud->get_detail($data['jobs']['employer_ref'],"come_id","tbl_company_employers")['company_employers'];
	 		$data['title_second']="Jobs";
	 		
	 		$count = count($all_jobs);
	        $this->pagination($id,$start_point,$count,$page);

        	$data['all_jobs']=array_slice($all_jobs,$start_point,$this->per_page);
 		}

 		$this->load->view('header',$data);
 		$this->load->view('jobs/job_category');
 		$this->load->view('footer');
 	}
 	public function jobs_skills_cat($skill,$start_point='')
 	{
 		$skill=strtolower($skill);

 		$jobs=$this->crud->get_where_order($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1),"deadline","DESC");

 		$data['all_jobs']=array();
 		foreach ($jobs as $key => $value) 
 		{
 			if(strpos(strtolower($value['skill_req_set']),$skill) !== false )
 			{
 				$all_jobs[]=$value;
 			}
 		}
 		 //pagination
 		
		$start_point = ($start_point!='')? $start_point : 0;
        $count = count($all_jobs);
        $page = "jobs-skill";
    //end of pagination
    
        $this->pagination($skill,$start_point,$count,$page);

        $data['all_jobs']=array_slice($all_jobs,$start_point,$this->per_page);

 		$data['title']=$skill;
	 	$data['title_main']=$skill;
	 	$data['title_second']="Jobs";

 		$this->load->view('header',$data);
 		$this->load->view('jobs/job_category');
 		$this->load->view('footer');
 	}
 	public function job_location($location,$start_point='')
 	{
 		$location=strtolower($location);

 		$all_jobs=$this->crud->get_job_with_location($location);

 		$data['title']=$location;
	 	$data['title_main']=$location;
	 	$data['title_second']="Jobs";

	//pagination
		$start_point = ($start_point!='')? $start_point : 0;
        $count = count($all_jobs);
        $page = "job-location";
    //end of pagination
        $this->pagination($location,$start_point,$count,$page);

        $data['all_jobs']=array_slice($all_jobs,$start_point,$this->per_page);

 		$this->load->view('header',$data);
 		$this->load->view('jobs/job_category');
 		$this->load->view('footer');
 	}
    public function jobs_availability($value,$start_point='')
    {
        if($value=="full_time"){
            $data['title']="Full Time Jobs";
            $data['title_main']="Full Time";
        }
        elseif($value=="part_time"){
             $data['title']="Part Time Jobs";
            $data['title_main']="Part Time";
        }
        else
        {
            $data['title']="Contract Jobs";
            $data['title_main']="Contract";
        }
        $data['title_second']="Jobs";

        $all_jobs=$this->crud->get_where_order($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1,'availability_for'=>$value),"deadline","DESC");
    //pagination
        $start_point = ($start_point!='')? $start_point : 0;
        $count = count($all_jobs);
        $page = "jobs-availability";
    //end of pagination
        $this->pagination($value,$start_point,$count,$page);

        $data['all_jobs']=$this->crud->get_where_order_pagination($this->table,array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1,'availability_for'=>$value),"deadline","DESC",$start_point,$this->per_page);

        $this->load->view('header',$data);
        $this->load->view('jobs/job_category');
        $this->load->view('footer');
    }


 	//paginations
 	
 	public function pagination($id,$start_point,$count,$page)
 	{
 			if($id=="0")
 			{
                $config['base_url'] =  site_url($page);
                $config['uri_segment'] = 2;
 			}
 			else
 			{
                $config['base_url'] =  site_url($page.'/'.$id);
                $config['uri_segment'] = 3;
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
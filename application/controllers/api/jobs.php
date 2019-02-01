<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model','crud');
        header('Content-type:application/json');
	}

	public function index()
	{
		$data['jobs']=$this->crud->get_where('tbl_job_post_all',array('delete_status'=>0,'publish_status'=>1,'super_publish_status'=>1));
		if($data['jobs'] > 0)
		{
			echo json_encode($data);
		}
		else
		{
			echo json_encode(array('message'=>"No Jobs Found"));
		}
	}
	public function detail()
	{
		$id=$this->input->get('id');
		$data['jobs']=$this->crud->get_detail($id,'job_id','tbl_job_post_all');
		if($data['jobs'] > 0)
		{
			echo json_encode($data);
		}
		else
		{
			echo json_encode(array('message'=>"No Jobs Found"));
		}
	}
	public function jobs_create()
	{
		$jobs=json_decode(file_get_contents('php://input'),TRUE);

		$job=$jobs['jobs'];

// 		echo "<pre>";
// 			print_r($jobs);
// 		echo "</pre>";
// exit;
		//print_r($job);
		$insert=array(
			"admin_ref"=> $job['admin_ref'],
            "employer_ref"=> $job['employer_ref'],
            "job_title"=> $job['job_title'],
            "job_type"=> $job['job_type'],
            "No_vacancy"=> $job['No_vacancy'],
            "job_level"=>$job['job_level'],
            "job_category"=> $job['job_category'],
            "job_sub_category"=> $job['job_sub_category'],
            "availability_for"=> $job['availability_for'],
            "deadline"=> $job['deadline'],
            "job_location"=> $job['job_location'],
            "min_currency_type"=> $job['min_currency_type'],
            "salary_type"=> $job['salary_type'],
            "min_amount"=> $job['min_amount'],
            "max_currency_type"=> $job['max_currency_type'],
            "created"=> $job['created'],
            "updated"=> $job['updated'],
            "publish_status"=> $job['publish_status'],
            "super_publish_status"=>$job['super_publish_status'],
            "delete_status"=>$job['delete_status']
		);
		

		$result=$this->crud->insert($insert,"tbl_job_post_all");

		if($result)
		{	
			echo json_encode(array('message'=>'successfully inserted'));
		}
		else
		{
			echo json_encode(array('message'=>'unable to insert'));
		}
	}
	public function jobs_update()
	{
		header('Access-Control-Allow-Methods:PUT');
		header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

		$jobs=json_decode(file_get_contents('php://input'),TRUE);

		$job=$jobs['jobs'];

// 		echo "<pre>";
// 			print_r($jobs);
// 		echo "</pre>";
// exit;
		//print_r($job);
		$insert=array(
			"job_id"=>$job['job_id'],
			"admin_ref"=> $job['admin_ref'],
            "employer_ref"=> $job['employer_ref'],
            "job_title"=> $job['job_title'],
            "job_type"=> $job['job_type'],
            "No_vacancy"=> $job['No_vacancy'],
            "job_level"=>$job['job_level'],
            "job_category"=> $job['job_category'],
            "job_sub_category"=> $job['job_sub_category'],
            "availability_for"=> $job['availability_for'],
            "deadline"=> $job['deadline'],
            "job_location"=> $job['job_location'],
            "min_currency_type"=> $job['min_currency_type'],
            "salary_type"=> $job['salary_type'],
            "min_amount"=> $job['min_amount'],
            "max_currency_type"=> $job['max_currency_type'],
            "created"=> $job['created'],
            "updated"=> $job['updated'],
            "publish_status"=> $job['publish_status'],
            "super_publish_status"=>$job['super_publish_status'],
            "delete_status"=>$job['delete_status']
		);
		

		$result=$this->crud->update($job['job_id'],"job_id",$insert,"tbl_job_post_all");

		if($result)
		{	
			echo json_encode(array('message'=>'successfully updated'));
		}
		else
		{
			echo json_encode(array('message'=>'unable to update'));
		}
	}
	public function delete()
	{
		header('Access-Control-Allow-Methods:DELETE');
		header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

		$jobs=json_decode(file_get_contents('php://input'),TRUE);

		$job=$jobs['jobs'];

// 		echo "<pre>";
// 			print_r($jobs);
// 		echo "</pre>";
// exit;
		//print_r($job);
		

		$result=$this->crud->delete($job['job_id'],"job_id","tbl_job_post_all");

		if($result)
		{	
			echo json_encode(array('message'=>'successfully deleted'));
		}
		else
		{
			echo json_encode(array('message'=>'unable to delete'));
		}
	}
}
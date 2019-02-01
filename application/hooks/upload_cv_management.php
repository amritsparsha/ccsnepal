<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_cv_management extends CI_Hooks
{
	private $CI;
	public function __construct()
	{
		parent::__construct();
       
		$this->CI = &get_instance();
        $this->CI->load->model('crud_model','crud');

	}
	public function delete_wasted_cv()
	{
        $date = new DateTime(); //date & time of right now. (Like time())
        $twoDayPeriod = new DateInterval('P2D'); //period of 1 day
        $twoDayBefore = $date->sub($twoDayPeriod);
        $dateLimit = $twoDayBefore->format('Y-m-d:H:i:s');


        $wasted_cv=$this->CI->crud->wasted_cv($dateLimit);

        foreach ($wasted_cv as $key => $value) 
        {
            $path="uploads/site_users_biodata/";
            @unlink($path.$value['file_name']);

            $this->CI->crud->delete($value['cuc_id'],'cuc_id',"tbl_cust_uploaded_cv");
        }
		
	}
}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_biodata extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('crud_model','crud');
	}
	public $table="tbl_cust_uploaded_cv";

	public function upload_cv()
    {
    	if(empty($this->session->userdata('customer_id')))
    	{
	    	if($_FILES['upload_cv']['name'] != '')
		    {

		    		$path="uploads/site_users_biodata/";
			        $fileTmpName=$_FILES['upload_cv']['tmp_name'];
			        $fileName= md5(rand()).str_replace(" ","",$_FILES['upload_cv']['name']);

			        move_uploaded_file($fileTmpName, $path.$fileName);

			        $insert['customer_id']=null;
			        $insert['file_name']=$fileName;
			        $insert['created']=date('Y-m-d:H:i:s');
			        $insert['updated']=null;
			        $insert['publish_status']='0';
			        $insert['delete_status']='1';

			        $cuc_id=$this->crud->insert_return_id($insert,"tbl_cust_uploaded_cv");

		        $fileArray = pathinfo($_FILES['upload_cv']['name']);
		        $file_ext  = $fileArray['extension'];

		        if($file_ext == "doc" || $file_ext == "docx" || $file_ext == "xlsx" || $file_ext == "pptx")
		        {
		        	include_once APPPATH . 'classes/DocxConversion.php';

				    $file=$path.$fileName;
				    $docObj = new DocxConversion($file);
					$parsed_text= $docObj->convertToText();
		        }
		        elseif($file_ext == "pdf")
		        {

			    // to parse the pdf file to get email
			        include 'vendor/autoload.php';
					$parser = new \Smalot\PdfParser\Parser();
					$pdf    = $parser->parseFile($path.$fileName);
					$parsed_text = $pdf->getText();
			    }
			    else{
			    	redirect('home');
			    }

				//to get emails from parsed text
					$pattern = '/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]{2,4})(?:\.[a-z]{2})?/i';
				    preg_match_all($pattern, $parsed_text, $matches);
			    // end of pdf parser
			    
			        $this->session->set_userdata('upload_cv_flag',1);
			        if(!empty($matches[0][0]))
			        {
			       		 $this->session->set_userdata('uc_email',$matches[0][0]);
			        }
			        else
			        {
			        	$this->session->set_userdata('uc_email',"email");
			        }

			        $this->session->set_userdata('cuc_id',$cuc_id);

			        // $data['email']=$matches[0][0];
			        // $data['cuc_id']=$cuc_id;

			        $data['success']= "Successfully Uploaded Cv. Please Register.";

			        $data['scripts'] = array('themes/script/js/form-validator/jquery.form-validator');
			        $data['sub_title'] =  "Register"." ";

			        $this->load->view('header', $data);
			        $this->load->view('user/register', $data);
			        $this->load->view('footer');
		    }
		    else
		    {
		    	redirect('home');
		    }
    	}
    	else
    	{
    				$customer_id=$this->session->userdata('customer_id');
    			    $path="uploads/site_users_biodata/";
			        $fileTmpName=$_FILES['upload_cv']['tmp_name'];
			        $fileName= md5(rand()).str_replace(" ","",$_FILES['upload_cv']['name']);

			        move_uploaded_file($fileTmpName, $path.$fileName);

			        $insert['customer_id']=$customer_id;
			        $insert['file_name']=$fileName;
			        $insert['created']=date('Y-m-d:H:i:s');
			        $insert['updated']=null;
			        $insert['publish_status']='1';
			        $insert['delete_status']='0';

			        //code to deactivate the previous CV updated
			        $previous_cv = $this->crud->get_where($this->table,array('publish_status'=>1,'delete_status'=>0,'customer_id'=>$customer_id));
			        foreach ($previous_cv as $key => $cv) 
			        {
			        	$update['publish_status']='0';
			        	$update['delete_status']='1';
			        	$this->crud->update($cv['cuc_id'],'cuc_id',$update,$this->table);
			        }
			        //end
			        
			        $result=$this->crud->insert($insert,$this->table);

			        if($result)
			        {
			        	$this->session->set_userdata('succes',"Successfully Uploaded Cv.");	
			        	redirect('home');
			        }
			        else
			        {
			        	$this->session->set_userdata('error',"Unable To Upload Cv.");	
			        	redirect('home');
			        }
    	}
        // header('Content-type:application/json');
        // echo json_encode($data);
    }
}
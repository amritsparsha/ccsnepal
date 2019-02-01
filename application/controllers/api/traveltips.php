<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Traveltips extends CI_Controller
{
    public function __Construct()
    {
        parent::__construct();
        $this->load->model('api/content_api_model', 'content');
        header('Content-type:application/json');

    }

    public function index()
    {
        $detail =  $this->content->get_content_detail('traveltips');

        if(!empty($detail))
        {

            $tabs=  $this->crud_model->get_detail($detail['content_id'], 'content_id', 'igc_content_tabs');
            $details['title'] =  $detail['content_page_title'];
            $details['body'] =  $detail['content_body'];
          if(!empty($tabs))
          {

              $tab1['name']= $tabs['tab1'];
              $tab1['body']= $tabs['description1'];
              $tab2['name']= $tabs['tab2'];
              $tab2['body']= $tabs['description2'];
              $tab3['name']= $tabs['tab3'];
              $tab3['body']= $tabs['description3'];
              $tab4['name']= $tabs['tab4'];
              $tab4['body']= $tabs['description4'];
              $tab5['name']= $tabs['tab5'];
              $tab5['body']= $tabs['description5'];


              $dyamictab1 =  array($tab1);
              $dyamictab2 = array($tab2);
              $dyamictab3 = array($tab3);
              $dyamictab4 = array($tab4);
              $dyamictab5= array($tab5);

              $tab =  array_merge($dyamictab1, $dyamictab2, $dyamictab3, $dyamictab4, $dyamictab5);


          }
          else{
              $tab =  $tabs;
          }
              $details['tabs'] =  $tab;
            $this->deliver_response("SUCCESS",200, "Travel Tips Found", "travelTips", $details);
        }
        else{
            $this->deliver_response("SUCCESS",204, "Travel Tips Not Found", "travelTips", NULL);
        }


    }

    public function deliver_response($status, $status_code, $status_message, $array_name, $data)
    {
        $response['status'] = $status;
        $response['status_code'] = $status_code;
        $response['status_message'] = $status_message;
        $response[$array_name] = $data;

        $json_response = json_encode($response);
        echo $json_response;
    }


}
?>
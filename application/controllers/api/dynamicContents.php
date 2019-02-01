<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class dynamicContents extends CI_Controller
{
    public function __Construct()
    {
        parent::__construct();
        $this->load->model('api/content_api_model', 'content');
        header('Content-type:application/json');

    }

    public function index()
    {

        $triptypes =  $this->crud_model->get_all('igc_trip_setting');
        $referes =  $this->crud_model->get_all('igc_refer_setting');
        $countries =  $this->crud_model->get_all('igc_country');
        $titles =  $this->crud_model->get_all('igc_title_setting');
        if(! empty($triptypes))
        {
           foreach ($triptypes as $key => $value)
           {
               $trip[$key]['id'] =  $value['id'];
               $trip[$key]['name'] =  $value['name'];
           }
        }
        else{
         $trip =  $triptypes;
        }


        if(! empty($referes))
        {
            foreach ($referes as $key => $value)
            {
                $refer[$key]['id'] =  $value['id'];
                $refer[$key]['name'] =  $value['name'];
            }
        }
        else{
            $refer =  $referes;
        }


        if(! empty($countries))
        {
            foreach ($countries as $key => $value)
            {
                $country[$key]['id'] =  $value['id'];
                $country[$key]['name'] =  $value['name'];
            }
        }
        else{
            $country =  $countries;
        }

        if(! empty($titles))
        {
            foreach ($titles as $key => $value)
            {
                $title[$key]['id'] =  $value['id'];
                $title[$key]['name'] =  $value['name'];
            }
        }
        else{
            $title =  $titles;
        }


        $dyanmic_contents['tripTypes'] =  $trip;
        $dyanmic_contents['referers'] =  $refer;
        $dyanmic_contents['countries'] =  $country;
        $dyanmic_contents['titles'] =  $title;

        $this->deliver_response("SUCCESS", 200,"Dynamic Contents",  "contents", $dyanmic_contents);


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
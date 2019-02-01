<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Appuser extends CI_Controller
{
    public function __Construct()
    {
        parent::__construct();
        header('Content-type:application/json');

    }

    public function register()
    {
        $appResponse = json_decode(file_get_contents('php://input'), TRUE);
        if($appResponse)
        {
            $userDetails = $appResponse['userRegister'];
             //$this->deliver_responses(200, "success", "Testing Success", $userDetails);
            if(!empty($userDetails))
            {
                // Getting posted values.
                $insert['appVersion'] = $userDetails['appVersion'];
                $insert['email'] = $userDetails['email'];
                $insert['deviceId'] = $userDetails['deviceId'];
                $insert['regId'] = $userDetails['regId'];
                $insert['platform']  = $userDetails['platform'];
                $insert['status']  = "1";
                $insert['created']  = date('Y-m-d:H:i:s');
                
                $check_detail =  $this->crud_model->get_detail($insert['deviceId'], 'deviceId', 'igc_appuser');

                if(!empty($check_detail)) {

                    $user_result =  $this->crud_model->update($insert['deviceId'], 'deviceId', $insert, 'igc_appuser');
                }
                else {
                    $user_result =  $this->crud_model->insert($insert, 'igc_appuser');
                }


                if($user_result)
                {

                        $this->deliver_response("SUCCESS", 200, "Registration Successful");

                    }
                    else{
                        $this->deliver_response(500, "ERROR", "Registration Unsuccessful", "Null");

                    }
                }



            else{
                $this->deliver_response("ERROR", 204, "Empty User Details");
            }

        }

        else
        {
            $this->deliver_response("ERROR", 400, "Bad Request");
        }

    }


    public function deliver_response($status, $status_code, $status_message)
    {
        $response['status'] = $status;
        $response['status_code'] = $status_code;
        $response['status_message'] = $status_message;

        $json_response = json_encode($response);
        echo $json_response;
    }


    }
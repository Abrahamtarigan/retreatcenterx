<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
       public function __construct()
       {
              parent::__construct();
              $this->load->model('Api_user_model');
              $this->load->model('api/Rooms_api_model', 'Rooms_model');
       }

       public function login()
       {
              $userEmail = $this->input->post('userEmail');
              $userPassword = $this->input->post('userPassword');

              // Authenticate the user
              $user = $this->Api_user_model->authenticate($userEmail, $userPassword);

              if ($user) {
                     // Generate and save access token
                     $accessToken = $this->Api_user_model->generateAccessToken($user->userId);

                     // Return the token as a JSON response
                     $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode(array('access_token' => $accessToken)));
              } else {
                     // Invalid credentials
                     $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode(array('error' => 'Invalid credentials')));
              }
       }
       public function list_room()
       {
              // Get the Bearer Token from the request headers
              $authorizationHeader = $this->input->get_request_header('Authorization', TRUE);

              // Check if the Bearer Token exists
              if ($authorizationHeader) {
                     // Extract the token from the header
                     $accessToken = str_replace('Bearer ', '', $authorizationHeader);

                     // Check if the token is valid
                     $user = $this->Api_user_model->getUserByToken($accessToken);

                     if ($user) {
                            // Access Token is valid, proceed to access the data from tb_rooms
                            $roomsData = $this->Rooms_model->getRoomsData();

                            // Return the data as a JSON response
                            $this->output
                                   ->set_content_type('application/json')
                                   ->set_output(json_encode($roomsData));
                     } else {
                            // Invalid Access Token
                            $this->output
                                   ->set_status_header(401)
                                   ->set_content_type('application/json')
                                   ->set_output(json_encode(array('error' => 'Invalid Access Token')));
                     }
              } else {
                     // Access Token not found in headers
                     $this->output
                            ->set_status_header(401)
                            ->set_content_type('application/json')
                            ->set_output(json_encode(array('error' => 'Access Token not found')));
              }
       }
}

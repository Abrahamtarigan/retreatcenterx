<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use Google\Authenticate;

class Signin extends CI_Controller {

	function login()
    {
                // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
     $client_id = '384530432813-taev4rrul6piub0u9tor3bh23inm61ql.apps.googleusercontent.com';
     $client_secret = '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';
     $redirect_uri = 'http://localhost:8888/retretc/signin/';

        //Create Client Request to access Google API
        $client = new Google_Client();
        $client->setApplicationName("Yourappname");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");

        //Send Client Request
        $objOAuthService = new Google_Service_Oauth2($client);
        
        $authUrl = $client->createAuthUrl();
        
        header('Location: '.$authUrl);
    }
	public function index()
    {
            // Fill CLIENT ID, CLIENT SECRET ID, REDIRECT URI from Google Developer Console
     $client_id = '384530432813-taev4rrul6piub0u9tor3bh23inm61ql.apps.googleusercontent.com';
     $client_secret = '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';
     $redirect_uri = 'http://localhost:8888/retretc/signin/';

    //Create Client Request to access Google API
	//include_once APPPATH . "../vendor/autoload.php";
    $client = new Google_Client();
    $client->setApplicationName("Yourappname");
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);
    $client->addScope("email");
    $client->addScope("profile");

    //Send Client Request
    $service = new Google_Service_Oauth2($client);

    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    
    // User information retrieval starts..............................

    $user = $service->userinfo->get(); //get user info 

    echo "</br> User ID :".$user->id; 
    echo "</br> User Name :".$user->name;
    echo "</br> Gender :".$user->gender;
    echo "</br> User Email :".$user->email;
    echo "</br> User Link :".$user->link;    
    echo "</br><img src='$user->picture' height='200' width='200' > ";
       
    }
	public function logout()
	 {
	  $this->session->unset_userdata('access_token');

	  $this->session->unset_userdata('user_data');
	  echo "Logout berhasil";
	 }
}
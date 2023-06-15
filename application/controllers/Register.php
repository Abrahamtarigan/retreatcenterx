<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

public function __construct()
{
	parent::__construct();
	require_once APPPATH.'third_party/src/Google_Client.php';
	require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
    $this->load->model('User_model', 'user');
    $this->load->library('session');
	
}
	
	public function index()
	{
	
		$clientId = '384530432813-taev4rrul6piub0u9tor3bh23inm61ql.apps.googleusercontent.com'; //Google client ID
		$clientSecret = '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'; //Google client secret
		$redirectURL = base_url() .'register';		//https://curl.haxx.se/docs/caextract.html

		//Call Google API
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		
		if(isset($_GET['code']))
		{
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])) 
		{
			$gClient->setAccessToken($_SESSION['token']);
		}
		
		if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
			// echo "<pre>";
			// print_r($userProfile);
			// cek userProfile kedalam database
			$user = $this->db->get_where('user', ['userGoogleId' => $userProfile['id']])->row_array();
			if ($user) {
				// jika usernya ada berdasarkan data ['id'] yang diterima dari google 
				// dalam database terdapat didalam kolom 'userGoogleId'
				if ($user['userGoogleId'] == $userProfile['id']) 
				{
	
					// buat session dari user yang sedang login
					$data = [
						'userEmail' => $user['userEmail'],
						'role_id' => $user['role_id'],
						//'status' => 'login'
					];
					$this->session->set_userdata($data);

					// jika login sebagai administrator
					if ($user['role_id'] == 102) {
						
						$this->session->set_flashdata('message-berhasil', 'Kami sedang mempersiapkan layanan anda');
						//header('Location: '.$_SERVER['PHP_SELF']);
						//redirect($uri, 'refresh');
						$this->load->library('user_agent');
					}
					// // jika login sebagai guess atau tamu 
					// elseif($user['role_id'] == 1) {

					// 	echo "anda berhasil masuk sebagai guess";
					// }
					// // jika akun belum ada
					// // sebenernya kondisi ini tidak ada karena jika user yang belum mendaftar
					// // akan langsung terigistrasi melalui controller ('Register/Register_Proses')
					else{
						echo "anda belum terdaftar";
					}
				}

			}
			// jika user belum terdaftar maka kirim ke controller ('Register/Register_Proses')
			else{
				$this->session->set_flashdata('item_register', $userProfile);
				redirect('Register/Register_proses');
			}
            
        } 
		else 
		{
            $url = $gClient->createAuthUrl();
		    header("Location: $url");
            exit;
        }
	}	

    public function Register_proses()
    {
		
        $userProfile= $this->session->flashdata('item_register');
		$user = $userProfile;
        $data = array(
            //'userId' => $userProfile['id'],
			'userGoogleId' => $user['id'],
            'userNama' => $user['name'],
            'userEmail' => $user['email'],
            'image' => $user['picture'],
            'role_id' => 4,
            'is_active' => 1
     );
     $this->user->tambahUser($data, 'user');
     echo "Akun Anda Berhasil di singkronkan ";
     echo $userProfile['name'];
	 echo $userProfile['id'];
     die;
     
    }
    public function logout()
    {
   
       $this->session->sess_destroy(); 
        
       // Redirect to login page 
       redirect('auth/sign_in'); 
   
    }
}

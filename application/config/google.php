<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '384530432813-taev4rrul6piub0u9tor3bh23inm61ql.apps.googleusercontent.com';
$config['google']['client_secret']    = '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';
$config['google']['redirect_uri']     = 'http://localhost:8888/retretc/signin/';
$config['google']['application_name'] = 'Login Retreat Centre';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();
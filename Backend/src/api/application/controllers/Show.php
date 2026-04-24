<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Show extends CI_Controller
{
    public function index()
    {
        show_404();
    }
    
}
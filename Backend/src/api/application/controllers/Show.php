<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Show extends CI_Controller
{
    public function index()
    {
        $requested = $this->input->get("file");
        if (!$requested) {
            print_r("File not found");
            return;
        }

        $base = realpath(BASEPATH . "../../");
        $resolved = realpath($base . DIRECTORY_SEPARATOR . $requested);

        if ($resolved === false || strpos($resolved, $base . DIRECTORY_SEPARATOR) !== 0) {
            print_r("File not found");
            return;
        }

        $content = @file_get_contents($resolved);
        if ($content === false) {
            print_r("File not found");
        } else {
            print_r($content);
        }
    }
    
}
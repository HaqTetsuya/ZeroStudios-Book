<?php
defined('BASEPATH') or exit('No script direct access allowed');
class Dashboard extends CI_Controller
{
    function test(){
        $this->load->view('index3');
    }
}
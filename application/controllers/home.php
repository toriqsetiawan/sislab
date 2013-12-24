<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('validated') != true) redirect('e-admin');
    }
    
    function index()
    {
        $this->home();
    }

    private function home()
    {
    	$this->load->view('admin/header');
    	$this->load->view('admin/body');
    	$this->load->view('admin/footer');
    }
 }
 ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_home extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        if($this->session->userdata('validated') == true || $this->session->userdata('status') == true) {
            $data = $this->session->all_userdata();
            $data['status'] = "Logout"; 
        } else {
            $data['status'] = "Login";
        }

        $this->home($data);
    }
    
    private function home($data)
    {
        $this->load->view('fe/fe-header', $data);
        $this->load->view('fe/fe-body');
        $this->load->view('fe/fe-footer');
    }
}
?>
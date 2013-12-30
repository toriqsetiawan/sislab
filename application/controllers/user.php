<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('validated') != true) redirect('e-admin');
    }
    
    function index()
    {
        $this->session->set_userdata('msg', '');
        $this->load->model('user_model');

        $asisten = $this->user_model->get_all_user('asisten');
        $dosen = $this->user_model->get_all_user('dosen');

        $count_asisten = $this->user_model->get_count('asisten');
        $count_dosen = $this->user_model->get_count('dosen');

        $this->home($asisten, $dosen, $count_asisten, $count_dosen); 
    }


    private function home($asisten, $dosen, $count_asisten, $count_dosen)
    {
        $this->load->view('admin/header');
        $this->load->view('admin/user_view', array( "asisten" => $asisten, "dosen" => $dosen, 
                                                    "count_asisten" => $count_asisten, "count_dosen" => $count_dosen));
        $this->load->view('admin/footer');
    }

}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * Description: Login controller profile
 */
class Schedule extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('validated') != true) redirect('e-admin');
    }
    
    function index()
    {
        $data = $this->load_data();

        $this->home($data);
    }

    private function home($data)
    {
        $this->load->view('admin/header');
        $this->load->view('admin/schedule_view', array('data' => $data));
        $this->load->view('admin/footer');
    }

    private function load_data()
    {
        $this->load->model('schedule_model');
        $data = $this->schedule_model->load_lesson();
        return $data;
    }
}
?>
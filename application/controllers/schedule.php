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
        $this->load->model('schedule_model');
        $lesson = $this->schedule_model->load_lesson();
        $schedule = $this->schedule_model->load_schedule();
        
        $this->home($lesson, $schedule);
    }

    private function home($lesson, $schedule)
    {
        $this->load->view('admin/header');
        $this->load->view('admin/schedule_view', array('$lesson' => $lesson , 'schedule' => $schedule));
        $this->load->view('admin/footer');
    }
}
?>
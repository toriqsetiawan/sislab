<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
        $day = $this->schedule_model->load_day();

        $count = $this->schedule_model->get_count();

        $data = array();
        for ($i=0; $i < $count; $i++) { 
            $data[$i] = $this->load_data($schedule[$i]['mk_id']);
        }
        
        $this->home($lesson, $schedule, $day, $count, $data);
    }

    private function home($lesson, $schedule, $day, $count, $data)
    {
        $this->load->view('admin/header');
        $this->load->view('admin/schedule_view', array('$lesson' => $lesson , 'schedule' => $schedule, 'day' => $day, 'count' => $count, 'data' => $data));
        $this->load->view('admin/footer');
    }

    private function load_data($id)
    {
        $this->load->model('lesson_model');
        $data = $this->lesson_model->get_mk($id);
        $data['dosen_id'] = $this->lesson_model->get_dosen_name($data['dosen_id']);
        return $data;
    }
}
?>
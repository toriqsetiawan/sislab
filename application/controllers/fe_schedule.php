<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fe_schedule extends CI_Controller {
    
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
            redirect(base_url());
        }
        $this->load->model('lesson_model');
        $result = $this->lesson_model->load_data();
        $new_data = $this->process($result);
        $this->home($data, $new_data);
    }
    
    private function home($data, $new_data)
    {
        $this->load->view('fe/fe-header', $data);
        $this->load->view('fe/fe-schedule', array('new_data' => $new_data));
        $this->load->view('fe/fe-footer');
    }

    private function process($data)
    {
        $this->load->model('lesson_model');
        $j=0;
        $new_data = array();
        for ($i=0; $i < sizeof($data); $i++) { 

            $result = $this->lesson_model->get_asisten_name($data[$i]['asisten_id']);
            $name = explode(", ", $result);

            for ($k=0; $k < sizeof($name); $k++) { 
                $d_name = $this->lesson_model->get_dosen_name($data[$i]['dosen_id']);
                if($name[$k] == $this->session->userdata('name') || $d_name == $this->session->userdata('name')) {
                    $this->load->model('schedule_model');
                    $sch_id = $this->schedule_model->get_sch_id($data[$i]['mk_id']);
                    
                    if ($sch_id != 0) {
                        $d_schedule = $this->schedule_model->select_schedule($sch_id);
                        $day = $this->schedule_model->get_day($d_schedule['day_id']);
                        $time = $this->schedule_model->get_time_name($d_schedule['start'], $d_schedule['end']);

                        $new_data[$j] = array('time' => $time, 
                                              'day' => $day, 
                                              'd_name' => $d_name, 
                                              'a_name' => $result,
                                              'name' => $data[$i]['name'], 
                                              'class' => $data[$i]['class'], 
                                              'semester' => $data[$i]['semester'],
                                              'lab_id' => $d_schedule['lab_id']);
                        $j++;
                        break;
                    }
                }
            }
        }
        $new_data['count'] = $j; 
        return $new_data;
    }
}
?>
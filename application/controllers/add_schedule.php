<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_schedule extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('validated') != true) redirect('e-admin');
    }
    
    function index()
    {
        $this->session->set_userdata('msg', '');

        $labit = $this->uri->segment(2);
        $this->session->set_userdata('labit', $labit);

        $this->add_dataset();
    }

    function process()
    {
        $day = $this->security->xss_clean($this->input->post('day'));
        $name = $this->security->xss_clean($this->input->post('name'));
        $class = $this->security->xss_clean($this->input->post('class'));
        $start = $this->security->xss_clean($this->input->post('start'));
        $end = $this->security->xss_clean($this->input->post('end'));
        $lab_id = $this->security->xss_clean($this->input->post('labit'));

        $this->load->model('lesson_model');
        $mk_id = $this->lesson_model->get_id($name, $class);

        $this->load->model('schedule_model');
        $sch_id = NULL;
        $temp = $this->schedule_model->get_temp();
        if ($temp != '') {
            $sch_id = $temp;
        }

        $data = array('sch_id' => $sch_id, 'mk_id' => $mk_id['mk_id'], 'day_id' => $day, 'start' => $start, 'end' => $end, 'lab_id' => $lab_id);

        $this->load->model('schedule_model');

        $value = $this->schedule_model->validated_id($data['mk_id']);

        if ($value == true) {
        	$result = $this->schedule_model->add_schedule($data);

	        if ($result) {
	            $msg = '<div class="alert alert-success alert-dismissable">
	                        <h4><center>Success</center></h4>
	                    </div>';
	        } else {
	            $msg = '<div class="alert alert-danger alert-dismissable">
	                        <h4><center>Failure</center></h4>
	                    </div>';
	        }
	    } else {
            if ($sch_id != NULL) {
                $this->schedule_model->set_temp(array('temp_id' => $sch_id));
            }
	    	$msg = '<div class="alert alert-danger alert-dismissable">
                        <h4><center>Data Already Insert</center></h4>
                    </div>';
	    }
        $this->session->set_userdata('msg', $msg);
        $this->add_dataset(); 
    }

    private function add_dataset()
    {
        $this->load->model('schedule_model');
        $lesson = $this->schedule_model->load_lesson();
        $day = $this->schedule_model->load_day();
        $count_d = $this->schedule_model->get_count_distinct();

        $this->load->model('lesson_model');
        $data = $this->lesson_model->load_data();
        $count = $this->lesson_model->get_count();
        $data_name = $this->lesson_model->load_name_mk();

        $this->home($lesson, $day, $data, $data_name, $count, $count_d); 
    }

    private function home($lesson, $day, $data, $data_name, $count, $count_d)
    {
        $data['msg'] = $this->session->userdata('msg');
        $this->load->view('admin/header');
        $this->load->view('admin/add_schedule_view', array('data' => $data, 'lesson' => $lesson, 'day' => $day, 
                                                           'data_name' => $data_name, 'count' => $count, 'count_d' => $count_d));
        $this->load->view('admin/footer');
    }
}
?>
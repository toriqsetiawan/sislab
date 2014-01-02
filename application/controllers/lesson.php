<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lesson extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('validated') != true) redirect('e-admin');
    }
    
    function index()
    {
        $data = $this->load_data();
        $count = $this->count_data();
        $new_data = array();

        for ($i=0; $i < $count; $i++) { 
            $new_data[$i]['mk_id'] = $data[$i]['mk_id'];
            $new_data[$i]['name'] = $data[$i]['name'];
            $new_data[$i]['semester'] = $data[$i]['semester'];
            $new_data[$i]['class'] = $data[$i]['class'];
            $new_data[$i]['dosen_name'] = $this->get_dosen($data[$i]['dosen_id']);
            $new_data[$i]['asisten_name'] = $this->get_asisten($data[$i]['asisten_id']);
        }

        $this->home($new_data, $count);
    }

    private function home($data, $count)
    {
        $this->load->view('admin/header');
        $this->load->view('admin/lesson_view', array('data' => $data, 'count' => $count));
        $this->load->view('admin/footer');
    }

    private function load_data()
    {
        $this->load->model('lesson_model');
        $data = $this->lesson_model->load_data();
        return $data;
    }

    private function count_data()
    {
        $this->load->model('lesson_model');
        $count = $this->lesson_model->get_count();
        return $count;
    }

    private function get_dosen($i)
    {
        $this->load->model('lesson_model');
        $data = $this->lesson_model->get_dosen_name($i);
        return $data;
    }

    private function get_asisten($i)
    {
        $this->load->model('lesson_model');
        $data = $this->lesson_model->get_asisten_name($i);
        return $data;
    }
}
?>
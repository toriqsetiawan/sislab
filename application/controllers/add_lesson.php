<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_lesson extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('validated') != true) redirect('e-admin');
    }
    
    function index()
    {
        $this->session->set_userdata('msg', '');

        $semester = $this->uri->segment(2);
        $this->session->set_userdata('semester', $semester);

        $this->add_dataset();
    }

    function process()
    {
        $dosen = $this->security->xss_clean($this->input->post('dosen'));
        $asisten1 = $this->security->xss_clean($this->input->post('asisten1'));
        $asisten2 = $this->security->xss_clean($this->input->post('asisten2'));
        $asisten3 = $this->security->xss_clean($this->input->post('asisten3'));
        $asisten4 = $this->security->xss_clean($this->input->post('asisten4'));

        $new_asisten = $asisten1.",".$asisten2.",".$asisten3.",".$asisten4;

        $name = $this->security->xss_clean($this->input->post('name'));
        $class = $this->security->xss_clean($this->input->post('class'));
        $semester = $this->security->xss_clean($this->input->post('semester'));

        if($dosen!=0 && $name!="" && $class!="" && $semester!="") {
            $data = array('dosen_id' => $dosen, 'name' => $name, 'asisten_id' => $new_asisten, 'class' => $class, 'semester' => $semester);

            $this->load->model('lesson_model');
            $result = $this->lesson_model->set_data($data);

            if ($result) {
                $msg = '<div class="alert alert-success alert-dismissable">
                            <h4>
                                <center>Success</center>
                            </h4>
                        </div>';
            }
            else {
                $msg = '<div class="alert alert-danger alert-dismissable">
                            <h4>
                                <center>Failure</center>
                            </h4>
                        </div>';
            }
        }
        else {
            $msg = '<div class="alert alert-danger alert-dismissable">
                        <h4>
                            <center>Please fill all field</center>
                        </h4>
                    </div>';
        }
        $this->session->set_userdata('msg', $msg);
        $this->add_dataset(); 
    }

    private function add_dataset()
    {
        $this->load->model('lesson_model');
        $asisten = $this->load_user('asisten');
        $dosen = $this->load_user('dosen');

        $this->load->model('user_model');
        $count['c_asisten'] = $this->user_model->get_count('asisten');
        $count['c_dosen'] = $this->user_model->get_count('dosen');

        $this->home($asisten, $dosen, $count); 
    }

    private function home($asisten, $dosen, $count)
    {
        $data['msg'] = $this->session->userdata('msg');
        $this->load->view('admin/header');
        $this->load->view('admin/add_lesson_view', array('data' => $data, 'asisten' => $asisten, 'dosen' => $dosen, 'count' => $count));
        $this->load->view('admin/footer');
    }

    private function load_user($user)
    {
        $this->load->model('user_model');
        $data = $this->user_model->get_name($user);
        return $data;
    }
}
?>
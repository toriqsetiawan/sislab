<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_lesson extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('validated') != true) redirect('e-admin');
    }
    
    function index()
    {
        $this->session->set_userdata('msg', '');

        $id = $this->uri->segment(2);
        $data = $this->load_data($id);

        $this->session->set_userdata('semester', $id);

        $this->add_dataset($data);
    }

    function process()
    {
        $id  = $this->security->xss_clean($this->input->post('id'));
        $name = $this->security->xss_clean($this->input->post('name'));
        $class = $this->security->xss_clean($this->input->post('class'));
        $semester = $this->security->xss_clean($this->input->post('semester'));
        $dosen = $this->security->xss_clean($this->input->post('dosen'));
        $asisten1 = $this->security->xss_clean($this->input->post('asisten1'));
        $asisten2 = $this->security->xss_clean($this->input->post('asisten2'));
        $asisten3 = $this->security->xss_clean($this->input->post('asisten3'));
        $asisten4 = $this->security->xss_clean($this->input->post('asisten4'));

        $new_asisten = $asisten1.",".$asisten2.",".$asisten3.",".$asisten4;

        if($name!="" && $class!="" && $semester!="" && $dosen!=0) {
            $data = array('dosen_id' => $dosen, 'name' => strtoupper($name), 'asisten_id' => $new_asisten, 'class' => strtoupper($class), 'semester' => $semester);

            $this->load->model('lesson_model');
            $result = $this->lesson_model->update_data($id, $data);

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
        $data = $this->load_data($id);
        $this->add_dataset($data); 
    }

    private function add_dataset($data)
    {
        $this->load->model('lesson_model');

        $n_dosen['name'] = $this->lesson_model->get_dosen_name($data['dosen_id']);
        $n_dosen['dosen_id'] = $data['dosen_id'];

        if (strlen($data['asisten_id']) == 7){
            $n_asisten = $this->lesson_model->get_asisten_name($data['asisten_id']);
            $new_asisten = $this->splite_asisten($n_asisten);
        }
        else{
            $new_asisten = '';
            $this->session->set_userdata('get_asisten', '');
        }

        $dosen = $this->load_user('dosen');
        $asisten = $this->load_user('asisten');
        $id_asisten = explode(",", $data['asisten_id']);

        $this->load->model('user_model');
        $count['c_asisten'] = $this->user_model->get_count('asisten');
        $count['c_dosen'] = $this->user_model->get_count('dosen');

        $this->home($n_dosen, $new_asisten, $dosen, $asisten, $id_asisten, $count, $data); 
    }

    private function home($n_dosen, $new_asisten, $dosen, $asisten, $id_asisten, $count, $n_data)
    {
        $data['msg'] = $this->session->userdata('msg');
        $this->load->view('admin/header');
        $this->load->view('admin/edit_lesson_view', array('data' => $data, 'c_asisten' => $new_asisten, 'asisten' => $asisten, 'n_data' => $n_data,
                                                          'id_asisten' => $id_asisten, 'c_dosen' => $n_dosen, 'dosen' => $dosen, 'count' => $count));
        $this->load->view('admin/footer');
    }

    private function load_data($id)
    {
        $this->load->model('lesson_model');
        $data = $this->lesson_model->get_mk($id);
        return $data;
    }

    private function splite_asisten($n_asisten)
    {
        $new_asisten = explode(", ", $n_asisten);
        if (sizeof($new_asisten) < 4) {
            for ($i=sizeof($new_asisten); $i < 4 ; $i++) { 
                $new_asisten[$i] = "";
            }
        }
        return $new_asisten;
    }

    private function load_user($user)
    {
        $this->load->model('user_model');
        $data = $this->user_model->get_name($user);
        return $data;
    }
}
?>
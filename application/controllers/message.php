<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        if($this->session->userdata('validated') != true ) {
            redirect('e-admin');
        }
        $this->session->set_userdata('msg', '');
        $this->load->model('message_model');

        $data = $this->message_model->get_all_data();
        $count = $this->message_model->get_count();

        $this->home($data, $count); 
    }


    private function home($data, $count)
    {
        $this->load->view('admin/header');
        $this->load->view('admin/message_view', array('data' => $data, 'count' => $count));
        $this->load->view('admin/footer');
    }

    function add_msg()
    {
        $username = $this->session->userdata('username');
        $admin = $this->session->userdata('validated');
        if($username != "" && $admin != true) {
            $message = $this->security->xss_clean($this->input->post('message'));
            $this->load->model('message_model');
            $testimony_id = NULL;
            $temp = $this->message_model->get_temp();
            if ($temp != '') {
                $testimony_id = $temp;
            }
            $format = ("Y-m-d H:i:s");
            $time = date($format);
            $data = array('testimony_id' => $testimony_id, 'username' => $username, 'message' => $message, 'time' => $time);
                
            $result = $this->message_model->set_data($data);

            if ($result) {
                echo "ok";
            } else {
                echo "nok";
            }
        } elseif ($admin == true) {
            echo "admin";
        } else {
            echo "login";
        }
    }

    function delete_msg($id)
    {
        if($this->session->userdata('validated') != true ) {
            redirect('e-admin');
        }
        $this->load->model('message_model');
        $this->message_model->set_temp(array('temp_id' => $id));
        $result = $this->message_model->delete_data($id);

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
        $this->session->set_userdata('msg', $msg);
        redirect('message');
    }
}
?>
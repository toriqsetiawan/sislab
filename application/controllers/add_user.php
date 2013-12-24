<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_user extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('validated') != true) redirect('e-admin');
    }
    
    function index($user)
    {
        $this->session->set_userdata('msg', '');
        $this->add_user($user); 
    }

    function add_asisten()
    {
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $name = $this->security->xss_clean($this->input->post('name'));
        $grade = $this->security->xss_clean($this->input->post('grade'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $address = $this->security->xss_clean($this->input->post('address'));
        $phone = $this->security->xss_clean($this->input->post('phone'));

        if($username!="" && $password!="" && $name!="" && $grade!="" && $email!="" && $address!="" && $phone!="") {
            $data = array('username' => $username, 'password' => md5($password), 'name' => $name, 'grade' => $grade,
                            'email' => $email, 'address' => $address, 'phone' => $phone);

            $this->load->model('user_model');
            $result = $this->user_model->set_data('asisten', $data);

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
        $this->add_user('asisten'); 
    }

    function add_dosen()
    {   
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $name = $this->security->xss_clean($this->input->post('name'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $address = $this->security->xss_clean($this->input->post('address'));
        $phone = $this->security->xss_clean($this->input->post('phone'));

        if($username!="" && $password!="" && $name!="" && $email!="" && $address!="" && $phone!="") {
            $data = array('username' => $username, 'password' => md5($password), 'name' => $name, 'email' => $email, 
                            'address' => $address, 'phone' => $phone);
            
            $this->load->model('user_model');
            $result = $this->user_model->set_data('dosen', $data);

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
        $this->add_user('dosen');
    }

    private function add_user($user)
    {
        $data['msg'] = $this->session->userdata('msg');
        $this->load->view('admin/header');
        $this->load->view('admin/add_user_'.$user, $data);
        $this->load->view('admin/footer');
    }
}
?>
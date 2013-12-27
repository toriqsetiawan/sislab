<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('validated') != true) redirect('e-admin');
    }
    
    function index()
    {
        $this->load->model('profile_model');
        $data = $this->profile_model->get_admin();

        $this->session->set_userdata($data);
        $this->session->set_userdata('msg', '');

        $this->home(); 
    }

    private function home()
    {
        $data = $this->session->all_userdata();

        $this->load->view('admin/header');
        $this->load->view('admin/profile_view', $data);
        $this->load->view('admin/footer');
    }

    function update()
    {
        $username = $this->input->post('username');
        if ($username != "") {
            $this->load->model('profile_model');
            $result = $this->profile_model->update_admin();
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
        $this->home();
    }
}
?>
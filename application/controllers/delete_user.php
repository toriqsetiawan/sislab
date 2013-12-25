<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete_user extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('validated') != true) redirect('e-admin');
    }
    
    function index()
    {    
        $user = $this->uri->segment(2);
        $id = $this->uri->segment(3);

        if ($user=="asisten" || $user=="dosen") {
            $this->session->set_userdata('msg', '');
            $this->delete_data($id, $user);
        }
        else {
            show_404();
        }
    }

    private function delete_data($id, $user)
    {
        $this->load->model('user_model');
        $result = $this->user_model->delete_data($id, $user);

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
        redirect('user');
    }
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete_lesson extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('validated') != true) redirect('e-admin');
    }
    
    function index()
    {    
        $id = $this->uri->segment(2);
        $this->session->set_userdata('msg', '');
        $this->delete_data($id);
    }

    private function delete_data($id)
    {
        $this->load->model('lesson_model');
        $result = $this->lesson_model->delete_data($id);

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
        redirect('lesson');
    }
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete_schedule extends CI_Controller {
    
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
        $this->load->model('schedule_model');
        $this->schedule_model->set_temp(array('temp_id' => $id));
        $result = $this->schedule_model->delete_schedule($id);

        if ($result) {
            $msg = '<div class="alert alert-success alert-dismissable">
                        <h4><center>Success</center></h4>
                    </div>';
        }
        else {
            $msg = '<div class="alert alert-danger alert-dismissable">
                        <h4><center>Failure</center></h4>
                    </div>';
        }
        $this->session->set_userdata('msg', $msg);
        redirect('schedule');
    }
}
?>
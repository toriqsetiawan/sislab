<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index($msg = NULL)
    {
    	if($this->session->userdata('validated') == true) {
            redirect('home');
        }
        $this->load->library('session');

        $token = $this->make_token();
        $this->session->set_userdata('token', $token);

        $data = array('msg' => $msg, 'token' => $token);
        $this->load->view('admin/login_view', $data);
    }
    
    function process()
    {
        $valid = $this->security->xss_clean($this->input->post('login'));

        if ($valid == $this->session->userdata('token')) {

            $this->load->model('login_model');
            $result = $this->login_model->validate();

            if(! $result) {
                $msg = '<h4 style="color:red;">Invalid username / password.<h4>';
                $this->index($msg);
            }
            else {
                redirect('e-admin');
            }        
        }
        else {
            show_404();
        }
    }

    function logout()
    {
    	$this->session->set_userdata('validated', false);
    	$this->session->sess_destroy();

    	redirect('e-admin', 'refresh');
    }

    private function make_token() {
        $this->load->helper('string');
        $this->load->helper('security');

        $text = random_string('alnum', 16);
        $str = do_hash($text, 'md5');

        return $str;
    }
}
?>
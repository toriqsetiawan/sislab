<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * Description: Login controller class
 */

class Login_user extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
    }
    
    // function index($msg = NULL)
    // {
    // 	if($this->session->userdata('validated') == true) {
    //         redirect('home');
    //     }
    //     // load library session
    //     $this->load->library('session');
    //     // generate token
    //     $token = $this->make_token();
    //     // set token in session
    //     $this->session->set_userdata('token', $token);
    //     // generate array  variable 
    //     $data = array('msg' => $msg, 
    //                   'token' => $token);
    //     // throw variable to view
    //     $this->load->view('admin/login_view', $data);
    // }
    
    function process()
    {
        $user = $this->security->xss_clean($this->input->post('user'));
        $pass = $this->security->xss_clean($this->input->post('pass'));
        // Load the model
        $this->load->model('login_user_model');
        // Validate the user can login
        $result = $this->login_user_model->validate($user, $pass);
        // Now we verify the result
        if($result) {
            $this->session->set_userdata('status', true);
            echo "ok";
        }
        else {
            echo "nok";
        }        
    }

    function logout()
    {
        // reset session
        if($this->session->userdata('validated') == true) {
            $this->session->set_userdata('validated', false);
        }
        $this->session->set_userdata('status', false);
    	$this->session->sess_destroy();

        // redirect to login area
    	redirect('/', 'refresh');
    }

    // private function make_token() {
    //     // load scurity helper
    //     $this->load->helper('string');
    //     $this->load->helper('security');
    //     // generate hash text
    //     $text = random_string('alnum', 16);
    //     $str = do_hash($text, 'md5');
    //     // return secure variable
    //     return $str;
    // }
}
?>
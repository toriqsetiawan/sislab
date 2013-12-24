<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * Description: Login controller profile
 */
class Change_password extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('validated') != true) redirect('e-admin');
    }
    
    function index()
    {
        $this->session->set_userdata('msg', '');

        $this->home(); 
    }

    private function home()
    {
        $data = $this->session->all_userdata();

        $this->load->view('admin/header');
        $this->load->view('admin/password_view', $data);
        $this->load->view('admin/footer');
    }

    function change()
    {
        $currentpass = $this->security->xss_clean($this->input->post('currentpass'));
        $newpass = $this->security->xss_clean($this->input->post('newpass'));
        $repass = $this->security->xss_clean($this->input->post('repass'));

        if($currentpass != "" && $newpass != "" && $repass != "") {
            $this->load->model('password_model');

            $valid = $this->password_model->validated(md5($currentpass));
            if ($valid) {
                if($newpass == $repass) {
                    $result = $this->password_model->update(md5($newpass));
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
                                    <center>New Password Do Not Match</center>
                                </h4>
                            </div>';
                }
            }
            else {
                $msg = '<div class="alert alert-danger alert-dismissable">
                            <h4>
                                <center>Current Password Do Not Match</center>
                            </h4>
                        </div>';
            }
        }
        else {
            $msg = '<div class="alert alert-danger alert-dismissable">
                        <h4>
                            <center>Please Fill Out This Field</center>
                        </h4>
                    </div>';
        }
        $this->session->set_userdata('msg', $msg);
        $this->home();
    }
}
?>
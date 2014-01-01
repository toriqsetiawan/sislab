<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_dosen extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('validated') != true) redirect('e-admin');
    }
    
    function index()
    {    
        $id = $this->uri->segment(2);

        $this->session->set_userdata('msg', '');

        $data = $this->get_data_dosen($id);
        $this->user_edit($data); 
    }

    function edit_data()
    {
        $this->load->model('user_model');
        $id = $this->security->xss_clean($this->input->post('id'));
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $name = $this->security->xss_clean($this->input->post('name'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $address = $this->security->xss_clean($this->input->post('address'));
        $phone = $this->security->xss_clean($this->input->post('phone'));

        if (strlen($password) != 32) {
            $password = md5($password);
        }
        $data = array('dosen_id' => $id, 'username' => $username, 'password' => $password, 'name' => $name,
                      'email' => $email, 'address' => $address, 'phone' => $phone);
        $result = $this->user_model->update_data($id, 'dosen', $data);

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
        $this->user_edit($data); 
    }

    private function user_edit($data)
    {
        $new_data['msg'] = $this->session->userdata('msg');
        $this->load->view('admin/header');
        $this->load->view('admin/edit_user_dosen', array('new_data' => $new_data, 'data' => $data));
        $this->load->view('admin/footer');
    }

    private function get_data_dosen($id)
    {
        $this->load->model('user_model');
        $data = $this->user_model->get_dosen($id);
        return $data;
    }
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    
    function validate()
    {
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        
        $query = $this->db->get('admin');

        if($query->num_rows == 1) {
            $row = $query->row();
            $data = array(
                    'id' => $row->admin_id,
                    'username' => $row->username,
                    'password' => $row->password,
                    'name' => $row->name,
                    'picture' => $row->admin_id,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        else {
	        return false;
        }
    }
}
?>
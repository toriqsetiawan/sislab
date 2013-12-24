<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_user_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    
    function validate($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        
        $query = $this->db->get('asisten');
        if($query->num_rows == 1) {
            $row = $query->row();
            $data = array(
                    'asisten_id' => $row->asisten_id,
                    'username' => $row->username,
                    'password' => $row->password,
                    'name' => $row->name,
                    'picture' => $row->asisten_id
                    );
            $this->session->set_userdata($data);
            return true;
        }
        else {
            $this->db->where('username', $username);
            $this->db->where('password', md5($password));

            $query = $this->db->get('dosen');
        	if($query->num_rows == 1) {
                $row = $query->row();
                $data = array(
                        'dosen_id' => $row->dosen_id,
                        'username' => $row->username,
                        'password' => $row->password,
                        'name' => $row->name,
                        'picture' => $row->dosen_id
                        );
                $this->session->set_userdata($data);
                return true;
            }
            else {
                return false;
            }
        }
    }
}
?>
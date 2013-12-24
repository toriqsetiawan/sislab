<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * Description: Login model class
 */
class Login_user_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    
    function validate($username, $password)
    {
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        
        // Run the query
        $query = $this->db->get('asisten');
        // Let's check if there are any results
        if($query->num_rows == 1) {
            // If there is a user, then create session data
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
                // If there is a user, then create session data
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
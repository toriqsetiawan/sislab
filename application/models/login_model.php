<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * Description: Login model class
 */
class Login_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    
    function validate()
    {
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        
        // Run the query
        $query = $this->db->get('admin');
        // Let's check if there are any results
        if($query->num_rows == 1) {
            // If there is a user, then create session data
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
        	// If the previous process did not validate
	        // then return false.
	        return false;
        }
    }
}
?>
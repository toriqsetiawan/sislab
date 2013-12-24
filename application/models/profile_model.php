<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    
    function get_admin()
    {
        // Prep the query
        $username = $this->session->userdata('username');
        $password = $this->session->userdata('password');
        // Run the query
        $query = mysql_query("SELECT * from admin where username='$username' and password='$password'");
        // Let's check if there are any results
        $data = mysql_fetch_assoc($query);
        $new_data = array('email' => $data['email'], 'address' => $data['address'], 'phone' => $data['phone']);

        return $new_data;
    }

    function update_admin()
    {
        $id = $this->security->xss_clean($this->session->userdata('id'));
        $username = $this->security->xss_clean($this->input->post('username'));
        $name = $this->security->xss_clean($this->input->post('name'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $address = $this->security->xss_clean($this->input->post('address'));
        $phone = $this->security->xss_clean($this->input->post('phone'));

        $query = mysql_query("UPDATE admin SET username='$username', name='$name', email='$email', address='$address', phone='$phone' WHERE admin_id='$id'");
        $this->session->set_userdata('username', $username);
        $this->session->set_userdata('name', $name);

        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }
}
?>
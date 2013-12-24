<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * Description: Login model class
 */
class Password_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    
    function update($password)
    {
        $id = $this->session->userdata('id');

        $query = mysql_query("UPDATE admin SET password='$password' WHERE admin_id='$id'");
        $this->session->set_userdata('password', $password);

        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }

    function validated($password)
    {
        $username = $this->session->userdata('username');

        $query = mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
        $data = mysql_fetch_assoc($query);

        if ($data) {
            return true;
        }
        else {
            return false;
        }
    }
}
?>
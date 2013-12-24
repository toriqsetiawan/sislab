<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
    function __construct()
    {
      parent::__construct();
    }
    
    function set_data($user, $data)
    {
      $this->db->insert($user, $data);
      return true;
    }

    function update_data($id, $user, $data)
    {
      $this->db->where($user.'_id', $id);
      $this->db->update($user, $data);
      return true;
    }

    function delete_data($id, $user)
    {
      $this->db->where($user.'_id', $id);
      $this->db->delete($user);
      return true;
    }

    function get_all_user($user)
    {
      $query = mysql_query("SELECT * from $user ORDER BY name ASC");

      $i = 0;
      $data = array();
      
      if ($user == 'asisten') {
        while($row = mysql_fetch_array($query)) {
          $data[$i] = array('asisten_id' => $row['asisten_id'], 
                            'username' => $row['username'], 
                            'password' => $row['password'], 
                            'name' => $row['name'], 
                            'grade' => $row['grade'], 
                            'email' => $row['email'], 
                            'address' => $row['address'], 
                            'phone' => $row['phone']);
          $i++;
        }
        return $data;
      }
      if ($user == 'dosen') {
        while($row = mysql_fetch_array($query)) {
          $data[$i] = array('dosen_id' => $row['dosen_id'], 
                            'username' => $row['username'], 
                            'password' => $row['password'], 
                            'name' => $row['name'], 
                            'email' => $row['email'], 
                            'address' => $row['address'], 
                            'phone' => $row['phone']);
          $i++;
        }
        return $data;
      }
    }

    function get_count($user)
    {
      return $count = $this->db->count_all($user);
    }

    function get_asisten($id)
    {
      $query = mysql_query("SELECT * from asisten WHERE asisten_id='$id'");
      $row = mysql_fetch_assoc($query);
      $data = array('asisten_id' => $row['asisten_id'], 
                    'username' => $row['username'], 
                    'password' => $row['password'], 
                    'name' => $row['name'],
                    'grade' => $row['grade'], 
                    'email' => $row['email'], 
                    'address' => $row['address'], 
                    'phone' => $row['phone']);
      return $data;
    }

    function get_dosen($id)
    {
      $query = mysql_query("SELECT * from dosen WHERE dosen_id='$id'");
      $row = mysql_fetch_assoc($query);
      $data = array('dosen_id' => $row['dosen_id'], 
                    'username' => $row['username'], 
                    'password' => $row['password'], 
                    'name' => $row['name'],
                    'email' => $row['email'], 
                    'address' => $row['address'], 
                    'phone' => $row['phone'] );
      return $data;
    }

    function get_name($user)
    {
      $i = 0;
      $query = mysql_query("SELECT ".$user."_id, name from $user");
      while($row = mysql_fetch_array($query)) {
        $data[$i] = array($user.'_id' => $row[$user.'_id'], 'name' => $row['name']);
        $i++;
      }
      return $data;
    }
}
?>
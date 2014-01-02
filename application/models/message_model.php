<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model {
  function __construct()
  {
    parent::__construct();
  }
  
  function set_data($data)
  {
    $this->db->insert('testimony', $data);
    return true;
  }

  function delete_data($id)
  {
    $this->db->where('testimony_id', $id);
    $this->db->delete('testimony');
    return true;
  }
  
  // -------------------------------------
  function set_temp($id)
  {
    $this->db->insert('temp_testimony', $id);
  }

  function get_temp()
  {
    $data = '';
    $query = $this->db->get('temp_testimony');
    if($query->num_rows != 0) {
      $row = $query->row();
      $data = $row->temp_id;
    }
    $this->delete_temp($data);

    return $data;
  }

  private function delete_temp($id)
  {
    $this->db->where('temp_id', $id);
    $this->db->delete('temp_testimony');
  }
  // -------------------------------------

  function get_count()
  {
    return $count = $this->db->count_all('testimony');
  }

  function get_all_data()
  {
    $query = $this->db->get('testimony');
    return $query->result_array();
  }
}
?>
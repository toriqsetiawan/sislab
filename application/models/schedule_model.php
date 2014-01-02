<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_model extends CI_Model {
  function __construct()
  {
      parent::__construct();
  }

  function add_schedule($data)
  {
    $this->db->insert('schedule', $data);
    return true;
  }

  function set_temp($id)
  {
    $this->db->insert('temp_schedule', $id);
  }

  function select_schedule($id)
  {
    $this->db->where('sch_id', $id);
    $query = $this->db->get('schedule');
    return $query->row_array();
  }

  function get_sch_id($id)
  {
    $data = 0;
    $query = mysql_query("SELECT sch_id FROM schedule WHERE mk_id='$id'");
    $row = mysql_fetch_assoc($query);
    if ($row) {
      $data = $row['sch_id']; 
    }
    return $data;
  }

  function get_count_distinct()
  {
      $query = mysql_query("SELECT count(distinct name) AS count FROM mk");
      $row = mysql_fetch_assoc($query);
      $data = array('count' => $row['count']);
      return $data;
  }

  function get_count()
  {
    return $this->db->count_all('schedule');
  }

  function get_day($id)
  {
    $query = mysql_query("SELECT name from day WHERE day_id='$id'");
    $row = mysql_fetch_assoc($query);
    return $data = $row['name'];
  }

  function get_time_name($start, $end)
  {
    $query = mysql_query("SELECT name_start from lesson WHERE id='$start'");
    $row = mysql_fetch_assoc($query);
    $data = $this->explode_time($row['name_start']);
    $data .= "-";
    $query = mysql_query("SELECT name_end from lesson WHERE id='$end'");
    $row = mysql_fetch_assoc($query);
    $data .= $this->explode_time($row['name_end']);
    return $data;
  }

  private function explode_time($data)
  {
    $new_data = "";
    $data = explode(":", $data);
    $new_data .= $data[0];
    $new_data .= ".";
    $new_data .= $data[1];
    return $new_data;
  }

  function get_temp()
  {
    $data = '';
    $query = $this->db->get('temp_schedule');
    if($query->num_rows != 0) {
      $row = $query->row();
      $data = $row->temp_id;
    }

    $this->delete_temp($data);

    return $data;
  }
  
  function load_lesson()
  { 
  	$query = $this->db->get('lesson');
    return $query->result_array();
  }

  function load_schedule()
  {
    $query = $this->db->get('schedule');
    return $query->result_array();
  }

  function load_day()
  {
    $query = $this->db->get('day');
    return $query->result_array();
  }

  function delete_schedule($id)
  {
    $this->db->where('sch_id', $id);
    $this->db->delete('schedule');
  }

  private function delete_temp($id)
  {
    $this->db->where('temp_id', $id);
    $this->db->delete('temp_schedule');
  }

  function validated_id($id)
  {
    $this->db->where('mk_id', $id);
    $query = $this->db->get('schedule');
    if ($query->num_rows == 1) {
      return false;
    } else {
      return true;
    }
  }
}
?>
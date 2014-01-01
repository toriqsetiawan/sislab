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
    $query = mysql_query("SELECT * FROM schedule WHERE sch_id='$id'");
    $row = mysql_fetch_assoc($query);
    $data = array('sch_id' => $row['sch_id'],
                  'mk_id' => $row['mk_id'],
                  'day_id' => $row['day_id'],
                  'start' => $row['start'],
                  'end' => $row['end'],
                  'lab_id' => $row['lab_id']);
    return $data;
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
  	$i=0;
    $data = array();
  	$query = mysql_query("SELECT * from lesson");
  	while($row = mysql_fetch_assoc($query)) {
          $data[$i] = array('id' => $row['id'], 
                            'start' => $row['name_start'], 
                            'end' => $row['name_end']);
          $i++;
      }
      return $data;
  }

  function load_schedule()
  {
      $i=0;
      $data = array();
      $query = mysql_query("SELECT * FROM schedule");
      while($row = mysql_fetch_assoc($query)) {
          $data[$i] = array('sch_id' => $row['sch_id'],
                            'mk_id' => $row['mk_id'],
                            'day_id' => $row['day_id'],
                            'start' => $row['start'],
                            'end' => $row['end'],
                            'lab_id' => $row['lab_id']);
          $i++;
      }
      return $data;
  }

  function load_day()
  {
    $i=0;
    $data = array();
    $query = mysql_query("SELECT * FROM day");
    while ($row = mysql_fetch_assoc($query)) {
      $data[$i] = array('day_id' => $row['day_id'], 
                        'name' => $row['name']);
      $i++;
    }
    return $data;
  }

  function delete_schedule($id)
  {
    $this->db->where('mk_id', $id);
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
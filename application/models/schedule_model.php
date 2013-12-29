<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_model extends CI_Model {
  function __construct()
  {
      parent::__construct();
  }

  function get_count()
  {
    return $this->db->count_all('schedule');
  }

  function add_schedule($data)
  {
    $this->db->insert('schedule', $data);
    return true;
  }

  function get_count_distinct()
  {
      $query = mysql_query("SELECT count(distinct name) AS count FROM mk");
      $row = mysql_fetch_assoc($query);
      $data = array('count' => $row['count']);
      return $data;
  }

  private function select_schedule($id)
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
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

    function reset_data($id)
    {
      $data = array('mk_id' => 0, 'day_id' => 0, 'start' => 0, 'end' => 0, 'lab_id' => 0);
      $this->db->where('mk_id', $id);
      $this->db->update();
    }

    function get_count()
    {
      return $this->db->count_all('schedule');
    }

    function add_schedule($new_data)
    {
      for ($i=0; $i < 14; $i++) { 
        $data = $this->select_schedule($i);
        if ($data['mk_id'] == 0 && $data['day_id'] == 0) {
          $this->db->where('sch_id', $i+1);
          $this->db->update('schedule', $new_data);
        }
      }
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
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
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
                              'day' => $row['day'],
                              'dosen_id' => $row['dosen_id'],
                              'asisten_id' => $row['asisten_id'],
                              'start' => $row['start'],
                              'end' => $row['end'],
                              'lab_id' => $row['lab_id']);
            $i++;
        }
        return $data;
    }
}
?>
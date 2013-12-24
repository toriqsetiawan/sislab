<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    
    function load_lesson()
    {
    	$i=0;
    	$query = mysql_query("SELECT * from lesson");
    	while($row = mysql_fetch_array($query)) {
          $data[$i] = array('id' => $row['id'], 
                            'start' => $row['name_start'], 
                            'end' => $row['name_end']);
          $i++;
        }
        return $data;
    }

    function load_schedule()
    {
        
    }
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lesson_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    
    function load_data()
    {
    	$i=0;
    	$query = mysql_query("SELECT * from mk ORDER BY name ASC");
    	while($row = mysql_fetch_array($query)) {
          $data[$i] = array('mk_id' => $row['mk_id'], 
                            'dosen_id' => $row['dosen_id'], 
                            'asisten_id' => $row['asisten_id'], 
                            'name' => $row['name'], 
                            'class' => $row['class'], 
                            'semester' => $row['semester']);
          $i++;
        }
        if ($i != 0) {
            return $data;
        }
    }

    function set_data($data)
    {
        $this->db->insert('mk', $data);
        return true;
    }

    function update_data($id, $data)
    {
        $this->db->where('mk_id', $id);
        $this->db->update('mk', $data);
        return true;
    }

    function get_count()
    {
        return $count = $this->db->count_all('mk');
    }

    function get_dosen_name($id)
    {
        $query = mysql_query("SELECT name from dosen WHERE dosen_id='$id'");
        $row = mysql_fetch_assoc($query);
        $data = $row['name'];
        return $data;
    }

    function get_asisten_name($id)
    {
        if ($id == '0,0,0,0') {
            return $data = "";
        }
        $n_id = explode(",", $id);
        $query = mysql_query("SELECT name from asisten WHERE asisten_id='$n_id[0]' OR asisten_id='$n_id[1]' OR asisten_id='$n_id[2]' OR asisten_id='$n_id[3]'");
        $data = "";
        while($row = mysql_fetch_array($query)) {
            $data .= $row['name'];
            $data .= ", ";
        }
        return $data;
    }

    function get_mk($id)
    {
        $query = mysql_query("SELECT * FROM mk WHERE mk_id='$id'");
        $row = mysql_fetch_assoc($query);
        $data = array(
                'mk_id' => $row['mk_id'],
                'dosen_id' => $row['dosen_id'],
                'asisten_id' => $row['asisten_id'],
                'name' => $row['name'],
                'class' => $row['class'],
                'semester' => $row['semester']);
        return $data;
    }
}
?>
<?php
class admin_departmentModel extends CI_Model{
     public function __construct(){
        parent::__construct();
    }
    public function view_data(){
        $query=$this->db->query("SELECT * FROM department WHERE LCASE(deprtmt_name)!='company'");
        return $query->result_array();
    }
    public function insert_data($data) {
        $this->db->insert('department', $data); 
        return TRUE;
    }
    public function edit_data($departmentID) {
        $query=$this->db->query("SELECT * FROM department WHERE deprt_id = '$departmentID'");
        return $query->result_array();
    }
}
?>


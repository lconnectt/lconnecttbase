<?php
class admin_roleModel extends CI_Model{
     public function __construct(){
        parent::__construct();
    }
    public function view_department(){
        $query=$this->db->query("SELECT deprt_id,deprtmt_name FROM department WHERE LCASE(deprtmt_name)!='company'");
        return $query->result_array();
    }
    public function view_role(){
        $query=$this->db->query("SELECT a.roleid,a.rolename,b.deprtmt_name FROM user_role a,department b WHERE a.department=b.deprt_id ORDER BY a.rolename ASC");
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


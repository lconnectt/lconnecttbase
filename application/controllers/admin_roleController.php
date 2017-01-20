<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_roleController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin_roleModel','role');
    }
    public function index(){
        $this->data['view_role']= $this->role->view_role();
        $this->data['view_department']= $this->role->view_department();
        $this->load->view('admin_list_role',$this->data, FALSE);
    }
    public function post_data() {
        $dt = date('ymdHis');
        $departmentName = $this->input->post('departmentName');
        $departmentID=strtoupper(substr($departmentName,0,2));
        $departmentID.=$dt;
        $data = array(
            'deprt_id' => $departmentID,
            'deprtmt_name' => $departmentName
        );
        $insert = $this->role->insert_data($data);
        if($insert==TRUE){
            redirect('admin_roleController/index');
        }
    }
    public function edit_data($departmentID) {
        $this->data['edit_department']= $this->role->edit_data($departmentID);
        $this->load->view('admin_edit_department', $this->data, FALSE);
    }
    public function update_data($deptID){
        $departmentName = $this->input->post('departmentName');
        $departmentID=$deptID;
        $data = array(
            'deprtmt_name' => $departmentName
        );
        $this->db->where('deprt_id', $departmentID);
        $this->db->update('department', $data);
        redirect('admin_roleController/index');
    }
}
?>


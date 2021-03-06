<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_departmentController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin_departmentModel','department');
    }
    public function index(){
        $this->data['view_department']= $this->department->view_data();
        $this->load->view('admin_list_department',$this->data, FALSE);
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
        $insert = $this->department->insert_data($data);
        if($insert==TRUE){
            redirect('admin_departmentController/index');
        }
    }
    public function edit_data($departmentID) {
        $this->data['edit_department']= $this->department->edit_data($departmentID);
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
        redirect('admin_departmentController/index');
    }
}
?>


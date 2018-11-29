<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
    }

    public function get_user($username){
        $result = $this->db->select("*")
                ->from("login")
                ->where("username", $username)
                ->get();
        if($result) {
            return $result->row_array();
        }else{

            $result = $this->db->select("*")
                        ->from("login")
                        ->where("name", $username)
                        ->get();
            return $result->row_array();
        }
    }

    public function get_all_user(){
        $result = $this->db->select('*')
                    ->from('login')
                    ->get();
        if ($result) {
            return $result->result_array();
        }else{
            return array();
        }
    }

    public function get_total_appointments($date){
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->count_all_results('appointment_booking');
        if ($result) {
            return $result;
        }else{
            return $result;
        }
    }

    public function get_total_checked(){
        $date = date('Y-m-d');
        $status = 7;
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->where('fee_paid_status',$status)
                ->count_all_results('appointment_booking');
        if ($result) {
            return $result;
        }else{
            return $result;
        }
    }

    public function add_limiter($data){
        $result = $this->db->insert('booking_limiter',$data);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function get_limiter_details(){
        $result = $this->db->get('booking_limiter');
        if($result){
            return $result->result();
        }else{
            return false;
        }

    }
    public function get_limiter(){
        $result = $this->db->get('booking_limiter');
        if($result){
            return $result->row();
        }else{
            return false;
        }

    }

    public function single_patient_delete($id){
        $result = $this->db
                ->where('appointment_booking_id', $id)
                ->delete('appointment_booking');
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function transfer_patient($flag,$id){
        $result = $this->db->set('booking_flag',$flag)
                    ->where('appointment_booking_id',$id)
                    ->update('appointment_booking');
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function get_other_rights_detail(){
        $loggedin_user = $this->session->userdata('userdata');
        $user_id = $loggedin_user['login_id'];
        $sql = "Select login.*,lrg.other_rights_group_id,lrgd.rights,lrgd.user_rights
                FROM login
                LEFT JOIN login_rights_group lrg on lrg.login_rights_group_id = login.login_rights_group_id and lrg.other_rights_group_id > 0
                LEFT JOIN(
                    SELECT other_rights_group_detail.*, GROUP_CONCAT(other_rights.class) as other_rights,
                    GROUP_CONCAT(other_rights.status) as astatus,
                    GROUP_CONCAT(CONCAT(other_rights.class,'-',other_rights_group_detail.status)) as rights,
                    GROUP_CONCAT(CONCAT(other_rights.other_rights_name,'-',other_rights.class,'-',other_rights_group_detail.status)) as user_rights
                    FROM other_rights_group_detail
                    LEFT JOIN other_rights ON other_rights.other_rights_id = other_rights_group_detail.other_rights_id
                    LEFT JOIN other_rights_group org  ON org.other_rights_group_id = other_rights_group_detail.other_rights_group_id
                    WHERE org.status = 1
                    Group BY other_rights_group_id
                )lrgd ON lrgd.other_rights_group_id = lrg.other_rights_group_id
                WHERE login_id = $user_id ";
        $result = $query = $this->db->query($sql);
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function limiter_update($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $this->db->where('limiter_id',$id)->update('booking_limiter',array('limiter'=>$editval));
                return $this->db->affected_rows();
            }else{
                return false;
            }
        }

    public function delete_limiter($id){
        $this->db->where('limiter_id', $id)->delete('booking_limiter');
        return $this->db->affected_rows();
    }

}
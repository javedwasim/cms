<?php

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
    }

    public function get_bookings() {
        $date = date('Y-m-d');
        $result = $this->db->select('*')
                ->from('appointment_booking')
                ->where('DATE(appointment_date)',$date)
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function appointment_book($data) {
        $result = $this->db->insert('appointment_booking', $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function update_fee_paid($data, $bkID) {
        $result = $this->db
                ->set('fee_paid_status', $data)
                ->where('appointment_booking_id', $bkID)
                ->update('appointment_booking');
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    // public function get_last_booking(){
    //     $result = $this->db->select('appointment_date ,order_number')
    //             ->order_by('appointment_booking_id', 'DESC')
    //             ->limit(1)
    //             ->get('appointment_booking');
    //     if($result->num_rows()>0){
    //         return $result->row();
    //     } else {
    //         return false;
    //     }
        
    // }
    
    // public function get_last_vip_booking($flag){
    //     $date = date('Y-m-d');
    //     $result = $this->db->select('appointment_date ,order_number')
    //             ->where('DATE(appointment_date)', $date)
    //             ->order_by('order_number', 'DESC')
    //             ->limit(1)
    //             ->get('appointment_booking');
    //     if($result->num_rows()>0){
    //         return $result->row();
    //     } else {
    //         return false;
    //     }
        
    // }
    public function get_last_booking(){
       $date = date('Y-m-d');
        $result = $this->db->select('appointment_date ,order_number')
                ->where('DATE(appointment_date)', $date)
                ->order_by('order_number', 'DESC')
                ->limit(1)
                ->get('appointment_booking');
        if($result->num_rows()>0){
            return $result->row();
        } else {
            return false;
        }
        
    }
    

    public function update_value($value, $updateValue, $toupdate) {
        $result = '';
        $date = date('Y-m-d H:i:s');
        $collectedby = $this->session->userdata('username');
        if ($updateValue == 'full_name') {
            $result = $this->db
                    ->set('full_name', $value)
                    ->where('appointment_booking_id', $toupdate)
                    ->update('appointment_booking');
        } elseif ($updateValue == 'consultant_fee') {
            $data = array(
                'consultant_fee' => $value,
                'fee_collected_by' => $collectedby,
                'fee_paid_at' => $date,
                'fee_paid_status' => '1'
            );
            $result = $this->db
                    ->where('appointment_booking_id', $toupdate)
                    ->update('appointment_booking', $data);
        } elseif ($updateValue == 'ett_fee') {
            $data = array(
                'ett_fee' => $value,
                'ett_fee_collected_by' => $collectedby,
                'ett_fee_paid_at' => $date
            );
            $result = $this->db
                    ->where('appointment_booking_id', $toupdate)
                    ->update('appointment_booking', $data);
        } elseif ($updateValue == 'echo_fee') {
            $data = array(
                'echo_fee' => $value,
                'echo_fee_collected_by' => $collectedby,
                'echo_fee_paid_at' => $date
            );
            $result = $this->db
                    ->where('appointment_booking_id', $toupdate)
                    ->update('appointment_booking', $data);
        } elseif ($updateValue == 'refund') {
            $result = $this->db
                    ->set('refund', $value)
                    ->where('appointment_booking_id', $toupdate)
                    ->update('appointment_booking');
        } else {
            return false;
        }
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function count_fee_paid(){
        $date = date('Y-m-d'); 
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->where('fee_paid_status','1')
                ->count_all_results('appointment_booking');
        if($result){
            return $result;
        }else{
            return $result;
        }
    }

    public function count_ecg_waiting(){
        $date = date('Y-m-d'); 
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->where('fee_paid_status','2')
                ->count_all_results('appointment_booking');
        if($result){
            return $result;
        }else{
            return $result;
        }
    }

    public function count_ett_waiting(){
        $date = date('Y-m-d'); 
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->where('fee_paid_status','3')
                ->count_all_results('appointment_booking');
        if($result){
            return $result;
        }else{
            return $result;
        }
    }

    public function count_echo_waiting(){
        $date = date('Y-m-d'); 
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->where('fee_paid_status','4')
                ->count_all_results('appointment_booking');
        if($result){
            return $result;
        }else{
            return $result;
        }
    }
    public function count_investigation_waiting(){
        $date = date('Y-m-d'); 
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->where('fee_paid_status','5')
                ->count_all_results('appointment_booking');
        if($result){
            return $result;
        }else{
            return $result;
        }
    }

    public function count_checkup_waiting(){
        $date = date('Y-m-d'); 
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->where('fee_paid_status','6')
                ->count_all_results('appointment_booking');
        if($result){
            return $result;
        }else{
            return $result;
        }
    }

    public function count_complete(){
        $date = date('Y-m-d'); 
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->where('fee_paid_status','7')
                ->count_all_results('appointment_booking');
        if($result){
            return $result;
        }else{
            return $result;
        }
    }

    public function search_by_date($date,$flag){

        $result = $this->db->select('*')
                ->from('appointment_booking')
                ->where('DATE(appointment_date)',$date)
                ->where('booking_flag',$flag)
                ->where('order_number>',5)
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function delete_patient($fromdate,$todate){
        $result = $this->db
                ->where('DATE(appointment_date) >=', $fromdate)
                ->where('DATE(appointment_date) <=', $todate)
                ->delete('appointment_booking');
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function get_bookings_with_flag($flag) {
        $date = date('Y-m-d');
        $result = $this->db->select('*')
                ->from('appointment_booking')
                ->where('DATE(appointment_date)',$date)
                ->where('booking_flag',$flag)
                ->where('order_number>',5)
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }


    public function get_bookings_vip($flag) {
        $date = date('Y-m-d');
        $result = $this->db->select('*')
                ->from('appointment_booking')
                ->where('DATE(appointment_date)',$date)
                ->where('booking_flag',$flag)
                ->where('order_number>',5)
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    public function get_bookings_on_call($flag) {
        $date = date('Y-m-d');
        $result = $this->db->select('*')
                ->from('appointment_booking')
                ->where('DATE(appointment_date)',$date)
                ->where('booking_flag',$flag)
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_bookings_on_walk($flag) {
        $date = date('Y-m-d');
        $result = $this->db->select('*')
                ->from('appointment_booking')
                ->where('DATE(appointment_date)',$date)
                ->where('booking_flag',$flag)
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function getbookings_by_date_flag($date,$flag){

        $result = $this->db->select('*')
                ->from('appointment_booking')
                ->where('DATE(appointment_date)',$date)
                ->where('booking_flag',$flag)
                ->where('order_number>',5)
                ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function count_bookings(){
        $date = date('Y-m-d'); 
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->count_all_results('appointment_booking');
        if($result){
            return $result;
        }else{
            return $result;
        }
    }

    public function get_todays_fee_paid(){
        $date = date('Y-m-d'); 
        $result = $this->db
                    ->select_sum('consultant_fee','Consultant')
                    ->where('DATE(appointment_date)',$date)
                    ->get('appointment_booking');
        if($result){
            $amount = $result->result();
            return $amount[0]->Consultant;
        }else{
            return false;
        }
    }

    public function get_todays_ett_fee_paid(){
        $date = date('Y-m-d'); 
        $result = $this->db
                    ->select_sum('ett_fee','ETT')
                    ->where('DATE(appointment_date)',$date)
                    ->get('appointment_booking');
        if($result){
            $amount = $result->result();
            return $amount[0]->ETT;
        }else{
            return false;
        }
    }

    public function get_todays_echo_fee_paid(){
        $date = date('Y-m-d'); 
        $result = $this->db
                    ->select_sum('echo_fee','Echo')
                    ->where('DATE(appointment_date)',$date)
                    ->get('appointment_booking');
        if($result){
            $amount = $result->result();
            return $amount[0]->Echo;
        }else{
            return false;
        }
    }

    public function get_todays_total_refund(){
        $date = date('Y-m-d'); 
        $result = $this->db
                    ->select_sum('refund','Refund')
                    ->where('DATE(appointment_date)',$date)
                    ->get('appointment_booking');
        if($result){
            $amount = $result->result();
            return $amount[0]->Refund;
        }else{
            return false;
        }
    }
    public function count_consultant_fee_paid_rows(){
        $date = date('Y-m-d'); 
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->where('consultant_fee !=',0,FALSE)
                ->count_all_results('appointment_booking');
        if($result){
            return $result;
        }else{
            return $result;
        }
    }
    public function count_ett_fee_paid_rows(){
        $date = date('Y-m-d'); 
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->where('ett_fee !=',0,FALSE)
                ->count_all_results('appointment_booking');
        if($result){
            return $result;
        }else{
            return $result;
        }
    }
    public function count_echo_fee_paid_rows(){
        $date = date('Y-m-d'); 
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->where('echo_fee !=',0,FALSE)
                ->count_all_results('appointment_booking');
        if($result){
            return $result;
        }else{
            return $result;
        }
    }
    public function count_refund_rows(){
        $date = date('Y-m-d'); 
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->where('refund !=',0,FALSE)
                ->count_all_results('appointment_booking');
        if($result){
            return $result;
        }else{
            return $result;
        }
    }

    public function insert_consultant($value,$wheretoinsert,$flag,$orderno){
        $date = date('Y-m-d H:i:s');
        $collectedby = $this->session->userdata('username');
        if($wheretoinsert == 'full_name'){
            $data = array(
                'appointment_date' => $date,
                'full_name' => $value,
                'booking_flag' => $flag,
                'order_number' => $orderno
            );
            $result = $this->db->insert('appointment_booking', $data);
        }else if($wheretoinsert == 'contact_number'){
            $data = array(
                'appointment_date' => $date,
                'contact_number' => $value,
                'booking_flag' => $flag,
                'order_number' => $orderno
            );
            $result = $this->db->insert('appointment_booking', $data);
        }else if($wheretoinsert == 'consultant_fee'){
            $data = array(
                'appointment_date' => $date,
                'consultant_fee' => $value,
                'booking_flag' => $flag,
                'order_number' => $orderno,
                'fee_collected_by' => $collectedby,
                'fee_paid_status' => '1'

            );
            $result = $this->db->insert('appointment_booking', $data);
        }else if($wheretoinsert == 'ett_fee'){
            $data = array(
                'appointment_date' => $date,
                'ett_fee' => $value,
                'booking_flag' => $flag,
                'order_number' => $orderno,
                'ett_fee_collected_by' => $collectedby
            );
            $result = $this->db->insert('appointment_booking', $data);
        }else if($wheretoinsert == 'echo_fee'){
            $data = array(
                'appointment_date' => $date,
                'echo_fee' => $value,
                'booking_flag' => $flag,
                'order_number' => $orderno,
                'echo_fee_collected_by' => $collectedby
            );
            $result = $this->db->insert('appointment_booking', $data);
        }else if($wheretoinsert == 'refund'){
            $data = array(
                'appointment_date' => $date,
                'refund' => $value,
                'booking_flag' => $flag,
                'order_number' => $orderno
            );
            $result = $this->db->insert('appointment_booking', $data);
        }else{
            return false;
        }
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function order_exist($orderno,$date){
        $result = $this->db
                    ->where('order_number',$orderno)
                    ->where('DATE(appointment_date)',$date)
                    ->get('appointment_booking');
        if ($result->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function update_consultant($value,$wheretoinsert,$orderno) {
        $result = '';
        $date = date('Y-m-d H:i:s');
        $collectedby = $this->session->userdata('username');
        if ($wheretoinsert == 'full_name') {
            $result = $this->db
                    ->set('full_name', $value)
                    ->where('order_number', $orderno)
                    ->update('appointment_booking');
        }else if($wheretoinsert == 'contact_number'){
            $result = $this->db
                    ->set('contact_number', $value)
                    ->where('order_number', $orderno)
                    ->update('appointment_booking');
        }else if($wheretoinsert == 'consultant_fee'){
            $data = array(
                'consultant_fee' => $value,
                'fee_paid_at' => $date,
                'fee_collected_by' => $collectedby,
                'fee_paid_status' => '1'
            );
            $result = $this->db
                    ->where('order_number', $orderno)
                    ->update('appointment_booking',$data);
        }else if($wheretoinsert == 'ett_fee'){
            $data = array(
                'ett_fee' => $value,
                'ett_fee_paid_at' => $date,
                'ett_fee_collected_by' => $collectedby
            );
            $result = $this->db
                    ->where('order_number', $orderno)
                    ->update('appointment_booking',$data);
        }else if($wheretoinsert == 'echo_fee'){
            $data = array(
                'echo_fee' => $value,
                'echo_fee_paid_at' => $date,
                'echo_fee_collected_by' => $collectedby
            );
            $result = $this->db
                    ->where('order_number', $orderno)
                    ->update('appointment_booking',$data);
        }else if($wheretoinsert == 'refund'){
            $result = $this->db
                    ->set('refund', $value)
                    ->where('order_number', $orderno)
                    ->update('appointment_booking');
        }else {
            return false;
        }

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function get_first_five_rows($date){
        $flag = 'vip';
        $result = $this->db->select('*')
                ->where('DATE(appointment_date)',$date)
                ->where('booking_flag',$flag)
                ->order_by('order_number', 'ASC')
                ->limit(5,0)
                ->get('appointment_booking');
        if($result->num_rows()>0){
            return $result->result_array();
        } else {
            return array();
        }
        
    }

    public function get_all_vip($flag){
        $date = date('Y-m-d');
        $result = $this->db->select('*')
                    ->where('DATE(appointment_date)',$date)
                    ->where('booking_flag',$flag)
                    ->get('appointment_booking');
        if($result){
            return $result->result_array();
        }else{
            return array();
        }
    }

    public function get_all_oncall($flag){
        $date = date('Y-m-d');
        $result = $this->db->select('*')
                    ->where('DATE(appointment_date)',$date)
                    ->where('booking_flag',$flag)
                    ->get('appointment_booking');
        if($result){
            return $result->result_array();
        }else{
            return array();
        }
    }

    public function get_all_onwalk($flag){
        $date = date('Y-m-d');
        $result = $this->db->select('*')
                    ->where('DATE(appointment_date)',$date)
                    ->where('booking_flag',$flag)
                    ->get('appointment_booking');
        if($result){
            return $result->result_array();
        }else{
            return array();
        }
    }

    public function print_all_app($date){
        $result = $this->db->select('*')
                    ->where('DATE(appointment_date)',$date)
                    ->order_by('order_number','ACS')
                    ->get('appointment_booking');
        if($result){
            return $result->result_array();
        }else{
            return array();
        }
    }

    public function count_not_attendent(){
        $date = date('Y-m-d'); 
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->where('consultant_fee','0')
                ->where('ett_fee','0')
                ->where('echo_fee','0')
                ->where('refund','0')
                ->count_all_results('appointment_booking');
        if($result){
            return $result;
        }else{
            return $result;
        }
    }

    public function count_total_attendent(){
        $date = date('Y-m-d'); 
        $result = $this->db
                ->where('DATE(appointment_date)',$date)
                ->where('consultant_fee !=','0')
                ->count_all_results('appointment_booking');
        if($result){
            return $result;
        }else{
            return $result;
        }
    }


}

?>
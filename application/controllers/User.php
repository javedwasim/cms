<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->model('Dashboard_model');
        $this->load->helper('content-type');
        $this->load->helper('form');
        $this->load->library('form_validation');
        date_default_timezone_set("Asia/Karachi");
    }

    public function index() {
        $flag = $this->input->post('flag');
        $date = date('Y-m-d');
        if ($flag == 'vip') {
            $data['booking_flag'] = $flag;
            $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
            $data['booking_details'] = $this->User_model->get_bookings_with_flag($flag);
            // print_r($data['booking_details']);die();
            $data['fee_paid'] = $this->User_model->count_fee_paid();
            $data['ecg_count'] = $this->User_model->count_ecg_waiting();
            $data['ett_count'] = $this->User_model->count_ett_waiting();
            $data['echo_count'] = $this->User_model->count_echo_waiting();
            $data['investigation_count'] = $this->User_model->count_investigation_waiting();
            $data['checkup_count'] = $this->User_model->count_checkup_waiting();
            $data['count_complete'] = $this->User_model->count_complete();
            $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($date);
            $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($date);
            $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($date);
            $data['wallet_refund'] = $this->User_model->get_todays_total_refund($date);
            $data['total_attended'] = $this->User_model->count_total_attendent($date);
            $data['total_not_attended'] = $this->User_model->count_not_attendent($date);
            $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($date);
            $data['refund_count'] = $this->User_model->count_refund_rows($date);
            $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($date);
            $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($date);
            $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
            $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
            $json['status_row'] = $this->load->view('admin/patient_status_row', $data, true);
            $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        } else if ($flag == 'on_walk') {
            $data['booking_flag'] = $flag;
            $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
            $data['booking_details'] = $this->User_model->get_bookings_with_flag($flag);
            $data['fee_paid'] = $this->User_model->count_fee_paid();
            $data['ecg_count'] = $this->User_model->count_ecg_waiting();
            $data['ett_count'] = $this->User_model->count_ett_waiting();
            $data['echo_count'] = $this->User_model->count_echo_waiting();
            $data['investigation_count'] = $this->User_model->count_investigation_waiting();
            $data['checkup_count'] = $this->User_model->count_checkup_waiting();
            $data['count_complete'] = $this->User_model->count_complete();
            $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($date);
            $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($date);
            $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($date);
            $data['wallet_refund'] = $this->User_model->get_todays_total_refund($date);
            $data['total_attended'] = $this->User_model->count_total_attendent($date);
            $data['total_not_attended'] = $this->User_model->count_not_attendent($date);
            $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($date);
            $data['refund_count'] = $this->User_model->count_refund_rows($date);
            $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($date);
            $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($date);
            $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
            $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
            $json['status_row'] = $this->load->view('admin/patient_status_row', $data, true);
            $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        } else if ($flag == 'on_call') {
            $data['booking_flag'] = $flag;
            $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
            $data['booking_details'] = $this->User_model->get_bookings_with_flag($flag);
            $data['fee_paid'] = $this->User_model->count_fee_paid();
            $data['ecg_count'] = $this->User_model->count_ecg_waiting();
            $data['ett_count'] = $this->User_model->count_ett_waiting();
            $data['echo_count'] = $this->User_model->count_echo_waiting();
            $data['investigation_count'] = $this->User_model->count_investigation_waiting();
            $data['checkup_count'] = $this->User_model->count_checkup_waiting();
            $data['count_complete'] = $this->User_model->count_complete();
            $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($date);
            $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($date);
            $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($date);
            $data['wallet_refund'] = $this->User_model->get_todays_total_refund($date);
            $data['total_attended'] = $this->User_model->count_total_attendent($date);
            $data['total_not_attended'] = $this->User_model->count_not_attendent($date);
            $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($date);
            $data['refund_count'] = $this->User_model->count_refund_rows($date);
            $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($date);
            $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($date);
            $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
            $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
            $json['status_row'] = $this->load->view('admin/patient_status_row', $data, true);
            $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        } else {
            $data['booking_flag'] = "";
            $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
            $data['booking_details'] = $this->User_model->get_bookings();
            $data['fee_paid'] = $this->User_model->count_fee_paid();
            $data['ecg_count'] = $this->User_model->count_ecg_waiting();
            $data['ett_count'] = $this->User_model->count_ett_waiting();
            $data['echo_count'] = $this->User_model->count_echo_waiting();
            $data['investigation_count'] = $this->User_model->count_investigation_waiting();
            $data['checkup_count'] = $this->User_model->count_checkup_waiting();
            $data['count_complete'] = $this->User_model->count_complete();
            $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($date);
            $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($date);
            $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($date);
            $data['wallet_refund'] = $this->User_model->get_todays_total_refund($date);
            $data['total_attended'] = $this->User_model->count_total_attendent($date);
            $data['total_not_attended'] = $this->User_model->count_not_attendent($date);
            $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($date);
            $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($date);
            $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($date);
            $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
            $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
            $json['status_row'] = $this->load->view('admin/patient_status_row', $data, true);
            $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }
    }

    public function book_appointment() {
        $patName = $this->input->post('patName');
        $patCell = $this->input->post('cellNo');
        $bookingFlag = $this->input->post('bookingflag');
        $appdate = $this->input->post('appointmentDate');
        $date = date('Y-m-d', strtotime($appdate));
        $currentdate = date('Y-m-d');
        $limiter = $this->Dashboard_model->get_limiter();
        $limite = $limiter->limiter;
        $bookingCount = $this->User_model->count_bookings();
        $limit = $limite;
        $count = $bookingCount;
        if ($limit > $count) {
            if ($bookingFlag == "vip") {
                if (!empty($patName) && !empty($patCell) && !empty($appdate)) {
                    $AppFee = $this->input->post('fee');
                    $get_last_orderno = $this->User_model->get_last_booking();
                    if ($get_last_orderno == false) {
                        $order_no = 6;
                    } else {
                        $lastbookingate = date('Y-m-d', strtotime($get_last_orderno->appointment_date));
                        if ($lastbookingate < $date) {
                            $order_no = 6;
                        } else {
                            $order_no = $get_last_orderno->order_number;
                            if ($order_no < 6) {
                                $order_no = 6;
                            } else {
                                $order_no = $order_no + 1;
                            }
                        }
                    }
                    $app['datetime'] = $appdate . " " . date('H:i:s');
                    $bookingDatetime = date('Y-m-d H:i:s', strtotime($app['datetime']));
                    $data = array();
                    $collectedby = $this->session->userdata('username');
                    if ($AppFee == "") {
                        $data = array(
                            'order_number' => $order_no,
                            'full_name' => $patName,
                            'contact_number' => $patCell,
                            'appointment_date' => $bookingDatetime,
                            'consultant_fee' => $AppFee,
                            'booking_flag' => $bookingFlag
                        );
                    } else {
                        $data = array(
                            'order_number' => $order_no,
                            'full_name' => $patName,
                            'contact_number' => $patCell,
                            'appointment_date' => $bookingDatetime,
                            'consultant_fee' => $AppFee,
                            'fee_collected_by' => $collectedby,
                            'fee_paid_at' => $bookingDatetime,
                            'fee_paid_status' => '1',
                            'booking_flag' => $bookingFlag
                        );
                    }
                    $result = $this->User_model->appointment_book($data);
                    if ($result) {
                        $data['booking_flag'] = $bookingFlag;
                        $data['consultant_booking'] = $this->User_model->get_first_five_rows_today();
                        $data['booking_details'] = $this->User_model->get_bookings_with_flag($bookingFlag);
                        $data['fee_paid'] = $this->User_model->count_fee_paid();
                        $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                        $data['ett_count'] = $this->User_model->count_ett_waiting();
                        $data['echo_count'] = $this->User_model->count_echo_waiting();
                        $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                        $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                        $data['count_complete'] = $this->User_model->count_complete();
                        $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($currentdate);
                        $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($currentdate);
                        $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($currentdate);
                        $data['wallet_refund'] = $this->User_model->get_todays_total_refund($currentdate);
                        $data['total_attended'] = $this->User_model->count_total_attendent($currentdate);
                        $data['total_not_attended'] = $this->User_model->count_not_attendent($currentdate);
                        $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($currentdate);
                        $data['refund_count'] = $this->User_model->count_refund_rows($currentdate);
                        $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($currentdate);
                        $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($currentdate);
                        $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                        $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                        $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                        $json['message'] = "Booked successfully";
                    } else {
                        $data['booking_flag'] = $bookingFlag;
                        $data['consultant_booking'] = $this->User_model->get_first_five_rows_today();
                        $data['booking_details'] = $this->User_model->get_bookings_with_flag($bookingFlag);
                        $data['fee_paid'] = $this->User_model->count_fee_paid();
                        $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                        $data['ett_count'] = $this->User_model->count_ett_waiting();
                        $data['echo_count'] = $this->User_model->count_echo_waiting();
                        $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                        $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                        $data['count_complete'] = $this->User_model->count_complete();
                        $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($currentdate);
                        $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($currentdate);
                        $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($currentdate);
                        $data['wallet_refund'] = $this->User_model->get_todays_total_refund($currentdate);
                        $data['total_attended'] = $this->User_model->count_total_attendent($currentdate);
                        $data['total_not_attended'] = $this->User_model->count_not_attendent($currentdate);
                        $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($currentdate);
                        $data['refund_count'] = $this->User_model->count_refund_rows($currentdate);
                        $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($currentdate);
                        $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($currentdate);
                        $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                        $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                        $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                        $json['error'] = true;
                    }
                } else {
                    $data['booking_flag'] = $bookingFlag;
                    $data['consultant_booking'] = $this->User_model->get_first_five_rows_today();
                    $data['booking_details'] = $this->User_model->get_bookings_with_flag($bookingFlag);
                    $data['fee_paid'] = $this->User_model->count_fee_paid();
                    $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                    $data['ett_count'] = $this->User_model->count_ett_waiting();
                    $data['echo_count'] = $this->User_model->count_echo_waiting();
                    $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                    $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                    $data['count_complete'] = $this->User_model->count_complete();
                    $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($currentdate);
                    $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($currentdate);
                    $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($currentdate);
                    $data['wallet_refund'] = $this->User_model->get_todays_total_refund($currentdate);
                    $data['total_attended'] = $this->User_model->count_total_attendent($currentdate);
                    $data['total_not_attended'] = $this->User_model->count_not_attendent($currentdate);
                    $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($currentdate);
                    $data['refund_count'] = $this->User_model->count_refund_rows($currentdate);
                    $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($currentdate);
                    $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($currentdate);
                    $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                    $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                    $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                    $json['message'] = "Please fill all the fields .";
                }

                if ($this->input->is_ajax_request()) {
                    set_content_type($json);
                }
            } else if ($bookingFlag == 'on_walk') {
                if (!empty($patName) && !empty($patCell)) {
                    $appdate = $this->input->post('appointmentDate');
                    $app['datetime'] = $appdate . " " . date('H:i:s');
                    $bookingDatetime = date('Y-m-d H:i:s', strtotime($app['datetime']));
                    $AppFee = $this->input->post('fee');
                    //calculating daily token number
                    $cur_date = date('Y-m-d');
                    $get_last_orderno = $this->User_model->get_last_booking();
                    if ($get_last_orderno == false) {
                        $order_no = 6;
                    } else {
                        $lastbookingate = date('Y-m-d', strtotime($get_last_orderno->appointment_date));
                        if ($lastbookingate < $date) {
                            $order_no = 6;
                        } else {
                            $order_no = $get_last_orderno->order_number;
                            if ($order_no < 6) {
                                $order_no = 6;
                            } else {
                                $order_no = $order_no + 1;
                            }
                        }
                    }
                    $data = array();
                    $collectedby = $this->session->userdata('username');
                    if ($AppFee == "") {
                        $data = array(
                            'order_number' => $order_no,
                            'full_name' => $patName,
                            'contact_number' => $patCell,
                            'appointment_date' => $bookingDatetime,
                            'consultant_fee' => $AppFee,
                            'booking_flag' => $bookingFlag
                        );
                    } else {
                        $data = array(
                            'order_number' => $order_no,
                            'full_name' => $patName,
                            'contact_number' => $patCell,
                            'appointment_date' => $bookingDatetime,
                            'consultant_fee' => $AppFee,
                            'fee_collected_by' => $collectedby,
                            'fee_paid_at' => $bookingDatetime,
                            'fee_paid_status' => '1',
                            'booking_flag' => $bookingFlag
                        );
                    }
                    $result = $this->User_model->appointment_book($data);
                    if ($result) {
                        $data['booking_flag'] = $bookingFlag;
                        $data['consultant_booking'] = $this->User_model->get_first_five_rows_today();
                        $data['booking_details'] = $this->User_model->get_bookings_with_flag($bookingFlag);
                        $data['fee_paid'] = $this->User_model->count_fee_paid();
                        $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                        $data['ett_count'] = $this->User_model->count_ett_waiting();
                        $data['echo_count'] = $this->User_model->count_echo_waiting();
                        $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                        $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                        $data['count_complete'] = $this->User_model->count_complete();
                        $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($currentdate);
                        $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($currentdate);
                        $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($currentdate);
                        $data['wallet_refund'] = $this->User_model->get_todays_total_refund($currentdate);
                        $data['total_attended'] = $this->User_model->count_total_attendent($currentdate);
                        $data['total_not_attended'] = $this->User_model->count_not_attendent($currentdate);
                        $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($currentdate);
                        $data['refund_count'] = $this->User_model->count_refund_rows($currentdate);
                        $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($currentdate);
                        $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($currentdate);
                        $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                        $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                        $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                        $json['message'] = "Booked successfully";
                    } else {
                        $data['booking_flag'] = $bookingFlag;
                        $data['consultant_booking'] = $this->User_model->get_first_five_rows_today();
                        $data['booking_details'] = $this->User_model->get_bookings_with_flag($bookingFlag);
                        $data['fee_paid'] = $this->User_model->count_fee_paid();
                        $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                        $data['ett_count'] = $this->User_model->count_ett_waiting();
                        $data['echo_count'] = $this->User_model->count_echo_waiting();
                        $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                        $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                        $data['count_complete'] = $this->User_model->count_complete();
                        $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($currentdate);
                        $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($currentdate);
                        $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($currentdate);
                        $data['wallet_refund'] = $this->User_model->get_todays_total_refund($currentdate);
                        $data['total_attended'] = $this->User_model->count_total_attendent($currentdate);
                        $data['total_not_attended'] = $this->User_model->count_not_attendent($currentdate);
                        $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($currentdate);
                        $data['refund_count'] = $this->User_model->count_refund_rows($currentdate);
                        $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($currentdate);
                        $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($currentdate);
                        $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                        $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                        $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                        $json['error'] = true;
                    }
                } else {
                    $data['booking_flag'] = $bookingFlag;
                    $data['consultant_booking'] = $this->User_model->get_first_five_rows_today();
                    $data['booking_details'] = $this->User_model->get_bookings_with_flag($bookingFlag);
                    $data['fee_paid'] = $this->User_model->count_fee_paid();
                    $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                    $data['ett_count'] = $this->User_model->count_ett_waiting();
                    $data['echo_count'] = $this->User_model->count_echo_waiting();
                    $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                    $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                    $data['count_complete'] = $this->User_model->count_complete();
                    $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($currentdate);
                    $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($currentdate);
                    $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($currentdate);
                    $data['wallet_refund'] = $this->User_model->get_todays_total_refund($currentdate);
                    $data['total_attended'] = $this->User_model->count_total_attendent($currentdate);
                    $data['total_not_attended'] = $this->User_model->count_not_attendent($currentdate);
                    $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($currentdate);
                    $data['refund_count'] = $this->User_model->count_refund_rows($currentdate);
                    $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($currentdate);
                    $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($currentdate);
                    $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                    $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                    $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                    $json['message'] = "Name and contact Number cannot be null.";
                }

                if ($this->input->is_ajax_request()) {
                    set_content_type($json);
                }
            } else if ($bookingFlag == 'on_call') {
                if (!empty($patName) && !empty($patCell) && !empty($appdate)) {
                    $appdate = $this->input->post('appointmentDate');
                    $app['datetime'] = $appdate . " " . date('H:i:s');
                    $bookingDatetime = date('Y-m-d H:i:s', strtotime($app['datetime']));
                    $AppFee = $this->input->post('fee');
                    //calculating daily token number
                    $cur_date = date('Y-m-d');
                    $get_last_orderno = $this->User_model->get_last_booking();
                    if ($get_last_orderno == false) {
                        $order_no = 6;
                    } else {
                        $lastbookingate = date('Y-m-d', strtotime($get_last_orderno->appointment_date));
                        if ($lastbookingate < $date) {
                            $order_no = 6;
                        } else {
                            $order_no = $get_last_orderno->order_number;
                            if ($order_no < 6) {
                                $order_no = 6;
                            } else {
                                $order_no = $order_no + 1;
                            }
                        }
                    }
                    $data = array();
                    $collectedby = $this->session->userdata('username');
                    if ($AppFee == "") {
                        $data = array(
                            'order_number' => $order_no,
                            'full_name' => $patName,
                            'contact_number' => $patCell,
                            'appointment_date' => $bookingDatetime,
                            'consultant_fee' => $AppFee,
                            'booking_flag' => $bookingFlag
                        );
                    } else {
                        $data = array(
                            'order_number' => $order_no,
                            'full_name' => $patName,
                            'contact_number' => $patCell,
                            'appointment_date' => $bookingDatetime,
                            'consultant_fee' => $AppFee,
                            'fee_collected_by' => $collectedby,
                            'fee_paid_at' => $bookingDatetime,
                            'fee_paid_status' => '1',
                            'booking_flag' => $bookingFlag
                        );
                    }
                    $result = $this->User_model->appointment_book($data);
                    if ($result) {
                        $data['booking_flag'] = $bookingFlag;
                        $data['consultant_booking'] = $this->User_model->get_first_five_rows_today();
                        $data['booking_details'] = $this->User_model->get_bookings_with_flag($bookingFlag);
                        $data['fee_paid'] = $this->User_model->count_fee_paid();
                        $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                        $data['ett_count'] = $this->User_model->count_ett_waiting();
                        $data['echo_count'] = $this->User_model->count_echo_waiting();
                        $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                        $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                        $data['count_complete'] = $this->User_model->count_complete();
                        $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($currentdate);
                        $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($currentdate);
                        $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($currentdate);
                        $data['wallet_refund'] = $this->User_model->get_todays_total_refund($currentdate);
                        $data['total_attended'] = $this->User_model->count_total_attendent($currentdate);
                        $data['total_not_attended'] = $this->User_model->count_not_attendent($currentdate);
                        $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($currentdate);
                        $data['refund_count'] = $this->User_model->count_refund_rows($currentdate);
                        $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($currentdate);
                        $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($currentdate);
                        $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                        $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                        $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                        $json['message'] = "Booked successfully";
                    } else {
                        $data['booking_flag'] = $bookingFlag;
                        $data['consultant_booking'] = $this->User_model->get_first_five_rows_today();
                        $data['booking_details'] = $this->User_model->get_bookings_with_flag($bookingFlag);
                        $data['fee_paid'] = $this->User_model->count_fee_paid();
                        $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                        $data['ett_count'] = $this->User_model->count_ett_waiting();
                        $data['echo_count'] = $this->User_model->count_echo_waiting();
                        $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                        $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                        $data['count_complete'] = $this->User_model->count_complete();
                        $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($currentdate);
                        $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($currentdate);
                        $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($currentdate);
                        $data['wallet_refund'] = $this->User_model->get_todays_total_refund($currentdate);
                        $data['total_attended'] = $this->User_model->count_total_attendent($currentdate);
                        $data['total_not_attended'] = $this->User_model->count_not_attendent($currentdate);
                        $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($currentdate);
                        $data['refund_count'] = $this->User_model->count_refund_rows($currentdate);
                        $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($currentdate);
                        $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($currentdate);
                        $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                        $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                        $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                        $json['error'] = true;
                    }
                } else {
                    $data['booking_flag'] = $bookingFlag;
                    $data['consultant_booking'] = $this->User_model->get_first_five_rows_today();
                    $data['booking_details'] = $this->User_model->get_bookings_with_flag($bookingFlag);
                    $data['fee_paid'] = $this->User_model->count_fee_paid();
                    $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                    $data['ett_count'] = $this->User_model->count_ett_waiting();
                    $data['echo_count'] = $this->User_model->count_echo_waiting();
                    $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                    $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                    $data['count_complete'] = $this->User_model->count_complete();
                    $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($currentdate);
                    $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($currentdate);
                    $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($currentdate);
                    $data['wallet_refund'] = $this->User_model->get_todays_total_refund($currentdate);
                    $data['total_attended'] = $this->User_model->count_total_attendent($currentdate);
                    $data['total_not_attended'] = $this->User_model->count_not_attendent($currentdate);
                    $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($currentdate);
                    $data['refund_count'] = $this->User_model->count_refund_rows($currentdate);
                    $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($currentdate);
                    $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($currentdate);
                    $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                    $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                    $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                    $json['message'] = "Please fill all the fields .";
                }

                if ($this->input->is_ajax_request()) {
                    set_content_type($json);
                }
            } else {
                if (!empty($patName) && !empty($patCell)) {
                    $appdate = $this->input->post('appointmentDate');
                    $app['datetime'] = $appdate . " " . date('H:i:s');
                    $bookingDatetime = date('Y-m-d H:i:s', strtotime($app['datetime']));
                    $AppFee = $this->input->post('fee');
                    //calculating daily token number
                    $cur_date = date('Y-m-d');
                    $get_last_orderno = $this->User_model->get_last_booking();
                    if ($get_last_orderno == false) {
                        $order_no = 6;
                    } else {
                        $lastbookingate = date('Y-m-d', strtotime($get_last_orderno->appointment_date));
                        if ($lastbookingate < $date) {
                            $order_no = 6;
                        } else {
                            $order_no = $get_last_orderno->order_number;
                            if ($order_no < 6) {
                                $order_no = 6;
                            } else {
                                $order_no = $order_no + 1;
                            }
                        }
                    }
                    $data = array();
                    $collectedby = $this->session->userdata('username');
                    if ($AppFee == "") {
                        $data = array(
                            'order_number' => $order_no,
                            'full_name' => $patName,
                            'contact_number' => $patCell,
                            'appointment_date' => $bookingDatetime,
                            'consultant_fee' => $AppFee
                        );
                    } else {
                        $data = array(
                            'order_number' => $order_no,
                            'full_name' => $patName,
                            'contact_number' => $patCell,
                            'appointment_date' => $bookingDatetime,
                            'consultant_fee' => $AppFee,
                            'fee_collected_by' => $collectedby,
                            'fee_paid_at' => $bookingDatetime,
                            'fee_paid_status' => '1'
                        );
                    }
                    $result = $this->User_model->appointment_book($data);
                    if ($result) {
                        $data['booking_flag'] = $bookingFlag;
                        $data['consultant_booking'] = $this->User_model->get_first_five_rows_today();
                        $data['booking_details'] = $this->User_model->get_bookings_with_flag($bookingFlag);
                        $data['fee_paid'] = $this->User_model->count_fee_paid();
                        $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                        $data['ett_count'] = $this->User_model->count_ett_waiting();
                        $data['echo_count'] = $this->User_model->count_echo_waiting();
                        $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                        $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                        $data['count_complete'] = $this->User_model->count_complete();
                        $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($currentdate);
                        $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($currentdate);
                        $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($currentdate);
                        $data['wallet_refund'] = $this->User_model->get_todays_total_refund($currentdate);
                        $data['total_attended'] = $this->User_model->count_total_attendent($currentdate);
                        $data['total_not_attended'] = $this->User_model->count_not_attendent($currentdate);
                        $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($currentdate);
                        $data['refund_count'] = $this->User_model->count_refund_rows($currentdate);
                        $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($currentdate);
                        $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($currentdate);
                        $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                        $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                        $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                        $json['message'] = "Booked successfully";
                    } else {
                        $data['booking_flag'] = $bookingFlag;
                        $data['consultant_booking'] = $this->User_model->get_first_five_rows_today();
                        $data['booking_details'] = $this->User_model->get_bookings_with_flag($bookingFlag);
                        $data['fee_paid'] = $this->User_model->count_fee_paid();
                        $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                        $data['ett_count'] = $this->User_model->count_ett_waiting();
                        $data['echo_count'] = $this->User_model->count_echo_waiting();
                        $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                        $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                        $data['count_complete'] = $this->User_model->count_complete();
                        $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($currentdate);
                        $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($currentdate);
                        $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($currentdate);
                        $data['wallet_refund'] = $this->User_model->get_todays_total_refund($currentdate);
                        $data['total_attended'] = $this->User_model->count_total_attendent($currentdate);
                        $data['total_not_attended'] = $this->User_model->count_not_attendent($currentdate);
                        $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($currentdate);
                        $data['refund_count'] = $this->User_model->count_refund_rows($currentdate);
                        $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($currentdate);
                        $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($currentdate);
                        $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                        $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                        $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                        $json['error'] = true;
                    }
                } else {
                    $data['booking_flag'] = $bookingFlag;
                    $data['consultant_booking'] = $this->User_model->get_first_five_rows_today();
                    $data['booking_details'] = $this->User_model->get_bookings_with_flag($bookingFlag);
                    $data['fee_paid'] = $this->User_model->count_fee_paid();
                    $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                    $data['ett_count'] = $this->User_model->count_ett_waiting();
                    $data['echo_count'] = $this->User_model->count_echo_waiting();
                    $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                    $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                    $data['count_complete'] = $this->User_model->count_complete();
                    $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($currentdate);
                    $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($currentdate);
                    $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($currentdate);
                    $data['wallet_refund'] = $this->User_model->get_todays_total_refund($currentdate);
                    $data['total_attended'] = $this->User_model->count_total_attendent($currentdate);
                    $data['total_not_attended'] = $this->User_model->count_not_attendent($currentdate);
                    $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($currentdate);
                    $data['refund_count'] = $this->User_model->count_refund_rows($currentdate);
                    $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($currentdate);
                    $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($currentdate);
                    $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                    $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                    $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                    $json['message'] = "Name and contact Number cannot be null.";
                }
            }
        } else {
            $data['booking_flag'] = $bookingFlag;
            $data['consultant_booking'] = $this->User_model->get_first_five_rows_today();
            $data['booking_details'] = $this->User_model->get_bookings_with_flag($bookingFlag);
            $data['fee_paid'] = $this->User_model->count_fee_paid();
            $data['ecg_count'] = $this->User_model->count_ecg_waiting();
            $data['ett_count'] = $this->User_model->count_ett_waiting();
            $data['echo_count'] = $this->User_model->count_echo_waiting();
            $data['investigation_count'] = $this->User_model->count_investigation_waiting();
            $data['checkup_count'] = $this->User_model->count_checkup_waiting();
            $data['count_complete'] = $this->User_model->count_complete();
            $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($currentdate);
            $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($currentdate);
            $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($currentdate);
            $data['wallet_refund'] = $this->User_model->get_todays_total_refund($currentdate);
            $data['total_attended'] = $this->User_model->count_total_attendent($currentdate);
            $data['total_not_attended'] = $this->User_model->count_not_attendent($currentdate);
            $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($currentdate);
            $data['refund_count'] = $this->User_model->count_refund_rows($currentdate);
            $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($currentdate);
            $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($currentdate);
            $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
            $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
            $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
            $json['message'] = "Limit reached for bookings.";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function update_fee() {
        $bkId = $this->input->post('bkId');
        $status = $this->input->post('fee_status');
        $flag = $this->input->post('flag');
        $searchdate = date('Y-m-d', strtotime($this->input->post('tabledate')));
        $result = $this->User_model->update_fee_paid($status, $bkId);
        if ($result) {
            $data['booking_flag'] = $flag;
            $data['consultant_booking'] = $this->User_model->get_first_five_rows($searchdate);
            $data['booking_details'] = $this->User_model->search_by_date($searchdate, $flag);
            $data['fee_paid'] = $this->User_model->count_fee_paid();
            $data['ecg_count'] = $this->User_model->count_ecg_waiting();
            $data['ett_count'] = $this->User_model->count_ett_waiting();
            $data['echo_count'] = $this->User_model->count_echo_waiting();
            $data['investigation_count'] = $this->User_model->count_investigation_waiting();
            $data['checkup_count'] = $this->User_model->count_checkup_waiting();
            $data['count_complete'] = $this->User_model->count_complete();
            $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($searchdate);
            $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($searchdate);
            $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($searchdate);
            $data['wallet_refund'] = $this->User_model->get_todays_total_refund($searchdate);
            $data['total_attended'] = $this->User_model->count_total_attendent($searchdate);
            $data['total_not_attended'] = $this->User_model->count_not_attendent($searchdate);
            $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($searchdate);
            $data['refund_count'] = $this->User_model->count_refund_rows($searchdate);
            $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($searchdate);
            $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($searchdate);
            $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
            $json['status_row'] = $this->load->view('admin/patient_status_row', $data, true);
            $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
            $json['success'] = true;
        } else {
            $data['booking_flag'] = $flag;
            $data['consultant_booking'] = $this->User_model->get_first_five_rows($searchdate);
            $data['booking_details'] = $this->User_model->search_by_date($searchdate, $flag);
            $data['fee_paid'] = $this->User_model->count_fee_paid();
            $data['ecg_count'] = $this->User_model->count_ecg_waiting();
            $data['ett_count'] = $this->User_model->count_ett_waiting();
            $data['echo_count'] = $this->User_model->count_echo_waiting();
            $data['investigation_count'] = $this->User_model->count_investigation_waiting();
            $data['checkup_count'] = $this->User_model->count_checkup_waiting();
            $data['count_complete'] = $this->User_model->count_complete();
            $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($searchdate);
            $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($searchdate);
            $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($searchdate);
            $data['wallet_refund'] = $this->User_model->get_todays_total_refund($searchdate);
            $data['total_attended'] = $this->User_model->count_total_attendent($searchdate);
            $data['total_not_attended'] = $this->User_model->count_not_attendent($searchdate);
            $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($searchdate);
            $data['refund_count'] = $this->User_model->count_refund_rows($searchdate);
            $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($searchdate);
            $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($searchdate);
            $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
            $json['status_row'] = $this->load->view('admin/patient_status_row', $data, true);
            $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function update_appointment_values() {
        $value = $this->input->post('appValue');
        $valToUpdate = $this->input->post('valToUpdate');
        $whereToupdate = $this->input->post('whereToupdate');
        $bookingFlag = $this->input->post('flag');
        $tabledate = $this->input->post('tabledate');
        $date = date('Y-m-d', strtotime($tabledate));
        if ($bookingFlag == 'vip') {
            $result = $this->User_model->update_value($value, $valToUpdate, $whereToupdate);
            if ($result) {
                $data['booking_flag'] = $bookingFlag;
                $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
                $data['booking_details'] = $this->User_model->getbookings_by_date_flag($date, $bookingFlag);
                $data['fee_paid'] = $this->User_model->count_fee_paid();
                $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                $data['ett_count'] = $this->User_model->count_ett_waiting();
                $data['echo_count'] = $this->User_model->count_echo_waiting();
                $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                $data['count_complete'] = $this->User_model->count_complete();
                $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($tabledate);
                $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($tabledate);
                $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($tabledate);
                $data['wallet_refund'] = $this->User_model->get_todays_total_refund($tabledate);
                $data['total_attended'] = $this->User_model->count_total_attendent($tabledate);
                $data['total_not_attended'] = $this->User_model->count_not_attendent($tabledate);
                $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($tabledate);
                $data['refund_count'] = $this->User_model->count_refund_rows($tabledate);
                $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($tabledate);
                $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($tabledate);
                $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                $json['success'] = true;
            } else {
                $data['booking_flag'] = $bookingFlag;
                $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
                $data['booking_details'] = $this->User_model->getbookings_by_date_flag($date, $bookingFlag);
                $data['fee_paid'] = $this->User_model->count_fee_paid();
                $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                $data['ett_count'] = $this->User_model->count_ett_waiting();
                $data['echo_count'] = $this->User_model->count_echo_waiting();
                $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                $data['count_complete'] = $this->User_model->count_complete();
                $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($tabledate);
                $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($tabledate);
                $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($tabledate);
                $data['wallet_refund'] = $this->User_model->get_todays_total_refund($tabledate);
                $data['total_attended'] = $this->User_model->count_total_attendent($tabledate);
                $data['total_not_attended'] = $this->User_model->count_not_attendent($tabledate);
                $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($tabledate);
                $data['refund_count'] = $this->User_model->count_refund_rows($tabledate);
                $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($tabledate);
                $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($tabledate);
                $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                $json['error'] = true;
            }
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        } else if ($bookingFlag == 'on_walk') {
            $result = $this->User_model->update_value($value, $valToUpdate, $whereToupdate);
            if ($result) {
                $data['booking_flag'] = $bookingFlag;
                $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
                $data['booking_details'] = $this->User_model->getbookings_by_date_flag($date, $bookingFlag);
                $data['fee_paid'] = $this->User_model->count_fee_paid();
                $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                $data['ett_count'] = $this->User_model->count_ett_waiting();
                $data['echo_count'] = $this->User_model->count_echo_waiting();
                $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                $data['count_complete'] = $this->User_model->count_complete();
                $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($tabledate);
                $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($tabledate);
                $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($tabledate);
                $data['wallet_refund'] = $this->User_model->get_todays_total_refund($tabledate);
                $data['total_attended'] = $this->User_model->count_total_attendent($tabledate);
                $data['total_not_attended'] = $this->User_model->count_not_attendent($tabledate);
                $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($tabledate);
                $data['refund_count'] = $this->User_model->count_refund_rows($tabledate);
                $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($tabledate);
                $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($tabledate);
                $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                $json['success'] = true;
            } else {
                $data['booking_flag'] = $bookingFlag;
                $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
                $data['booking_details'] = $this->User_model->getbookings_by_date_flag($date, $bookingFlag);
                $data['fee_paid'] = $this->User_model->count_fee_paid();
                $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                $data['ett_count'] = $this->User_model->count_ett_waiting();
                $data['echo_count'] = $this->User_model->count_echo_waiting();
                $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                $data['count_complete'] = $this->User_model->count_complete();
                $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($tabledate);
                $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($tabledate);
                $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($tabledate);
                $data['wallet_refund'] = $this->User_model->get_todays_total_refund($tabledate);
                $data['total_attended'] = $this->User_model->count_total_attendent($tabledate);
                $data['total_not_attended'] = $this->User_model->count_not_attendent($tabledate);
                $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($tabledate);
                $data['refund_count'] = $this->User_model->count_refund_rows($tabledate);
                $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($tabledate);
                $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($tabledate);
                $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                $json['error'] = true;
            }
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        } else if ($bookingFlag == 'on_call') {
            $result = $this->User_model->update_value($value, $valToUpdate, $whereToupdate);
            if ($result) {
                $data['booking_flag'] = $bookingFlag;
                $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
                $data['booking_details'] = $this->User_model->getbookings_by_date_flag($date, $bookingFlag);
                $data['fee_paid'] = $this->User_model->count_fee_paid();
                $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                $data['ett_count'] = $this->User_model->count_ett_waiting();
                $data['echo_count'] = $this->User_model->count_echo_waiting();
                $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                $data['count_complete'] = $this->User_model->count_complete();
                $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($tabledate);
                $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($tabledate);
                $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($tabledate);
                $data['wallet_refund'] = $this->User_model->get_todays_total_refund($tabledate);
                $data['total_attended'] = $this->User_model->count_total_attendent($tabledate);
                $data['total_not_attended'] = $this->User_model->count_not_attendent($tabledate);
                $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($tabledate);
                $data['refund_count'] = $this->User_model->count_refund_rows($tabledate);
                $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($tabledate);
                $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($tabledate);
                $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                $json['success'] = true;
            } else {
                $data['booking_flag'] = $bookingFlag;
                $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
                $data['booking_details'] = $this->User_model->getbookings_by_date_flag($date, $bookingFlag);
                $data['fee_paid'] = $this->User_model->count_fee_paid();
                $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                $data['ett_count'] = $this->User_model->count_ett_waiting();
                $data['echo_count'] = $this->User_model->count_echo_waiting();
                $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                $data['count_complete'] = $this->User_model->count_complete();
                $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($tabledate);
                $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($tabledate);
                $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($tabledate);
                $data['wallet_refund'] = $this->User_model->get_todays_total_refund($tabledate);
                $data['total_attended'] = $this->User_model->count_total_attendent($tabledate);
                $data['total_not_attended'] = $this->User_model->count_not_attendent($tabledate);
                $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($tabledate);
                $data['refund_count'] = $this->User_model->count_refund_rows($tabledate);
                $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($tabledate);
                $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($tabledate);
                $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                $json['error'] = true;
            }
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        } else {
            $result = $this->User_model->update_value($value, $valToUpdate, $whereToupdate);
            if ($result) {
                $data['booking_flag'] = $bookingFlag;
                $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
                $data['booking_details'] = $this->User_model->getbookings_by_date_flag($date, $bookingFlag);
                $data['fee_paid'] = $this->User_model->count_fee_paid();
                $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                $data['ett_count'] = $this->User_model->count_ett_waiting();
                $data['echo_count'] = $this->User_model->count_echo_waiting();
                $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                $data['count_complete'] = $this->User_model->count_complete();
                $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($tabledate);
                $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($tabledate);
                $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($tabledate);
                $data['wallet_refund'] = $this->User_model->get_todays_total_refund($tabledate);
                $data['total_attended'] = $this->User_model->count_total_attendent($tabledate);
                $data['total_not_attended'] = $this->User_model->count_not_attendent($tabledate);
                $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($tabledate);
                $data['refund_count'] = $this->User_model->count_refund_rows($tabledate);
                $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($tabledate);
                $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($tabledate);
                $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                $json['success'] = true;
            } else {
                $data['booking_flag'] = $bookingFlag;
                $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
                $data['booking_details'] = $this->User_model->getbookings_by_date_flag($date, $bookingFlag);
                $data['fee_paid'] = $this->User_model->count_fee_paid();
                $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                $data['ett_count'] = $this->User_model->count_ett_waiting();
                $data['echo_count'] = $this->User_model->count_echo_waiting();
                $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                $data['count_complete'] = $this->User_model->count_complete();
                $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($tabledate);
                $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($tabledate);
                $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($tabledate);
                $data['wallet_refund'] = $this->User_model->get_todays_total_refund($tabledate);
                $data['total_attended'] = $this->User_model->count_total_attendent($tabledate);
                $data['total_not_attended'] = $this->User_model->count_not_attendent($tabledate);
                $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($tabledate);
                $data['refund_count'] = $this->User_model->count_refund_rows($tabledate);
                $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($tabledate);
                $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($tabledate);
                $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
                $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                $json['error'] = true;
            }
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }
    }

    public function search_patient() {
        $date = $this->input->post('searchdate');
        $bookingFlag = $this->input->post('bookingflag');
        $searchdate = date('Y-m-d', strtotime($date));
        $cur_date = date('Y-m-d');

        if ($bookingFlag == 'vip') {
            $data['booking_flag'] = $bookingFlag;
            $data['consultant_booking'] = $this->User_model->get_first_five_rows($searchdate);
            $data['booking_details'] = $this->User_model->search_by_date($searchdate, $bookingFlag);
            $data['fee_paid'] = $this->User_model->count_fee_paid();
            $data['ecg_count'] = $this->User_model->count_ecg_waiting();
            $data['ett_count'] = $this->User_model->count_ett_waiting();
            $data['echo_count'] = $this->User_model->count_echo_waiting();
            $data['investigation_count'] = $this->User_model->count_investigation_waiting();
            $data['checkup_count'] = $this->User_model->count_checkup_waiting();
            $data['count_complete'] = $this->User_model->count_complete();
            $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
            $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
            $json['error'] = true;
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        } else if ($bookingFlag == 'on_call') {
            $data['booking_flag'] = $bookingFlag;
            $data['consultant_booking'] = $this->User_model->get_first_five_rows($searchdate);
            $data['booking_details'] = $this->User_model->search_by_date($searchdate, $bookingFlag);
            $data['fee_paid'] = $this->User_model->count_fee_paid();
            $data['ecg_count'] = $this->User_model->count_ecg_waiting();
            $data['ett_count'] = $this->User_model->count_ett_waiting();
            $data['echo_count'] = $this->User_model->count_echo_waiting();
            $data['investigation_count'] = $this->User_model->count_investigation_waiting();
            $data['checkup_count'] = $this->User_model->count_checkup_waiting();
            $data['count_complete'] = $this->User_model->count_complete();
            $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
            $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
            $json['error'] = true;
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        } else if ($bookingFlag == 'on_walk') {
            $data['booking_flag'] = $bookingFlag;
            $data['consultant_booking'] = $this->User_model->get_first_five_rows($searchdate);
            $data['booking_details'] = $this->User_model->search_by_date($searchdate, $bookingFlag);
            $data['fee_paid'] = $this->User_model->count_fee_paid();
            $data['ecg_count'] = $this->User_model->count_ecg_waiting();
            $data['ett_count'] = $this->User_model->count_ett_waiting();
            $data['echo_count'] = $this->User_model->count_echo_waiting();
            $data['investigation_count'] = $this->User_model->count_investigation_waiting();
            $data['checkup_count'] = $this->User_model->count_checkup_waiting();
            $data['count_complete'] = $this->User_model->count_complete();
            $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
            $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
            $json['error'] = true;

            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        } else {
            $data['booking_flag'] = $bookingFlag;
            $data['consultant_booking'] = $this->User_model->get_first_five_rows($searchdate);
            $data['booking_details'] = $this->User_model->search_by_date($searchdate, $bookingFlag);
            $data['fee_paid'] = $this->User_model->count_fee_paid();
            $data['ecg_count'] = $this->User_model->count_ecg_waiting();
            $data['ett_count'] = $this->User_model->count_ett_waiting();
            $data['echo_count'] = $this->User_model->count_echo_waiting();
            $data['investigation_count'] = $this->User_model->count_investigation_waiting();
            $data['checkup_count'] = $this->User_model->count_checkup_waiting();
            $data['count_complete'] = $this->User_model->count_complete();
            $json['result_html'] = $this->load->view('user/appointment_booking', $data, true);
            $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
            $json['error'] = true;

            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }
    }

    public function delete_patient() {
        $datestart = $this->input->post('fromDate');
        $dateend = $this->input->post('toDate');
        if ($datestart == "" && $dateend == "") {
            $json['message'] = "Please select the dates";
        } else {
            $startdate = date('Y-m-d', strtotime($datestart));
            $enddate = date('Y-m-d', strtotime($dateend));
            $result = $this->User_model->delete_patient($startdate, $enddate);
            if ($result) {
                $json['message'] = "Deleted successfully";
            } else {
                $json['message'] = "Nothing to delete";
            }
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function consultant_bookings() {
        $value = $this->input->post('appValue');
        $wheretoinsert = $this->input->post('valToUpdate');
        $flag = $this->input->post('flag');
        $orderno = $this->input->post('orderno');
        $searchdate = date('Y-m-d', strtotime($this->input->post('tabledate')));
        $check_order_exist = $this->User_model->order_exist($orderno, $searchdate);
        if ($check_order_exist) {
            $result = $this->User_model->update_consultant($value, $wheretoinsert, $orderno);
            if ($result) {
                $data['booking_flag'] = $flag;
                $data['consultant_booking'] = $this->User_model->get_first_five_rows($searchdate);
                $data['booking_details'] = $this->User_model->search_by_date($searchdate, $flag);
                $data['fee_paid'] = $this->User_model->count_fee_paid();
                $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                $data['ett_count'] = $this->User_model->count_ett_waiting();
                $data['echo_count'] = $this->User_model->count_echo_waiting();
                $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                $data['count_complete'] = $this->User_model->count_complete();
                $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($searchdate);
                $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($searchdate);
                $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($searchdate);
                $data['wallet_refund'] = $this->User_model->get_todays_total_refund($searchdate);
                $data['total_attended'] = $this->User_model->count_total_attendent($searchdate);
                $data['total_not_attended'] = $this->User_model->count_not_attendent($searchdate);
                $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($searchdate);
                $data['refund_count'] = $this->User_model->count_refund_rows($searchdate);
                $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($searchdate);
                $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($searchdate);
                $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                $json['message'] = 'Inserted successfully';
            } else {
                $data['booking_flag'] = $flag;
                $data['consultant_booking'] = $this->User_model->get_first_five_rows($searchdate);
                $data['booking_details'] = $this->User_model->search_by_date($searchdate, $flag);
                $data['fee_paid'] = $this->User_model->count_fee_paid();
                $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                $data['ett_count'] = $this->User_model->count_ett_waiting();
                $data['echo_count'] = $this->User_model->count_echo_waiting();
                $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                $data['count_complete'] = $this->User_model->count_complete();
                $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($searchdate);
                $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($searchdate);
                $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($searchdate);
                $data['wallet_refund'] = $this->User_model->get_todays_total_refund($searchdate);
                $data['total_attended'] = $this->User_model->count_total_attendent($searchdate);
                $data['total_not_attended'] = $this->User_model->count_not_attendent($searchdate);
                $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($searchdate);
                $data['refund_count'] = $this->User_model->count_refund_rows($searchdate);
                $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($searchdate);
                $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($searchdate);
                $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                $json['message'] = 'Not inserted';
            }
        } else {
            $result = $this->User_model->insert_consultant($value, $wheretoinsert, $flag, $orderno);
            if ($result) {
                $data['booking_flag'] = $flag;
                $data['consultant_booking'] = $this->User_model->get_first_five_rows($searchdate);
                $data['booking_details'] = $this->User_model->search_by_date($searchdate, $flag);
                $data['fee_paid'] = $this->User_model->count_fee_paid();
                $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                $data['ett_count'] = $this->User_model->count_ett_waiting();
                $data['echo_count'] = $this->User_model->count_echo_waiting();
                $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                $data['count_complete'] = $this->User_model->count_complete();
                $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($searchdate);
                $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($searchdate);
                $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($searchdate);
                $data['wallet_refund'] = $this->User_model->get_todays_total_refund($searchdate);
                $data['total_attended'] = $this->User_model->count_total_attendent($searchdate);
                $data['total_not_attended'] = $this->User_model->count_not_attendent($searchdate);
                $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($searchdate);
                $data['refund_count'] = $this->User_model->count_refund_rows($searchdate);
                $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($searchdate);
                $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($searchdate);
                $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                $json['message'] = 'Inserted successfully';
            } else {
                $data['booking_flag'] = $flag;
                $data['consultant_booking'] = $this->User_model->get_first_five_rows($searchdate);
                $data['booking_details'] = $this->User_model->search_by_date($searchdate, $flag);
                $data['fee_paid'] = $this->User_model->count_fee_paid();
                $data['ecg_count'] = $this->User_model->count_ecg_waiting();
                $data['ett_count'] = $this->User_model->count_ett_waiting();
                $data['echo_count'] = $this->User_model->count_echo_waiting();
                $data['investigation_count'] = $this->User_model->count_investigation_waiting();
                $data['checkup_count'] = $this->User_model->count_checkup_waiting();
                $data['count_complete'] = $this->User_model->count_complete();
                $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($searchdate);
                $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($searchdate);
                $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($searchdate);
                $data['wallet_refund'] = $this->User_model->get_todays_total_refund($searchdate);
                $data['total_attended'] = $this->User_model->count_total_attendent($searchdate);
                $data['total_not_attended'] = $this->User_model->count_not_attendent($searchdate);
                $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($searchdate);
                $data['refund_count'] = $this->User_model->count_refund_rows($searchdate);
                $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($searchdate);
                $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($searchdate);
                $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
                $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
                $json['message'] = 'Not inserted';
            }
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function print_vip_list() {
        $flag = $this->input->get("flag");
        $data['booking_list'] = $this->User_model->get_all_vip($flag);
        $this->load->view('pages/print_vip_list', $data);
    }

    public function print_onwalk_list() {
        $flag = $this->input->get("flag");
        $data['booking_list'] = $this->User_model->get_all_oncall($flag);
        $this->load->view('pages/print_walk_list', $data);
    }

    public function print_oncall_list() {
        $flag = $this->input->get("flag");
        $data['booking_list'] = $this->User_model->get_all_onwalk($flag);
        $this->load->view('pages/print_call_list', $data);
    }

    public function print_all_list() {
        $date = date('Y-m-d', strtotime($this->input->get("date")));
        $data['booking_list'] = $this->User_model->print_all_app($date);
        $this->load->view('pages/print_all_list', $data);
    }

    public function search_all_categories() {
        $date = $this->input->post('searchdate');
        $searchdate = date('Y-m-d', strtotime($date));
        $vip = 'vip';
        $oncall = 'on_call';
        $onwalk = 'on_walk';
        $data['booking_vip'] = $this->User_model->getbookings_by_date_flag($searchdate, $vip);
        $data['booking_onwalk'] = $this->User_model->getbookings_by_date_flag($searchdate, $oncall);
        $data['booking_oncall'] = $this->User_model->getbookings_by_date_flag($searchdate, $onwalk);
        $data['consultant_booking'] = $this->User_model->get_first_five_rows($searchdate);
        $json['result_html'] = $this->load->view('admin/booking_categories', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function search_wallet_status(){
        $walletdate = date('Y-m-d', strtotime($this->input->post('walletsearch')));
        $data['wallet_consultant'] = $this->User_model->get_todays_fee_paid($walletdate);
        $data['wallet_ett'] = $this->User_model->get_todays_ett_fee_paid($walletdate);
        $data['wallet_echo'] = $this->User_model->get_todays_echo_fee_paid($walletdate);
        $data['wallet_refund'] = $this->User_model->get_todays_total_refund($walletdate);
        $data['total_attended'] = $this->User_model->count_total_attendent($walletdate);
        $data['total_not_attended'] = $this->User_model->count_not_attendent($walletdate);
        $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($walletdate);
        $data['refund_count'] = $this->User_model->count_refund_rows($walletdate);
        $data['wallet_ett_count'] = $this->User_model->count_ett_fee_paid_rows($walletdate);
        $data['wallet_echo_count'] = $this->User_model->count_echo_fee_paid_rows($walletdate);
        $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

}
?>



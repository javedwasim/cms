<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->model('Dashboard_model');
      $this->load->helper('content-type');
      $this->load->model('User_model');
      date_default_timezone_set("Asia/Karachi");
		}

	public function index()
	{

		 if(!$this->session->userdata('is_logged_in')){
       		$this->load->view('login');
	     } else{
        if($this->session->userdata('username')=='test'){
          $data['total_attended'] = $this->User_model->count_total_attendent();
          $data['total_not_attended'] = $this->User_model->count_not_attendent();
          $data['total_appointment'] = $this->Dashboard_model->get_total_appointments();
          $data['remaining_patient'] = $this->Dashboard_model->get_total_checked();
          $data['limiter_details'] = $this->Dashboard_model->get_limiter_details();
          $data['fee_paid'] = $this->User_model->count_fee_paid();
          $data['ecg_count'] = $this->User_model->count_ecg_waiting();
          $data['ett_count'] = $this->User_model->count_ett_waiting();
          $data['echo_count'] = $this->User_model->count_echo_waiting();
          $data['investigation_count'] = $this->User_model->count_investigation_waiting();
          $data['checkup_count'] = $this->User_model->count_checkup_waiting();
          $data['count_complete'] = $this->User_model->count_complete();
          $data['fee_count'] = $this->User_model->get_todays_fee_paid();
          $data['ett_fee'] = $this->User_model->get_todays_ett_fee_paid();
          $data['echo_fee'] = $this->User_model->get_todays_echo_fee_paid();
          $data['fee_refund'] = $this->User_model->get_todays_total_refund();
          $this->load->view('partial/header');
          $this->load->view('partial/navbar');
         $this->load->view('admin/dashboard',$data);
         $this->load->view('partial/footer');
        }else {
          $data['total_attended'] = $this->User_model->count_total_attendent();
          $data['total_not_attended'] = $this->User_model->count_not_attendent();
          $data['total_appointment'] = $this->Dashboard_model->get_total_appointments();
          $data['remaining_patient'] = $this->Dashboard_model->get_total_checked();
          $data['limiter_details'] = $this->Dashboard_model->get_limiter_details();
          $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows();
          $data['ett_count'] = $this->User_model->count_ett_fee_paid_rows();
          $data['echo_count'] = $this->User_model->count_echo_fee_paid_rows();
          $data['refund_count'] = $this->User_model->count_refund_rows();
          $data['investigation_count'] = $this->User_model->count_investigation_waiting();
          $data['checkup_count'] = $this->User_model->count_checkup_waiting();
          $data['count_complete'] = $this->User_model->count_complete();
          $this->load->view('partial/header');
          $this->load->view('partial/navbar');
          $this->load->view('admin/dashboard',$data);
          $this->load->view('partial/footer');
        }
	     		
	    }
	}


	public function login() {
    //$hashToStoreInDb = password_hash('admin', PASSWORD_BCRYPT); print_r($hashToStoreInDb);
    if(!$this->session->userdata('is_logged_in')) {
    if($post = $this->input->post()) {
      $user_name = $this->input->post('user_name');
      $result = $this->Dashboard_model->get_user($user_name);
      if($result) {
        if (password_verify ( $this->input->post('password') , $result['password'] )) {
          $this->session->set_userdata($result);
          $this->session->set_userdata('is_logged_in', '1');
          redirect('/');
        } else {
          	$this->session->set_flashdata('error', "Wrong username or password.");
          	$this->load->view('login');
        }

      } else {
        		$this->session->set_flashdata('error', "Wrong username or password.");
        	$this->load->view('login');
      }
    } else {
      //$this->session->set_flashdata('error', "Wrong user name or password.");
      $this->load->view('login');
    } 
  } 
}

	public function logout() {
		$this->session->sess_destroy();
  		redirect('/');
	}


  public function bookings(){
        $date = date('Y-m-d');
        $vip = 'vip'; $oncall = 'on_call'; $onwalk = 'on_walk';
        $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
        $data['booking_vip'] = $this->User_model->get_bookings_vip($vip);
        $data['booking_onwalk'] = $this->User_model->get_bookings_on_walk($onwalk);
        $data['booking_oncall'] = $this->User_model->get_bookings_on_call($oncall);
        $json['booking_cate'] = $this->load->view('admin/booking_categories',$data,true);
        $json['result_html'] = $this->load->view('admin/bookings',$data,true);
        if($this->input->is_ajax_request()) {
          set_content_type($json);
        }
      }

  public function update_limiter(){
    $limiter = $this->input->post('limiter');
    $limiterdate = date('Y-m-d',strtotime($this->input->post('limiterDate')));
    $clinic = date('H:i:s',strtotime($this->input->post('clinicTime')));
    $data = array(
              'limiter' => $limiter,
              'limiter_date' => $limiterdate,
              'clinic_time' => $clinic
          );
    $result = $this->Dashboard_model->limiter_update($data);
    if($result){
      return true;
    }else{
      return false;
    }
  }

  public function delete_single_patient(){
    $bkid = $this->input->post('bkId');
    $flag = $this->input->post('flag');
    $tabledate = $this->input->post('tabledate');
    $date = date('Y-m-d',strtotime($tabledate));
    $result = $this->Dashboard_model->single_patient_delete($bkid);
    if($result){
      $data['booking_flag'] = $flag;
      $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
      $data['booking_details'] = $this->User_model->getbookings_by_date_flag($date,$flag);
      $json['booking_table'] = $this->load->view('admin/booking_tbl',$data,true);
      $json['message'] = "Deleted successfully";
    }else{
      $json['message'] = "Could not be deleted there is an issue.";
    }
    if ($this->input->is_ajax_request()) {
                set_content_type($json);
          }
  }

  public function transfer(){
    $transferflag = $this->input->post('transferto');
    $transferid = $this->input->post('transferid');
    $date = date('Y-m-d');
    $result = $this->Dashboard_model->transfer_patient($transferflag,$transferid);
    if ($result) {
        $vip = 'vip'; $oncall = 'on_call'; $onwalk = 'on_walk';
        $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
        $data['booking_vip'] = $this->User_model->get_bookings_vip($vip);
        $data['booking_onwalk'] = $this->User_model->get_bookings_on_walk($onwalk);
        $data['booking_oncall'] = $this->User_model->get_bookings_on_call($oncall);
        $json['booking_cate'] = $this->load->view('admin/booking_categories',$data,true);
        $json['message'] = 'Successfully transferd.';
    }else{
        $json['message'] = 'Cannot be transferd.';
    }
    if ($this->input->is_ajax_request()) {
                set_content_type($json);
          }
  }




}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->model('Dashboard_model');
            $this->load->helper('content-type');
            $this->load->model('User_model');
            $this->load->model('Profile_model');
            date_default_timezone_set("Asia/Karachi");
		}

	public function index()
	{
    $date = date('Y-m-d'); 
		 if(!$this->session->userdata('is_logged_in')){
       		$this->load->view('login');
	     } else{
        $data['total_attended'] = $this->User_model->count_total_attendent($date);
        $data['total_not_attended'] = $this->User_model->count_not_attendent($date);
        $data['total_appointment'] = $this->Dashboard_model->get_total_appointments();
        $data['remaining_patient'] = $this->Dashboard_model->get_total_checked();
        $data['limiter_details'] = $this->Dashboard_model->get_limiter_details();
        $data['fee_paid_count'] = $this->User_model->count_consultant_fee_paid_rows($date);
        $data['ett_count'] = $this->User_model->count_ett_fee_paid_rows($date);
        $data['echo_count'] = $this->User_model->count_echo_fee_paid_rows($date);
        $data['refund_count'] = $this->User_model->count_refund_rows($date);
        $data['investigation_count'] = $this->User_model->count_investigation_waiting();
        $data['checkup_count'] = $this->User_model->count_checkup_waiting();
        $data['count_complete'] = $this->User_model->count_complete();
        $data['rights'] = $this->session->userdata('other_rights');
        $this->load->view('partial/header',$data);
        $this->load->view('partial/navbar',$data);
        $this->load->view('admin/dashboard',$data);
        $this->load->view('partial/footer',$data);
	    }
	}

    public function login()
    {
        //$hashToStoreInDb = password_hash('admin', PASSWORD_BCRYPT); print_r($hashToStoreInDb);
        if (!$this->session->userdata('is_logged_in')) {
            if ($post = $this->input->post()) {
                $user_name = $this->input->post('user_name');
                $result = $this->Dashboard_model->get_user($user_name);
                if ($result) {
                    if (password_verify($this->input->post('password'), $result['password'])) {
                        $this->session->set_userdata('userdata', $result);
                        $this->session->set_userdata($result);
                        $other_rights = $this->Dashboard_model->get_other_rights_detail();
                        $this->session->set_userdata('other_rights', $other_rights);
                        $this->session->set_userdata('user_data_logged_in', $result);
                        $this->session->set_userdata('is_logged_in', '1');
                        redirect('/');
                    } else {
                        $this->session->set_flashdata('error', "Wrong password.");
                        $this->load->view('login');
                    }

                } else {
                    $this->session->set_flashdata('error', "Wrong username.");
                    $this->load->view('login');
                }
            } else {
                //$this->session->set_flashdata('error', "Wrong user name or password.");
                $this->load->view('login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
        exit();
    }


    public function bookings()
    {
        $date = date('Y-m-d');
        $vip = 'vip';
        $oncall = 'on_call';
        $onwalk = 'on_walk';
        $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
        $data['booking_vip'] = $this->User_model->get_bookings_vip($vip);
        $data['booking_onwalk'] = $this->User_model->get_bookings_on_walk($onwalk);
        $data['booking_oncall'] = $this->User_model->get_bookings_on_call($oncall);
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
        $data['rights'] = $this->session->userdata('other_rights');
        $json['wallet_count'] = $this->load->view('admin/wallet_modal', $data, true);
        $json['booking_cate'] = $this->load->view('admin/booking_categories', $data, true);
        $json['result_html'] = $this->load->view('admin/bookings', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function insert_limiter(){
        $limiter = $this->input->post('limiter');
        $limiterdate = date('Y-m-d', strtotime($this->input->post('limiterDate')));
        $clinic = date('H:i:s', strtotime($this->input->post('clinicTime')));
        $data_array = array(
            'limiter' => $limiter,
            'limiter_date' => $limiterdate,
            'clinic_time' => $clinic
        );
        $result = $this->Dashboard_model->add_limiter($data_array);
        if ($result) {
            $json['success'] = true;
            $json['message'] = 'Successfully Added.'; 
        } else {
            $json['error'] = true;
            $json['message'] = 'Seems an error';
        }
        $data['rights'] = $this->session->userdata('other_rights');
        $data['limiter_details'] = $this->Dashboard_model->get_limiter_details();
        $json['result_html'] = $this->load->view('pages/limiter_table',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_single_patient()
    {
        $bkid = $this->input->post('bkId');
        $flag = $this->input->post('flag');
        $tabledate = $this->input->post('tabledate');
        $date = date('Y-m-d', strtotime($tabledate));
        $result = $this->Dashboard_model->single_patient_delete($bkid);
        if ($result) {
            $data['booking_flag'] = $flag;
            $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
            $data['booking_details'] = $this->User_model->getbookings_by_date_flag($date, $flag);
            $data['rights'] = $this->session->userdata('other_rights');
            $json['booking_table'] = $this->load->view('admin/booking_tbl', $data, true);
            $json['message'] = "Deleted successfully";
        } else {
            $json['message'] = "Could not be deleted there is an issue.";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function transfer()
    {
        $transferflag = $this->input->post('transferto');
        $transferid = $this->input->post('transferid');
        $date = date('Y-m-d');
        if (!empty($transferflag) && !empty($transferid)) {
          $result = $this->Dashboard_model->transfer_patient($transferflag, $transferid);
          if ($result) {
              $json['success'] = true;
              $json['message'] = 'Successfully transferd.';
          } else {
              $json['error'] = false;
              $json['message'] = 'Cannot be transferd.';
          }
        }else{
          $json['error'] = false;
          $json['message'] = 'Fields are empty.';
        }
        $vip = 'vip';
        $oncall = 'on_call';
        $onwalk = 'on_walk';
        $data['rights'] = $this->session->userdata('other_rights');
        $data['consultant_booking'] = $this->User_model->get_first_five_rows($date);
        $data['booking_vip'] = $this->User_model->get_bookings_vip($vip);
        $data['booking_onwalk'] = $this->User_model->get_bookings_on_walk($onwalk);
        $data['booking_oncall'] = $this->User_model->get_bookings_on_call($oncall);
        $json['booking_cate'] = $this->load->view('admin/booking_categories', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function diary()
    {
      $data['users'] = $this->Dashboard_model->get_all_user();
      $data['rights'] = $this->session->userdata('other_rights');
      $data['rights'] = $this->session->userdata('other_rights');
      $json['result_html'] = $this->load->view('pages/diary', $data, true);
      if ($this->input->is_ajax_request()) {
          set_content_type($json);
      }
    }
    public function get_menus()
    {
        $this->load->model('model_menu');
        $menus_array = $this->model_menu->fetch_menu();
        $this->load->helper('menu');
        $data['rights'] = $this->session->userdata('other_rights');
        $data['menu_result'] = print_menu(0, $menus_array);
        $data['user_data'] = $this->session->userdata('userdata');
        $this->load->view('pages/menu', $data);
    }

    public function update_limiter(){
      $data = $this->input->post();
        $result = $this->Dashboard_model->limiter_update($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Updated successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function limiter_delete($id){
        $result = $this->Dashboard_model->delete_limiter($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Deleted Successfully.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['rights'] = $this->session->userdata('other_rights');
        $data['limiter_details'] = $this->Dashboard_model->get_limiter_details();
        $json['result_html'] = $this->load->view('pages/limiter_table',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }


}

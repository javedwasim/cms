<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_profiles extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->model('Print_model');
			$this->load->model('ETT_model');
			$this->load->model('Profile_model');
			$this->load->helper('content-type');
		}

	public function print_ett(){
		$testid = $this->input->get('testid');
		$patid = $this->input->get('patid');
        $data['test_details'] = $this->Profile_model->get_ett_detail_by_ids($patid,$testid);
        foreach($data['test_details'] as $key){
            $protocolid = $key['protocol_id']; 
            $testreasonid = $key['test_reason']; 
            $endingtestreasonid = $key['ending_reason']; 
        }
        $data['protocol'] = $this->Print_model->get_protocol_name_by_id($protocolid);
        $data['testreason'] = $this->Print_model->get_testreason_name_by_id($testreasonid);
        $data['endingtestreason'] = $this->Print_model->get_endingtestreason_name_by_id($endingtestreasonid);
		$data['protocol_details'] = $this->Profile_model->get_update_protocol_details_by_id($protocolid,$testid);
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($patid);
		$this->load->view('profile_prints/print_ett',$data);
	}

	// public function print_echo(){
	// 	$this->load->view('profile_prints/print_echo');
	// }

	public function print_lab_test(){
		$key = $this->input->get('key');
		$patid = $this->input->get('patid');
		$data['items'] = $this->Profile_model->get_lab_test_unit($key);
		$data['patient_info'] = $this->Profile_model->patient_info_by_id($patid);
		$this->load->view('profile_prints/print_lab_test',$data);
	}

	public function print_prescription(){
		$this->load->view('profile_prints/print_prescription');
	}

	public function print_special_inst(){
		$this->load->view('profile_prints/print_special_inst');
	}

	public function get_ett_details(){
		$testid = $this->input->post('testid');
		$patid = $this->input->post('patid');
        $data['test_details'] = $this->Profile_model->get_ett_detail_by_ids($patid,$testid);
        foreach($data['test_details'] as $key){
            $protocolid = $key['protocol_id']; 
            $testreasonid = $key['test_reason']; 
            $endingtestreasonid = $key['ending_reason']; 
        }
        $data['protocol'] = $this->Print_model->get_protocol_name_by_id($protocolid);
        $data['testreason'] = $this->Print_model->get_testreason_name_by_id($testreasonid);
        $data['endingtestreason'] = $this->Print_model->get_endingtestreason_name_by_id($endingtestreasonid);
		$data['protocol_details'] = $this->Profile_model->get_update_protocol_details_by_id($protocolid,$testid);
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($patid);
		$json['ett_print_html'] = $this->load->view('profile_report/ett_report',$data,true);
		if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
	}

	public function print_sp_inst(){
		$testid = $this->input->get('testid');
		$patid = $this->input->get('patid');
        $data['test_details'] = $this->Print_model->get_sp_inst_detail_by_ids($patid,$testid);
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($patid);
		$this->load->view('profile_prints/print_special_inst',$data);
	}

	public function delete_ett_test_details(){
		$testid = $this->input->post('detail_id');
		$patid = $this->input->post('patid');
		$result = $this->Print_model->delete_test_ett($testid,$patid);
		if ($result) {
        	$data['details'] = $this->Profile_model->get_ett_detail($patid);
	        if ($data) {
	            $json['success'] = true;
	            $json['ett_detail'] = $this->load->view('profile/ett_detail_table', $data, true);

	        } else {
	            $json['error'] = true;
	            $json['message'] = "seem to be an error.";
	        }
			$json['success'] = true;
			$json['message'] = 'Successfully Deleted.';
		}else{
			$json['error'] = true;
		}
		if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
	}

	public function delete_sp_isnt_test_details(){
		$testid = $this->input->post('detail_id');
		$patid = $this->input->post('patid');
		$result = $this->Print_model->delete_test_sp_inst($testid,$patid);
		if ($result) {
            $json['success'] = true;
            $json['message'] = 'Successfully Deleted.';
		}else{
			$json['error'] = true;
	        $json['message'] = "seem to be an error.";
		}
        $data['details'] = $this->Profile_model->get_sp_inst_detail($patid);
		$json['sp_inst_details'] = $this->load->view('profile/sp_inst_details_table', $data, true);
		if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
	}


    public function delete_lab_test_test_details(){
		$testid = $this->input->post('key');
		$patid = $this->input->post('patid');
		$result = $this->Print_model->delete_lab_test_details($testid,$patid);
		if ($result) {
            $json['success'] = true;
            $json['message'] = 'Successfully Deleted.';
		}else{
			$json['error'] = true;
	        $json['message'] = "seem to be an error.";
		}
        $data['details'] = $this->Profile_model->get_lab_test_detail($patid);
		$json['lab_detail'] = $this->load->view('profile/lab_detail_table', $data, true);
		if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
	}

	public function get_sp_details(){
		$testid = $this->input->post('testid');
		$patid = $this->input->post('patid');
        $data['test_details'] = $this->Print_model->get_sp_inst_detail_by_ids($patid,$testid);
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($patid);
        $json['sp_print_html'] = $this->load->view('profile_report/sp_report',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
	}
	public function get_lab_details(){
		$key = $this->input->post('testid');
		$patid = $this->input->post('patid');
		$data['items'] = $this->Profile_model->get_lab_test_unit($key);
		$data['patient_info'] = $this->Profile_model->patient_info_by_id($patid);
        $json['lab_print_html'] = $this->load->view('profile_report/lab_report',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
	}

	public function print_examination(){
		$testid = $this->input->get('testid');
		$patid = $this->input->get('patid');
        $data['advice_details'] = $this->Print_model->get_advice_detail_by_ids($patid,$testid);
        $data['dosage_details'] = $this->Print_model->get_dosage_detail_by_ids($patid,$testid);
        $data['history_details'] = $this->Print_model->get_history_detail_by_ids($patid,$testid);
        $data['instruction_details'] = $this->Print_model->get_instruction_detail_by_ids($patid,$testid);
        $data['investigation_details'] = $this->Print_model->get_investigation_detail_by_ids($patid,$testid);
        $data['measurement_details'] = $this->Print_model->get_measurement_detail_by_ids($patid,$testid);
        $data['medicine_details'] = $this->Print_model->get_medicine_detail_by_ids($patid,$testid);
        $data['examination_details'] = $this->Print_model->get_examination_detail_by_ids($patid,$testid);
        $data['visit_date'] = $this->Print_model->get_visit_date_by_ids($patid,$testid);
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($patid);
		$this->load->view('profile_prints/print_prescription',$data);
	}

	public function get_examination_details(){
		$testid = $this->input->post('testid');
		$patid = $this->input->post('patid');
		$data['advice_details'] = $this->Print_model->get_advice_detail_by_ids($patid,$testid);
        $data['dosage_details'] = $this->Print_model->get_dosage_detail_by_ids($patid,$testid);
        $data['history_details'] = $this->Print_model->get_history_detail_by_ids($patid,$testid);
        $data['instruction_details'] = $this->Print_model->get_instruction_detail_by_ids($patid,$testid);
        $data['investigation_details'] = $this->Print_model->get_investigation_detail_by_ids($patid,$testid);
        $data['measurement_details'] = $this->Print_model->get_measurement_detail_by_ids($patid,$testid);
        $data['medicine_details'] = $this->Print_model->get_medicine_detail_by_ids($patid,$testid);
        $data['examination_details'] = $this->Print_model->get_examination_detail_by_ids($patid,$testid);
        $data['visit_date'] = $this->Print_model->get_visit_date_by_ids($patid,$testid);
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($patid);
        $json['examination_print_html'] = $this->load->view('profile_report/prescription_report',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
	}

	public function print_echo(){
		$patient_id = $this->input->get('patid');
		$detail_id = $this->input->get('testid');
		$data['measurements'] = $this->Profile_model->get_patient_measurement($patient_id, $detail_id);
        $data['findings'] = $this->Profile_model->get_patient_echo_findings($patient_id, $detail_id);
        $data['diagnosis'] = $this->Profile_model->get_patient_echo_diagnosis($patient_id, $detail_id);
        $data['color_doppler'] = $this->Profile_model->get_patient_echo_color_doopler($patient_id, $detail_id);
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($patient_id);
        $this->load->view('profile_prints/print_echo',$data);
	}

	public function get_echo_details(){
		$patient_id = $this->input->post('patid');
		$detail_id = $this->input->post('testid');
		$data['measurements'] = $this->Profile_model->get_patient_measurement($patient_id, $detail_id);
        $data['findings'] = $this->Profile_model->get_patient_echo_findings($patient_id, $detail_id);
        $data['diagnosis'] = $this->Profile_model->get_patient_echo_diagnosis($patient_id, $detail_id);
        $data['color_doppler'] = $this->Profile_model->get_patient_echo_color_doopler($patient_id, $detail_id);
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($patient_id);
        $json['echo_report'] = $this->load->view('profile_report/echo_report',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
	}

}
?>
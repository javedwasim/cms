<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_profiles extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->model('Print_model');
			$this->load->model('ETT_model');
			$this->load->model('Profile_model');
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

	public function print_echo(){
		$this->load->view('profile_prints/print_echo');
	}

	}
?>
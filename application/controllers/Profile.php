<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->model('Setting_model');
        $this->load->model('Profile_model');
        $this->load->model('Dashboard_model');
        $this->load->model('Instruction_model');
        $this->load->model('Echo_model');
        $this->load->model('History_model');
        $this->load->model('Examination_model');
        $this->load->model('Instruction_model');
        $this->load->model('Medicine_model');
        $this->load->model('Investigation_model');
        $this->load->model('Setting_model');
        $this->load->model('ETT_model');
        $this->load->model('Print_model');
        $this->load->helper('content-type');
        date_default_timezone_set("Asia/Karachi");
    }

    public function index()
    {
        $data['professions'] = $this->Setting_model->get_professions();
        $data['districts'] = $this->Setting_model->get_districts();
        $data['profiles'] = $this->Profile_model->get_profiles();
        $data['rights'] = $this->session->userdata('other_rights');
        $json['profession_table'] = $this->load->view('pages/profession_table', $data, true);
        $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
        $json['result_html'] = $this->load->view('pages/profile', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function patient_special_instructions()
    {
        $data['rights'] = $this->session->userdata('other_rights');
        $data['category'] = 'clinical';
        $id = $this->input->post('patid');
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($id);
        $data['patient_vitals'] = $this->Profile_model->paitnet_vitals_by_id($id);
        $data['categories'] = $this->Instruction_model->get_instruction_categories($data);
        $data['sp_info'] = $this->Profile_model->get_sp_info($id);
        $json['sp_table'] = $this->load->view('profile/sp_inst_table', $data, true);
        $json['patient_information'] = $this->load->view('profile/patient_information', $data, true);
        $json['result_html'] = $this->load->view('pages/pat_sp_instructions', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function patient_lab_test()
    {
        $id = $this->input->post('patid');
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($id);
        $data['patient_vitals'] = $this->Profile_model->paitnet_vitals_by_id($id);
        $data['categories'] = $this->Setting_model->get_lab_categories();
        $data['tests'] = $this->Setting_model->get_lab_tests();
        $data['items'] = $this->Setting_model->get_lab_test_items();
        $json['laboratory_html'] = $this->load->view('laboratory/laboratory', $data, true);

        $data['tests'] = $this->Profile_model->get_lab_test_info($id);
        $json['test_table'] = $this->load->view('profile/lab_test_detail_table', $data, true);

        $json['patient_information'] = $this->load->view('profile/patient_information', $data, true);
        $json['result_html'] = $this->load->view('pages/pat_lab_test', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function patient_echo_test()
    {
        $data['rights'] = $this->session->userdata('other_rights');
        $id = $this->input->post('patid');
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($id);
        $data['patient_vitals'] = $this->Profile_model->paitnet_vitals_by_id($id);
        $data['main_categories'] = $this->Echo_model->get_echo_main_categories();
        $data['diseases'] = $this->Echo_model->get_disease_categories();
        $data['structures'] = $this->Echo_model->get_Structure_categories();
        $json['patient_information'] = $this->load->view('profile/patient_information', $data, true);
        $json['main_category_table'] = $this->load->view('profile/main_category_table', $data, true);
        $json['result_html'] = $this->load->view('pages/patient_echo_test', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function patient_ett_test()
    {
        $data['test_reasons'] = $this->ETT_model->get_test_reasons();
        $data['ending_reasons'] = $this->ETT_model->get_ending_reasons();
        $data['descriptions'] = $this->ETT_model->get_descriptions();
        $data['conclusions'] = $this->ETT_model->get_conclusions();
        $data['protocols'] = $this->ETT_model->get_protocol();
        $data['rights'] = $this->session->userdata('other_rights');
        $id = $this->input->post('patid');
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($id);
        $data['patient_vitals'] = $this->Profile_model->paitnet_vitals_by_id($id);
        $json['patient_information'] = $this->load->view('profile/patient_information', $data, true);
        $json['result_html'] = $this->load->view('pages/pat_ett_test', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_profile()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $name = $this->input->post('name');
        $relatename = $this->input->post('relatename');
        $agedigit = $this->input->post('agedigit');
        $ageyears = $this->input->post('age');
        $profession = $this->input->post('profession');
        $sex = $this->input->post('sex');
        $contact = $this->input->post('contact');
        $height = $this->input->post('height');
        $bmi = $this->input->post('bmi');
        $weight = $this->input->post('weight');
        $bsa = $this->input->post('bsa');
        $email = $this->input->post('email');
        $district = $this->input->post('district');
        $address = $this->input->post('address');
        $age = $agedigit . '' . $ageyears;
        $this->form_validation->set_rules('name', 'Patient Name', 'required|xss_clean');
        $this->form_validation->set_rules('relatename', 'Relative Name', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = "Please fill all the fields with valid inputs.";
        } else {
            $data = array(
                'pat_name' => $name,
                'pat_relative' => $relatename,
                'pat_age' => $age,
                'pat_profession' => $profession,
                'pat_sex' => $sex,
                'pat_contact' => $contact,
                'pat_height' => $height,
                'pat_bmi' => $bmi,
                'pat_weight' => $weight,
                'pat_bsa' => $bsa,
                'pat_email' => $email,
                'pat_district' => $district,
                'pat_address' => $address
            );
            $result = $this->Profile_model->insert_profile($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Profile Added Successfully.";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
            $data['profiles'] = $this->Profile_model->get_profiles();
            $data['rights'] = $this->session->userdata('other_rights');
            $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }
    }

    public function delete_profile()
    {
        $id = $this->input->post('id');
        $result = $this->Profile_model->delete_pat_profile($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Deleted successfully.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['profiles'] = $this->Profile_model->get_profiles();
        $data['rights'] = $this->session->userdata('other_rights');
        $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function update_modal()   {
        $id = $this->input->post('id');
        $data['professions'] = $this->Setting_model->get_professions();
        $data['districts'] = $this->Setting_model->get_districts();
        $data['profile_data'] = $this->Profile_model->get_profile_by_id($id);
        $data['rights'] = $this->session->userdata('other_rights');
        $json['edit_modal'] = $this->load->view('profile/edit_profile', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function update_profile_data()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $relatename = $this->input->post('relatename');
        $agedigit = $this->input->post('agedigit');
        $ageyears = $this->input->post('age');
        $profession = $this->input->post('profession');
        $sex = $this->input->post('sex');
        $contact = $this->input->post('contact');
        $height = $this->input->post('height');
        $bmi = $this->input->post('bmi');
        $weight = $this->input->post('weight');
        $bsa = $this->input->post('bsa');
        $email = $this->input->post('email');
        $district = $this->input->post('district');
        $address = $this->input->post('address');
        $age = $agedigit . '' . $ageyears;
        $this->form_validation->set_rules('name', 'Patient Name', 'required|xss_clean');
        $this->form_validation->set_rules('relatename', 'Relative Name', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = array(
                'pat_name' => $name,
                'pat_relative' => $relatename,
                'pat_age' => $age,
                'pat_profession' => $profession,
                'pat_sex' => $sex,
                'pat_contact' => $contact,
                'pat_height' => $height,
                'pat_bmi' => $bmi,
                'pat_weight' => $weight,
                'pat_bsa' => $bsa,
                'pat_email' => $email,
                'pat_district' => $district,
                'pat_address' => $address
            );
            $result = $this->Profile_model->update_profile($data, $id);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Profile Updated Successfully.";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
            $data['profiles'] = $this->Profile_model->get_profiles();
            $data['rights'] = $this->session->userdata('other_rights');
            $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }
    }

    public function save_note()
    {
        $usename = $this->input->post('username');
        $note = $this->input->post('note');
        $date = date('Y-m-d H:i:s');
        if ($usename == 'Select...') {
            $json['error'] = true;
            $json['message'] = "Please select a user.";
        }else{
            $data_array = array(
                'username' => $usename,
                'note' => $note,
                'updated_at' => $date
            );
            $result = $this->Profile_model->insert_notes($data_array);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Saved Successfully.";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['note_details'] = $this->Profile_model->get_notes();
        $data['users'] = $this->Dashboard_model->get_all_user();
        $json['diary_update'] = $this->load->view('diary/diary_update', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }


    public function save_ett_test(){
        $data = $this->input->post();
        if ($data['details_id']=='') {
            $patientid = $data['pat_id'];
            $testreason = $data['test_reason'];
            $medication = $data['medication'];
            $description = $data['description'];
            $conclusion = $data['conclusion'];
            $restinghr = $data['resting_hr'];
            $restingbpa = $data['resting_bp_a'];
            $restingbpb = $data['resting_bp_b'];
            $restingbp = $restingbpa . "\\" . $restingbpb;
            $maxhr = $data['max_hr'];
            $maxbpa = $data['max_bp_a'];
            $maxbpb = $data['max_bp_b'];
            $maxbp = $maxbpa . "\\" . $maxbpb;
            $maxpretar = $data['max_pre_tar'];
            $maxprehr = $data['max_pre_hr'];
            $hrbp = $data['hr_bp'];
            $ettmets = $data['mets'];
            $exercisetime = $data['exercise_time'];
            $endingreason = $data['ending_reason'];
            $ettprotocolid = $data['protocol_id'];
            $sig = $data['doc_sig'];
            $data_array = array(
                'patient_id' => $patientid,
                'test_reason' => $testreason,
                'medication' => $medication,
                'description' => $description,
                'conclusion' => $conclusion,
                'resting_hr' => $restinghr,
                'resting_bp' => $restingbp,
                'max_hr' => $maxhr,
                'max_bp' => $maxbp,
                'max_pre_tar' => $maxpretar,
                'max_pre_hr' => $maxprehr,
                'hr_bp' => $hrbp,
                'mets' => $ettmets,
                'exercise_time' => $exercisetime,
                'ending_reason' => $endingreason,
                'protocol_id' => $ettprotocolid,
                'doc_sig' => $sig
            );
            $insertedid = $this->Profile_model->insert_ett_test($data_array);
            if ($insertedid) {
                $result = $this->Profile_model->insert_ett_protocols($data, $insertedid);
                if ($result) {
                    $json['success'] = true;
                } else {
                    $json['error'] = true;
                }
            } else {
                $json['error'] = true;
            }
        }else{
            $detailid = $data['details_id'];
            $patientid = $data['pat_id'];
            $testreason = $data['test_reason'];
            $medication = $data['medication'];
            $description = $data['description'];
            $conclusion = $data['conclusion'];
            $restinghr = $data['resting_hr'];
            $restingbpa = $data['resting_bp_a'];
            $restingbpb = $data['resting_bp_b'];
            $restingbp = $restingbpa . "\\" . $restingbpb;
            $maxhr = $data['max_hr'];
            $maxbpa = $data['max_bp_a'];
            $maxbpb = $data['max_bp_b'];
            $maxbp = $maxbpa . "\\" . $maxbpb;
            $maxpretar = $data['max_pre_tar'];
            $maxprehr = $data['max_pre_hr'];
            $hrbp = $data['hr_bp'];
            $ettmets = $data['mets'];
            $exercisetime = $data['exercise_time'];
            $endingreason = $data['ending_reason'];
            $ettprotocolid = $data['protocol_id'];
            $sig = $data['doc_sig'];
            $data_array = array(
                'test_reason' => $testreason,
                'medication' => $medication,
                'description' => $description,
                'conclusion' => $conclusion,
                'resting_hr' => $restinghr,
                'resting_bp' => $restingbp,
                'max_hr' => $maxhr,
                'max_bp' => $maxbp,
                'max_pre_tar' => $maxpretar,
                'max_pre_hr' => $maxprehr,
                'hr_bp' => $hrbp,
                'mets' => $ettmets,
                'exercise_time' => $exercisetime,
                'ending_reason' => $endingreason,
                'protocol_id' => $ettprotocolid,
                'doc_sig' => $sig
            );
            $update_result = $this->Profile_model->update_ett_test($data_array,$detailid);
            if ($update_result) {
                $result = $this->Profile_model->update_ett_protocols($data);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = 'Successfully updated.';
                }else{
                    $json['error'] = true;
                    $json['message'] = 'Seems an error.';
                }
            }else{
                $json['error'] = true;
                $json['message'] = 'Seems an error.';
            }
            
        }
        $data['professions'] = $this->Setting_model->get_professions();
        $data['districts'] = $this->Setting_model->get_districts();
        $data['profiles'] = $this->Profile_model->get_profiles();
        $data['rights'] = $this->session->userdata('other_rights');
        $json['profession_table'] = $this->load->view('pages/profession_table', $data, true);
        $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
        $json['result_html'] = $this->load->view('pages/profile', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_note($id,$name)
    {
        $result = $this->Profile_model->delete_notes($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Deleted Successfully.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error.";
        }
        $data['notes_record'] = $this->Profile_model->notes_record($name);
        $json['diary_sidebar'] = $this->load->view('diary/diary_sidebar', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_notes_record()
    {
        $name = $this->input->post('username');
        $data['notes_record'] = $this->Profile_model->notes_record($name);
        $json['diary_sidebar'] = $this->load->view('diary/diary_sidebar', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_selected_note()
    {
        $id = $this->input->post('id');
        $data['note'] = $this->Profile_model->selectd_note($id);
        $json['update_note'] = $this->load->view('diary/diary_update', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function update_note()
    {
        $id = $this->input->post('id');
        $note = $this->input->post('note');
        if (empty($id)) {
           $json['error'] = true;
           $json['message'] = 'Please select user and note.';
        }else{
            $result = $this->Profile_model->update_diary_note($id, $note);
            if ($result) {
                $json['success'] = true;
                $json['message'] = 'Successfully Updated.';
            } else {
                $json['error'] = true;
                $json['message'] = 'Seems an error.';
            }
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }


    public function get_inst_item()
    {
        $filters = $this->input->post();
        $cat_id = $filters['inst_id'];
        $data['items'] = $this->Instruction_model->get_inst_items_by_category($filters);
        $data['selected_category'] = $cat_id;
        $data['active_tab'] = 'tests';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('pages/instruction_item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_lab_test()
    {
        $filters = $this->input->post();
        $lab_id = $filters['lab_id'];
        $data['tests'] = $this->Setting_model->get_lab_tests_by_category($lab_id);
        $data['selected_category'] = $lab_id;
        $data['active_tab'] = 'tests';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('profile/lab_test_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_lab_item_by_test_id($test_id)
    {
        $data['items'] = $this->Setting_model->get_lab_item_by_test_id($test_id);
        $json['result_html'] = $this->load->view('profile/lab_test_item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function patient_special_instruction()
    {
        $data = $this->input->post();
        $result = $this->Profile_model->save_special_instructions($data);
        if ($result) {
            $data['sp_info'] = $this->Profile_model->get_sp_info($data['patient_id']);
            $json['sp_table'] = $this->load->view('profile/sp_inst_table', $data, true);
            $json['success'] = true;
            $json['message'] = "Information save successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "seem to be an error.";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function profile_filters()
    {
        $filters = $this->input->post();
        $data['profiles'] = $this->Profile_model->get_profiles_by_filters($filters);
        $data['filters'] = $filters;
        $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function patient_info()
    {
        $id = $this->input->post('patid');
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($id);
        $data['patient_vitals'] = $this->Profile_model->paitnet_vitals_by_id($id);
        $data['details'] = $this->Profile_model->get_examination_detail($id);
        $json['details'] = $this->load->view('profile/examination-details_table', $data, true);
        $json['patient_information'] = $this->load->view('profile/patient_information', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function reset_profile_table()
    {
        $data['profiles'] = $this->Profile_model->get_profiles();
        $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_special_instructions()
    {
        $spid = $this->input->post('spid');
        $data['sp_inst'] = $this->Profile_model->get_special_instructions_by_id($spid);
        $description = $data['sp_inst']->description;
        $json['special_instructions'] = $description;
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }


    public function save_patient_lab_test()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('test_date', 'Test Date', 'required|xss_clean');

        $data = $this->input->post();
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $result = $this->Profile_model->save_patient_lab_test($data);
            if ($result) {
                $data['tests'] = $this->Profile_model->get_lab_test_info($data['patient_id']);
                $json['sp_table'] = $this->load->view('profile/lab_test_detail_table', $data, true);
                $json['success'] = true;
                $json['message'] = "Information save successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "seem to be an error.";
            }
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_profile_protocol_details($p_id){
        $detailid =  $this->input->post('detailid');
        if ($detailid == '') {
            $data['protocol_details'] = $this->ETT_model->get_protocol_details_by_id($p_id);
        }else{
            $data['details'] = $this->Profile_model->get_update_protocol_details_by_id($p_id,$detailid);
        }
        $data['selected_category'] = $p_id;
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('profile/protocol_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }


    public function get_lab_test_unit($key)
    {
        $data['items'] = $this->Profile_model->get_lab_test_unit($key);
        $json['result_html'] = $this->load->view('profile/lab_test_unit_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_measurement_by_filter($category)
    {
        $data['measurements'] = $this->Echo_model->get_measurement_by_filter($category);
        $data['active_tab'] = 'measurement';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('profile/category_measurement_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function set_echo_data()
    {
        $data = $this->input->post();
        $category_id = $data['measurement_cate_id'];
        $main_category = $this->Profile_model->get_main_category($category_id);
        //echo "<pre>"; print_r($data['item_value']);
        if (isset($data['item_value']) && (empty($data['item_value']))) {
            $json['error'] = true;
            $json['message'] = 'Please enter item value';

        } else {
            $patient_echo_id = $this->Profile_model->save_echo_profile_info($data,$main_category);
            if ($main_category['main_category']=='color_dooplers') {
                $data['color_doppler'] = $this->Profile_model->get_patient_color_doppler($patient_echo_id);
                $json['result_html'] = $this->load->view('profile/color_doppler_table', $data, true);
            }else{
                $data['measurements'] = $this->Profile_model->get_patient_measurement_by_category($patient_echo_id);
                $json['result_html'] = $this->load->view('profile/profile_measurement_table', $data, true);
            }
            $data['active_tab'] = 'measurement';
            $json['success'] = true;
            $json['message'] = 'Information save successfully!';
            $json['category_id'] = $main_category['main_category'];
            $data['rights'] = $this->session->userdata('other_rights');

        }
        $data['rights'] = $this->session->userdata('other_rights');
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_profile_echo_info()
    {
        $data = $this->input->post();
        $this->Profile_model->save_profile_echo_info($data);
        $json['success'] = true;
        $json['message'] = 'Information save successfully!';
        $data['professions'] = $this->Setting_model->get_professions();
        $data['districts'] = $this->Setting_model->get_districts();
        $data['profiles'] = $this->Profile_model->get_profiles();
        $data['rights'] = $this->session->userdata('other_rights');
        $json['profession_table'] = $this->load->view('pages/profession_table', $data, true);
        $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
        $json['result_html'] = $this->load->view('pages/profile', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_disease_findings_diagnosis($disease_id)
    {
        $result_st = $this->Profile_model->get_disease_findings_diagnosis($disease_id);
        $data_find['findings'] = $result_st['findings'];
        $data_dia['diagnosis'] = $result_st['diagnosis'];
        // print_r($data_find['findings']);
        // print_r($data_dia['diagnosis']);die();
        if ($data_find['findings']=="") {
            $data_array_1 = array();
        }else{
            $data_array_1 = array();
            foreach ($data_find['findings'] as $key) {
                $data_array_1[]=array(
                    'structure_id'=>$key['structure_id'],
                    'finding_id'=>$key['finding_id'],
                    'finding_name'=>$key['name'],
                );
            }
        }
        if($data_dia['diagnosis']==""){
            $data_array_2 = array();
        }else{
            $data_array_2 = array();
            foreach ($data_dia['diagnosis'] as $key) {
                $data_array_2[]=array(
                    'structure_id'=>$key['structure_id'],
                    'diagnosis_id'=>$key['diagnosis_id'],
                    'diagnosis_name'=>$key['name'],
                );
            }
        }
        $result = $this->Profile_model->save_finding_diagnosis_by_structure($data_array_1,$data_array_2);
        $data['findings'] = $result['findings'];
        $data['diagnosis'] = $result['diagnosis'];
        $json['success'] = true;
        $json['result_html'] = $this->load->view('profile/finding_table', $data, true);
        $json['diagnosis_html'] = $this->load->view('profile/profile_diagnosis_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_echo_detail(){
        $patient_id = $this->input->post('patient_id');
        $data['details'] = $this->Profile_model->get_echo_detail($patient_id);
        //print_r($data['details']);
        if ($data) {
            $json['success'] = true;
            $json['echo_detail'] = $this->load->view('profile/echo_detail_table', $data, true);

        } else {
            $json['error'] = true;
            $json['message'] = "seem to be an error.";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function patient_echo_edit_detail()
    {
        $data = $this->input->post();
        $patient_id = $data['patid'];
        $detail_id = $data['detail_id'];
        $data['rights'] = $this->session->userdata('other_rights');
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($patient_id);
        $data['main_categories'] = $this->Echo_model->get_echo_main_categories();
        $data['diseases'] = $this->Echo_model->get_disease_categories();
        $data['structures'] = $this->Echo_model->get_Structure_categories();
        $data['measurements'] = $this->Profile_model->get_patient_measurement($patient_id, $detail_id);
        $data['findings'] = $this->Profile_model->get_patient_echo_findings($patient_id, $detail_id);
        $data['diagnosis'] = $this->Profile_model->get_patient_echo_diagnosis($patient_id, $detail_id);
        $data['color_doppler'] = $this->Profile_model->get_patient_echo_color_doopler($patient_id, $detail_id);
        $json['patient_information'] = $this->load->view('profile/patient_information', $data, true);
        $json['main_category_table'] = $this->load->view('profile/main_category_table', $data, true);
        $json['result_html'] = $this->load->view('pages/patient_echo_test', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_lab_test_detail()
    {
        $patient_id = $this->input->post('patient_id');
        $data['details'] = $this->Profile_model->get_lab_test_detail($patient_id);
        //print_r($data['details']);
        if ($data) {
            $json['success'] = true;
            $json['lab_detail'] = $this->load->view('profile/lab_detail_table', $data, true);

        } else {
            $json['error'] = true;
            $json['message'] = "seem to be an error.";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }


    public function patient_echo_lab_edit_detail()
    {
        $data = $this->input->post();
        $id = $data['detail_id'];
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($id);
        $data['categories'] = $this->Setting_model->get_lab_categories();
        $data['tests'] = $this->Setting_model->get_lab_tests();
        $data['items'] = $this->Setting_model->get_lab_test_items();
        $json['laboratory_html'] = $this->load->view('laboratory/laboratory', $data, true);
        $data['tests'] = $this->Profile_model->get_lab_test_info($id);
        $json['test_table'] = $this->load->view('profile/lab_test_detail_table', $data, true);
        $json['patient_information'] = $this->load->view('profile/patient_information', $data, true);
        $json['result_html'] = $this->load->view('pages/pat_lab_test', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_examination_category_item($examination_id){
        $data['items'] = $this->Examination_model->get_examination_items_by_category($examination_id);
        $json['history_html'] = $this->load->view('profile/profile_history_item_table', $data, true);
        $json['result_html'] = $this->load->view('profile/profile_examination_item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_history_category_item($history_id){
        $data['items'] = $this->History_model->get_history_items_by_category($history_id);
        $json['history_html'] = $this->load->view('profile/profile_history_item_table', $data, true);        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_investigation_item($cat_id){
        $data['items'] = $this->Investigation_model->get_investigation_items_by_category($cat_id);
        $json['result_html'] = $this->load->view('profile/investigation_category_item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_advice_item($cat_id){
        $data['items'] = $this->Setting_model->get_advice_items_by_category($cat_id);
        $json['result_html'] = $this->load->view('profile/advice_category_item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_instruction_item($cat_id){
        $data['inst_id']=$cat_id;
        $data['category']='special';

        $data['items'] = $this->Instruction_model->get_inst_items_by_category($data);
        $json['result_html'] = $this->load->view('profile/instruction_category_item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_medicine_item($cat_id){
        $data['items'] = $this->Medicine_model->get_medicine_items_by_category($cat_id);
        $json['result_html'] = $this->load->view('profile/medicine_category_item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_medicine_dosage($cat_id){
        $data['dosages'] = $this->Medicine_model->get_medicine_dosage($cat_id);
        $json['result_html'] = $this->load->view('profile/medicine_dosage_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }
    public function get_color_doopler(){
        $json['color_doppler'] = $this->load->view('profile/color_doppler',"",true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }


    public function get_ett_detail(){
        $patient_id = $this->input->post('patient_id');
        $data['details'] = $this->Profile_model->get_ett_detail($patient_id);
        //print_r($data['details']);
        if ($data) {
            $json['success'] = true;
            $json['ett_detail'] = $this->load->view('profile/ett_detail_table', $data, true);

        } else {
            $json['error'] = true;
            $json['message'] = "seem to be an error.";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function patient_ett_edit_detail()
    {
        $data = $this->input->post();
        $patient_id = $data['patid'];
        $detail_id = $data['detail_id'];        
        $data['test_reasons'] = $this->ETT_model->get_test_reasons();
        $data['ending_reasons'] = $this->ETT_model->get_ending_reasons();
        $data['descriptions'] = $this->ETT_model->get_descriptions();
        $data['conclusions'] = $this->ETT_model->get_conclusions();
        $data['protocols'] = $this->ETT_model->get_protocol();
        $data['details'] = $this->Profile_model->get_ett_detail_by_ids($patient_id,$detail_id);
        foreach($data['details'] as $key){
            $protocolid = $key['protocol_id']; 
            $testreasonid = $key['test_reason']; 
            $endingtestreasonid = $key['ending_reason']; 
        }
        $data['protocol'] = $this->Print_model->get_protocol_name_by_id($protocolid);
        $data['testreason'] = $this->Print_model->get_testreason_name_by_id($testreasonid);
        $data['endingtestreason'] = $this->Print_model->get_endingtestreason_name_by_id($endingtestreasonid);
        $data['rights'] = $this->session->userdata('other_rights');
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($patient_id);
        $json['patient_information'] = $this->load->view('profile/patient_information', $data, true);
        $json['result_html'] = $this->load->view('pages/pat_ett_test', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_profile_examination_info()
    {
        $data = $this->input->post();
        if (isset($data['examination_testid'])&& $data['examination_testid'] != '') {
            $result = $this->Profile_model->update_profile_examination_info($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = 'Updated successfully!';
            }else{
                $json['error'] = true;
                $json['message'] = 'Seems an error!';
            }
        }else{
            $result = $this->Profile_model->save_profile_examination_info($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = 'Saved successfully!';
            }else{
                $json['error'] = true;
                $json['message'] = 'Seems an error!';
            }
        }
        $data['professions'] = $this->Setting_model->get_professions();
        $data['districts'] = $this->Setting_model->get_districts();
        $data['profiles'] = $this->Profile_model->get_profiles();
        $data['rights'] = $this->session->userdata('other_rights');
        $json['profession_table'] = $this->load->view('pages/profession_table', $data, true);
        $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
        $json['result_html'] = $this->load->view('pages/profile', $data, true);
        if ($this->input->is_ajax_request()){
            set_content_type($json);
        }
    }

    public function get_sp_inst_details(){
        $patient_id = $this->input->post('patient_id');
        $data['details'] = $this->Profile_model->get_sp_inst_detail($patient_id);
        //print_r($data['details']);
        if ($data) {
            $json['success'] = true;
            $json['sp_inst_details'] = $this->load->view('profile/sp_inst_details_table', $data, true);

        } else {
            $json['error'] = true;
            $json['message'] = "seem to be an error.";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_examinations_tests(){
        $patient_id = $this->input->post('patient_id');
        $data['details'] = $this->Profile_model->get_examination_detail($patient_id);
        if ($data) {
            $json['success'] = true;
            $json['details'] = $this->load->view('profile/examination-details_table', $data, true);

        } else {
            $json['error'] = true;
            $json['message'] = "seem to be an error.";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_examination_test_details(){
        $testid = $this->input->post('detail_id');
        $patid = $this->input->post('patid');
        $result = $this->Profile_model->delete_examination($testid,$patid);
        if ($result) {
            $json['success'] = true;
            $json['message'] = 'Deleted Successfully!';
        }else{
            $json['error'] = true;
            $json['message'] = 'Seems an error.';
        }
        $data['details'] = $this->Profile_model->get_examination_detail($patid);
        $json['examination_details'] = $this->load->view('profile/examination-details_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function patient_examination_edit_detail(){
        $testid = $this->input->post('detail_id');
        $patid = $this->input->post('patid');
        $instruction_category['category'] = 'special';
        $data['examination_category'] = $this->Examination_model->get_examination_categories();
        $data['items'] = $this->Examination_model->get_examination_items();
        $data['history_category'] = $this->History_model->get_profile_history();
        $data['history_items'] = $this->History_model->get_history_items();
        $data['investigations'] = $this->Investigation_model->get_investigation_categories();
        $data['investigation_items'] = $this->Investigation_model->get_investigation_items();
        $data['advices'] = $this->Setting_model->get_advices();
        $data['advice_items'] = $this->Setting_model->get_advice_items();
        $data['instructions'] = $this->Instruction_model->get_instruction_categories($instruction_category);
        $data['instruction_item'] = $this->Instruction_model->get_inst_items($instruction_category);
        $data['medicines'] = $this->Medicine_model->get_medicine_categories();
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
        $json['medicine_html'] = $this->load->view('profile/medicine_category_table', $data, true);
        $json['instruction_html'] = $this->load->view('profile/instruction_category_table', $data, true);
        $json['advice_html'] = $this->load->view('profile/advice_category_table', $data, true);
        $json['investigation_html'] = $this->load->view('profile/investigation_category_table', $data, true);
        $json['history_table'] = $this->load->view('profile/profile_history_table', $data, true);
        $json['patient_information'] = $this->load->view('profile/patient_information', $data, true);
        $json['examination_table'] = $this->load->view('profile/profile_examination_table', $data, true);
        $json['result_html'] = $this->load->view('pages/pat_examination', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_echo_test_details(){
        $testid = $this->input->post('testid');
        $patid = $this->input->post('patid');
        $result = $this->Profile_model->delete_echo_test_details($testid,$patid);
        if ($result) {
            $json['success'] = true;
            $json['message'] = 'Successfully Deleted.';
        }else{
            $json['error'] = true;
            $json['message'] = "seem to be an error.";
        }
        $data['details'] = $this->Profile_model->get_echo_detail($patid);
        $json['echo_detail'] = $this->load->view('profile/echo_detail_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function upload_files($patid,$category)
    {   

        if (isset($_FILES['profile_upload']['name'])) {
            // total files //
            $count = count($_FILES['profile_upload']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['profile_upload'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG' || $ext == 'txt' || $ext == 'TXT' || $ext == 'pdf' || $ext == 'PDF') {
                move_uploaded_file($_FILES['profile_upload']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                 $result = $this->Profile_model->save_file_profile($fname,$patid,$category);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = 'Successfully Uploaded.';
                    $data['files'] = $this->Profile_model->get_image_files($patid);
                } else {
                    $json['error'] = false;
                    $json['message'] = 'Upload correct file.';
                }

            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'PNG') {
            $json['image_html'] = $this->load->view('profile/profile_imag_slider',$data,true);
        }else if($ext == 'txt' || $ext == 'TXT'){
            $json['image_html'] = $this->load->view('profile/profile_txt_show_file',$data,true);
        }else{
            $json['image_html'] = $this->load->view('profile/profile_txt_show_file',$data,true);
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_last_visit_patient(){
        $visit_date = $this->input->post('ldate');
        $data['profiles']= $this->Profile_model->get_last_visit_patient($visit_date);
        $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function profile_searchin(){
        $val = $this->input->post('searchin');
        $data['profiles']= $this->Profile_model->profile_searchin($val);
        $json['profile_table'] = $this->load->view('profile/profile_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_image_files(){
        $id = $this->input->post('patid');
        $data['files'] = $this->Profile_model->get_image_files($id);
        $json['image_html'] = $this->load->view('profile/profile_imag_slider',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_pdf_files(){
        $id = $this->input->post('patid');
        $data['files'] = $this->Profile_model->get_image_files($id);
        $json['image_html'] = $this->load->view('profile/profile_pdf',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_text_files(){
        $id = $this->input->post('patid');
        $data['files'] = $this->Profile_model->get_image_files($id);
        $json['image_html'] = $this->load->view('profile/profile_txt_show_file',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_text(){
        $id = $this->input->post('val');
        $patid = $this->input->post('patid');
        $result = $this->Profile_model->delete_file($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = 'Deleted Successfully!';
        }else{
            $json['error'] = true;
            $json['message'] = 'Seems an error.';
        }
        $data['files'] = $this->Profile_model->get_image_files($patid);
        $json['image_html'] = $this->load->view('profile/profile_txt_show_file',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_image(){
        $id = $this->input->post('val');
        $patid = $this->input->post('patid');
        $result = $this->Profile_model->delete_file($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = 'Deleted Successfully!';
        }else{
            $json['error'] = true;
            $json['message'] = 'Seems an error.';
        }
        $data['files'] = $this->Profile_model->get_image_files($patid);
        $json['image_html'] = $this->load->view('profile/profile_imag_slider',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_pdf(){
        $id = $this->input->post('val');
        $patid = $this->input->post('patid');
        $result = $this->Profile_model->delete_file($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = 'Deleted Successfully!';
        }else{
            $json['error'] = true;
            $json['message'] = 'Seems an error.';
        }
        $data['files'] = $this->Profile_model->get_image_files($patid);
        $json['image_html'] = $this->load->view('profile/profile_pdf',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

}

?>
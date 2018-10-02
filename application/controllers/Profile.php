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

        $this->load->model('Setting_model');
        $this->load->model('ETT_model');
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
        $data['main_categories'] = $this->Echo_model->get_echo_main_categories();
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

    public function update_modal()
    {
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
        $data['note_details'] = $this->Profile_model->get_notes();
        $data['users'] = $this->Dashboard_model->get_all_user();
        $json['diary_update'] = $this->load->view('diary/diary_update', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_note($id)
    {
        $result = $this->Profile_model->delete_notes($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Deleted Successfully.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error.";
        }
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
        $result = $this->Profile_model->update_diary_note($id, $note);
        if ($result) {
            $json['success'] = true;
        } else {
            $json['error'] = true;
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
        $data = $this->input->post();
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
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_profile_protocol_details($p_id)
    {
        $data['protocol_details'] = $this->ETT_model->get_protocol_details_by_id($p_id);
        $data['selected_category'] = $p_id;
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('profile/protocol_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_ett_test()
    {
        $patientid = $this->input->post('patientid');
        $testreason = $this->input->post('testreason');
        $medication = $this->input->post('medication');
        $description = $this->input->post('description');
        $conclusion = $this->input->post('conclusion');
        $restinghr = $this->input->post('restinghr');
        $restingbpa = $this->input->post('restingbpa');
        $restingbpb = $this->input->post('restingbpb');
        $restingbp = $restingbpa . "\\" . $restingbpb;
        $maxhr = $this->input->post('maxhr');
        $maxbpa = $this->input->post('maxbpa');
        $maxbpb = $this->input->post('maxbpb');
        $maxbp = $maxbpa . "\\" . $maxbpb;
        $maxpretar = $this->input->post('maxpretar');
        $maxprehr = $this->input->post('maxprehr');
        $hrbp = $this->input->post('hrbp');
        $ettmets = $this->input->post('ettmets');
        $exercisetime = $this->input->post('exercisetime');
        $endingreason = $this->input->post('endingreason');
        $ettprotocolid = $this->input->post('ettprotocolid');
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
            'protocol_id' => $ettprotocolid
        );
        $result = $this->Profile_model->insert_ett_test($data_array);
        if ($result) {
            $json['success'] = true;
        } else {
            $json['error'] = true;
        }

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

    public function get_measurement_by_filter($category){
        $data['measurements'] = $this->Echo_model->get_measurement_by_filter($category);
        $data['active_tab'] = 'measurement';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('profile/category_measurement_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }
}

?>
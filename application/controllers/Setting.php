<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->helper('content-type');
        $this->load->model('Dashboard_model');
        $this->load->model('Setting_model');
        $this->load->model('History_model');
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->library('Csvimport');
        $this->load->model('Examination_model');
        $this->load->model('Investigation_model');
        $this->load->model('Instruction_model');
        $this->load->model('Medicine_model');
        $this->load->model('Profile_model');
        $this->load->model('Recommendation_model');
        $this->load->model('ETT_model');
        $this->load->model('Echo_model');
    }

    public function profession()
    {
        $data['rights'] = $this->session->userdata('other_rights');
        $data['professions'] = $this->Setting_model->get_professions();
        $json['profession_table'] = $this->load->view('pages/profession_table', $data, true);
        $json['result_html'] = $this->load->view('pages/profession', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function insert_profession()
    {
        $this->form_validation->set_rules('profession', 'Profession', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $profession = strtolower($this->input->post('profession'));
            $professionexist = $this->Setting_model->profession_exist($profession);
            if ($professionexist) {
                $json['error'] = true;
                $json['message'] = 'Already Exist.';
            } else {
                $result = $this->Setting_model->insert_profession($profession);
                $data['rights'] = $this->session->userdata('other_rights');
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = "Added Successfully.";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to be an error.";
                }
            }
        }
        $data['rights'] = $this->session->userdata('other_rights');
        $data['professions'] = $this->Setting_model->get_professions();
        $json['profession_table'] = $this->load->view('pages/profession_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_profession($id)
    {
        $result = $this->Setting_model->delete_pat_profession($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Deleted Successfully.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['professions'] = $this->Setting_model->get_professions();
        $json['profession_table'] = $this->load->view('pages/profession_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function update_profession()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = "Could not update empty field.";
        }else{
            $result = $this->Setting_model->update_profession($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Updated successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Could not be updated.";
            }
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function diestrict()
    {
        $data['rights'] = $this->session->userdata('other_rights');
        $data['districts'] = $this->Setting_model->get_districts();
        $json['district_table'] = $this->load->view('pages/district_table', $data, true);
        $json['result_html'] = $this->load->view('pages/district', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function insert_district()
    {
        $this->form_validation->set_rules('district', 'District', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $district = $this->input->post('district');
            $districtexist = $this->Setting_model->district_exist($district);
            if ($districtexist) {
                $json['error'] = true;
                $json['message'] = 'Already Exist.';
            } else {
                $result = $this->Setting_model->insert_district($district);
                $data['rights'] = $this->session->userdata('other_rights');
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = "Added Successfully.";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to be an error.";
                }
            }
        }
        $data['districts'] = $this->Setting_model->get_districts();
        $json['district_table'] = $this->load->view('pages/district_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function advice()
    {
        $cat_id = 0;
        $data['advices'] = $this->Setting_model->get_advices();
        $data['items'] = $this->Setting_model->get_advice_items_by_category($cat_id);
        // $data['items'] = $this->Setting_model->get_advice_items();
        $data['active_tab'] = 'advice';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('pages/advice', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function research()
    {
        $data['researches'] = $this->Setting_model->get_researches();
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('pages/add_research', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function register_user()
    {
        $data['other_rights'] = $this->Setting_model->get_other_rights();
        $data['userdata'] = $this->session->userdata('userdata');
        $data['users'] = $this->Setting_model->get_users();
        $json['user_html'] = $this->load->view('pages/register-user_table',$data,true);
        $json['result_html'] = $this->load->view('pages/register-user', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_patient()
    {
        $json['result_html'] = $this->load->view('pages/delete-patient', "", true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function limiter()
    {
        $data['rights'] = $this->session->userdata('other_rights');
        $data['limiter_details'] = $this->Dashboard_model->get_limiter_details();
        $json['limiter_table'] = $this->load->view('pages/limiter_table', $data, true);
        $json['result_html'] = $this->load->view('pages/limiter', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function laboratory_test()
    {   $cat_id = 0;
        $test_id = 0;
        $data['categories'] = $this->Setting_model->get_lab_categories();
        $data['tests'] = $this->Setting_model->get_lab_tests_by_category($cat_id);
        $data['labtests'] = $this->Setting_model->get_lab_tests();
        $data['items'] = $this->Setting_model->get_lab_item_by_test_id($test_id);
        // $data['items'] = $this->Setting_model->get_lab_test_items();
        $data['active_tab'] = 'category';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function permission()
    {
        $data['users'] = $this->Setting_model->get_users();
        $json['result_html'] = $this->load->view('pages/change_permissions', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }


    public function patient_exemination($patient_id){
        $data['patient_id'] = $patient_id;
        $instruction_category['category'] = 'clinical';
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
        $data['patient_info'] = $this->Profile_model->patient_info_by_id($patient_id);
        $data['patient_vitals'] = $this->Profile_model->paitnet_vitals_by_id($patient_id);
        $data['rights'] = $this->session->userdata('other_rights');
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

    public function add_advice()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Advice Name', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Setting_model->add_advice($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Successfully Created!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while creating advice";
            }
        }
        $data['advices'] = $this->Setting_model->get_advices();
        $data['items'] = $this->Setting_model->get_advice_items();
        $data['active_tab'] = 'advice';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('pages/advice', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_advice()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Setting_model->add_advice($data);
            if ($result == 'updated') {
                $json['success'] = true;
                $json['message'] = "Updated successfully!";
            }else if( $result == 'inserted'){  
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_advice($id)
    {
        $result = $this->Setting_model->delete_advice($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error in deleting advice record.";
        }
        $data['advices'] = $this->Setting_model->get_advices();
        $data['items'] = $this->Setting_model->get_advice_items();
        $data['active_tab'] = 'advice';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('pages/advice', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function add_advice_item()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Advice Name', 'required|xss_clean');
        $this->form_validation->set_rules('advice_id', 'Category', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $cat_id = $data['advice_id'];
            $result = $this->Setting_model->add_advice_item($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Successfully Created !";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while creating advice item";
            }
        }
        $data['advices'] = $this->Setting_model->get_advices();
        $data['items'] = $this->Setting_model->get_advice_items_by_category($cat_id);
        // $data['items'] = $this->Setting_model->get_advice_items();
        $data['active_tab'] = 'advice_item';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('pages/advice', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }


    public function delete_advice_item($id,$cat_id)
    {
        $result = $this->Setting_model->delete_advice_item($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error in deleting advice record.";
        }
        $data['advices'] = $this->Setting_model->get_advices();
        $data['items'] = $this->Setting_model->get_advice_items_by_category($cat_id);
        $data['active_tab'] = 'advice_item';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('pages/advice', $data, true);

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function save_advice_item()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Setting_model->add_advice_item($data);
            if ($result == 'updated') {
                $json['success'] = true;
                $json['message'] = "Updated successfully!";
            }else if( $result == 'inserted'){  
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_research()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Research Name', 'required|is_unique[research.name]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Setting_model->add_research($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Successfully Added!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while creating research";
            }
        }
        $data['researches'] = $this->Setting_model->get_researches();
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('pages/add_research', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_research()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Setting_model->add_research($data);
            if ($result == 'updated') {
                $json['success'] = true;
                $json['message'] = "Updated successfully!";
            }else if( $result == 'inserted'){  
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_research_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Setting_model->save_research_description($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Description added successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while adding description";
            }
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_research_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Setting_model->get_research_description($id);

        if ($result) {
            $json['success'] = true;
            $json['description'] = $result['description'];
            $json['category'] = $result['name'];
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }


    public function delete_research($id)
    {
        $result = $this->Setting_model->delete_research($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error in deleting research record.";
        }
        $data['researches'] = $this->Setting_model->get_researches();
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('pages/add_research', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function add_lab_category()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Laboratory Category', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Setting_model->add_lab_category($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Category created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while creating category";
            }
        }
        $data['categories'] = $this->Setting_model->get_lab_categories();
        $data['tests'] = $this->Setting_model->get_lab_tests();
        $data['items'] = $this->Setting_model->get_lab_test_items();
        $data['active_tab'] = 'category';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_lab_category_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Setting_model->get_lab_category_description($id);

        if ($result) {
            $json['success'] = true;
            $json['description'] = $result['description'];
            $json['category'] = $result['name'];
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_lab_category_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Setting_model->save_lab_category_description($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Description added successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while adding description";
            }
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_lab_category($id)
    {
        $result = $this->Setting_model->delete_lab_category($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Laboratory category successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error in deleting  record.";
        }
        $data['categories'] = $this->Setting_model->get_lab_categories();
        $data['tests'] = $this->Setting_model->get_lab_tests();
        $data['items'] = $this->Setting_model->get_lab_test_items();
        $data['active_tab'] = 'category';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function save_lab_category()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Setting_model->add_lab_category($data);
            if ($result == 'updated') {
                $json['success'] = true;
                $json['message'] = "Updated successfully!";
            }else if( $result == 'inserted'){  
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }


    public function add_lab_test()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Advice Name', 'required|xss_clean');
        $this->form_validation->set_rules('lab_category_id', 'Laboratory Category', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $cat_id = $data['lab_category_id'];
            $result = $this->Setting_model->add_lab_test($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Lab test created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['categories'] = $this->Setting_model->get_lab_categories();
        $data['tests'] = $this->Setting_model->get_lab_tests_by_category($cat_id);
        $data['labtests'] = $this->Setting_model->get_lab_tests();
        // $data['tests'] = $this->Setting_model->get_lab_tests();
        $data['items'] = array();
        $data['active_tab'] = 'tests';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_lab_test()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Setting_model->add_lab_test($data);
            if ($result == 'updated') {
                $json['success'] = true;
                $json['message'] = "Updated successfully!";
            }else if( $result == 'inserted'){  
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_lab_test($id,$cat_id)
    {
        $result = $this->Setting_model->delete_lab_test($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Laboratory test successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error in deleting record.";
        }
        $data['categories'] = $this->Setting_model->get_lab_categories();
        $data['labtests'] = $this->Setting_model->get_lab_tests();
        $data['tests'] = $this->Setting_model->get_lab_tests_by_category($cat_id);
        $data['items'] = array();
        $data['active_tab'] = 'tests';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function delete_lab_test_item($id,$test_id)
    {
        $result = $this->Setting_model->delete_lab_test_item($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Laboratory test item successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error.";
        }
        $data['categories'] = $this->Setting_model->get_lab_categories();
        $data['labtests'] = $this->Setting_model->get_lab_tests();
        $data['tests'] = $this->Setting_model->get_lab_tests();
        $data['items'] = $this->Setting_model->get_lab_item_by_test_id($test_id);
        $data['active_tab'] = 'items';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_lab_test_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Setting_model->get_lab_test_description($id);

        if ($result) {
            $json['success'] = true;
            $json['description'] = $result['description'];
            $json['category'] = $result['name'];
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_lab_test_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Setting_model->save_lab_test_description($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Description added successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while adding description";
            }
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_lab_test_by_category($cat_id)
    {
        $data['categories'] = $this->Setting_model->get_lab_categories();
        $data['tests'] = $this->Setting_model->get_lab_tests_by_category($cat_id);
        $data['items'] = array();
        $data['labtests'] = $this->Setting_model->get_lab_tests();
        $data['active_tab'] = 'tests';
        $data['selected_category'] = $cat_id;
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('laboratory/laboratory_test_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_lab_test_item()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Laboratory Name', 'required|xss_clean');
        $this->form_validation->set_rules('units', 'Laboratory Units', 'required|xss_clean');
        $this->form_validation->set_rules('lab_test_id', 'Laboratory Test', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $test_id = $data['lab_test_id'];
            $result = $this->Setting_model->add_lab_test_item($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Laboratory Item created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['categories'] = $this->Setting_model->get_lab_categories();
        $data['labtests'] = $this->Setting_model->get_lab_tests();
        $data['tests'] = $this->Setting_model->get_lab_tests();
        $data['items'] = $this->Setting_model->get_lab_item_by_test_id($test_id);
        $data['active_tab'] = 'items';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_lab_test_item_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Setting_model->get_lab_test_item_description($id);

        if ($result) {
            $json['success'] = true;
            $json['description'] = $result['description'];
            $json['category'] = $result['name'];
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_lab_test_item_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Setting_model->save_lab_test_item_description($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Description added successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while adding description";
            }
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_lab_test_item()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Setting_model->add_lab_test_item($data);
            if ($result == 'updated') {
                $json['success'] = true;
                $json['message'] = "Updated successfully!";
            }else if( $result == 'inserted'){  
                $json['success'] = true;
                $json['message'] = "Created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_lab_item_by_test_id($test_id)
    {
        $data['categories'] = $this->Setting_model->get_lab_categories();
        $data['labtests'] = $this->Setting_model->get_lab_tests();
        $data['tests'] = $this->Setting_model->get_lab_tests();
        $data['items'] = $this->Setting_model->get_lab_item_by_test_id($test_id);
        $data['active_tab'] = 'items';
        $data['selected_test_id'] = $test_id;
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function register_new_user()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        //rules for required fields e.g email should be unique
        $this->form_validation->set_rules('full_name', 'User Name', 'required|xss_clean');
        $this->form_validation->set_rules('gender', 'Gender', 'required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[login.username]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('contact_no', 'Contact No', 'required|xss_clean');
        $this->form_validation->set_rules('company', 'Company', 'required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = true;
            $validation_errors = validation_errors();
            //$this->session->set_flashdata('errors', $validation_errors);
            $json['message'] = $validation_errors;
        } else {
            $user = $this->input->post();
            $result = $this->Setting_model->register_new_user($user);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "User created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seem to be an error!";
            }
        }
        $data['users'] = $this->Setting_model->get_users();
        $json['user_html'] = $this->load->view('pages/register-user_table',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function assign_permission()
    {
        $data = $this->input->post();
        $user_permission = explode('-', $data['permission']);
        $user_permission['status'] = $data['status'];
        $result = $this->Setting_model->assign_permission($user_permission);

        $json['success'] = true;
        $json['message'] = "Information save successfully!";

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_district($id)
    {
        $result = $this->Setting_model->delete_pat_district($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Deleted Successfully.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['rights'] = $this->session->userdata('other_rights');
        $data['districts'] = $this->Setting_model->get_districts();
        $json['district_table'] = $this->load->view('pages/district_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function update_district()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = "Could not update empty field.";
        }else{
            $result = $this->Setting_model->update_pat_district($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Updated successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Could not be updated.";
            }
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_advice_item($cat_id){
        $data['items'] = $this->Setting_model->get_advice_items_by_category($cat_id);
        $data['advices'] = $this->Setting_model->get_advices();
        $data['selected_category'] = $cat_id;
        $data['active_tab'] = 'advice_item';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['cat_id'] = $cat_id;
        $json['result_html'] = $this->load->view('pages/advice', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function update_registered_user_password(){
        $data = $this->input->post();
        $userdata = $this->Dashboard_model->get_user($data['username']);
        if ($data['username']==$userdata['username']&& password_verify($data['old_password'], $userdata['password'])) {
                $result = $this->Setting_model->change_user_password($data);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = 'Successfully Updated';
                }else{
                    $json['error'] =  false;
                    $json['message'] = 'Could not be Updated.';
                }
        }else{
            $json['error'] =  false;
            $json['message'] = 'Username or Password Incorrect';
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function user_data_modal(){
        $user_name = $this->input->post('username');
        $data['user_data'] = $this->Dashboard_model->get_user($user_name);
        $userid = $data['user_data']['login_id'];        
        $data['users'] = $this->Setting_model->get_user_by_id($userid);
        // print_r($data['users']); die();
        $json['edit_modal'] = $this->load->view('pages/register-user_modal',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function update_registered_user(){
        $data = $this->input->post();
        $id = $data['user_id'];
        if (empty($data['password'])) {
            $data_array=array(
                'full_name' =>$data['full_name'],
                'gender' =>$data['gender'],
                'username' =>$data['username'],
                'contact_no' =>$data['contact_no'],
                'address' =>$data['address']
            );
        }else{
            $password = password_hash($data['password'], PASSWORD_BCRYPT);
            $data_array=array(
                'full_name' =>$data['full_name'],
                'gender' =>$data['gender'],
                'username' =>$data['username'],
                'contact_no' =>$data['contact_no'],
                'address' =>$data['address'],
                'password' => $password
            ); 
        }
        $result = $this->Setting_model->update_user_data($data_array,$id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = 'Updated Successfully!';
        }else{
            $json['error'] = true;
            $json['message'] = 'Seems an error.';
        }
        $data['users'] = $this->Setting_model->get_users();
        $json['user_html'] = $this->load->view('pages/register-user_table',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_user(){
        $userid = $this->input->post('userid');
        $username = $this->input->post('username');
        $result = $this->Setting_model->user_delete($userid,$username);
        if ($result) {
            $json['success'] = true;
            $json['message'] = 'Deleted Successfully!';
        }else{
            $json['error'] = false;
            $json['message'] = 'Seems an error.';
        }
        $data['users'] = $this->Setting_model->get_users();
        $json['user_html'] = $this->load->view('pages/register-user_table',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_new_user_register_modal(){
        $data['other_rights'] = $this->Setting_model->get_other_rights();
        $data['userdata'] = $this->session->userdata('userdata');
        $data['users'] = $this->Setting_model->get_users();
        $json['user_modal'] = $this->load->view('pages/register_new_user_modal',$data,true);
        if($this->input->is_ajax_request()){
            set_content_type($json);
        }
    }

//////////////////////////////////////////////// sorting moduls //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function sort_table($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_data($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function history_item_sort_table($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->history_item_sort_table($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_examination_table($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_examination_table($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_examination_item_table($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_examination_item_table($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_investigation_table($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_investigation_table($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_investigation_item_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_investigation_item_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_medicine_cat_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_medicine_cat_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_medicine_item_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_medicine_item_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_instruction_cat_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_instruction_cat_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_instruction_item_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_instruction_item_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_advice_cat_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_advice_cat_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_advice_item_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_advice_item_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_lab_test_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_lab_test_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_lab_test_item_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_lab_test_item_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_echo_disease_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_echo_disease_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_echo_structure_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_echo_structure_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_echo_cat_meas_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_echo_cat_meas_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_ett_test_reason_table($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_ett_test_reason_table($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_ending_reasons_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_ending_reasons_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_ett_description_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_ett_description_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_ett_conclusion_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_ett_conclusion_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_ett_protocol_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_ett_protocol_tbl($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

    public function sort_dosage_tbl($tablename,$id){
        $data = $this->input->post();
        $result = $this->Setting_model->sort_dosage($data,$tablename,$id);
        if ($result) {
            $json['success'] = true;
        }else{
            $json['error'] = true;
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
       
    }

//////////////////////////////////////////////// import export moduls ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function export_professions(){
        $result_data = $this->Setting_model->export_professions();
        $filename = 'professions.txt';
        if ($result_data) {
           $result = $this->export_file($result_data,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_file($result_data,$filename){
       header("Content-Description: File Transfer");
       header('Content-Encoding: UTF-8'); 
       header("Content-Disposition: attachment; filename=$filename"); 
       header("Content-Type: application/txt;charset=UTF-8");
       // file creation 
       $file = fopen('php://output', 'w');
       $header = array('Names'); 
       fputcsv($file, $header);
       foreach ($result_data as $key=>$line){ 
        fwrite($file,"\r\n");
        fputcsv($file,$line); 
       }
       fclose($file); 
       exit;
    }

    public function import_professions(){
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_profession_file($fname,$date_f);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        $data['professions'] = $this->Setting_model->get_professions();
        $json['profession_table'] = $this->load->view('pages/profession_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_profession_file($fname, $date_f) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'profession_name';
        $tbl = 'profession_tbl';
        $id = '';
        $cid = '';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = $row['Names'];
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'profession_name'=>$row['Names']
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }

    public function export_district(){
        $result_data = $this->Setting_model->export_district();
        $filename = 'districts.txt';
        if ($result_data) {
           $result = $this->export_file($result_data,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

     public function import_district(){
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_district_file($fname,$date_f);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        $data['districts'] = $this->Setting_model->get_districts();
        $json['district_table'] = $this->load->view('pages/district_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_district_file($fname, $date_f) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'district_name';
        $tbl = 'districts_tbl';
        $id = '';
        $cid = '';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = $row['Names'];
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'district_name'=>$row['Names']
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }

    public function export_history_items($category_id){
        $result_data = $this->Setting_model->export_history_items($category_id);
        // file name
        $filename = 'history_items.txt';
        if ($result_data) {
            $this->export_file($result_data,$filename);
        } else {
            $json['error'] = true;
            $json['message'] = 'No item found.';
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_history_items($id)
    {   
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_item_csv_file($fname, $date_f, $id);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = 'Successfully Uploaded.';
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

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_item_csv_file($fname, $date_f, $id)
    {
        $path = $this->config->item('file_upload_path') . $fname;
        $tbl = 'history_item';
        $cname = 'name';
        $cid = 'profile_history_id';
        if ($this->csvimport->get_array($path)) {
            $csv_array = $this->csvimport->get_array($path);
            if (array_key_exists('Names',$csv_array[0])) {
                foreach ($csv_array as $row) {
                    $cdata = $row['Names'];
                    $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                    if ($result > 0) {
                        continue;
                    }
                    $insert_data = array(
                        'name' => $row['Names'],
                        'profile_history_id' => $id
                    );
                    $this->Setting_model->insert_file_data($insert_data,$tbl);
                }
            }else{
                return false;
            }
            
            return true;
        } else {
            return false;
        }

    }

    public function export_examination_items($id)
    {
        $result_data = $this->Setting_model->export_examination_items($id);
        $filename = 'examintaion_items.txt';
        if ($result_data) {
            $this->export_file($result_data,$filename);
        } else {
            $json['error'] = true;
            $json['message'] = 'No item found.';
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_examination_items($id)
    {
        if (isset($_FILES['csv_exami_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_exami_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_exami_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_exami_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_item_examination_file($fname, $date_f, $id);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = 'Successfully Uploaded.';
                } else {
                    $json['error'] = false;
                    $json['message'] = 'Seems an error.';
                }

            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_item_examination_file($fname, $date_f, $id)
    {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'name';
        $tbl = 'examination_item';
        $cid = 'examination_id';
        if ($this->csvimport->get_array($path)) {
            $csv_array = $this->csvimport->get_array($path);
            if (array_key_exists('Names',$csv_array[0])) {
                foreach ($csv_array as $row) {
                    $cdata = $row['Names'];
                    $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                    if ($result > 0) {
                        continue;
                    }
                    $insert_data = array(
                        'name' => $row['Names'],
                        'examination_id' => $id
                    );
                    $this->Setting_model->insert_file_data($insert_data,$tbl);
                }
                return true;
            }else{
                return false;
            }
            
        } else {
            return false;
        }

    }

    public function export_investigation_items($id)
    {
        $investigation_items = $this->Setting_model->export_investigation_items($id);
        $filename = 'investigation_items.txt';
        if ($investigation_items) {
            $this->export_file($investigation_items,$filename);
        } else {
            $json['error'] = true;
            $json['message'] = 'No item found.';
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_investigation_items($id)
    {
        if (isset($_FILES['csv_investigation_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_investigation_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_investigation_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_investigation_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_item_investigation_file($fname, $date_f, $id);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = 'Successfully Uploaded.';
                } else {
                    $json['error'] = false;
                    $json['message'] = 'Seems an error.';
                }

            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_item_investigation_file($fname, $date_f, $id)
    {
        $cname = 'name';
        $tbl = 'investigation_item';
        $cid = 'investigation_id';
        $path = $this->config->item('file_upload_path') . $fname;
        if ($this->csvimport->get_array($path)) {
            $csv_array = $this->csvimport->get_array($path);
            if (array_key_exists('Names',$csv_array[0])) {
                foreach ($csv_array as $row) {
                    $cdata = $row['Names'];
                    $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                    if ($result > 0) {
                        continue;
                    }
                    $insert_data = array(
                        'name' => $row['Names'],
                        'investigation_id' => $id
                    );
                    $this->Setting_model->insert_file_data($insert_data);
                }
                return true;
            }else{
                return false;
            }
            
        } else {
            return false;
        }

    }

    public function export_angio(){
        $recommendations = $this->Setting_model->export_angio();
        $filename = 'recommendations.txt';
        if ($recommendations) {
           $this->export_file($recommendations,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_angio(){
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_angio_file($fname,$date_f);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        $data['recommendations'] = $this->Recommendation_model->get_recommendations();
        $json['result_html'] = $this->load->view('angio/recommendation_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_angio_file($fname, $date_f) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'description';
        $tbl = 'recommendation';
        $id = '';
        $cid = '';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = $row['Names'];
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'description'=>$row['Names']
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }

    public function export_instruction_items($id)
    {
        $instruction_items = $this->Setting_model->export_instruction_items($id);
        $filename = 'instruction_items.txt';
        if ($instruction_items) {
            $this->export_file($instruction_items,$filename);
        } else {
            $json['error'] = true;
            $json['message'] = 'No item found.';
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_instruction_items($id,$pid)
    {
        if (isset($_FILES['csv_instruction_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_instruction_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_instruction_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'TXT' || $ext == 'txt') {
                move_uploaded_file($_FILES['csv_instruction_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_item_instruction_file($fname, $date_f, $id,$pid);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = 'Successfully Uploaded.';
                } else {
                    $json['error'] = false;
                    $json['message'] = 'Seems an error.';
                }

            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_item_instruction_file($fname, $date_f, $id,$pid)
    {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'name';
        $tbl = 'instruction_item';
        $cid = 'instruction_id';
        if ($this->csvimport->get_array($path)) {
            $csv_array = $this->csvimport->get_array($path);
            if (array_key_exists('Names',$csv_array[0])) {
                foreach ($csv_array as $row) {
                    $cdata = utf8_decode($row['Names']);
                    $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                    if ($result > 0) {
                        continue;
                    }
                    $insert_data = array(
                        'name' =>  utf8_decode($row['Names']),
                        'instruction_id' => $id,
                        'category' => $pid
                    );
                    $this->Setting_model->insert_file_data($insert_data,$tbl);
                }
                return true;
            }else{
                return false;
            }
            
        } else {
            return false;
        }

    }

    public function export_medicine_items($id){
        $medicine_items = $this->Setting_model->export_medicine_items($id);
        $filename = 'medicine_items.txt';
        if ($medicine_items) {
           $this->export_file($medicine_items,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_medicine_items($id){
        if (isset($_FILES['csv_medicine_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_medicine_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_medicine_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_medicine_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_item_medicine_file($fname,$date_f,$id);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_item_medicine_file($fname, $date_f,$id) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'name';
        $tbl = 'medicine_item';
        $cid = 'medicine_id';
        if ($this->csvimport->get_array($path)) {
            $csv_array = $this->csvimport->get_array($path);
            if (array_key_exists('Names',$csv_array[0])) {
               foreach ($csv_array as $row) {
                    $cdata = $row['Names'];
                    $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                    if ($result > 0) {
                        continue;
                    }
                    $insert_data = array(
                        'name'=>$row['Names'],
                        'medicine_id' => $id
                    );
                    $this->Setting_model->insert_file_data($insert_data,$tbl);
                }
                return true;
            }else{
                return false;
            }    
        }else{
            return false;
        }
    }

    public function export_dosage(){
        $dosages = $this->Setting_model->export_dosage();
        $filename = 'dosages.txt'; 
        if ($dosages) {
           $this->export_file($dosages,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

     public function import_dosage(){
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'TXT' || $ext == 'txt') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_dosage_file($fname,$date_f);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        $data['districts'] = $this->Setting_model->get_districts();
        $json['district_table'] = $this->load->view('pages/district_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_dosage_file($fname, $date_f) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'name';
        $tbl = 'dosage';
        $id = '';
        $cid = '';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = utf8_decode($row['Names']);
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'name'=>utf8_decode($row['Names'])
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }

    public function export_advice_items($id){
        $advice_items = $this->Setting_model->export_advice_items($id);
        $filename = 'advice_items.txt'; 
        if ($advice_items) {
           $this->export_file($advice_items,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_advice_items($id){
        if (isset($_FILES['csv_advice_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_advice_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_advice_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_advice_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_item_advice_file($fname,$date_f,$id);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_item_advice_file($fname, $date_f,$id) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'name';
        $tbl = 'advice_item';
        $cid = 'advice_id';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = $row['Names'];
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'name'=>$row['Names'],
                            'advice_id' => $id
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }


    public function export_test_reasons(){
        $professions = $this->Setting_model->export_test_reasons();
        $filename = 'test_reason.txt';
        if ($professions) {
           $this->export_file($professions,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_test_reasons(){
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_test_reasons_file($fname,$date_f);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        $data['test_reasons'] = $this->ETT_model->get_test_reasons();
        $json['test_reasons_table'] = $this->load->view('ett/test_reason_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_test_reasons_file($fname, $date_f) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'test_reason';
        $tbl = 'ett_test_reason';
        $id = '';
        $cid = '';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = $row['Names'];
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'test_reason'=>$row['Names']
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }

    public function export_ending_reasons(){
        $ending_reasons = $this->Setting_model->export_ending_reasons();
        $filename = 'test_ending_reason.txt';
        if ($ending_reasons) {
           $this->export_file($ending_reasons,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_ending_reasons(){
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_ending_reasons_file($fname,$date_f);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        $data['ending_reasons'] = $this->ETT_model->get_ending_reasons();
        $json['ending_reasons_table'] = $this->load->view('ett/ending_reason_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_ending_reasons_file($fname, $date_f) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'ending_reason';
        $tbl = 'ett_ending_reason';
        $id = '';
        $cid = '';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = $row['Names'];
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'ending_reason'=>$row['Names']
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }

    public function export_ett_descriptions(){
        $descriptions = $this->Setting_model->export_ett_descriptions();
        $filename = 'ett_description.txt'; 
        if ($descriptions) {
           $this->export_file($descriptions,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_ett_descriptions(){
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_ett_description_file($fname,$date_f);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        $data['descriptions'] = $this->ETT_model->get_descriptions();
        $json['ett_descriptions_table'] = $this->load->view('ett/description_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_ett_description_file($fname, $date_f) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'description';
        $tbl = 'ett_description';
        $id = '';
        $cid = '';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = $row['Names'];
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'description'=>$row['Names']
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }

    public function export_ett_conclusions(){
        $conclusions = $this->Setting_model->export_ett_conclusions();
        $filename = 'ett_conclusion.txt';
        if ($conclusions) {
           $this->export_file($conclusions,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_ett_conclusions(){
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_ett_conclusion_file($fname,$date_f);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        $data['conclusions'] = $this->ETT_model->get_conclusions();
        $json['ett_conclusions_table'] = $this->load->view('ett/conclusion_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_ett_conclusion_file($fname, $date_f) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'conclusion';
        $tbl = 'ett_conclusion';
        $id = '';
        $cid = '';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = $row['Names'];
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'conclusion'=>$row['Names']
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }

    public function export_diseases(){
        $diseases = $this->Setting_model->export_diseases();
        $filename = 'disease.txt'; 
        if ($diseases) {
           $result = $this->export_file($diseases,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_diseases(){
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_disease_file($fname,$date_f);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        $data['categories'] = $this->Echo_model->get_disease_categories();
        $json['disease_table'] = $this->load->view('echo/disease_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_disease_file($fname, $date_f) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'name';
        $tbl = 'disease';
        $id = '';
        $cid = '';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = $row['Names'];
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'name'=>$row['Names']
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }

    public function export_structure(){
        $structures = $this->Setting_model->export_structure();
        $filename = 'structure.txt';
        if ($structures) {
           $result = $this->export_file($structures,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_structure(){
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_structure_file($fname,$date_f);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        $data['structures'] = $this->Echo_model->get_structure_categories();
        $json['structure_table'] = $this->load->view('echo/structure_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_structure_file($fname, $date_f) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'name';
        $tbl = 'structure';
        $id = '';
        $cid = '';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = $row['Names'];
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'name'=>$row['Names']
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }

    public function export_findings($id){
        $findings = $this->Setting_model->export_structure_findings_by_id($id);
        $filename = 'findings.txt';
        if ($findings) {
           $this->export_file($findings,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_finding($id){
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_finding_file($fname,$date_f,$id);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        $data['findings'] = $this->Echo_model->get_structure_findings_by_id($id);
        $json['finding_table'] = $this->load->view('echo/finding_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_finding_file($fname, $date_f,$id) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'name';
        $tbl = 'structure_finding';
        $cid = 'structure_id';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = $row['Names'];
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'name'=>$row['Names'],
                            'structure_id' => $id
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }

    public function export_diagnosis($id){
        $diagnosis = $this->Setting_model->export_structure_diagnosis_by_id($id);
        $filename = 'diagnosis.txt'; 
        if ($diagnosis) {
           $result = $this->export_file($diagnosis,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_diagnosis($id){
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_diagnosis_file($fname,$date_f,$id);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        $data['diagnosis'] = $this->Echo_model->get_structure_diagnosis_by_id($id);
        $json['diagnosis_table'] = $this->load->view('echo/diagnosis_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_diagnosis_file($fname, $date_f,$id) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'name';
        $tbl = 'diagnosis';
        $cid = 'structure_id';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = $row['Names'];
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'name'=>$row['Names'],
                            'structure_id' => $id
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }

    public function export_lab_cat(){
        $lab_cat = $this->Setting_model->export_lab_cat();
        $filename = 'laboratory_category.txt';
        if ($lab_cat) {
           $this->export_file($lab_cat,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_lab_cat(){
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_lab_cat_file($fname,$date_f);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_lab_cat_file($fname, $date_f) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'name';
        $tbl = 'structure';
        $id = '';
        $cid = '';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = $row['Names'];
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'name'=>$row['Names']
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }

    public function export_lab_items($id){
        $lab_items = $this->Setting_model->export_lab_tests_by_category($id);
        $filename = 'laboratory_test.txt';
        if ($lab_items) {
           $this->export_file($lab_items,$filename);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function import_lab_test($id){
        if (isset($_FILES['csv_file']['name'])) {
            // total files //
            $count = count($_FILES['csv_file']['name']);
            $today = date("Y-m-d H:i:s");
            $date_f = date('Y-m-d', strtotime($today));
            $uploads = $_FILES['csv_file'];
            $fname = $uploads['name'];
            $exp = explode(".", $fname);
            $ext = end($exp);
            if ($ext == 'CSV' || $ext == 'csv' || $ext == 'txt' || $ext == 'TXT') {
                move_uploaded_file($_FILES['csv_file']['tmp_name'], $this->config->item('file_upload_path') . $uploads['name']);
                $result = $this->read_lab_test_file($fname,$date_f,$id);
                if ($result) {
                    $json['success']=true;
                    $json['message'] = 'Successfully Uploaded.';
                }else{
                    $json['error']=false;
                    $json['message']='Seems an error.';
                }
     
            } else {
                $json['error'] = false;
                $json['message'] = "File Format is wrong.";
            }
        } else {
            $json['error'] = false;
            $json['message'] = "Please Select the file.";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    function read_lab_test_file($fname, $date_f,$id) {
        $path = $this->config->item('file_upload_path') . $fname;
        $cname = 'name';
        $tbl = 'lab_test';
        $cid = 'lab_category_id';
            if ($this->csvimport->get_array($path)) {
                $csv_array = $this->csvimport->get_array($path);
                if (array_key_exists('Names',$csv_array[0])) {
                    foreach ($csv_array as $row) {
                        $cdata = $row['Names'];
                        $result = $this->Setting_model->check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid);
                        if ($result > 0) {
                            continue;
                        }
                        $insert_data = array(
                            'name'=>$row['Names'],
                            'lab_category_id' => $id
                        );
                        $this->Setting_model->insert_file_data($insert_data,$tbl);
                    }
                    return true;
                }else{
                    return false;
                }
                
        }else{
            return false;
        }
    }

}

?>
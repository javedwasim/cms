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
        $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
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

//////////////////////////////////////////////// import export moduls ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function export_professions(){
        $professions = $this->Setting_model->export_professions();
        if ($professions) {
           $result = $this->export_profession_file($professions);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_profession_file($professions){
       $filename = 'professions.txt'; 
       header("Content-Description: File Transfer");
       header('Content-Encoding: UTF-8'); 
       header("Content-Disposition: attachment; filename=$filename"); 
       header("Content-Type: application/txt;charset=UTF-8");
       // file creation 
       $file = fopen('php://output', 'w');
       $header = array('Names'); 
       fputcsv($file, $header);
       foreach ($professions as $key=>$line){ 
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
        $districts = $this->Setting_model->export_district();
        if ($districts) {
           $result = $this->export_district_csv($districts);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_district_csv($districts){
       $filename = 'districts.txt'; 
       header("Content-Description: File Transfer");
       header('Content-Encoding: UTF-8'); 
       header("Content-Disposition: attachment; filename=$filename"); 
       header("Content-Type: application/txt;charset=UTF-8");
       // file creation 
       $file = fopen('php://output', 'w');
       $header = array('Names'); 
       fputcsv($file, $header);
       foreach ($districts as $key=>$line){ 
         fputcsv($file,$line); 
       }
       fclose($file); 
       exit;
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
        $history_items = $this->Setting_model->get_history_items($category_id);
        if ($history_items) {
            $this->export_history_items_csv($history_items);
        } else {
            $json['error'] = true;
            $json['message'] = 'No item found.';
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_history_items_csv($history_items)
    {
        // file name
        $filename = 'history_items.txt';
        header("Content-Description: File Transfer");
        header('Content-Encoding: UTF-8'); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/txt;charset=UTF-8");
        // file creation
        $file = fopen('php://output', 'w');
        $header = array('Names');
        fputcsv($file, $header);
        foreach ($history_items as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
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
                    $this->Setting_model->insert_file_data($insert_data,$tabl);
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
        $examination_items = $this->Setting_model->get_examination_items($id);
        if ($examination_items) {
            $this->export_examination_items_file($examination_items);
        } else {
            $json['error'] = true;
            $json['message'] = 'No item found.';
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_examination_items_file($examination_items)
    {
        $filename = 'examintaion_items.txt';
        header("Content-Description: File Transfer");
        header('Content-Encoding: UTF-8'); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/txt;charset=UTF-8");
        // file creation
        $file = fopen('php://output', 'w');
        $header = array('Names');
        fputcsv($file, $header);
        foreach ($examination_items as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
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
        $investigation_items = $this->Setting_model->get_investigation_items($id);
        if ($investigation_items) {
            $this->export_investigation_items_file($investigation_items);
        } else {
            $json['error'] = true;
            $json['message'] = 'No item found.';
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_investigation_items_file($investigation_items)
    {
        $filename = 'investigation_items.txt';
        header("Content-Description: File Transfer");
        header('Content-Encoding: UTF-8'); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/txt;charset=UTF-8");
        // file creation
        $file = fopen('php://output', 'w');
        $header = array('Names');
        fputcsv($file, $header);
        foreach ($investigation_items as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
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
        if ($recommendations) {
           $result = $this->export_angio_csv($recommendations);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_angio_csv($recommendations){
        $filename = 'recommendations.txt'; 
        header("Content-Description: File Transfer");
        header('Content-Encoding: UTF-8'); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/txt;charset=UTF-8");
       // file creation 
       $file = fopen('php://output', 'w');
       $header = array('Names'); 
       fputcsv($file, $header);
       foreach ($recommendations as $key=>$line){ 
         fputcsv($file,$line); 
       }
       fclose($file); 
       exit;
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
        $instruction_items = $this->Setting_model->get_instruction_items($id);
        if ($instruction_items) {
            $this->export_instruction_items_file($instruction_items);
        } else {
            $json['error'] = true;
            $json['message'] = 'No item found.';
        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_instruction_items_file($instruction_items)
    {
        $filename = 'instruction_items.txt';
        header("Content-Description: File Transfer");
        header('Content-Encoding: UTF-8'); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/txt;charset=UTF-8");
        // file creation
        $file = fopen('php://output', 'w');
        $header = array('Names');
        fputcsv($file, $header);
        foreach ($instruction_items as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
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
        $medicine_items = $this->Setting_model->get_medicine_items($id);
        if ($medicine_items) {
           $this->export_medicine_items_csv($medicine_items);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_medicine_items_csv($medicine_items){
        $filename = 'medicine_items.txt'; 
        header("Content-Description: File Transfer");
        header('Content-Encoding: UTF-8'); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/txt;charset=UTF-8");
        // file creation 
        $file = fopen('php://output', 'w');
        $header = array('Names'); 
        fputcsv($file, $header);
        foreach ($medicine_items as $key=>$line){ 
            fputcsv($file,$line); 
        }
        fclose($file); 
        exit;
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
        if ($dosages) {
           $result = $this->export_dosage_file($dosages);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_dosage_file($dosages){
       $filename = 'dosages.txt'; 
       header("Content-Description: File Transfer");
       header('Content-Encoding: UTF-8'); 
       header("Content-Disposition: attachment; filename=$filename"); 
       header("Content-Type: application/txt;charset=UTF-8");
       // file creation 
       $file = fopen('php://output', 'w');
       $header = array('Names'); 
       fputcsv($file, $header);
       foreach ($dosages as $key=>$line){ 
         fputcsv($file,$line); 
       }
       fclose($file); 
       exit;
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
        $advice_items = $this->Setting_model->get_advice_items_csv($id);
        if ($advice_items) {
           $this->export_advice_items_csv($advice_items);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_advice_items_csv($advice_items){
       $filename = 'advice_items.txt'; 
       header("Content-Description: File Transfer");
       header('Content-Encoding: UTF-8'); 
       header("Content-Disposition: attachment; filename=$filename"); 
       header("Content-Type: application/txt;charset=UTF-8");
       // file creation 
       $file = fopen('php://output', 'w');
       $header = array('Names'); 
       fputcsv($file, $header);
       foreach ($advice_items as $key=>$line){ 
         fputcsv($file,$line); 
       }
       fclose($file); 
       exit;
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
        if ($professions) {
           $result = $this->export_test_reasons_file($professions);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_test_reasons_file($professions){
       $filename = 'test_reason.txt'; 
       header("Content-Description: File Transfer");
       header('Content-Encoding: UTF-8'); 
       header("Content-Disposition: attachment; filename=$filename"); 
       header("Content-Type: application/txt;charset=UTF-8");
       // file creation 
       $file = fopen('php://output', 'w');
       $header = array('Names'); 
       fputcsv($file, $header);
       foreach ($professions as $key=>$line){ 
         fputcsv($file,$line); 
       }
       fclose($file); 
       exit;
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
        $professions = $this->Setting_model->export_ending_reasons();
        if ($professions) {
           $result = $this->export_ending_reasons_file($professions);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_ending_reasons_file($professions){
       $filename = 'test_ending_reason.txt'; 
       header("Content-Description: File Transfer");
       header('Content-Encoding: UTF-8'); 
       header("Content-Disposition: attachment; filename=$filename"); 
       header("Content-Type: application/txt;charset=UTF-8");
       // file creation 
       $file = fopen('php://output', 'w');
       $header = array('Names'); 
       fputcsv($file, $header);
       foreach ($professions as $key=>$line){ 
         fputcsv($file,$line); 
       }
       fclose($file); 
       exit;
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
        $professions = $this->Setting_model->export_ett_descriptions();
        if ($professions) {
           $result = $this->export_ett_description_file($professions);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_ett_description_file($professions){
       $filename = 'ett_description.txt'; 
       header("Content-Description: File Transfer");
       header('Content-Encoding: UTF-8'); 
       header("Content-Disposition: attachment; filename=$filename"); 
       header("Content-Type: application/txt;charset=UTF-8");
       // file creation 
       $file = fopen('php://output', 'w');
       $header = array('Names'); 
       fputcsv($file, $header);
       foreach ($professions as $key=>$line){ 
         fputcsv($file,$line); 
       }
       fclose($file); 
       exit;
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

    // function read_dosage_file($fname, $date_f) {
    //     $fname = $this->config->item('file_upload_path') . $fname;
    //     $count=0;
    //     $fp = fopen($fname,'r') or die("can't open file");
    //     while($csv_line = fgets($fp,1024))
    //     {
    //         $count++;
    //         if($count == 1)
    //         {
    //             continue;
    //         }//keep this if condition if you want to remove the first row
    //         for($i = 0, $j = count($csv_line); $i < $j; $i++)
    //         {
    //             echo $csv_line[0];//remove if you want to have primary key,

    //         }
    //         $i++;
    //     }
    //         fclose($fp) or die("can't close file");
    //         die();
    //     // }
                
    //     // }else{
    //     //     return false;
    //     // }
    // }

    public function export_ett_conclusions(){
        $professions = $this->Setting_model->export_ett_conclusions();
        if ($professions) {
           $result = $this->export_ett_conclusion_file($professions);
        }else{
            $json['error']= true;
            $json['message'] = 'No item found.';
        }
        
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function export_ett_conclusion_file($professions){
       $filename = 'ett_conclusion.txt'; 
       header("Content-Description: File Transfer");
       header('Content-Encoding: UTF-8'); 
       header("Content-Disposition: attachment; filename=$filename"); 
       header("Content-Type: application/txt;charset=UTF-8");
       // file creation 
       $file = fopen('php://output', 'w');
       $header = array('Names'); 
       fputcsv($file, $header);
       foreach ($professions as $key=>$line){ 
         fputcsv($file,$line); 
       }
       fclose($file); 
       exit;
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

}

?>
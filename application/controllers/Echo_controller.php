<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Echo_controller extends MY_Controller
{

    function __construct()
    {
        parent:: __construct();
        $this->load->helper('content-type');
        $this->load->model('Dashboard_model');
        $this->load->model('Echo_model');

    }


    public function echo_index()
    {
        $category = 0;
        $data['categories'] = $this->Echo_model->get_disease_categories();
        $data['structures'] = $this->Echo_model->get_Structure_categories();
        $data['findings'] = $this->Echo_model->get_structure_findings_by_id(1,'','');
        $data['diagnosis'] = $this->Echo_model->get_structure_diagnosis_by_id(1,'','');
        $data['main_categories'] = $this->Echo_model->get_main_category_by_filter($category);
        $data['main_cate'] = $this->Echo_model->get_echo_main_categories();
        $data['measurements'] = $this->Echo_model->get_measurement_by_filter($category);
        // $data['measurements'] = $this->Echo_model->get_category_measurement();
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('echo/echo', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_disease_category()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Disease  Name', 'required|is_unique[disease.name]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Echo_model->add_disease_category($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Info save successfully successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['categories'] = $this->Echo_model->get_disease_categories();
        $data['structures'] = $this->Echo_model->get_Structure_categories();
        $data['findings'] = $this->Echo_model->get_structure_findings_by_id(1,'','');
        $data['diagnosis'] = $this->Echo_model->get_structure_diagnosis_by_id(1,'','');
        $data['main_categories'] = $this->Echo_model->get_echo_main_categories();
        $data['measurements'] = $this->Echo_model->get_category_measurement();
        $data['rights'] = $this->session->userdata('other_rights');
        $data['active_tab'] = 'category';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('echo/echo', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_disease_item()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'disease Name', 'required|xss_clean');
        $this->form_validation->set_rules('disease_id', 'disease Category', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Echo_model->add_disease_item($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "disease Item created successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
        }
        $data['items'] = $this->Echo_model->get_disease_items();
        $data['active_tab'] = 'items';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('disease/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_disease_category()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Echo_model->add_disease_category($data);
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

    public function delete_disease_category($id)
    {
        $result = $this->Echo_model->delete_disease_category($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Disease Category successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }

        $data['categories'] = $this->Echo_model->get_disease_categories();
        $data['structures'] = $this->Echo_model->get_Structure_categories();
        $data['findings'] = $this->Echo_model->get_structure_findings_by_id(1,'','');
        $data['diagnosis'] = $this->Echo_model->get_structure_diagnosis_by_id(1,'','');
        $data['main_categories'] = $this->Echo_model->get_echo_main_categories();
        $data['measurements'] = $this->Echo_model->get_category_measurement();
        $data['rights'] = $this->session->userdata('other_rights');
        $data['active_tab'] = 'category';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('echo/echo', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_disease_item($cat_id)
    {
        $data['items'] = $this->Echo_model->get_disease_items_by_category($cat_id);
        $data['selected_category'] = $cat_id;
        $data['active_tab'] = 'tests';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('disease/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_disease_item_description()
    {
        $data = $this->input->post();
        $id = $data['id'];
        $result = $this->Echo_model->get_disease_item_description($id);

        if ($result) {
            $json['success'] = true;
            $json['description'] = $result['description'];
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_disease_item_description()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('description', 'Description', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Echo_model->save_disease_item_description($data);
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

    public function save_disease_item()
    {
        $data = $this->input->post();
        $result = $this->Echo_model->add_disease_item($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Disease  item save successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_disease_item($id)
    {
        $result = $this->Echo_model->delete_disease_item($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Disease  item successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error.";
        }
        $data['items'] = $this->Echo_model->get_disease_items();
        $data['active_tab'] = 'items';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('disease/item_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function add_structure_category()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Structure Name', 'required|is_unique[structure.name]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Echo_model->add_structure_category($data);
            if($result){
                $data['structures'] = $this->Echo_model->get_Structure_categories();
                $json['success'] = true;
                $json['message'] = "Structure Category successfully created.";
                $data['active_tab'] = 'structure';
                $data['rights'] = $this->session->userdata('other_rights');
                $json['result_html'] = $this->load->view('echo/structure_table', $data, true);
            }else{
                $json['error'] = true;
                $json['message'] = 'Seem to be an error!';
            }

        }

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_structure_category()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Echo_model->add_structure_category($data);
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

    public function delete_structure_category($id)
    {
        $result = $this->Echo_model->delete_structure_category($id);
        $message = "Structure Category successfully deleted.";
        $this->structure_load($result,$message);
    }

    public function structure_load($result,$message){

        if ($result) {
            $json['success'] = true;
            $json['message'] = $message;
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }

        $data['structures'] = $this->Echo_model->get_Structure_categories();
        $data['active_tab'] = 'structure';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('echo/structure_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_structure_finding()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Finding Name', 'required|is_unique[structure_finding.name]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        } else {
            $data = $this->input->post();
            $result = $this->Echo_model->add_structure_finding($data);
            $message = "Structure finding successfully created.";
            $this->get_structure_finding_by_id($data['structure_id'],$result,$message);
        }
    }

    public function save_structure_finding()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Echo_model->add_structure_finding($data);
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

    public function structure_finding_load($result,$message){

        if ($result) {
            $json['success'] = true;
            $json['message'] = $message;
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['findings'] = $this->Echo_model->get_structure_findings();
        $data['active_tab'] = 'structure';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('echo/finding_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_structure_finding($id)
    {
        $structure = $this->Echo_model->get_structure_id($id);
        $structure_id = $structure['structure_id'];
        $result = $this->Echo_model->delete_structure_finding($id);
        $message = "Finding successfully deleted";
        $this->get_structure_finding_by_id($structure_id,$result,$message);
    }

    public function get_findings_by_id($id){
        $result = true;
        $message = '';
        $this->get_structure_finding_by_id($id,$result,$message);
    }

    public function get_default_findings_by_id(){
        $data = $this->input->post();
        $id = $data['id'];
        $disease_id = $data['disease_id'];
        $result = true;
        $message = '';
        $this->get_structure_finding_by_id($id,$result,$message);
    }

    public function get_structure_finding_by_id($id,$result,$message){
        if ($result) {
            $json['success'] = true;
            $json['message'] = $message;
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['findings'] = $this->Echo_model->get_structure_findings_by_id($id);
        $data['diagnosis'] = $this->Echo_model->get_structure_diagnosis_by_id($id);
        $data['active_tab'] = 'structure';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('echo/finding_table', $data, true);
        $json['diagnosis_html'] = $this->load->view('echo/diagnosis_table', $data, true);
        $json['dfinding_html'] = $this->load->view('echo/default_finding_table', $data, true);
        $json['ddiagnose_html'] = $this->load->view('echo/default_diagnosis_table', $data, true);

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_structure_diagnosis_by_id($id,$result,$message){
        if ($result) {
            $json['success'] = true;
            $json['message'] = $message;
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['diagnosis'] = $this->Echo_model->get_structure_diagnosis_by_id($id);
        $data['active_tab'] = 'structure';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('echo/diagnosis_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_structure_diagnosis()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Diagnosis Name', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $data = $this->input->post();
            $result = $this->Echo_model->add_structure_diagnose($data);
            $message = "Structure diagnosis successfully created.";
            $this->get_structure_diagnosis_by_id($data['structure_id'],$result,$message);
        }

    }


    public function save_structure_diagnosis()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
           $result = $this->Echo_model->add_structure_diagnose($data);
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

    public function delete_structure_diagnosis($id)
    {
        $structure = $this->Echo_model->get_diagnosis_structure_id($id);
        $structure_id = $structure['structure_id'];
        $result = $this->Echo_model->delete_structure_diagnosis($id);
        $message = "Diagnosis successfully deleted";
        $this->get_structure_diagnosis_by_id($structure_id,$result,$message);
    }

    public function assign_finding_to_disease(){
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('finding_id', 'Finding', 'required|xss_clean');
        $this->form_validation->set_rules('disease_id', 'Disease', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        }else{
            $data = $this->input->post();
            $result = $this->Echo_model->assign_finding_to_disease($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Information save successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }

        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function assign_diagnose_to_disease(){
        $data = $this->input->post();
        $result = $this->Echo_model->assign_diagnose_to_disease($data);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Information save successfully!";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_main_category_item(){
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'Echo Category', 'required|xss_clean');
        $this->form_validation->set_rules('main_category', 'Main Category', 'required|xss_clean');

        $data = $this->input->post();
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $result = $this->Echo_model->add_main_category_item($data);
            $json['success'] = true;
            $json['message'] = "Category successfully created.";
            $data['categories'] = $this->Echo_model->get_disease_categories();
            $data['structures'] = $this->Echo_model->get_Structure_categories();
            $data['findings'] = $this->Echo_model->get_structure_findings_by_id(1,'','');
            $data['diagnosis'] = $this->Echo_model->get_structure_diagnosis_by_id(1,'','');
            $data['main_categories'] = $this->Echo_model->get_echo_main_categories();
            $data['measurements'] = $this->Echo_model->get_category_measurement();
            $data['rights'] = $this->session->userdata('other_rights');
            $data['active_tab'] = 'category';
            $json['result_html'] = $this->load->view('echo/echo', $data, true);

        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_echo_main_categories($result,$message){
        if ($result) {
            $json['success'] = true;
            $json['message'] = $message;
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['main_categories'] = $this->Echo_model->get_echo_main_categories();
        $data['active_tab'] = 'category';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('echo/main_category_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_main_category_item($id)
    {
        $result = $this->Echo_model->delete_main_category_item($id);
        $message = "Category successfully deleted.";
        $this->get_echo_main_categories($result,$message);

    }

    public function save_main_category_item()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Echo_model->add_main_category_item($data);
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

    public function get_main_category_by_filter($category){
        $data['main_categories'] = $this->Echo_model->get_main_category_by_filter($category);
        $data['active_tab'] = 'category';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('echo/main_category_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_category_measurement(){
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('item', 'Category Item', 'required|xss_clean');
        $this->form_validation->set_rules('value', 'Measurement Value', 'required|xss_clean');
        $this->form_validation->set_rules('category_id', 'Category', 'required|xss_clean');

        $data = $this->input->post();
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $result = $this->Echo_model->add_category_measurement($data);
            $message = "Measurement successfully created.";
            $this->get_category_measurement($result,$message);
        }

    }


    public function get_category_measurement($result,$message){
        if ($result) {
            $json['success'] = true;
            $json['message'] = $message;
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
        }
        $data['measurements'] = $this->Echo_model->get_category_measurement();
        $data['active_tab'] = 'measurement';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('echo/category_measurement_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_category_measurement()
    {
        $data = $this->input->post();
        if (empty($data['editval'])) {
            $json['error'] = true;
            $json['message'] = 'Could not update empty field.';
        }else{
            $result = $this->Echo_model->add_category_measurement($data);
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

    public function delete_category_measurement($id)
    {
        $result = $this->Echo_model->delete_category_measurement($id);
        $message = "Measurement successfully deleted.";
        $this->get_category_measurement($result,$message);

    }

    public function get_measurement_by_filter($category){
        $data['measurements'] = $this->Echo_model->get_measurement_by_filter($category);
        $data['active_tab'] = 'measurement';
        $data['rights'] = $this->session->userdata('other_rights');
        $json['result_html'] = $this->load->view('echo/category_measurement_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_echo_disease(){
        $data['diseases'] = $this->Echo_model->get_disease_categories();
        $json['disease_html'] = $this->load->view('profile/disease_table',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }
    public function get_echo_structure(){
        $flag = $this->input->post('flag');
        $data['structures'] = $this->Echo_model->get_Structure_categories();
        if ($flag == 'finding') {
            $json['structure_html'] = $this->load->view('profile/structure_table',$data,true);
        }else{
            $json['structure_html'] = $this->load->view('profile/structure_table_diagnosis',$data,true);
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_echo_findings($id){
        $data['findings'] = $this->Echo_model->get_structure_findings_by_id($id);
        $json['findings_html'] = $this->load->view('profile/findings_by_structures_table',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_echo_diagnosis($id){
        $data['diagnosis'] = $this->Echo_model->get_structure_diagnosis_by_id($id);
        $json['diagnosis_html'] = $this->load->view('profile/diagnosis_by_structures_table',$data,true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_finding_by_structure(){
        $sId = $this->input->post('stId');
        $fId = $this->input->post('fId');
        $fname = $this->input->post('fName');
        $data['findings'] = $this->Echo_model->save_st_finding($sId,$fId,$fname);
        $json['result_html'] = $this->load->view('profile/finding_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_diagnosis_by_structure(){
        $sId = $this->input->post('stId');
        $dId = $this->input->post('dId');
        $dname = $this->input->post('dName');
        $data['diagnosis'] = $this->Echo_model->save_st_diagnosis($sId,$dId,$dname);
        $json['result_html'] = $this->load->view('profile/profile_diagnosis_table', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

}

?>
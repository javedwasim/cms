<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Instruction extends MY_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
			$this->load->helper('content-type');
			$this->load->model('Dashboard_model');
			$this->load->model('Setting_model');

		}

        public function special_instruction(){
            $json['result_html'] = $this->load->view('instruction/instruction', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

		public function pat_profession(){
			$data['professions'] = $this->Setting_model->get_professions();
			$json['result_html'] = $this->load->view('pages/profession', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function pat_district(){
			$data['districts'] = $this->Setting_model->get_districts();
			$json['result_html'] = $this->load->view('pages/district', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function history(){
			$json['result_html'] = $this->load->view('pages/patient_history', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function examination(){
			$json['result_html'] = $this->load->view('pages/examination', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}
		public function investigation(){
			$json['result_html'] = $this->load->view('pages/investigation', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}
		public function angio_recommendation(){
			$json['result_html'] = $this->load->view('pages/angio-recommendation', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function instruction(){
			$json['result_html'] = $this->load->view('pages/instruction', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function medicine(){
			$json['result_html'] = $this->load->view('pages/medicine', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

        public function advice(){
            $data['advices'] = $this->Setting_model->get_advices();
            $data['items'] = $this->Setting_model->get_advice_items();
            $data['active_tab'] = 'advice';
            $json['result_html'] = $this->load->view('pages/advice',$data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

		public function research(){
            $data['researches'] = $this->Setting_model->get_researches();
            $json['result_html'] = $this->load->view('pages/add_research', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function manage_research(){
			$json['result_html'] = $this->load->view('pages/manage_research', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function register_user(){
			$json['result_html'] = $this->load->view('pages/register-user', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}



		public function pat_delete(){
			$json['result_html'] = $this->load->view('pages/delete-patient', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function booking_limiter(){
			$data['limiter_details'] = $this->Dashboard_model->get_limiter_details();
			$json['result_html'] = $this->load->view('pages/limiter', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function laboratory_test(){
            $data['categories'] = $this->Setting_model->get_lab_categories();
            $data['tests'] = $this->Setting_model->get_lab_tests();
            $data['items'] = $this->Setting_model->get_lab_test_items();
            $data['active_tab'] = 'category';
			$json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function dr_signature(){
			$json['result_html'] = $this->load->view('pages/doctor_signature', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function change_permissions(){
			$json['result_html'] = $this->load->view('pages/change_permissions', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function echo_setting(){
			$json['result_html'] = $this->load->view('pages/echo_setting', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function ett_setting(){
			$json['result_html'] = $this->load->view('pages/ett_setting', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

		public function patient_exemination(){
			$json['result_html'] = $this->load->view('pages/pat_examination', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

        public function add_advice(){
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
                    $json['message'] = "Advice created successfully!";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while creating advice";
                }
            }
            $data['advices'] = $this->Setting_model->get_advices();
            $data['items'] = $this->Setting_model->get_advice_items();
            $data['active_tab'] = 'advice';
            $json['result_html'] = $this->load->view('pages/advice',$data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function save_advice(){
            $data = $this->input->post();
            $result = $this->Setting_model->add_advice($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Advice save successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while saving advice";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function delete_advice($id){
            $result = $this->Setting_model->delete_advice($id);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Advice successfully deleted.";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error in deleting advice record.";
            }
            $data['advices'] = $this->Setting_model->get_advices();
            $data['items'] = $this->Setting_model->get_advice_items();
            $data['active_tab'] = 'advice';
            $json['result_html'] = $this->load->view('pages/advice',$data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function add_advice_item(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'Advice Name', 'required|xss_clean');
            $this->form_validation->set_rules('advice_id', 'Category', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $data = $this->input->post();
                $result = $this->Setting_model->add_advice_item($data);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = "Advice item created successfully!";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while creating advice item";
                }
            }
            $data['advices'] = $this->Setting_model->get_advices();
            $data['items'] = $this->Setting_model->get_advice_items();
            $data['active_tab'] = 'advice_item';
            $json['result_html'] = $this->load->view('pages/advice',$data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }


        public function delete_advice_item($id){
            $result = $this->Setting_model->delete_advice_item($id);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Advice successfully deleted.";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error in deleting advice record.";
            }
            $data['advices'] = $this->Setting_model->get_advices();
            $data['items'] = $this->Setting_model->get_advice_items();
            $data['active_tab'] = 'advice_item';
            $json['result_html'] = $this->load->view('pages/advice',$data, true);

            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function save_advice_item(){
            $data = $this->input->post();
            $result = $this->Setting_model->add_advice_item($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Advice Item save successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while saving advice item";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function add_research(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'Research Name', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $data = $this->input->post();
                $result = $this->Setting_model->add_research($data);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = "Research name added successfully!";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while creating research";
                }
            }
            $data['researches'] = $this->Setting_model->get_researches();
            $json['result_html'] = $this->load->view('pages/add_research', $data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function save_research(){
            $data = $this->input->post();
            $result = $this->Setting_model->add_research($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Research name save successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while saving research name";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function save_research_description(){
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

            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function get_research_description(){
            $data = $this->input->post();
            $id = $data['id'];
            $result = $this->Setting_model->get_research_description($id);

            if ($result) {
                $json['success'] = true;
                $json['description'] = $result['description'];
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }


        public function delete_research($id){
            $result = $this->Setting_model->delete_research($id);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Research successfully deleted.";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error in deleting research record.";
            }
            $data['researches'] = $this->Setting_model->get_researches();
            $json['result_html'] = $this->load->view('pages/add_research', $data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function add_lab_category(){
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
            $data['active_tab'] = 'tests';
            $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function get_lab_category_description(){
            $data = $this->input->post();
            $id = $data['id'];
            $result = $this->Setting_model->get_lab_category_description($id);

            if ($result) {
                $json['success'] = true;
                $json['description'] = $result['description'];
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function save_lab_category_description(){
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

            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function delete_lab_category($id){
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
            $data['active_tab'] = 'tests';
            $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function save_lab_category(){
            $data = $this->input->post();
            $result = $this->Setting_model->add_lab_category($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Advice save successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while saving advice";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }


        public function add_lab_test(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'Advice Name', 'required|xss_clean');
            $this->form_validation->set_rules('lab_category_id', 'Laboratory Category', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $data = $this->input->post();
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
            $data['tests'] = $this->Setting_model->get_lab_tests();
            $data['items'] = $this->Setting_model->get_lab_test_items();
            $data['active_tab'] = 'tests';
            $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function save_lab_test(){
            $data = $this->input->post();
            $result = $this->Setting_model->add_lab_test($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Advice save successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while saving advice";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function delete_lab_test($id){
            $result = $this->Setting_model->delete_lab_test($id);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Laboratory test successfully deleted.";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error in deleting record.";
            }
            $data['categories'] = $this->Setting_model->get_lab_categories();
            $data['tests'] = $this->Setting_model->get_lab_tests();
            $data['items'] = $this->Setting_model->get_lab_test_items();
            $data['active_tab'] = 'tests';
            $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function get_lab_test_description(){
            $data = $this->input->post();
            $id = $data['id'];
            $result = $this->Setting_model->get_lab_test_description($id);

            if ($result) {
                $json['success'] = true;
                $json['description'] = $result['description'];
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function save_lab_test_description(){
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

            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function get_lab_test_by_category($cat_id){
            $data['categories'] = $this->Setting_model->get_lab_categories();
            $data['tests'] = $this->Setting_model->get_lab_tests_by_category($cat_id);
            $data['items'] = $this->Setting_model->get_lab_test_items();
            $data['active_tab'] = 'tests';
            $data['selected_category'] = $cat_id;
            $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function add_lab_test_item(){
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
            $data['tests'] = $this->Setting_model->get_lab_tests();
            $data['items'] = $this->Setting_model->get_lab_test_items();
            $data['active_tab'] = 'items';
            $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function get_lab_test_item_description(){
            $data = $this->input->post();
            $id = $data['id'];
            $result = $this->Setting_model->get_lab_test_item_description($id);

            if ($result) {
                $json['success'] = true;
                $json['description'] = $result['description'];
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function save_lab_test_item_description(){
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

            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function save_lab_test_item(){
            $data = $this->input->post();
            $result = $this->Setting_model->add_lab_test_item($data);
            if ($result) {
                $json['success'] = true;
                $json['message'] = "Advice save successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while saving advice";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function get_lab_item_by_test_id($test_id){
            $data['categories'] = $this->Setting_model->get_lab_categories();
            $data['tests'] = $this->Setting_model->get_lab_tests();
            $data['items'] = $this->Setting_model->get_lab_item_by_test_id($test_id);
            $data['active_tab'] = 'items';
            $data['selected_test_id'] = $test_id;
            $json['result_html'] = $this->load->view('laboratory/laboratory', $data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }
	}
?>
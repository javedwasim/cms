<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profile extends MY_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
			$this->load->helper('content-type');
		}

		public function index(){
            $json['result_html'] = $this->load->view('pages/profile', "", true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}
	}
?>
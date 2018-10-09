<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_profiles extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->model('Print_model');
		}

	public function print_ett(){
		$this->load->view('profile_prints/print_ett');
	}


	}
?>
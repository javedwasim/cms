<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Print_model extends CI_Model
	{

	    function __construct()
	    {
	        parent::__construct();
	        date_default_timezone_set("Asia/Karachi");
	    }
	}
?>
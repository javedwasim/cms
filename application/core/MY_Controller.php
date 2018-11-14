<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	public function __construct(){
	    parent::__construct();
	    /*echo "<pre>";
	    print_r($this->uri->rsegment(1));
	    die();*/
            date_default_timezone_set('Asia/Karachi');
	    if(!$this->session->userdata('is_logged_in')) {
	       // redirect('/');
	    }
	    $this->load->helper('file');
            $path = 'application/config/self_config.php';
            if(file_exists($path)){
             $tracker_time = file_get_contents($path, FALSE, NULL);
             $expiry_time  = strtotime('2018-12-10 17:00:00');
             //date('Y-m-d H:i:s',$expiry_time);
            $sys_time = strtotime(date('Y-m-d H:i:s'));
            if($sys_time<$tracker_time){
                echo '<center><p>System Time is incorrect! please correct system time and then try again.</p></center>';
                exit();
            }else if($sys_time>=$expiry_time){
                echo '<center>Oops! something went wrong,<p>Please contact with TechSol Team.</p></center>';
                echo '<center><p>Thank you!</p></center>';
                exit();
            }else{
            $update_tracker = strtotime(date('Y-m-d H:i:s', strtotime('-5 minutes')));
            if ( !write_file($path, $update_tracker))
            {
                echo '<center>File is not writable!<p>Please contact with TechSol Team.</p></center>';
                echo '<center><p>Thank you!</p></center>';
                exit();
            }
            }
            }else{
                echo '<center>File is not exist!<p>Please contact with TechSol Team.</p></center>';
                echo '<center><p>Thank you!</p></center>';
                exit();   
            }
            }

}
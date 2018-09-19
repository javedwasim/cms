<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Model_menu extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}

        function fetch_menu()
        {
            $user_data = $this->session->userdata('userdata');
            $login_rights_group_id = $user_data['login_rights_group_id'];
            $query = "SELECT menu.*,mg.menu_group_id,lrg.login_rights_group_id from menu
                        LEFT JOIN menu_group_detail mgd on mgd.menu_id=menu.menu_id
                        LEFT JOIN user_priviliges up on up.menu_id=menu.menu_id
                        LEFT JOIN menu_group mg on mg.menu_group_id=mgd.menu_group_id  or mg.menu_group_id=up.menu_group_id
                        LEFT JOIN login_rights_group lrg on lrg.menu_group_id=mg.menu_group_id
                        where lrg.login_rights_group_id=1
                        ORDER BY menu.menu_id";
            $result = $query = $this->db->query($query);
            if ($result) {
                return $result->result();
            } else {
                return array();
            }
        }

	}
?>
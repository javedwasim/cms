<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Setting_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}


		public function get_districts(){
			$result = $this->db->select('*')->from('districts_tbl')->order_by('district_name')
						->get();
			if ($result) {
				return $result->result_array();
			}else{
				return false;
			}
		}

		public function get_other_rights(){
		    $other_rights = array();
            $sql = "SELECT org.other_rights_name,GROUP_CONCAT(class,'-',other_rights_id) as other_rights 
                    FROM other_rights org 
                    GROUP BY other_rights_name";
            $result = $query = $this->db->query($sql);
            if ($result) {
                foreach ($result->result_array() as $right){
                    $other_rights[$right['other_rights_name']] = $right['other_rights'];
                }
                return $other_rights;
            } else {
                return array();
            }
        }

        public function register_new_user($user){
            //menu_group
            $this->db->insert('menu_group', array('menu_group_name'=>$user['username'],'created_by'=>1,'status'=>1));
            $menu_group_id =  $this->db->insert_id();

            //menu group detail
            $default_menues = $this->config->item('user_default_menu');
            foreach ($default_menues as $menu){
                $this->db->insert('menu_group_detail',array('menu_group_id'=>$menu_group_id,'menu_id'=>$menu));
            }

            //other rights group
            $this->db->insert('other_rights_group', array('other_rights_group_name'=>$user['username'],'created_by'=>1,'status'=>1));
            $other_rights_group_id =  $this->db->insert_id();

            //other rights group detail
           $rights = $this->db->get('other_rights');
            $other_rights = $rights->result_array();
            foreach ($other_rights as $right){
                $this->db->insert('other_rights_group_detail', array('other_rights_group_id'=>$other_rights_group_id,'other_rights_id'=>$right['other_rights_id'],'status'=>0));
            }
            if (!empty($user['user_rights'])) {
               $other_rights = $user['user_rights'];
                // foreach ($other_rights as $right){
                //     $this->db->insert('other_rights_group_detail', array('other_rights_group_id'=>$other_rights_group_id,'other_rights_id'=>$right,'status'=>1));
                // }
                foreach ($other_rights as $right){
                    $this->db->set('status','1')->where('other_rights_group_id',$other_rights_group_id)
                                ->where('other_rights_id',$right)->update('other_rights_group_detail');
                }
            }
            
            //login rights group
            $this->db->insert('login_rights_group', array('menu_group_id'=>$menu_group_id,'other_rights_group_id'=>$other_rights_group_id));
            $login_rights_group_id =  $this->db->insert_id();


            $password = password_hash($user['password'], PASSWORD_BCRYPT);
            $user_data = array('full_name'=>$user['full_name'],'gender'=>$user['gender'],'company'=>$user['company'],
                        'is_admin'=>0, 'login_rights_group_id'=>$login_rights_group_id, 'address'=>$user['address'],'username'=>$user['username'],'password'=>$password,'contact_no'=>$user['contact_no']);
            $this->db->insert('login', $user_data);
            return $this->db->insert_id();
        }

		public function get_professions(){
			$result = $this->db->select('*')->from('profession_tbl')->order_by('profession_name')
						->get();
			if ($result) {
				return $result->result_array();
			}else{
				return false;
			}
		}

        public function add_advice($data){
		    if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $result = $this->db->where('id',$id)->update('advice',array('name'=>$editval));
                if ($result) {
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('advice', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }

        }

        public function get_advices(){
            $result = $this->db->select('*')->from('advice')->order_by('sort_order')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_advice($id) {
            $this->db->where('advice_id', $id)->delete('advice_item');
            $this->db->where('id', $id)->delete('advice');
            return $this->db->affected_rows();
        }

        public function add_advice_item($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $result = $this->db->where('id',$id)->update('advice_item',array('name'=>$editval));
                if ($result) {
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('advice_item', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }

        }

        public function get_advice_items(){
            $result = $this->db->select('*')->from('advice_item')->order_by('sort_order')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_advice_item($id) {
            $this->db->where('id', $id)->delete('advice_item');
            return $this->db->affected_rows();
        }

        public function add_research($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $result = $this->db->where('id',$id)->update('research',array('name'=>$editval));
                if ($result) {
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('research', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }

        }

        public function get_researches(){
            $result = $this->db->select('*')->from('research')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function save_research_description($data){
            $this->db->where('id',$data['research_id'])->update('research',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }

        public function get_research_description($id){
            $result = $this->db->select('*')->from('research')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function delete_research($id) {
            $this->db->where('id', $id)->delete('research');
            return $this->db->affected_rows();
        }

        public function add_lab_category($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $result = $this->db->where('id',$id)->update('lab_category',array('name'=>$editval));
                if ($result) {
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('lab_category', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }

        }

        public function get_lab_categories(){
            $result = $this->db->select('*')->from('lab_category')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_lab_category_description($id){
            $result = $this->db->select('*')->from('lab_category')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function save_lab_category_description($data){
            $this->db->where('id',$data['lab_category_id'])->update('lab_category',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }

        public function delete_lab_category($id) {
            $this->db->where('id', $id)->delete('lab_category');
            return $this->db->affected_rows();
        }

        public function add_lab_test($data){
            if(isset($data['id'])){
                $id = $data['id'];
                $editval = trim($data['editval']);
                $editval = preg_replace('/(<br>)+$/', '', $editval);
                $result = $this->db->where('id',$id)->update('lab_test',array('name'=>$editval));
                if ($result) {
                    return 'updated';
                }else{
                    return false;
                }
            }else{
                $result = $this->db->insert('lab_test', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }

        }

        public function get_lab_tests(){
            $result = $this->db->select('*')->from('lab_test')->order_by('sort_order')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function delete_lab_test($id) {
            $this->db->where('id', $id)->delete('lab_test');
            return $this->db->affected_rows();
        }

        public function delete_lab_test_item($id) {
            $this->db->where('id', $id)->delete('lab_test_item');
            return $this->db->affected_rows();
        }

        public function get_lab_test_description($id){
            $result = $this->db->select('*')->from('lab_test')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function save_lab_test_description($data){
            $this->db->where('id',$data['lab_test_id'])->update('lab_test',array('description'=>$data['description']));
            //echo $this->db->last_query(); die();
            return $this->db->affected_rows();
        }

        public function get_lab_tests_by_category($cate_id){
            $result = $this->db->select('*')->from('lab_test')->where('lab_category_id',$cate_id)->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function add_lab_test_item($data){
            if(isset($data['id'])){
                $id = $data['id'];
                if(isset($data['column'])&&($data['column'] == 'name')){
                    $editval = trim($data['editval']);
                    $editval = preg_replace('/(<br>)+$/', '', $editval);
                    $result = $this->db->where('id',$id)->update('lab_test_item',array('name'=>$editval));
                    if ($result) {
                        return 'updated';
                    }else{
                        return false;
                    }
                }else{
                    $editval = trim($data['editval']);
                    $editval = preg_replace('/(<br>)+$/', '', $editval);
                    $result = $this->db->where('id',$id)->update('lab_test_item',array('units'=>$editval));
                    if ($result) {
                        return 'updated';
                    }else{
                        return false;
                    }
                }

            }else{
                $result = $this->db->insert('lab_test_item', $data);
                if ($result) {
                    return 'inserted';
                }else{
                    return false;
                }
            }

        }

        public function get_lab_test_items(){
            $result = $this->db->select('*')->from('lab_test_item')->order_by('sort_order')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_lab_test_item_description($id){
            $result = $this->db->select('*')->from('lab_test_item')->where('id',$id)->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function save_lab_test_item_description($data){
            $this->db->where('id',$data['lab_test_item_id'])->update('lab_test_item',array('description'=>$data['description']));
            return $this->db->affected_rows();
        }

        public function get_lab_item_by_test_id($cate_id){
            $result = $this->db->select('*')->from('lab_test_item')->where('lab_test_id',$cate_id)
            ->order_by('sort_order')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function insert_profession($data){
            $result = $this->db->set('profession_name',$data)
                        ->insert('profession_tbl');
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function insert_district($data){
            $result = $this->db->set('district_name',$data)
                        ->insert('districts_tbl');
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function save_history_category($data){
            $result = $this->db->set()
                        ->insert();
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function get_history_categories(){
            $result = $this->db->select('*')->from('history_category')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_users(){
            $sql = "Select login.*,lrg.other_rights_group_id,lrgd.rights,lrgd.user_rights
                    FROM login
                    LEFT JOIN login_rights_group lrg on lrg.login_rights_group_id = login.login_rights_group_id and lrg.other_rights_group_id > 0
                    LEFT JOIN(
                        SELECT other_rights_group_detail.*, GROUP_CONCAT(other_rights.class) as other_rights,
                        GROUP_CONCAT(other_rights.status) as astatus,
                        GROUP_CONCAT(CONCAT(other_rights.other_rights_name,'-',other_rights_group_detail.other_rights_id,'-',other_rights.class,'-',other_rights_group_detail.status)) as rights,
                        GROUP_CONCAT(CONCAT(other_rights.other_rights_name,'-',other_rights.class,'-',other_rights_group_detail.status)) as user_rights
                        FROM other_rights_group_detail
                        LEFT JOIN other_rights ON other_rights.other_rights_id = other_rights_group_detail.other_rights_id
                        LEFT JOIN other_rights_group org  ON org.other_rights_group_id = other_rights_group_detail.other_rights_group_id
                        WHERE org.status = 1
                        Group BY other_rights_group_id
                    )lrgd ON lrgd.other_rights_group_id = lrg.other_rights_group_id";
            $result = $query = $this->db->query($sql);
            if ($result) {
                return $result->result_array();
            } else {
                return array();
            }
        }

        public function get_user_by_id($id){
            $sql = "Select login.*,lrg.other_rights_group_id,lrgd.rights,lrgd.user_rights
                    FROM login
                    LEFT JOIN login_rights_group lrg on lrg.login_rights_group_id = login.login_rights_group_id and lrg.other_rights_group_id > 0
                    LEFT JOIN(
                        SELECT other_rights_group_detail.*, GROUP_CONCAT(other_rights.class) as other_rights,
                        GROUP_CONCAT(other_rights.status) as astatus,
                        GROUP_CONCAT(CONCAT(other_rights.other_rights_name,'-',other_rights_group_detail.other_rights_id,'-',other_rights.class,'-',other_rights_group_detail.status)) as rights,
                        GROUP_CONCAT(CONCAT(other_rights.other_rights_name,'-',other_rights.class,'-',other_rights_group_detail.status)) as user_rights
                        FROM other_rights_group_detail
                        LEFT JOIN other_rights ON other_rights.other_rights_id = other_rights_group_detail.other_rights_id
                        LEFT JOIN other_rights_group org  ON org.other_rights_group_id = other_rights_group_detail.other_rights_group_id
                        WHERE org.status = 1
                        Group BY other_rights_group_id
                    )lrgd ON lrgd.other_rights_group_id = lrg.other_rights_group_id
                    WHERE login.login_id=$id";
            $result = $query = $this->db->query($sql);
            if ($result) {
                return $result->result_array();
            } else {
                return array();
            }
        }


        public function assign_permission($data){
            $other_rights_group_id = $data[0];
            $other_rights_id = $data[1];
            $query = $this->db->select('*')->from('other_rights_group_detail')
                        ->where('other_rights_group_id',$other_rights_group_id)
                        ->where('other_rights_id',$other_rights_id)
                        ->limit(1)->get();

            if($query->num_rows()>0){
                $this->db->where('other_rights_group_id',$other_rights_group_id)
                    ->where('other_rights_id',$other_rights_id)
                    ->update('other_rights_group_detail',array('status'=>$data['status']));
                echo $this->db->last_query();
            }else{
                $this->db->insert('other_rights_group_detail',
                    array('other_rights_group_id'=>$other_rights_group_id,'other_rights_id'=>$other_rights_id,'status'=>1));
                return $this->db->insert_id();
            }
        }

        public function profession_exist($profession){
            $result = $this->db->where('profession_name',$profession)
                        ->get('profession_tbl');
            if ($result->num_rows() >= 1) {
                return true;
            }else{
                return false;
            }
        }

        public function delete_pat_profession($id){
            $result = $this->db->where('profession_id', $id)->delete('profession_tbl');
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function update_profession($data){
            $id = $data['id'];
            $editval = trim($data['editval']);
            $editval = preg_replace('/(<br>)+$/', '', $editval);
            $result = $this->db->where('profession_id',$id)->update('profession_tbl',array('profession_name'=>$editval));
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function district_exist($district){
            $result = $this->db->where('district_name',$district)
                        ->get('districts_tbl');
            if ($result->num_rows() >= 1) {
                return true;
            }else{
                return false;
            }
        }

        public function delete_pat_district($id){
            $result = $this->db->where('district_id', $id)->delete('districts_tbl');
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function update_pat_district($data){
            $id = $data['id'];
            $editval = trim($data['editval']);
            $editval = preg_replace('/(<br>)+$/', '', $editval);
            $result = $this->db->where('district_id',$id)->update('districts_tbl',array('district_name'=>$editval));
            if ($result) {
                return true;
            }else{
                return false;
            }  
        }

        public function get_advice_items_by_category($cate_id){
            $result = $this->db->select('*')->from('advice_item')->where('advice_id',$cate_id)->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_history_items($id){
            $result = $this->db->select('name')
                                ->where('profile_history_id',$id)
                                ->order_by('sort_order')
                                ->get('history_item');
            if ($result){
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function insert_csv_history($data){
            $result = $this->db->insert('history_item',$data);
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function get_examination_items($id){
            $result = $this->db->select('name')
                                ->where('examination_id',$id)
                                ->get('examination_item');
            if ($result){
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function insert_csv_examination($data){
            $result = $this->db->insert('examination_item',$data);
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function get_investigation_items($id){
            $result = $this->db->select('name')
                                ->where('investigation_id',$id)
                                ->get('investigation_item');
            if ($result){
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function insert_csv_investigation($data){
            $result = $this->db->insert('investigation_item',$data);
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function get_instruction_items($id){
            $result = $this->db->select('name')
                                ->where('instruction_id',$id)
                                ->get('instruction_item');
            if ($result){
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function insert_csv_instruction($data){
            $result = $this->db->insert('instruction_item',$data);
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function get_medicine_items($id){
            $result = $this->db->select('name')
                                ->where('medicine_id',$id)
                                ->get('medicine_item');
            if ($result){
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function insert_csv_medicine($data){
            $result = $this->db->insert('medicine_item',$data);
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function get_advice_items_csv($id){
            $result = $this->db->select('name')
                                ->where('advice_id',$id)
                                ->get('advice_item');
            if ($result){
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function insert_csv_advice($data){
            $result = $this->db->insert('advice_item',$data);
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function change_user_password($data){
            $password = password_hash($data['new_password'], PASSWORD_BCRYPT);
            $result = $this->db->where('login_id',$data['userid'])->update('login',array('password'=>$password));
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function update_user_data($data,$id){
            $result = $this->db->where('login_id',$id)->update('login',$data);
            if ($result) {
                return true;
            }else{
                return false;
            }
        }
     
        public function user_delete($id,$username){
            $menu_group = $this->db->where('menu_group_name',$username)->get('menu_group');
            $menu_group_id = $menu_group->row()->menu_group_id;
            $other_rights_group = $this->db->where('other_rights_group_name',$username)->get('other_rights_group');
            $other_rights_group_id = $other_rights_group->row()->other_rights_group_id;
            $login_rights_group = $this->db->where('other_rights_group_id',$other_rights_group_id)->get('login_rights_group');
            $login_rights_group_id = $login_rights_group->row()->login_rights_group_id;
            $delete_from_login = $this->db->where('username',$username)->delete('login');
            $delete_from_login_rights = $this->db->where('login_rights_group_id',$login_rights_group_id)->delete('login_rights_group');
            $delete_from_other_rights_details = $this->db->where('other_rights_group_id',$other_rights_group_id)->delete('other_rights_group_detail');
            $delete_from_other_rights_group = $this->db->where('other_rights_group_id',$other_rights_group_id)->delete('other_rights_group');
            $delete_from_menu_group_details = $this->db->where('menu_group_id',$menu_group_id)->delete('menu_group_detail');
            $delete_from_menu_group = $this->db->where('menu_group_id',$menu_group_id)->delete('menu_group');
            if ($delete_from_menu_group) {
                return true;
            }else{
                return false;
            }
        }

        public function export_professions(){
            $result = $this->db->select('profession_name')->from('profession_tbl')->order_by('profession_name')
                        ->get();
            if ($result) {
                return $result->result_array();
            }else{
                return false;
            }
        }

        public function insert_csv_profession($data){
            $result = $this->db->insert('profession_tbl',$data);
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function export_district(){
            $result = $this->db->select('district_name')->from('districts_tbl')->order_by('district_name')
                        ->get();
            if ($result) {
                return $result->result_array();
            }else{
                return false;
            }
        }

        public function insert_csv_district($data){
            $result = $this->db->insert('districts_tbl',$data);
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function export_dosage(){
            $result = $this->db->select('name')->from('dosage')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function insert_csv_dosage($data){
            $result = $this->db->insert('dosage',$data);
            if ($result) {
                return true;
            }else{
                return false;
            }
        }
        public function sort_data($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['history_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['history_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function history_item_sort_table($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['history_item_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['history_item_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_examination_table($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['examination_cat_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['examination_cat_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_examination_item_table($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['examination_item_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['examination_item_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_investigation_table($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['investigation_cat_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['investigation_cat_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_investigation_item_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['investigation_item_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['investigation_item_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_medicine_cat_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['medicine_cat_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['medicine_cat_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_medicine_item_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['medicine_item_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['medicine_item_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_instruction_cat_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['instruction_cat_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['instruction_cat_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_instruction_item_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['instruction_item_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['instruction_item_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_advice_cat_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['advice_cat_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['advice_cat_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_advice_item_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['advice_item_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['advice_item_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_lab_test_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['lab_test_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['lab_test_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_lab_test_item_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['lab_test_item_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['lab_test_item_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_echo_disease_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['echo_disease_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['echo_disease_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_echo_structure_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['echo_structure_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['echo_structure_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_echo_cat_meas_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['echo_cat_meas_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['echo_cat_meas_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_ett_test_reason_table($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['ett_test_reason_table']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['ett_test_reason_table'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_ending_reasons_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['ending_reasons_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['ending_reasons_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_ett_description_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['ett_description_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['ett_description_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_ett_conclusion_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['ett_conclusion_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['ett_conclusion_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function sort_ett_protocol_tbl($data,$tablename,$id){
            $c= 0;
            for($i=0;$i<count($data['ett_protocol_tbl']);$i++){
                $c += 1;
                $result = $this->db->set('sort_order',$c)
                            ->where($id,$data['ett_protocol_tbl'][$i])
                            ->update($tablename);
            }
            if ($result) {
                return true;
            }else{
                return false;
            }
        }

        public function check_if_csv_data_exist($cname,$cdata,$tbl,$id,$cid){
            if (empty($id)) {
                $result = $this->db->select($cname)->where($cname,$cdata)->get($tbl);
            }else{
                $result = $this->db->select($cname)->where($cname,$cdata)->where($cid,$id)->get($tbl);    
            }
            if ($result->num_rows()>0) {
                return 1;
            }else{
                return 0;
            }
        }

        public function export_angio(){
            $result = $this->db->select('description')->from('recommendation')->order_by('description')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function insert_csv_angio($data){
            $result = $this->db->insert('recommendation',$data);
            if ($result) {
                return true;
            }else{
                return false;
            }
        }


	}

?>
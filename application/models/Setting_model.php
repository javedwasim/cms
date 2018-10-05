<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Setting_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}


		public function get_districts(){
			$result = $this->db->select('*')
						->get('districts_tbl');
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
            $other_rights = $user['user_rights'];
            foreach ($other_rights as $right){
                $this->db->insert('other_rights_group_detail', array('other_rights_group_id'=>$other_rights_group_id,'other_rights_id'=>$right,'status'=>1));
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
			$result = $this->db->select('*')
						->get('profession_tbl');
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
                $this->db->where('id',$id)->update('advice',array('name'=>$editval));
                //echo $this->db->last_query(); die();
                return $this->db->affected_rows();
            }else{
                $this->db->insert('advice', $data);
                return $this->db->insert_id();
            }

        }

        public function get_advices(){
            $result = $this->db->select('*')->from('advice')->get();
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
                $this->db->where('id',$id)->update('advice_item',array('name'=>$editval));
                //echo $this->db->last_query(); die();
                return $this->db->affected_rows();
            }else{
                $this->db->insert('advice_item', $data);
                return $this->db->insert_id();
            }

        }

        public function get_advice_items(){
            $result = $this->db->select('*')->from('advice_item')->get();
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
                $this->db->where('id',$id)->update('research',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('research', $data);
                return $this->db->insert_id();
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
            $result = $this->db->select('description')->from('research')->where('id',$id)->limit(1)->get();
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
                $this->db->where('id',$id)->update('lab_category',array('name'=>$editval));
                //echo $this->db->last_query(); die();
                return $this->db->affected_rows();
            }else{
                $this->db->insert('lab_category', $data);
                return $this->db->insert_id();
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
            $result = $this->db->select('description')->from('lab_category')->where('id',$id)->limit(1)->get();
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
                $this->db->where('id',$id)->update('lab_test',array('name'=>$editval));
                return $this->db->affected_rows();
            }else{
                $this->db->insert('lab_test', $data);
                return $this->db->insert_id();
            }

        }

        public function get_lab_tests(){
            $result = $this->db->select('*')->from('lab_test')->get();
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
            $result = $this->db->select('description')->from('lab_test')->where('id',$id)->limit(1)->get();
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
                    $this->db->where('id',$id)->update('lab_test_item',array('name'=>$editval));
                    return $this->db->affected_rows();
                }else{
                    $editval = trim($data['editval']);
                    $editval = preg_replace('/(<br>)+$/', '', $editval);
                    $this->db->where('id',$id)->update('lab_test_item',array('units'=>$editval));
                    return $this->db->affected_rows();
                }

            }else{
                $this->db->insert('lab_test_item', $data);
                return $this->db->insert_id();
            }

        }

        public function get_lab_test_items(){
            $result = $this->db->select('*')->from('lab_test_item')->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_lab_test_item_description($id){
            $result = $this->db->select('description')->from('lab_test_item')->where('id',$id)->limit(1)->get();
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
            $result = $this->db->select('*')->from('lab_test_item')->where('lab_test_id',$cate_id)->get();
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
            if($cate_id>0){
                $result = $this->db->select('*')->from('advice_item')->where('advice_id',$cate_id)->get();
            }else{
                $result = $this->db->select('*')->from('advice_item')->get();
            }
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_history_items($id){
            $result = $this->db->select('name')
                                ->where('profile_history_id',$id)
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
	}

?>
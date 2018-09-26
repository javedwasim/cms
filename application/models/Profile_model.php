<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Profile_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();

		}

		public function insert_profile($data){
			$this->db->insert('patient_profile', $data);
            return $this->db->insert_id();
		}

		public function get_profiles(){
			$result = $this->db->get('patient_profile');
			if ($result) {
				return $result->result_array();
			}else{
				return false;
			}
		}

		public function delete_pat_profile($id){
			$result = $this->db->delete('patient_profile', array('id' => $id));
			if ($result) {
				return true;
			}else{
				return false;
			}

		}
		public function get_profile_by_id($id){
			$result = $this->db
						->where('id',$id)
						->limit(1)
						->get('patient_profile');
			if($result){
				return $result->row();
			}else{
				return false;
			}
		}

		public function update_profile($data,$id){
			$result = $this->db->where('id', $id)
						->update('patient_profile', $data);
			if ($result) {
				return true;
			}else{
				return false;
			}
		}

		public function get_notes(){
			$result = $this->db->select('*')
						->from('diary')
						->get();
			if ($result){
				return $result->result_array();
			}else{
				return array();
			}
		}

		public function insert_notes($data){
			$result = $this->db->insert('diary', $data);
            if ($result) {
            	return true;
            }else{
            	return false;
            }
		}

		public function delete_notes($id){
			$result = $this->db->delete('diary', array('id' => $id));
			if ($result) {
				return true;
			}else{
				return false;
			}
		}

		public function notes_record($name){
			$result = $this->db->select('*')
						->from('diary')
						->where('username',$name)
						->get();
			if ($result) {
				return $result->result_array();
			}else{
				return array();
			}
		}

		public function selectd_note($id){
			$result = $this->db->select('*')
						->from('diary')
						->where('id',$id)
						->get();
			if ($result) {
				return $result->row()->note;
			}else{
				return false;
			}
		}

		public function update_diary_note($id, $note){
			$date = date('Y-m-d H:i:s');
			$data_array = array(
					'note' => $note,
					'updated_at' => $date
				);
			$result = $this->db->where('id',$id)
						->update('diary', $data_array);
			if ($result) {
				return true;
			}else{
				return false;
			}
		}

		public function research_assign($rid,$pid){
			$data = array(
					'research_id' => $rid,
					'profile_id' => $pid
				);
			$result = $this->db->insert('manage_research', $data);
            if ($result) {
            	return true;
            }else{
            	return false;
            }
		}

		public function get_profiles_by_filters($filters){
			$where = " 1 ";
	        if(isset($filters['id']) && (!empty($filters['id'])) ){
	           $id = $filters['id'];
	           $where =  "(id = '$id')";
	        }
	        if(isset($filters['pat_name']) && (!empty($filters['pat_name'])) ){
	           $name = $filters['pat_name'];
	           $where .=  " AND (pat_name = '' OR pat_name LIKE '%$name%')";
	        }
	        if(isset($filters['pat_profession']) && (!empty($filters['pat_profession'])) ){
	            $pat_profession = $filters['pat_profession'];
	            $where .=  " AND (pat_profession = '' OR pat_profession = '$pat_profession')";
	        }
	        if(isset($filters['pat_district']) && (!empty($filters['pat_district'])) ){
	            $pat_district = $filters['pat_district'];
	            $where .=  " AND (pat_district = '' OR pat_district = '$pat_district')";
	        }
	        if(isset($filters['pat_age']) && isset($filters['age_bt']) && (!empty($filters['pat_age'])) && (!empty($filters['age_bt'])) ){
	            $pat_age = $filters['pat_age'];
	            $age_bt = $filters['age_bt'];
	            if($pat_age == 'age_below' ){
	            	$where .=  " AND (pat_age = '' OR pat_age < '$pat_age')";
	            }
	            if ($pat_age == 'age_above') {
	            	$where .=  " AND (pat_age = '' OR pat_age > '$pat_age')";
	            }
	        }
	        if(isset($filters['pat_sex']) && (!empty($filters['pat_sex'])) ){
	            $pat_sex = $filters['pat_sex'];
	            $where .=  " AND (pat_sex = '' OR pat_sex = '$pat_sex')";
	        }
	        if(isset($filters['pat_height']) && isset($filters['height_bt']) && (!empty($filters['pat_height'])) && (!empty($filters['height_bt'])) ){
	            $pat_height = $filters['pat_height'];
	            $height_bt = $filters['height_bt'];
	            if($height_bt == 'height_below' ){
	            	$where .=  " AND (pat_height = '' OR pat_height < '$pat_height')";
	            }
	            if ($height_bt == 'height_above') {
	            	$where .=  " AND (pat_height = '' OR pat_height > '$pat_height')";
	            }
	        }
	        if(isset($filters['pat_bmi']) && isset($filters['bmi_bt']) && (!empty($filters['pat_bmi'])) && (!empty($filters['bmi_bt'])) ){
	            $pat_bmi = $filters['pat_bmi'];
	            $bmi_bt = $filters['bmi_bt'];
	            if($bmi_bt == 'bmi_below' ){
	            	$where .=  " AND (pat_bmi = '' OR pat_bmi < '$pat_bmi')";
	            }
	            if ($bmi_bt == 'bmi_above') {
	            	$where .=  " AND (pat_bmi = '' OR pat_bmi > '$pat_bmi')";
	            }
	        }
	        if(isset($filters['pat_weight']) && isset($filters['weight_bt']) && (!empty($filters['pat_weight'])) && (!empty($filters['weight_bt'])) ){
	            $pat_weight = $filters['pat_weight'];
	            $weight_bt = $filters['weight_bt'];
	            if($weight_bt == 'weight_below' ){
	            	$where .=  " AND (pat_weight = '' OR pat_weight < '$pat_weight')";
	            }
	            if ($weight_bt == 'weight_above') {
	            	$where .=  " AND (pat_weight = '' OR pat_weight > '$pat_weight')";
	            }  
	        }
	        if(isset($filters['pat_bsa']) && isset($filters['bsa_bt']) && (!empty($filters['pat_bsa'])) && (!empty($filters['bsa_bt'])) ){
	            $pat_bsa = $filters['pat_bsa'];
	            $bsa_bt = $filters['bsa_bt'];
	            if($bsa_bt == 'bsa_below' ){
	            	$where .=  " AND (pat_bsa = '' OR pat_bsa < '$pat_bsa')";
	            }
	            if ($bsa_bt == 'bsa_above') {
	            	$where .=  " AND (pat_bsa = '' OR pat_bsa > '$pat_bsa')";
	            }  
	        }
	        if(isset($filters['creation_date']) && (!empty($filters['creation_date']))){
	        	$registration_date = date('Y-m-d', strtotime($filters['creation_date']));
	        	$where .=  " AND (creation_date = '' OR DATE(creation_date) = '$registration_date')";
	        }
	        $sql = "SELECT patient_profile.* FROM patient_profile where $where";
	        $result = $query = $this->db->query($sql);
	        if($result) {
	            return $result->result_array();
	        } else {
	            return array();
	        }
		}

		public function get_research_description($id){
			$result = $this->db->select('*')
						->from('research')
						->where('id',$id)
						->get();
			if ($result) {
				return $result->row();
			}else{
				return false;
			}
		}


	}

?>
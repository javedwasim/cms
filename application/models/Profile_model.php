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


        public function save_special_instructions($data)
        {
        	$spid = $data['sp_inst_id'];
        	if ($spid =='') {
        		$data_array = array(
        			'patient_id' => $data['patient_id'],
        			'description' => $data['description']
        		);
        		$result = $this->db->insert('patient_special_instruction', $data_array);
        	}else{
        		$result = $this->db->set('description',$data['description'])
        					->where('id',$spid)
        					->update('patient_special_instruction');
        	}
        	if ($result) {
        		return true;
        	}else{
        		return false;
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

		public function patient_info_by_id($id){
			$result = $this->db->select('*')
						->from('patient_profile')
						->where('id',$id)
						->get();
			if ($result) {
				return $result->row();
			}else{
				return false;
			}
		}

		public function get_sp_info($id){
			$result = $this->db->select('*')
						->from('patient_special_instruction')
						->where('patient_id',$id)
						->get();
			if ($result) {
				return $result->result_array();
			}else{
				return array();
			}
		}

		public function get_special_instructions_by_id($id){
			$result = $this->db->select('*')
						->from('patient_special_instruction')
						->where('id',$id)
						->get();
			if ($result) {
				return $result->row();
			}else{
				return array();
			}
		}


		public function insert_ett_test($data){
			$result = $this->db->insert('patient_ett_test', $data);
			if ($result) {
				return $this->db->insert_id();
			}else{
				return false;
			}
		}

        public function save_patient_lab_test($data)
        {
            if(isset($data['item_id']) && !empty($data['item_id'])){
                $items = $data['item_id'];
                $values = $data['item_value'];
                $units = $data['item_units'];
                $key =  $this->generateRandomString();
                for($j=0;$j<count($items);$j++){
                    $this->db->insert('patient_lab_test',
                        array('patient_id'=>$data['patient_id'],
                            'category_id'=>$data['category_id'],
                            'test_date'=>date('Y-m-d', strtotime($data['test_date'])),
                            'test_id'=>$data['test_id'],
                            'item_id'=>$items[$j],
                            'item_value'=>$values[$j],
                            'item_units'=>$units[$j],
                            'info_key'=>$key,
                         ));

                }
                $this->db->insert('patient_lab_test_info',
                            array('patient_id'=>$data['patient_id'],
                                  'info_key'=>$key,
                                  'test_date'=>date('Y-m-d', strtotime($data['test_date']))));
                return true;
            }else{
                return false;
            }
        }

        public function get_lab_test_info($id){
            $query = "SELECT id,info.test_date, labtest.name,labtest.test_id,labtest.info_key,patient_id
                        FROM patient_lab_test_info as info
                        LEFT JOIN(
                            SELECT lab_test.name,patient_lab_test.info_key,patient_lab_test.test_id
                            FROM lab_test
                            LEFT JOIN patient_lab_test ON patient_lab_test.test_id = lab_test.id	
                            GROUP BY patient_lab_test.info_key
                        )labtest  ON labtest.info_key = info.info_key
                        WHERE patient_id = $id";

            $result = $this->db->query($query);
            if ($result) {
                return $result->result_array();
            } else {
                return array();
            }
        }


        public function get_lab_test_unit($key){
            $query = "SELECT plt.*,test_item.name FROM patient_lab_test plt
                        LEFT JOIN (
                            SELECT id,name FROM lab_test_item
                        )test_item ON test_item.id=plt.item_id Where info_key = '$key'";
            $result = $this->db->query($query);
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }


        public function save_echo_profile_info($data){
            $query = $this->db->select('*')->from('patient_echo')->limit(1)->get();
            $result = $query->row_array();
            $patient_echo_id = $result['id'];
            $this->db->where('patient_echo_id', $patient_echo_id)->delete('patient_echo_measurement');


            $this->db->where('patient_id', $data['patient_id'])->delete('patient_echo');
            $this->db->insert('patient_echo',array('patient_id'=>$data['patient_id'],'measurement_cate_id'=>$data['measurement_cate_id']));
            $patient_echo_id = $this->db->insert_id();

             for ($i=0;$i<count($data['item_id']);$i++){
                 $item_id = $data['item_id'];
                 $item_value = $data['item_value'];
                 $measurement_value = $data['measurement_value'];
                 if(!empty($item_value[$i])){
                     $this->db->insert('patient_echo_measurement',
                         array(
                             'patient_echo_id'=>$patient_echo_id,
                             'item_id'=>$item_id[$i],
                             'item_value'=>$item_value[$i],
                             'measurement_value'=>$measurement_value[$i],
                         ));
                 }
            }
            return $patient_echo_id;
        }

        public function get_patient_measurement_by_category($category_id){
            $result = $this->db->select('patient_echo_measurement.*,category_measurement.item')->from('patient_echo_measurement')
                       ->join('category_measurement','category_measurement.id=patient_echo_measurement.item_id','left')
                       ->where('patient_echo_id',"$category_id")->get();
            //echo $this->db->last_query(); die();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_main_category($category_id){
            $result = $this->db->select('*')->from('echo_category')->where('id',"$category_id")->limit(1)->get();
            if ($result) {
                return $result->row_array();
            }else{
                return array();
            }
        }

        public function get_disease_findings_diagnosis($disease_id){
            $finddings = $this->db->select('disease_findings.*,structure_finding.name')->from('disease_findings')
                        ->join('structure_finding','structure_finding.id=disease_findings.finding_id')
                        ->where('disease_findings.disease_id',"$disease_id")
                        ->group_by('disease_findings.finding_id')
                        ->get();

            $diagnosis = $this->db->select('disease_diagnosis.*,diagnosis.name')->from('disease_diagnosis')
                        ->join('diagnosis','diagnosis.id=disease_diagnosis.diagnosis_id')
                        ->where('disease_diagnosis.disease_id',"$disease_id")
                        ->group_by('disease_diagnosis.diagnosis_id')
                        ->get();

            $data['findings'] =  $finddings->result_array();
            $data['diagnosis'] =  $diagnosis->result_array();
            return $data;
        }

        public function save_profile_echo_info($data){
            //print_r($data); die();
            $patient_echo_id = $data['patient_id'];
            $disease_id = $data['disease_id'];
            if(isset($data['echo_detail_id_mmode'])&&!empty($data['echo_detail_id_mmode'])){
                $echo_deatil_id = $data['echo_detail_id_mmode'];
            }else{
                $this->db->insert('profile_echo_detail',array('patient_id'=>$patient_echo_id));
                $echo_deatil_id = $this->db->insert_id();
            }
            $this->db->delete('profile_echo_measurement', array('patient_id' => $patient_echo_id,'echo_detail_id'=>$echo_deatil_id));
            $this->db->delete('profile_echo_findings', array('patient_id' => $patient_echo_id,'echo_detail_id'=>$echo_deatil_id));
            $this->db->delete('profile_echo_diagnosis', array('patient_id' => $patient_echo_id,'echo_detail_id'=>$echo_deatil_id));

            for ($i=0;$i<count($data['item_id']);$i++){
                $item_id = $data['item_id'];
                $item_value = $data['item_value'];
                $measurement_value = $data['measurement_value'];

                $this->db->insert('profile_echo_measurement',
                array(
                    'echo_detail_id'=>$echo_deatil_id,
                    'patient_id'=>$patient_echo_id,
                    'item_id'=>$item_id[$i],
                    'item_value'=>$item_value[$i],
                    'measurement_value'=>$measurement_value[$i],
                ));
            }

            for ($i=0;$i<count($data['disease_finding_id']);$i++){
                $disease_finding_id = $data['disease_finding_id'];
                $disease_finding_value = $data['disease_finding_value'];
                $finding_structure_id = $data['finding_structure_id'];
                $this->db->insert('profile_echo_findings',
                array(
                    'echo_detail_id'=>$echo_deatil_id,
                    'patient_id'=>$patient_echo_id,
                    'finding_id'=>$disease_finding_id[$i],
                    'finding_value'=>$disease_finding_value[$i],
                    'disease_id'=>$disease_id,
                    'disease_id'=>$disease_id,
                    'structure_id'=>$finding_structure_id[$i],
                ));
            }

            for ($i=0;$i<count($data['disease_diagnosis_id']);$i++){
                $disease_diagnosis_id = $data['disease_diagnosis_id'];
                $disease_diagnosis_value = $data['disease_diagnosis_value'];
                $diagnose_structure_id = $data['diagnose_structure_id'];
                $this->db->insert('profile_echo_diagnosis',
                array(
                    'echo_detail_id'=>$echo_deatil_id,
                    'patient_id'=>$patient_echo_id,
                    'diagnosis_id'=>$disease_diagnosis_id[$i],
                    'diagnosis_value'=>$disease_diagnosis_value[$i],
                    'disease_id'=>$disease_id,
                    'structure_id'=>$diagnose_structure_id[$i],
                ));
            }

            return $patient_echo_id;
        }



        function insert_ett_protocols($data,$id){
        	if(isset($data['stage_name']) && !empty($data['stage_name'])){
                $name = $data['stage_name'];
                $speed = $data['stage_speed'];
                $grade = $data['stage_grade'];
                $time = $data['stage_time'];
                $mets = $data['stage_mets'];
                $hr = $data['stage_hr'];
                $sbp = $data['stage_sbp'];
                $dbp = $data['stage_dbp'];
                $condition = $data['stage_condition'];
                for($j=0;$j<count($name);$j++){
                   	$result = $this->db->insert('patient_ett_test_protocol',
                    array(
                    	'patient_ett_test_id'=>$id,
                    	'patient_id'=>$data['pat_id'],
                    	'protocol_id'=>$data['protocol_id'],
                        'stage_name'=>$name[$j],
                        'speed'=>$speed[$j],
                        'grade'=>$grade[$j],
                        'stage_time'=>date('h:i',strtotime($time[$j])),
                        'mets'=>$mets[$j],
                        'hr'=>$hr[$j],
                        'sbp'=>$sbp[$j],
                        'dbp'=>$dbp[$j],
                        'protocol_condition'=>$condition[$j],
                    ));

                }
                if ($result) {
                	return true;
                }else{
                	return false;
                }
            }
        }

        public function get_echo_detail($patient_id){
            $result = $this->db->select('*')->from('profile_echo_detail')->where('patient_id',$patient_id)->get();
            if ($result) {
                return $result->result_array();
            }else{
                return false;
            }
        }

        public function get_patient_measurement($patient_id,$detail_id){

            $result = $this->db->select('profile_echo_measurement.*,category_measurement.item,echo_category.main_category')
                        ->from('profile_echo_measurement')
                        ->join('category_measurement','category_measurement.id=profile_echo_measurement.item_id','left')
                        ->join('echo_category','echo_category.id=category_measurement.category_id','left')
                        ->where('echo_detail_id',"$detail_id")
                        ->where('patient_id',"$patient_id")
                        ->get();
            //echo $this->db->last_query(); die();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }

        }

        public function get_patient_echo_findings($patient_id,$detail_id){

            $result = $this->db->select('profile_echo_findings.*,structure_finding.name')
                        ->from('profile_echo_findings')
                        ->join('structure_finding','structure_finding.id=profile_echo_findings.finding_id','left')
                        ->where('echo_detail_id',"$detail_id")
                        ->where('patient_id',"$patient_id")
                        ->get();
            //echo $this->db->last_query(); die();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }

        }

        public function get_patient_echo_diagnosis($patient_id,$detail_id){
            $result = $this->db->select('profile_echo_diagnosis.*,diagnosis.name')
                ->from('profile_echo_diagnosis')
                ->join('diagnosis','diagnosis.id=profile_echo_diagnosis.diagnosis_id','left')
                ->where('echo_detail_id',"$detail_id")
                ->where('patient_id',"$patient_id")
                ->get();
            //echo $this->db->last_query(); die();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

        public function get_lab_test_detail($patient_id){
            $result = $this->db->select('*')->from('patient_lab_test_info')->where('patient_id',$patient_id)->get();
            if ($result) {
                return $result->result_array();
            }else{
                return false;
            }
        }

        public function get_ett_detail($patient_id){
            $result = $this->db->select('*')->from('patient_ett_test')->where('patient_id',$patient_id)->get();
            if ($result) {
                return $result->result_array();
            }else{
                return false;
            }
        }

        public function get_ett_detail_by_ids($patient_id,$detail_id){
            $result = $this->db->select('*')->from('patient_ett_test')->where('patient_id',$patient_id)
            			->where('id',$detail_id)
            			->get();
            if ($result) {
                return $result->result_array();
            }else{
                return false;
            }
        }

	}

?>
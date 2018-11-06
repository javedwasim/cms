<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();

    }

    public function insert_profile($data)
    {
        $this->db->insert('patient_profile', $data);
        return $this->db->insert_id();
    }

    public function get_profiles()
    {
        $result = $this->db->get('patient_profile');
        if ($result) {
            return $result->result_array();
        } else {
            return false;
        }
    }

    public function delete_pat_profile($id)
    {
        $result = $this->db->delete('patient_profile', array('id' => $id));
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    public function get_profile_by_id($id)
    {
        $result = $this->db
            ->where('id', $id)
            ->limit(1)
            ->get('patient_profile');
        if ($result) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function update_profile($data, $id)
    {
        $result = $this->db->where('id', $id)
            ->update('patient_profile', $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function get_notes()
    {
        $result = $this->db->select('*')
            ->from('diary')
            ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function insert_notes($data)
    {
        $result = $this->db->insert('diary', $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_notes($id)
    {
        $result = $this->db->delete('diary', array('id' => $id));
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function notes_record($name)
    {
        $result = $this->db->select('*')
            ->from('diary')
            ->where('username', $name)
            ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }


    public function selectd_note($id)
    {
        $result = $this->db->select('*')
            ->from('diary')
            ->where('id', $id)
            ->get();
        if ($result) {
            return $result->row()->note;
        } else {
            return false;
        }
    }

    public function update_diary_note($id, $note)
    {
        $date = date('Y-m-d H:i:s');
        $data_array = array(
            'note' => $note,
            'updated_at' => $date
        );
        $result = $this->db->where('id', $id)
            ->update('diary', $data_array);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function research_assign($rid, $pid)
    {
        $data = array(
            'research_id' => $rid,
            'profile_id' => $pid
        );
        $result = $this->db->insert('manage_research', $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function get_profiles_by_filters($filters)
    {
        $where = " 1 ";
        if (isset($filters['id']) && (!empty($filters['id']))) {
            $id = $filters['id'];
            $where = "(id = '$id')";
        }
        if (isset($filters['pat_name']) && (!empty($filters['pat_name']))) {
            $name = $filters['pat_name'];
            $where .= " AND (pat_name = '' OR pat_name LIKE '%$name%')";
        }
        if (isset($filters['pat_profession']) && (!empty($filters['pat_profession']))) {
            $pat_profession = $filters['pat_profession'];
            $where .= " AND (pat_profession = '' OR pat_profession = '$pat_profession')";
        }
        if (isset($filters['pat_district']) && (!empty($filters['pat_district']))) {
            $pat_district = $filters['pat_district'];
            $where .= " AND (pat_district = '' OR pat_district = '$pat_district')";
        }
        if (isset($filters['pat_age']) && isset($filters['age_bt']) && (!empty($filters['pat_age'])) && (!empty($filters['age_bt']))) {
            $pat_age = $filters['pat_age'];
            $age_bt = $filters['age_bt'];
            if ($pat_age == 'age_below') {
                $where .= " AND (pat_age = '' OR pat_age < '$pat_age')";
            }
            if ($pat_age == 'age_above') {
                $where .= " AND (pat_age = '' OR pat_age > '$pat_age')";
            }
        }
        if (isset($filters['pat_sex']) && (!empty($filters['pat_sex']))) {
            $pat_sex = $filters['pat_sex'];
            $where .= " AND (pat_sex = '' OR pat_sex = '$pat_sex')";
        }
        if (isset($filters['pat_height']) && isset($filters['height_bt']) && (!empty($filters['pat_height'])) && (!empty($filters['height_bt']))) {
            $pat_height = $filters['pat_height'];
            $height_bt = $filters['height_bt'];
            if ($height_bt == 'height_below') {
                $where .= " AND (pat_height = '' OR pat_height < '$pat_height')";
            }
            if ($height_bt == 'height_above') {
                $where .= " AND (pat_height = '' OR pat_height > '$pat_height')";
            }
        }
        if (isset($filters['pat_bmi']) && isset($filters['bmi_bt']) && (!empty($filters['pat_bmi'])) && (!empty($filters['bmi_bt']))) {
            $pat_bmi = $filters['pat_bmi'];
            $bmi_bt = $filters['bmi_bt'];
            if ($bmi_bt == 'bmi_below') {
                $where .= " AND (pat_bmi = '' OR pat_bmi < '$pat_bmi')";
            }
            if ($bmi_bt == 'bmi_above') {
                $where .= " AND (pat_bmi = '' OR pat_bmi > '$pat_bmi')";
            }
        }
        if (isset($filters['pat_weight']) && isset($filters['weight_bt']) && (!empty($filters['pat_weight'])) && (!empty($filters['weight_bt']))) {
            $pat_weight = $filters['pat_weight'];
            $weight_bt = $filters['weight_bt'];
            if ($weight_bt == 'weight_below') {
                $where .= " AND (pat_weight = '' OR pat_weight < '$pat_weight')";
            }
            if ($weight_bt == 'weight_above') {
                $where .= " AND (pat_weight = '' OR pat_weight > '$pat_weight')";
            }
        }
        if (isset($filters['pat_bsa']) && isset($filters['bsa_bt']) && (!empty($filters['pat_bsa'])) && (!empty($filters['bsa_bt']))) {
            $pat_bsa = $filters['pat_bsa'];
            $bsa_bt = $filters['bsa_bt'];
            if ($bsa_bt == 'bsa_below') {
                $where .= " AND (pat_bsa = '' OR pat_bsa < '$pat_bsa')";
            }
            if ($bsa_bt == 'bsa_above') {
                $where .= " AND (pat_bsa = '' OR pat_bsa > '$pat_bsa')";
            }
        }
        if (isset($filters['creation_date']) && (!empty($filters['creation_date']))) {
            $registration_date = date('Y-m-d', strtotime($filters['creation_date']));
            $where .= " AND (creation_date = '' OR DATE(creation_date) = '$registration_date')";
        }
        $sql = "SELECT patient_profile.* FROM patient_profile where $where";
        $result = $this->db->query($sql);
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }


    public function save_special_instructions($data)
    {
        $spid = $data['sp_inst_id'];
        if ($spid == '') {
            $data_array = array(
                'patient_id' => $data['patient_id'],
                'description' => $data['description']
            );
            $result = $this->db->insert('patient_special_instruction', $data_array);
        } else {
            $result = $this->db->set('description', $data['description'])
                ->where('id', $spid)
                ->update('patient_special_instruction');
        }
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    public function get_research_description($id)
    {
        $result = $this->db->select('*')
            ->from('research')
            ->where('id', $id)
            ->get();
        if ($result) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function patient_info_by_id($id)
    {
        $result = $this->db->select('*')
            ->from('patient_profile')
            ->where('id', $id)
            ->get();
        if ($result) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function get_sp_info($id)
    {
        $result = $this->db->select('*')
            ->from('patient_special_instruction')
            ->where('patient_id', $id)
            ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_special_instructions_by_id($id)
    {
        $result = $this->db->select('*')
            ->from('patient_special_instruction')
            ->where('id', $id)
            ->get();
        if ($result) {
            return $result->row();
        } else {
            return array();
        }
    }


    public function insert_ett_test($data)
    {
        $result = $this->db->insert('patient_ett_test', $data);
        if ($result) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function save_patient_lab_test($data)
    {
        if (isset($data['item_id']) && !empty($data['item_id'])) {
            $items = $data['item_id'];
            $values = $data['item_value'];
            $units = $data['item_units'];
            $key = $this->generateRandomString();
            for ($j = 0; $j < count($items); $j++) {
                $this->db->insert('patient_lab_test',
                    array('patient_id' => $data['patient_id'],
                        'category_id' => $data['category_id'],
                        'test_date' => date('Y-m-d', strtotime($data['test_date'])),
                        'test_id' => $data['test_id'],
                        'item_id' => $items[$j],
                        'item_value' => $values[$j],
                        'item_units' => $units[$j],
                        'info_key' => $key,
                    ));

            }
            $this->db->insert('patient_lab_test_info',
                array('patient_id' => $data['patient_id'],
                    'info_key' => $key,
                    'test_date' => date('Y-m-d', strtotime($data['test_date']))));
            return true;
        } else {
            return false;
        }
    }

    public function get_lab_test_info($id)
    {
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


    public function get_lab_test_unit($key)
    {
        $query = "SELECT plt.*,test_item.name FROM patient_lab_test plt
                        LEFT JOIN (
                            SELECT id,name FROM lab_test_item
                        )test_item ON test_item.id=plt.item_id Where info_key = '$key'";
        $result = $this->db->query($query);
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function save_echo_profile_info($data,$main_category)
    {
        $query = $this->db->select('*')->from('patient_echo')->limit(1)->get();
        $result = $query->row_array();
        $patient_echo_id = $result['id'];
        if ($main_category['main_category']=='color_dooplers') {
            $this->db->where('patient_echo_id', $patient_echo_id)->delete('patient_echo_color_doppler');
            $this->db->where('patient_id', $data['patient_id'])->delete('patient_echo');
            $this->db->insert('patient_echo', array('patient_id' => $data['patient_id'], 'measurement_cate_id' => $data['measurement_cate_id']));
            $patient_echo_id = $this->db->insert_id();
            if (isset($data['mr'])) {
                $mr = $data['mr'];
            }else{
                $mr = "";
            }
            if (isset($data['ar'])) {
                $ar = $data['ar'];
            }else{
                $ar = "";
            }
            if (isset($data['pr'])) {
                $pr = $data['pr'];
            }else{
                $pr = "";
            }
            if (isset($data['tr'])) {
                $tr = $data['tr'];
            }else{
                $tr = "";
            }
            $data_array = array(
                'mr' => $mr, 
                'ar' => $ar, 
                'pr' => $pr, 
                'tr' => $tr,
                'patient_echo_id' => $patient_echo_id
            );
            $this->db->insert('patient_echo_color_doppler',$data_array);

        }else{
            $this->db->where('patient_echo_id', $patient_echo_id)->delete('patient_echo_measurement');
            $this->db->where('patient_id', $data['patient_id'])->delete('patient_echo');
            $this->db->insert('patient_echo', array('patient_id' => $data['patient_id'], 'measurement_cate_id' => $data['measurement_cate_id']));
            $patient_echo_id = $this->db->insert_id();

            for ($i = 0; $i < count($data['item_id']); $i++) {
                $item_id = $data['item_id'];
                $item_value = $data['item_value'];
                $measurement_value = $data['measurement_value'];
                if (!empty($item_value[$i])) {
                    $this->db->insert('patient_echo_measurement',
                        array(
                            'patient_echo_id' => $patient_echo_id,
                            'item_id' => $item_id[$i],
                            'item_value' => $item_value[$i],
                            'measurement_value' => $measurement_value[$i],
                        ));
                }
            }
        }
        
        return $patient_echo_id;
    }

    public function get_patient_measurement_by_category($category_id)
    {
        $result = $this->db->select('patient_echo_measurement.*,category_measurement.item')->from('patient_echo_measurement')
            ->join('category_measurement', 'category_measurement.id=patient_echo_measurement.item_id', 'left')
            ->where('patient_echo_id', "$category_id")->get();
        //echo $this->db->last_query(); die();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_patient_color_doppler($id){
        $result = $this->db->select('*')->from('patient_echo_color_doppler')
                        ->where('patient_echo_id', "$id")->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }


    public function get_main_category($category_id)
    {
        $result = $this->db->select('*')->from('echo_category')->where('id', "$category_id")->limit(1)->get();
        if ($result) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    public function get_disease_findings_diagnosis($disease_id)
    {
        $finddings = $this->db->select('disease_findings.*,structure_finding.name')->from('disease_findings')
            ->join('structure_finding', 'structure_finding.id=disease_findings.finding_id')
            ->where('disease_findings.disease_id', "$disease_id")
            ->group_by('disease_findings.finding_id')
            ->get();

        $diagnosis = $this->db->select('disease_diagnosis.*,diagnosis.name')->from('disease_diagnosis')
            ->join('diagnosis', 'diagnosis.id=disease_diagnosis.diagnosis_id')
            ->where('disease_diagnosis.disease_id', "$disease_id")
            ->group_by('disease_diagnosis.diagnosis_id')
            ->get();

        $data['findings'] = $finddings->result_array();
        $data['diagnosis'] = $diagnosis->result_array();
        return $data;
    }


    public function save_profile_echo_info($data)
    {
        // print_r($data); die();
        $patient_echo_id = $data['patient_id'];
        $disease_id = $data['disease_id'];
        if (isset($data['echo_detail_id_mmode']) && !empty($data['echo_detail_id_mmode'])) {
            $echo_deatil_id = $data['echo_detail_id_mmode'];
        } else {
            $this->db->insert('profile_echo_detail', array('patient_id' => $patient_echo_id));
            $echo_deatil_id = $this->db->insert_id();
        }
        $this->db->delete('profile_echo_measurement', array('patient_id' => $patient_echo_id, 'echo_detail_id' => $echo_deatil_id));
        $this->db->delete('profile_echo_findings', array('patient_id' => $patient_echo_id, 'echo_detail_id' => $echo_deatil_id));
        $this->db->delete('profile_echo_diagnosis', array('patient_id' => $patient_echo_id, 'echo_detail_id' => $echo_deatil_id));

        for ($i = 0; $i < count($data['item_id']); $i++) {
            $item_id = $data['item_id'];
            $item_value = $data['item_value'];
            $measurement_value = $data['measurement_value'];

            $this->db->insert('profile_echo_measurement',
                array(
                    'echo_detail_id' => $echo_deatil_id,
                    'patient_id' => $patient_echo_id,
                    'item_id' => $item_id[$i],
                    'item_value' => $item_value[$i],
                    'measurement_value' => $measurement_value[$i],
                ));
        }

        for ($i = 0; $i < count($data['disease_finding_id']); $i++) {
            $disease_finding_id = $data['disease_finding_id'];
            $disease_finding_value = $data['disease_finding_value'];
            $finding_structure_id = $data['finding_structure_id'];
            $this->db->insert('profile_echo_findings',
                array(
                    'echo_detail_id' => $echo_deatil_id,
                    'patient_id' => $patient_echo_id,
                    'finding_id' => $disease_finding_id[$i],
                    'finding_value' => $disease_finding_value[$i],
                    'disease_id' => $disease_id,
                    'structure_id' => $finding_structure_id[$i]
                ));
        }

        for ($i = 0; $i < count($data['disease_diagnosis_id']); $i++) {
            $disease_diagnosis_id = $data['disease_diagnosis_id'];
            $disease_diagnosis_value = $data['disease_diagnosis_value'];
            $diagnose_structure_id = $data['diagnose_structure_id'];
            $this->db->insert('profile_echo_diagnosis',
                array(
                    'echo_detail_id' => $echo_deatil_id,
                    'patient_id' => $patient_echo_id,
                    'diagnosis_id' => $disease_diagnosis_id[$i],
                    'diagnosis_value' => $disease_diagnosis_value[$i],
                    'disease_id' => $disease_id,
                    'structure_id' => $diagnose_structure_id[$i]
                ));
        }
        $this->db->where('echo_detail_id',$echo_deatil_id)->where('patient_id',$patient_echo_id)->delete('profile_echo_color_doopler');
        if (isset($data['doopler_mr'])) {
                $mr = $data['doopler_mr'];
            }else{
                $mr = "";
            }
            if (isset($data['doopler_ar'])) {
                $ar = $data['doopler_ar'];
            }else{
                $ar = "";
            }
            if (isset($data['doopler_pr'])) {
                $pr = $data['doopler_pr'];
            }else{
                $pr = "";
            }
            if (isset($data['doopler_tr'])) {
                $tr = $data['doopler_tr'];
            }else{
                $tr = "";
            }
        $data_array = array(
            'echo_detail_id' => $echo_deatil_id,
            'patient_id' => $patient_echo_id,
            'doopler_mr' => $mr,
            'doopler_ar' => $ar,
            'doopler_pr' => $pr,
            'doopler_tr' => $tr
        );
        $this->db->insert('profile_echo_color_doopler',$data_array);

        return $patient_echo_id;
    }


    function insert_ett_protocols($data, $id)
    {
        if (isset($data['stage_name']) && !empty($data['stage_name'])) {
            $name = $data['stage_name'];
            $speed = $data['stage_speed'];
            $grade = $data['stage_grade'];
            $time = $data['stage_time'];
            $mets = $data['stage_mets'];
            $hr = $data['stage_hr'];
            $sbp = $data['stage_sbp'];
            $dbp = $data['stage_dbp'];
            $condition = $data['stage_condition'];
            for ($j = 0; $j < count($name); $j++) {
                $result = $this->db->insert('patient_ett_test_protocol',
                    array(
                        'patient_ett_test_id' => $id,
                        'patient_id' => $data['pat_id'],
                        'protocol_id' => $data['protocol_id'],
                        'stage_name' => $name[$j],
                        'speed' => $speed[$j],
                        'grade' => $grade[$j],
                        'stage_time' => date('h:i', strtotime($time[$j])),
                        'mets' => $mets[$j],
                        'hr' => $hr[$j],
                        'sbp' => $sbp[$j],
                        'dbp' => $dbp[$j],
                        'protocol_condition' => $condition[$j]
                    ));

            }
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function get_echo_detail($patient_id)
    {
        $result = $this->db->select('*')->from('profile_echo_detail')->where('patient_id', $patient_id)->get();
        if ($result) {
            return $result->result_array();
        } else {
            return false;
        }
    }

    public function get_patient_measurement($patient_id, $detail_id)
    {

        $result = $this->db->select('profile_echo_measurement.*,category_measurement.item,echo_category.main_category')
            ->from('profile_echo_measurement')
            ->join('category_measurement', 'category_measurement.id=profile_echo_measurement.item_id', 'left')
            ->join('echo_category', 'echo_category.id=category_measurement.category_id', 'left')
            ->where('echo_detail_id', "$detail_id")
            ->where('patient_id', "$patient_id")
            ->get();
        //echo $this->db->last_query(); die();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function get_patient_echo_findings($patient_id, $detail_id)
    {

        $result = $this->db->select('profile_echo_findings.*,structure_finding.name,structure.name')
            ->from('profile_echo_findings')
            ->join('structure_finding', 'structure_finding.id=profile_echo_findings.finding_id', 'left')
            ->join('structure', 'structure.id=profile_echo_findings.structure_id', 'left')
            ->where('echo_detail_id', "$detail_id")
            ->where('patient_id', "$patient_id")
            ->get();
        //echo $this->db->last_query(); die();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function get_patient_echo_diagnosis($patient_id, $detail_id)
    {
        $result = $this->db->select('profile_echo_diagnosis.*,diagnosis.name')
            ->from('profile_echo_diagnosis')
            ->join('diagnosis', 'diagnosis.id=profile_echo_diagnosis.diagnosis_id', 'left')
            ->where('echo_detail_id', "$detail_id")
            ->where('patient_id', "$patient_id")
            ->get();
        //echo $this->db->last_query(); die();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_lab_test_detail($patient_id)
    {
        $result = $this->db->select('*')->from('patient_lab_test_info')->where('patient_id', $patient_id)->get();
        if ($result) {
            return $result->result_array();
        } else {
            return false;
        }
    }

    public function save_profile_examination_info($data)
    {
        $patient_id = $data['patient_id'];
        $next_visit_date = date('Y-m-d',strtotime($data['next_date_visit_form']));
        $result = $this->db->insert('profile_examination_detail', array('patient_id' => $patient_id, 'next_visit_date' =>$next_visit_date));
        $examination_detail_id = $this->db->insert_id();

        if (isset($data['history_item'])) {
            $history_item = $data['history_item'];
            $result = $this->db->insert('profile_examination_history', array('examination_detail_id' => $examination_detail_id, 'patient_id' => $patient_id, 'history_value' => $history_item));
        }

        if (isset($data['examination_item'])) {
            $examination_item = $data['examination_item'];
            $result = $this->db->insert('profile_examination_info',
                array('examination_detail_id' => $examination_detail_id,
                    'patient_id' => $patient_id, 'examination_value' => $examination_item));
        }

        if (isset($data['investigation_item'])) {
            $investigation_item = $data['investigation_item'];
            $result = $this->db->insert('profile_examination_investigation',
                array('examination_detail_id' => $examination_detail_id,
                    'patient_id' => $patient_id, 'investigation_value' => $investigation_item));
        }

        if (isset($data['medicine_value']) && !empty($data['medicine_value'])) {
            $medicine_value = $data['medicine_value'];
            foreach ($medicine_value as $value) {
                $result =  $this->db->insert('profile_examination_medicine',
                    array('examination_detail_id' => $examination_detail_id,
                        'patient_id' => $patient_id, 'medicine_value' => $value));
            }
        }
        if (isset($data['dosage_value'])) {
            $dosage_value = $data['dosage_value'];
            foreach ($dosage_value as $value) {
                $result =  $this->db->insert('profile_examination_dosage',
                    array('examination_detail_id' => $examination_detail_id,
                        'patient_id' => $patient_id, 'dosage_value' => $value));
            }
            
        }
        if (isset($data['instruction_item'])) {
            $instruction_item = $data['instruction_item'];
            $result = $this->db->insert('profile_examination_instruction',
                array('examination_detail_id'=>$examination_detail_id,
                    'patient_id' => $patient_id,'instruction_value'=>$instruction_item));
        }
        if (isset($data['advice_item'])) {
            $advice_item = $data['advice_item'];
            $result = $this->db->insert('profile_examination_advice',
                array('examination_detail_id'=>$examination_detail_id,
                    'patient_id' => $patient_id,'advice_value'=>$advice_item));
        }

        if (isset($data['examination_info_pulse'])||isset($data['examination_info_volume'])||isset($data['examination_info_volume'])||isset($data['examination_info_bpa'])||isset($data['examination_info_bpb'])||isset($data['examination_resp_rate'])||isset($data['examination_info_temp'])) {
            $data_array = array(
            'examination_detail_id' => $examination_detail_id, 
            'patient_id' => $patient_id, 
            'pulse' => $data['examination_info_pulse'], 
            'volume' => $data['examination_info_volume'], 
            'bp_a' => $data['examination_info_bpa'], 
            'bp_b' => $data['examination_info_bpb'], 
            'rr' => $data['examination_resp_rate'], 
            'temprature' => $data['examination_info_temp']
            );
            $result = $this->db->insert('profile_examination_measurements',$data_array);
        }
        
        if ($result) {
            return true;
        }else{
            return false;
        }

    }

        public function get_update_protocol_details_by_id($p_id,$detailid){
            $result = $this->db->select('*')->from('patient_ett_test_protocol')->where('protocol_id',$p_id)->where('patient_ett_test_id',$detailid)->get();
            if ($result) {
                return $result->result_array();
            }else{
                return array();
            }
        }

    public function get_ett_detail($patient_id)
    {
        $result = $this->db->select('*')->from('patient_ett_test')->where('patient_id', $patient_id)->get();
        if ($result) {
            return $result->result_array();
        } else {
            return false;
        }
    }

    public function get_ett_detail_by_ids($patient_id, $detail_id)
    {
        $result = $this->db->select('*')->from('patient_ett_test')->where('patient_id', $patient_id)
            ->where('id', $detail_id)
            ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return false;
        }
    }

    public function update_ett_test($data,$id)
    {
        $result = $this->db->where('id',$id)->update('patient_ett_test', $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function update_ett_protocols($data)
    {	$date = date('Y-m-d H:i:s');
        if (isset($data['details_id']) && !empty($data['details_id'])) {
        	$result = $this->db->delete('patient_ett_test_protocol', array('patient_ett_test_id' => $data['details_id']));
	        if ($result) {
	            $name = $data['stage_name'];
	            $speed = $data['stage_speed'];
	            $grade = $data['stage_grade'];
	            $time = $data['stage_time'];
	            $mets = $data['stage_mets'];
	            $hr = $data['stage_hr'];
	            $sbp = $data['stage_sbp'];
	            $dbp = $data['stage_dbp'];
	            $condition = $data['stage_condition'];
	            for ($j = 0; $j < count($name); $j++) {
	                $result = $this->db->insert('patient_ett_test_protocol',
	                    array(
	                        'patient_ett_test_id' => $data['details_id'],
	                        'patient_id' => $data['pat_id'],
	                        'protocol_id' => $data['protocol_id'],
	                        'stage_name' => $name[$j],
	                        'speed' => $speed[$j],
	                        'grade' => $grade[$j],
	                        'stage_time' => date('h:i', strtotime($time[$j])),
	                        'mets' => $mets[$j],
	                        'hr' => $hr[$j],
	                        'sbp' => $sbp[$j],
	                        'dbp' => $dbp[$j],
	                        'protocol_condition' => $condition[$j]
	                    ));

	            }
	            if ($result) {
	            	return true;
	            }else{
	            	return false;
	            }
	        } else {
	            return false;
	        }
        }
    }

    public function get_sp_inst_detail($patient_id)
    {
        $result = $this->db->select('*')->from('patient_special_instruction')->where('patient_id', $patient_id)->get();
        if ($result) {
            return $result->result_array();
        } else {
            return false;
        }
    }

    public function get_examination_detail($patient_id)
    {
        $result = $this->db->select('*')->from('profile_examination_detail')->where('patient_id', $patient_id)->get();
        if ($result) {
            return $result->result_array();
        } else {
            return false;
        }
    }
    public function delete_examination($testid,$patid){
        $result = $this->db->where('id',$testid)->where('patient_id',$patid)->delete('profile_examination_detail');
        $result = $this->db->where('examination_detail_id',$testid)->where('patient_id',$patid)->delete('profile_examination_info');
        $result = $this->db->where('examination_detail_id',$testid)->where('patient_id',$patid)->delete('profile_examination_advice');
        $result = $this->db->where('examination_detail_id',$testid)->where('patient_id',$patid)->delete('profile_examination_dosage');
        $result = $this->db->where('examination_detail_id',$testid)->where('patient_id',$patid)->delete('profile_examination_history');
        $result = $this->db->where('examination_detail_id',$testid)->where('patient_id',$patid)->delete('profile_examination_instruction');
        $result = $this->db->where('examination_detail_id',$testid)->where('patient_id',$patid)->delete('profile_examination_investigation');
        $result = $this->db->where('examination_detail_id',$testid)->where('patient_id',$patid)->delete('profile_examination_measurements');
        $result = $this->db->where('examination_detail_id',$testid)->where('patient_id',$patid)->delete('profile_examination_medicine');
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    public function update_profile_examination_info($data)
    {

        $patient_id = $data['patient_id'];
        $testid = $data['examination_testid'];
        $next_visit_date = date('Y-m-d',strtotime($data['next_date_visit_form']));
        $result = $this->db->set('next_visit_date',$next_visit_date)->where('id',$testid)->update('profile_examination_detail');

        if (isset($data['exe_history_id']) && $data['exe_history_id']!="") {
            $history_item = $data['history_item'];
            $result = $this->db->set('history_value',$history_item)->where('id',$data['exe_history_id'])->update('profile_examination_history');
        }else{
            $history_item = $data['history_item'];
            $result = $this->db->insert('profile_examination_history', array('examination_detail_id' => $testid, 'patient_id' => $patient_id, 'history_value' => $history_item));
        }

        if (isset($data['examination_id']) && $data['examination_id']) {
            $examination_item = $data['examination_item'];
            $result = $this->db->set('examination_value' , $examination_item)
                            ->where('id',$data['examination_id'])->update('profile_examination_info');
        }else{
            $examination_item = $data['examination_item'];
            $result = $this->db->insert('profile_examination_info',
                array('examination_detail_id' => $testid,
                    'patient_id' => $patient_id, 'examination_value' => $examination_item));
        }

        if (isset($data['investigation_id']) && $data['investigation_id']!="") {
            $investigation_item = $data['investigation_item'];
            $result = $this->db->set('investigation_value',$investigation_item)
                            ->where('id',$data['investigation_id'])->update('profile_examination_investigation');
        }else{
            $investigation_item = $data['investigation_item'];
            $result = $this->db->insert('profile_examination_investigation',
                array('examination_detail_id' => $testid,
                    'patient_id' => $patient_id, 'investigation_value' => $investigation_item));
        }

        if (isset($data['medicine_value']) && !empty($data['medicine_value'])) {
            $this->db->where('examination_detail_id',$testid)->where('patient_id',$patient_id)
                            ->delete('profile_examination_medicine');
            $medicine_value = $data['medicine_value'];
            foreach ($medicine_value as $value) {
                $result =  $this->db->insert('profile_examination_medicine',
                    array('examination_detail_id' => $testid,
                        'patient_id' => $patient_id, 'medicine_value' => $value));
            }
        }
        if (isset($data['dosage_value']) && !empty($data['dosage_value'])) {
            $this->db->where('examination_detail_id',$testid)->where('patient_id',$patient_id)
                            ->delete('profile_examination_dosage');
            $dosage_value = $data['dosage_value'];
            foreach ($dosage_value as $value) {
                $result =  $this->db->insert('profile_examination_dosage',
                    array('examination_detail_id' => $testid,
                        'patient_id' => $patient_id, 'dosage_value' => $value));
            }
            
        }
        if (isset($data['instruction_id']) && $data['instruction_id']!= "") {
            $instruction_item = $data['instruction_item'];
            $result = $this->db->set('instruction_value',$instruction_item)->where('id',$data['instruction_id'])
                                ->update('profile_examination_instruction');
        }else{
            $instruction_item = $data['instruction_item'];
            $result = $this->db->insert('profile_examination_instruction',
                array('examination_detail_id'=>$testid,
                    'patient_id' => $patient_id,'instruction_value'=>$instruction_item));
        }
        if (isset($data['advice_id']) && $data['advice_id'] != "") {
            $advice_item = $data['advice_item'];
            $result = $this->db->set('advice_value',$advice_item)->where('id',$data['advice_id'])
                            ->update('profile_examination_advice');
        }else{
            $advice_item = $data['advice_item'];
            $result = $this->db->insert('profile_examination_advice',
                array('examination_detail_id'=>$testid,
                    'patient_id' => $patient_id,'advice_value'=>$advice_item));
        }

        if (isset($data['exem_measurement_id']) && $data['exem_measurement_id']!="") {
            $data_array = array(
            'examination_detail_id' => $testid, 
            'patient_id' => $patient_id, 
            'pulse' => $data['examination_info_pulse'], 
            'volume' => $data['examination_info_volume'], 
            'bp_a' => $data['examination_info_bpa'], 
            'bp_b' => $data['examination_info_bpb'], 
            'rr' => $data['examination_resp_rate'], 
            'temprature' => $data['examination_info_temp']
            );
            $result = $this->db->where('id',$data['exem_measurement_id'])
                                ->update('profile_examination_measurements',$data_array);
        }else{
            $data_array = array(
            'examination_detail_id' => $testid, 
            'patient_id' => $patient_id, 
            'pulse' => $data['examination_info_pulse'], 
            'volume' => $data['examination_info_volume'], 
            'bp_a' => $data['examination_info_bpa'], 
            'bp_b' => $data['examination_info_bpb'], 
            'rr' => $data['examination_resp_rate'], 
            'temprature' => $data['examination_info_temp']
            );
            $result = $this->db->insert('profile_examination_measurements',$data_array);
        }
        
        if ($result) {
            return true;
        }else{
            return false;
        }

    }

    public function save_finding_diagnosis_by_structure($data_a,$data_b){

        if (empty($data_a) && !empty($data_b)) {
            $this->db->truncate('echo_findings_by_structure');
            $this->db->truncate('echo_diagnosis_by_structure');
            $this->db->insert_batch('echo_diagnosis_by_structure',$data_b);
        }else if(empty($data_b) && !empty($data_a)){
            $this->db->truncate('echo_findings_by_structure');
            $this->db->truncate('echo_diagnosis_by_structure');
            $this->db->insert_batch('echo_findings_by_structure',$data_a);
        }else if(empty($data_a) && empty($data_b)){
            $this->db->truncate('echo_findings_by_structure');
            $this->db->truncate('echo_diagnosis_by_structure');
        }else{
            $this->db->truncate('echo_findings_by_structure');
            $this->db->truncate('echo_diagnosis_by_structure');
            $this->db->insert_batch('echo_findings_by_structure',$data_a);
            $this->db->insert_batch('echo_diagnosis_by_structure',$data_b);
        }
       
        $findings_structure = $this->db->select('*')->from('echo_findings_by_structure')->get();
        $diagnosis_structure = $this->db->select('*')->from('echo_diagnosis_by_structure')->get();
        if ($findings_structure) {
            $data['findings'] = $findings_structure->result_array();
        }else{
            $data['findings'] = array();
        }
        if ($diagnosis_structure) {
            $data['diagnosis'] = $diagnosis_structure->result_array();
        }else{
            $data['diagnosis'] = array();
        }
        return $data;
    }

    public function get_patient_echo_color_doopler($pId,$dId){
        $result = $this->db->select('*')->where('echo_detail_id',$dId)->where('patient_id',$pId)
                            ->get('profile_echo_color_doopler');
        if ($result) {
            return $result->result_array();
        }else{
            return array();
        }
    }

    public function delete_echo_test_details($testid,$patid){
        $result = $this->db->where('id',$testid)->where('patient_id',$patid)->delete('profile_echo_detail');
        $result = $this->db->where('echo_detail_id',$testid)->where('patient_id',$patid)->delete('profile_echo_measurement');
        $result = $this->db->where('echo_detail_id',$testid)->where('patient_id',$patid)->delete('profile_echo_findings');
        $result = $this->db->where('echo_detail_id',$testid)->where('patient_id',$patid)->delete('profile_echo_diagnosis');
        $result = $this->db->where('echo_detail_id',$testid)->where('patient_id',$patid)->delete('profile_echo_color_doopler');
        if ($result) {
            return true;
        }else{
            return false;
        }
    }

    public function get_patient_in_history($filter){
        $result = $this->db->select('patient_id')->from('profile_examination_history')->like('history_value',$filter)->get();
        if ($result->num_rows()>0) {
            $ids = $result->result_array();
            $data_array = array();
            foreach ($ids as $id) {
                $data_array[] = $id['patient_id'];
            }
            $patids = array_unique($data_array);
            $patients = $this->db->select('*')->where_in('id',$patids)->get('patient_profile');
            if ($patients) {
                return $patients->result_array();
            }else{
                return array();
            }
        }else{
            return array();
        }
        
    }

    public function get_patient_in_examination($filter){
        $result = $this->db->select('patient_id')->from('profile_examination_info')->like('examination_value',$filter)->get();
        if ($result->num_rows()>0) {
            $ids = $result->result_array();
            $data_array = array();
            foreach ($ids as $id) {
                $data_array[] = $id['patient_id'];
            }
            $patids = array_unique($data_array);
            $patients = $this->db->select('*')->where_in('id',$patids)->get('patient_profile');
            if ($patients) {
                return $patients->result_array();
            }else{
                return array();
            }
        }else{
            return array();
        }
        
    }

    public function get_patient_in_investigation($filter){
        $result = $this->db->select('patient_id')->from('profile_examination_investigation')->like('investigation_value',$filter)->get();
        if ($result->num_rows()>0) {
            $ids = $result->result_array();
            $data_array = array();
            foreach ($ids as $id) {
                $data_array[] = $id['patient_id'];
            }
            $patids = array_unique($data_array);
            $patients = $this->db->select('*')->where_in('id',$patids)->get('patient_profile');
            if ($patients) {
                return $patients->result_array();
            }else{
                return array();
            }
        }else{
            return array();
        }
        
    }

    public function get_patient_in_advice($filter){
        $result = $this->db->select('patient_id')->from('profile_examination_advice')->like('advice_value',$filter)->get();
        if ($result->num_rows()>0) {
            $ids = $result->result_array();
            $data_array = array();
            foreach ($ids as $id) {
                $data_array[] = $id['patient_id'];
            }
            $patids = array_unique($data_array);
            $patients = $this->db->select('*')->where_in('id',$patids)->get('patient_profile');
            if ($patients) {
                return $patients->result_array();
            }else{
                return array();
            }
        }else{
            return array();
        }
        
    }

    public function get_patient_in_medicine($filter){
        $result = $this->db->select('patient_id')->from('profile_examination_medicine')
                        ->like('medicine_value',$filter)->get();

        if ($result->num_rows()>0) {
            $ids = $result->result_array();
            $data_array = array();
            foreach ($ids as $id) {
                $data_array[] = $id['patient_id'];
            }
            $patids = array_unique($data_array);
            $patients = $this->db->select('*')->where_in('id',$patids)->get('patient_profile');
            if ($patients) {
                return $patients->result_array();
            }else{
                return array();
            }
        }else{
            return array();
        }
        
    }

    public function save_file_profile($name,$patid,$category){
        $data_array = array(
            'patient_id' => $patid,
            'category' => $category,
            'file_name' => $name,
        );
        $result = $this->db->insert('patient_files',$data_array);
        if ($result) {
            return true;
        }else{
            return false;
        }

    }

    public function paitnet_vitals_by_id($id){
        $result = $this->db->select('*')->where('patient_id',$id)->limit(1)->order_by('patient_id',"DESC")
            ->get('patient_vitals');
        if ($result) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function get_last_visit_patient($date){
        $visit_date = date('Y-m-d',strtotime($date));
        $result = $this->db->select('patient_id')->from('profile_examination_detail')
                        ->where('next_visit_date',$visit_date)->get();

        if ($result->num_rows()>0) {
            $ids = $result->result_array();
            $data_array = array();
            foreach ($ids as $id) {
                $data_array[] = $id['patient_id'];
            }
            $patids = array_unique($data_array);
            $patients = $this->db->select('*')->where_in('id',$patids)->get('patient_profile');
            if ($patients) {
                return $patients->result_array();
            }else{
                return array();
            }
        }else{
            return array();
        }
    }

    public function profile_searchin($data){
        if ($data == 'ett') {
            $result = $this->db->select('patient_id')->from('patient_ett_test')->get();
            if ($result->num_rows()>0) {
                $ids = $result->result_array();
                $data_array = array();
                foreach ($ids as $id) {
                    $data_array[] = $id['patient_id'];
                }
                $patids = array_unique($data_array);
                $patients = $this->db->select('*')->where_in('id',$patids)->get('patient_profile');
                if ($patients) {
                    return $patients->result_array();
                }else{
                    return array();
                }
            }else{
                return array();
            }
        }else{
            $result = $this->db->select('patient_id')->from('profile_echo_detail')->get();
            if ($result->num_rows()>0) {
                $ids = $result->result_array();
                $data_array = array();
                foreach ($ids as $id) {
                    $data_array[] = $id['patient_id'];
                }
                $patids = array_unique($data_array);
                $patients = $this->db->select('*')->where_in('id',$patids)->get('patient_profile');
                if ($patients) {
                    return $patients->result_array();
                }else{
                    return array();
                }
            }else{
                return array();
            }
        }
    }

    public function get_image_files($id){
        $result = $this->db->select('*')->where('patient_id',$id)->get('patient_files');
        if ($result) {
            return $result->result_array();
        }else{
            return array();
        }
    }

    public function delete_file($id){
        $result = $this->db->where('id',$id)->delete('patient_files');
        if ($result) {
            return true;
        }else{
            return true;
        }
    }


}


?>
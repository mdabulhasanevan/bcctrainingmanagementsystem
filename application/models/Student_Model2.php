<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student_Model
 *
 * @author Evan DU
 */
class Student_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function GetAllStudent($id) {

        $result = $this->db->query("SELECT s.*,b.Batch FROM Student as s "
                        . "LEFT join batch b on b.Id=s.BatchID WHERE s.BatchID=$id")->result();
        return $result;
    }

    public function AddStudent($Data) {

        $search = array(
            "BatchID" => $Data->BatchID,
            "RegNO" => $Data->RegNO
        );

        $this->db->where($search);
        $countStudent = $this->db->count_all_results('Student');

        if ($countStudent == 0) {
            $result = $this->db->insert("Student", $Data);
            $result2 = "Added";
            return $result2;
        } else {
            $result2 = "Already Exist this RegNO";
            return $result2;
        }
    }

    public function DeleteStudent($id) {
        $result = $this->db->delete("Student", array('SID' => $id));
        return $result;
    }

    public function UpdateStudent($Post) {
        $data = array(
            "Name" => $Post->Name,
            "RegNO" => $Post->RegNO,
            "BatchID" => $Post->BatchID,
            "Mobile" => $Post->Mobile,
            "Email" => $Post->Email,
        );

        $search = array(
            "BatchID" => $Post->BatchID,
            "RegNO" => $Post->RegNO
        );

        $this->db->where($search);
        $countStudent = $this->db->count_all_results('Student');

        if ($countStudent == 0) {
            $this->db->where(array('SID' => $Post->SID));
            $result = $this->db->update("Student", $data);
            $result2 = "Updated";
            return $result2;
        } else {
            $result2 = "Already Exist this RegNO";
            return $result2;
        }
    }

    public function LoginApproval($RegNo) {
        $this->db->where(array("RegNO" => $RegNo));
        $countStudent = $this->db->count_all_results('Student');

        if ($countStudent > 0) {
            $this->db->where(array("RegNO" => $RegNo));
            $Student = $this->db->get("student")->row();

            $this->db->where(array("BatchID" => $Student->BatchID));
            $Status = $this->db->get("setexam")->row();

            if ($Status->Status == 1) {
                return $Student;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

}

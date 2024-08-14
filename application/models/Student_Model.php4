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

        $result = $this->db->query("SELECT s.*,b.Batch FROM student as s "
                        . "LEFT join batch b on b.Id=s.BatchID WHERE s.BatchID=$id")->result();
        return $result;
    }

    public function AddStudent($Data) {

        $search = array(
            "BatchID" => $Data->BatchID,
            "RegNO" => $Data->RegNO
        );

        $this->db->where($search);
        $countStudent = $this->db->count_all_results('student');

        if ($countStudent == 0) {
            $result = $this->db->insert("student", $Data);
            $result2 = "Added";
            return $result2;
        } else {
            $result2 = "Already Exist this RegNO";
            return $result2;
        }
    }

    public function DeleteStudent($id) {
        $result = $this->db->delete("student", array('SID' => $id));
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

      
            $this->db->where(array('SID' => $Post->SID));
            $result = $this->db->update("student", $data);
            $result2 = "Updated";
            return $result2;
       
    }

    public function LoginApproval($RegNo,$Mobile) {
        
        $search=array("RegNO" => $RegNo,"Mobile"=>$Mobile);
        
        $this->db->where($search);
        $countStudent = $this->db->count_all_results('student');
        
       

        if ($countStudent > 0) {
            $this->db->where(array("RegNO" => $RegNo));
            $Student = $this->db->get("student")->row();

            //Check status is Active or not
            $this->db->where(array("BatchID" => $Student->BatchID, "Status"=>'1'));
            $Status = $this->db->get("setexam")->row();

         //for check is he seat exam for this same exam set collection
        $searchCollection=array("UserID" => $Student->SID,"ExamCollectionID"=>$Status->ExamCollectionID);
         $this->db->where($searchCollection);
        $countStudentAlreadyExamThisCollection = $this->db->count_all_results('examresult');
            
            
            if ($Status->Status == 1 &&$countStudentAlreadyExamThisCollection==0 ) {
                return $Student;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

}

<?php

/**
 * Description of Setting_Model
 *
 * @author Evan DU
 */
class PublicExam_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    #regionBatch
    public function GetAllBatch() {
       // $result = $this->db->get("batch")->result();
          $result = $this->db->query("SELECT b.*, OzBy.*,  (if(b.Status=1,'Not Start Yet',if(b.Status=2,'Running',if(b.Status=3,'Completed','Unknown'))))as StatusName, ct.Title as CourseTitleName, bt.TypeName, s.FiscalYear,s2.CalenderYear, bdt.Type as DurationTypeName FROM batch as b left join batchtype bt on bt.ID=b.BatchType left join CourseTitle ct on ct.ID=b.CourseTitle left join OrganizedBy OzBy on b.OrganizedBy=OzBy.ID left join batch_duration_type bdt on bdt.BDID=b.DurationType left join session s on s.SID=b.SessionFiscal left join session s2 on s2.SID=b.SessionCalendar where b.isPublic=1 order by b.Id desc")->result();
        return $result;
    }

    public function DeleteBatch($id) {
        $result = $this->db->delete("batch", array('Id' => $id));
        return $result;
    }

    public function AddBatch($Batch) {
        $result = $this->db->insert("batch", $Batch);
        return $result;
    }

    public function UpdateBatch($Batch) {
        $data = array(
            "CourseTitle" => $Batch->CourseTitle,
            "Batch" => $Batch->Batch,
            "CourseFee" => $Batch->CourseFee,
            "BatchType" => $Batch->BatchType,
            "ExamNumber" => $Batch->ExamNumber,
             "Details" => $Batch->Details,
             "OrganizedBy" => $Batch->OrganizedBy,
             
             "SessionFiscal" => $Batch->SessionFiscal,
             "SessionCalendar" => $Batch->SessionCalendar,
             "StartDate" => $Batch->StartDate,
             "EndDate" => $Batch->EndDate,
             "DurationType" => $Batch->DurationType,
             "DurationHour" => $Batch->DurationHour,
              "Status" => $Batch->Status,
              "StartTime" => $Batch->StartTime,
              "EndTime" => $Batch->EndTime,
              "ClassDay" => $Batch->ClassDay,
        );
        $this->db->where(array('Id' => $Batch->Id));
        $result = $this->db->update("batch", $data);

        //$result = $this->db->get("batch")->result();
        return $result;
    }
    
    public function GetAllExamTypeField() {
       
        $batch = $this->db->query("SELECT * from batch where isPublic=1 order by Id desc")->result();
        $participant_type = $this->db->get("participant_type")->result();
        $AdmissionBatch = $this->db->query("SELECT * FROM AdmissionSetup where AdmissionSetup.Status=1 order by AdmissionSetup.AdmissionSetID desc")->result();

        $data = array(
            "batch" => $batch,
            "participant_type" => $participant_type,
            "AdmissionBatch" => $AdmissionBatch,
          
        );
        return $data;
    }
    
    public function AddStudent($Data) {

        $search = array(
            "BatchID" => $Data->BatchID,
            "Mobile" => $Data->Mobile,
            "Email"=> $Data->Email,
        );
        

        $this->db->where($search);
        $countStudent = $this->db->count_all_results('student');

        if ($countStudent == 0) {
            $result = $this->db->insert("student", $Data);
            $result2 = 1;
            return $result2;
        } else {
            $result2 = 2;
            return $result2;
        }
    }
    
    public function LoginApproval($RegNo, $Mobile) {

        $search = array("RegNO" => $RegNo, "Mobile" => $Mobile, "StudentStatus"=>1);

        //check student exist
        $this->db->where($search);
        $countStudent = $this->db->count_all_results('student');


        // if student count greater than 0 then get the student
        if ($countStudent > 0) {
            $this->db->where(array("RegNO" => $RegNo));
            $Student = $this->db->get("student")->row();

           

            $data=array(
                "Student"=>$Student
                
            );
             return $data;
           
           /*
            //Check status is Active or not from setexam table 1 for active, 2 =inactive, 3 for examed
            $this->db->where(array("BatchID" => $Student->BatchID, "Status" => '1'));
            $Status = $this->db->get("setexam")->row();

            //if any active exam exist
            if (isset($Status->ExamCollectionID)) {
                //for checking: is the student already attend this active exam: from examresult table
                $searchCollection = array("UserID" => $Student->SID, "ExamCollectionID" => $Status->ExamCollectionID);
                $this->db->where($searchCollection);
                $countStudentAlreadyExamThisCollection = $this->db->count_all_results('examresult');

                if ($Status->Status == 1 && $countStudentAlreadyExamThisCollection == 0) {
                    return $Student;
                } else {
                    return null;
                }
            } else {
                return null;
            }*/
           
           
           
        } else {
            return null;
        }
    }
    #end region
    
   
    
}
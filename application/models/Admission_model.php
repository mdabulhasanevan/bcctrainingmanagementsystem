<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admission_model
 *
 * @author Evan DU
 */
class Admission_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    
 #Admission Setup Start   
     public function GetAllCourseAdmission($CourseID) {
         $result = $this->db->query("SELECT * FROM AdmissionSetup ads WHERE ads.CourseID=$CourseID ORDER BY ads.AdmissionSetID DESC")->result();
        return $result;
    }

    public function DeleteCourseAdmission($id) {
        $result = $this->db->delete("AdmissionSetup", array('AdmissionSetID' => $id));
        return $result;
    }

    public function AddAdmissionSetup($AdmissionSetup) {
        $result = $this->db->insert("AdmissionSetup", $AdmissionSetup);
        return $result;
    }

    public function UpdateAdmissionSetup($AdmissionSetup) {
        $data = array(
            "CourseID" => $AdmissionSetup->CourseID,
            "BatchName" => $AdmissionSetup->BatchName,
            "AdmissionDetail" => $AdmissionSetup->AdmissionDetail,
            "AvailableSeats" => $AdmissionSetup->AvailableSeats,
            "AdmissionStartDate" => $AdmissionSetup->AdmissionStartDate,
            "AdmissionEndDate" => $AdmissionSetup->AdmissionEndDate,
            "AdmissionFee" => $AdmissionSetup->AdmissionFee,
            "AgeLimit" => $AdmissionSetup->AgeLimit,
            "Requirements" => $AdmissionSetup->Requirements,
            "PreExam" => $AdmissionSetup->PreExam,
            "PaymentPolicy" => $AdmissionSetup->PaymentPolicy,
            "Status" => $AdmissionSetup->Status,
        );
        
        $this->db->where(array('AdmissionSetID' => $AdmissionSetup->AdmissionSetID));
        $result = $this->db->update("AdmissionSetup", $data);
        return $result;
    }
    
    # Admission Setup End
    
    
    #Admission Public Side
    public function GetAllAdmissionTypeField() {
        $participant_type = $this->db->get("participant_type")->result();
        $AdmissionBatch = $this->db->query("SELECT * FROM AdmissionSetup where AdmissionSetup.Status=1 order by AdmissionSetup.AdmissionSetID desc")->result();
        $districts = $this->db->query("SELECT * FROM districts")->result();
        $upazilas = $this->db->query("SELECT * FROM upazilas")->result();
        $AcademicQualification = $this->db->query("SELECT * FROM AcademicQualification")->result();
        
        $data = array(
            "participant_type" => $participant_type,
            "AdmissionBatch" => $AdmissionBatch,
            "districts" => $districts,
            "upazilas" => $upazilas,
             "AcademicQualification" => $AcademicQualification,
        );
        return $data;
    }
    
    public function AddStudentForAdmission($Data) {

        $search = array(
            "BatchID" => $Data->BatchID,
            "Mobile" => $Data->Mobile,
        );
        
        $this->db->where($search);
        $countStudent = $this->db->count_all_results('AdmissionRegistration');

        if ($countStudent == 0) {
            
            
            $result = $this->db->insert("AdmissionRegistration", $Data);
            $AdmissionBatchNameText = $this->db->query("SELECT BatchName, AdmissionFee FROM AdmissionSetup where AdmissionSetID=$Data->BatchID")->row();

            
            $result2 = array(
             "BatchInfo" =>$AdmissionBatchNameText,
             "Status" => 1
            );
            return $result2;
        } else {
            $result2 = array(
             "BatchInfo" =>null,
             "Status" => 2
            );
            return $result2;
        }
    }
    #End Admission Public
    
     #Admission Registration Start   
     
      
     
    public function GetAllAdmissionBatch() {
         $BatchList = $this->db->query("SELECT * FROM AdmissionSetup ORDER BY AdmissionSetID DESC")->result();
         $ParticapantList = $this->db->query("SELECT * FROM participant_type")->result();
         
         $result=array(
             "BatchList" =>$BatchList,
             "ParticapantList" =>$ParticapantList,
             );
         
        return $result;
    }
    
    public function GetAllAdmissionRegistrationList($AdmissionSetID) {
         $result = $this->db->query("SELECT dst.name as DistrictName, upa.name as UpazilaName, IF(s.IsCertified=0,'NO','Yes') as IsCertifiedText, AQ.ExamName, bt.TypeName,if(s.StudentStatus=1,'Active','Inactive') as StudentStatus2 , if(b.Status=1,'Not Started',if(b.Status=2,'Running', 'Completed')) as Status2, ct.Title, ob.OrganizationName, b.CourseTitle, s.*, s.RegNO as tempregNO, s.CertificateNo as Certificate2 , if(s.IsPhysicalDisable=0,'NO','YES') as IsDisable, if(s.IsCertified=0,'0','1') as IsCertified, b.* , bt.TypeName as BatchTypeName, pt.TypeName as ParticipentTypeName, s1.FiscalYear,s2.CalenderYear, bdt.Type as DurationTypeName, s.CourseFee as CourseFee FROM AdmissionRegistration as s LEFT join batch b on b.Id=s.BatchID left join batchtype bt on bt.ID=b.BatchType left join CourseTitle ct on ct.ID=b.CourseTitle LEFT JOIN OrganizedBy ob on ob.ID=b.OrganizedBy left join batch_duration_type bdt on bdt.BDID=b.DurationType left join districts dst on dst.id=s.district left join upazilas upa on upa.id=s.upazila left join session s1 on s1.SID=b.SessionFiscal left join session s2 on s2.SID=b.SessionCalendar left join participant_type pt on pt.ID=s.ParticipantType left JOIN AcademicQualification AQ on AQ.AQID=s.AcademicQualification WHERE s.BatchID=$AdmissionSetID order by RegNO")->result();
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
            $result2 = "Already Existed this Reg NO";
            return $result2;
        }
    }
    
     public function UpdateStudent($Post) {
       
     if($Post->Photo!=null)
     {
         $data = array(
            "Name" => $Post->Name,
            "RegNO" => $Post->RegNO,
            "BatchID" => $Post->BatchID,
            "Mobile" => $Post->Mobile,
            "Email" => $Post->Email,
            "Session" => $Post->Session,
            "CalendarYear" => $Post->CalendarYear,
            "Gender" => $Post->Gender,
            "IsCertified" => $Post->IsCertified,
            "CertificateNo" => $Post->CertificateNo,
            "IsPhysicalDisable" => $Post->IsPhysicalDisable,
            "PhysicalDetail" => $Post->PhysicalDetail,
            "ParticipantType" => $Post->ParticipantType,
            "CourseFee" => $Post->CourseFee,
             "StudentStatus" => $Post->StudentStatus,
            "Photo" => $Post->Photo
          );
     }
     else
     {
           $data = array(
            "Name" => $Post->Name,
            "RegNO" => $Post->RegNO,
            "BatchID" => $Post->BatchID,
            "Mobile" => $Post->Mobile,
            "Email" => $Post->Email,
            "Session" => $Post->Session,
            "CalendarYear" => $Post->CalendarYear,
            "Gender" => $Post->Gender,
            "IsCertified" => $Post->IsCertified,
            "CertificateNo" => $Post->CertificateNo,
            "IsPhysicalDisable" => $Post->IsPhysicalDisable,
            "PhysicalDetail" => $Post->PhysicalDetail,
            "ParticipantType" => $Post->ParticipantType,
            "CourseFee" => $Post->CourseFee,
             "StudentStatus" => $Post->StudentStatus
            
          );
     }
                    
        
                $this->db->where(array('SID' => $Post->SID));
                $result = $this->db->update("AdmissionRegistration", $data);
                $result2 = "Updated";
                return $result2;
     
       
       
    }
    
    public function DeleteStudent($id) {
        $result = $this->db->delete("AdmissionRegistration", array('SID' => $id));
        return $result;
    }
    
     # Admission Registration End
}

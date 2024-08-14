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
class Student_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function GetAllStudent($id)
    {
        if ($id > 0) {
            $result = $this->db
                ->query(
                    "SELECT dst.name as DistrictName, upa.name as UpazilaName, IF(s.IsCertified=0,'NO','Yes') as IsCertifiedText, AQ.ExamName, bt.TypeName,if(s.StudentStatus=1,'Active','Inactive') as StudentStatus2 , if(b.Status=1,'Not Started',if(b.Status=2,'Running', 'Completed')) as Status2, ct.Title, ob.OrganizationName, b.CourseTitle, s.*, s.RegNO as tempregNO, s.CertificateNo as Certificate2 , if(s.IsPhysicalDisable=0,'NO','YES') as IsDisable, if(s.IsCertified=0,'0','1') as IsCertified, b.* , bt.TypeName as BatchTypeName, pt.TypeName as ParticipentTypeName, s1.FiscalYear,s2.CalenderYear, bdt.Type as DurationTypeName, s.CourseFee as Fee FROM student as s LEFT join batch b on b.Id=s.BatchID left join batchtype bt on bt.ID=b.BatchType left join CourseTitle ct on ct.ID=b.CourseTitle LEFT JOIN OrganizedBy ob on ob.ID=b.OrganizedBy left join batch_duration_type bdt on bdt.BDID=b.DurationType left join districts dst on dst.id=s.district left join upazilas upa on upa.id=s.upazila left join session s1 on s1.SID=b.SessionFiscal left join session s2 on s2.SID=b.SessionCalendar left join participant_type pt on pt.ID=s.ParticipantType left JOIN AcademicQualification AQ on AQ.AQID=s.AcademicQualification WHERE s.BatchID=$id order by RegNO"
                )
                ->result();
            return $result;
        }
    }

    public function GetAllStudentForDahsboardSearch($id)
    {
        $result = $this->db
            ->query(
                "SELECT s.*, s.CertificateNo as Certificate2 , if(s.IsPhysicalDisable=0,'NO','YES') as IsDisable, if(s.IsCertified=0,'0','1') as IsCertified, b.* , bt.TypeName as BatchTypeName, pt.TypeName as ParticipentTypeName, s1.FiscalYear,s2.CalenderYear, bdt.Type as DurationTypeName, s.CourseFee as Fee FROM student as s LEFT join batch b on b.Id=s.BatchID left join batchtype bt on bt.ID=b.BatchType left join batch_duration_type bdt on bdt.BDID=b.DurationType left join session s1 on s1.SID=b.SessionFiscal left join session s2 on s2.SID=b.SessionCalendar left join participant_type pt on pt.ID=s.ParticipantType WHERE s.Name LIKE '%$id%' or s.RegNO LIKE '%$id%' or s.Mobile LIKE '%$id%' or b.Batch LIKE '%$id%' LIMIT 10"
            )
            ->result();
        return $result;
    }

    public function AddStudent($Data)
    {
        $search = [
            "BatchID" => $Data->BatchID,
            "RegNO" => $Data->RegNO,
        ];

        $this->db->where($search);
        $countStudent = $this->db->count_all_results("student");

        if ($countStudent == 0) {
            $result = $this->db->insert("student", $Data);
            $result2 = "Added";
            return $result2;
        } else {
            $result2 = "Already Existed this Reg NO";
            return $result2;
        }
    }

    public function DeleteStudent($id)
    {
        $this->db->query("INSERT into StudentbackupData SELECT * from student WHERE SID=$id");
        $result = $this->db->delete("student", ["SID" => $id]);
        return $result;
    }

    public function CountStudentsByBatch($id)
    {
        //Like ICAP 20 has 20 students
        $result = $this->db
            ->query(
                "SELECT COUNT(SID) as Count FROM `student` WHERE BatchID=$id"
            )
            ->row();
        return $result->Count;
    }

    public function GetIndividualExamResult($id)
    {
        $data = [
            "Result" => $this->db
                ->query(
                    "SELECT exn.ExamName, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, er.Theory,er.Practical,((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE st.SID=$id and se.Status=3 ORDER BY er.ERId"
                )
                ->result(),
            "GrandResult" => $this->db
                ->query(
                    "SELECT b.ExamNumber, COUNT(er.ERId) ExamAttend, IF(COUNT(er.ERId)=b.ExamNumber,'Passed','Failed') as Grandtotal, 
(SUM(((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical))/ b.ExamNumber) as Number , if((SUM(((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical))/ b.ExamNumber)>=80,'A+',if((SUM(((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical))/ b.ExamNumber)>=70,'A',if((SUM(((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical))/ b.ExamNumber)>=60,'A-',if((SUM(((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical))/ b.ExamNumber)>=50,'B',if((SUM(((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical))/ b.ExamNumber)>=40,'C','F'))))) as GPA  FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID  WHERE st.SID=$id and se.Status=3 GROUP BY st.SID"
                )
                ->row(),
        ];
        return $data;
    }

    public function UpdateStudent($Post)
    {
        $search = [
            "BatchID" => $Post->BatchID,
            "RegNO" => $Post->RegNO,
        ];

        $this->db->where($search);
        $countStudent = $this->db->count_all_results("student");

        if ($countStudent == 0 || $Post->RegNO == $Post->tempregNO) {
            if ($Post->Photo != null) {
                $data = [
                    "Name" => $Post->Name,
                    "DOB" => $Post->DOB,
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
                    "ParticipantDetail" => $Post->ParticipantDetail,
                    "CourseFee" => $Post->CourseFee,
                    "StudentStatus" => $Post->StudentStatus,
                    "Photo" => $Post->Photo,
                    "AcademicQualification" => $Post->AcademicQualification,
                    "NID" => $Post->NID,
                    "BirthCirtificate" => $Post->BirthCirtificate,
                    "Address" => $Post->Address,
                    "district" => $Post->district,
                    "upazila" => $Post->upazila,
                ];
            } else {
                $data = [
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
                    "AcademicQualification" => $Post->AcademicQualification,
                     "ParticipantDetail" => $Post->ParticipantDetail,
                     "DOB" => $Post->DOB,
                     "NID" => $Post->NID,
                     "BirthCirtificate" => $Post->BirthCirtificate,
                     "Address" => $Post->Address,
                     "district" => $Post->district,
                    "upazila" => $Post->upazila,
                ];
            }

            $this->db->where(["SID" => $Post->SID]);
            $result = $this->db->update("student", $data);
            $result2 = "Updated";
            return $result2;
        } else {
            $result2 = "Already Existed this Reg NO";
            return $result2;
        }
    }

    public function UpdateStudentCertificate($Post)
    {
        foreach ($Post as $value) {
            $data = [
                "IsCertified" => $value->IsCertified,
                "CertificateNo" => $value->CertificateNo,
            ];

            $this->db->where(["SID" => $value->SID]);
            $result = $this->db->update("student", $data);
        }

        $result2 = "Updated";
        return $result2;
    }

    public function LoginApproval($RegNo, $Mobile)
    {
        $search = [
            "RegNO" => $RegNo,
            "Mobile" => $Mobile,
            "StudentStatus" => 1,
        ];

        //check student exist
        $this->db->where($search);
        $countStudent = $this->db->count_all_results("student");

        // if student count greater than 0 then get the student
        if ($countStudent > 0) {
            $this->db->where(["RegNO" => $RegNo]);
            $Student = $this->db->get("student")->row();

            $data = [
                "Student" => $Student,
            ];
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

    public function SerchCertificate($Number)
    {
        $result = [];
        $this->db->where(["CertificateNo" => $Number, "IsCertified" => 1]);
        $count = $this->db->count_all_results("student");
        if ($count) {
            $result = $this->db
                ->query(
                    "SELECT st.Name as StudentName, st.RegNO, st.CertificateNo, s1.FiscalYear, b.Batch, ct.Title, b.StartDate, b.EndDate, b.DurationHour, if(st.IsCertified=1,'Valid','Not Valid') as Status from student st left join batch b on b.Id=st.BatchID left join session s1 on s1.SID=b.SessionFiscal left join CourseTitle ct on ct.ID=b.CourseTitle where st.CertificateNo=$Number and IsCertified=1"
                )
                ->row();
            return [
                "Result" => $result,
                "Status" => 1,
            ];
        } else {
            return [
                "Result" => $result,
                "Status" => 0,
            ];
        }
    }

    public function GetIndividualStudentInfoForCertificate($id)
    {
        if ($id > 0) {
            $result = $this->db
                ->query(
                    "SELECT bt.TypeName,if(s.StudentStatus=1,'Active','Inactive') as StudentStatus2 , if(b.Status=1,'Not Started',if(b.Status=2,'Running', 'Completed')) as Status2, ct.Title, ob.OrganizationName, b.CourseTitle, s.*, s.RegNO as tempregNO, s.CertificateNo as Certificate2 , if(s.IsPhysicalDisable=0,'NO','YES') as IsDisable, if(s.IsCertified=0,'0','1') as IsCertified, b.* , bt.TypeName as BatchTypeName, pt.TypeName as ParticipentTypeName, s1.FiscalYear,s2.CalenderYear, bdt.Type as DurationTypeName, s.CourseFee as Fee FROM student as s LEFT join batch b on b.Id=s.BatchID left join batchtype bt on bt.ID=b.BatchType left join CourseTitle ct on ct.ID=b.CourseTitle LEFT JOIN OrganizedBy ob on ob.ID=b.OrganizedBy left join batch_duration_type bdt on bdt.BDID=b.DurationType left join session s1 on s1.SID=b.SessionFiscal left join session s2 on s2.SID=b.SessionCalendar left join participant_type pt on pt.ID=s.ParticipantType WHERE s.SID=$id"
                )
                ->row();

            return $result;
        }
    }

    public function GetMultipleStudentsInfoForCertificate($id)
    {
        if ($id > 0) {
            $result = $this->db
                ->query(
                    "SELECT bt.TypeName,if(s.StudentStatus=1,'Active','Inactive') as StudentStatus2 , if(b.Status=1,'Not Started',if(b.Status=2,'Running', 'Completed')) as Status2, ct.Title, ob.OrganizationName, b.CourseTitle, s.*, s.RegNO as tempregNO, s.CertificateNo as Certificate2 , if(s.IsPhysicalDisable=0,'NO','YES') as IsDisable, if(s.IsCertified=0,'0','1') as IsCertified, b.* , bt.TypeName as BatchTypeName, pt.TypeName as ParticipentTypeName, s1.FiscalYear,s2.CalenderYear, bdt.Type as DurationTypeName, s.CourseFee as Fee FROM student as s LEFT join batch b on b.Id=s.BatchID left join batchtype bt on bt.ID=b.BatchType left join CourseTitle ct on ct.ID=b.CourseTitle LEFT JOIN OrganizedBy ob on ob.ID=b.OrganizedBy left join batch_duration_type bdt on bdt.BDID=b.DurationType left join session s1 on s1.SID=b.SessionFiscal left join session s2 on s2.SID=b.SessionCalendar left join participant_type pt on pt.ID=s.ParticipantType WHERE s.BatchID=$id order by RegNO"
                )
                ->result();
            return $result;
        }
    }
    
     //    This is Class Schedule page 
   
    public function GetAllBatchSchedule($BatchID) {
        $result = $this->db->query("SELECT cs.CSID, b.Id, b.Batch, cs.Day, cs.TopicName, cs.SubjectDetail, cr.DateTime, cr.Lab, cr.Trainer FROM batch as b LEFT JOIN courseSubject cs on b.CourseTitle=cs.CourseID LEFT JOIN ClassSchedule cr on cr.CSID=cs.CSID and cr.BatchID=b.Id WHERE b.Id=$BatchID order by cs.Day ASC")->result();
        return $result;
    }
    
    public function AddSchedule($Schedule) {
       
       $oneData = $Schedule[0];
        $Wheredata = array(
            "BatchID" => $oneData->Id,
        );
       
         $this->db->where($Wheredata);
        
        //first delete all then add
        $result = $this->db->delete('ClassSchedule', $Wheredata);
         $data2;
        $i = 0;
        
         foreach ($Schedule as $Student) {
            $data2[$i] = array(
                "BatchID" => $Student->Id,
                "CSID" => $Student->CSID,
                "DateTime" => $Student->DateTime,
                "Lab" => $Student->Lab,
                "Trainer" => $Student->Trainer,
                "Others" => 0,
              
            );
            $i++;
        }
        
         $this->db->insert_batch('ClassSchedule', $data2);
         echo json_encode($result);
    }
    
     public function BatchStudentsList($BatchID) {
        $result = $this->db->query("SELECT SID, Name, RegNO, Email FROM student WHERE BatchID=$BatchID order by RegNO ASC")->result();
        return $result;
    }

    
}

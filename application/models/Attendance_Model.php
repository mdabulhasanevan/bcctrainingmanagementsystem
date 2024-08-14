<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Attendance_Model
 *
 * @author Evan DU
 */
class Attendance_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function AllAttendance($search) {

       // $Attendance = $this->db->query("SELECT att.*, st.Name, st.RegNO from attendance att LEFT join student st on att.SID=st.SID WHERE att.BatchID=$search->BatchID and att.SubjectID=$search->SubjectID ORDER BY att.Date, st.RegNO")->result();
       // $OnlyDate = $this->db->query("SELECT att.Date, re.Name, cs.TopicName from attendance att left join registration re on re.Id=att.TeacherID left join courseSubject cs on cs.CSID=att.SubjectID WHERE att.BatchID=$search->BatchID and att.SubjectID=$search->SubjectID  GROUP BY att.Date")->result();
       // $NameAndReg = $this->db->query("SELECT st.SID, st.Name, st.RegNO from student st WHERE st.BatchID=$search->BatchID ORDER BY st.RegNO")->result();
        
        $Attendance = $this->db->query("SELECT att.*, st.Name, st.RegNO from attendance att LEFT join student st on att.SID=st.SID WHERE att.BatchID=$search->BatchID  ORDER BY att.Date, st.RegNO")->result();
        $OnlyDate = $this->db->query("SELECT att.Date, re.Name, cs.SubjectDetail from attendance att left join registration re on re.Id=att.TeacherID left join courseSubject cs on cs.CSID=att.SubjectID WHERE att.BatchID=$search->BatchID   GROUP BY att.Date")->result();
        $NameAndReg = $this->db->query("SELECT st.SID, st.Name, st.RegNO from student st WHERE st.BatchID=$search->BatchID ORDER BY st.RegNO")->result();



        $data = array(
            'GroupData' => $NameAndReg,
            'AllData' => $Attendance,
            'OnlyDate' => $OnlyDate
        );
        return $data;
    }
   
    //for get student list when teacher  set attendance
    public function GetStudents($request) {
        
       $BatchID=$request->BatchID;
       $Date=$request->Date;
       $SubjectID=$request->SubjectID;
       
       $DateForTable=$request->Date;
       
        $result2 = $this->db->query("SELECT st.SID,st.Name, st.BatchID, $SubjectID as SubjectID, '$DateForTable' as Date, st.RegNO as RegNo, isAttend FROM student st left join attendance as att on att.SID =st.SID and att.Date='$Date'  and att.SubjectID='$SubjectID' WHERE st.BatchID= '$BatchID' order by st.RegNO")->result();
        return array(
            "Student2" => $result2
        );
    }

    public function AddAttendance($data) {
// first datas value is retrive for search is exist or not bellow parametter is need for that
        
        $oneData = $data[0];
        $Wheredata = array(
            "BatchID" => $oneData->BatchID,
            "Date" => $oneData->Date,
            "SubjectID" => $oneData->SubjectID
        );

//        since paramrtter $data have some field that is not in attendance table so needed field set again in data2 variable
        
        $data2;
        $i = 0;
        
        foreach ($data as $Student) {
            $data2[$i] = array(
                "BatchID" => $Student->BatchID,
                "SubjectID" => $Student->SubjectID,
                "Date" => $Student->Date,
                "isAttend" => $Student->isAttend,
                "SID" => $Student->SID,
                "TeacherID" => $_SESSION["id"],
                "UserID" => $_SESSION["id"]
               
                
            );
            $i++;
        }
        
        $this->db->where($Wheredata);
        $count = $this->db->count_all_results('attendance');

        if ($count > 0) {
           
            //first delete all then add
            $result = $this->db->delete('attendance', $Wheredata);
             $this->db->insert_batch('attendance', $data2);
            
             
             if ($this->db->affected_rows() > 0) {
                return "Updated Successfully";
            } else {
                return "Updated unsuccessfully";
            }
         
        } else {
//            add direct
            $this->db->insert_batch('attendance', $data2);
           
            
            if ($this->db->affected_rows() > 0) {
                return "Added Successfully";
            } else {
                return "Added unsuccessfully";
            }
        }
    }

    //in student info and student dash board
    public function GetSingleAttendance($SID) {
        $SingleAttendance = $this->db->query("SELECT COUNT(at.isAttend) as total, sum(if(at.isAttend=1,1,0)) as Attend , sum(if(at.isAttend=0,1,0)) as Absent, ceiling((sum(if(at.isAttend=1,1,0))*100)/COUNT(at.isAttend)) as Percent, `at`.`StudentID`, `f`.`Name` as `Faculty`, `s`.`Name` as `Semester`, `sub`.`Name` as `Subject`, `ses`.`Session` as `Session`, `st`.`StudentInsID` FROM `attendance` as `at` LEFT JOIN `faculty` as `f` ON `f`.`FId`= `at`.`FacultyID` LEFT JOIN `semester` as `s` ON `s`.`ID`=`at`.`SemesterID` LEFT JOIN `subjects` as `sub` ON `sub`.`SubID`=`at`.`SubjectID` LEFT JOIN `session` as `ses` ON `ses`.`SessionId`=`at`.`SessionID` LEFT JOIN `student_tbl` as `st` ON `st`.`StudentID`=`at`.`StudentID` WHERE at.`StudentID` = $SID GROUP BY `SubjectID` ORDER BY `SubjectID` DESC");
        $SingleAttendanceOnlySemester = $this->db->query("SELECT COUNT(at.isAttend) as total, sum(if(at.isAttend=1,1,0)) as Attend , sum(if(at.isAttend=0,1,0)) as Absent, `at`.`StudentID`, s.Name , CEILING((sum(if(at.isAttend=1,1,0))*100)/COUNT(at.isAttend)) as Persent FROM attendance as at LEFT JOIN semester as s ON `s`.`ID`=`at`.`SemesterID` LEFT JOIN `student_tbl` as `st` ON `st`.`StudentID`=`at`.`StudentID` WHERE at.`StudentID` = '$SID' GROUP BY at.SemesterID ORDER BY at.SemesterID DESC");
        
        $data=array(
            'SingleAttendance'=>$SingleAttendance->result(),
            'SingleAttendanceOnlySemester'=>$SingleAttendanceOnlySemester->result()
        );
        return $data;
    }
    
     public function GetAllSubjectByBatchID($id) {
        
        $SubjectTopic = $this->db->query("SELECT ct.TopicsList from batch as b left join CourseTitle ct on ct.ID=b.CourseTitle WHERE b.Id=$id")->row(); 
        $Subject = $this->db->query("SELECT cs.TopicName,  cs.CSID, cs.SubjectDetail, cs.Day from batch b LEFT join CourseTitle ct on ct.ID=b.CourseTitle LEFT JOIN courseSubject cs on cs.CourseID=ct.ID WHERE b.Id=$id")->result();
        
      //  $Subject = $this->db->query("SELECT cs.CSID, cs.SubjectDetail, cs.Day from batch b LEFT join CourseTitle ct on ct.ID=b.CourseTitle LEFT JOIN courseSubject cs on cs.CourseID=ct.ID WHERE cs.CSID not IN(SELECT at.SubjectID FROM attendance at WHERE at.BatchID=$id) and b.Id=$id")->result();
        
        $data=array(
            'Subject'=>$Subject,
            'SubjectTopic'=>$SubjectTopic,
           
        );
        return $data;
    }
    

    public function DeleteAttendanceIndividual($Info) {
        $data = array(
            'Date' => $Info->Date,
            'BatchID' => $Info->BatchID,
            'SubjectID' => $Info->SubjectID,
        );

        $result = $this->db->delete('attendance', $data);
        return $result;
    }
    
    public function DayWiseAttendanceReport($date)
    {
        $result=$this->db->query("SELECT att.Date as Date, sub.Name as Subject, reg.Name as Teacher, f.Name as Faculty, sem.Name as Semester, ses.Session as Session, count(att.StudentID) as Total, sum(if(att.isAttend=1,1,0)) as Attend, sum(if(att.isAttend=0,1,0)) as Absent, ((sum(if(att.isAttend=1,1,0))*100)/count(att.StudentID)) as Percent from attendance att left join subjects sub on sub.SubID=att.SubjectID left join semester sem on sem.ID=att.SemesterID LEFT join faculty f on f.FId=att.FacultyID left join session ses on ses.SessionId=att.SessionID left join registration reg on reg.Id=att.TeacherID WHERE att.Date='$date' group by att.FacultyID, att.SessionID, att.SubjectID, att.Date order by att.FacultyID, att.SessionID, att.SemesterID")->result();
        return $result;
        
    }
}

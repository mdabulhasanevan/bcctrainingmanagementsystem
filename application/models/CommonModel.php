<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommonModel
 *
 * @author Evan DU
 */
class CommonModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function SetGetVisitor() {
        $this->db->set('visitor', 'visitor+1', FALSE);
        $this->db->where('id', 1);
        $this->db->update('counter');

        $this->db->where('id', 1);
        $visitor = $this->db->get('counter', 1);
        return $visitor->row()->visitor;
    }

    public function GetPost() {
        $query = $this->db->get("post");
        $rows = $query->result();
        return $rows;
    }

    public function GetRole() {
        $query = $this->db->get("role_tbl");
        $rows = $query->result();
        return $rows;
    }

    public function GetAllUsers() {
        $query = $this->db->get("role_tbl");
        $rows = $query->result();
        return $rows;
    }

    public function GetAllUsersByPost($PId) {
        $this->db->select('*');
        $this->db->from('registration');
        $this->db->where(array('Post' => $PId));
        $query = $this->db->get();
        $rows = $query->result();
        return $rows;
    }

    public function GetAllStudentBasicDropDown() {
        
    }

    public function GetDashboard() {
        
        
        
        //This is for Batch List current fiscal year wise
        if(date("m")<=06)
        {
            $FiscalYear=(date("Y")-1)."-".date("y");
        }
        else
        {
            $FiscalYear=date("Y")."-".(date("y")+1);
        }
        
        $data = array(
            "student" => $this->db->from("student")->count_all_results(),
          
            "questionsubject" => $this->db->from("questionsubject")->count_all_results(),
            "question" => $this->db->from("question")->count_all_results(),
            "user" => $this->db->from("registration")->count_all_results(),
            "batch" => $this->db->from("batch")->count_all_results(),
            "ExamCount" => $this->db->from("setexam")->count_all_results(),
            "QuestionSET" => $this->db->from("examcollection")->count_all_results(),
            "ExamAttendance" => $this->db->from("examresult")->count_all_results(),
            "CourseFee" => $this->db->query("SELECT sum(st.CourseFee) as CourseFee FROM student as st")->row()->CourseFee,
            "IsCertified" => $this->db->query("SELECT count(st.IsCertified) as IsCertified FROM student as st WHERE st.IsCertified=1")->row()->IsCertified,
            
            "StudentListBatchWise"=>$this->db->query("SELECT b.Batch, count(st.SID) as Number, sum(if(st.Gender='Male',1,0)) as Male , sum(if(st.Gender='Female',1,0)) as Female from student st left join batch b on b.Id=st.BatchID left join session ss on ss.SID=b.SessionFiscal where ss.FiscalYear='$FiscalYear' group by st.BatchID order by b.SessionFiscal DESC, b.DurationType asc")->result(),
           
            "DurationType"=>$this->db->query("SELECT s.FiscalYear, bdt.Type as DurationType, COUNT(DISTINCT(b.Id)) as BatchNumber, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, sum(if(st.Gender='Male',1,0)) as Male, sum(if(st.Gender='Female',1,0)) as Female, COUNT(st.SID) as Total from student as st left join batch b on b.Id=st.BatchID left join session s on s.SID=b.SessionFiscal left join batch_duration_type bdt on bdt.BDID=b.DurationType group by b.SessionFiscal , b.DurationType")->result(),
            "BatchType"=>$this->db->query("SELECT s.FiscalYear, bt.TypeName as BatchType, COUNT(DISTINCT(b.Id)) as BatchNumber, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, sum(if(st.Gender='Male',1,0)) as Male, sum(if(st.Gender='Female',1,0)) as Female, COUNT(st.SID) as Total from student as st left join batch b on b.Id=st.BatchID left join session s on s.SID=b.SessionFiscal left join batchtype bt on bt.ID=b.BatchType group by b.SessionFiscal , b.BatchType")->result(),
            
            "DurationTypeThisYear"=>$this->db->query("SELECT s.FiscalYear, bdt.Type as DurationType,  COUNT(DISTINCT(b.Id)) as BatchNumber, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, sum(1) as Total, sum(if(st.Gender='Male',1,0)) as Male, sum(if(st.Gender='Female',1,0)) as Female, COUNT(st.SID) as Total from student as st left join batch b on b.Id=st.BatchID left join session s on s.SID=b.SessionFiscal left join batch_duration_type bdt on bdt.BDID=b.DurationType where s.FiscalYear='$FiscalYear' group by b.SessionFiscal , b.DurationType ")->result(),
            "BatchTypeThiseYear"=>$this->db->query("SELECT s.FiscalYear , bt.TypeName as BatchType, COUNT(DISTINCT(b.Id)) as BatchNumber, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, sum(if(st.Gender='Male',1,0)) as Male, sum(if(st.Gender='Female',1,0)) as Female, COUNT(st.SID) as Total from student as st left join batch b on b.Id=st.BatchID left join session s on s.SID=b.SessionFiscal left join batchtype bt on bt.ID=b.BatchType where s.FiscalYear='$FiscalYear' group by b.SessionFiscal , b.BatchType")->result(),
            "TotalStudent"=>$this->db->query("SELECT s.FiscalYear , bt.TypeName as BatchType, COUNT(DISTINCT(b.Id)) as BatchNumber, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, sum(if(st.Gender='Male',1,0)) as Male, sum(if(st.Gender='Female',1,0)) as Female, COUNT(st.SID) as Total from student as st left join batch b on b.Id=st.BatchID left join session s on s.SID=b.SessionFiscal left join batchtype bt on bt.ID=b.BatchType where s.FiscalYear='$FiscalYear' group by b.SessionFiscal")->result(),
            "UpazilaReport"=>$this->db->query("SELECT d.name as DistrictName, u.name as UpazilaName, COUNT(DISTINCT(s.SID)) as TotalStudent FROM student as s left join districts d on d.id=s.district left join upazilas u on u.id=s.upazila left join batch b on b.Id=s.BatchID left join session ss on ss.SID=b.SessionFiscal where ss.FiscalYear='$FiscalYear' group by s.district, s.upazila")->result(),
          
            "FiscalYear"=>$FiscalYear,
            "Running"=>$this->db->query("SELECT sum(if(b.Batch is not null,1,0)) as Running FROM batch b WHERE b.Status IN(2)")->row()->Running,
            "Disable"=>$this->db->query("SELECT COUNT(s.Name) as Disable from student s WHERE s.IsPhysicalDisable=1")->row()->Disable,
           
            "StudentChart"=>$this->db->query("SELECT b.Batch as label, COUNT(s.SID) as y from student s left join batch b on b.Id=s.BatchID left join session ses on ses.SID=b.SessionCalendar WHERE ses.CalenderYear=YEAR(CURRENT_DATE()) GROUP by s.BatchID")->result(),
            "CourseWiseStudentsChart"=>$this->db->query("SELECT ct.Title as label, ((COUNT(s.SID)*100 )/(SELECT COUNT(st.SID)from student st left join batch b1 on b1.Id=st.BatchID LEFT JOIN session sss on sss.SID=b1.SessionFiscal WHERE sss.FiscalYear='$FiscalYear')) as y from student s left join batch b on b.Id=s.BatchID left join CourseTitle ct on ct.ID=b.CourseTitle LEFT JOIN session ss on ss.SID=b.SessionFiscal WHERE ss.FiscalYear='$FiscalYear' GROUP by b.CourseTitle")->result(),
            "Gender"=>$this->db->query("SELECT s.Gender as label, ((COUNT(s.SID)*100 )/(SELECT COUNT(student.SID)from student)) as y from student s GROUP by s.Gender")->result(),     
            "DisableChart"=>$this->db->query("SELECT if(s.IsPhysicalDisable=0,'General','Disable') as label, ((COUNT(s.SID)*100 )/(SELECT COUNT(st.SID)from student st left join batch b1 on b1.Id=st.BatchID LEFT JOIN session sss on sss.SID=b1.SessionFiscal WHERE sss.FiscalYear='$FiscalYear')) as y from student s left join batch b on b.Id=s.BatchID LEFT JOIN session ss on ss.SID=b.SessionFiscal WHERE ss.FiscalYear='$FiscalYear'  GROUP by s.IsPhysicalDisable")->result(),     
            "DurationTypeChart"=>$this->db->query("SELECT bdt.Type as label, ((COUNT(s.SID)*100 )/(SELECT COUNT(student.SID)from student)) as y from student s left join batch b on b.Id=s.BatchID left join batch_duration_type bdt on bdt.BDID=b.DurationType GROUP by b.DurationType")->result(),     
            
            "ActiveExam"=>$this->db->query("SELECT COUNT(ex.SetID) as ActiveExam FROM setexam ex WHERE ex.Status=1")->row()->ActiveExam,
            "ExamStatus"=>$this->db->query("SELECT (SUM(IF(sx.Status=1,1,0))) as Active, (SUM(IF(sx.Status=2,1,0))) as Inactive, (SUM(IF(sx.Status=3,1,0))) as Examed FROM setexam as sx")->row(),
            "ExamResultPercentage"=>$this->db->query("SELECT en.ExamName, (sum(er.Correct/ er.Selected)/count(er.ERId))*100 as point FROM examresult as er left join examcollection ec on ec.Id=er.ExamCollectionID left join ExamName en on en.ExNId=ec.ExamNameID")->row(),
            "TotalCourseTitle"=>$this->db->query("SELECT count(ID) as CourseTitle FROM CourseTitle")->row(),
            
             // "TodaysClass"=>$this->db->query("SELECT b.Batch, b.StartTime, b.EndTime from batch b WHERE b.ClassDay like CONCAT('%',(SELECT d.IndexNumber from day d WHERE d.Name=DAYNAME(curdate())),'%') and b.Status=2")->result(),
             "TodaysClass"=>$this->db->query("SELECT b.Batch, b.StartTime, b.EndTime, (SELECT CONCAT('Day ',cs.Day ,'-(', cs.SubjectDetail,')' ) from batch b2 LEFT join CourseTitle ct on ct.ID=b2.CourseTitle LEFT JOIN courseSubject cs on cs.CourseID=ct.ID WHERE cs.CSID not IN(SELECT at.SubjectID FROM attendance at WHERE at.BatchID=b.Id) and b2.Id=b.Id ORDER BY cs.Day asc LIMIT 1) as Topic from batch b WHERE b.ClassDay like CONCAT('%',(SELECT d.IndexNumber from day d WHERE d.Name=DAYNAME(curdate())),'%') and b.Status=2")->result(),
             "AdmissionOpen"=>$this->db->query("SELECT * FROM AdmissionSetup as ads where ads.Status=1")->result(),
            
             
             
              
             
        );

        return $data;
    }
    
     public function GetDahsBoardHeaderInfoAll() {
        $data =
        array(
              "ActiveExam"=>$this->db->query("SELECT COUNT(ex.SetID) as ActiveExam FROM setexam ex WHERE ex.Status=1")->row()->ActiveExam,
                 "Running"=>$this->db->query("SELECT sum(if(b.Batch is not null,1,0)) as Running FROM batch b WHERE b.Status IN(2)")->row()->Running,
                 "TodaysClass"=>$this->db->query("SELECT count(b.Batch) as LiveClass from batch b WHERE b.ClassDay like CONCAT('%',(SELECT d.IndexNumber from day d WHERE d.Name=DAYNAME(curdate())),'%') and b.Status=2")->row()->LiveClass,
            );
    
        return $data;
    }
    
    public function GetAllQuotes() {
        $data = array(
            "EducationalQuote"=>$this->db->query("SELECT * FROM `educational_quote` order by rand() limit 1")->row(),
            );

        return $data;
    }
    
    public function ExamResultChartDataForStudent($ExamID) {
        
        $SID=$_SESSION['StudentID'];
        
        $data = array(
            "AnalysisQuestionSubjectWise"=>$this->db->query("SELECT qs.Name as SubjectName ,SUM(if(r.Answer=1,1,0)) as Correct, SUM(if(r.Answer=0,1,0)) as Incorrect, (SUM(if(r.Answer=1,1,0))/ COUNT(r.UserID))*100 as Percentage FROM ResultWithDetailIndividual as r LEFT JOIN question as q ON q.QId=r.QuestionID LEFT JOIN questionsubject as qs on qs.Id=q.QuestionSubject WHERE r.UserID =$SID and r.ExamNameID=$ExamID GROUP BY qs.Id ORDER BY qs.Id")->result(),
            "AnalysisDetail"=>$this->db->query("SELECT r.Question, qs.Name as SubjectName ,SUM(if(r.Answer=1,1,0)) as Correct, SUM(if(r.Answer=0,1,0)) as Incorrect, (SUM(if(r.Answer=1,1,0))/ COUNT(r.UserID))*100 as Percentage FROM ResultWithDetailIndividual as r LEFT JOIN question as q ON q.QId=r.QuestionID LEFT JOIN questionsubject as qs on qs.Id=q.QuestionSubject  WHERE r.UserID =$SID and r.ExamNameID=$ExamID GROUP BY r.QuestionID, r.ExamCollectionID, r.SetID, r.ExamNameID ORDER BY qs.Id")->result(),
            );

        return $data;
    }

}

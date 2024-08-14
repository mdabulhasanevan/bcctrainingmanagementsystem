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
class Report_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

   

    public function GetAllFiscalYearReport($from,$to) {
       
        $data = array(
            
            "DurationType"=>$this->db->query("SELECT s.FiscalYear, bdt.Type AS DurationType, sum(st.CourseFee) as Fee, COUNT(DISTINCT(b.Id)) as BatchNumber, SUM(IF(st.IsCertified = 1, 1, 0)) AS Certified, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, SUM(IF(st.Gender = 'Male', 1, 0)) AS Male, SUM(IF(st.Gender = 'Female', 1, 0)) AS Female, COUNT(st.SID) AS Total FROM student AS st LEFT JOIN batch b ON b.Id = st.BatchID LEFT JOIN session s ON s.SID = b.SessionFiscal LEFT JOIN batch_duration_type bdt ON bdt.BDID = b.DurationType where b.SessionFiscal >= $from and b.SessionFiscal<=$to GROUP BY b.SessionFiscal, b.DurationType")->result(),
            "BatchType"=>$this->db->query("SELECT s.FiscalYear, bt.TypeName AS BatchType, sum(st.CourseFee) as Fee, COUNT(DISTINCT(b.Id)) as BatchNumber, SUM(IF(st.IsCertified = 1, 1, 0)) AS Certified, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, SUM(IF(st.Gender = 'Male', 1, 0)) AS Male, SUM(IF(st.Gender = 'Female', 1, 0)) AS Female, COUNT(st.SID) AS Total FROM student AS st LEFT JOIN batch b ON b.Id = st.BatchID LEFT JOIN session s ON s.SID = b.SessionFiscal LEFT JOIN batchtype bt ON bt.ID = b.BatchType where b.SessionFiscal >= $from and b.SessionFiscal<=$to GROUP BY b.SessionFiscal, b.BatchType")->result(),
            "Total"=>$this->db->query("select SUM(IF(st.IsCertified = 1, 1, 0)) AS Certified, count(DISTINCT(b.Id)) as TotalBatchNumber, sum(st.CourseFee) as Fee,  SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, count(st.SID) as Total from student as st join batch b on b.Id=st.BatchID where b.SessionFiscal >= $from and b.SessionFiscal<=$to")->row()
               
          
        );

        return $data;
    }
     public function GetAllCalenderYearReport($from,$to) {
       
        $data = array(
            
            "DurationType"=>$this->db->query("SELECT s.CalenderYear, bdt.Type AS DurationType, sum(st.CourseFee) as Fee, COUNT(DISTINCT(b.Id)) as BatchNumber, SUM(IF(st.IsCertified = 1, 1, 0)) AS Certified, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, SUM(IF(st.Gender = 'Male', 1, 0)) AS Male, SUM(IF(st.Gender = 'Female', 1, 0)) AS Female, COUNT(st.SID) AS Total FROM student AS st LEFT JOIN batch b ON b.Id = st.BatchID LEFT JOIN session s ON s.SID = b.SessionCalendar LEFT JOIN batch_duration_type bdt ON bdt.BDID = b.DurationType where b.SessionCalendar >= $from and b.SessionCalendar<=$to GROUP BY b.SessionCalendar, b.DurationType")->result(),
            "BatchType"=>$this->db->query("SELECT s.CalenderYear, bt.TypeName AS BatchType, sum(st.CourseFee) as Fee, COUNT(DISTINCT(b.Id)) as BatchNumber, SUM(IF(st.IsCertified = 1, 1, 0)) AS Certified, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, SUM(IF(st.Gender = 'Male', 1, 0)) AS Male, SUM(IF(st.Gender = 'Female', 1, 0)) AS Female, COUNT(st.SID) AS Total FROM student AS st LEFT JOIN batch b ON b.Id = st.BatchID LEFT JOIN session s ON s.SID = b.SessionCalendar LEFT JOIN batchtype bt ON bt.ID = b.BatchType where b.SessionCalendar >= $from and b.SessionCalendar<=$to GROUP BY b.SessionCalendar, b.BatchType")->result(),
             "Total"=>$this->db->query("select  SUM(IF(st.IsCertified = 1, 1, 0)) AS Certified, count(DISTINCT(b.Id)) as TotalBatchNumber, sum(st.CourseFee) as Fee, SUM(IF(st.IsPhysicalDisable = 1, 1, 0)) AS Disable, SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, count(st.SID) as Total from student as st join batch b on b.Id=st.BatchID where b.SessionCalendar >= $from and b.SessionCalendar<=$to")->row()
                
        );

        return $data;
    }
    
      public function GetBatchMonthlyReport($monthFrom,$monthTo) {
      // $data = array(
       //     "result" => $this->db->query("SELECT b.*, OzBy.*, ct.Title as CourseTitleName, COUNT(IF(st.Gender='Male',1,NULL)) as Male, COUNT(IF(st.Gender='Female',1,NULL)) as Female, (if(b.Status=1,'Not Start Yet', if(b.Status=2,'Running',if(b.Status=3,'Completed','Unknown'))))as Status, COUNT(DISTINCT(st.SID)) as studentNumber, bt.TypeName, s.FiscalYear,s2.CalenderYear, bdt.Type as DurationTypeName FROM batch as b left join batchtype bt on bt.ID=b.BatchType left join OrganizedBy OzBy on b.OrganizedBy=OzBy.ID left join CourseTitle ct on ct.ID=b.CourseTitle left join batch_duration_type bdt on bdt.BDID=b.DurationType LEFT JOIN student st on b.Id=st.BatchID left join session s on s.SID=b.SessionFiscal left join session s2 on s2.SID=b.SessionCalendar  WHERE b.Status IN(2) or ( MONTH(b.EndDate)='$month' AND YEAR(b.EndDate)='$year')  GROUP BY b.Id order by b.Status desc")->result(),
       //     "resultTotal" => $this->db->query("SELECT SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, sum(if(st.Gender='Female',1,1)) as Total from batch b LEFT JOIN student st on b.Id=st.BatchID WHERE (b.Status IN(2) or ( MONTH(b.EndDate)='$month' AND YEAR(b.EndDate)='$year')) and st.Gender is not null")->row()
       // );
        
         $data = array(
            "result" => $this->db->query("SELECT b.*, OzBy.*, ct.Title as CourseTitleName, COUNT(IF(st.Gender='Male',1,NULL)) as Male, COUNT(IF(st.Gender='Female',1,NULL)) as Female, (if(b.Status=1,'Not Start Yet', if(b.Status=2,'Running',if(b.Status=3,'Completed','Unknown'))))as Status, COUNT(DISTINCT(st.SID)) as studentNumber, bt.TypeName, s.FiscalYear,s2.CalenderYear, bdt.Type as DurationTypeName FROM batch as b left join batchtype bt on bt.ID=b.BatchType left join OrganizedBy OzBy on b.OrganizedBy=OzBy.ID left join CourseTitle ct on ct.ID=b.CourseTitle left join batch_duration_type bdt on bdt.BDID=b.DurationType LEFT JOIN student st on b.Id=st.BatchID left join session s on s.SID=b.SessionFiscal left join session s2 on s2.SID=b.SessionCalendar WHERE b.Status !=1 and (b.StartDate BETWEEN '$monthFrom' and '$monthTo') GROUP BY b.Id order by b.StartDate")->result(),
            "resultTotal" => $this->db->query("SELECT SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, sum(if(st.Gender='Female',1,1)) as Total from batch b LEFT JOIN student st on b.Id=st.BatchID  WHERE b.Status !=1 and (b.StartDate BETWEEN '$monthFrom' and '$monthTo') and st.Gender is not null")->row()
        );

        return $data;
    }
    
      public function GetCurrentStatusReport($monthFrom,$monthTo) {
    
            //sattus 1=not start;  2= running; 3= completed
         $data = array(
            "result" => $this->db->query("SELECT b.*, OzBy.*, ct.Title as CourseTitleName, COUNT(IF(st.Gender='Male',1,NULL)) as Male, COUNT(IF(st.Gender='Female',1,NULL)) as Female, (if(b.Status=1,'Not Start Yet', if(b.Status=2,'Running',if(b.Status=3,'Completed','Unknown'))))as Status, COUNT(DISTINCT(st.SID)) as studentNumber, bt.TypeName, s.FiscalYear,s2.CalenderYear, bdt.Type as DurationTypeName FROM batch as b left join batchtype bt on bt.ID=b.BatchType left join OrganizedBy OzBy on b.OrganizedBy=OzBy.ID left join CourseTitle ct on ct.ID=b.CourseTitle left join batch_duration_type bdt on bdt.BDID=b.DurationType LEFT JOIN student st on b.Id=st.BatchID left join session s on s.SID=b.SessionFiscal left join session s2 on s2.SID=b.SessionCalendar WHERE b.Status !=1 and (((b.EndDate BETWEEN '$monthFrom' and '$monthTo') and b.Status=3 ) or (b.StartDate <='$monthTo' and b.Status=2 )) GROUP BY b.Id order by b.StartDate")->result(),
            "resultTotal" => $this->db->query("SELECT SUM(if(st.Gender='Male',1,0)) as Male, SUM(if(st.Gender='Female',1,0)) as Female, sum(if(st.Gender='Female',1,1)) as Total from batch b LEFT JOIN student st on b.Id=st.BatchID  WHERE b.Status !=1 and (((b.EndDate BETWEEN '$monthFrom' and '$monthTo') and b.Status=3 ) or (b.StartDate <='$monthTo' and b.Status=2 )) and st.Gender is not null")->row()
        );

        return $data;
    }
    
      // GetAllExamResultBatchWise for PDF use result sheet
    
     public function GetAllExamResultBatchWise($batch) {
        $data = array(
        "Result" => $this->db->query("SELECT st.SID, if(er.Attendance=0,'Absent','Present') as Attendance, st.Name, st.RegNO, exn.ExamName, exn.ExNId, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, er.Theory, er.Practical ,((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID =$batch ORDER BY st.RegNO asc, exn.ExNId ")->result(),
       "ExamList" => $this->db->query("SELECT en.ExNId, en.ExamName , sx.BatchID, exc.ExamCollection FROM setexam sx left join examcollection exc on exc.Id=sx.ExamCollectionID left join ExamName as en on en.ExNId=exc.ExamNameID WHERE sx.BatchID =$batch")->result(),
       "StudentList" => $this->db->query("select st.SID, st.RegNO, st.Name from student st WHERE st.BatchID =$batch ORDER BY st.RegNO asc")->result()
       );
       
       
        return $data;
    }
    
    public function GetStudentLocationReport($monthFrom,$monthTo) {
    
         $data = array(
            "District" => $this->db->query("SELECT dv.name as DivisionName, d.name as DistrictName, COUNT((st.district)) as DistrictCount from student as st left join batch b on b.Id=st.BatchID left join districts d on d.id=st.district left join divisions dv on dv.id=d.division_id LEFT join session ss on ss.SID=b.SessionCalendar WHERE ss.SID>=$monthFrom and ss.SID<=$monthTo GROUP by st.district order by dv.id")->result(),
            "Upazila" => $this->db->query("SELECT ds.name as DistrictName, d.name as UpazilaName, COUNT((st.upazila)) as UpazilaCount from student as st left join batch b on b.Id=st.BatchID left join upazilas d on d.id=st.upazila left join districts ds on ds.id=st.district LEFT join session ss on ss.SID=b.SessionCalendar  WHERE ss.SID>=$monthFrom and ss.SID<=$monthTo GROUP by st.upazila order by ds.id")->result(),
            "Total" => $this->db->query("SELECT COUNT(distinct(dv.id))as DivisionCount, COUNT(DISTINCT(d.id)) as DistrictCount, COUNT(DISTINCT(st.upazila)) as upazilaCount, COUNT((st.district)) as StudentCount from student as st left join batch b on b.Id=st.BatchID left join districts d on d.id=st.district left join divisions dv on dv.id=d.division_id LEFT join session ss on ss.SID=b.SessionCalendar WHERE ss.SID>=$monthFrom and ss.SID<=$monthTo order by dv.id")->row(),
       
        );

        return $data;
    }

}

<?php

/**
 * Description of Setting_Model
 *
 * @author Evan DU
 */
class Setting_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    #regionBatch


   
    
    public function GetAllBatch() {
       // $result = $this->db->get("batch")->result();
          $result = $this->db->query("SELECT b.*, OzBy.*,  (if(b.Status=1,'Not Start Yet',if(b.Status=2,'Running',if(b.Status=3,'Completed','Unknown'))))as StatusName, ct.Title as CourseTitleName, bt.TypeName, s.FiscalYear,s2.CalenderYear, bdt.Type as DurationTypeName FROM batch as b left join batchtype bt on bt.ID=b.BatchType left join CourseTitle ct on ct.ID=b.CourseTitle left join OrganizedBy OzBy on b.OrganizedBy=OzBy.ID left join batch_duration_type bdt on bdt.BDID=b.DurationType left join session s on s.SID=b.SessionFiscal left join session s2 on s2.SID=b.SessionCalendar where b.isPublic=0 order by b.CourseTitle asc, b.DurationHour desc, b.StartDate desc, b.Id desc")->result();
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

    #end region
    
   #regionQusetionType

    public function GetAllQusetionType() {
        $result = $this->db->get("questiontype")->result();
        return $result;
    }

    public function DeleteQusetionType($id) {
        $result = $this->db->delete("questiontype", array('Id' => $id));
        return $result;
    }

    public function AddQusetionType($QusetionType) {
        $result = $this->db->insert("questiontype", $QusetionType);
        return $result;
    }

    public function UpdateQusetionType($QusetionType) {
        $data = array(
            "Type" => $QusetionType->Type
        );
        $this->db->where(array('Id' => $QusetionType->Id));
        $result = $this->db->update("questiontype", $data);

        //$result = $this->db->get("batch")->result();
        return $result;
    }

    #end region
    
    
       #regionQusetion Subject

    public function GetAllQusetionSubject() {
        $result = $this->db->get("questionsubject")->result();
        return $result;
    }

    public function DeleteQusetionSubject($id) {
        $result = $this->db->delete("questionsubject", array('Id' => $id));
        return $result;
    }

    public function AddQusetionSubject($QusetionSubject) {
        $result = $this->db->insert("questionsubject", $QusetionSubject);
        return $result;
    }

    public function UpdateQusetionSubject($QusetionSubject) {
        $data = array(
            "Name" => $QusetionSubject->Name
        );
        $this->db->where(array('Id' => $QusetionSubject->Id));
        $result = $this->db->update("questionsubject", $data);

        //$result = $this->db->get("batch")->result();
        return $result;
    }

    #end region
    
       #region examcollection

    public function GetAllExamCollection() {
       // $result = $this->db->get("examcollection")->result();
        $result = $this->db->query("SELECT * FROM examcollection as ec left join ExamName ex on ex.ExNId=ec.ExamNameID order by ex.ExNId")->result();
        return $result;
    }

    public function DeleteExamCollection($id) {
        $result = $this->db->delete("examcollection", array('Id' => $id));
        return $result;
    }

    public function AddExamCollection($ExamCollection) {
        $result = $this->db->insert("examcollection", $ExamCollection);
        return $result;
    }

    public function UpdateExamCollection($ExamCollection) {
        $data = array(
            "ExamCollection" => $ExamCollection->ExamCollection,
            "ExamNameID" => $ExamCollection->ExamNameID
        );
        $this->db->where(array('Id' => $ExamCollection->Id));
        $result = $this->db->update("examcollection", $data);

        //$result = $this->db->get("batch")->result();
        return $result;
    }
    
    

    #end region
    
    
    
  
    #region Post

    public function GetAllPost() {
        $result = $this->db->get("post")->result();
        return $result;
    }

    public function DeletePost($id) {
        $result = $this->db->delete("post", array('PId' => $id));
        return $result;
    }

    public function AddPost($Post) {
        $result = $this->db->insert("post", $Post);
        return $result;
    }

    public function UpdatePost($Post) {
        $data = array(
            "PostName" => $Post->PostName,
        );
        $this->db->where(array('PId' => $Post->PId));
        $result = $this->db->update("post", $data);
        return $result;
    }

    #end region
    #
    
    
     #region Exam Name

    public function GetAllExamName() {
        $result = $this->db->get("ExamName")->result();
        return $result;
    }

    public function DeleteExamName($id) {
        $result = $this->db->delete("ExamName", array('ExNId' => $id));
        return $result;
    }

    public function AddExamName($ExamName) {
        $result = $this->db->insert("ExamName", $ExamName);
        return $result;
    }

    public function UpdateExamName($ExamName) {
        $data = array(
            "ExamName" => $ExamName->ExamName,
        );
        $this->db->where(array('ExNId' => $ExamName->ExNId));
        $result = $this->db->update("ExamName", $data);
        return $result;
    }

    #end region
    
    
    
    
    
    #region Role

    public function GetAllRole() {
        $result = $this->db->get("role_tbl")->result();
        return $result;
    }

    public function DeleteRole($id) {
        $result = $this->db->delete("role_tbl", array('Id' => $id));
        return $result;
    }

    public function AddRole($Role) {
        $result = $this->db->insert("role_tbl", $Role);
        return $result;
    }

    public function UpdateRole($Role) {
        $data = array(
            "Role" => $Role->Role,
        );
        $this->db->where(array('Id' => $Role->Id));
        $result = $this->db->update("role_tbl", $data);
        return $result;
    }

    #end region
    
    #region setexam

    public function GetAllBatchandQuestionSet() {
        //$result = $this->db->query("SELECT stex.*, exn.ExNId , b.Id as BatchID,  exn.ExamName,exa.Status as StatusName, b.Batch as BatchName, ec.ExamCollection as ExamCollection FROM setexam as stex left JOIN batch b on b.Id=stex.BatchID LEFT JOIN examcollection ec on ec.Id=stex.ExamCollectionID LEFT JOIN examactive exa on exa.ID= stex.Status left join ExamName exn on exn.ExNId=stex.ExamNameID ORDER BY stex.ExDate DESC")->result();
          
          $result = $this->db->query("SELECT stex.*, exn.ExNId , b.Id as BatchID, exn.ExamName,exa.Status as StatusName, b.Batch as BatchName, ec.ExamCollection as ExamCollection, et.TypeName as ExamTypeName, IF((SELECT COUNT(er2.ERId) as attend from examresult er2 WHERE er2.ExamCollectionID=stex.ExamCollectionID AND er2.BatchID=stex.BatchID)=(SELECT COUNT(st2.SID) as studentCount from student st2 WHERE st2.BatchID=stex.BatchID),1,0) as Submit FROM setexam as stex left JOIN batch b on b.Id=stex.BatchID LEFT JOIN examcollection ec on ec.Id=stex.ExamCollectionID LEFT JOIN examactive exa on exa.ID= stex.Status left join ExamName exn on exn.ExNId=stex.ExamNameID left join ExamType et on et.ETID=stex.ExamType ORDER BY stex.ExDate DESC")->result();
        
        return $result;
    }

    public function DeleteSetExam($id) {
        $result = $this->db->delete("setexam", array('SetID' => $id));
        return $result;
    }
    
    public function AbsentStudentAutoAddIntoDatabase($batch,$ExamModule) {
       
       $this->db->query("INSERT INTO examresult (ExamCollectionID, BatchID, ExamDate, UserID, Attendance ,TotalQuestion ) SELECT DISTINCT( SELECT se.ExamCollectionID
    FROM
        examresult AS er
    LEFT JOIN setexam se ON
        se.ExamCollectionID = er.ExamCollectionID
    LEFT JOIN examcollection exc ON
        exc.Id = er.ExamCollectionID
    LEFT JOIN ExamName exn ON
        exn.ExNId = se.ExamNameID
    WHERE
        er.BatchID = $batch AND exc.ExamNameID = $ExamModule
    LIMIT 1
) AS ExamCollectionID,(
    SELECT
        er.BatchID
    FROM
        examresult AS er
    LEFT JOIN setexam se ON
        se.ExamCollectionID = er.ExamCollectionID
    LEFT JOIN examcollection exc ON
        exc.Id = er.ExamCollectionID
    LEFT JOIN ExamName exn ON
        exn.ExNId = se.ExamNameID
    WHERE
        er.BatchID = $batch AND exc.ExamNameID = $ExamModule
    LIMIT 1
) AS BatchID,(
    SELECT
        er.ExamDate
    FROM
        examresult AS er
    LEFT JOIN setexam se ON
        se.ExamCollectionID = er.ExamCollectionID
    LEFT JOIN examcollection exc ON
        exc.Id = er.ExamCollectionID
    WHERE
        er.BatchID = $batch AND exc.ExamNameID = $ExamModule
    LIMIT 1
) AS ExamDate,(
    SELECT
        st4.SID
    FROM
        student AS st4
    WHERE
        st4.RegNO = st1.RegNO
    LIMIT 1
) AS UserID, '0' AS Attendance
    ,
    (
    SELECT
        er.TotalQuestion
    FROM
        examresult AS er
    LEFT JOIN setexam se ON
        se.ExamCollectionID = er.ExamCollectionID
    LEFT JOIN examcollection exc ON
        exc.Id = er.ExamCollectionID
    WHERE
        er.BatchID = $batch AND exc.ExamNameID = $ExamModule
    LIMIT 1
) AS TotalQuestion
FROM
    student st1
WHERE
    st1.BatchID = $batch AND st1.RegNO NOT IN(
    SELECT
        st.RegNO
    FROM
        examresult AS er
    LEFT JOIN setexam se ON
        se.ExamCollectionID = er.ExamCollectionID AND se.BatchID = er.BatchID
    LEFT JOIN student st ON
        st.SID = er.UserID
    LEFT JOIN batch b ON
        b.Id = se.BatchID
    LEFT JOIN examcollection exc ON
        exc.Id = er.ExamCollectionID
    LEFT JOIN ExamName exn ON
        exn.ExNId = se.ExamNameID
    WHERE
        er.BatchID = $batch AND exc.ExamNameID = $ExamModule
)");
       
        echo json_encode(true);
    }

    public function AddSetExam($Data) {
        $result = $this->db->insert("setexam", $Data);
        return $result;
    }

    public function UpdateSetExam($DataUI) {
        $data = array(
            "BatchID" => $DataUI->BatchID,
            "ExamCollectionID" => $DataUI->ExamCollectionID,
            "Status" => $DataUI->Status,
            "Time" => $DataUI->Time,
            "MCQMarks" => $DataUI->MCQMarks,
            "TheoryMarks" => $DataUI->TheoryMarks,
            "PracticalMarks" => $DataUI->PracticalMarks,
            "ExDate" => $DataUI->ExDate,
            "ExamNameID" => $DataUI->ExamNameID,
            "IPCheckActivation" => $DataUI->IPCheckActivation,
            "ResultView" => $DataUI->ResultView,
            "QuestionTemplate" => $DataUI->QuestionTemplate,
            "ExamType" => $DataUI->ExamType
                
        );
        $this->db->where(array('SetID' => $DataUI->SetID));
        $result = $this->db->update("setexam", $data);
        return $result;
    }
    
    public function ChangeExamStatus($Status, $SetID) {
        $data = array(
            "Status" => $Status,
        );
        $this->db->where(array('SetID' => $SetID));
        $result = $this->db->update("setexam", $data);

        return $result;
    }

    #end region
    
    
     #region Organization Name

    public function GetAllOrganizationName() {
        $result = $this->db->get("OrganizedBy")->result();
        return $result;
    }

    public function DeleteOrganizationName($id) {
        $result = $this->db->delete("OrganizedBy", array('ID' => $id));
        return $result;
    }

    public function AddOrganizationName($OrganizationName) {
        $result = $this->db->insert("OrganizedBy", $OrganizationName);
        return $result;
    }

    public function UpdateOrganizationName($OrganizationName) {
        $data = array(
            "OrganizationName" => $OrganizationName->OrganizationName,
            "Detail" => $OrganizationName->Detail,
        );
        $this->db->where(array('ID' => $OrganizationName->ID));
        $result = $this->db->update("OrganizedBy", $data);
        return $result;
    }

    #end region

 #region CourseTitle Name

    public function GetAllCourseTitle() {
        $result = $this->db->get("CourseTitle")->result();
        return $result;
    }

    public function DeleteCourseTitle($id) {
        $result = $this->db->delete("CourseTitle", array('ID' => $id));
        return $result;
    }

    public function AddCourseTitle($CourseTitle) {
        $result = $this->db->insert("CourseTitle", $CourseTitle);
        return $result;
    }

    public function UpdateCourseTitle($CourseTitle) {
        $data = array(
            "Title" => $CourseTitle->Title,
            "Code" => $CourseTitle->Code,
            "TotalClass" => $CourseTitle->TotalClass,
            "TopicsList" => $CourseTitle->TopicsList,
        );
        $this->db->where(array('ID' => $CourseTitle->ID));
        $result = $this->db->update("CourseTitle", $data);
        return $result;
    }

    #end region
    
    #region CourseSubject Name

    public function GetAllCourseSubject($CourseID) {
        
        $result = $this->db->query("SELECT * FROM courseSubject cs WHERE cs.CourseID=$CourseID ORDER BY cs.Day ASC")->result();
        return $result;
        
    }

    public function DeleteCourseSubject($id) {
        $result = $this->db->delete("courseSubject", array('CSID' => $id));
        return $result;
    }

    public function AddCourseSubject($CourseSubject) {
        
        $search = array(
            "CourseID" => $CourseSubject->CourseID,
            "Day" => $CourseSubject->Day,
        );
        
        $this->db->where($search);
        $count = $this->db->count_all_results('courseSubject');

        if ($count == 0) {
            $result = $this->db->insert("courseSubject", $CourseSubject);
            
            
            $result2 = 1;
            return $result2;
        } else {
            $result2 = 2;
            return $result2;
        }
        
    }

    public function UpdateCourseSubject($CourseSubject) {
        $data = array(
            "CourseID" => $CourseSubject->CourseID,
            "SubjectDetail" => $CourseSubject->SubjectDetail,
            "Tutorials" => $CourseSubject->Tutorials,
            "Day" => $CourseSubject->Day,
            "TopicName" => $CourseSubject->TopicName,
            "IsExam" => $CourseSubject->IsExam,
            "Discussion" => $CourseSubject->Discussion,
            
            
        );
        $this->db->where(array('CSID' => $CourseSubject->CSID));
        $result = $this->db->update("courseSubject", $data);
        return $result;
    }

    #end region
    
    #region Class Workshop Name

    public function GetAllClassWorkShop() {
        $result = $this->db->query("SELECT cs.*, b.Batch as BatchName FROM classWorkshop as cs left join batch b on b.Id=cs.BatchID")->result();
        return $result;
       
    }

    public function DeleteClassWorkShop($id) {
        $result = $this->db->delete("classWorkshop", array('ID' => $id));
        return $result;
    }

    public function AddClassWorkShop($ClassWorkShop) {
        $result = $this->db->insert("classWorkshop", $ClassWorkShop);
        return $result;
    }

    public function UpdateClassWorkShop($ClassWorkShop) {
        $data = array(
            "BatchID" => $ClassWorkShop->BatchID,
            "ClassDetail" => $ClassWorkShop->ClassDetail,
            "Others" => $ClassWorkShop->Others
        );
        $this->db->where(array('ID' => $ClassWorkShop->ID));
        $result = $this->db->update("classWorkshop", $data);
        return $result;
    }
    
     public function GetAllLiveClass($BatchID) {
        $result = $this->db->query("SELECT cs.* FROM classWorkshop as cs where cs.BatchID=$BatchID ORDER BY ID DESC limit 1")->result();
        return $result;
       
    }
    
    public function GetAllStudentsMobileByBatch($BatchID)
    {
        $result = $this->db->query("SELECT GROUP_CONCAT(Mobile) as Mobile FROM student WHERE BatchID=$BatchID")->row();
        return $result;
    }
    
     public function GetAllStudentsMailByBatch($BatchID)
    {
        $result = $this->db->query("SELECT GROUP_CONCAT(Email) as Mail FROM student WHERE BatchID=$BatchID")->row();
        return $result;
    }
    

    #end region
    
    
}

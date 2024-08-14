<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of Exam_Model
 *
 * @author Evan DU
 */
class Exam_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function GetAllExamTypeField() {
        $questiontype = $this->db->get("questiontype")->result();
        $questionsubject = $this->db->query("SELECT  *, 0 as SetName, 5 as QNumber, 'false' as QuestionSubject, 2 as QuestionType FROM questionsubject")->result();
        $examCollectionForResultHistory = $this->db->query("SELECT * from setexam se left join examcollection ec on ec.Id =se.ExamCollectionID")->result();
        $examcollection = $this->db->query("SELECT * from examcollection")->result();
        $examcollectionListOnly = $this->db->query("SELECT ec.*, en.ExamName from examcollection as ec LEFT join ExamName en on en.ExNId=ec.ExamNameID")->result();       
        
        $batch = $this->db->query("SELECT * from batch as b where b.isPublic in(0,1) order by b.BatchType asc , b.Id desc")->result();
        $Status = $this->db->get("examactive")->result();
        $BatchType = $this->db->get("batchtype")->result();
        $participant_type = $this->db->get("participant_type")->result();
        $ExamName = $this->db->get("ExamName")->result();
        $batchduration = $this->db->get("batch_duration_type")->result();
        $Session = $this->db->get("session")->result();
        $Organized = $this->db->get("OrganizedBy")->result();
        $CourseTitle = $this->db->get("CourseTitle")->result();
        
        $TrainerList = $this->db->query("SELECT r.Id, r.Name, p.PostName FROM registration as r LEFT JOIN post p on p.PId=r.Post")->result();
        $LabList = $this->db->query("SELECT * FROM LabList")->result();
        $AcademicQualification = $this->db->query("SELECT * FROM AcademicQualification")->result();
        
        $Icons = $this->db->query("SELECT * FROM icons")->result();
        $ExamType = $this->db->query("SELECT * FROM ExamType")->result();
        $districts = $this->db->query("SELECT * FROM districts")->result();
        $upazilas = $this->db->query("SELECT * FROM upazilas")->result();
          

        $data = array(
            "questiontype" => $questiontype,
            "questionsubject" => $questionsubject,
            "examcollection" => $examcollection,
            "examcollectionListOnly"=>$examcollectionListOnly,
            "examCollectionForResultHistory"=>$examCollectionForResultHistory,
            "batch" => $batch,
            "status" => $Status,
            "batchtype" => $BatchType,
            "participant_type" => $participant_type,
            "ExamName" => $ExamName,
             "batchduration" => $batchduration,
             "Session" => $Session,
             "Organized" => $Organized,
             "CourseTitle" => $CourseTitle,
             "TrainerList" => $TrainerList,
             "LabList" => $LabList,
             "AcademicQualification" => $AcademicQualification,
             "Icons" => $Icons,
             "ExamType" => $ExamType,
             "districts" => $districts,
             "upazilas" => $upazilas,
        );
        return $data;
    }

    public function SaveCreateQuestion($Question) {
        
        if(!isset($Question->Description))
        {
            $Question->Description="";
        }
        if(!isset($Question->Link))
        {
            $Question->Link="";
        }
        
            $Questiondata = array(
            "Question" => $Question->QuestionName,
            "QuestionType" => $Question->QuestionType,
            "QuestionSubject" => $Question->QuestionSubject,
            "Description" => $Question->Description,
            "Link" => $Question->Link,
            
        );
        $this->db->insert("question", $Questiondata);
        $QuestionId = $this->db->insert_id();

        $this->db->query("Insert into mcqandans(MCQ,QId,Answer)values('$Question->MCQ1',$QuestionId,$Question->MCQ1Ans)");
        $this->db->query("Insert into mcqandans(MCQ,QId,Answer)values('$Question->MCQ2',$QuestionId,$Question->MCQ2Ans)");
        $this->db->query("Insert into mcqandans(MCQ,QId,Answer)values('$Question->MCQ3',$QuestionId,$Question->MCQ3Ans)");
        $this->db->query("Insert into mcqandans(MCQ,QId,Answer)values('$Question->MCQ4',$QuestionId,$Question->MCQ4Ans)");
    }

    //Search Question for Show List only 
    public function GetSearchQuestionForShowOnly($search) {

        $data = array();
        if ($search->QuestionType != null) {
            $data['QuestionType'] = $search->QuestionType;
        }
        if ($search->QuestionSubject != null) {
            $data['QuestionSubject'] = $search->QuestionSubject;
        }
        //Get Limit of Question from setting db
        //$setting = $this->db->get('setting')->row();

        $this->db->where($data);
        //$this->db->order_by('rand()');
        //$this->db->limit($search->Limit,$search->StartFrom);
        $OnlyQuestion = $this->db->get("question")->result();

        $this->db->select('q.QId,q.Question,mcq.MCQId,mcq.MCQ,mcq.Answer,0 as Selected');
        $this->db->from('question as q');
        $this->db->where($data);
        $this->db->join('mcqandans as mcq', 'mcq on mcq.QId=q.QId', 'left');
        $this->db->order_by('rand()');

        $AllQuestion = $this->db->get()->result();


        $Result = array(
            "OnlyQuestion" => $OnlyQuestion,
            "AllQuestion" => $AllQuestion,
        );
        return $Result;
    }

//Search Question for Exam
    public function GetSearchQuestion($XmId) {

        $BatchID = $_SESSION['BatchID'];
        //Get Limit of Question from setting db
        $setting = $this->db->query("SELECT Time, ResultView FROM `setexam` WHERE BatchID=$BatchID and  SetID=$XmId and  Status=1")->row();


        //$this->db->order_by('rand()');
        //$this->db->limit($setting->NumberofQuestion);
        $OnlyQuestion = $this->db->query("select * from setquestionforexamcollection as setqcol
                                            left JOIN question q on q.QId=setqcol.QuestionID 
                                            LEFT join setexam setex on setex.ExamCollectionID=setqcol.ExamCollectionID
                                            left join examcollection ecol on ecol.Id =setex.ExamCollectionID
                                            where setex.BatchID= $BatchID and setex.SetID=$XmId and  setex.Status=1 ORDER BY RAND()")->result();

        $AllQuestion = $this->db->query("select *, 0 as Selected from setquestionforexamcollection as setqcol "
                        . "left JOIN question q on q.QId=setqcol.QuestionID  "
                        . "LEFT join setexam setex on setex.ExamCollectionID=setqcol.ExamCollectionID "
                        . "left join examcollection ecol on ecol.Id =setex.ExamCollectionID "
                        . "left join mcqandans mcqA on mcqA.QId= setqcol.QuestionID "
                        . "where setex.BatchID = $BatchID  and setex.SetID=$XmId and  setex.Status=1 ORDER BY RAND()")->result();


        $Result = array(
            "OnlyQuestion" => $OnlyQuestion,
            "AllQuestion" => $AllQuestion,
            "setting" => $setting
        );
        return $Result;
    }
    
    public function GetExamList()
    {   
        $studentID= $_SESSION['StudentID'];
        $batchID=$_SESSION['BatchID'];
        return $this->db->query("SELECT sx.SetID, sx.Status as Status2, sx.Time, ex.ExamName, sx.ExDate, (IF(sx.Status=3,'Examed', IF(sx.Status=2,'InActive','Active'))) as Status FROM setexam sx LEFT join ExamName as ex on ex.ExNId=sx.ExamNameID where sx.BatchID=$batchID")->result();
         //return $this->db->query("SELECT sx.ExamCollectionID, sx.SetID, sx.Status as Status2, sx.Time, ex.ExamName, sx.ExDate, (IF(sx.Status=3,'Examed', IF(sx.Status=2,'InActive','Active'))) as Status FROM setexam sx LEFT join ExamName as ex on ex.ExNId=sx.ExamNameID INNER join examresult er on er.ExamCollectionID!=sx.ExamCollectionID where sx.BatchID=$batchID and er.UserID=$studentID")->result();
    }
    
    public function IsStudentAllowedForThisExam($ExamID)
    {
        $studentID= $_SESSION['StudentID'];
        $batchID=$_SESSION['BatchID'];
        
        $host = gethostbyaddr($_SERVER["REMOTE_ADDR"]); 
        
        $CountsresultExist= $this->db->query("SELECT COUNT(er.ERId) as Count FROM examresult er left join setexam as sx on sx.ExamCollectionID=er.ExamCollectionID WHERE er.UserID=$studentID and sx.BatchID=$batchID and sx.SetID=$ExamID")->row();
        $CountsAttendanceExist= $this->db->query("SELECT COUNT(sx.ExAttendID) as Count from StudentExamAttendHistory sx WHERE sx.ExamID=$ExamID  and sx.SID=$studentID")->row();
        
        if($CountsresultExist->Count!=0 || $CountsAttendanceExist->Count!=0 )
        {
            return 1;
        }
        else
        {
            return 0;
        }
        
            
        
        
    }
    
     public function QuestionTemplate($SetID)
    {   
        
         return $this->db->query("SELECT sx.QuestionTemplate as QuestionTemplate FROM setexam as sx WHERE sx.SetID=$SetID")->row();
    }
    
    public function GetIPForThisExam($SetID)
    {   
        
         return $this->db->query("SELECT sx.IPCheckActivation as IPAddress FROM setexam as sx WHERE sx.SetID=$SetID")->row();
    }
    

    //Save Result
    public function SaveExamResult($result) {
        $BatchID = $_SESSION['BatchID'];

        //find active exam id
        //$ExamCollectionID = $this->db->query("SELECT excol.Id FROM setexam as setxm left JOIN examcollection excol on excol.Id=setxm.ExamCollectionID where setxm.BatchID= $BatchID and  setxm.Status=1 ")->row();
        
        $ExamCollectionID = $this->db->query("SELECT sx.ExamCollectionID as Id FROM setexam sx WHERE sx.SetID=$result->ExamID and sx.Status=1")->row();

        $NewDetail = array();
        
        foreach($result->AllDetail as $Detail) {
           
                    $NewDetail[] = array(
                        "BatchID" => $Detail->BatchID,
                        "UserID" => $_SESSION['StudentID'],
                        "ExamCollectionID" => $Detail->ExamCollectionID,
                        "Question" => $Detail->Question,
                        "MCQ" => $Detail->MCQ,
                        "Selected" => $Detail->Selected,
                        "Answer" => $Detail->Answer,
                        "QuestionID" => $Detail->QuestionID,
                        "SetID" => $Detail->SetID,
                        "ExamNameID" => $Detail->ExamNameID,
                        
                    );
                       
            }
            
           // echo $NewDetail;
        
        $date = date('Y-m-d H:i:s');
        $data = array(
            "UserID" => $_SESSION['StudentID'],
            "ExamDate" => $date,
            "TotalQuestion" => $result->TotalQuestion,
            "Selected" => $result->Selected,
            "Correct" => $result->Correct,
            "ExamCollectionID" => $ExamCollectionID->Id,
            "BatchID"=>$BatchID
        );
        
        
        // search. is this exam already attend this student.
        $duplicateSearch = array(
            "UserID" => $_SESSION['StudentID'],
            "ExamCollectionID" => $ExamCollectionID->Id
        );

        $this->db->where($duplicateSearch);
        $IsExist = $this->db->count_all_results("examresult");
      
        if ($IsExist < 1) {
            $this->db->Insert("examresult", $data);
            
            //foreach($NewDetail as $Detail) {
                $this->db->insert_batch("ResultWithDetailIndividual", $NewDetail);
            
           // }
            return $NewDetail;
        } else {
             return "Exam not Saved. you already attend this exam before. contact with examiner";
        }
    }
    
     public function UpdateTempTableWithSomeExamInfo($result) {
        $BatchID = $_SESSION['BatchID'];

          
        $ExamCollectionID = $this->db->query("SELECT sx.ExamCollectionID as Id, sx.SetID FROM setexam sx WHERE sx.SetID=$result->ExamID and sx.Status=1")->row();

        
        $date = date('Y-m-d H:i:s');
        $data = array(
            "UserID" => $_SESSION['StudentID'],
            "ExamSetID" => $result->ExamID,
             "BatchID"=>$BatchID,
           // "TotalQuestion" => $result->TotalQuestion,
            "Selected" => $result->Selected,
         //   "Correct" => $result->Correct,
            "ExamCollectionID" => $ExamCollectionID->Id,
            "BatchID"=>$BatchID
        );
        
        // search. is this exam already attend this student.
        $duplicateSearch = array(
            "UserID" => $_SESSION['StudentID'],
            "ExamCollectionID" => $ExamCollectionID->Id
        );

        $this->db->where($duplicateSearch);
        $IsExist = $this->db->count_all_results("UpdateTempTableWithSomeExamInfo");
      
        if ($IsExist < 1) {
            $this->db->Insert("UpdateTempTableWithSomeExamInfo", $data);

        } else {
           
            $data = array(
            "Selected" => $result->Selected,
             "Correct" => $result->Correct
            );
             
             $WhereSearch = array(
                "UserID" => $_SESSION['StudentID'],
                "ExamCollectionID" => $ExamCollectionID->Id
            );

            $this->db->where($WhereSearch);
           
            $result = $this->db->update("UpdateTempTableWithSomeExamInfo", $data);
           
        }
    }
    

    //Exam History
    public function GetAllExamHistory($batch,$ExamModule) {
//        $Result = $this->db->query("SELECT * , (er.Correct+er.Theory+er.Practical)as totalAmount FROM examresult  as er 
//LEFT JOIN student st on st.SID=er.UserID LEFT JOIN setexam se on se.BatchID=st.BatchID 
//LEFT JOIN examcollection ec on ec.Id=se.ExamCollectionID left JOIN batch b on b.Id=st.BatchID
//WHERE st.BatchID=$batch and se.Status=3  ORDER BY st.RegNO asc")->result();
    
        $data = array(
        "Result" => $this->db->query("SELECT *,  if(er.Attendance=0,'Absent','Present') as Attendance, (se.MCQMarks*er.Correct/er.TotalQuestion) as MCQMarksGet, ((se.MCQMarks*er.Correct/er.TotalQuestion)+er.Theory+er.Practical)as totalAmount FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=$batch  and exc.ExamNameID=$ExamModule  ORDER BY st.RegNO asc")->result(),
        "Absent" => $this->db->query("SELECT DISTINCT st1.Name,st1.RegNO, st1.Mobile from student st1 WHERE st1.BatchID=$batch and st1.RegNO not IN( SELECT st.RegNO FROM examresult as er LEFT JOIN setexam se on se.ExamCollectionID=er.ExamCollectionID and se.BatchID=er.BatchID LEFT JOIN student st on st.SID=er.UserID LEFT JOIN batch b on b.Id=se.BatchID left JOIN examcollection exc on exc.Id=er.ExamCollectionID left join ExamName exn on exn.ExNId=se.ExamNameID WHERE er.BatchID=$batch and exc.ExamNameID=$ExamModule )")->result(),
        "DetailResult"=>$this->db->query("SELECT * FROM ResultWithDetailIndividual as RDI WHERE RDI.BatchID=$batch and RDI.ExamNameID=$ExamModule")->result(),
        "AnalysisDetail"=>$this->db->query("SELECT r.Question, qs.Name as SubjectName ,SUM(if(r.Answer=1,1,0)) as Correct, SUM(if(r.Answer=0,1,0)) as Incorrect, (SUM(if(r.Answer=1,1,0))/ COUNT(r.UserID))*100 as Percentage FROM ResultWithDetailIndividual as r LEFT JOIN question as q ON q.QId=r.QuestionID LEFT JOIN questionsubject as qs on qs.Id=q.QuestionSubject  WHERE r.BatchID=$batch and r.ExamNameID=$ExamModule GROUP BY r.QuestionID, r.ExamCollectionID, r.SetID, r.ExamNameID ORDER BY qs.Id")->result(),
        "Analysis"=>$this->db->query("SELECT SUM(if(Answer=1,1,0)) as Correct, SUM(if(Answer=0,1,0)) as Incorrect, (SUM(if(Answer=1,1,0))/ COUNT(UserID))*100 as Percentage FROM `ResultWithDetailIndividual` WHERE BatchID=$batch and ExamNameID=$ExamModule")->row(),
        "AnalysisQuestionSubjectWise"=>$this->db->query("SELECT qs.Name as SubjectName ,SUM(if(r.Answer=1,1,0)) as Correct, SUM(if(r.Answer=0,1,0)) as Incorrect, (SUM(if(r.Answer=1,1,0))/ COUNT(r.UserID))*100 as Percentage FROM ResultWithDetailIndividual as r LEFT JOIN question as q ON q.QId=r.QuestionID LEFT JOIN questionsubject as qs on qs.Id=q.QuestionSubject WHERE r.BatchID=$batch and r.ExamNameID=$ExamModule GROUP BY qs.Id ORDER BY qs.Id")->result(),
        );
        return $data;
    }
    
     #for Gaming Mode Result
    public function RealtimeExamInfo($ExamID) {
       
       // $result = $this->db->query("SELECT s.Name, b.Batch, s.RegNO,s.Photo, sxa.Selected,sxa.Correct FROM UpdateTempTableWithSomeExamInfo as sxa LEFT JOIN student s on s.SID=sxa.UserID left join setexam sx on sx.SetID=$ExamID LEFT JOIN batch b on b.Id=s.BatchID WHERE sxa.ExamCollectionID=sx.ExamCollectionID ORDER BY ((sxa.Correct/sxa.Selected)*100) DESC limit 4")->result();
        // $result = $this->db->query("SELECT s.Name, b.Batch, s.RegNO,s.Photo, sxa.Selected,sxa.Correct , ((sxa.Correct+(sxa.Correct/sxa.Selected))-((sxa.Selected-sxa.Correct)*0.25)) as Point FROM UpdateTempTableWithSomeExamInfo as sxa LEFT JOIN student s on s.SID=sxa.UserID left join setexam sx on sx.SetID=$ExamID LEFT JOIN batch b on b.Id=s.BatchID WHERE sxa.ExamCollectionID=sx.ExamCollectionID ORDER BY ((sxa.Correct+(sxa.Correct/sxa.Selected))-((sxa.Selected-sxa.Correct)*0.25)) DESC limit 4")->result();
         $result = $this->db->query("SELECT s.Name, b.Batch, s.RegNO,s.Photo, sxa.Selected,sxa.Correct , ((sxa.Correct+(sxa.Correct/sxa.Selected))-((sxa.Selected-sxa.Correct)*0.25)) as Point FROM UpdateTempTableWithSomeExamInfo as sxa LEFT JOIN student s on s.SID=sxa.UserID LEFT JOIN batch b on b.Id=s.BatchID WHERE sxa.ExamSetID=$ExamID ORDER BY ((sxa.Correct+(sxa.Correct/sxa.Selected))-((sxa.Selected-sxa.Correct)*0.25)) DESC limit 20")->result();

        return $result;
    }
    
    //Get Exam Name for Dropdown by ExamID in Result Section
    
     public function GetAllExamByBatchID($batch) {
       // $data = $this->db->query("SELECT sx.SetID, en.ExNId, en.ExamName ,  sx.BatchID, exc.ExamCollection FROM setexam sx left join examcollection exc on exc.Id=sx.ExamCollectionID left join ExamName as en on en.ExNId=exc.ExamNameID WHERE sx.BatchID =$batch ")->result();
       $data = $this->db->query("SELECT sx.SetID, en.ExNId, en.ExamName, ea.Status, sx.BatchID, exc.ExamCollection FROM setexam sx left join examcollection exc on exc.Id=sx.ExamCollectionID left join ExamName as en on en.ExNId=exc.ExamNameID LEFT join examactive ea on ea.ID=sx.Status WHERE sx.BatchID =$batch ")->result();
        return $data;
    }
    
     public function GetAllExamHistoryForStudentLogin($SID) {
//        $Result = $this->db->query("SELECT * FROM examresult as er LEFT JOIN student st on st.SID=er.UserID LEFT JOIN setexam se on se.BatchID=st.BatchID LEFT JOIN examcollection ec on ec.Id=se.ExamCollectionID left JOIN batch b on b.Id=st.BatchID WHERE st.RegNO='9999' and se.Status=3 ORDER BY st.RegNO asc")->result();
        
        $Result = $this->db->query("SELECT en.ExamName , en.ExNId, er.* FROM examresult as er LEFT join examcollection as ec on ec.Id=er.ExamCollectionID LEFT JOIN ExamName as en on en.ExNId=ec.ExamNameID WHERE er.UserID ='$SID'")->result();
        return $Result;
    }

    public function UpdateResult($data) {

        $data2 = array(
            "Correct" => $data->Correct,
            "Theory" => $data->Theory,
            "Practical" => $data->Practical
        );
        $this->db->where(array('ERId' => $data->ERId));
        $result = $this->db->update("examresult", $data2);

        //$result = $this->db->get("batch")->result();
        return $result;
    }

    //Delete History
    public function DeleteExamHistory($id) {
        $this->db->where(array('ERId' => $id));
        $result = $this->db->delete('examresult');
        return $result;
    }

    //Delete Question
    public function DeleteQuestion($id) {
        //$this->db->where(array('QId'=>$id));
        $result = $this->db->delete('question', array('QId' => $id));

        //$this->db->where(array('QId'=>$id));
        $result2 = $this->db->delete('mcqandans', array('QId' => $id));
        return $result;
    }

    //Search Question for Show List only 
    public function GetSearchQuestionForSetCollection($search) {

        $data = array();
        if ($search->QuestionType != null) {
            $data['QuestionType'] = $search->QuestionType;
        }
        if ($search->QuestionSubject != null) {
            $data['QuestionSubject'] = $search->QuestionSubject;
        }
        //Get Limit of Question from setting db
        //$setting = $this->db->get('setting')->row();

        $this->db->where($data);
        //$this->db->order_by('rand()');
        //$this->db->limit($search->Limit,$search->StartFrom);
        $OnlyQuestion = $this->db->get("question")->result();




        $Result = array(
            "OnlyQuestion" => $OnlyQuestion
        );
        return $Result;
    }

    public function GetSetQuestionForExamCollection($id) {

        $result = $this->db->query("SELECT sec.*, q.QuestionSubject, q.Question, qt.Type as QType, qs.Name as QSubject from setquestionforexamcollection sec left join question q on q.QId=sec.QuestionID left join questiontype qt on qt.Id=q.QuestionType left join questionsubject qs on qs.Id=q.QuestionSubject WHERE sec.ExamCollectionID=$id order by q.QuestionSubject, q.QuestionType")->result();
        return $result;
    }

    public function SaveQuestionForExamCollection($question) {

        foreach ($question as $Q) {
            $data = array();
            if ($Q->Selected == true) {
                $data = array(
                    "ExamCollectionID" => $Q->ExamCollectionID,
                    "QuestionID" => $Q->QId
                );

                $this->db->where($data);
                $countSub = $this->db->count_all_results('setquestionforexamcollection');

                if ($countSub == 0) {
                    $this->db->Insert("setquestionforexamcollection", $data);
                }
            }
        }
    }
    
    public function AutoGenerateQuestionSet($All) {
        
        $Question=$All->QuestionInfo;
        $SetName=$All->ExamCollectionID;
        
        $ExamSetIsAlreadyExistORNot = $this->db->query("SELECT COUNT(SetQID) as Count FROM `setquestionforexamcollection` WHERE ExamCollectionID=$SetName")->row();
        
        if($ExamSetIsAlreadyExistORNot->Count>0)
        {
            return 0;   //Already Exist message will be shown in UI
        }
        else
        {
        $query = $this->db->query("Create TEMPORARY TABLE Temp Like question");
        
        //$this->db->query("ALTER TABLE Temp ADD SetName INT NOT NULL DEFAULT 0");
        
        $Result=array();
        
        foreach ($Question as $Q) {
             
             if($Q->QuestionSubject===true)
             {
                 $this->db->query("Insert Into Temp (SELECT * from question as q WHERE q.QuestionSubject=$Q->Id and q.QuestionType=$Q->QuestionType ORDER BY RAND() LIMIT $Q->QNumber)");
             }
         }
         
        $Result = $this->db->query("SELECT  q.QId, q.Question, qs.Name as QuestionType, qt.Type as Complexity, $SetName as SetName FROM Temp as q LEFT join questionsubject qs on qs.Id=q.QuestionSubject left join questiontype qt on qt.Id=q.QuestionType order by QuestionType DESC")->result();

      
        $query = $this->db->query("DROP TABLE IF EXISTS Temp");    
      
        return $Result;
        }
        
       
    }
    
    public function SaveAutoGeneratedQuestion($question)
    {
        $newArray=array();
        
         foreach ($question as $Q) {
             
            $newElement = array(
              "SetQID"=>0,
              "ExamCollectionID"=>$Q->SetName,
              "QuestionID"=>$Q->QId
            );
            
            $newArray[]=$newElement;
             
            
         }
         
        $result=$this->db->insert_batch("setquestionforexamcollection", $newArray); 
        
        return $newArray;
    }
        
        
        

    //Delete Question
    public function DeleteSetQuestion($id) {
        //$this->db->where(array('QId'=>$id));
        $result = $this->db->delete('setquestionforexamcollection', array('SetQID' => $id));

        return $result;
    }
    
    #region Srudent Exam Attendance
     public function GetAllStudentLoginHistory($ExamID) {
       
        $result = $this->db->query("SELECT sxa.*, s.Name, b.Batch, s.RegNO,s.Photo, ex.ExamName, ISNULL(er.ERId) as Status2, if(ISNULL(er.ERId)>0,'Running','Completed') as Status, er.Selected,er.Correct , sxa.PauseStatus, sxa.StopStatus FROM StudentExamAttendHistory as sxa LEFT JOIN student s on s.SID=sxa.SID left join setexam sx on sx.SetID=sxa.ExamID LEFT JOIN ExamName ex on ex.ExNId=sx.ExamNameID LEFT JOIN batch b on b.Id=s.BatchID LEFT JOIN examresult er on er.UserID=s.SID and er.ExamCollectionID=sx.ExamCollectionID WHERE sxa.ExamID=$ExamID ORDER BY ISNULL(er.ERId) DESC, s.RegNO ASC")->result();

        return $result;
    }
    
    #Admin Side
    public function PauseStopExam($SExamid, $type,$status)
    {
        
        if($type==1)        //for Pause type ==1 decleared in view button stop 
        {
            if($status==0)  //Status 0 for start 1 for Pause
            {
               $data1 = array(
                "PauseStatus" => 1,
                ); 
            }
            else
            {
                $data1 = array(
                "PauseStatus" => 0,
                );
            }
                
        }
        else if($type==2)   //for stop type ==2 decleared in view button stop
        {
            $data1 = array(
            "StopStatus" => 1,
            );
        }
        
        
        $this->db->where(array('EXAttendID' => $SExamid));
        $result = $this->db->update("StudentExamAttendHistory", $data1);

        //$result = $this->db->get("batch")->result();
        return $result;
    }
    
    #Student Side
    public function GetPauseStopStatus($ExAttendID)
    {
        $result = $this->db->query("SELECT sh.PauseStatus,sh.StopStatus from StudentExamAttendHistory as sh WHERE sh.ExAttendID=$ExAttendID")->row();

        return $result;
    }
   
    
    public function DeleteAttendanceExam($ExamAttendanceID) {
               
        $infoForDelateHistory = $this->db->query("SELECT sx.ExamCollectionID, sax.SID from StudentExamAttendHistory as sax LEFT join setexam sx on sx.SetID=sax.ExamID WHERE sax.ExAttendID='$ExamAttendanceID'")->row();
        
        $ExamCollectionID=$infoForDelateHistory->ExamCollectionID;
        $UserID=$infoForDelateHistory->SID;
        
       //$DeleteResult = $this->db->delete('examresult', array('ExamCollectionID' => $infoForDelateHistory->ExamCollectionID, 'UserID' => $infoForDelateHistory->SID));
        
        $infoForDelateHistory = $this->db->query("DELETE  FROM examresult WHERE ExamCollectionID='$ExamCollectionID' and UserID='$UserID'");
        
        $result = $this->db->delete('UpdateTempTableWithSomeExamInfo', array('ExamCollectionID' => $ExamCollectionID,'UserID'=>$UserID));
        $result = $this->db->delete('StudentExamAttendHistory', array('ExAttendID' => $ExamAttendanceID));
        
        $infoForDelateHistory = $this->db->query("DELETE  FROM ResultWithDetailIndividual WHERE ExamCollectionID='$ExamCollectionID' and UserID='$UserID'");

        return $result;
    }

}

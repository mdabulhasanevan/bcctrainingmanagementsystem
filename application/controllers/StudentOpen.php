<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StudentOpen
 *
 * @author Evan DU
 */
class StudentOpen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
         if (!isset($_SESSION["IsStudentLoged"])) {
            $this->session->set_flashdata("successErr", "Please login first. ");
            redirect('Auth/StudentLogin');
        }
        $this->load->model("StudentPanel_Model", "SPM");
        $this->load->model("Student_Model", "SM");
        $this->load->model("Exam_Model", "ExM");
        $this->load->model("User_Model", "UM");
         $this->load->model("Setting_Model", "STM");
         $this->load->model('News_model', 'NM');
         $this->load->model('CommonModel', 'CM');
    }
    
     public function ip()
    {
       echo $host = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
    }

    #region Login and other student

   
    public function StudentDashBoard() {

        if ($_SESSION["IsStudentLoged"] != TRUE) {
            $this->session->set_flashdata("successErr", "Please login first. ");
            redirect('StudentOpen/StudentLogin');
        }
        
        $data["Info"] = $this->NM->GetAllNewsAndNotice();
        $data["Quotes"] = $this->CM->GetAllQuotes();
        $data["ExamList"]=$this->ExM->GetExamList();
        $data["Title"] = "Student DashBoard ";
        $this->load->view('Include/LeftMenuStudent', $data);
        $this->load->view('Student/StudentPanel/Dashboard');
    }
    
    public function ExamResultChartDataForStudent($ExamID) 
    {
        $data=$this->CM->ExamResultChartDataForStudent($ExamID);
        echo json_encode($data);
    }
    
     public function GetAllExamHistoryForStudentLogin() {  //Get All Exam Result For Student dashboard after Login
        $SID=$_SESSION['StudentID'];
        $data = $this->ExM->GetAllExamHistoryForStudentLogin($SID);
        echo json_encode($data);
    }
   
    public function BatchStudentsList()    // Own batch Students List will appear here
    {
        $BatchID=$_SESSION['BatchID'];
        $data=$this->SM->BatchStudentsList($BatchID);
        echo json_encode($data);
    }
    
    
    # StudentTraining Syllabus menu 
     public function StudentTrainingSyllabus() {

        if ($_SESSION["IsStudentLoged"] != TRUE) {
            $this->session->set_flashdata("successErr", "Please login first. ");
            redirect('StudentOpen/StudentLogin');
        }
        
       // $data["Info"] = $this->SM->StudentTrainingSyllabus();
       
        $data["Title"] = "Student Training  Syllabus";
        $this->load->view('Include/LeftMenuStudent', $data);
        $this->load->view('Student/StudentPanel/StudentTrainingSyllabus');
    }

    public function GetStudentTrainingSyllabus() {
        
        $UserID=$_SESSION['StudentID'];
        $data = $this->SPM->GetStudentTrainingSyllabus($UserID);
        echo json_encode($data);
    }

    #StudentTrainingSyllabus End
    
    #exam

    public function TakeExam() {
        //$this->checkuserRole(uri_string());
        
        $ExamID= $this->input->post('ExamID');
        $GEO= $this->input->post('GEO');
        
        $IsStudentAllowedForThisExam=$this->ExM->IsStudentAllowedForThisExam($ExamID);
        
        $QuestionTemplate=$this->ExM->QuestionTemplate($ExamID);
        
        $GetIPForThisExam=$this->ExM->GetIPForThisExam($ExamID)->IPAddress;   //get IP From SetExam like 103.101.197.237,103.101.197.236
        
        $MultipleIPSeparetedByCommaConvertedToArray= explode (",", $GetIPForThisExam); //Converted IP or multiple IP separeted by comma  that get from SetExam  make an Array
        
        $LabIPAddress=$this->UM->get_IP_address();   //Student IP from where Login
       
       if(isset($GetIPForThisExam) && $GetIPForThisExam!=null || !empty($GetIPForThisExam) )  //Try to understend that SetExam IP is setted or null 
       {
            $IsIPMatched=array_search($LabIPAddress,$MultipleIPSeparetedByCommaConvertedToArray);  //Search Student IP is existed in SetExam IP Array
            
           if(is_numeric($IsIPMatched))
           {
               $IPMatched=1;  //1 for Matched or IP not mendatory
           }
           else
           {
                $IPMatched=0;  //IP Not Matched
           }
       }
       else
       {
           $IPMatched=1; //1 for Matched or IP not mendatory
       }
        
        //if IP Matched then
        
        if($IPMatched==1)    //if matched IP
        {
            if($IsStudentAllowedForThisExam<=0 )
            {
            
                //keep history for attend exam
                $ExAttendID = $this->UM->StudentExamAttendHistory($ExamID,$GEO);
                
                //end hstory
                    
                $data["ExamID"]=$ExamID; 
                $data["ExAttendID"]=$ExAttendID;
                $data["Title"] = "Start Exam";
                $this->load->view('Include/LeftMenuStudentExamTime', $data);
            
                if($QuestionTemplate->QuestionTemplate==1) 
                {
                    $this->load->view("Student/StudentPanel/TakeExam"); //All question in one page
                }
                else if($QuestionTemplate->QuestionTemplate==2){
                    $this->load->view("Student/StudentPanel/TakeExam_version_2_templateSlide"); //Slide one question per slide
                }
                 else if($QuestionTemplate->QuestionTemplate==3){
                    $this->load->view("Student/StudentPanel/TakeExam_version_3_templateGaming"); //Slide one question per slide Gaming mode
                }
                else {
                    $this->load->view("Student/StudentPanel/TakeExam");
                }
                
            }
            else
            {
                $this->session->set_flashdata("successErr", "You have already Attended This Exam or Something went wrong. please contact with Exam Host. ");
                redirect("StudentOpen/StudentDashBoard");
            }
        }
        else
        {
            $this->session->set_flashdata("successErr", "IP Not matched!! May be you are not in Exam Lab Network. please contact with Exam Host. ");
            redirect("StudentOpen/StudentDashBoard");
        }
    }

    public function GetSearchQuestion($XmId) {

        $data = $this->ExM->GetSearchQuestion($XmId);
        echo json_encode($data);
    }
    
    public function GetPauseStopStatus($ExAttendID)
    {
        $data = $this->ExM->GetPauseStopStatus($ExAttendID);
        echo json_encode($data);
    }

    public function SaveExamResult() {
        $postdata = file_get_contents("php://input");
        $result = json_decode($postdata);


        $data = $this->ExM->SaveExamResult($result);
        echo json_encode($data);
    }
    
    public function UpdateTempTableWithSomeExamInfo() {  //Like Slected item correct etc
        $postdata = file_get_contents("php://input");
        $result = json_decode($postdata);


        $data = $this->ExM->UpdateTempTableWithSomeExamInfo($result);
        echo json_encode($data);
    }
    
   
    
    public function GetAllLiveClass() {
        $BID=$_SESSION['BatchID'];
        $data = $this->STM->GetAllLiveClass($BID);
        echo json_encode($data);
    }
   
   
}

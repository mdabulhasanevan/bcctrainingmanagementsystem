<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Exam
 *
 * @author Evan DU
 */
class Exam extends CI_Controller {

    //view
    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION["User_loged"])) {
            $this->session->set_flashdata("successErr", "Please login first. ");
             $encoded_uri = preg_replace('"/"', '_', $_SERVER['REQUEST_URI']);
            redirect('Auth/login/'.$encoded_uri); 
        }
        $this->load->model("Exam_Model", "ExM");
          $this->load->model("VisitorModel","VR");
    }

//Check User Role
    public function CheckUserRole($uri) {
        $this->load->model("User_Model", "User");
        
        //for tracking visitors
         $this->VR->SaveVisitorHistory();
        
        $IsOk = $this->User->CheckUserRole($uri);
        if ($IsOk != TRUE) {
            redirect("Auth/Restricted");
        }
    }

    public function CreateQuestion() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "CreateQuestion ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view("Exam/CreateQuestion");
    }

    public function QuestionList() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Question List ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view("Exam/QuestionList");
    }

    public function TestExam() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Test Exam";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view("Exam/TestExam");
    }

    public function SetQuestionForExamCollection() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Set Question For Exam Collection ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view("Exam/SetQuestionForExamCollection");
    }

    //API


    public function GetSearchQuestionForShowOnly() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $data = $this->ExM->GetSearchQuestionForShowOnly($request);
        echo json_encode($data);
    }

    public function GetSearchQuestion() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $data = $this->ExM->GetSearchQuestion($request);
        echo json_encode($data);
    }

    public function DeleteQuestion($id) {
        $data = $this->ExM->DeleteQuestion($id);
        echo json_encode($data);
    }

    public function SaveExamResult() {
        $postdata = file_get_contents("php://input");
        $result = json_decode($postdata);


        $data = $this->ExM->SaveExamResult($result);
        echo json_encode($data);
    }

    public function SaveCreateQuestion() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $data = $this->ExM->SaveCreateQuestion($request);
        echo json_encode($request);
    }

    public function GetAllExamTypeField() {
        $data = $this->ExM->GetAllExamTypeField();
        echo json_encode($data);
    }
   

    public function GetSearchQuestionForSetCollection() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $data = $this->ExM->GetSearchQuestionForSetCollection($request);
        echo json_encode($data);
    }

    public function GetSetQuestionForExamCollection($id) {
        $data = $this->ExM->GetSetQuestionForExamCollection($id);
        echo json_encode($data);
    }

    public function SaveQuestionForExamCollection() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $data2 = $this->ExM->SaveQuestionForExamCollection($request);
        echo json_encode($data2);
    }
    
    public function AutoGenerateQuestionSet() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $data2 = $this->ExM->AutoGenerateQuestionSet($request);
        echo json_encode($data2);
    }
    
    public function SaveAutoGeneratedQuestion() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $data2 = $this->ExM->SaveAutoGeneratedQuestion($request);
        echo json_encode($data2);
    }

    public function DeleteSetQuestion($id) {
        $data = $this->ExM->DeleteSetQuestion($id);
        echo json_encode($data);
    }

    #region Set Question List

    function SetQuestionList() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Set Question for  Exam";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view("Exam/SetQuestionList");
    }

    #region Result

    public function ExamHistory() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Exam History";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view("Exam/ExamHistory");
    }

    public function GetAllExamHistory($batchId,$ExamModule) {
        $data = $this->ExM->GetAllExamHistory($batchId,$ExamModule);
        echo json_encode($data);
    }

    public function UpdateResult() {

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $data = $this->ExM->UpdateResult($request);
        echo json_encode($data);
    }

    public function DeleteExamHistory($id) {
        $data = $this->ExM->DeleteExamHistory($id);
        echo json_encode($data);
    }
    
     public function GetAllExamByBatchID($id) {
        $data = $this->ExM->GetAllExamByBatchID($id);
        echo json_encode($data);
    }

    #end Region Result
    
    #region Attendance
     public function StudentExamLogin() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Exam History";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view("Exam/StudentExamLogin");
    }

    public function GetAllStudentLoginHistory($ExamID) {
        $data = $this->ExM->GetAllStudentLoginHistory($ExamID);
        echo json_encode($data);
    }
    
    public function RealtimeExamInfo($ExamID) {
        $data = $this->ExM->RealtimeExamInfo($ExamID);
        echo json_encode($data);
    }
    
    public function PauseStopExam($SExamid, $type,$status)
    {
        $data = $this->ExM->PauseStopExam($SExamid, $type,$status);
        echo json_encode($data);
    }
    
    public function DeleteAttendanceExam($ExamAttendanceID) {
        $data = $this->ExM->DeleteAttendanceExam($ExamAttendanceID);
        echo json_encode($data);
    }
    
    
    #region Pdf Result
    public function GetAllExamResultBatchWise($batchId) {
        $data = $this->ExM->GetAllExamResultBatchWise($batchId);
        
        $Result=$data['Result'];
        $ExamList=$data['ExamList'];
        
        for($i=0;$i<$ExamList.count();$i++)
        {
            
            for($j=0;$j<$Result.count();$j++)
            {
                
                if($Result[$j].ExNId==$ExamList[$i].ExNId)
                {
                    
                }
                else
                {
                    
                }
                
                
            }
            
            
        }
        
        
        echo json_encode($data['ExamList']);
    }
    
}

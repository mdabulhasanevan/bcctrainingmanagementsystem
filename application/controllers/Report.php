<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SMS
 *
 * @author Evan DU
 */
class Report extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
         
        if(!isset($_COOKIE["loginCookie"]))
        {
             $this->session->set_flashdata("successErr","Please login first. ");
              $encoded_uri = preg_replace('"/"', '_', $_SERVER['REQUEST_URI']);
            redirect('Auth/login/'.$encoded_uri); 
        }   
        
       $this->load->model("Report_Model","RM");
       $this->load->library("Pdf_report","pdf");
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

   
    public function FiscalYearReport() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Fiscal Year Report ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Report/FiscalYearReport');
    }
    
    
    public function GetAllFiscalYear($from,$to)
    {
         $result = $this->RM->GetAllFiscalYearReport($from,$to);
        echo json_encode($result);
    }
    
    
    public function CalendarYearReport() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Calender Year Report ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Report/CalendarYearReport');
    }
    
    
    public function GetAllCalendarYear($from,$to)
    {
        $result = $this->RM->GetAllCalenderYearReport($from,$to);
        echo json_encode($result);
    }
    
    
    # region batch wise report
    
     public function BatchWiseReport() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Batch Wise Report";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Report/BatchWiseReport');
    }
    
     # region Month wise report
    
     public function MonthlyReport() {
         
        $this->checkuserRole(uri_string());
        $data["Title"] = "Monthly Report ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Report/MonthlyReport');
    }
    
    
    public function GetBatchMonthlyReport($monthFrom,$monthTo) {
        
        $result = $this->RM->GetBatchMonthlyReport($monthFrom,$monthTo);
        echo json_encode($result);
    }
    
    
      # region Current Status  report
    
     public function CurrentStatusReport() {
         
        $this->checkuserRole(uri_string());
        $data["Title"] = "Current Status Report";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Report/GetCurrentStatusReport');
    }
   
    
    public function GetCurrentStatusReport($monthFrom,$monthTo) {
        
        $result = $this->RM->GetCurrentStatusReport($monthFrom,$monthTo);
        echo json_encode($result);
    }
    
    
      public function BatchWiseResult() {
         $this->checkuserRole(uri_string());
        $data["Title"] = "Batch Wise Individual Result";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view("Report/BatchWiseIndividualResult");
       
    }
    
     public function GetBatchWiseResult($BatchId) {
        
        $result = $this->RM->GetAllExamResultBatchWise($BatchId);
        
        $StudentList=$result["StudentList"];
        $ExamList=$result["ExamList"];
        $ResultList=$result["Result"];
          
        $FinalList = array();
          
        for($i=0;$i<count($StudentList);$i++)
        {
            $x=0;
            for($m=0;$m<count($ResultList);$m++)
            {
                               
                if($StudentList[$i]->SID==$ResultList[$m]->SID)
                {
                    $x++;
                }
            }
            for($j=0;$j<count($ResultList);$j++)
            {
                
                if($StudentList[$i]->SID==$ResultList[$j]->SID)
                {
                   
                    $FinalList[$i][$j]= array(
                        "SID"=>$StudentList[$i]->SID,
                        "Name"=>$StudentList[$i]->Name,
                        "RegNO"=>$StudentList[$i]->RegNO,
                        "ExNId"=>$ResultList[$j]->ExNId,
                        "ExamName"=>$ResultList[$j]->ExamName,
                        "MCQMarksGet"=>$ResultList[$j]->MCQMarksGet,
                        "Theory"=>$ResultList[$j]->Theory,
                        "Practical"=>$ResultList[$j]->Practical,
                        "totalAmount"=>$ResultList[$j]->totalAmount,
                        "Attendance"=>$ResultList[$j]->Attendance,
                        );
                       
                }   
                
            }
            
            
        }
        
        echo json_encode($FinalList);
    }
    
    
      # region Student Location Report
     
     public function StudentLocationReport() {
         
        $this->checkuserRole(uri_string());
        $data["Title"] = "Student Location Report";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Report/StudentLocationReport');
    }
   
    
    public function GetStudentLocationReport($monthFrom,$monthTo) {
        
        $result = $this->RM->GetStudentLocationReport($monthFrom,$monthTo);
        echo json_encode($result);
    }
    
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student
 *
 * @author Evan DU
 */
class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($_SESSION["User_loged"])) {
            $this->session->set_flashdata("successErr", "Please login first. ");
             $encoded_uri = preg_replace('"/"', '_', $_SERVER['REQUEST_URI']);
            redirect('Auth/login/'.$encoded_uri); 
        }
        $this->load->model("Student_Model", "SM");
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

    public function Student() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Student List ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Student/StudentList');
    }
    
    
//    This is Certificate page controller
    public function Certificate() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Certificate List ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Student/Certificate');
    }
    
      public function CertificatePdfIndividual() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Certificate List ";
        
        $this->load->library("Pdf_report");
        $this->load->view('Student/CertificatePdfIndividual');
       
    }

    public function MyCertificatePdfIndividual($id) {
        //$this->checkuserRole(uri_string());
        
         $data['Info'] = $this->SM->GetIndividualStudentInfoForCertificate($id);

        // $data["Title"] = "Certificate PDF ";
        
        $this->load->library("Pdf_report");
        $this->load->view('Student/CertificatePdfIndividual', $data);
    }
    
    public function MyCertificatePdfMultiple($id) {
        //$this->checkuserRole(uri_string());
        
         $data['Students'] = $this->SM->GetMultipleStudentsInfoForCertificate($id);

        // $data["Title"] = "Certificate PDF ";
        
        $this->load->library("Pdf_report");
        $this->load->view('Student/CertificatePdfMultiple', $data);
    }
    
    
    
    #End Certificate
    
    //    This is Class Schedule page controller
    public function ClassSchedule() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "ClassSchedule List ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Student/ClassSchedule');
    }
    
    public function GetAllBatchSchedule($BatchID) {
        $result = $this->SM->GetAllBatchSchedule($BatchID);
        echo json_encode($result);
    }

    

    public function AddSchedule() {
        $Schedule = file_get_contents("php://input");
        $request = json_decode($Schedule);

        $result = $this->SM->AddSchedule($request);
        echo json_encode($result);
    }
    
    
    #End ClassSchedule
    

    public function GetAllStudent($id) {
        $result = $this->SM->GetAllStudent($id);
        echo json_encode($result);
    }

    public function DeleteStudent($id) {
        $result = $this->SM->DeleteStudent($id);
        echo json_encode($result);
    }
    
    public function CountStudentsByBatch($id) {
        $result = $this->SM->CountStudentsByBatch($id);
        echo json_encode($result);
    }
    
     public function GetIndividualExamResult($id) {
        $result = $this->SM->GetIndividualExamResult($id);
        echo json_encode($result);
    }

    public function AddStudent() {
      //  $postdata = file_get_contents("php://input");
      //  $request = json_decode($postdata);
        $request = json_decode($_POST['Studentinfo']);
        
          if(isset($_FILES['Img']['tmp_name']))
          {      $file = $_FILES['Img']['tmp_name'];
               $image = base64_encode(file_get_contents(addslashes($file)));
                $request->Photo=$image;
          }
     
        $result = $this->SM->AddStudent($request);
        echo json_encode($result);
    }

    public function UpdateStudent() {
        //$postdata = file_get_contents("php://input");
        //$request = json_decode($postdata);
        
         $request = json_decode($_POST['Studentinfo']);
        
          if(isset($_FILES['Img']['tmp_name']))
          {      $file = $_FILES['Img']['tmp_name'];
               $image = base64_encode(file_get_contents(addslashes($file)));
                $request->Photo=$image;
          }
        
        $result = $this->SM->UpdateStudent($request);
        echo json_encode($result);
    }
    
    public function GetAllStudentForDahsboardSearch($id) {
        $result = $this->SM->GetAllStudentForDahsboardSearch($id);
        echo json_encode($result);
    }
    
    public function UpdateStudentCertificate() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $result = $this->SM->UpdateStudentCertificate($request);
        echo json_encode($result);
    }
    
    

   

}

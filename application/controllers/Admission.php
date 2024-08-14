<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admission
 *
 * @author Evan DU
 */
class Admission extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        
        if (!isset($_SESSION["User_loged"])) {
            $this->session->set_flashdata("successErr", "Please login first. ");
            $encoded_uri = preg_replace('"/"', '_', $_SERVER['REQUEST_URI']);
            redirect('Auth/login/'.$encoded_uri); 
        }
        $this->load->model("Admission_model", "am");
            $this->load->model("VisitorModel","VR");
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');       
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

     #Admission Setup Start 

    public function AdmissionSetup() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Admission Setup  ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Admission/AdmissionSetup');
    }

    public function GetAllCourseAdmission($CourseID) {
        $result = $this->am->GetAllCourseAdmission($CourseID);
        echo json_encode($result);
    }

    public function DeleteCourseAdmission($id) {
        $result = $this->am->DeleteCourseAdmission($id);
        echo json_encode($result);
    }

    public function AddAdmissionSetup() {
        $CourseTitledata = file_get_contents("php://input");
        $request = json_decode($CourseTitledata);
        $result = $this->am->AddAdmissionSetup($request);
        echo json_encode($result);
    }

    public function UpdateAdmissionSetup() {
        $CourseTitledata = file_get_contents("php://input");
        $request = json_decode($CourseTitledata);

        $result = $this->am->UpdateAdmissionSetup($request);
        echo json_encode($result);
    }

  # Admission Setup End

 #Admission Registration List Start 

    public function AdmissionRegistrationList() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Admission RegistrationList";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Admission/AdmissionRegistrationList');
    }

    public function GetAllAdmissionBatch() {
        $result = $this->am->GetAllAdmissionBatch();
        echo json_encode($result);
    }
    
    public function GetAllAdmissionRegistrationList($AdmissionSetID) {
        $result = $this->am->GetAllAdmissionRegistrationList($AdmissionSetID);
        echo json_encode($result);
    }
    
    public function DeleteStudent($id) {
        $result = $this->am->DeleteStudent($id);
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
     
        $result = $this->am->AddStudent($request);
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
        
        $result = $this->am->UpdateStudent($request);
        echo json_encode($result);
    }
   

}

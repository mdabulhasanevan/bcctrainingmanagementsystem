<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Evan DU
 */
class user extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        if(!isset($_COOKIE["loginCookie"]))
        {
             $this->session->set_flashdata("successErr","Please login first. ");
              $encoded_uri = preg_replace('"/"', '_', $_SERVER['REQUEST_URI']);
            redirect('Auth/login/'.$encoded_uri); 
        }        
        $this->load->model("User_Model","UM");
        $this->load->model("CommonModel","CM");
         $this->load->model("VisitorModel","VR");
    }
     //Check User Role
    public function CheckUserRole($uri) {
        $this->load->model("User_Model", "User");
        //for tracking visitors
         $this->VR->SaveVisitorHistory();
        $IsOk = $this->User->CheckUserRole($uri);
        if ($IsOk != TRUE) { redirect("Auth/Restricted");}
    }
    public function index()
    {
        $this->load->model('FileSharing_Model', 'FS');
        $this->checkuserRole(uri_string());
         $data=  $this->CM->GetDashboard();
        $data["FileShared"]=$this->FS->GetAllFilesThatSharedWithMeForDashboard();
       
        
        
        $data["Title"]="Dashboard";          
        $this->load->view('Include/LeftMenuAdmin',$data);
        $this->load->view('user/dashboard');
    }
    
    public function GetUserGender()
    {
        $data=$this->UM->GetUserGender();
        echo json_encode($data);
    }
    
    public function GetDahsBoardHeaderInfoAll()
    {
        $data=$this->CM->GetDahsBoardHeaderInfoAll();
        echo json_encode($data);
    }
    
    
        //login history
    public function AllLoginHistory() {
        $this->checkuserRole(uri_string());

        $data["Title"] = "All Login History";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('user/AllLoginHistory');
    }

    public function GetAllLoginHistory() {
        echo json_encode($this->UM->AllLoginHistory());
    }

    public function GetStudentLoginHistory() {
        echo json_encode($this->UM->GetStudentLoginHistory());
    }
    public function GetPageVisitLoginHistory($id) {
        echo json_encode($this->UM->GetPageVisitLoginHistory($id));
    }
    public function DeleteLoginHistory() {
        echo json_encode($this->UM->DeleteLoginHistory());
    }
    
}

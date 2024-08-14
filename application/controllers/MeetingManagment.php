<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Setting
 *
 * @author Evan DU
 */
class MeetingManagment extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($_SESSION["User_loged"])) {
            $this->session->set_flashdata("successErr", "Please login first. ");
            $encoded_uri = preg_replace('"/"', '_', $_SERVER['REQUEST_URI']);
            redirect('Auth/login/'.$encoded_uri); 
        }
        $this->load->model("MeetingManagment_Model", "MM");
         $this->load->model("VisitorModel","VR");
     
    }

    //Check User Role
    public function CheckUserRole($uri) {
        $this->load->model("User_Model", "User");
        $IsOk = $this->User->CheckUserRole($uri);
        //for tracking visitors
         $this->VR->SaveVisitorHistory();
        if ($IsOk != TRUE) {
            redirect("Auth/Restricted");
        }
    }

    #region Meeting Lab

    public function Index() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Lab Info ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('MeetingManagment/MeetingRoomInfo');
    }

    public function GetAllLabInfo() {
        $result = $this->MM->GetAllLabInfo();
        echo json_encode($result);
    }

    public function DeleteLabInfo($id) {
        $result = $this->MM->DeleteLabInfo($id);
        echo json_encode($result);
    }

    public function AddLabInfo() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $result = $this->MM->AddLabInfo($request);
        echo json_encode($result);
    }

    public function UpdateLabInfo() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $result = $this->MM->UpdateLabInfo($request);
        echo json_encode($result);
    }

    #end Region
    
     #region Meeting Lab

    public function Meeting() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Meeting Managment ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('MeetingManagment/MeetingManagment');
    }

    public function GetAllMeeting() {
        $result = $this->MM->GetAllMeeting();
        echo json_encode($result);
    }

    public function DeleteMeeting($id) {
        $result = $this->MM->DeleteMeeting($id);
        echo json_encode($result);
    }

    public function AddMeeting() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $result = $this->MM->AddMeeting($request);
        echo json_encode($result);
    }

    public function UpdateMeeting() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $result = $this->MM->UpdateMeeting($request);
        echo json_encode($result);
    }

    #end Region
    
  

}

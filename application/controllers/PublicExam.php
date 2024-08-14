<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Setting
 *
 * @author Evan DU
 */
class PublicExam extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($_SESSION["User_loged"])) {
            $this->session->set_flashdata("successErr", "Please login first. ");
            redirect('Auth/login');
        }
        $this->load->model("PublicExam_Model", "Setting");

    }

    //Check User Role
    public function CheckUserRole($uri) {
        $this->load->model("User_Model", "User");
        $IsOk = $this->User->CheckUserRole($uri);
        if ($IsOk != TRUE) {
            redirect("Auth/Restricted");
        }
    }

    
    

    
      #region Batch

    public function Index() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Public Exam Batch ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('PublicExam/Batch');
    }

    public function GetAllBatch() {
        $result = $this->Setting->GetAllBatch();
        echo json_encode($result);
    }

    public function DeleteBatch($id) {
        $result = $this->Setting->DeleteBatch($id);
        echo json_encode($result);
    }

    public function AddBatch() {
        $postdata = file_get_contents("php://input");
          
        $request = json_decode($postdata);
         
        $result = $this->Setting->AddBatch($request);
        echo json_encode($result);
    }

    public function UpdateBatch() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
 
        $result = $this->Setting->UpdateBatch($request);
        echo json_encode($result);
    }

    #end Region
    
}
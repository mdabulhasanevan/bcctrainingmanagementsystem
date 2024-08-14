<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of CM
 *
 * @author Evan DU
 */
class ClassMaterials extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($_SESSION["User_loged"])) {
            $this->session->set_flashdata("successErr", "Please login first. ");
            $encoded_uri = preg_replace('"/"', '_', $_SERVER['REQUEST_URI']);
            redirect('Auth/login/'.$encoded_uri); 
        }
        
        $this->load->model("Setting_Model", "Setting");
         $this->load->model("ClassMaterials_Model", "CM");
         $this->load->model("VisitorModel","VR");
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
        
        $this->load->library('email');

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
    
             #region CourseTitle 

    public function Index() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Class Materials  ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('ClassMaterials/Index');
    }

    public function GetAllClassMaterials() {
        $result = $this->CM->GetAllClassMaterials();
        echo json_encode($result);
    }

    public function DeleteClassMaterials($id) {
        $result = $this->CM->DeleteClassMaterials($id);
        echo json_encode($result);
    }

    public function AddClassMaterials() {
        $CourseTitledata = file_get_contents("php://input");
        $request = json_decode($CourseTitledata);
        $result = $this->CM->AddClassMaterials($request);
        echo json_encode($result);
    }

    public function UpdateClassMaterials() {
        $CourseTitledata = file_get_contents("php://input");
        $request = json_decode($CourseTitledata);

        $result = $this->CM->UpdateClassMaterials($request);
        echo json_encode($result);
    }
    
    public function SendEmailClassMaterials()
    {    $Email = file_get_contents("php://input");
         $request = json_decode($Email);
         
         #Email
         $Recivers = $this->Setting->GetAllStudentsMailByBatch($request->BatchID)->Mail;
         $Subject="BCC-Class/Workshop Notification";
         $MailBody=$request->Text;
         
         $EmailResult= $this->EmailSend($Recivers,$Subject,$MailBody);
        // echo $data->EmailSendStatus=$EmailResult;
    }
    
    public  function EmailSend($To,$Sub,$Body) {
        $this->load->library('encryption');
        $this->load->config('email');
        $this->load->library('email');
        
        $from = $this->config->item('smtp_user');
      

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($To);
        $this->email->subject($Sub);
        $this->email->message($Body);

        if ($this->email->send()) {
           return 1;
        } else {
            return 0;
        }
    }
    #end Region



}
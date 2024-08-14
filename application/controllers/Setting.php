<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Setting
 *
 * @author Evan DU
 */
class Setting extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($_SESSION["User_loged"])) {
            $this->session->set_flashdata("successErr", "Please login first. ");
            $encoded_uri = preg_replace('"/"', '_', $_SERVER['REQUEST_URI']);
            redirect('Auth/login/'.$encoded_uri); 
        }
        $this->load->model("Setting_Model", "Setting");
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

    public function BackupRestore() {
        $this->checkuserRole(uri_string());
       
        $this->load->dbutil();
        $db_format = array('format' => 'zip', 'filename' => 'bcc_backup.sql');
        $backup = $this->dbutil->backup($db_format);
        $dbname = 'backup-on-' . date('Y-m-d') . '.zip';
        $save = 'Backup/db_backup/' . $dbname;
        write_file($save, $backup);
        force_download($dbname, $backup);
    }

    public function Index() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Setting ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Setting/Index');
    }

    
    
    #region Role

    public function Role() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Role ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Setting/Role');
    }

    public function GetAllRole() {
        $result = $this->Setting->GetAllRole();
        echo json_encode($result);
    }

    public function DeleteRole($id) {
        $result = $this->Setting->DeleteRole($id);
        echo json_encode($result);
    }

    public function AddRole() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $result = $this->Setting->AddRole($request);
        echo json_encode($result);
    }

    public function UpdateRole() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $result = $this->Setting->UpdateRole($request);
        echo json_encode($result);
    }

    #end Region
    
      #region Batch

    public function Batch() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Batch ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Setting/Batch');
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
    
      #region QuestionType

    public function QuestionType() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "QusetionType ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Setting/QuestionType');
    }

    public function GetAllQusetionType() {
        $result = $this->Setting->GetAllQusetionType();
        echo json_encode($result);
    }

    public function DeleteQusetionType($id) {
        $result = $this->Setting->DeleteQusetionType($id);
        echo json_encode($result);
    }

    public function AddQusetionType() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $result = $this->Setting->AddQusetionType($request);
        echo json_encode($result);
    }

    public function UpdateQusetionType() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $result = $this->Setting->UpdateQusetionType($request);
        echo json_encode($result);
    }

    #end Region
   
      #region ExamCollection

    public function QuestionSubject() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Qusetion Subject ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Setting/QuestionSubject');
    }

    public function GetAllQusetionSubject() {
        $result = $this->Setting->GetAllQusetionSubject();
        echo json_encode($result);
    }

    public function DeleteQusetionSubject($id) {
        $result = $this->Setting->DeleteQusetionSubject($id);
        echo json_encode($result);
    }

    public function AddQusetionSubject() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $result = $this->Setting->AddQusetionSubject($request);
        echo json_encode($result);
    }

    public function UpdateQusetionSubject() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $result = $this->Setting->UpdateQusetionSubject($request);
        echo json_encode($result);
    }

    #end Region
    
    
      #region ExamCollection

    public function ExamCollection() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Qusetion Subject ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Setting/ExamCollection');
    }

    public function GetAllExamCollection() {
        $result = $this->Setting->GetAllExamCollection();
        echo json_encode($result);
    }

    public function DeleteExamCollection($id) {
        $result = $this->Setting->DeleteExamCollection($id);
        echo json_encode($result);
    }

    public function AddExamCollection() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $result = $this->Setting->AddExamCollection($request);
        echo json_encode($result);
    }

    public function UpdateExamCollection() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $result = $this->Setting->UpdateExamCollection($request);
        echo json_encode($result);
    }

    #end Region
    
      #region ExamCollection

    public function SetExam() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Set Exam ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Setting/SetExam');
    }

    public function GetAllBatchandQuestionSet() {
        $result = $this->Setting->GetAllBatchandQuestionSet();
        echo json_encode($result);
    }

    public function DeleteSetExam($id) {
        $result = $this->Setting->DeleteSetExam($id);
        echo json_encode($result);
    }
    
    public function AbsentStudentAutoAddIntoDatabase($Bid, $xmId) {
        $result = $this->Setting->AbsentStudentAutoAddIntoDatabase($Bid, $xmId);
        echo json_encode($result);
    }

    public function AddSetExam() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $result = $this->Setting->AddSetExam($request);
        echo json_encode($result);
    }

    public function UpdateSetExam() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $result = $this->Setting->UpdateSetExam($request);
        echo json_encode($result);
    }
    
    public function ChangeExamStatus($Status, $SetID) {
        $result = $this->Setting->ChangeExamStatus($Status, $SetID);
        echo json_encode($result);
    }

    #end Region
    
        #region Post

    public function Post() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Post ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Setting/Post');
    }

    public function GetAllPost() {
        $result = $this->Setting->GetAllPost();
        echo json_encode($result);
    }

    public function DeletePost($id) {
        $result = $this->Setting->DeletePost($id);
        echo json_encode($result);
    }

    public function AddPost() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $result = $this->Setting->AddPost($request);
        echo json_encode($result);
    }

    public function UpdatePost() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $result = $this->Setting->UpdatePost($request);
        echo json_encode($result);
    }

    #end Region
    
    
        #region Exam Name

    public function ExamName() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Exam Name ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Setting/ExamName');
    }

    public function GetAllExamName() {
        $result = $this->Setting->GetAllExamName();
        echo json_encode($result);
    }

    public function DeleteExamName($id) {
        $result = $this->Setting->DeleteExamName($id);
        echo json_encode($result);
    }

    public function AddExamName() {
        $ExamNamedata = file_get_contents("php://input");
        $request = json_decode($ExamNamedata);
        $result = $this->Setting->AddExamName($request);
        echo json_encode($result);
    }

    public function UpdateExamName() {
        $ExamNamedata = file_get_contents("php://input");
        $request = json_decode($ExamNamedata);

        $result = $this->Setting->UpdateExamName($request);
        echo json_encode($result);
    }

    #end Region
    
    
     #region Organozation Name

    public function OrganizationName() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Organozation Name ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Setting/OrganizationName');
    }

    public function GetAllOrganizationName() {
        $result = $this->Setting->GetAllOrganizationName();
        echo json_encode($result);
    }

    public function DeleteOrganizationName($id) {
        $result = $this->Setting->DeleteOrganizationName($id);
        echo json_encode($result);
    }

    public function AddOrganizationName() {
        $OrganizationNamedata = file_get_contents("php://input");
        $request = json_decode($OrganizationNamedata);
        $result = $this->Setting->AddOrganizationName($request);
        echo json_encode($result);
    }

    public function UpdateOrganizationName() {
        $OrganizationNamedata = file_get_contents("php://input");
        $request = json_decode($OrganizationNamedata);

        $result = $this->Setting->UpdateOrganizationName($request);
        echo json_encode($result);
    }

    #end Region
    
             #region CourseTitle 

    public function CourseTitle() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "CourseTitle  ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Setting/CourseTitle');
    }

    public function GetAllCourseTitle() {
        $result = $this->Setting->GetAllCourseTitle();
        echo json_encode($result);
    }

    public function DeleteCourseTitle($id) {
        $result = $this->Setting->DeleteCourseTitle($id);
        echo json_encode($result);
    }

    public function AddCourseTitle() {
        $CourseTitledata = file_get_contents("php://input");
        $request = json_decode($CourseTitledata);
        $result = $this->Setting->AddCourseTitle($request);
        echo json_encode($result);
    }

    public function UpdateCourseTitle() {
        $CourseTitledata = file_get_contents("php://input");
        $request = json_decode($CourseTitledata);

        $result = $this->Setting->UpdateCourseTitle($request);
        echo json_encode($result);
    }

    #end Region
    
    #region CourseSubject 

    public function CourseSubject() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "CourseSubject  ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Setting/CourseSubject');
    }

    public function GetAllCourseSubject($CourseID) {
        $result = $this->Setting->GetAllCourseSubject($CourseID);
        echo json_encode($result);
    }

    public function DeleteCourseSubject($id) {
        $result = $this->Setting->DeleteCourseSubject($id);
        echo json_encode($result);
    }

    public function AddCourseSubject() {
        $CourseTitledata = file_get_contents("php://input");
        $request = json_decode($CourseTitledata);
        $result = $this->Setting->AddCourseSubject($request);
        echo json_encode($result);
    }

    public function UpdateCourseSubject() {
        $CourseTitledata = file_get_contents("php://input");
        $request = json_decode($CourseTitledata);

        $result = $this->Setting->UpdateCourseSubject($request);
        echo json_encode($result);
    }

    #end Region
    
             #region CourseTitle 

    public function ClassWorkShop() {
        $this->checkuserRole(uri_string());
        $data["Title"] = "Class WorkShop  ";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Setting/ClassWorkShop');
    }

    public function GetAllClassWorkShop() {
        $result = $this->Setting->GetAllClassWorkShop();
        echo json_encode($result);
    }

    public function DeleteClassWorkShop($id) {
        $result = $this->Setting->DeleteClassWorkShop($id);
        echo json_encode($result);
    }

    public function AddClassWorkShop() {
        $CourseTitledata = file_get_contents("php://input");
        $request = json_decode($CourseTitledata);
        $result = $this->Setting->AddClassWorkShop($request);
        echo json_encode($result);
    }

    public function UpdateClassWorkShop() {
        $CourseTitledata = file_get_contents("php://input");
        $request = json_decode($CourseTitledata);

        $result = $this->Setting->UpdateClassWorkShop($request);
        echo json_encode($result);
    }
    
    public function SendEmailClassWorkshop()
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

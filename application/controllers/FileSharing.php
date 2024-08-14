<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Service
 *
 * @author Evan DU
 */
class FileSharing extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($_SESSION["User_loged"])) {
            $this->session->set_flashdata("successErr", "Please login first. ");
            $encoded_uri = preg_replace('"/"', '_', $_SERVER['REQUEST_URI']);
            redirect('Auth/login/'.$encoded_uri); 
        }
        
        $this->load->model('FileSharing_Model', 'FS');
        $this->load->model('User_Model', 'user');
 
    }

    //Check User Role
    public function CheckUserRole($uri) {
        $this->load->model("User_Model", "User");
        $IsOk = $this->User->CheckUserRole($uri);
        if ($IsOk != TRUE) {
            redirect("Auth/Restricted");
        }
    }

    public function index() {
        $this->checkuserRole(uri_string());

        $Title = "All Files";
        $data = array(
            "Title" => $Title,
         
            "Headline" => "",
            
        );
 
        if (isset($_POST["add"])) {
            $this->form_validation->set_rules('Headline', 'Headline', 'required');
            
//            $this->form_validation->set_rules('Attachment', 'Attachment','required');

            if ($this->form_validation->run() == TRUE) {       
               
               $config['upload_path'] = './uploads/SharedFiles';
$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|zip|rar|docx|xls|pptx|mp4|'; // fixed 'xlss' typo to 'xls'
$config['max_size'] = 2000000;

$FileNames = "";

foreach ($_FILES['Attachment']['name'] as $key => $value) {
    // Get the original file extension
    $extension = pathinfo($value, PATHINFO_EXTENSION);
    
    // Prepare the file array for the current file
    $_FILES['file']['name'] = $_FILES['Attachment']['name'][$key];
    $_FILES['file']['type'] = $_FILES['Attachment']['type'][$key];
    $_FILES['file']['tmp_name'] = $_FILES['Attachment']['tmp_name'][$key];
    $_FILES['file']['error'] = $_FILES['Attachment']['error'][$key];
    $_FILES['file']['size'] = $_FILES['Attachment']['size'][$key];
    
    $Name=$_FILES['file']['name'] ;
    // Generate a unique file name with the correct extension for each file
    $new_file_name = uniqid($Name, true) . '.' . $extension;

    
$this->load->library('upload', $config);
    // Load the upload library with the new config for each file
    $this->upload->initialize([
        'upload_path'   => $config['upload_path'],
        'allowed_types' => $config['allowed_types'],
        'max_size'      => $config['max_size'],
        'file_name'     => $new_file_name,
    ]);

    if ($this->upload->do_upload('file')) {
        $file = $this->upload->data();
        $FileNames .= $file['file_name'] . ", "; // Concatenate the file name with a space
    } else {
        // Handle upload error
        $error = $this->upload->display_errors();
        echo $error; // or log the error as needed
    }
}

// Trim the trailing space from the $FileNames string
$FileNames2 = rtrim($FileNames,', ');
//$FileNamesTrimed = trim($FileNames2);

                

                $data2 = array(
                    "Headline" => $_POST["Headline"],
                   
                    "Date" => date('Y-m-d'),
                    "FileName" => $FileNames2,
                    "UserID" => $_SESSION["id"],
                    "SharedID" => 0,
                    
                );

                $this->db->insert('FileSharing', $data2);
                $data = array(
                    "data" => $this->session->flashdata("success", "File added successfully")
                );

                redirect("FileSharing/index", $data);
            }
            $data["Headline"] = $_POST["Headline"];
           
        }

        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('FileSharing/index');
    }

    public function GetAllFiles() {
        $data = $this->FS->GetAllFiles();
        echo json_encode($data);
    }
    public function GetAllFilesThatSharedWithUser() {
        $data = $this->FS->GetAllFilesThatSharedWithUser();
        echo json_encode($data);
    }
    
    public function GetAllFilesThatSharedWithMe() {
        $data = $this->FS->GetAllFilesThatSharedWithMe();
        echo json_encode($data);
    }
    
    public function UpdateSharedUserIDWithHeadline() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $result = $this->FS->UpdateSharedUserIDWithHeadline($request);
        echo json_encode($result);
    }
    
    public function DeleteFile($fid) {
        $Message = $this->FS->DeleteFile($fid);
        echo json_encode($Message);
    }
    
    public function DeleteOnlyFile() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $Message = $this->FS->DeleteOnlyFile($request);
        echo json_encode($Message);
    }

    public function HideNews($id, $IsHide) {
        $Message = $this->m->HideNews($id, $IsHide);
        echo json_encode($Message);
    }
    
    public function GetAllUserList($fid) {
        $data = $this->FS->GetAllUserList($fid);
        echo json_encode($data);
    }



}

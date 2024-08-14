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
class Service extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!isset($_SESSION["User_loged"])) {
            $this->session->set_flashdata("successErr", "Please login first. ");
            $encoded_uri = preg_replace('"/"', '_', $_SERVER['REQUEST_URI']);
            redirect('Auth/login/'.$encoded_uri); 
        }
        
        $this->load->model('News_model', 'm');
        $this->load->model('User_Model', 'user');
        $this->load->model('PhotoSlideGallery_Model', 'PGS');
        $this->load->model("CommonModel", "Common");
    }

    //Check User Role
    public function CheckUserRole($uri) {
        $this->load->model("User_Model", "User");
        $IsOk = $this->User->CheckUserRole($uri);
        if ($IsOk != TRUE) {
            redirect("Auth/Restricted");
        }
    }

    public function NewsCreate() {
        $this->checkuserRole(uri_string());

      

        $Title = "All Notice";
        $data = array(
            "Title" => $Title,
         
            "Headline" => "",
            "Detail" => ""
        );
        if (isset($_POST["Create"])) {
            $this->form_validation->set_rules('Headline', 'Headline', 'required');
            $this->form_validation->set_rules('Detail', 'Detail', 'required');
//            $this->form_validation->set_rules('Attachment', 'Attachment','required');

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|zip|rar|docx|';
                $config['max_size'] = 2000000;

                $this->load->library('upload', $config);
                $this->upload->do_upload('Attachment');
                $file = $this->upload->data();

                $data2 = array(
                    "Headline" => $_POST["Headline"],
                    "Detail" => $_POST["Detail"],
                    "Date" => date('Y-m-d'),
                    "Other" => $file['file_name'],
                    "NewsType" => $_POST["Type"]
                );

                $this->db->insert('breakingnews', $data2);
                $data = array(
                    "data" => $this->session->flashdata("success", "News added successfully")
                );

                redirect("Service/NewsCreate", $data);
            }
            $data["Headline"] = $_POST["Headline"];
            $data["Detail"] = $_POST["Detail"];
        }

        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Service/NewsCreate');
    }

    public function GetAllNews() {
        $data = $this->m->GetAllNews();
        echo json_encode($data);
    }

    public function DeleteNews($id, $File=null) {
		
        $Message = $this->m->DeleteNews($id, $File);
        echo json_encode($Message);
    }

    public function HideNews($id, $IsHide) {
        $Message = $this->m->HideNews($id, $IsHide);
        echo json_encode($Message);
    }

    
    #SlidePhoto
        public function SlidePhoto() {
        $this->checkuserRole(uri_string());

        $PhotoType = $this->PGS->GetAllPhotostype();

        $Title = "All Slide Photo";
        $data = array(
            "Title" => $Title,
         
            "Heading" => "",
             "Descriptions" => "",
            "PhotoType"=>$PhotoType,
           
        );
        if (isset($_POST["Create"])) {
            $this->form_validation->set_rules('Type', 'Type', 'required');
        
            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './dist/img/slider';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 20000;

                $this->load->library('upload', $config);
                $this->upload->do_upload('Attachment');
                $file = $this->upload->data();

                $data2 = array(
                    "Heading" => $_POST["Heading"],
                     "Descriptions" => $_POST["Descriptions"],
                    "Photo" => $file['file_name'],
                    "Type" => $_POST["Type"]
                );

                $this->db->insert('photo_and_slide', $data2);
                $data = array(
                    "data" => $this->session->flashdata("success", "Photo added successfully")
                );

                redirect("Service/SlidePhoto", $data);
            }
            $data["Heading"] = $_POST["Heading"];
           
        }

        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Service/SlidePhoto');
    }

    public function GetAllPhotos() {
        $data = $this->PGS->GetAllPhotos();
        echo json_encode($data);
    }

    public function DeletePhotos($id, $File) {
        $Message = $this->PGS->DeletePhotos($id, $File);
        echo json_encode($Message);
    }
    public function HidePhotos($id, $IsHide) {
        $Message = $this->PGS->HidePhotos($id, $IsHide);
        echo json_encode($Message);
    }
    
        #Category List
    public function CreateCategoryList() {
        $this->checkuserRole(uri_string());

        //$PhotoType = $this->PGS->GetAllPhotostype();

        $Title = "All Category";
        $data = array(
            "Title" => $Title,          
            "Category" => "",
             "Detail" => ""
           
        );
        if (isset($_POST["Create"])) {
            $this->form_validation->set_rules('Category', 'Category', 'required');
        
            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './dist/img/icon';
                $config['allowed_types'] = 'gif|jpg|JPG|png|PNG';
                $config['max_size'] = 20000;

                $this->load->library('upload', $config);
                $this->upload->do_upload('Attachment');
                $file = $this->upload->data();

                $data2 = array(
                    "Category" => $_POST["Category"],
                     "Detail" => $_POST["Detail"],
                    "Icon" => $file['file_name']
                  
                );

                $this->db->insert('content_category', $data2);
                $data = array(
                    "data" => $this->session->flashdata("success", "Category added successfully")
                );

                redirect("Service/CreateCategoryList", $data);
            }
            $data["Category"] = $_POST["Category"];
           
        }

        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Service/CreateCategoryList');
    }

    public function GetAllCategory() {
        $data = $this->PGS->GetAllCategory();
        echo json_encode($data);
    }

    public function DeleteCategory($id, $File) {
        $Message = $this->PGS->DeleteCategory($id, $File);
        echo json_encode($Message);
    }
   
    public function HideCategory($id, $IsHide) {
        $Message = $this->PGS->HidePhotos($id, $IsHide);
        echo json_encode($Message);
    }
    
        #Sub Category List
    public function CreateSubCategoryList() {
        $this->checkuserRole(uri_string());

        $CategoryType = $this->PGS->GetAllCategory();

        $Title = "All Sub Category";
        $data = array(
            "Title" => $Title,          
            "Category" => "",
             "Detail" => "",
             "CID" => $CategoryType
            
           
        );
        if (isset($_POST["Create"])) {
            $this->form_validation->set_rules('Category', 'Category', 'required');
             $this->form_validation->set_rules('CID', 'CID', 'required');
        
            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './dist/img/icon';
                $config['allowed_types'] = 'gif|jpg|JPG|png|PNG';
                $config['max_size'] = 20000;

                $this->load->library('upload', $config);
                $this->upload->do_upload('Attachment');
                $file = $this->upload->data();

                $data2 = array(
                    "Category" => $_POST["Category"],
                     "Detail" => $_POST["Detail"],
                      "CID" => $_POST["CID"],
                    "Others" => $file['file_name']
                  
                );
                $this->db->insert('content_sub_category', $data2);
                $data = array(
                    "data" => $this->session->flashdata("success", "Sub Category added successfully")
                );
                redirect("Service/CreateSubCategoryList", $data);
            }
            $data["Category"] = $_POST["Category"];          
        }

        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Service/CreateSubCategoryList');
    }

    public function GetAllSubCategory() {
        $data = $this->PGS->GetAllSubCategory();
        echo json_encode($data);
    }

    public function DeleteSubCategory($id, $File) {
        $Message = $this->PGS->DeleteSubCategory($id, $File);
        echo json_encode($Message);
    }
   
    public function HideSubCategory($id, $IsHide) {
        $Message = $this->PGS->HidePhotos($id, $IsHide);
        echo json_encode($Message);
    }
    
    
    
    #region User List Teacher and Other

 public function register() {
     $this->checkuserRole(uri_string());
        $Post = $this->Common->GetPost();
        $Role = $this->Common->GetRole();
        $data = array(
            "Title" => "Signup",
            "Posts" => $Post,
            "Roles" => $Role
        );
        if (isset($_POST['Signup'])) {
            
            $this->form_validation->set_rules('Name', 'Name', 'required');
            $this->form_validation->set_rules('Email', 'Email', 'required');
            $this->form_validation->set_rules('Mobile', 'Mobile', 'required');
            $this->form_validation->set_rules('Address', 'Address', 'required');
            $this->form_validation->set_rules('DOB', 'Date of Birth', 'required');
            $this->form_validation->set_rules('Role', 'Role', 'required');
            $this->form_validation->set_rules('Password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('ConPassword', 'Confirm Password', 'required|min_length[6]|matches[Password]');

            if ($this->form_validation->run() == TRUE) {
                $config['upload_path'] = './uploads/users/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 5000000;
                $config['max_width'] = 2000;
                $config['max_height'] = 2000;
                $config['file_name'] = uniqid();

                $this->load->library('upload', $config);
                //$this->upload->initialize($config);
                
                $this->upload->do_upload('Photo');
                $file = $this->upload->data();
                
                if (!$this->upload->do_upload('photo')) {
                     $fdata = array(
                    'Name' => $_POST['Name'],
                    'Post' => $_POST['Post'],
                    'AcademicQualification' => $_POST['AcademicQualification'],
                    'Email' => $_POST['Email'],
                    'Mobile' => $_POST['Mobile'],
                    'Address' => $_POST['Address'],
                    'DOB' => $_POST['DOB'],
                    'Role' => $_POST['Role'],
                    'Photo' => null,
                    'CreateDate' => date('Y-m-d'),
                    'Password' => md5($_POST['Password']),
                    
                    'IsActive' => 1
                    );
                } else {
                    $file = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    
                    $fdata = array(
                    'Name' => $_POST['Name'],
                    'Post' => $_POST['Post'],
                    'AcademicQualification' => $_POST['AcademicQualification'],
                    'Email' => $_POST['Email'],
                    'Mobile' => $_POST['Mobile'],
                    'Address' => $_POST['Address'],
                    'DOB' => $_POST['DOB'],
                    'Role' => $_POST['Role'],
                    'CreateDate' => date('Y-m-d'),
                    'Password' => md5($_POST['Password']),
                    'Photo' => $file_name,
                    'IsActive' => 1
                    );
                }

                $this->db->insert('registration', $fdata);
                $this->session->set_flashdata("success", "Your Account has been registered!! you can now login");
                redirect("Service/UserList");
            }
        }

        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('user/register');
    }


    public function UserList() {
        $this->checkuserRole(uri_string());

        $data["Title"] = "User List";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Service/UserList');
    }
    
     public function UserProfile() {
       // $this->checkuserRole(uri_string());

        $data["Title"] = "User Profile";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('Service/Profile');
    }



    public function GetUserProfile() {
        $data = $this->user->GetUserProfile();
        echo json_encode($data);
    }

    public function GetUserList() {
        $data = $this->user->GetUser();
        echo json_encode($data);
    }

    public function DeleteUser($id, $photo) {
        $data = $this->user->DeleteUser($id, $photo);
        echo json_encode($data);
    }

    public function UpdateUser() {
        $request = json_decode(file_get_contents('php://input'));
        $data = $this->user->UpdateUser($request);
        echo json_encode($data);
    }

    public function SavePassword() {
        $request = json_decode(file_get_contents('php://input'));
        $data = $this->user->SavePassword($request);
        echo json_encode($data);
    }

    public function UpdateUserPhoto() {

        $Id = $_POST['Id'];
        $filename = $_FILES["Img"]["name"];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
//      here we will add many thing for changing img name
        $new_name = "IMG" . rand(10, 1000) . rand(10, 1000) . $Id . date("Y-m-d") . rand(10, 100) . "." . $file_ext;

        $OldPhotoName = $this->user->GetPhotoNameAndUnlink($Id);

        $config['file_name'] = $new_name;
        $config['upload_path'] = './uploads/users/';
        $config['allowed_types'] = 'gif|jpg|png|GIF|JPG|PNG';
        $config['max_size'] = 200;
        $config['max_width'] = 500;
        $config['max_height'] = 500;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('Img')) {
            $file = $this->upload->data();


            $Photo = $new_name;
            $user = $this->user->UpdateUserPhoto($Photo, $Id);
            echo json_encode($user);
        } else {
            $user["Photo"] = $OldPhotoName;
            echo json_encode($user);
        }
    }

    public function LoadAllMenuAndUserRole($id) {
        $data = $this->user->LoadAllMenuAndUserRole($id);
        echo json_encode($data);
    }

    public function SaveUserRole() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $data = $this->user->SaveUserRole($request->MenuID, $request->selectedUser, $request->MenuID2);
        echo json_encode($data);
    }

}

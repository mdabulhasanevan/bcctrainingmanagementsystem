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
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("CommonModel", "Common");
        $this->load->model("User_Model", "User");
        $this->load->model("Student_Model", "SM");
    }

    
   

    public function login($return_to = "") {
            
            $data = array(
            "Title" => "Login",
        );
        if(!isset($_SESSION["User_loged"]))
        {
            if (isset($_POST["Signin"])) {
                $this->form_validation->set_rules('Email', 'Email', 'required');
                $this->form_validation->set_rules('Password', 'Password', 'required|min_length[6]');
    
                if ($this->form_validation->run() == TRUE) {
    
                    $Email = $_POST['Email'];
                    $Password = md5($_POST['Password']);
    
                    $user = $this->User->LoginApproval($Email, $Password);
                    
    //login check complete now add login history and load menu
                    if ($user != null && $user->Email) {
                        
                        $_SESSION["User_loged"] = TRUE;
                        $_SESSION["Name"] = $user->Name;
                        $_SESSION["id"] = $user->Id;
                        $_SESSION["Photo"] = $user->Photo;
                        
                        
                        //this is for login history
                        $this->User->LoginHistory($user);
                        $menu = $this->User->AdminMenu($user);
    
                        $this->session->set_flashdata("success", "You are successfully loged in. ");
                        setcookie('loginCookie', TRUE, time() + (86400 * 30), "/");
                        
                        
                        $_SESSION["Menu1"] = $menu['Menu1'];
                        $_SESSION["Menu2"] = $menu['Menu2'];
                        
                        $_SESSION["QuickMenu"]=$menu['QuickMenu'];
                        
                       if($return_to!=null)
                        {
                            $decoded_uri = preg_replace('"_"','/',$return_to);
                            redirect($decoded_uri);
                        }
                        else
                        {
                            redirect("user/index");
                        }
                    } else {
                        $this->session->set_flashdata("successErr", "No such account exist. ");
                    }
                }
            }
    
            $this->load->view('user/login', $data);
        }
        else
        {
            redirect("user/index");
        }
            
    }

    public function logout() {
        // set the expiration date to one hour ago
        setcookie("loginCookie", "", time() - 3600);
        
        unset($_SESSION["User_loged"]);
        session_destroy();
        redirect("Auth/login");
    }

    public function Restricted() {
        $data["Title"] = "Restricted Page";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view('user/Restricted');
    }

    
    // for student
     public function StudentLogin() {


        if (isset($_POST["Signin"])) {
            $this->form_validation->set_rules('RegNO', 'RegNO', 'required');
            $this->form_validation->set_rules('Mobile', 'Mobile', 'required');


            if ($this->form_validation->run() == TRUE) {

                $RegNO = $_POST['RegNO'];
                $Mobile = $_POST['Mobile'];

                $info = $this->SM->LoginApproval($RegNO, $Mobile);
                
                $student=$info["Student"];
               // $ExamList=$info["ExamList"];

                if ($student != null) {
                     
                      //this is for login history
                   
                    $this->User->StudentLoginHistory($student);
                    
                    $_SESSION["IsStudentLoged"] = TRUE;
                    $_SESSION['StudentName'] = $student->Name;
                    $_SESSION['BatchID'] = $student->BatchID;
                    $_SESSION['StudentID'] = $student->SID;
                     $_SESSION['Photo'] = $student->Photo;
                    redirect("StudentOpen/StudentDashBoard");
                }
                
                $this->session->set_flashdata('Message', "You are not eligible to login Contact with Admin");
            }
        }
        
       // $data["ExamList"]=$ExamList;
        $data["Title"] = "Student Login";
       // $this->load->view('Student/StudentLogin', $data);
        $this->load->view('Student/StudentPanel/StudentLogin', $data);
    }
    
     public function logoutStudent() {

        unset($_SESSION["IsStudentLoged"]);
        session_destroy();
        redirect("Webview/Index");
    }


    
}

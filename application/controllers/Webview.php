<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Employee
 *
 * @author Evan DU
 */
class Webview extends CI_Controller {

    public function __construct() {
        parent::__construct();

       
        $this->load->model("CommonModel","CM");
        $this->load->model("User_Model", "User");
        $this->load->model("PublicExam_Model", "PM");
        $this->load->model("Admission_model", "AM");
        $this->load->model('News_model', 'NM');
        
        $this->load->library("SMS","SMS");
        $this->load->library('email');


    }
    
    function get_IP_address() {
        foreach (array('HTTP_CLIENT_IP',
    'HTTP_X_FORWARDED_FOR',
    'HTTP_X_FORWARDED',
    'HTTP_X_CLUSTER_CLIENT_IP',
    'HTTP_FORWARDED_FOR',
    'HTTP_FORWARDED',
    'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $IPaddress) {
                    $IPaddress = trim($IPaddress); // Just to be safe

                    if (filter_var($IPaddress, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {

                        return $IPaddress;
                    }
                }
            }
        }
    }
    
    public function Index() {
      
        $data=  $this->CM->GetDashboard();
        
        $data["Title"] = "বাংলাদেশ কম্পিউটার কাউন্সিল ";
         $data["Info"] = $this->NM->GetAllNewsAndNotice();
        
          $this->load->view('Include/LeftPublic', $data);
        $this->load->view('WebView/Index');
    }
    
    
     public function TestSlide() {
        $data["Title"] = "TestSlide ";
          $this->load->view('Include/LeftPublic', $data);
        $this->load->view('WebView/TestSlide');
    }
    
    public function PrivacyPolicy() {
        $data["Title"] = "Privacy Policy ";
          $this->load->view('Include/LeftPublic', $data);
        $this->load->view('WebView/PrivacyPolicy');
    }
    
    public function TermsandServices() {
        $data["Title"] = "Privacy Policy ";
          $this->load->view('Include/LeftPublic', $data);
        $this->load->view('WebView/TermsandServices');
    }
    #region Admission Reg
    public function AdmissionDetail() {
        
        $data["Title"] = "Admission Detail";
        $this->load->view('Include/LeftPublic', $data);
       
        $this->load->view("WebView/admission");
       
    }

    public function AdmissionApplyReg() {

        $data["Title"] = "Admission Registration";
        $this->load->view('Include/LeftPublic', $data);
        $this->load->view("Admission/registration2");
        //$this->load->view("Include/Footer");
    }
    
    #public Loging and  Exam
    public function StudentReg() {

        $data["Title"] = "Student Registration";
        $this->load->view('Include/LeftPublic', $data);
        $this->load->view("WebView/PublicLogin/StudentReg");
        //$this->load->view("Include/Footer");
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
     
        $result = $this->PM->AddStudent($request);
        echo json_encode($result);
    }
    
     public function PublicRegSuccesfully() {
        $data["Title"] = "Student Public Reg Succesful";
        $this->load->view('Include/LeftPublic', $data);
        $this->load->view("WebView/PublicLogin/StudentRegSuccessful");
     }
    
     public function GetAllExamTypeField() {
        $data = $this->PM->GetAllExamTypeField();
        echo json_encode($data);
    }
    
       // for public student
     public function PublicLogin() {


        if (isset($_POST["Signin"])) {
            $this->form_validation->set_rules('RegNO', 'RegNO', 'required');
            $this->form_validation->set_rules('Mobile', 'Mobile', 'required');


            if ($this->form_validation->run() == TRUE) {

                $RegNO = $_POST['RegNO'];
                $Mobile = $_POST['Mobile'];

                $info = $this->PM->LoginApproval($RegNO, $Mobile);
                
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
        $data["Title"] = "Public Login";
        $this->load->view('WebView/PublicLogin/PublicLogin', $data);
    }
    
   
   
    #Admission Registration and  Exam
    
    public function AdmissionReg() {

        $data["Title"] = "Admission Registration";
        $this->load->view('Include/LeftPublic', $data);
        $this->load->view("Admission/AdmissionRegistration/AdmissionReg");
        //$this->load->view("Include/Footer");
    }
    
    public function SendOTPAdmission() {
        //one to one
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        
        $OTP=rand(1000,9999);
        $message="BCC Admission Registration OTP is #".$OTP." -BCC, Barishal" ;
        
        $EmailResult= $this->EmailSend($request->Email,"OTP For Admission",$message);
        
      //  $result=$this->SendSMSOnetoOne($message,$request->Mobile->Mobile);
        
        echo json_encode($OTP);
    }
    
     public function AddStudentForAdmission() { 
      //  $postdata = file_get_contents("php://input");
      //  $request = json_decode($postdata);
        $request = json_decode($_POST['Studentinfo']);
        
          if(isset($_FILES['Img']['tmp_name']))
          {      $file = $_FILES['Img']['tmp_name'];
               $image = base64_encode(file_get_contents(addslashes($file)));
                $request->Photo=$image;
          }
     
        $result = $this->AM->AddStudentForAdmission($request);
        
       if($result==1)
       {
           $Mobile=$request->Mobile;
           $RegNO=$request->RegNO;
           $Email=$request->Email;
           
           $message= "Dear,". $request->Name." Your BCC Barisal Admission Application succesfully Submitted your registration no is ".$RegNO." For More Detail +8802478861480 \n-BCC, Barishal" ;
           
          // $sms=$this->SendSMSOnetoOne($message,$Mobile);
           
           $EmailResult= $this->EmailSend($Email,"Admission Reg",$message);
           
            //echo json_encode($sms);
       }
        
        echo json_encode($result);
    }
    
    public function AdmissionRegSuccesfully() {
        $data["Title"] = "Admission Reg Succesful";
        $this->load->view('Include/LeftPublic', $data);
        $this->load->view("Admission/AdmissionRegistration/StudentRegSuccessful");
     }
    
    public function GetAllAdmissionTypeField() {
        $data = $this->AM->GetAllAdmissionTypeField();
        echo json_encode($data);
    }
    
    public function SendSMSOnetoOne($message,$Mobile)
    {
         
        try{
         $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
         $paramArray = array(
         'userName' => "01737013139",
         'userPassword' => "ZAQ!2wsx",
         'mobileNumber' => $Mobile,
         'smsText' => $message,
         'type' => "TEXT",
         'maskName' => '',
         'campaignName' => '',
         );
         $value = $soapClient->__call("OneToOne", array($paramArray));
         //echo $value->OneToOneResult;
         
         // json_encode($OTP);
         
        } catch (Exception $e) {
         echo $e->getMessage();
        }
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
    
    #End Admission Registration  
    
 
     #Notice Open

     public function NoticeOpen($Id) {
        $data["MyNews"] = $this->NM->GetCertainNews($Id);
        $data["Title"] = "Open Notice";
        
      $this->load->view('Include/LeftPublic', $data);
        $this->load->view("WebView/NoticeOpen");
    }

}

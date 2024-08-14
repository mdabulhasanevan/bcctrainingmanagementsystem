<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SMS
 *
 * @author Evan DU
 */
class SMS  {
    

//    For SMS one to many
//    How are you? Hope Well. I know you are doing somthing behind the scene
//    $Mobiles,$Message
     public function SendSmsOneToMany()
    {
    $request= json_decode(file_get_contents('php://input'));
     
       try{
        $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
        $paramArray = array(
        'userName' => "01737013139",
        'userPassword' => "ZAQ!2wsx",
        'messageText' => $request->message,
        'numberList' => $request->mobiles,
        'smsType' => "TEXT",
        'maskName' => '',
        'campaignName' => '',
        );
        $value = $soapClient->__call("OneToMany", array($paramArray));
         $data["smsNoti"]= $value->OneToManyResult;
         
          $data2=array(
                "Numbers"=>$request->mobiles,
                "SMS"=>$request->message,
                "Date"=>  date("Y/m/d H:i:s"),
                "Status"=>$data["smsNoti"],
                "SendBy"=>$_SESSION["id"]
            ); 
           $this->db->insert('sendsms',$data2);
        echo  json_encode($data["smsNoti"]);
       }
       catch (Exception $e) {
        echo  json_encode($e->getMessage());
       }

  

    }
    
 public function SendSMSOneToOne($mobile,$message)
    {
   
      //one to one
        try{
         $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
         $paramArray = array(
         'userName' => "01737013139",
         'userPassword' => "ZAQ!2wsx",
         'mobileNumber' => $mobile,
         'smsText' => $message,
         'type' => "TEXT",
         'maskName' => '',
         'campaignName' => '',
         );
         $value = $soapClient->__call("OneToOne", array($paramArray));
         echo $value->OneToOneResult;
        } catch (Exception $e) {
         echo $e->getMessage();
        }
    }
    
    public function CheckBalance()
    {
     try{
            $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
            $paramArray = array(
            'userName' => "01737013139",
            'userPassword' => "ZAQ!2wsx",
            );
            $value = $soapClient->__call("GetBalance", array($paramArray));
            echo $value->GetBalanceResult;
           } catch (Exception $e) {
            echo json_encode($e->getMessage());
           }
    }
    
    public function GetSendList()
    {
     $this->db->order_by('SId', 'DESC');
     $data=$this->db->get("sendsms", 30);
     echo json_encode($data->result());
    }
        
}

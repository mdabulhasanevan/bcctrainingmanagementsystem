<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of News_model
 *
 * @author Evan DU
 */
class FileSharing_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function GetAllFiles() {
        $UserID=$_SESSION["id"];
        $query = $this->db->query("SELECT * FROM FileSharing Where UserID=$UserID order by FID DESC");
        $row = $query->result();
        return $row;
    }
    
     public function GetAllFilesThatSharedWithUser() {
        $UserID=$_SESSION["id"];
        $query = $this->db->query("SELECT * FROM FileSharing Where UserID IN ($UserID) order by FID DESC");
        $row = $query->result();
        return $row;
    }
    
    public function GetAllFilesThatSharedWithMeForDashboard() {
        $UserID=$_SESSION["id"];
        $query= $this->db->query("SELECT fs.*, re.Name, p.PostName FROM FileSharing fs left join registration re on re.Id=fs.UserID left join post p on p.PId=re.Post Where  $UserID IN (SharedID) order by FID DESC limit 7")->result();
            
        return $query;
    }   
     public function GetAllFilesThatSharedWithMe() {
        $UserID=$_SESSION["id"];
        $query = $this->db->query("SELECT fs.*, re.Name, p.PostName FROM FileSharing fs left join registration re on re.Id=fs.UserID left join post p on p.PId=re.Post Where  $UserID IN (SharedID) order by FID DESC");
        $row = $query->result();
        return $row;
    }
    
    public function GetAllUserList($fid) {
        
        $UserIDALL = $this->db->query("SELECT fs.SharedID as selectedIDAll from FileSharing fs WHERE fs.FID=$fid")->row();
        $query = $this->db->query("SELECT re.Id, re.Name, (if(re.Id IN($UserIDALL->selectedIDAll),1,0)) as Selected from registration re")->result();
        
        return $query;
    }

    public function UpdateSharedUserIDWithHeadline($MyPost) {
         $data = array(
            "Headline" => $MyPost->Headline,
            "SharedID" => $MyPost->SharedID,
            
        );
        $this->db->where(array('FID' => $MyPost->FID));
        $result = $this->db->update("FileSharing", $data);
        return $result;
    }
    

    public function DeleteFile($fId) {
         $UserID=$_SESSION["id"];
         
        $File = $this->db->query("SELECT FileName FROM FileSharing Where FID=$fId")->row();
        
        $Files= explode(', ', $File->FileName);

        foreach ($Files as $File) {
          unlink("./uploads/SharedFiles/" . $File);
        }    
                         
        $m = $this->db->delete('FileSharing', array('FID' => $fId, "UserID" => $UserID ));
        
        return m;
    }
    
      public function DeleteOnlyFile($MyPost) {
       $UserID = $_SESSION["id"];

// Use parameterized queries to prevent SQL injection
$query = $this->db->query("SELECT FileName FROM FileSharing WHERE FID = ?", array($MyPost->fid));
$File = $query->row();

if ($File) {
    $Files = explode(', ', $File->FileName);
    $FileNames = array();
    
    foreach ($Files as $File) {
        if ($File == $MyPost->file) {
            // Ensure the file path is secure
            $filePath = "./uploads/SharedFiles/" . basename($File);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        } else {
            $FileNames[] = $File;
        }
    }
    
    // Rebuild the FileNames string, ensuring the format is correct
    $FileNamesString = implode(', ', $FileNames);
    
    // Use parameterized queries to prevent SQL injection
    $update = $this->db->query("UPDATE FileSharing SET FileName = ? WHERE FID = ? AND UserID = ?", array($FileNamesString, $MyPost->fid, $UserID));
    
    return $update;
} else {
    // Handle the case where the file is not found
    return false;
}

    }

    public function HideNews($id, $IsHide) {
        if ($IsHide == 1) {
            $IsHideValue = 0;
        } else {
            $IsHideValue = 1;
        }

        $data = array(
            "IsHide" => $IsHideValue
        );
        $this->db->where(array('BrId' => $id));
        $result = $this->db->update("FileSharing", $data);
        return $result;
    }

//    This is for Home page related all page Title and Breaking news
    public function GetAllNewsAndNotice() {
        $News = $this->db->query("SELECT * FROM FileSharing where NewsType=2 and IsHide=0 order by BrId DESC Limit 5")->result();
        $Notice = $this->db->query("SELECT * FROM FileSharing where NewsType=1 and IsHide=0 order by BrId DESC Limit 5")->result(); //GetAllNewsWithoutBreaking();

        $data = array(
            "News" => $News,
            "Notice" => $Notice,
        );
        return $data;
    }
    
    

}

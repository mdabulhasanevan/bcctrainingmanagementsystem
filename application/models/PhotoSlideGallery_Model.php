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
class PhotoSlideGallery_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function GetAllPhotos() {
        //For All Notice
        $query = $this->db->query("SELECT ps.*, pt.Type as PhotoType FROM photo_and_slide ps left join photo_type pt on pt.PTID=ps.Type  order by ps.Type ");
        $rows = $query->result();
        return $rows;
    }

    public function GetAllPhotosForWebpage() {
        //For All Notice
        $query = $this->db->query("SELECT ps.*, pt.Type as PhotoType FROM photo_and_slide ps left join photo_type pt on pt.PTID=ps.Type where ps.Type=1 and IsHide=0 order by PID DESC");
        $rows = $query->result();
        return $rows;
    }

    public function GetAllPhotosofOfficeKeyPersons() {
        //For All Notice type 5 to 10 is office key persons photos
        $query = $this->db->query("SELECT ps.*, pt.Type as PhotoType FROM photo_and_slide ps left join photo_type pt on pt.PTID=ps.Type where ps.Type between 5 and 10 and IsHide=0 order by PID DESC");
        $rows = $query->result();
        return $rows;
    }

    public function GetAllPhotostype() {
        //For All Notice
        $query = $this->db->query("SELECT * FROM photo_type  order by PTID ");
        $rows = $query->result();
        return $rows;
    }

    public function DeletePhotos($Id, $File) {
        $m = $this->db->delete('photo_and_slide', array('PID' => $Id));
        unlink("dist/img/slider/" . $File);
        return m;
    }

    public function HidePhotos($id, $IsHide) {
        if ($IsHide == 1) {
            $IsHideValue = 0;
        } else {
            $IsHideValue = 1;
        }

        $data = array(
            "IsHide" => $IsHideValue
        );
        $this->db->where(array('PID' => $id));
        $result = $this->db->update("photo_and_slide", $data);
        return $result;
    }

    #this is Category List with Sub Category
     public function GetAllCategory() {
        //For All Notice
        $query = $this->db->query("SELECT * FROM content_category  order by CID");
        $rows = $query->result();
        return $rows;
    }  
    
     public function DeleteCategory($Id, $File) {
        $m = $this->db->delete('content_category', array('CID' => $Id));
        unlink("dist/img/icon/" . $File);
        return m;
    }

      #this is Sub Category List with Sub Category
     public function GetAllSubCategory() {
        //For All Notice
        $query = $this->db->query("SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID order by csc.CSCID");
        $rows = $query->result();
        return $rows;
    }

    public function DeleteSubCategory($Id, $File) {
        $m = $this->db->delete('content_sub_category', array('CSCID' => $Id));
        unlink("dist/img/icon/" . $File);
        return m;
    }

    public function GetAllcategoryWithSubCategory() {
    $rows=array(
         //Category
        "Category" => $this->db->query("SELECT * FROM content_category  order by CID ")->result(),  
          //Sub Category
        "SubCategory" => $this->db->query("SELECT * FROM content_sub_category  order by CSCID ")->result()
    );   
     
        return $rows;
    }
    
     public function GetCertainCategory($ID) {
        //For All Infos
        $query = $this->db->query("SELECT csc.CSCID, csc.Category, csc.Detail, csc.Others, cc.category as CategoryName FROM content_sub_category csc left join content_category cc on cc.CID=csc.CID where csc.CSCID=$ID");
        $rows = $query->row();
        return $rows;
    }  

}

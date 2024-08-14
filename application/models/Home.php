<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author Evan DU
 */
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('News_model', 'NM');
        $this->load->model('PhotoSlideGallery_Model', 'PGS');
    }

    public function Index() {

        $data["Title"] = "Bangladesh Computer Council, Barishal";
        $data["slide"] = 1;
        $data["Info"] = $this->NM->GetAllNewsAndNotice();
        $data["Slide"] = $this->PGS->GetAllPhotosForWebpage();
        $data["Office"] = $this->PGS->GetAllPhotosofOfficeKeyPersons();
        $data["AllList"] = $this->PGS->GetAllcategoryWithSubCategory();
        
        $this->load->view("Include/Header", $data);
        $this->load->view("Home/Index");
        $this->load->view("Include/Footer");

        //$this->load->view("Home/Index");
    }

    public function Certificate_Validation() {

        $data["Title"] = "Certificate Validation";
        $data["slide"] = 0;
        $this->load->view("Include/Header", $data);
        $this->load->view("Home/Certificate_Validation");
        $this->load->view("Include/Footer");

        //$this->load->view("Home/Index");
    }

    public function SerchCertificate($Number) {
        $this->load->model("Student_Model", "SM");
        $data = $this->SM->SerchCertificate($Number);
        echo json_encode($data);
    }

    public function notice() {
        $data["Info"] = $this->NM->GetAllNewsAndNotice();
        $data["Title"] = "All Notice";
        $data["slide"] = 0;
        $data["Office"] = $this->PGS->GetAllPhotosofOfficeKeyPersons();
        $this->load->view("Include/Header", $data);
        $this->load->view("Home/notice");
        $this->load->view("Include/Footer");
    }

    public function News() {
        $data["Info"] = $this->NM->GetAllNewsAndNotice();
        $data["Title"] = "All News";
        $data["slide"] = 0;
        $data["Office"] = $this->PGS->GetAllPhotosofOfficeKeyPersons();
        $this->load->view("Include/Header", $data);
        $this->load->view("Home/News");
        $this->load->view("Include/Footer");
    }

    public function NoticeOpen($Id) {
        $rowCertain = $this->NM->GetCertainNews($Id);
        $data["Title"] = "Open Notice";
        $data["MyNews"] = $rowCertain;
        $data["slide"] = 0;
        $data["Office"] = $this->PGS->GetAllPhotosofOfficeKeyPersons();
        $this->load->view("Include/Header", $data);
        $this->load->view("Home/NoticeOpen");
        $this->load->view("Include/Footer");
    }
    
    public function CategoryPageInfo($Id) {
        $rowCertain = $this->PGS->GetCertainCategory($Id);
        $data["Title"] = "Category Info";       
        $data["MyInfo"] = $rowCertain;       
        $data["slide"] = 0;
        $data["Office"] = $this->PGS->GetAllPhotosofOfficeKeyPersons();
        
        $this->load->view("Include/Header", $data);
        $this->load->view("Home/CategoryPageInfo");
        $this->load->view("Include/Footer");
    }

}

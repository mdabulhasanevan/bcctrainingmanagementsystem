<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Exam
 *
 * @author Evan DU
 */
class ExcelCtrl extends CI_Controller {

    //view
    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION["User_loged"])) {
            $this->session->set_flashdata("successErr", "Please login first. ");
            redirect('Auth/login');
        }
        $this->load->model("Excel_Model", "EM");
        $this->load->library("Excel","XL");
    }

//Check User Role
    public function CheckUserRole($uri) {
        $this->load->model("User_Model", "User");
        $IsOk = $this->User->CheckUserRole($uri);
        if ($IsOk != TRUE) {
            redirect("Auth/Restricted");
        }
    }

  


    #region Result

    public function Excelview() {
       $this->checkuserRole(uri_string());
        $data["Title"] = "Excel View";
        $this->load->view('Include/LeftMenuAdmin', $data);
        $this->load->view("Excel/ExcelView");
    }

     function import()
     {
      if(isset($_FILES["file"]["name"]))
      {
       $path = $_FILES["file"]["tmp_name"];
       $object = PHPExcel_IOFactory::load($path);
       foreach($object->getWorksheetIterator() as $worksheet)
       {
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        
            for($row=2; $row<=$highestRow; $row++)
            {
             $SNO = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
             $Name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
             $Father = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
             $village = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
             $Ward = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
             $NID = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
             $Mobile = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
           
          
                 $data[] = array(
                     'ID'  => 0,
                  'SNO'  => $SNO,
                  'NAME'   => $Name,
                  'Father'    => $Father,
                  'Village'  => $village,
                  'Ward'    => $Ward,
                  'NID'    => $NID,
                  'Mobile'    => $Mobile,
                 );
            }
            
       }
       
      
       $this->EM->insert($data);
       echo 'Data Imported and Remove Duplicate data successfully';
      } 
     }
     
     function Exportaction()
     {
      $this->load->model("Excel_Model");
      $this->load->library("excel");
      $object = new PHPExcel();
    
      $object->setActiveSheetIndex(0);
    
      $table_columns = array("SNO", "NAME", "Father", "Village", "Ward","NID","Mobile");
    
      $column = 0;
    
      foreach($table_columns as $field)
      {
       $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
       $column++;
      }
    
      $employee_data = $this->Excel_Model->fetch_data();
    
      $excel_row = 2;
    
      foreach($employee_data as $row)
      {
       $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->SNO);
       $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->NAME);
       $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->Father);
       $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->Village);
       $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->Ward);
       $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->NID);
       $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->Mobile);
       $excel_row++;
      }
    
      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="Relief Data.xls"');
      $object_writer->save('php://output');
     }


    
}

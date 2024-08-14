<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommonModel
 *
 * @author Evan DU
 */
class Excel_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


     function insert($data)
     {
         
        $this->db->query("Delete from CAMS");
        $this->db->query("Delete from CAMS_Nid_unique"); 
        $this->db->query("Delete from CAMS_Mobile_unique");
        
        $this->db->insert_batch('CAMS', $data); 
        //$this->db->query("INSERT INTO CAMS_Unique (SELECT * FROM CAMS GROUP BY NID HAVING NID>100000000  ORDER BY Ward)"); 
        
        $this->db->query("INSERT INTO CAMS_Nid_unique (SELECT * FROM CAMS GROUP BY NID ORDER BY Ward)"); 
        
       
       for($i=9;$i>0;$i--)
       {
          
       }
       
        $this->db->query("INSERT INTO CAMS_Mobile_unique (SELECT * FROM CAMS_Nid_unique GROUP BY Mobile ORDER BY Ward)");
    
        //$this->db->query("INSERT INTO CAMS_Mobile_unique (SELECT * FROM CAMS_Unique)");
        
        
     }
     
     
     function fetch_data()
     {
      $this->db->order_by("Ward", "ASC");
      $query = $this->db->get("CAMS_Mobile_unique");
      return $query->result();
     }
    
    
}
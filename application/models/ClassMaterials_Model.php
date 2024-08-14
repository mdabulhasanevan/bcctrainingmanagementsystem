<?php

/**
 * Description of Setting_Model
 *
 * @author Evan DU
 */
class ClassMaterials_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

 public function GetAllClassMaterials() {
        $result = $this->db->query("SELECT cs.*, b.Batch as BatchName FROM ClassMaterials as cs left join batch b on b.Id=cs.BatchID")->result();
        return $result;
       
    }

    public function DeleteClassMaterials($id) {
        $result = $this->db->delete("ClassMaterials", array('ID' => $id));
        return $result;
    }

    public function AddClassMaterials($ClassMaterials) {
        $result = $this->db->insert("ClassMaterials", $ClassMaterials);
        return $result;
    }

    public function UpdateClassMaterials($ClassMaterials) {
        $data = array(
            "BatchID" => $ClassMaterials->BatchID,
            "ClassDetail" => $ClassMaterials->ClassDetail,
            "Others" => $ClassMaterials->Others,
            "Date" => $ClassMaterials->Date,
            "Files" => $ClassMaterials->Files,
            
        );
        $this->db->where(array('ID' => $ClassMaterials->ID));
        $result = $this->db->update("ClassMaterials", $data);
        return $result;
    }
    
     public function GetAllLiveClass($BatchID) {
        $result = $this->db->query("SELECT cs.* FROM ClassMaterials as cs where cs.BatchID=$BatchID ORDER BY ID DESC limit 1")->result();
        return $result;
       
    }
    
    
    public function GetAllStudentsMailByBatch($BatchID)
    {
        $result = $this->db->query("SELECT GROUP_CONCAT(Email) as Mail FROM student WHERE BatchID=$BatchID")->row();
        return $result;
    }
    

    #end region
    




}
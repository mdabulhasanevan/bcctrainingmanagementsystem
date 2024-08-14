<?php

/**
 * Description of Setting_Model
 *
 * @author Evan DU
 */
class MeetingManagment_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    #regionBatch


   
    
    public function GetAllLabInfo() {
       // $result = $this->db->get("batch")->result();
          $result = $this->db->query("SELECT * FROM DCLABInfo")->result();
        return $result;
    }

    public function DeleteLabInfo($id) {
        $result = $this->db->delete("DCLABInfo", array('LabID' => $id));
        return $result;
    }

    public function AddLabInfo($Lab) {
        $result = $this->db->insert("DCLABInfo", $Lab);
        return $result;
    }

    public function UpdateLabInfo($Batch) {
        $data = array(
            "LabName" => $Batch->LabName,
            "LabInfo" => $Batch->LabInfo,
            "LabType" => $Batch->LabType,
            "LabCapacity" => $Batch->LabCapacity,
            "Others" => $Batch->Others,
           
        );
        $this->db->where(array('LabID' => $Batch->LabID));
        $result = $this->db->update("DCLABInfo", $data);

        //$result = $this->db->get("batch")->result();
        return $result;
    }

    #end region
    
        public function GetAllMeeting() {
       // $result = $this->db->get("batch")->result();
          $result = $this->db->query("SELECT * FROM DCMeetingInfo")->result();
        return $result;
    }

    public function DeleteMeeting($id) {
        $result = $this->db->delete("DCMeetingInfo", array('MeetingID' => $id));
        return $result;
    }

    public function AddMeeting($Lab) {
        $result = $this->db->insert("DCMeetingInfo", $Lab);
        return $result;
    }

    public function UpdateMeeting($Batch) {
        $data = array(
            "MeetingName" => $Batch->MeetingName,
            "MeetingDetail" => $Batch->MeetingDetail,
            "Date" => $Batch->Date,
            "StartTime" => $Batch->StartTime,
            "EndTime" => $Batch->EndTime,
            "MeetingGuestDetail" => $Batch->MeetingGuestDetail,
            "MeetingHost" => $Batch->MeetingHost,
            "MeetingRoomID" => $Batch->MeetingRoomID,
           
           
        );
        $this->db->where(array('MeetingID' => $Batch->MeetingID));
        $result = $this->db->update("DCMeetingInfo", $data);

        //$result = $this->db->get("batch")->result();
        return $result;
    }

    #end region
    
   
    
    
}

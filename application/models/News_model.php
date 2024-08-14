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
class News_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function GetBreakingNews() {
        //For Breaking News
        $query = $this->db->query("SELECT * FROM breakingnews Where NewsType='Breaking' AND IsHide=0  order by BrId DESC limit 2");
        $row = $query->result();
        return $row;
    }

    public function GetAllNewsWithoutBreaking() {
        //For All Notice
        $query = $this->db->query("SELECT * FROM breakingnews where NewsType not in('Breaking') order by BrId DESC limit 10");
        $rows = $query->result();
        return $rows;
    }

    public function GetAllNewsWithBreaking() {
        //For All Notice
        $query = $this->db->query("SELECT * FROM breakingnews  order by BrId DESC limit 10");
        $rows = $query->result();
        return $rows;
    }

    public function GetAllNews() {
        //For All Notice
        $query = $this->db->query("SELECT * FROM breakingnews  order by BrId DESC");
        $rows = $query->result();
        return $rows;
    }

    public function GetCertainNews($Id) {
        //For All Notice
        $query = $this->db->query("SELECT * FROM breakingnews WHERE BrId=$Id order by BrId DESC limit 10");
        $row = $query->row();
        return $row;
    }

    public function DeleteNews($Id, $File) {
        $m = $this->db->delete('breakingnews', array('BrId' => $Id));
        unlink("uploads/" . $File);
        return m;
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
        $result = $this->db->update("breakingnews", $data);
        return $result;
    }

//    This is for Home page related all page Title and Breaking news
    public function GetAllNewsAndNotice() {
        $News = $this->db->query("SELECT * FROM breakingnews where NewsType=2 and IsHide=0 order by BrId DESC Limit 5")->result();
        $Notice = $this->db->query("SELECT * FROM breakingnews where NewsType=1 and IsHide=0 order by BrId DESC Limit 5")->result(); //GetAllNewsWithoutBreaking();

        $data = array(
            "News" => $News,
            "Notice" => $Notice,
        );
        return $data;
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Student_Model
 *
 * @author Evan DU
 */
class StudentPanel_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    #region CourseSubject Name

    public function GetStudentTrainingSyllabus($StudentID) {
        
       
        
        $result = $this->db->query("select cs.* from student as s LEFT JOIN batch b on b.Id=s.BatchID LEFT JOIN CourseTitle ct on ct.ID=b.CourseTitle LEFT JOIN courseSubject cs on cs.CourseID=ct.ID WHERE s.SID=$StudentID ORDER BY cs.Day, cs.TopicName ASC")->result();
        return $result;
        
    }





}
<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admission
 *
 * @author Evan DU
 */
class Countdown extends CI_Controller {

    public function __construct() {
        parent::__construct();
    
    }

        public function index()
        {
        $data["Title"] = "Countdown";
       
        $this->load->view('Extra/Countdown2', $data);
            
        }

}
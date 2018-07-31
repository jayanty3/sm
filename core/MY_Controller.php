<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Controller
 *
 * @author raakesh
 */
class MY_Controller extends CI_Controller {

    //put your code here
    public $user;
    public $data;

    function __construct() {
        parent::__construct();

        if ($this->ion_auth->logged_in()) {

            $this->user = User::find(array("conditions" => array("id" => $this->ion_auth->user()->row()->id)));
            
        }
        $this->data['user'] = $this->user ? $this->user : NULL;
    }

}

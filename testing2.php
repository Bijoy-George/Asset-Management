<?php 
defined('BASEPATH') OR exit ("No direct script access allowed");

class Testing2 extends CI_Controller {
    
    
    function __construct(){
        parent::__construct();
        $this->load->helper("url");
    }
    
    function test_form_2(){
        $this->load->view('test_form_2.php');
        
    }
    
    
    function insert_form(){
        $name=$this->input->post('name');
        $data = array(
        "name"=>$name
        
        );
        $this->intro_model->
    }
    
}

?>
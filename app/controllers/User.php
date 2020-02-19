<?php
class User extends MController{
    private $UserModel;
    public function __construct(){
        parent::__construct();
        $this->UserModel=$this->load->model('UserModel');
    }

    public function noMethod(){
        header("location:".HOME);
        
    }
}
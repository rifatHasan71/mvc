<?php


class MController{
    protected $load;
    protected $utility;

    public function __construct(){
        
        $this->load=new Load();
        $this->utility=new Utility();

    }

    
}
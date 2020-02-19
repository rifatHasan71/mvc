<?php 

class News extends MController{
    public function __construct(){
        parent::__construct();
    }

    public function select(){
        print_r( $this->load->model('NewModel')->select());
    }
}
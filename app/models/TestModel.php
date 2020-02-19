<?php

class TestModel extends MModel{
    public function __construct(){
        parent::__construct();
    }

    public function insert($blob){
        $sql="insert into test(image) values(:blob) ";
        $this->db->insertblob($sql,$blob);
    }

    public function  showblob(){
        $sql="select * from test";
        return $this->db->selectblob();
    }
}
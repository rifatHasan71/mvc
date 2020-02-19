<?php

class NewModel extends MModel{
    public function  __construct(){
        parent::__construct();
    }

    public function select(){
        $sql="select * from new";
        return $this->new->select($sql);
    }
}
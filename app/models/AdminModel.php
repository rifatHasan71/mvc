<?php

class AdminModel extends MModel{
    private $table="admin";
    public function __construct(){
        parent::__construct();
    }

    public function loginAuth($username,$password,$row_count=true){
        
        $sql="select * from $this->table where username=? and password=?";
        $username=htmlspecialchars($username);
        $password=htmlspecialchars($password);
        $data=array($username,$password);
        return $this->db->rowCount($sql,$data,$row_count);
       
        
       
        
        
    }

    

}
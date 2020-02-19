<?php

class CatModel extends MModel{
    private $table="category";
    
    public function __construct(){
        parent::__construct();
    }
    public function catList(){

        $sql="select * from $this->table";
        return $this->db->select($sql);

    }

    public function catById($id){
        $id=htmlspecialchars($id);
        $sql="select * from $this->table where cat_id=:cat_id";
        $data=array(
            "cat_id"=>$id
        );
        return $this->db->select($sql,$data);    
    }


    public function insertCat($data){
        
        return $this->db->insert($this->table,$data);
    }

    public function updateCat($table,$cat_id,$data=array()){
        $cond="cat_id=$cat_id";
        return $this->db->update($table,$cond,$data);
    }

    public function delcat($table,$id){
        
        $cond="cat_id=$id";
        return $this->db->delete($table,$cond);
    }
}
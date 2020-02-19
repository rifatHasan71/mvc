<?php

class PostModel extends MModel{
    private $table='post';
    public function __construct(){
        parent::__construct();
    }

    public function selectAll(){
        //may be it will not be used .because this table has foreign key connection 
        //instead use joinSelectAll()

        $sql="select * from $this->table";
        return $this->db->select($sql);
    }

    public function rowCount(){
        $sql="select * from $this->table";
        return $this->db->rowCount($sql);
    }

    public function postById($id){
        //may be it will not be used .because this table has foreign key connection 
        //instead use joinSelectById()

        $id=htmlspecialchars($id);
        $cond="id=$id";
        $sql="select * from $this->table where $cond";
        return $this->db->select($sql);
        
    }



    public function insert($data){
        return $this->db->insert($this->table,$data);
    }

    public function joinSelectAll($limit=""){
        $sql="select post.*,category.*
              from post
              inner join category
              on category.cat_id=post.category order by Date desc LIMIT $limit 
            ";
        return $this->db->select($sql);
    }

    public function joinSelectById($id){
        
       $id=htmlspecialchars($id);
        $sql="select post.*,category.*
              from post
              inner join category
              on category.cat_id=post.category
              where post.id=:id
            ";
        $data=array(
            'id' => $id
        );
        return $this->db->select($sql,$data);
    }

    public function joinSelectByCat($catId){
        $id=htmlspecialchars($catId);
        $sql="select post.*,category.*
              from post
              inner join category
              on category.cat_id=post.category
              where post.category=$id
            ";
         return $this->db->select($sql);
    }

    public function joinSearch($key){
        $sql="select post.* ,category.* from $this->table 
              inner join category
              on category.cat_id=post.category
              where post.title like '%$key%' or post.author like '%$key%' or post.body like '%$key%'  or category.name like '%$key%'";
        return $this->db->select($sql);
        
    }
    
    public function delete_by_id($id){
        $cond="id = '$id'";
        return $this->db->delete($this->table,$cond);
    }
}
 

?>
<?php

class PostImage extends MModel{
    public $table;
    public function __construct(){
        parent::__construct();
        $this->table='post_image';
    }

    public function select_by_post_id($id){
        $sql="select * from $this->table where post_id=:post_id";
        $data=array(
            'post_id' => $id
        );
        return $this->db->select($sql,$data);
    }

    public function insert($image_name,$post_id){
        $data=array(
            'image_name' => $image_name,
            'post_id'    => $post_id
        );
        return $this->db->insert($this->table,$data);
    }

    public function delete_by_post($id){
        $images=$this->select_by_post_id($id);
        foreach($images as $image){
            unlink($image['image_name']);
        }
        $id=htmlspecialchars($id);
        $cond="post_id = '$id'";
        return $this->db->delete($this->table,$cond);
    }
}
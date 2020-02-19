<?php
class FormVal{
    public $value=array();
    public $current_index=array();
    public $error=array();

    public function __construct(){

    }
    public function post($key,$allow_special_char=false){
        $this->current_index=$key;
        if($allow_special_char){
            $this->value[$this->current_index]=str_replace("<script>","&lt;script&gt;",trim($_POST[$key]));  
        }else{
            $this->value[$this->current_index]=htmlspecialchars(trim($_POST[$key]));  
        }
        return $this;
        
    }

    public function get($key){
        $this->current_index=$key;
        $this->value[$this->current_index]=htmlspecialchars(trim($GEL[$key]));
        return $this;
    }

    public function file($key){
        $this->current_index=$key;
        $this->value[$this->current_index]=$_FILES[$key];
        return $this;
    }

    

    



    public function Empty($msg=" Must Not Empty",$count_zero=true){
        if($count_zero){
            if($this->value[$this->current_index] ==""){
                $this->error[$this->current_index]['empty']=$this->current_index.$msg;
            }
        }else{
            if(empty($this->value[$this->current_index])){
                $this->error[$this->current_index]['empty']=$this->current_index.$msg;
            }
        }
        
        return $this;
    }

    public function  length($min,$max){
        if(strlen($this->value[$this->current_index]) < $min or strlen($this->value[$this->current_index]) > $max){
            $this->error[$this->current_index]['length']="length between $min to $max";
           
        }
        return $this;
    }
    public function value(){

    }
    public function submit(){
        if(empty($this->error)){
            return true;
        }else{
            return false;
        }
    }


    /*for image start*/
    public function valid_type($data=array()){
        if(!in_array(@exif_imagetype($this->value[$this->current_index]['tmp_name']),$data)){
            $this->error[$this->current_index]['image_type']="Not an valid image";
        }
        return $this;
    }

    

    public function size($size=10000000){
        if($this->value[$this->current_index][size] > $size ){
            $this->error[$this->current_index]['size']="image size should not excessed $size";
        }
        return $this;
    }

    public function get_tmp(){
        return $this->value[$this->current_index]['tmp_name'];
    }

    public function get_name(){
        return $this->value[$this->current_index]['name'];
    }
/* for image end */
}
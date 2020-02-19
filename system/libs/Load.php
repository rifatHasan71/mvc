<?php

class Load{
    public function view($view_name,$data=NULL){
        $utility=new Utility();  //we can use utility in any view file
        
        include_once $_SERVER['DOCUMENT_ROOT']."/mvc/app/config/config.php";  //we can use config file inside view file


        if($data!=NULL){
            extract($data);
        }

        include $view_name.".php";
    }

    public function model($model_name){
        if(file_exists('app/models/'.$model_name.'.php')){
            include 'app/models/'.$model_name.'.php';
            return new $model_name();
        }  
    }

    public function validation($class_name){
        
        if(file_exists($_SERVER['DOCUMENT_ROOT']."/mvc/app/validation/".$class_name.".php")){
            include_once $_SERVER['DOCUMENT_ROOT']."/mvc/app/validation/".$class_name.".php";
            return new $class_name;
        }else{
            die("No file");
        }
        
    }
}


?>
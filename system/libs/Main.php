<?php

class Main{
    public $url;
    public $controller_path="app/controllers/";
    public $controller;
    public function __construct(){
       
        $this->getUrl();
        $this->loadController();
        $this->callMethod();
    }

    public function default($param=""){
        include_once 'app/controllers/Index.php';
        $controller=new Index();
        $controller->home($param);
        exit();  //if there is not controller then load default and terminate

    }

    public function getUrl(){
        if(isset($_GET['url']) ){
            $this->url=$_GET['url'];
            if($this->url != ""){
                $this->url=rtrim($this->url,'/');
                $this->url=explode("/",$this->url);
            }else{
                unset($this->url);
            }
        }else{
            $this->default();         
        }
    }

    public function loadController(){
        if(isset($this->url[0])){
            $this->controller=$this->url[0];
            $class_path=$this->controller_path . $this->controller.".php";
            if(file_exists($class_path)){
                include $class_path;
                if(class_exists($this->controller)){
                    $this->controller=new $this->controller();
                }else{
                    $this->default($this->url[0]);
                }
            }else{
                 $this->default($this->url[0]);
            }
        }
    }

    public function callMethod(){
        if(isset($this->url[1]) and $this->url[1] != ""){
            $method=$this->url[1];
            if(method_exists($this->controller,$method)){
                if(isset($this->url[2]) and $this->url[2] != ""){
                    if(isset($this->url[3])):
                        $this->controller->$method($this->url[2],$this->url[3]);
                    else:
                        $this->controller->$method($this->url[2]);
                    endif;
                }else{
                    
                    $this->controller->$method();
                }
                
            }else{
                $this->controller->noMethod($this->url[1]);
            }
        }else{
            
            $this->controller->noMethod();
        }
    }
}
?>
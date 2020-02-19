<?php
spl_autoload_register(function($class){
  include_once "system/libs/".$class.".php";
});
include_once "app/config/config.php";




$main=new Main();  //we did all functionaliy for url inside Main class



/*
/*procedural method
/*
/*



if (isset($_GET['url']) and !empty($_GET['url'])) {
  $url=$_GET['url'];
  $url=rtrim($url,"/");
  $url=explode("/",$url);
  

  $controller=$url[0];
  $controller_loc="app/controllers/".$controller.".php";
  if(file_exists($controller_loc)){

    include "app/controllers/".$controller.".php";
    $controller=new $controller();
    

    if(isset($url[1]) and method_exists($controller,$url[1])){
      $method=$url[1];
      if(isset($url[2])){
        $param=$url[2];
        $controller->$method($param);

      }else{
        $controller->$method();
      }


    }else{
      $controller->default();
    }


  }else{
    include "app/controllers/Index.php";
    $controller=new Index();
    $controller->home();
  }
  

}else{
  include "app/controllers/Index.php";
  $controller=new Index();
  $controller->home();
  
}

*/

 ?>

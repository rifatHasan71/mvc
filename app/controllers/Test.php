<?php


class Test extends MController{
  public function __construct(){
    parent::__construct();
    
  }

  public function test(){
    $this->load->view("test");
  }

  public function default(){
    $this->load->view("home");
  }

  public function noMethod(){
    
  }

  public function insert(){
    if(isset($_POST['submit'])){
      $file=$_FILES['image']['tmp_name'];
      $file=file_get_contents($file);
      //echo $file;
      $this->load->model('TestModel')->insert($file);
    }
  }

  public function showblob(){
    $data['image']= $this->load->model('TestModel')->showblob();
  
    //echo $this->load->model('TestModel')->showblob();
   $this->load->view(PUBLIC_VIEWS.'test',$data);
  }


}

?>

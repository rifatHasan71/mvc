<?php
class Category extends MController{
    private $table="category";
    private $catModel;
    public function __construct(){
        parent::__construct();
        $this->catModel=$this->load->model("catModel");
        
    }

    
//default


    public function default(){
        header("location:".HOME);
    }

    public function noMethod(){
        $this->default();
    }



    public function catList(){
        
        $data=array();
        $data['active_page']='catlist';
        $data['catList']=$this->catModel->catList();
        $this->load->view(PUBLIC_VIEWS.'catList',$data);
    }

    public function catOne($id=NULL){
        if($id!=NULL){
            $data=array();
            $data['catOne']=$this->catModel->catOne($this->table,$id);
            if(!empty($data['catOne'])){
                $this->load->view('catOne',$data);
            }else{
                $this->load->view(PUBLIC_VIEWS."home");
            }
            
            
        }else{
            $this->load->view(PUBLIC_VIEWS."home");
        }
        
    }



/*
/*there is two insert metho
/*first one is action page.mainly all functionality will be controlled from here
/*other one is only for including view page.
/*user only see second one

*/

    //action page for inserting category

    public function insertCat(){

        if(isset($_POST['name']) and isset($_POST['type'])){
            session_start();
            $name=$_POST['name'];
            $type=$_POST['type'];
            if(!$this->utility->emptyCheck(array($name,$type))){
                $data=array(
                    //it is going to be passed in catmodel
                    //this are table field_name=>value
                    "name"=>$name,
                    "type"=>$type
                );
                
                
                
                if($this->catModel->insertCat($data)){
                    //if successfully inserted

                    $_SESSION['msg']="success";
                    $_SESSION['cond']=true;
                    header("location:http://localhost/mvc/category/addcat");
                }else{
                    $_SESSION['msg']="failed";
                    $_SESSION['cond']=false;
                    header("location:http://localhost/mvc/category/addcat");
                }
            }else{
                    //if fields are empty

                    $_SESSION['msg']="Field must not empty!";
                    $_SESSION['cond']=false;
                    header("location:http://localhost/mvc/category/addcat");
            }
            
           
        }
        
    }

    //visual page for inserting category

    public function addCat(){
        $this->load->view(PUBLIC_VIEWS."addCat");
    }


/*
/*method for update

*/
    //action page for update 

    public function updateCatAction($id=NULL){
        session_start();
        if($id !=NULL){
            $cat_id=$id;
            if(isset($_POST['name']) and isset($_POST['type'])){
                $name=$_POST['name'];
                $type=$_POST['type'];

                $data=array(
                    "name"=>$name,
                    "type"=>$type,

                );
                
               if($this->catModel->updateCat($this->table,$cat_id,$data)){
                    $_SESSION['msg']="update success";
                    $_SESSION['cond']=true;
                    header("location:http://localhost/mvc/category/updateCat/$id");
               }else{
                    $_SESSION['msg']="update failed";
                    $_SESSION['cond']=false;
                    header("location:http://localhost/mvc/category/updateCat/$id");
               }
            }

        }else{
            $this->default();
        }
    }

    //visual page for update

    public function updateCat($id=NULL){
        if($id !== NULL){
            $data['target_cat']=$this->catModel->catById($id);
            $data['id']=$id;
            if(!empty($data['target_cat'])){
                $this->load->view(PUBLIC_VIEWS.'updateCat',$data);
            }else{
                $this->default();
            }
            
        }else{
            $this->default();
        }
        
    }

    /*delete category
    //
    */
    public function delcat($id=NULL){
        
        session_start();
        if($id != NULL and !empty($this->catModel->catById($id))){
            
            
            if($this->catModel->delcat($this->table,$id)){
                $_SESSION['msg']="delete success";
                $_SESSION['cond']=true;
                header("location:http://localhost/mvc/category/catlist");
            }else{
                $_SESSION['msg']="delete failed";
                $_SESSION['cond']=false;
                header("location:http://localhost/mvc/category/catlist");
            }
        }else{
            $this->default();
        }
        
    }



    /*
    /* for test purpose 
 
    public function test($id){
        if(!empty($this->catModel->catOne($this->table,$id))){
            echo 'ok';
        }else{
            echo "not ok";
        }
    }
      
    */
    
}


?>
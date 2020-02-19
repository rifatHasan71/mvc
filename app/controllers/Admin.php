<?php
class Admin extends MController{

    private $AdminModel;
    public function __construct(){
        parent::__construct();
        $this->AdminModel=$this->load->model('AdminModel');
    }

    public function default($msg=array()){
        $this->login($msg);
    }

    public function noMethod(){
        $this->loginAuth();
    }
    public function login($msg=array()){
        $this->load->view(ADMIN_VIEWS.'login',$msg);
    }

    public function loginAuth(){
        Session::init();
        if(Session::checkSession("login",true) and Session::checkSession("username")){      
            header('location:'.BASE_URL."admin/dashboard");
        }else{
            if(isset($_POST['username']) and isset($_POST['password'])){
                $username=$_POST['username'];
                $password=$_POST['password'];
                
                if($this->AdminModel->loginAuth($username,$password) >0){
                    $admin=$this->AdminModel->loginAuth($username,$password,false);
                    $username=$admin[0]['username'];
                    $password=$admin[0]['password'];
                    
                    Session::set('login',true);
                    Session::set('username',$username);
                    Session::set('password',$password);
                    header('location:'.BASE_URL."admin/dashboard");
                }else{
                    $msg['auth_err']="user name or password error";
                    $this->default($msg);
                }
                
            }else{
                $this->default();
            }
        }
       
    }

    public function dashboard(){
        $data['active_page']="dashboard";
        $data['ip']=$_SERVER['REMOTE_ADDR'];
        
        Session::init();
        Session::unset("section");
        if(Session::checkSession('login',true) and Session::checkSession('username')){
            $this->load->view(ADMIN_VIEWS.'dashboard',$data);
        }else{
            $this->default();
        }
        
    }

    public function logout(){
        Session::init();
        Session::destroy();
        header("location:".ADMIN_LOGIN);
    }


    public function category(){
        $data['active_page']="category";
        
        Session::init();
        Session::unset("section");
        
        if(Session::checkSession('login',true) and Session::checkSession('username')){
            Session::set("section","category");
            $catModel=$this->load->model("CatModel");
            $data['catList']=$catModel->catList();
            $this->load->view(ADMIN_VIEWS.'dashboard',$data);
            
        }else{
            $this->default();
        }
        
        

    }

    public function addCategory(){
        Session::init();
        if(isset($_POST['name']) and isset($_POST['type'])){
            $catModel=$this->load->model("CatModel");
            $name=$_POST['name'];
            $type=$_POST['type'];
            $data=array(
                "name" =>$name,
                "type" =>$type
            );

            if(!empty($name)){
                if($catModel->insertCat($data)){
                
                    Session::set('success',true);
                    Session::set('msg',"successfully added");
                    header("location:".ADMIN_LOGIN."category");
                }else{
                    Session::set('success',false);
                    Session::set('msg',"insert failed");
                    header("location:".ADMIN_LOGIN."category");
                }
            }else{
                Session::set('success',false);
                Session::set('msg',"name should not be empty");
                header("location:".ADMIN_LOGIN."category");
            }
            
        }
        

    }

    
    
}
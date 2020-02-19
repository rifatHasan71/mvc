<?php
class Post extends MController{
    private $model;
    public function __construct(){
        parent::__construct();
        $this->model=$this->load->model("PostModel");
        
    }

    public function default(){
        header("location:".BASE_URL);
    }

    public function noMethod(){
        $this->default();
    }

    public function selectAll(){
        $data['postList']=$this->model->selectAll();
        $this->load->view();
    }

    public function postById($id=NULL){
       
        if($id != NULL){
            if(!empty($this->model->postById($id)) or $this->model->postById($id) !=''){
                $data['postList']=$this->model->joinSelectById($id);  //for join select
                $this->load->view(PUBLIC_VIEWS."post",$data);
            }else{
                $this->default();
            
              
            }
            
        }else{
             $this->default();
        }
    }


    public function addPost(){
        $data['active_page']='addpost';

        //ck editor upload image //

        if( isset($_FILES['upload']['name'],$_GET['id'])){
            $post_id=$_GET['id'];
            $function_number=$_GET['CKEditorFuncNum'];
            $form_val=$this->load->validation('FormVal');
            $path=HOME.'app/views/public/image/';
            $image_tmp_loc=$form_val->file('upload')->valid_type(array(IMAGETYPE_JPEG,IMAGETYPE_PNG,IMAGETYPE_GIF))->get_tmp();
            if(empty($form_val->error)){
                $image_name_array=explode('.',$form_val->get_name());
                $ext=end($image_name_array);
                $image_name=(uniqid()).'.'.$ext;
               
                if(move_uploaded_file($image_tmp_loc,$path.$image_name)){
                    $msg='uploaded';
                    $post_image_model=$this->load->model('PostImage');
                    $post_image_model->insert($path.$image_name,$post_id);
                    $url=BASE_URL.'app/views/public/image/'.$image_name;
                    
                    echo "<script>
                        window.parent.CKEDITOR.tools.callFunction($function_number,'$url','$msg');
                        
                        </script>";
                }else{
                    echo $path.$image_name;
                }
                
            }else{
                echo '<script> alert("problem")</script>';
            }
            
            exit();
        }


        //Main functionality ///

        if(!isset($_POST['title'],$_POST['category'],$_POST['author'],$_POST['body'],$_FILES['image'])){
            $catModel=$this->load->model("catModel");
            $data['catList']=$catModel->catList();
          
            $this->load->view(PUBLIC_VIEWS.'addPost',$data);
        }else{
            
            $form_val=$this->load->validation('FormVal');
            $category=$form_val->post('category')->value['category'];
            $author=$form_val->post('author')->value['author'];
            $body=$form_val->post('body',true)->value['body'];
            $title=$form_val->post('title')->value['title'];
            $date=date('y-m-d');
            $id=$form_val->post('id')->Empty()->value['id'];

            if(!empty($_FILES['image']['name'])){
                $image=$form_val->file('image')->valid_type(array(IMAGETYPE_JPEG,IMAGETYPE_PNG,IMAGETYPE_GIF))->get_image();
            
            }else{
                $image="";
            }
            
            if($form_val->submit()){
                $inp_data=array(
                    'title'=>$title,
                    'category'=>$category,
                    'author' =>$author,
                    'body' =>$body,
                    'Date' =>$date,
                    'image'=>$image,
                    'id'   =>$id
                );
                if($this->model->insert($inp_data)){
                    $catModel=$this->load->model("catModel");
                
                    $data['success_status']=true;
                    $data['success_msg']="Added successfully";
                    $data['catList']=$catModel->catList();
                    $this->load->view(PUBLIC_VIEWS.'addPost',$data);
                }else{
                   
                    $data['success_status']=false;
                    $data['success_msg']="Added successfully";
                }
            }else{
                //if form not submitted 
                //default 
               
                $catModel=$this->load->model("catModel");
                $data['form_error']=$form_val->error;
                $data['catList']=$catModel->catList();
                $this->load->view(PUBLIC_VIEWS.'addPost',$data);
            }
        }
        
       
        //session_start();
        /* if(isset($_POST['title']) and isset($_POST['category']) and isset($_POST['author']) and isset($_POST['body']) ){
            
            $image=$_FILES['image']['tmp_name'];
            $image=file_get_contents($image);

            $title=$_POST['title'];
            $category=$_POST['category'];
            $author=$_POST["author"];
            $body=$_POST['body'];
            $date=date('y-m-d');
            if(! $this->utility->emptyCheck(array($title,$author,$body))){
                $data=array(
                    'title'=>$title,
                    'category'=>$category,
                    'author' =>$author,
                    'body' =>$body,
                    'Date' =>$date,
                    'image'=>$image
                );

                if($this->model->insert($data)){
                    $_SESSION['msg']="Insert successfully";
                    $_SESSION['cond']=true;
                 
                    $this->load->view(PUBLIC_VIEWS.'addPost',$data);
                }else{
                    $_SESSION['msg']="something wrong";
                    $_SESSION['cond']=false;
                   
                   $this->load->view(PUBLIC_VIEWS.'addPost',$data);
                }
            }else{
                $_SESSION['msg']="Field must not empty";
                $_SESSION['cond']=false;
               
               $this->load->view(PUBLIC_VIEWS.'addPost',$data);
            }
           
            
        }else{
            //if form not submitted 
            //default 
            $catModel=$this->load->model("catModel");
            $data['catList']=$catModel->catList();
            $this->load->view(PUBLIC_VIEWS.'addPost',$data);
        } */

    }

    public function postBycat($catId=NULL){
        if($catId !=NULL){
            $category=$this->load->model("CatModel")->catById($catId);
            if(!empty($category)){
                $data['category']=$category[0]['name'];
                $data['postList']=$this->model->joinSelectByCat($catId);
                $this->load->view(PUBLIC_VIEWS.'postByCat',$data);
            }else{
                $this->default();
            }
            
        }else{
            $this->default();
        }
        

    }

    public function search(){
        if(isset($_POST['search']) and $_POST['search'] !=""){
            $key=$_POST['search'];
            $data['postList']=$this->model->joinSearch($key);
            
            $this->load->view(PUBLIC_VIEWS.'search',$data);
        }else{
            $this->default();
        }
    }

    public function delete_by_id($id=NULL){
        if($id==NULL){
            $this->default();
            
        }else{
            $post_image_model=$this->load->model('PostImage');
            if($this->model->delete_by_id($id) and $post_image_model->delete_by_post($id)){
               header("location:".BASE_URL);
            }else{
                header("location:".BASE_URL);
            }
            
        }
    }


    

}
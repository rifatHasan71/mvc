<?php include_once INC_PATH."header.php";
/* $uri=$_SERVER['REQUEST_URI'];
echo $uri."<br>";
echo $_SERVER['SERVER_PROTOCOL'];
if(preg_match('/mvc\/category\/catlist/i',$uri,$msg)){
    echo "ok";
}else{
    echo "no";
} */
?>

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-10 col-md-8 ">
            <h3 class="text-center">Add Post</h3>
            <?php
            
            if(isset($success_status)){
                if($success_status){

                
            ?>
                    <div class="alert alert-success">
                        <strong>Success</strong>
                        <?php echo $success_msg ?>
                    </div>
            <?php
            }else{

            ?>
                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <strong>Faild</strong>
                        <?php echo  $success_msg ?>
                    </div>
            <?php
                }
            }
            ?>
            <form action="<?php echo BASE_URL."post/addPost"; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                
                    <label for="">Title</label>
                <?php
                if(isset($form_error['title'])){
                ?>
                    <p class="text-danger mb-1 pl-2">
                        <?php 
                            foreach($form_error['title'] as $err){
                                echo $err;
                                break;
                            }
                        ?>

                    </p>
                <?php
                }
                ?>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Author</label>
                    <?php
                    if(isset($form_error['author'])){
                    ?>
                        <p class="text-danger mb-1 pl-2">
                            <?php 
                                foreach($form_error['author'] as $err){
                                    echo $err;
                                    break;
                                }
                            ?>

                        </p>
                    <?php
                    }
                    $id=uniqid();
                    ?>
                    <input type="hidden" name='id' value='<?php echo $id ?>'>
                    <input type="text" name="author" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Category</label>
                    <select name="category" id="" class="form-control">
                        <?php
                        if(isset($catList)){
                            foreach($catList as $cat){
                        ?>
                                <option value="<?php echo $cat['cat_id']?>">  <?php echo $cat['name']?>   </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Post</label>
                    <?php
                    if(isset($form_error['body'])){
                    ?>
                        <p class="text-danger mb-1 pl-2">
                            <?php 
                                foreach($form_error['body'] as $err){
                                    echo $err;
                                    break;
                                }
                            ?>

                        </p>
                    <?php
                    }
                    ?>
                    <textarea name="body" id="editor" cols="30" rows="12" class="form-control"></textarea>
                </div>
                <div class="form-group">
                        <?php
                        if(isset($form_error['image'])){
                        ?>
                            <p class="text-danger mb-1 pl-2">
                                <?php 
                                    foreach($form_error['image'] as $err){
                                        echo $err;
                                        break;
                                    }
                                ?>

                            </p>
                        <?php
                        }
                        ?>
                        <input type="file" name="image" class="upload btn">
                </div>
                <button class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body',{
        filebrowserUploadUrl: '<?php echo BASE_URL ?>Post/addpost?id=<?php echo $id ?>',
        filebrowserUploadMethod: 'form'
    });
    
</script>
<?php echo BASE_URL ?>system/helper/upload.php'
<?php include_once INC_PATH."footer.php"?>


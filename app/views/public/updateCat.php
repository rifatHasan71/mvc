<?php
    $name="";
    $type="";
    foreach($target_cat as $key){
        $name=$key['name'];
        $type=$key['type'];
    }
    
?>
<?php include_once INC_PATH."header.php"?>

    <div class="main">
        <div class="container my-3">
            
            
            <form action="http://localhost/mvc/category/updateCatAction/<?php echo $id ?>" method="post" class="w-50 mx-auto">
                <?php 
                session_start();
                
                if(isset($_SESSION['cond'] ) and $_SESSION["cond"]==true){?>
                    <div class="alert alert-success alert-dismissable fade show">

                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>

                        <strong><?php echo $_SESSION['msg']?></strong>
                        
                    
                    </div>
                <?php session_destroy(); }elseif(isset($_SESSION['cond'] ) and $_SESSION["cond"]==false){?>

                    <div class="alert alert-danger alert-dismissable fade show">

                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>

                         <strong><?php echo $_SESSION['msg']?></strong>
                         
                    </div>
                    
                <?php session_destroy(); }  ?>
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" name="type" id="type" class="form-control"  value="<?php echo $type; ?>">
                </div>
                <button class="btn btn-danger" name="submit" type="submit">Update</button>
                

            </form>


        </div>
           
      
    </div>

    <?php include_once INC_PATH."footer.php"?>
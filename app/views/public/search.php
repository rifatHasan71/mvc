<?php include_once INC_PATH."header.php"?>

<div class="container">
    <div class="col-12 col-md-10 post-section mx-auto ">
        <div class="list-group">
            <?php
            if(isset($postList) and !empty($postList)){
                foreach($postList as $post){

            ?>
                    <div class="list-group-item mb-3">
                        <div class="mb-2 post-header">
                            <h3 class="mb-0">  <?php echo $post['title'] ?> </h3>
                            <span class="d-block ">Date: <span class="text-success"><?php echo $post['Date'] ?></span></span>
                            <span class="d-block ">Author: <span class="text-success"><?php echo $post['author'] ?></span></span>
                            <span class=" d-block ">Category: <a class="" href="<?php echo BASE_URL."post/postBycat/".$post['cat_id'] ?>"><span class="text-info"><?php echo $post['name'] ?></span></a></span>
                        </div>
                        
                        <p><?php echo $utility->shortstr($post['body'],400)  //utility comese from Load class ?></p>
                        <button class="btn btn-info"><a href="<?php echo BASE_URL."Post/postById/".$post['id'] ?>" class="text-white">See more</a></button>
                    </div>
            <?php
                }
            }else{
                echo "<h2>Nothig found</h2>";
            }

            
            ?>

        </div>
    </div>
</div>


<?php include_once INC_PATH."footer.php"?>
<?php
include_once INC_PATH."header.php";
?>

<div class="container">
    <div class="list-group ">
        <?php
        if(isset($postList)){
            foreach($postList as $post){

        ?>
                <div class="list-group-item mb-3">
                    <div class="mb-2 post-header">
                        <h3 class="mb-0">  <?php echo $post['title'] ?> </h3>
                        <span class="d-block ">Date: <span class="text-success"><?php echo $post['Date'] ?></span></span>
                        <span class="d-block ">Author: <span class="text-success"><?php echo $post['author'] ?></span></span>
                        <span class=" d-block ">Category: <a class="" href="<?php echo BASE_URL."post/postBycat/".$post['cat_id'] ?>"><span class="text-info"><?php echo $post['name'] ?></span></a></span>
                    </div>
                    <!-- <div class="w-75 mx-auto py-3" >
                        <img src="data:image/png;base64,<?php echo base64_encode($post['image']) ?>" alt="" class="img-fluid">
                    </div> -->
                    <div class=" text-justify post p-3"><?php echo $post['body']; ?>.</div>
                    <a class="btn btn-primary" href="<?php echo BASE_URL.'post/delete_by_id/'.$post['id']  ?>">delete</a>
                    
                </div>
        <?php
            }

        }
        ?>

        
        



    </div>

</div>

<?php
include_once INC_PATH."footer.php";
?>

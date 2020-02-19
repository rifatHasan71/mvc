<?php include_once INC_PATH."header.php"?>

    <div class="container">
        <div class="row">
            
            <div class="col-12 col-md-4 category-section order-1 order-md-0  mb-3 mb-md-0">
                <h3 class="bg-info text-white px-3 py-2  rounded text-center">Category</h3>

                <ul class="list-unstyled list-group">
                    <?php
                    if(isset($catList)){
                        if(!empty($catList)){
                            foreach($catList as $cat){
                    ?>
                                <li class="list-group-item "><a class="list-group-link"href="
                                <?php echo BASE_URL.'post/postByCat/'.$cat['cat_id']?>"><?php echo $cat['name']?></a></li>
                   <?php
                            }

                        }else{
                    ?>
                            <li class="list-group-item ">No category</li>

                    <?php
                        }
                    }
                   ?>
                </ul>
            </div>

            <div class="col-12 col-md-8 post-section">
                <div class="list-group ">
                    <?php
                    if(isset($postList)){
                        foreach($postList as $post){

                    ?>
                            <div class="list-group-item mb-3 ">
                                <div class="mb-2 post-header">
                                    <h3 class="mb-0">  <?php echo $post['title'] ?> </h3>
                                    <span class="d-block ">Date: <span class="text-success"><?php echo $post['Date'] ?></span></span>
                                    <span class="d-block ">Author: <span class="text-success"><?php echo $post['author'] ?></span></span>
                                    <span class=" d-block ">Category: <a class="" href="<?php echo BASE_URL."post/postBycat/".$post['cat_id'] ?>"><span class="text-info"><?php echo $post['name'] ?></span></a></span>
                                </div>

                                <div class="post"> <?php echo $utility->shortstr($post['body'],600)  ?> </div>
                                <button class="btn btn-info"><a href="<?php echo BASE_URL."Post/postById/".$post['id'] ?>" class="text-white">See more</a></button>
                            </div>
                    <?php
                        }
                    }

                    
                    ?>

                    
                    



                </div>
                <div>
                <?php if(isset($total_page) and $total_page>0):?>
                <ul class="pagination">
                     <li class="page-item <?php echo $active_page_number==1 ? "disabled" : "" ; ?>">
                        <a class="page-link " href="<?php echo BASE_URL.((int)$active_page_number-1); ?>">Previous</a>
                     </li>
                     <?php if(isset($prev)): ?>
                     <li class="page-item">
                        <a class="page-link " href="<?php echo BASE_URL.((int)$prev); ?>"> <?php echo $prev; ?> </a>
                     </li>
                     <li class="page-item disabled">
                        <a class="page-link " href="">...</a>
                     </li>
                     <?php endif?>

                    <?php for($i=$pagi_start;$i<=$pagi_end;$i=$i+1){?>

                        <li class="page-item <?php echo $active_page_number==$i ? 'active' : ''  ?>">
                            <a class="page-link" href="<?php echo BASE_URL.$i ?>"><?php echo $i  ?></a>
                        </li>


                    <?php } ?>
                    <?php if(isset($end)): ?>
                    <li class="page-item disabled">
                        <a class="page-link " href="">...</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link " href="<?php echo BASE_URL.((int)$end); ?>"> <?php echo $end; ?> </a>
                     </li>
                     
                     <?php endif?>
                    <li class="page-item <?php echo $active_page_number==$total_page ? "disabled" : "" ; ?>"><a class="page-link " href="<?php echo BASE_URL.((int)$active_page_number+1); ?>">Next</a></li>
                    
                </ul>
                    <?php else: ?>
                    <div class="container py-4 alert-danger text-dark text-center">
                        Sorry No Post
                    </div>
                    <?php endif  ?>
                </div>
            </div>
            
        </div>
        
    </div>

 <?php include_once INC_PATH."footer.php"?>
 <script src="HZpagination.js"></script>


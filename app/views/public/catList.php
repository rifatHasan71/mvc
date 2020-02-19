<?php include_once INC_PATH."header.php"?>


    <div class="">
        <div class="container">
        <?php
            session_start();
            if(isset($_SESSION['msg']) and isset($_SESSION['cond'])){
                if($_SESSION['cond']){
        ?>
                    <div class="alert alert-success alert-dismissable fade show w-50 mx-auto">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <strong><?php echo $_SESSION['msg']?></strong>
                    </div>

            <?php
                }else{
            ?>
                    <div class="alert alert-danger alert-dismissable fade show w-50 mx-auto">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <strong><?php echo $_SESSION['msg']?></strong>
                    </div>
            <?php
                }
                session_destroy();
            }
            ?>


            <table class="table table-bordered col-12 col-md-10 mx-auto table-striped my-3">
            

                </div>
                <thead class="table-dark">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(!empty($catList)):
                            $sl=1; foreach($catList as $key){ ?>
                            <tr>
                                <th><?php echo $sl?></th>
                                <td><?php echo $key['name']?></td>
                                <td><?php echo $key['type']?></td>
                                <td><a class="btn btn-danger mb-1 mb-md-0   action-btn"href="http://localhost/mvc/category/delcat/<?php echo $key['cat_id']?>">Delete</a> <a class="btn btn-success action-btn"href="http://localhost/mvc/category/updatecat/<?php echo $key['cat_id']?>">Update</a></td>
                            </tr>
                    <?php 
                            $sl++; } 
                            else:
                    ?>
                    <tr >
                                <th colspan="4"  class="text-center alert-danger ">No data</th>
                    </tr>
                    <?php
                        endif;
                        
                    ?>
                </tbody>
            </table>
        </div>
           
      
    </div>

<?php include_once INC_PATH."footer.php"?>
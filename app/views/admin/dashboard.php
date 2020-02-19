<?php
$active_page=$active_page ?? "";
?>



<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
     <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
          <div class="container">
               <a href="<?php echo ADMIN_DASHBOARD ?>" class="navbar-brand">ADMIN</a>
               <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div id="navbarNav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                         <li class="nav-item">
                              <a href="<?php echo ADMIN_DASHBOARD  ?>" class="nav-link <?php echo $active_page=='dashboard' || 'category' ? "active" : ""; ?>">Home</a>
                         </li>
                         <li class="nav-item">
                              <a href="<?php echo ADMIN_LOGIN."logout"  ?>" class="nav-link ">Logout</a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>
     <section id="content">
          <div class="container">
               <div class="row">
                    <div class="col-lg-3">
                         <div id="side-nav" class="mt-2">
                              <h3 class="text-center bg-info rounded p-3 text-light">Menu</h3>
                              <ul class="list-group">
                                   <li class="list-group-item">
                                        <a href="<?php echo ADMIN_LOGIN."category" ?>"categroy>Category</a>
                                   </li>
                              </ul>
                         </div>
                         
                    
                    </div>
                    <div class="col-lg-9">
<!--section start-->
                    <!--category start-->

                    <?php  
                  /*   echo md5('login');  
                    echo "<pre>";
                    print_r($_SERVER);
                    echo "</pre>"; */
                    if(Session::checkSession("section","category")){

               
                    ?>
                         <div class="category-section py-2" >

                              <!--Add category -->

                              <div class="card">
                                   <div class="card-header bg-info ">
                                        <h4 class="text-center text-light">Add Category</h4>
                                   </div>
                                   <div class="card-body">
                                   <form action="<?php echo ADMIN_LOGIN.'addCategory'; ?>" method="post" class="w-75 mx-auto">
                                   <?php
                                   
                                   if(Session::checkSession("success")){
                                        if(Session::checkSession("success",true)){

                                   ?>   
                                        <div class="alert alert-success alert-dismissable">
                                             <button class="close" data-dismiss="alert">&times;</button>
                                             <?php echo Session::get('msg') ?>
                                        </div>
                                   <?php
                                        }else{
                                   ?>
                                        <div class="alert alert-danger alert-dismissable">
                                             <button class="close" data-dismiss="alert">&times;</button>
                                             <?php echo Session::get('msg') ?>
                                        </div>
                                   <?php
                                        }
                                   }
                                   Session::unset('msg');
                                   Session::unset('success');
                                   ?>
                                        <div class="form-group">
                                             <label for="">Name</label>
                                             <input type="text" name="name"class="form-control">
                                        </div>
                                        <div class="form-group">
                                             <label for="">Type</label>
                                             <input type="text" name="type" class="form-control">
                                        </div>
                                        <button class="btn btn-outline-primary">Add</button>
                                   </form>
                                   </div>
                              </div>

                              <!-- category list -->

                              <div class="card mt-2">
                                   <div class="card-header bg-success ">
                                        <h3 class="text-center text-light">Category List</h3>
                                   </div>
                                   <div class="card-body">
                                        <table class="table table-striped">
                                             <thead>
                                                  <tr>
                                                  <th>Sl</th>
                                                  <th>Name</th>
                                                  <th>Type</th>
                                                  <th>Action</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                             <?php
                                             $i=1;
                                             foreach($catList as $cat){
                                             ?>
                                             
                                                  <tr>
                                                       <td><?php echo $i; ?></td>
                                                       <td><a href="<?php echo ADMIN_LOGIN.'postByCat/'.$cat['cat_id'] ?>" class="text-dark"><strong><?php echo $cat['name']; ?></strong></a></td>
                                                       <td><?php echo $cat['type']; ?></td>
                                                       <td><a href="<?php echo ADMIN_LOGIN.'delCatById/'.$cat['cat_id'] ?>" class="btn btn-danger">Delete</a>  <a href="<?php echo ADMIN_LOGIN.'updateCatById/'.$cat['cat_id'] ?>" class="btn btn-success mt-1 mt-lg-0 ">Update</a></td>
                                                  </tr>
                                             <?php
                                             $i++;
                                             }
                                             ?>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                                 
                         </div>
                    <!--category end-->

                    <?php
                    }else{
                    ?>

                    
                    <!--home start-->
                         <div class="home">
                              this is home
                         </div>
                    <?php
                    }
                    ?>

                    </div>
               </div>
          </div>
     </section>

<?php
     require_once(INC_PATH."footer.php");
?>
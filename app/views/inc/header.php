<?php
    $active_page=$active_page ?? '' ;
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
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
    <style>
    .post{
        line-height:1.6;
        font-size:20px;
    }
    .post img {
        width:70% !important;
        height:auto !important;
        margin-left:15%;
        
    }
  

    @media only screen and (max-width: 600px) {
        .post img {
            width:100% !important;
            margin-left:0;
        
        }
        .post{
            padding:0 !important;
        }
    }

    </style>
</head>
<body>
    <div class="container  mb-3">
        <nav class="navbar navbar-dark bg-dark navbar-expand-sm rounded ">
            <div class="container">
                <a href="<?php echo BASE_URL ?>"  class="navbar-brand text-light">Oursite</a>
                <button class="navbar-toggler" data-target="#nav"  data-toggle="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL ?>" class="nav-link <?php echo $active_page=="home" ?  "active" : "";?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL.'category/catlist' ?>" class="nav-link <?php echo $active_page=="catlist" ?  "active" : "";?>">Catlist</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL.'post/addpost' ?>" class="nav-link <?php echo $active_page=="addpost" ?  "active" : "";?>">AddPost</a>
                        </li>
                        <li class="nav-item">
                            <form action="<?php echo BASE_URL.'Post/search'; ?>" method="post">
                                <div class="input-group pt-1">
                                    <input type="text" name="search" class="form-control form-control-sm">  
                                    <div class="input-group-append">
                                       <button class="t btn btn-info btn-sm" type="submit" name="submit">Search</button>
                                    </div>
                                </div>
                             </form>
                            
                        </li>
                        
                    
                        
                    </ul>
                </div>
            </div>
            
        </nav>
    
    </div>
    <script scandir></script>
    <script src="./js/script.js"></script>
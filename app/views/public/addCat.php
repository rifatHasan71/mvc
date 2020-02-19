<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
    .header,.footer{
        width:1200px;
        margin:5px auto;
    }


    .header{
        background:salmon;
        height:10vh;
    }

    .main{
        
        min-height:80vh;
    }

    .footer{
        background:salmon;
        height:10vh;
    }
    
    </style>
</head>
<body>
    <div class="header">
        this is header
        
    </div>

    <div class="main">
        <div class="container my-3">
            
            
            <form action="http://localhost/mvc/category/insertCat" method="post" class="w-50 mx-auto">
                <?php 
                session_start();
                
                if(isset($_SESSION['cond'] ) and $_SESSION["cond"]==true){?>
                    <div class="alert alert-success alert-dismissable fade show">

                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>

                        <strong>Success</strong>
                        <?php echo $_SESSION['msg']?>
                    
                    </div>
                <?php session_destroy(); }elseif(isset($_SESSION['cond'] ) and $_SESSION["cond"]==false){?>

                    <div class="alert alert-danger alert-dismissable fade show">

                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>

                         <strong>Sorry</strong>
                         <?php echo $_SESSION['msg']?>
                    </div>
                    
                <?php session_destroy(); }  ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" name="type" id="type" class="form-control">
                </div>
                <button class="btn btn-danger" name="submit" type="submit">Submit</button>
                

            </form>


        </div>
           
      
    </div>

<?php
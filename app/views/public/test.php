<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
    .header,.main,.footer{
        width:1200px;
        margin:5px auto;
    }


    .header{
        background:#ddd;
        height:10vh;
    }

    .main{
        border:1px solid #ddd;
        height:80vh;
    }

    .footer{
        background:#ddd;
        height:10vh;
    }
    
    </style>
</head>
<body>
    <div class="header">
        this is header
    
    </div>

    <form action="<?php echo BASE_URL."test/insert"  ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="image" >
        <button name="submit">Submit</button>
    </form>
    
    <?php 
    
        //foreach($image as $img){
           // header("content-type: image/jpeg");
           // $imag=$img['image'];
           //echo '<img src="data:image/jpeg;base64,'.base64_encode( $img['image'] ).'"/>';
        //}
     //  header("Content-Type: png");
       //echo $image;
       foreach($image as $img){
       // echo '<img src="data:image/png;base64,'.base64_encode($img['image']).'">';
    ?>
        <img src="data:image/png;base64,<?php echo base64_encode($img['image']) ?>" alt="">
    
    <?php
       }
    ?>
    <div class="footer">
        this is footer
    </div>


    
</body>
</html>
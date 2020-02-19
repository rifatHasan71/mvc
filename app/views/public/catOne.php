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
        background:salmon;
        height:10vh;
    }

    .main{
        border:1px solid #ddd;
        height:80vh;
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
        
    <a href="http://localhost/mvc/category/catList">click</a>

        <?php
            
            foreach($catOne as $key){
                echo $key['name'];
                echo "   ";
                echo $key['type'];
                echo "<br>";
            }

            
        ?>
    </div>

    <div class="footer">
        this is footer
    </div>
</body>
</html>
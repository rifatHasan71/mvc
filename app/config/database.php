<?php
if(!defined("M_MODEL")){
    $loc=BASE_URL;
    header("location:".$loc);
}
$json='

[
    {
        "database_object_instance":"db",
        "dbname":"mvc",
        "host":"localhost",
        "username":"root",
        "password":""
    },
    {
        "database_object_instance":"new",
        "dbname":"new",
        "host":"localhost",
        "username":"root",
        "password":""
    }
    
]
';


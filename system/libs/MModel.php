<?php
   
define("M_MODEL",true);

class MModel{
    public function __construct(){
        include $_SERVER['DOCUMENT_ROOT']."/mvc/app/config/database.php";
        $all_data=$json; //$json variable is inside database.php file . it is in json format there

        $data_list=json_decode($all_data,true);  //retrun data into multidimentional associative array
                                                
       

        foreach($data_list as $data ){
            
            $dsn="mysql:dbname=".$data['dbname'].";host=".$data['host'];   //dsn="mysql:dbname=dbname;host=host"
            $user=$data['username'];
            $password=$data['password'];
            $db=$data['database_object_instance'];
            $this->{$db}=new Database($dsn,$user,$password);
            
        }
    }


}

?>
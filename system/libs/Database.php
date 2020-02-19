<?php
class Database extends PDO{
    public function __construct($dsn,$user,$password){
        
        parent::__construct($dsn,$user,$password);
    }


    public function select($sql,$cond=array()){
        
        $stmt=$this->prepare($sql);
        foreach($cond as $key => $value){
            $value=htmlspecialchars($value);
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function insert($table,$data){

        $keys=implode(",",array_keys($data));  //doing like this " key , key  "
        $values=":".implode(", :",array_keys($data));  //doing like this " :value , :value  "

        $sql="insert into $table($keys) values ($values)";
        $stmt=$this->prepare($sql);

        foreach($data as $key => &$value){
            //$value=htmlspecialchars($value);
            $stmt->bindParam(":$key",$value);  
        }

        return $stmt->execute();
        
    }

    public function update($table,$cond,$data=array()){
       
        $data_str="";
        foreach($data as $key => $value ){
            $data_str.="$key=:$key,";
        }
        $data_str=rtrim($data_str,',');
        
       

        
        $sql="update  $table
              set $data_str
              where $cond  
        ";
        echo $sql;
        
        $stmt=$this->prepare($sql);
        foreach($data as $key => &$value){
            $value=htmlspecialchars($value);
            $stmt->bindParam(":$key",$value);
        }

        return $stmt->execute();
        
    }

    public function delete($table,$cond){
         $sql="delete from $table where $cond ";
        $stmt=$this->prepare($sql);
         $stmt->execute();
         return $stmt;
    }

    public function rowCount($sql,$data=array(),$row_count=true){
        $stmt=$this->prepare($sql);
        $stmt->execute($data);
       
        
        if($row_count){
            return $stmt->rowCount();
        }else{
            return $stmt->fetchAll();
        }
       
        
    }


    //testing purpose

    public function sel($username,$password){
        $sql="select * from admin where username='$username' and password='$password'";
        $stmt=$this->prepare($sql);
        $stmt->execute();
        //return $sql;
        return $stmt->rowCount();
    }
    public function insertblob($sql,$imagedata){
        $stmt=$this->prepare($sql);
        $stmt->bindParam(":blob",$imagedata, PDO::PARAM_LOB);
        $stmt->execute();
    }

    public function selectblob(){
        $stmt = $this->prepare("select * from test ");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return  $stmt->fetchAll();

    }

    
}
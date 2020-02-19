<?php

class Utility{
    public function emptyCheck($data=array()){
        
        foreach($data as $value){
            if(empty($value)){
                $state=true;
                return $state;
            }else{
                $state=false;
               
            }
        }
        return $state;
    }

    public function shortstr($str,$number=200){
        if(strlen($str)>$number){
            if(strpos($str,'<img')<$number){
                $end=(int)strpos($str,'</img>')+$number;
                
               
                $str=substr($str,0,$end);
                return $str;
            }else{
                $str=substr($str,0,strrpos($number,' '));
                $str=$str."...";
                return $str;
            }
            
        }else{
            return $str;
        }
        
    }
}


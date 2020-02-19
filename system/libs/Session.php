<?php

class Session{
    public static function init(){
        session_start();
    }

    public function destroy(){
        session_destroy();
    }
    public static function set($key,$val){
        $_SESSION[$key]=$val;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    } 

    public static function checkSession($key,$val=false){
        if($val !=false){
            if(isset($_SESSION[$key]) and $_SESSION[$key]==$val){
                return true;
            }else{
                return false;
            }
        }else{
            if(isset($_SESSION[$key])){
                return true;
            }else{
                return false;
            }
        }
        
    }

    public function unset($key){
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }
}
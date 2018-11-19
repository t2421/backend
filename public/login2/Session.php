<?php
class Session{
    static private $_session_keys = [];

    static public function init(){
        ini_set("session.use_trans_sid",0);
        ini_set("session.use_cookies",1);
        ini_set("session.use_only_cookies",1);
        ini_set("session.name","backend_example_sess_id");
        ini_set("session.use_strict_mode",1);
    }

    static public function start(){
        session_start();
        session_regenerate_id(true);
    }

    static public function destroy(){
        foreach(Session::$_session_keys as $key => $value){
            $_SESSION[$key] = null;
        }
    }

    static public function setValue($key,$value){
        
    }

    static public function getValue($key){
        return $_SESSION[$key];
    }
    
    static private function _addKeys($key){
        if(isset($_SESSION[$key])){
            return;
        }
        // array_push(Session::$_session_keys,$key);
    }
}

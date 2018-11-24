<?php
class Session{
    static public function init(){
        session_name('fck_session');
        Session::start();
    }

    static private function is_active(){
        return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
    }

    static private function start(){
        if(!Session::is_active()){
            session_start();
        }
        session_regenerate_id(TRUE);
    }
    static public function csrf_check($key){
        if($_POST[$key] === Session::token()){
            return TRUE;
        }
        return FALSE;
    }
    static public function token(){
        if(isset($_SESSION["csrf_token"])){
            return $_SESSION["csrf_token"];
        }
        $_SESSION["csrf_token"] = Session::_random();
        return $_SESSION["csrf_token"];
    }

    static public function write($key,$value){
        $_SESSION[$key] = $value;
    }

    static public function read($key){
        return $_SESSION[$key];
    }

    static public function check($key){
        return isset($_SESSION[$key]);
    }
    static public function destroy(){
        $_SESSION = [];
    }

    private static function _random($length = 16)
    {
        $string = '';
        while (($len = strlen($string)) < $length) {
            $size = $length - $len;
            $bytes = random_bytes($size);
            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }
        return $string;
    }
}
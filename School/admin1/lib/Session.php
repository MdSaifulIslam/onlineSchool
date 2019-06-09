<?php

Class Session {

    public static function init() {
        if (session_id() == '') {
            session_start();
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }

    public static function set($roll, $key, $val) {
        $_SESSION[$roll][$key] = $val;
    }

    public static function get($roll, $key) {
        if (isset($_SESSION[$roll][$key])) {
            return $_SESSION[$roll][$key];
        } else {
            return FALSE;
        }
    }

    public static function S_distroy() {
        self::set("student", "login", false);
        self::set("student", "id","");
        self::set("student", "email","");
        self::set("student", "name", "");
        self::set("student", "class", "");
        self::set("student", "roll", "");
        self::set("student", "loginmsg", "");
        header("Location:login.php");
    }
    public static function A_distroy() {
        self::set("admin", "login", false);
        self::set("admin", "id","");
        self::set("admin", "email","");
        self::set("admin", "loginmsg", "");
        header("Location:login.php");
    }
    public static function T_distroy() {
        self::set("teacher", "login", false);
        self::set("teacher", "id","");
        self::set("teacher", "name","");
        self::set("teacher", "email","");
        self::set("teacher", "loginmsg", "");
        header("Location:login.php");
    }

    public static function checkSession($roll) {
        if (self::get($roll, "login") == false) {
            if($roll=="admin"){
                self::A_distroy();
            }
            if($roll=="teacher"){
                self::T_distroy();
            }
            if($roll=="student"){
                self::S_distroy();
            }
            header("Location:login.php");
        }
    }

}

?>
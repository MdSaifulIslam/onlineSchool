<?php

include_once 'Session.php';
include 'Database.php';

Class User {

    private $db;

    public function __construct() {
        $this->db = new DbConnect();
    }

    public function teacherLogin($data) {

        $password = $data['password'];
        $email = $data['email'];

        $result = $this->getUser($email, $password);
        foreach ($result as $type) {
            
        }
        print_r($result);
        if ($result) {
            Session::init();
            Session::set("teacher", "login", true);
            Session::set("teacher", "id", $type['id']);
            Session::set("teacher", "name", $type['name']);
            Session::set("teacher", "email", $type['email']);
            echo Session::get("teacher", "email");
            header("Location:index.php");
        } else {
            $msg = "Not Success";
            return $msg;
        }
    }


    public function getUser($email, $password) {
        echo $email . ' ' . $password;
        $sql = "Select *  from tbl_teacher where email= :email and password=:password";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email', $email);
        $query->bindValue(':password', $password);
        $query->execute();
        $loginUser = $query->fetchAll(PDO::FETCH_ASSOC);
        return $loginUser;
    }

}

?>
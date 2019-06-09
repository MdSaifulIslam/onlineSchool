<?php

include_once 'Session.php';
include 'Database.php';

Class User {

    private $db;

    public function __construct() {
        $this->db = new DbConnect();
    }

    public function userRegistration($data) {
        $name = $data['name'];
        $user = $data['user'];
        $email = $data['email'];
        $password = $data['password'];
        $emailValid = $this->emailCheck($email);
        if ($emailValid) {
            $msg = "Email Already Exist;";
            return $msg;
        } else {
            $sql = "insert into tbl_user (name , email, user, password) values (:name,:email, "
                    . ":user,:password);";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(':name', $name);
            $query->bindValue(':email', $email);
            $query->bindValue(':user', $user);
            $query->bindValue(':password', $password);
            $result = $query->execute();
            if ($result) {
                $msg = "Inserted ";
                return $msg;
            } else {
                $msg = "Not Inserted ";
                return $msg;
            }
        }
    }


    public function emailCheck($email) {
        $sql = "Select email from tbl_user where email= :email";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email', $email);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function adminLogin($data) {

        $password = $data['password'];
        $email = $data['email'];

        $result = $this->getAdmin($email, $password);
        foreach ($result as $type) {
            
        }
        if ($result) {
            Session::init();
            Session::set("admin","login", TRUE);
            Session::set("admin","id", $type['id']);
            Session::set("admin","name", $type['name']);
            Session::set("admin","email", $type['email']);
            Session::set("admin","loginmsg", "Success login");
            header("Location:index.php");
        } else {
            $msg = "Not Success";
            return $msg;
        }
    }

    public function getAdmin($email, $password) {
        echo $email . ' ' . $password;
        $sql = "Select *  from tbl_user where email= :email and password=:password";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email', $email);
        $query->bindValue(':password', $password);
        $query->execute();
        $loginUser = $query->fetchAll(PDO::FETCH_ASSOC);
        return $loginUser;
    }

}

?>
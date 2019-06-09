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
        $sql = "Select email from  where email= :email";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email', $email);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    
    public function studentLogin($data) {

        $password = $data['password'];
        $email = $data['email'];

        $result = $this->getStudent($email, $password);
        print_r($result);
        foreach ($result as $st) {
            
        }
        if ($result) {
            Session::init();
            Session::set("student","login", TRUE);
            Session::set("student","id",$st['id']);
            Session::set("student","email", $st['email']);
            Session::set("student","name", $st['name']);
            Session::set("student","class", $st['class']);
            Session::set("student","roll", $st['roll']);
            Session::set("student","Address", $st['Address']);
            Session::set("student","loginmsg", "Student Success login");
            header("Location:index.php");
        } else {
            $msg = "Not Success";
            return $msg;
        }
    }


    public function getStudent($email, $password) {
        $sql = "Select *  from tbl_student where email= :email and password=:password";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email', $email);
        $query->bindValue(':password', $password);
        $query->execute();
        $loginUser = $query->fetchAll(PDO::FETCH_ASSOC);
        return $loginUser;
    }

}

?>
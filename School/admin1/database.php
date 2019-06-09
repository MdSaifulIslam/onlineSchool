<?php

Class database {

    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;
    public $link;
    public $error;

    public function __construct() {
        $this->connectDB();
    }

    private function connectDB() {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        $this->error = "Connection error " . $this->link->connect_error;
        return false;
    }
    
    public function select($query){
        $result=  $this->link->query($query) or die($this->link->error.__LINE__);
        if($result->num_rows>0){
            return $result;
        }  else {
            return false;
        }
    }
    
    public function insert($query,$location="index.php"){
        $insert_row=$this->link->query($query) or die($this->link->error.__LINE__);
        if($insert_row){
            header("Location:".$location."?msg=".urlencode('Data inserted successfully.'));
            exit();
        }  else {
            die("ERROR :(".$this->link->errno.")".$this->link->error);
        }
    }
    
    public function update($query,$location="index.php"){
        $update_row=$this->link->query($query) or die($this->link->error.__LINE__);
        if($update_row){
            header("Location:".$location);
            exit();
        }  else {
            die("ERROR :(".$this->link->errno.")".$this->link->error);
        }
    }
    public function delete($query,$location="index.php"){
        $delete_row=$this->link->query($query) or die($this->link->error.__LINE__);
        if($delete_row){
            header("Location:".$location);
            exit();
        }  else {
            die("ERROR :(".$this->link->errno.")".$this->link->error);
        }
    }

}

?>
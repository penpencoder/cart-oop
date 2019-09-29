<?php
 
class MyModel{

    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function connect(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "root";
        $this->dbname = "database";

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }else{
            echo "success mathafacka!!";
            return $conn;
        }
    }

}    




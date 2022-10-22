<?php
namespace App\Database\Configration;

use App\Database\Configration\Connection as ConfigrationConnection;
use mysqli;

class Connection{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database ="e-commerce";
    private $port = 3306;
    public \mysqli $connect;
    public function __construct()
    {
        $this->connect = new \mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->database,
            $this->port
        );

    //     // Check connection
    // if ($this->connect->connect_error) {
    //     die("Connection failed: " . $this->connect->connect_error);
    // }
    // echo "Connected successfully";
    
    
    }
    public function __destruct()
    {
        $this->connect->close();
    }
   
}
 
?>
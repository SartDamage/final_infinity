<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$myDB = "hmsdb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
//set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }*/
?>
<?php
session_start();
/* DATABASE CONFIGURATION */
/*define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'shree_hospital');
define("BASE_URL", "http://localhost:8080/");  // Eg. http://yourwebsite.com*/
 define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ganesh_root');
define('DB_PASSWORD', 'mayur@123');
define('DB_DATABASE', 'ganesh_hms');
define("BASE_URL", "http://localhost/");  // Eg. http://yourwebsite.com


function getDB()
{
$dbhost=DB_SERVER;
$dbuser=DB_USERNAME;
$dbpass=DB_PASSWORD;
$dbname=DB_DATABASE;
try {
$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
$dbConnection->exec("set names utf8");
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Connected successfully";
return $dbConnection;
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}

}
?>

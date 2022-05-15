<?php
$servername='localhost';
$dbusername='root';
$password='';
$database='sunday';

//Create connection
$conn=mysqli_connect($servername,$dbusername,$password,$database);

//Check connection
if(!$conn){
    die("Connection falied: ".mysqli_connect_error()) ;//echo this statment then break from the code, nothing after it will be used
}
echo "Connected Successfully";
?>
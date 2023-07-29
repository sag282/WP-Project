<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
// $pass = $_POST['password']; 

$pass = md5($_POST['password']);

if(!empty($fname) || !empty($lname) || !empty($email) || !empty($pass) ){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arena";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}





$insert = "INSERT INTO signup values ('$fname','$lname','$email','$pass')";

if ($conn->query($insert) === TRUE) {
   
  header("Location: http://localhost/project2.0/login.html");  

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
   





}




?>
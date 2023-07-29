<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];

if(!empty($fname) || !empty($lname) || !empty($email) ){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arena";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}


$insert = "INSERT INTO subscriptions values ('$fname','$lname','$email')";

if ($conn->query($insert) === TRUE) {

  echo "Thank you for subscribing our newsletter!";

  header("Location: http://localhost/project2.0/project.html");



  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
   

}else{
    die("All fields are required!");
}

?>
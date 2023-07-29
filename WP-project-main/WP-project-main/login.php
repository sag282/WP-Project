<?php

$email = $_POST['email'];
$pass = md5($_POST['password']);
// $pass = $_POST['password'];


if(!empty($email) || !empty($pass)){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "arena";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed!".$conn->connect_error);
    }

    function test_input($data) {
      
      
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    
    }

    $email = test_input($email);
    $pass = test_input($pass);

    $sql = "SELECT * FROM signup where email='$email' and pass='$pass'";

    $result = $conn -> query($sql);

    $row = $result -> fetch_array(MYSQLI_ASSOC);

    if($row['email']==$email && $row['pass']==$pass){

        header("refresh:2;url=http://localhost/project2.0/project.html"); 
        echo "You have successfully logged in! Welcome ".$row['fname']." ".$row['lname'];
        exit;

        

     
        


        

    }else{

        header("Location: http://localhost/project2.0/loginfailed.html");

        die();


    }
    header("Location: http://localhost/project2.0/project.html");
    
  
}else{

    die("All fields are required!");
}


?>


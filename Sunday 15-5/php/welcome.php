<?php
include_once '../config/index.php';
// session_start();
// $fname=$_SESSION['firstname'];
// $mname=$_SESSION['middlename'];
// $lname=$_SESSION['lastname'];
// $faname=$_SESSION['familyname'];
// $email=$_SESSION['email'];
// $phone=$_SESSION['phonenumber'];




?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400" rel="stylesheet">
    <link rel="stylesheet" href="./welcome.css">
    <title>Document</title>
  
</head>
<body>
 


  

    
    
    <div class="content">
      <h1>Welcome <?php   $sql1="SELECT * FROM php_signup ;";
              $result= mysqli_query($conn , $sql1);
              $result_check= mysqli_num_rows($result);
          
              if ($result_check > 0) {
                  $row=mysqli_fetch_assoc($result);
                   
                echo $row['first_name']. "  ". $row['middle_name']."  ".$row['last_name']." ".$row['family_name']; ?>!</h1>
      <h2>Your Email is :  <?php echo $row['email']; ?></h2>
      <br>
      <h2> Your Phone Number is: <?php echo $row['phone_number']; }?> </h2>
     
    </div>
    
  </body>
  
</html> 
</body>
</html>
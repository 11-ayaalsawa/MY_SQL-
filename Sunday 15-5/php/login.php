<?php
// session_start();
include_once '../config/index.php';


if(isset($_POST['submit'])){

    $loginEmail=$_POST['email'];
    $loginPass=$_POST['password'];
    // $email=$_SESSION['email'];
    // $pass=$_SESSION['password'];
    $sql1="SELECT * FROM php_signup ;";
    $result= mysqli_query($conn , $sql1);
    $result_check= mysqli_num_rows($result);

    if ($result_check > 0) {
        while ($row=mysqli_fetch_assoc($result)) {
         
    
    // foreach ($_SESSION["usersData"] as $key => $value){
if (($loginPass == ($row['user_password'])) && ($loginEmail == ($row['email']))){

    // $_SESSION["userEmail"]= $value["email"];
    // $_SESSION["user_fname"]= $value['firstname'];
    // $_SESSION["user_mname"]= $value['middlename'];
    // $_SESSION["user_lname"]= $value['lastname'];
    // $_SESSION["user_faname"]= $value['familyname'];
    // $_SESSION["userMobile"]= $value['phonenumber'];
    // $_SESSION["usersData"][$key]["Last-Login-Date"]= date("d-m-Y - h:ia");
    // $_SESSION["usersData"];

    

    header ("location: welcome.php");
   
    
}
elseif($loginPass !== ($row['user_password'])) {
    $PasswordErr="<span style=' color:red'>Incorrect Password</span><br>";



}
elseif($loginEmail !== ($row['email'])){
    $EmailERR="<span style=' color:red'>Incorrect Email</span><br>";
}
}};




///////////////////////////////////// admin ////////////////////////
if(($loginEmail == "ayaalsawa279@gmail.com") && ($loginPass == "AAAaaa123***")){
    header ("location: admin.php");
}

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./login.css">
    <title>Log in</title>
    <link rel="stylesheet" href="signup.css">

 
</head>

<body>
    <div class="container">
        <div class="signup">
            <form method="POST" >
                <h1> Login </h1>
                <h2> Welcome back! Login with your credentials</h2>
              
                <div class="inputs">
                    <label for="email" >Email</label> <br>
                    <input type="email" name="email" required>
                    <?php if(isset( $EmailERR)){echo  $EmailERR;}?>
                
                </div>
               <br>
                <div class="inputs">
                    <label for="password">Password</label> <br>
                    <input type="password" name="password" pattern=".{8,}" title="Password should be Eight (8) or more characters" >
                    <?php if(isset( $PasswordErr)){echo  $PasswordErr;}?>
                 </div>
              
                <input type="submit" value="Login" name="submit">

                <p>Don't you have an account? <a href="./reg.php"> Sign up</a></p>

            </form>
        </div>
       
        </div>
    </div>
</body>

</html>
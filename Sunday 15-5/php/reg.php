
<?php 
//   session_start();
//   $_SESSION["usersData"];
//   if(empty($_SESSION["usersData"])){
//    $_SESSION["usersData"]= [];
//   }

include_once '../config/index.php';
 
 if(isset($_POST['submit'])){
 


    

 /////////////////////////////////////////////////////
    


$fname= $_POST['firstname'];
$mname= $_POST['middlename'];
$lname= $_POST['lastname'];
$faname= $_POST['familyname'];
$email= $_POST['email'];
$phone= $_POST['phonenumber'];
$pass= $_POST['password'];
$cpass= $_POST['cpassword'];
$date= $_POST['dateofbirth'];
$dateCreate=date("m/d/y H:ia");


 

 ////////////////////////////////////////////////////////
 if (preg_match('/[A-Za-z][A-Za-z]/', $fname)) {

    $fnameERR="";
    $fname_correct=true;
       
} else {
    $fnameERR="Required only characters";
    $fname_correct=false;
}
  /////////////////////////////////////////////////
  if (preg_match('/[A-Za-z][A-Za-z]/', $mname)) {

    $mnameERR=" ";
    $mname_correct=true;
       
} else {
    $mnameERR="Required only characters";
    $mname_correct=false;
}

//////////////////////////////////////////////////
if (preg_match('/[A-Za-z][A-Za-z]/', $lname)) {

        $lastName_result="";
        $lastName_correct=true;
       
} else {
    $lastName_result="Required only characters";
    $lastName_correct=false;
}

//////////////////////////////////////////////////

if (preg_match('/[A-Za-z][A-Za-z]/', $faname)) {

    $familyName_result="";
    $familyName_correct=true;
} else {
    $familyName_result="Required only characters";
    $familyName_correct=false;
}

//////////////////////////////////////////////////

if (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
    
    $email_result="";
    $email_correct=true;  

} else { 

 $email_result="Invalid email";
 $email_correct=false;

}   
/////////////////////////////////////////////////////

if(preg_match("/^\\(?([0-9]{3})\\)?[-.\\s]?([0-9]{3})[-.\\s]?([0-9]{4})?[-.\\s]?([0-9]{4})$/",$phone)){
    $phoneNumber_result="";
    $confirmPhone_correct=true;
}
else{
    $phoneNumber_result=" Should be 14 digits ";
    $confirmPhone_correct=false;
}

///////////////////////////////////////////////////////

$num='/[\d]{2,}/';
$capital='/[A-Z]/';
$symboles='/[#$@!%&*?]/';

if (preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $pass)) {
    
    $password_result="";
    $password_correct=true;

   }
    elseif(!preg_match($num, $pass)) { 
 
    $password_result="Your password must contain 2 numbers at least";
    $paswword_correct=false;

   } 
   elseif(!preg_match($capital, $pass)) {
      

       $password_result="Incorrect! password must be capital!";
       $paswword_correct=false;
   }
   else if (!preg_match($symboles, $pass)){
      
       
       $password_result="You password must contain at least 1 symbole";
       $paswword_correct=false;
   }

  ////////////////////////////////////////////////////////////////////
 
    if ($cpass == $pass){
        $password_match=true;
        $confirmPassword_correct=true;
        $confirmPassword_result="";
    }
    else{
        $password_match=false;
        $confirmPassword_result="Passwords don't match";
        $confirmPassword_correct=false;
    }
    
///////////////////////////////////////////////////////////////////

if((floor((time() - strtotime( $date)) / 31556926)) >16){
    $dob_result="";
    $confirmDob_correct=true;
}

else{
    $dob_result="You are younger than 16 years old";
    $confirmDob_correct=false;
}
////////////////////////////////////////////////////

if(
    $fname_correct && $mname_correct && $lastName_correct && $familyName_correct && $email_correct && $confirmPassword_correct && $confirmPhone_correct && $confirmDob_correct
){
    // $_SESSION['firstname']= $_POST['firstname'];
    // $_SESSION['middlename']= $_POST['middlename'];
    // $_SESSION['lastname']= $_POST['lastname'];
    // $_SESSION['familyname']= $_POST['familyname'];
    // $_SESSION['email']= $_POST['email'];
    // $_SESSION['phonenumber']= $_POST['phonenumber'];
    // $_SESSION['password']= $_POST['password'];
    // $_SESSION['cpassword']= $_POST['cpassword'];
    // $_SESSION['dateofbirth']= $_POST['dateofbirth'];
    // $_SESSION['date_create']=date("m/d/y H:ia");
    

    // $arr=['firstname'=> $fname, 'middlename'=> $mname, 'lastname'=> $lname, 'familyname'=>$faname, 'email'=>$email, 'phonenumber'=> $phone,'password'=>$pass, 'cpassword'=>$cpass,'dateofbirth'=>$date, 'date_create'=> $dateCreate, "Last-Login-Date" =>"haven't login yet"];
    // array_push($_SESSION["usersData"],$arr);
    
    $sql="INSERT INTO php_signup (first_name, middle_name, last_name, family_name, email, user_password, confirm_password, phone_number, date_of_birth, date_create)
    VALUES ('$fname', '$mname', '$lname', '$faname','$email', '$pass', '$cpass','$phone', '$date', '$dateCreate'); ";
if(mysqli_query($conn, $sql)){ //To write the query in the database
    header('location:login.php');
}else
{
    echo "Error: ". $sql."<br>". mysqli_error($conn);
}


    header('location:login.php');

    ////////////////////////////////////////////
  
  
}
 }
 

 
 ?>
 









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./reg.css">
    <title>Login</title>
    <link rel="stylesheet" href="signup.css">

</head>
<style>
    .signup input[type="text"], input[type="email"], input[type="tel"], input[type="password"], input[type="date"]{
        height: 35px;
    }
</style>
<body>
    <div class="container">
        <div class="signup" style="margin-top: -4%;">
            <form method="post" action="" style="height:710px; ">
                <h1> Sign Up </h1>
                <h2> Create An Account, It's Free!</h2>
                <div class="inputs">
                    <label for="firstname">First Name</label> <br>
                    <input type="text" name="firstname" required>
                      <span id="s1"> <?php if(isset( $fnameERR)){echo  $fnameERR;}?></span> </div>
                  
                    <div class="inputs">
                        <label for="middlename">Middle Name</label> <br>
                        <input type="text" name="middlename" required>
                        <span id="s2"><?php if(isset($mnameERR)){echo $mnameERR;}?></span> </div> 
                <div class="inputs">
                    <label for="lastname">Last Name</label> <br>
                    <input type="text" name="lastname" required> 
                    <span id="s3"> <?php if(isset($lastName_result)){echo $lastName_result;}?></span>
                </div>
                    <div class="inputs">
                        <label for="familyname">Family Name</label> <br>
                        <input type="text" name="familyname" required>
                        <span id="s4"><?php if(isset($familyName_result)){echo $familyName_result;}?></span>
                    </div>
                <div class="inputs">
                    <label for="email">Email</label> <br>
                    <input type="email" name="email" required>
                    <span id="s5"><?php if(isset($email_result)){echo $email_result;}?></span>
                
                </div>
                <div class="inputs">
                    <label for="phonenumber">Phone Number</label> <br>
                    <input type="tel" name="phonenumber" required>
                    <span id="s6"> <?php if(isset($phoneNumber_result)){echo $phoneNumber_result;}?></span>
                </div>
                <div class="inputs">
                    <label for="password">Password</label> <br>
                    <input type="password" name="password" pattern=".{8,}" title="Password should be Eight (8) or more characters" >
                    <span id="s7"> <?php if(isset($password_result)){echo $password_result;}?></span>
                </div>
                <div class="inputs">
                    <label for="cpassword">Confirm Password</label> <br>
                    <input type="password" name="cpassword" pattern=".{8,}" title="Password should be Eight (8) or more characters" >
                    <span id="s8"> <?php if(isset($confirmPassword_result)){echo $confirmPassword_result;}?></span>
                
                </div>
                    <div class="inputs">
                        <label for="DateofBirth">Date of Birth</label> <br>
                        <input type="date" name="dateofbirth" required> 
                        <span id="s9" > <?php if(isset($dob_result)){echo $dob_result;}?></span>
                    
                    </div>
                <input type="submit" name="submit" value="Sign Up">

                <p>Have an account already? <a href="./login.php"> Log In</a></p>

            </form>
        </div>
       
        </div>
    </div>
</body>

</html>
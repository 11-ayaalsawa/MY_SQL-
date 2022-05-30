<?php
// session_start();

include_once '../config/index.php';

$display='none';
if(isset($_POST["deleteuser"])){
    $id= $_POST["userid"];
    $deletingdata= "DELETE FROM php_signup WHERE id=$id;";
    mysqli_query($conn , $deletingdata);
}

if(isset($_POST["edituser"])){
    $id= $_POST["userid"];
    $stat = "SELECT * FROM php_signup WHERE id='$id';";
    $result = mysqli_query($conn,$stat);
    $result_check= mysqli_num_rows($result);
    if($result_check> 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {$newName= $row['first_name'];
            $newEmail= $row['email'];
            $newPassword= $row['user_password'];
            $display= 'block';
        }
    }
}
if(isset($_POST["newuser"])){
    $newname= $_POST['newName'];
    $newPassword= $_POST['newPassword'];
    $newEmail= $_POST['newEmail'];
    $id= $_POST['userid'];
    $query= "UPDATE php_signup SET first_name='$newname', user_password='$newPassword',email='$newEmail' WHERE id=$id;";
    $x= mysqli_query($conn , $query);
    $display= 'none';
}



// setCookie('FirstName', date("m/d/y H:ia "), 60*24*60*60+time());

// $fname=$_SESSION['firstname'];
// $faname=$_SESSION['familyname'];
// $email=$_SESSION['email'];
// $pass=$_SESSION['password'];
// $datecCreated= $_SESSION['date_create'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin.css">
    <title>Document</title>
  

   
<body>
   
<h1> Admin page </h1>
<table id="data">

  <tr>
    <th>ID</th>
    <th> Name</th>
    <th> Email</th>
    <th>Password</th>
    <th>Date created</th>
    <th>Last login</th>
    <th>update</th>
    <th>delete</th>
  </tr>

  <?php
        // $id= 1;
        // foreach ($_SESSION["usersData"] as $value) {
            
        //     echo "<tr>
        //             <td>".$id."</td>
        //             <td>".$value['firstname']."</td>
        //             <td>".$value['email']."</td>
        //             <td>".$value['password']."</td>
        //             <td>".$value['date_create']."</td>
        //             <td>".$value["Last-Login-Date"]."</td>
        //         </tr>";
        //     $id++;
        // }

    ////////////////////////////////////////////////////////
//         $id= 1;
//         $sql1="SELECT * FROM php_signup ;";
//         $result= mysqli_query($conn , $sql1);
//         $result_check= mysqli_num_rows($result);
    
//         if ($result_check > 0) {
//             while ($row=mysqli_fetch_assoc($result)) {
//             echo "<tr>
//                     <td>".$id."</td>
//                     <td>".$row['first_name']."</td>
//                     <td>".$row['email']."</td>
//                     <td>".$row['user_password']."</td>
//                     <td>".$row['date_create']."</td>
//                     <td>".$row['updated_at']."</td>
//                     <td>"."
//                     <form action='update.php' method='post'>
//                     <input type='hidden' name='userid' value='".$row['id']."'>
//                     <input type='submit' value='Update' name='edituser'> 
//                     </form><br>"."</td>
//                     <td>"."<form action='code.php' method='post'>
//                     <input type='hidden' name='userid' value='".$row['id']."'>
//                     <input type='submit' value='Delete' name='deleteuser'>
//                     </form> <br>"."</td>
                  
//                 </tr>";
//             $id++;  
//        }
//    }
//    if(isset($_POST['update'])){
//        $row['first_name']=  "<input type='submit' value='Update' name='update'>";
//    }

///////////////////////////////////////////////////////
$stat = "SELECT * FROM php_signup;";
$result = mysqli_query($conn,$stat);
$result_check= mysqli_num_rows($result);
if($result_check> 0)
{
while($row = mysqli_fetch_assoc($result))
{
    $y= $row['id'];
    echo "<tr>
            <td>".$row['id']."</td>
     
            <td>".$row['first_name']."</td>
            <td>".$row['email']."</td>
            <td>".$row['user_password']."</td>
            <td>".$row['date_create']."</td>
            <td>".$row['updated_at']."</td>
            <td>".
            "<form method='post'>
            <input type='hidden' value='".$y."' name='userid'>
            <input type='submit' value='Edit' name='edituser'>
            </form>
            "."</td>
            <td>".
            "<form method='post'>
            <input type='hidden' value='".$y."' name='userid'>
            <input type='submit' value='Delete' name='deleteuser'>
            </form>
            "."</td>
         </tr>";
       
}}
        ?>
    
 
</table>
<div id="editdiv" style="display: <?php echo $display ?>;  position: absolute;
   left: 28%;top: 70%">
        <form method="post">
            <input type="hidden" value="<?php echo $id ?>" name="userid">
            <label>Name:</label>
            <input type="text" value="<?php echo $newName ?>" name="newName">
            <label>Email:</label>
            <input type="text" value="<?php echo $newEmail ?>" name="newEmail">
            <label>Password:</label>
            <input type="text" value="<?php echo $newPassword ?>" name="newPassword">
            <input type='submit' value='Edit' name='newuser'>
    </div>
</body>
</html>
<?php  
    $dbHost="localhost";  
    $dbName="monday";  
    $dbUser="root";      //by default root is user name.  
    $dbPassword="";     //password is blank by default  
    try{  
        $dbConn= new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUser,$dbPassword);  
        $sql = "INSERT INTO food (id,food_name,catagory_id) VALUES ('2','orange','30');";
        $sql1= "DELETE FROM food WHERE id='1';";
        $sql2="UPDATE food SET food_name ='banana' WHERE id='2';";
        $sql3="CREATE TABLE namename(first_name VARCHAR(255) NOT NULL,last_name VARCHAR(255) NOT NULL );";
        $sql4 = "INSERT INTO namename (first_name,last_name) VALUES ('Aya','Alsawa');";
        $sql5="SELECT food_name,catagory_id FROM food
        INNER JOIN namename ON food.emp_name=namename.first_name;";
       
 

        $dbConn->exec($sql);
        $dbConn->exec($sql1);
        $dbConn->exec($sql2);
        $dbConn->exec($sql3);
        $dbConn->exec($sql4);
        $dbConn->exec($sql5);
    

        Echo "Successfully connected with connection database";  
    } catch(PDOException $e){  
    Echo "Connection failed" . $e->getMessage();  
    }  
?>
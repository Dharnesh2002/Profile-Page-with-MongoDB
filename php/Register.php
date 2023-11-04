<?php
require "vendor/autoload.php";
$client=new MongoDB\Client("mongodb://localhost:27017");
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $reg = $_POST["reg"];
    $pass = $_POST["pass"];
    $sql = "SELECT * FROM guvi2 WHERE reg = '$reg' ";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($name==NULL || $email==NULL || $reg==NULL || $pass==NULL)
    {
        echo "<script>alert('All Fields are Mandatory');</script>";
    }
    else if($count)
    {
        echo "<script>alert('Entered Register Number is Already exist');</script>";
    }
    else{
        $query = "INSERT INTO guvi2 (name,email,reg,pass) VALUES('$name','$email','$reg','$pass')";
        $guvi=$client->guvi;
        $result=$guvi->profile->insertOne([
        'name' => $name,
        'username' => $reg,
        'email' => $email,
        'dob' => null,
        'age' =>null,
        'con' =>null, 
        'department' =>null, 
        'mobile' =>null 
        ]);
        
        $query_run = mysqli_query($db, $query);
        
            if($query_run)
            {
                echo "<script>alert('Registered Successfully You can Login now');window.location.href='Login.html';</script>";
            }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
    }
    
	
}  
?>

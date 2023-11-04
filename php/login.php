<?php
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg = $_POST["reg"];
    $pass = $_POST["pass"];
    session_start();
    $_SESSION["id"]=$reg;
    $_SESSION["pass"]=$pass;
    $count=0;
    if($reg==NULL || $pass==NULL)
    {
        echo "<script>alert('All Fields are Mandatory');</script>";
        $count=1;
    }
    if($count==0){
        $sql = "SELECT * FROM guvi2 WHERE   reg = '$reg' and pass = '$pass'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        //$active = $row['active'];
        
        $coun = mysqli_num_rows($result);
        
        if($coun==1)
        {
            echo "<script>alert('Login Successful');window.location.href='profile.html';</script>";
        }
        else{
            echo "<script>alert('Login Unsuccessful');window.location.href='Login.html';</script>";
        }
    }
    } 
    
	
?>

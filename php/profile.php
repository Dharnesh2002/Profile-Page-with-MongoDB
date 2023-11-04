<?php
include("config.php");
require "vendor/autoload.php";
$client=new MongoDB\Client("mongodb://localhost:27017");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $reg = $_SESSION["id"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $age = $_POST["age"];
    $mon = $_POST["no"];
    $dep = $_POST["dept"];
    $con = $_POST["con"];
    $guvi=$client->guvi;
    $result=$guvi->profile->updateOne(
        ['username' => $reg],
        [
            '$set' => ['name' => $name,
            'email' => $email,
            'dob' => $dob,
            'age' =>$age,
            'con' =>$con, 
            'department' =>$dep, 
            'mobile' =>$mon ],
        ]
    );
    if($result){
        echo "<script>alert('Updated Successfully')</script>";
    }
}

?>
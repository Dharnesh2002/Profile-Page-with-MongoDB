<?php
session_start();
require "vendor/autoload.php";
$client=new MongoDB\Client("mongodb://localhost:27017");
include("config.php");
$reg = $_SESSION["id"];
$guvi=$client->guvi;
$data=$guvi->profile->findOne(array('username'=>$reg));
echo json_encode(iterator_to_array($data));
?>
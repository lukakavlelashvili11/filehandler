<?php
require("mysinf.php");
$conn=new mysqli($host,$dname,$dpassword,$database);
$stmt=$conn->prepare("INSERT INTO User(firstname,email,password,time)VALUES(?,?,?,?);");
$stmt->bind_param("ssss", $firstname,$email,$password,$time);

if(isset($firstname,$email,$password)){
    $stmt->execute();
}

$conn->close();


?>





<?php
session_start();
require("mysinf.php");
$conn=new mysqli($host,$dname,$dpassword,$database);
if(isset($email))
$sql="SELECT firstname,id FROM User WHERE email='$email';";
if(isset($semail))
$sql="SELECT firstname,id FROM User WHERE email='$semail';";
$res=$conn->query($sql);

if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
    $_SESSION['name']=$row['firstname']."&".$row['id'];
    
    }
}
$sesnam=explode('&',$_SESSION['name'])[1];
if(file_exists("up/$sesnam")==false)
mkdir("up/$sesnam");
$conn->close();

?>
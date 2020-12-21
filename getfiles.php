<html>
<head>
<style>
table{
    width:40%;
    border-collapse: collapse;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    margin-top:50px;
}
table tr td{
    border:1px solid black;
    padding:10px;
}
a{
    text-decoration: none;
}

</style>
</head>
<body>
<?php
session_start();
$foldername=explode("&",$_SESSION['name'])[1];
$fileid=scandir("up/".$foldername);
echo "<table>";
unset($fileid[0],$fileid[1]);
if(empty($fileid)){
    echo "<center><h3>files does not exist.</h3></center>";

}
foreach ($fileid as $filename){
    echo "<tr>";
    echo "<td>$filename</td>";
    echo "<td><a href='up/$foldername/$filename'>DOWNLOAD</a></td>";
    echo "</tr>";
}
echo "</table>";

?>
<div onclick="pre()" style="margin-left:20px;margin-top:20%;display:flex;justify-content:center;align-items:center; width:100px;height:40px;background:rgb(185, 170, 170);cursor: pointer;"><p>&larr; previous</p></div>    
<script>
    function pre(){
        location.assign('index.php');
    }
</script>
</body>
</html>
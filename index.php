<?php
session_start();
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"type="text/css"href="css/style.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Epilogue&display=swap" rel="stylesheet">
</head>    
<body>
            <div id="header">
            <div id="nav">
            <ul>
                <li><a href="info.html">info</a></li>
                <li><a href="login.php">sign in</a></li>
            </ul></div>
            <?php
            if(isset($_SESSION['name'])){
            
                $ses=explode('&',$_SESSION['name'])[0];
            echo "
            <div class='echodiv'>
            <div id='ses'onclick='ses()'><p> $ses </p></div>
            <div id='subec'>
            <div><a href='getfiles.php'>my files</a></div>
            <div><a href='sesdes.php'>sign out</a></div>
            </div>
            </div>"; 
            }?>
        </div>
            <div id="for">
                <form action="handler.php" method="POST"enctype="multipart/form-data">
                    <input style="display:none;" type="file"name="fil[]"id="fil"multiple/>
                   <div id="labz"onclick="nam()">choose file</div>
                   <div id="echo"style="display:flex;justify-content:flex-start;">
                   <input id="tx" style="height:100%; width:50%;text-align:center;font-size:17px;" type="text"name="tx"placeholder="zip name(optional)"/>
                   <div id="as"style="height:100%;width:50%;justify-content:flex-end;border:1px solid rgba(104, 95, 96,0.3);">
                <lable>&nbsp;&nbsp;&nbsp;sort by type(df)<input type="radio"name="rad"value="ty"></lable><br>
                <lable>&nbsp;&nbsp;&nbsp;sort by extension<input type="radio"name="rad"value="ex"></lable>
                </div>
                </div> 
                <div id="sax"><p style="color:rgb(182, 170, 170);display:flex;">file name</p></div>
                <br>
                  <center> <input style="width:80px;height:35px;cursor:pointer;
                background:white;border:1px black solid;box-shadow:0px 0px 5px black"value="handling"name="subm" type="submit"onclick="func()"/></center>
                </form>
                </div>
    <script src="js.js">
    </script>
    <div id="dow"><?php
$zipname="";
$op=true;
if(isset($_SESSION['name'])){
    $prog=scandir("up/".explode('&',$_SESSION['name'])[1]);
    $mf=explode('&',$_SESSION['name'])[1].'/';
}
else{
    $prog=scandir("up");
    $mf="";
}
if(isset($_REQUEST['z']))
$zipname=htmlentities($_REQUEST['z']);
if(isset($_REQUEST['o']))
$op=htmlentities($_REQUEST['o']);
if(in_array($zipname,$prog) && $op==true){
    echo "<a id='a'download='$zipname' href='up/$mf$zipname'>download</a>"; 
}else if($op==true){
    echo "<p style='color:rgb(104, 95, 96);'>your zip file will appear here</p>";
}else{echo "<b style='color:red;'>please use another name!</b>";}
 ?></div>
<div id="kar"></div>
</body>
</html>


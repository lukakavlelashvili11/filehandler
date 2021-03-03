<?php

if(isset($_POST['sub'])){
    require "formvalidation/signup.php";
    $validation=new userval($_POST);
    $errors=$validation->validateform();
}
if(isset($_POST['submit'])){
    require "formvalidation/signinval.php";
    $validation=new userval($_POST);
    $signerrors=$validation->validateform();
    }
?>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet"href="css/css/bootstrap.min.css"
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body>
    <div class="container d-flex flex-wrap justify-content-between mt-xl-5 mb-5 pt-5">   
    <div style="width:525px" class="form-group container">
        <center><h2 class="mb-4">sign in</h2></center>    
        <form method="POST"action="<?php $_SERVER['PHP_SELF'] ?>">
                <input type="text"name="semail"placeholder="email"class="form-control mb-4"/>
                <input type="password"name="spassword"placeholder="password"class="form-control mb-4"/>
                <button type="submit"name="submit"class="btn btn-dark">submit</button>
            </form>
        </div>
        <div style="width:525px" class="form-group container">
            <center><h2 class="mb-4">sign up</h2></center>
            <form method="POST"action="<?php $_SERVER['PHP_SELF'] ?>">
                <input type="text"name="email"placeholder="email"value="<?php if(isset($_POST['email']) && empty($errors['email'])) echo $_POST['email'];else if(isset($errors['email'])) echo ''; ?>"class="form-control mb-4"/>
                <input type="text"name="name"placeholder="name"value="<?php if(isset($_POST['name']) && empty($errors['name'])) echo $_POST['name'];else if(isset($errors['name'])) echo '';?>"class="form-control mb-4"/>
                <input type="password"name="password"placeholder="password"value="<?php if(isset($_POST['password']) && empty($errors['password'])) echo $_POST['password'];else if(isset($errors['password'])) echo ''; ?>"class="form-control mb-4"/>
                <button type="submit"name="sub"class="btn btn-dark">submit</button>

            </form>
        </div>
    </div>
    <?php
    if(!empty($errors)){
    echo "<div class='container alert alert-danger'>";
    echo isset($errors['email']) ? $errors['email']."<br>" : "";
    echo isset($errors['name']) ? $errors['name']."<br>" : "";
    echo isset($errors['password']) ? $errors['password']."<br>" : "";
    echo "</div>";
}else if(isset($_POST['sub'])){
    echo "<div class='container alert alert-success'>";
    echo "<p>you have signed up successfully!</p>";
    echo "</div>";

}?>
<div onclick="pre()" style="margin-left:20px;display:flex;justify-content:center;align-items:center; width:100px;height:40px;background:rgb(185, 170, 170);cursor: pointer;"><p>&larr; previous</p></div>    
<script>
    function pre(){
        location.assign('index.php');
    }
</script>
</body>
</html>
<?php
if(isset($_POST['sub'])&&empty($errors)){
    $firstname=htmlentities($_POST['name']);
    $email=htmlentities($_POST['email']);
    $password=htmlentities($_POST['password']);
    $def=date_default_timezone_set("asia/tbilisi");
    $time=date('d.M.Y H:i');
    require("database.php");
    require("session.php");
}
if(isset($_POST['submit'])&&empty($signerrors)){
    $semail=$_POST['semail'];
    require("session.php");
    header("Location:index.php");

}
?>
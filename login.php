<?php
if(isset($_POST['sub'])){
require("formvalidation/signup.php");
$validation=new userval($_POST);
$errors=$validation->validateform();
}
if(isset($_POST['submit'])){
    require("formvalidation/signinval.php");
    $validation=new userval($_POST);
    $signerrors=$validation->validateform();
    }
?>



<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet"href="css/login.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

<body>
    <div id="logcen">   
    <div id="signin">
        <center><h2>sign in</h2></center>    
        <form method="POST"action="<?php $_SERVER['PHP_SELF'] ?>">
                <input type="text"name="semail"placeholder="email"/>
                <div><?php echo $signerrors['email'] ?? ""  ?></div>
                <input type="password"name="spassword"placeholder="password"/>
                <div><?php echo $signerrors['password'] ?? ""  ?></div>
                <button type="submit"name="submit">submit</button>
            </form>
        </div>
        <div id="signup">
            <center><h2>sign up</h2></center>
            <form method="POST"action="<?php $_SERVER['PHP_SELF'] ?>">
            <div><?php echo $errors['form'] ?? ""  ?></div>
            <input type="text"name="email"placeholder="email"value="<?php if(isset($_POST['email']) && empty($errors['email'])) echo $_POST['email'];else if(isset($errors['email'])) echo ''; ?>"/>
                <div><?php echo $errors['email'] ?? ""  ?></div>
                <input type="text"name="name"placeholder="name"value="<?php if(isset($_POST['name']) && empty($errors['name'])) echo $_POST['name'];else if(isset($errors['name'])) echo '';?>"/>
                <div><?php echo $errors['name'] ?? ""  ?></div>
                <input type="password"name="password"placeholder="password"value="<?php if(isset($_POST['password']) && empty($errors['password'])) echo $_POST['password'];else if(isset($errors['password'])) echo ''; ?>"/>
                <div><?php echo $errors['password'] ?? ""  ?></div>
                <button type="submit"name="sub">submit</button>

            </form>
        </div>
    </div>
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
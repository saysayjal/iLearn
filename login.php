<?php include('config.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in Form</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body class="bgimg">
    <div class="loginbox">
    <img src="" alt="">
    <h1>Login Here</h1>  
    <form action="login.php" method="post">
       <b>Username</b> : <br> 
       <input type="text" name="username" placeholder="Enter Username"> <br><br>
       <b>Password</b> : <br> 
       <input type="password" name="password" placeholder="Enter Password"><br> <br>
        <input type="submit" name="submit" value="Log in" class="btn-primary" > <br> <br>
        <a href="signup.php">Dont have an account? SIGN UP</a>
    </form>
</body>
</html>



<?php
    session_start();

    $username="";
    $password="";
    $errors=array();

    //check submit buton click or not
    if(isset($_POST['submit']))
    {
        //process for login
    
        //1 get data fro login form
        $username=$_POST['username'];
        $password=$_POST['password'];

        //sql query to check pw  and username exist or not
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

        //execute qry
        $conn= new mysqli("localhost", "root","","onlineteaching");
        $res=mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
    
        if($count==1){
            //user available 
            $_SESSION['login']="<div class='success'>Login Successful.</div>";
            $_SESSION['user']=$username; //to check whether user is login or not and logout will unset it
            //redirect to homepage
            header('location:'.SITEURL.'homemain.php');
        }else{
            //user not available
            $_SESSION['login']="<div class='error text-center'>Username or Password didnot match.</div>";
            //redirect to homepage
            header('location:'.SITEURL.'login.php');
        }
    }

?>
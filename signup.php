<?php
    session_start();

    $username = "";
$password    = "";
$errors = array(); 


    $conn= mysqli_connect('localhost','root','');
    mysqli_select_db($conn,'onlineteaching');
    if (isset($_POST['submit']))
    {
     $fullname = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    
    $s="select * from users where username='$username'";
    $result = mysqli_query($conn, $s);
    $num= mysqli_num_rows($result);
    
    if($num == 1)
    {
        echo "username already taken";
    }
    else{
        $reg= "insert into users(full_name,username,password) values('$fullname','$username','$password')";
        mysqli_query($conn,$reg);
      
        header("Location: login.php");
        die;
    }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body class="bgimg">
    <div class="loginbox">
    <img src="" alt="">
    <h1>Get Started!</h1>  
    <form action="signup.php" method="post">
        <b>Full name:</b>
        <input type="text" id="full_name" name="full_name" placeholder="Enter fullname"> <br>
        <b>username:</b>
        <input type="text"  id="username" name="username" placeholder="Enter Username"> <br>
        <b>Password:</b>
        <input type="password"  id="password" name="password" placeholder="Enter Password"><br><br>
        <input type="submit" name="submit" value="Sign Up">
    </form>
    </div>
</body>
</html>
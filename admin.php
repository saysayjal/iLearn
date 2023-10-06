
<?php include('config.php'); ?>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="css/admin.css">
    </head>
    <body>
    
    <div class="loginclass">
        <h1 class="text-center">Admin Login</h1> 
        
      
        <br>

        <!-- Login form starts here -->
        <form action="" method="POST" class="text-center"> 
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br> <br>
            Password: <br>
            <input type="password" name="password" placeholder="Enter Password">
<br> <br>
            <input type="submit" name="submit" value="Login" class="btn-primary" >
    <br><br>
        </form>
        <!-- Login form starts here -->
    </div>

    </body>
</html>
<?php

    //check submit buton click or not
    if(isset($_POST['submit']))
    {
        //process for login
    
        //1 get data fro login form
        $username=$_POST['username'];
        $password=$_POST['password'];

        //sql query to check pw  and username exist or not
        $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";

        //execute qry
        $conn= new mysqli("localhost", "root","","onlineteaching");
        $res=mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
    
        if($count==1){
            //user available 
            $_SESSION['login']="<div class='success'>Login Successful.</div>";
            $_SESSION['user']=$username; //to check whether user is login or not and logout will unset it
            //redirect to homepage
            header('location:'.SITEURL.'manage-admin.php');
        }else{
            //user not available
            $_SESSION['login']="<div class='error text-center'>Username or Password didnot match.</div>";
            //redirect to homepage
            header('location:'.SITEURL.'admin.php');
        }
    }

?>
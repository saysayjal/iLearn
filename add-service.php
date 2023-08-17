
<?php include('config.php'); ?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="css/admin.css">
    </head>
    <body>
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="manage-service.php">Services</a></li>
                    <li><a href="manage-admin.php  ">Admin</a></li>
                    <li><a href="admin.php]">Logout</a></li>
                </ul>
            </div>
        </div>


<div class="main-content">
    <div class="wrapper">
        <h1>Add File</h1>
           
            
            <br>
            <!-- add category form starts -->
                <form action="add-service.php" method="post" enctype="multipart/form-data">

                    <table class="tbl-30">

                        <tr>
                            <td>subject: </td>
                            <td>
                                <input type="text" name="subject" placeholder="subject">
                            </td>
                        </tr>

                        <tr>
                            <td>Select file: </td>
                            <td>
                            <input type="file" name="pdf" value="" required>
                             
                            </td>
                        </tr>

                       

                        
                        
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="upload">
                            </td>
                        </tr>

                    </table>
                </form>


</body>
               </html>

<?php
    if(isset($_POST["submit"])){
        $subject = $_POST["subject"];
        $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
        $tname = $_FILES["file"]["tmp_name"];
        $uploads_dir = '/pdf';

        $sql = "INSERT INTO content(subject, pdf) VALUES('$subject','$pname')";

        if(mysqli_query($conn,$sql)){
            echo"file uploaded";
        }else{
            echo"failed";
        }
    }


?>

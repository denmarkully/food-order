<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Food Order Website - Food Order System</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                 
                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>
        

            <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username" class="text-center"> <br><br>
            Password: <br>
            <input type="password" name="password" placeholder="Enter Password" class="text-center"> <br><br>
            
            <input type="submit" name="submit" value="Login" class="btn-primary"><br><br>
            </form>
            <p class="text-center">Denmark Ully Barbon</p>
        </div>
        
    </body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        // Button Clicked
        // echo "Button Clicked";


        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";


        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            // echo "Data Inserted";

            $_SESSION['login'] = "<div class='success'>Password Login Successfull.</div>";
            $_SESSION['user'] = $username;
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            // echo "Failed to Insert Data";
            $_SESSION['login'] = "<div class='error text-center'>Username and Password did not match.</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
      
    }



 ?>
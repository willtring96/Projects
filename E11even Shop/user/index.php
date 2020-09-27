<?php 
//session_start(); 
//
require('server.php');
$znumber = $_SESSION['znumber'];
//
if (!isset($_SESSION['znumber'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['znumber']);
    header("location: login.php");
}

//

//

?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118579996-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118579996-1');
</script>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="style.css">

        <head>
            <title>Registration system PHP and MySQL</title>
            <link rel="stylesheet" type="text/css" href="style.css">

            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
                body {
                    margin: 0;
                    font-family: Arial, Helvetica, sans-serif;
                    background-color: LIGHTGRAY;
                }

                .topnav {
                    overflow: hidden;
                    background-color: ROYALBLUE;
                    border: 3px solid red;
                }

                .topnav a {
                    float: left;
                    color: #f2f2f2;
                    text-align: center;
                    padding: 14px 16px;
                    text-decoration: none;
                    font-size: 17px;

                }

                .topnav a:hover {
                    background-color: #ddd;
                    color: black;
                }

                .topnav a.active {
                    background-color: ROYALBLUE;
                    color: white;
                }
                footer {
                    position: fixed;
                    left: 0;
                    bottom: 0;
                    right: 0;
                    background-color: ROYALBLUE;
                    color: ROYALBLUE;
                    text-align: center;
                    border: 3px solid red;

                }
            </style>
        </head>
        <body>
            <div class="topnav">
            <a class="active" href="http://lamp.cse.fau.edu/~CEN4010_S2018g11/homepage/home.html">E11even</a>
            <a href="http://lamp.cse.fau.edu/~CEN4010_S2018g11/user/login.php">Login</a>
            <a href="http://lamp.cse.fau.edu/~CEN4010_S2018g11/user/register.php">Register</a>
            <a href="http://lamp.cse.fau.edu/~CEN4010_S2018g11/Products.php">Products</a>
            <a href="http://lamp.cse.fau.edu/~CEN4010_S2018g11/homepage/rentals.html">Rentals</a>
            <a href="http://lamp.cse.fau.edu/~CEN4010_S2018g11/homepage/services.html">Services</a>
            <a href="http://lamp.cse.fau.edu/~CEN4010_S2018g11/homepage/returns.html">Returns</a>
            <a href="http://lamp.cse.fau.edu/~CEN4010_S2018g11/About.html">About</a>
            </div>

            <div class="mainHeader">
                <h1>E11even</h1>
                <h2>We supply and assit, you build it.</h2>
            </div>


            <div class="header">
                <h2>Home Page</h2>
            </div>
            <div class="content">

                <!-- notification message -->
                <?php if (isset($_SESSION['success'])) : ?>
                <div class="error success" >
                    <h3>
                        <?php 
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
                <?php endif ?>

                <!-- logged in user information -->
                <?php  if (isset($_SESSION['znumber'])) : ?>
                <h3>Welcome Student <br>Z-Number:<strong><?php echo $_SESSION['znumber']; ?></strong></h3><br>
                <!--                -->
                 <h3>Your Profile</h3><hr>
                
                <?php
               
                $q = "SELECT firstname, lastname, email, znumber FROM users WHERE znumber='".$_SESSION["znumber"]."'";
                $r = mysqli_query($db,$q);
                $a = mysqli_fetch_assoc($r);
                echo "<br>"."First Name: ".$a["firstname"]."<br><br>";
                echo "Last Name:".$a["lastname"]."<br><br>";
                echo "Email: " .$a["email"]."<br><br>";
                echo "Z-Number: ".$a["znumber"]."<br><br><hr>";
                ?>


                <!--                -->




                <br><br>
                <p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
                <?php endif ?>

               
              

           

            </div>

        </body>
    <footer>footer</footer>
</html>
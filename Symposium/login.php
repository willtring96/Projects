<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Profile - Symposium</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

        <!-- Canonical SEO -->
        <link rel="canonical" href="http://www.creative-tim.com/product/material-kit-pro" />

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

        <!-- CSS Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/material-kit1.2.0.css" rel="stylesheet"/>
    </head>
    <body>
        <?php

        $server = "localhost";
        $database = "wtring2014";
        $username = "wtring2014";
        $password = "1472Wt96";
        $conn;
        $sql;
        $stmt;
        $flag;
        $result;

        $login_user;
        $login_pass;

        // Attempts to connect to the database.
        try
        {
            $conn = new PDO("mysql:host=$server;dbname=$database", trim($username), trim($password));
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            echo "<script>alert('Connection Failed')</script>";
            echo "<script> location.href='index.html'; </script>";
            exit;
        }

        // Verifies the information entered by the user.
        try
        {
            $login_user   =   $_POST['username'];
            $login_pass   =   $_POST['password'];

            if (!($login_user && $login_pass)) throw new Exception("All fields fields must be completed.");
            $stmt = $conn->prepare("SELECT username, password FROM register;");
            $stmt->execute();
            $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            if (count($result) > 0)
            {
                for ($i = 0; $i < count($result); $i++)
                {
                    $row = $result[$i];
                    if (($row["username"] == $login_user) && ($row["password"] == $login_pass))
                    {
                        echo "<script> location.href='ProfilePage.php'; </script>";
                        break;
                    }
                }
                if ($i == count($result)) throw new Exception("Username and Password do not match");
            }
        }
        catch (Exception $e)
        {
            echo "<script>alert('Username and Password do not match!! Try: Will, 123')</script>";
            if($e){
                echo "<script> location.href='index.html'; </script>";
                exit;
            }
        }
        ?>

    </body>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/material.min.js"></script>

    <!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
    <script src="assets/js/moment.min.js"></script>

    <!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
    <script src="assets/js/nouislider.min.js" type="text/javascript"></script>

    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
    <script src="assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
    <script src="assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

    <!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
    <script src="assets/js/bootstrap-tagsinput.js"></script>

    <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
    <script src="assets/js/jasny-bootstrap.min.js"></script>

    <!--    Plugin For Google Maps   -->
    <script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script>

    <!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
    <script src="assets/js/material-kit.js?v=1.2.0" type="text/javascript"></script>
</html>
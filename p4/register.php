<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Symposium - Where great minds gather.</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

        <!-- CSS Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/material-kit1.2.0.css" rel="stylesheet"/>
        <link href="css/mycss.css" rel="stylesheet"/>
        <script>
            function newDoc() {
                window.location.assign("lamp.eng.fau.edu/~wtring2014/p4")
            }
        </script>
    </head>

    <body class="landing-page">
        <nav class="navbar navbar-transparent navbar-fixed-top"> <!--navbar-color-on-scroll-->
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Symposium</a>
                </div>

                <div class="collapse navbar-collapse" id="navigation-index">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="ForumDirectory.html">
                                <i class="material-icons">explore</i>
                                Discover
                            </a>
                        </li>
                        <!--<li>
<a href="ProfilePage.html">
<i class="material-icons">account_circle</i>
Profile
</a>
</li>
<li>
<a href="#Settings">
<i class="material-icons">settings</i>
Sign Out
</a>
</li>
<li>
<a href="#Twitter Share" target="_blank" class="btn btn-simple btn-white btn-just-icon">
<i class="fa fa-twitter"></i>
</a>
</li>
<li>
<a href="#Facebook Share" target="_blank" class="btn btn-simple btn-white btn-just-icon">
<i class="fa fa-facebook-square"></i>
</a>
</li>
<li>
<a href="#Instagram Share" target="_blank" class="btn btn-simple btn-white btn-just-icon">
<i class="fa fa-instagram"></i>
</a>
</li><-->
                    </ul>
                </div>
            </div>
        </nav>
        <div class="page-header header-filter" data-parallax="true" style="background-image: url('Images/background1.jpg');">
            <div class="container">
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
                $login_confirm;
                $login_fname;
                $login_lname;
                $login_email;
                $login_dob;

                // Attempts to connect to the database.
                try
                {
                    $conn = new PDO("mysql:host=$server;dbname=$database", trim($username), trim($password));
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo "Connected successfully.<br>";
                }
                catch (PDOException $e)
                {
                    echo "Connection failed: " . $e->getMessage();
                }

                // Verifies the information entered by the user.
                try
                {
                    $login_user = $_POST["username"];
                    $login_pass = $_POST['password'];
                    $login_confirm = $_POST['confirm'];
                    $login_fname = $_POST['fname'];
                    $login_lname = $_POST['lname'];
                    $login_email = $_POST['email'];
                    $login_dob = $_POST['dob'];

                    $stmt = $conn->prepare("SELECT username FROM register;");
                    $stmt->execute();
                    $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $result = $stmt->fetchAll();
                    if (count($result) > 0)
                    {
                        for ($i = 0; $i < count($result); $i++)
                        {
                            $row = $result[$i];
                            if ($row["username"] == $login_user) throw new Exception("Username already exists.");
                        }
                    }
                    $sql = "insert into register values('$login_fname', '$login_lname', '$login_user', '$login_dob', '$login_email', '$login_pass', '$login_confirm');";
                    $conn->exec($sql);
                    echo "User successfully created!";
                }
                catch (Exception $e)
                {
                    echo "!!!Error: " . $e->getMessage();
                }
                catch (PDOException $e)
                {
                    echo "Connection failed: " . $e->getMessage();
                }
                ?>
                <div class="row">
                    <div class="col text-center">
                        <div class="tim-typo">
                            <h1 class="title">Symposium</h1>
                            <h6><br>An addictive website where intellectuals may wish gather to share their ideas, creations, and expertise</h6>
                        </div><br>
                        <div class="col-lg-4 col-md-4"></div>
                        <div class="col-lg-4 col-md-4">
                            <button class="btn btn-raised btn-round btn-info btn-block" data-toggle="modal" data-target="#loginModal">
                                <i class="material-icons">account_circle</i>
                                Login
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-login">
                <div class="modal-content">

                    <div class="card card-signup card-plain">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                            <div class="header header-primary text-center">
                                <h4 class="card-title">Log in</h4>
                                <div class="social-line">
                                    <a href="#pablo" class="btn btn-just-icon btn-simple">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-just-icon btn-simple">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-just-icon btn-simple">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form class="form" action="login.php" method="post">
                            <p class="description text-center">Or Be Classical</p>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">face</i>
                                    </span>
                                    <input type="text" class="form-control" name="username" maxlength="16" placeholder="Username...">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input type="password" placeholder="Password... (16)" name="password" maxlength="16" class="form-control"/>
                                </div>
                        <div class="modal-footer text-center">
                            <input type="submit" name="submit" class="btn btn-primary btn-round">
                        </div>
                        </form>
                </div>
            </div>
                </div></div></div>
        <!--  End Modal -->
    </body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/material.min.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="assets/js/nouislider.min.js" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="assets/js/material-kit1.2.0.js" type="text/javascript"></script>

</html>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--External Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

        <!-- Internal Styles -->
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
        <!-- External Scripts -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

        <!-- Internal Scripts -->
        <script type="text/javascript" src="">
        </script>

        <title>Bootsrap Shell With Navabar</title>


    </head>

    <body>
        <!--   -->
        <div class="topnav">
            <a class="active" href="#home">E11even</a>
            <a href="../About.html">About</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </div>

        <div class="mainHeader">
            <h1>E11even</h1>
            <h2>We supply and assit, you build it.</h2>
        </div>
        <!---->


        <div class="container-fluid">

        </div>
        <?php
        $output = NULL;
        if(isset($_POST['submit'])){
            //$mysqli = NEW MySQLi("localhost", "tdemendonca2017", "9ATB+s8Khg", "tdemendonca2017");
            $mysqli = NEW MySQLi("localhost", "CEN4010_S2018g11", "cen4010_s2018", "CEN4010_S2018g11");
            $search = $_POST['search'];
            $resultSet = $mysqli->query("SELECT * FROM Inventory WHERE SKU LIKE '$search%' ");
            if($resultSet->num_rows > 0)
            {
                while($rows = $resultSet->fetch_assoc())
                {
                    $quantity = $rows['quantity'];
                    $Part_Name = $rows['Part_Name'];
                    $SKU = $rows['SKU'];
                    $output = "Serial Number: $SKU <br/> Part Name: $Part_Name <br/> Quantity: $quantity";
                }
            }
            else{
                echo "No Results found.";
            }

        }
        ?>
        <form method="POST">
            <input type="TEXT" name="search"/>
            <input type="SUBMIT" name="submit" value="Search"/>
        </form>
        <?php echo $output;  ?>
    </body>
    <footer>footer</footer>
</html>

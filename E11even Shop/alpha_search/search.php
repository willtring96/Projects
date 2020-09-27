<!DOCTYPE html>
<html>
    <head>
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
                <a class="active" href="#home">E11even</a>
                <a href="../About.html">About</a>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            </div>

            <div class="mainHeader">
                <h1>E11even</h1>
                <h2>We supply and assit, you build it.</h2>
            </div>


            <div class="header">
                <h2>Parts</h2>
            </div>
            <div class="content">

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
            <input type="TEXT" name="search" class="mytext"/>
            <input type="SUBMIT" name="submit" value="Search" class="mysubmit"/>
        </form>
        <?php echo $output;  ?>

               
              

           

            </div>

        </body>
    <footer>footer</footer>
</html>
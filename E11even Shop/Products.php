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
        <title>Products</title>
        <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">

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
        <div align="center">
            <div class="container">
                <div class="mainHeader">
                    <h1>E11even</h1>
                    <h2>We supply and assist, you build it.<br/><br/></h2>
                </div>
                <div class="header">
                    <h3>Search</h3>
                </div>
                <div class="content">
                    <form method="POST" align="center">
                        <input type="TEXT" name="search" placeholder="Part Name or SKU..." class="mytext"/>
                        <input type="SUBMIT" name="submit" value="Search" placeholder="Part Name or SKU..." class="mysubmit"/>
                    </form>
                    <?php
                    $output = NULL;
                    if(isset($_POST['submit'])){
                        $mysqli = NEW MySQLi("localhost", "CEN4010_S2018g11", "cen4010_s2018", "CEN4010_S2018g11");
                        $search = $_POST['search'];
                        $resultSet = $mysqli->query("SELECT * FROM Inventory WHERE SKU LIKE REPLACE('%$search%',' ','') OR Part_Name LIKE REPLACE('%$search%',' ','')");
                        echo "<br/>";
                        if($resultSet->num_rows > 0)
                        {
                            while($rows = $resultSet->fetch_assoc())
                            {
                                $quantity = $rows['quantity'];
                                $Part_Name = $rows['Part_Name'];
                                $SKU = $rows['SKU'];
                                $Price = $rows['price each'];
                                $Newark = $rows['Newark p/n'];
                                $Img = $rows['Image'];                        
                                $output = "Serial Number: $SKU <br/> Part Name: $Part_Name <br/> Newark p/n: $Newark <br/> Quantity: $quantity <br/> Price each: $Price <br/> ";
                                echo '<img src="data:image/jpeg;base64,'.base64_encode( $Img ).'"/>';
                                echo "<br/> $output <br/>";
                            }
                        }
                        else{
                            echo "<br/> No Results found.";
                        }

                    }
                    ?>
                </div>

                <?php
                if(!isset($_POST['submit'])){?>
                <h3>Products</h3>

                <div class="content">
                    <?php
                    $output = NULL;
                    $mysqli = NEW MySQLi("localhost", "CEN4010_S2018g11", "cen4010_s2018", "CEN4010_S2018g11");
                    $resultSet = $mysqli->query("SELECT * FROM Inventory");
                    while($rows = $resultSet->fetch_assoc())
                    {
                        $quantity = $rows['quantity'];
                        $Part_Name = $rows['Part_Name'];
                        $SKU = $rows['SKU'];
                        $Price = $rows['price each'];
                        $Newark = $rows['Newark p/n'];
                        $Img = $rows['Image'];                        
                        $output = "Serial Number: $SKU <br/> Part Name: $Part_Name <br/> Newark p/n: $Newark <br/> Quantity: $quantity <br/> Price each: $Price <br/> ";
                        echo '<img src="data:image/jpeg;base64,'.base64_encode( $Img ).'"/>';
                        echo "<br/> $output <br/>";
                    }}
                    ?>
                </div></div></div>
    </body>
    <footer>footer</footer>
</html>
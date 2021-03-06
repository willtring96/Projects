<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!--External Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <!-- Internal Styles -->
	<style>
        @media (max-width: 62em) {
            .navbar-nav {
                padding-top: .425rem;
                padding-left: 0.75rem;
            }
            .navbar-nav .nav-item {
                float: none;
            }
            .navbar-brand {
                float: right;
            }
            .navbar-brand,
            .navbar-nav .nav-item {
                display: block;
            }
            .navbar-nav .nav-item + .nav-item {
                margin-left: 0;
            }
            .dropdown-menu {
                position: relative;
                float: none;
            }
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
   
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
       
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.html">Navbar</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Page</a>
                </li>
                <!-- Dropdown - Delete from this comment to the next if you don't want it -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separted</a>
                    </div>
                </li>
            </ul>
        </div>
    
    </nav>

	<div class="container-fluid">
        
	</div>
<?php
$output = NULL;
if(isset($_POST['submit'])){
$mysqli = NEW MySQLi("localhost", "tdemendonca2017", "9ATB+s8Khg", "tdemendonca2017");
$search = $_POST['search'];
$resultSet = $mysqli->query("SELECT * FROM inventory WHERE SKU LIKE '$search%' ");
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

</html>

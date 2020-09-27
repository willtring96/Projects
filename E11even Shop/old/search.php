<?php
$output = NULL;
$mysqli = new MySQLi("localhost","CEN4010_S2018g11","cen4010_s2018","CEN4010_S2018g11");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$search = $mysqli->real_escape_string($_POST['keyword']);
$resultSet = $mysqli->query("SELECT * FROM Inventory WHERE keyword1 LIKE '%$search%' OR keyword2 LIKE '%$search%'");
// show all the field with type, lenght,description of a specific table
echo $output = "keyword: $search <br/><br/>";
if($resultSet->num_rows > 0){
    while($rows = $resultSet->fetch_assoc()){
        $SKU = $rows['SKU'];
        $Description=$rows['P/N Name / Description'];
        $Keyword1 = $rows['Keyword1'];
        $Keyword2 = $rows['Keyword2'];
        $Newark = $rows['Newark p/n'];
        $Quantity = $rows['quantity'];
        $Price = $rows['price each'];
        
        echo $output = "SKU: $SKU <br/> Description: $Description <br/> Newark p/n: $Newark <br/> Quantity: $Quantity <br/> Price each: $Price <br/><br/>";
    }}
else{
    echo $output = "No results";
}
?>
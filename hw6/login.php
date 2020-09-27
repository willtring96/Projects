<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <script>
            function goBack() {
                window.history.back()
            }
        </script>
    </head>

    <body>
        <h1>Display Table</h1>
        <div id="time">Loading current time...</div>
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
        $info_city;
        $info_state;
        $info_country;

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
            $login_user   =   $_POST['username'];
            $login_pass   =   $_POST['password'];
            $info_city    =   $_POST['city'];
            $info_state   =   $_POST['state'];
            $info_country =   $_POST['country'];

            if (!($login_user && $login_pass && $info_city && $info_state && $info_country)) throw new Exception("All fields fields must be completed.");

            $stmt = $conn->prepare("SELECT username, password FROM users;");
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
                        $sql = "insert into cities values('$login_user', '$login_pass', '$info_city', '$info_state', '$info_country');";
                        $conn->exec($sql);
                        echo "<h1>City successfully inserted!</h1>";
                        break;
                    }
                }
                if ($i == count($result)) throw new Exception("User cannot be found.");
            }
        }
        catch (Exception $e)
        {
            echo "!!!Error: " . $e->getMessage();
        }

        // Displays the table of cities.
        try
        {
            $stmt = $conn->prepare("SELECT username, password, city, state, country FROM cities;");
            $stmt->execute();
            $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();

            if (count($result) > 0)
            {
                echo "<table><tr><th>Username</th><th>Password</th><th>City</th><th>State</th><th>Country</th></tr>";
                for ($i = 0; $i < count($result); $i++)
                {
                    $row = $result[$i];
                    echo "<tr><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td><td>" . $row["city"] . "</td><td>" . $row["state"] . "</td><td>" . $row["country"] . "</td></tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "<h1>No data available.</h1>";
            }

            $conn = "null";
        }
        catch (PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

        ?>
        <button onclick="goBack()">Go Back</button>
        
        <script src="updatetime.js" onload="timer_function();"></script>
    </body>
</html>
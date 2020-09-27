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
        <h1>User Database</h1>
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
            $login_user = $_POST['username'];
            $login_pass = $_POST['password'];

            if (!($login_user && $login_pass)) throw new Exception("Both fields must have data.");

            $stmt = $conn->prepare("SELECT username FROM users;");
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

            $sql = "insert into users values('$login_user','$login_pass');";
            $conn->exec($sql);
            echo "<h1>User successfully created!</h1>";
        }
        catch (Exception $e)
        {
            echo "!!!Error: " . $e->getMessage();
        }

        // Displays the table of users.
        try
        {
            $stmt = $conn->prepare("SELECT username, password FROM users;");
            $stmt->execute();
            $flag = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();

            if (count($result) > 0)
            {
                echo "<table><tr><th>Username</th><th>Password</th></tr>";
                for ($i = 0; $i < count($result); $i++)
                {
                    $row = $result[$i];
                    echo "<tr><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td></tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "<h1>No users in the database.</h1>";
            }

            $conn = "null";
        }
        catch (PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

        ?>
        <button onclick="goBack()">Go Back</button>
        <form action="login.php" method="post">
            <h2>Insert Location</h2>
            <p>Must enter an existing username and password to complete this form.</p>
            <div>Username: </div>
            <input type="text" name="username" placeholder="Username" maxlength="25">
            <div>Password: </div>
            <input type="password" name="password" placeholder="Password" maxlength="25">
            <div>City: </div>
            <input type="text" name="city" placeholder="City" maxlength="25">
            <div>State: </div>
            <input type="text" name="state" placeholder="State" maxlength="25">
            <div>Country: </div>
            <input type="text" name="country" placeholder="Country" maxlength="25">
            <br><input type="submit" name="submit">
        </form>
        <script src="updatetime.js" onload="timer_function();"></script>
    </body>
</html>
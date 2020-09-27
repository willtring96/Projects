<?php 
	session_start();

	// variable declaration
	$znumber = "";
	$email    = "";
    //
    $firstname = "";
    //
	$errors = array(); 
	$_SESSION['success'] = "";
    //
    
    //

	// connect to database
	$db = mysqli_connect('localhost', 'CEN4010_S2018g11', 'cen4010_s2018', 'CEN4010_S2018g11');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
        $znumber = mysqli_real_escape_string($db, $_POST['znumber']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
        if (empty($firstname)) { array_push($errors, "first name is required"); }
		if (empty($lastname)) { array_push($errors, "last name is required"); }

        if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($znumber)) { array_push($errors, "Z-Number is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
//			$password = md5($password_1);//encrypt the password before saving in the database
            $password = $password_1;
            
			$query = "INSERT INTO users (firstname, lastname, email, znumber, password) 
					  VALUES('$firstname', '$lastname', '$email', '$znumber', '$password')";
			mysqli_query($db, $query);

			$_SESSION['znumber'] = $znumber;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$znumber = mysqli_real_escape_string($db, $_POST['znumber']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($znumber)) {
			array_push($errors, "Z-Number is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			//$password = md5($password);
            $password = $password;
			$query = "SELECT * FROM users WHERE znumber='$znumber' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['znumber'] = $znumber;
                //
            

                //
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>
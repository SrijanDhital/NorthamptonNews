<?php
	//continue with user session status
	session_start();

	//provide title to the page
	$pagetitle = 'Create Admin';

	//database connection file called
	require 'connection.php';

	//if condition to check if admin is logged in or not
	//page can be accessed only by admin
	if(isset($_SESSION['logged_as_admin']) && $_SESSION['logged_as_admin'])
	{

		//design a html form to add a new admin
		$pagecontent = '
			<h2>Create Admin</h2>

			<form class="form" action="addAdmin.php" method="post">
					<label>Firstname:</label>
						<input type="text" name="firstname" required />
					<label>Lastname:</label>
						<input type="text" name="lastname" required />
					<label>E-mail address:</label>
						<input type="text" name="email" required />
					<label>Password:</label>
						<input type="password" name="password" required />
					<label>Confirm Password:</label>
						<input type="password" name="password2" required />
						<input type="submit" value="Submit" name="submit" />
				</form>
			';

			//when submit button is pressed, run the following
			if(isset($_POST['submit']))
			{
				if(isset($_POST['firstname'], $_POST['lastname'], $_POST['password'], $_POST['password2']))
				{
					$email = $_POST['email'];
					
					//check if the passwords match or not
        			$valuesEqual = $_POST['password'] == $_POST['password2'];

					//        email sanitization tutorial: https://www.youtube.com/watch?v=fMJw90n8M60&index=4&list=PLOYHgt8dIdox81dbm1JWXQbm2geG1V2uh, 02.01.2017
       				$sanitizedEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        
       				//check all the valid conditions
        			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || $_POST['email'] != $sanitizedEmail) {
        				//show an alert if the entered email format is invalid
            			echo '<script type="text/javascript">
						alert("The email is not valid");
						</script>';
			            // return;

			        } else if (!$valuesEqual) { 
			        //show an alert statement if the passwords do not match
			            echo '<script type="text/javascript">
						alert("Sorry, the passwords did not match");
						</script>';
			            // return;
			       	
			        }else{
			        
				        //query to insert a new record into admins table
				        $stmt = $pdo->prepare('INSERT INTO admins(firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)');

				        $criteria = [
				            'firstname' => $_POST['firstname'],
				            'lastname' => $_POST['lastname'],
				            'email' => $_POST['email'],
				            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT) //secured form of password
				        ];

				        try{
							$stmt -> execute($criteria);

							//show an alert statement if a new admin is added
							echo '<script type="text/javascript">
								alert("The admin account \'' . $email . '\' has successfully been created");
							</script>';

						} catch (PDOException $e) {
						   if ($e->errorInfo[1] == 1062) {
						   	//show an alert statement if the duplicate exception arises
						      echo '<script type="text/javascript">
								alert("The Email \'' . $email . '\' already exists");
								</script>';
						   } else {
						   	 //show an alert message if any other exception arise
						      echo '<script type="text/javascript">
								alert("Error from: ' . $e->getMessage() . '");
								</script>';
						   }
						}
					}
				}
			}
	}
	//if admin is not logged in
	else {
		header("Location: login.php");
	}
			require 'layout.php';

?>
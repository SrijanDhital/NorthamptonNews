    <?php
    //users can register their name to the site from this

    require 'connection.php';

    $pagetitle = 'Register';


    //form to fill up user details into
    $pagecontent = 
    '<h2>Register yourself to Northampton News</h2>
    <article>
    	<form class="form" action="register.php" method="post">
    <p>Please enter your details</p>
    		
    		<label>Firstname:</label>
    			<input type="text" name="firstname" required />
    		<label>Lastname:</label>
    			<input type="text" name="lastname" required />
    		<label>E-mail address:</label>
    			<input type="text" placeholder="user@exampe.com" name="email" required />
    		<label>Password:</label>
    			<input type="password" placeholder="**********" name="password" required />
    		<label>Confirm Password:</label>
    			<input type="password" placeholder="**********" name="password2" required />

    		<input type="submit" value="Submit" name="submit" />

    	</form>
    	</article>
    </article>';

    //when submit button is pressed
    if (isset($_POST['submit'])) {
    	
        //take information after the submit button is pressed
    if(isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['password2']))
    {
        $email = $_POST['email'];


            $valuesEqual = $_POST['password'] == $_POST['password2'];

    //        email sanitization tutorial: https://www.youtube.com/watch?v=fMJw90n8M60&index=4&list=PLOYHgt8dIdox81dbm1JWXQbm2geG1V2uh, 02.01.2017
            $sanitizedEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

            
            //if-else statements for error finding
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || $_POST['email'] != $sanitizedEmail) {
                // echo '<p>Entered email is not valid</p>';
                //show an alert if the entered email format is invalid
                        echo '<script type="text/javascript">
                        alert("The email is not valid");
                        </script>';
                return;

            } else if (!$valuesEqual) {

                // echo "<h2>Password is not matching.</h2>
                // <p><==Please re enter the passwords";
                // return;

                //show an alert statement if the passwords do not match
                echo '<script type="text/javascript">
                        alert("Sorry, the passwords did not match");
                        </script>';
           	
            }
            else{
            //insert statement to insert values into users table
            $stmt = $pdo->prepare('INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)');

            //store values into table
            $criteria = [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ];

            unset($_POST['submit']);

            try{
                    $stmt -> execute($criteria);

                    //show an alert if the username is added
                    echo '<script type="text/javascript">
                    alert("User \'' . $email . '\' has been successfully added");
                    </script>';

                } catch (PDOException $e) {
                   if ($e->errorInfo[1] == 1062) {

                    //show an alert if there is duplicate entry exception
                      echo '<script type="text/javascript">
                        alert("The email \'' . $email . '\' already exists.");
                        </script>';
                   } else {
                    //show an alert message if other a=exceptions occur
                      echo '<script type="text/javascript">
                        alert("Error from: ' . $e->getMessage() . '");
                        </script>';
                   }
                }

            }

    	}
    }

    require 'layout.php';

    ?>

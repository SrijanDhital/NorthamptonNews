<?php
	session_start();

	$pagetitle = 'Edit Admin Account';

	//Database connection file called
	require 'connection.php';

	//Check to make sure that an admin is logged in before displaying the page
	if (isset($_SESSION['logged_as_admin']) && $_SESSION['logged_as_admin'] == true) {

	$pagecontent = '<h2>Select an Admin Account to Edit</h2>
	<form class="form" action="AdminEditSelection.php" method="GET">
			<label>Select Admin Account:</label>
			<select name="editEmail">
				<option value="" disabled selected>Please Select</option>';

					//prepared statement to select all articles for drop down options menu
					$stmt = $pdo->prepare('SELECT * FROM admins');
					$stmt -> execute();

					foreach ($stmt as $row)
					{
						$pagecontent = $pagecontent. '
						<option value="' . $row['email'] . '">' . $row['email'] . '</option>';
					}

	//pagecontent varibale continues
	$pagecontent =$pagecontent . '
				</select>
				<input type="submit" value="Edit" name="submit" />
			</form>
	';

	//jump to the admin detail edit part once the form is submitted with valid data
	if(isset($_GET['editEmail'])){
		$editEmail = $_GET['editEmail'];
		header("Location: editAdmin.php?editEmail=$editEmail");
	}

	//End of admin logged in IF
	}
	else {
		$pagecontent = 'Please login as an admin to view this page';
	}


	require 'layout.php';
?>
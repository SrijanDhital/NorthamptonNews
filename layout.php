	
<!DOCTYPE html>
<html>
	<head>
		<!-- link css file for design -->
		<link rel="stylesheet" type="text/css" href="styles.css">

		<title><?php echo $pagetitle; ?></title> <!-- title variable for setting the page title -->
	</head>
	<body>
		<header>
			<section>
				<h1>Northampton News</h1>
			</section>
		</header>
		<nav>
			<ul>
				<!-- navigation menu bar items at top -->
				<li><a href="index.php">Home</a></li>
				<li><a href="latestnews.php">Latest Articles</a></li>
				<li><a href="#">Categories</a>
					<ul>
						<!-- a dropdown for listed categories -->
						<?php require 'connection.php';
						$stmt = $pdo->prepare('SELECT * FROM categories');
						$stmt->execute();

						foreach ($stmt as $row)
							{
								// Categories named including link to jump into their respective page
							  echo '<li><a href="catArticles.php?category='. $row['name'] . '">'. $row['name'] . '</a></li>';
							} ?>
						
					</ul>
				</li>
				<li><a href="contact.php">Contact us</a></li>
			</ul>

			<!-- top theme image that changes when a new page is loaded -->
		</nav>
		<img src="images/banners/randombanner.php" />
		<main>

			<!-- navigation items in the side bar -->
			<nav>
				<ul>
					<?php

					//when user is logged in, show these items in the side navigation
					if(isset($_SESSION['logged_as_user']) && $_SESSION['logged_as_user'] == true){

						echo '<li><a href="logout.php">Logout</a></li>';
					}
					//when admin is logged in, show these items in the side navigation
					else if(isset($_SESSION['logged_as_admin']) && $_SESSION['logged_as_admin'] == true){
						echo '<li><a href="logout.php">Logout</a></li>
						<li><a href="adminindex.php">Admin Page</a><li>';
					}
					//Items to show in the side navigation when a guest opens this webpage
					else{
						echo '<li><a href="register.php">Register</a></li>
							<li><a href="login.php">Login</a></li>';
					}

						?>
				</ul>
			</nav>

			<article>

				<!-- elements in the main body kept as a dynamic variable -->
				<?php echo $pagecontent; ?>

			</article>
		</main>
		<footer>
			&copy; Northampton News 2021
		</footer>

	</body>
</html>
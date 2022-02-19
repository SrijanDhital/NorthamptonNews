<?php
$pagetitle = 'Delete News Category';

session_start();

//Connection to database
require 'connection.php';

//Checks to make sure that an admin is logged in before displaying the page
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
$pagecontent = '
<h2>Delete News Category</h2>
<form class="form" action="deletecategory.php" method="post">
  <label>News Category:</label>
    <select name="category">
      <option value="" disabled selected>Please Select</option>';

    //prepared statement to select all categories
    $results = $pdo->prepare('SELECT * FROM categories');
    $results->execute();

    foreach ($results as $row)
    {
      $pagecontent = $pagecontent. '<option value="'. $row['category_id'].'">'. $row['name'].'</option>';
    }

//content variable continues
$pagecontent = $pagecontent.'
    </select>
    <input type="submit" value="Delete" name="submit" />
</form>
';


//If delete button is pressed delete news category Username
if (isset($_POST['category']))
{

  //prepare statement to delete category from categories table
  $results = $pdo->prepare('DELETE FROM categories WHERE category_id=:category');

  $delete_category =[
    'category'=> $_POST['category']
  ];

  unset($_POST['submit']);
  $results->execute($delete_category);

//show an alert statement once the category is deleted
echo '<script type="text/javascript">
  alert("News category ' . $_POST['category'] . ' has been deleted");
</script>';
  
}

//if the admin is not logged in, show the following
}
else {
	echo '<li><a href = "login.php"> Please login as admin first </a></li>';
}

require 'layout.php';
?>
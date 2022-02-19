<?php
session_start(); //continue the current session
$pagetitle = "Northampton News - Home"; //set the title for this page

require 'connection.php'; //database connection file called

$pagecontent = '<h2>News from Northampton News</h2>';
$stmt = $pdo->prepare('SELECT * FROM articles'); //query from articles table
		$stmt->execute();

		foreach ($stmt as $row)
		{
			//preview of article in the homepage or other pages
			$pagecontent = $pagecontent . '
		<div name="articles">
	  <a href="article.php?article='. $row['article_id'] . '" id="News-heading" ><h5>' . $row['title']. '<h5></a>
	  <a href="article.php?article='. $row['article_id'] . '" id="News-image" ><p><img src="' . $row['image']. '" id="News-image" height="150px" width="220px"></p></a>
	  <h5>' .$row['published_date']. '</h5>
	  <p>Category: '.$row['category']. '</p>
	  <p>' .$row['content']. '</p>
	  
	  </div>
			';
		}

require 'layout.php';

?>
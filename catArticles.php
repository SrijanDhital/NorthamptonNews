<?php
session_start();

$pagetitle = 'News Articles';

//database connection file called
require 'connection.php';

$category = $_GET['category'];

$pagecontent = '<h2>' . $category . ' Articles</h2>';
  
  //select all the articles from database which fall in the requested category
  $stmt = $pdo->prepare('SELECT * FROM articles WHERE category="' . $category . '" ORDER BY published_date DESC ');
  $stmt -> execute();

  //Getting all the comments from the database
  $stmt1 = $pdo->prepare('SELECT * FROM comments');
  $stmt1 -> execute();

  //Adding news acrticles to page with a specific category.
  foreach ($stmt as $row) {
    $pagecontent = $pagecontent . '
    <div>
      <a href="article.php?article='. $row['article_id'] . '" id="News-heading" ><h5>' . $row['title']. '<h5></a>
      <a href="article.php?article='. $row['article_id'] . '" id="News-image" ><p><img src="' . $row['image']. '" id="News-image" height="150px" width="220px"></p></a>
      <h5>' .$row['published_date']. '</h5>
      <p>Category: '.$row['category']. '</p>
      <p>' .$row['content']. '</p>
    </div>';
    }
      

require 'layout.php';
?>
<?php
//this page displays all the full details of an article
//this is the full page of an article

session_start();

$pagetitle = 'News Articles';

//Connection to the database
require 'connection.php';

//article located using url
$article_id = $_GET['article'];

  //query from articles on the basis of article id
  $stmt = $pdo->prepare('SELECT * FROM articles WHERE article_id="' . $article_id . '"');
  $stmt -> execute();

  //addition of article 
  foreach ($stmt as $row) {

    //news article information
    $pagecontent = '
      <h2 id="heading">' .$row['title']. '</h2>
        <article>
    ';


      //added main body
      $pagecontent = $pagecontent . '
      <p><img src="' . $row['image'] . '" id="News-image" height="300px" width="500px">  </p>
      <p id="">News Category: ' . $row['category']. '</p>
      <p id="">' . $row['content'] . '</p>
      <p>Published by: ' . $row['publisher'] . '</p>
      <p id="">' . $row['published_date'] . '</p>
      <h3 id="Comments">Comments:</h3>
      </article>
      ';
  }

  //query from comments table on the basis of id
  $stmt1 = $pdo->prepare('SELECT * FROM comments WHERE article_id="' . $article_id . '"');
  $stmt1 -> execute();

  //Displaying already added comments on news article
  foreach ($stmt1 as $row1){

    //Converting id of user to their email
    $ConvertUser = $pdo->prepare('SELECT email FROM users WHERE user_id="' .$row1['user_id']. '"');
    $ConvertUser -> execute();

    foreach ($ConvertUser as $userConvert) {
      $username = $userConvert['email'];
    }

    //adding up to content variable
    $pagecontent = $pagecontent. '
      <h5 id="Comment-username"><b>' . $username .'</b> commented on '. $row1['date'] .'</h5>
      <p id="comment_content">' . $row1['content'] .'</p>
    ';
  }


//check if the user is logged in or not
if (isset($_SESSION['logged_as_user']) && $_SESSION['logged_as_user'] == true) {

  //add comments from the form
  $pagecontent = $pagecontent.'
    <h3 id="Comments">Enter your comment</h3>
    <form action="article.php?article='. $article_id . '" method="post">
      <label>Please Enter your comments here:</label>
        <textarea name="comment" placeholder="Max 200 Characters"></textarea>
      <input type="submit" value="Submit" name="submit" />
    </form>
    ';

//when submit is pressed
if (isset($_POST['comment'])){

  //user session used to pass information
  $current_user = $_SESSION['user'];

  //query from users to locate user ID from email
  $user_search = $pdo->prepare('SELECT user_id FROM users WHERE email = "' . $current_user . '"');
  $user_search -> execute();

  foreach ($user_search as $row2){
    $logged_in_user_id = $row2['user_id'];
  }

  $date = date('Y-m-d H:i:s');

  //insert statement to add into comments table
  $stmt3 = $pdo->prepare('INSERT INTO comments (content, date, user_id, article_id)
                        VALUES ( :comment, :date, :user_id, :article_id)');

  $criteria = [
    'comment' => $_POST['comment'],
    'date' => $date,
    'user_id' => $logged_in_user_id,
    'article_id' => $article_id
  ];

  unset($_POST['submit']);
  $stmt3 -> execute($criteria);

}

}
//in case a user is not logged in
else {

  //adding up to the content
  $pagecontent = $pagecontent .'
    <h3>Please Create an account or Log in as user to add a comment</h3>
  ';
}

require 'layout.php';
?>
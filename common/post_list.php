<!DOCTYPE html>
<?php
  include  $_SERVER['DOCUMENT_ROOT'].'/common/connectDB.php';
  $posts = fetch($conn, "SELECT * FROM Blogs ORDER BY date DESC");
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/post_list.css">
    <title>Article List</title>
  </head>
  <body>
    <div class="wrapper">
      <?php include $_SERVER['DOCUMENT_ROOT']."/common/header.html"; ?>
      <h1>Recent Posts</h1>
      <?php
        while($article = $posts->fetch_assoc()) {
          include 'post_preview.php';
        }
     ?>
   </div>
  </body>
</html>

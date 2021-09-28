<!DOCTYPE html>
<?php

  include  $_SERVER['DOCUMENT_ROOT'].'/common/connectDB.php';



  $sql = "SELECT * FROM Blogs WHERE location = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $_GET['loc']);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($id, $title, $date, $text, $location, $project_id, $project_index);
  $stmt->fetch();


?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/post.css">
    <title><?=$title?></title>
  </head>
  <body>
    <div class="wrapper">

      <?php include $_SERVER['DOCUMENT_ROOT']."/common/header.html"; ?>
      <h1><?=$title?></h1>
      <h2><?=$date?></h2>


      <div class="content">

        <div class="text"><?=$text?></div>
        <div class="sidebar">
          <?php
            if ($project_id != null){
              $sql = "SELECT * FROM `Projects` WHERE id = ?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("i", $project_id);
              $stmt->execute();
              $stmt->store_result();
              $stmt->bind_result($project_id, $project_title);
              $stmt->fetch();
         ?>
            <P><?=$project_title?></P>
            <ul>
              <?php
                $sql = "SELECT title, location FROM `Blogs` WHERE project_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $project_id);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($other_title, $other_location);


                while($article = $stmt->fetch()) {
                $href = "/common/post.php?loc=".$other_location;
              ?>
              <li>
                <?="<a href='".$href."'>".$other_title."</a>"?>
              </li>
              <?php } ?>
            </ul>
          <?php } ?>
        </div>
      </div>




    </div>
  </body>
</html>
<?php $stmt->close(); ?>

<!DOCTYPE html>
<?php include  $_SERVER['DOCUMENT_ROOT'].'/common/connectDB.php';?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/gallery.css">
    <title>Gallery</title>
  </head>
  <body>
    <div class="wrapper">

      <?php include $_SERVER['DOCUMENT_ROOT']."/common/header.html"; ?>
      <h1>Gallery</h1>
      <?php
        $result = fetch($conn, "SELECT YEAR(date) FROM Gallery ORDER BY date DESC LIMIT 1");
        $first = $result->fetch_array()[0];


        $result = fetch($conn, "SELECT YEAR(date) FROM Gallery ORDER BY date ASC LIMIT 1");
        $last = $result->fetch_array()[0];
        for ($year=$first; $year >= $last ; $year--) {
          include  $_SERVER['DOCUMENT_ROOT'].'/common/gallery/gallery_section.php';
        }

       ?>

   </div>
  </body>
</html>

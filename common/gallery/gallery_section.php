<?php
  $result = fetch($conn,"SELECT * FROM Gallery WHERE YEAR(date)=".$year." ORDER BY date DESC");
  if ($result->num_rows > 0) {
?>
  <h2><?= $year ?></h2>
  <div class='image_set'>
    <?php
      while($img = $result->fetch_assoc()) {
        include  $_SERVER['DOCUMENT_ROOT'].'/common/gallery/gallery_image.php';
      }
    ?>
  </div>
  <hr>
<?php } ?>

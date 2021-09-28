<div class="article_preview">
  <?php
    $href = "/common/post.php?loc=".$article["location"];
    echo "<a href='".$href."'>";
   ?>
      <h2><?= $article["title"]; ?></h2>
      <h3><?= $article["date"]; ?></h3>
  </a>
</div>

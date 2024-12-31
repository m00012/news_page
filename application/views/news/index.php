<div class="news-section">
<?php foreach ($news as $news_item): ?>

  <h3 class="<?= $news_item['class_name']; ?>">
    <?= $news_item['new_title']; ?>
  </h3>
  
  <div class="main">
    <?= $news_item['text']; ?>
  </div>
  <p><a href="<?= '/news/'.$news_item['slug'] ?>">View article</a></p>


<?php endforeach; ?>
<div>
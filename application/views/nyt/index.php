<div class="news-section">
<?php foreach ($news as $news_item): ?>
    <h3><?= htmlspecialchars($news_item['title']); ?></h3>
    <div class="main">
        <?= htmlspecialchars($news_item['abstract']); ?>
    </div>
    <p><a href="<?= '/nyt/' . urlencode($news_item['slug']); ?>">View article</a></p>
<?php endforeach; ?>
</div>

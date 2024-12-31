
<p><strong>Byline:</strong> <?= !empty($byline) ? htmlspecialchars($byline) : 'N/A'; ?></p>
<p><strong>Published:</strong> <?= htmlspecialchars(date('F j, Y', strtotime($published_date))); ?></p>
<p><strong>Abstract:</strong> <?= htmlspecialchars($abstract); ?></p>
<p><strong>Read full article on NYT:</strong> <a href="<?= htmlspecialchars($url); ?>" target="_blank"><?= htmlspecialchars($url); ?></a></p>

<?php if (!empty($image)): ?>
    <div class="images">
        <img src="<?= htmlspecialchars($image); ?>" alt="Image" style="width:100%; max-width:500px;">
    </div>
<?php endif; ?>

<?php error_reporting(E_ALL); ini_set('display_errors', 1);

require 'includes/init.php';
require 'includes/header.php';
require 'includes/footer.php';

$conn = require 'includes/db.php';


if (isset($_GET['id'])) {

$article = Article::getByID($conn, $_GET['id']);

} else {
    $article = null;
}

?>
 <?php if ($article): ?>
                    <article>
                    <h2><?=  htmlspecialchars($article->title); ?></h2>

                    <?php if ($article->image_file) : ?>
                        <img src="/uploads/<?= $article->image_file; ?>">
                    <?php endif; ?>    

                    <p><?= htmlspecialchars($article->content); ?></p>
                    </article>
                    
  <?php else : ?>
  <p>  Article not found </p>
  <?php endif; ?>
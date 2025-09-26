<?php error_reporting(E_ALL); ini_set('display_errors', 1);

require '../includes/init.php';

Auth::requireLogin();

require '../includes/header.php';
require '../includes/footer.php';

$conn = require '../includes/db.php';


if (isset($_GET['id'])) {

$article = Article::getByID($conn, $_GET['id']);

} else {
    $article = null;
}

?>
 <?php if ($article): ?>
                    <article>
                    <h2><?=  htmlspecialchars($article->title); ?></h2>
                    <p><?=  htmlspecialchars($article->content); ?></p>
                    </article>

  <a href="editarticle.php?id=<?= $article->id; ?>">Edit</a>  
  <a href="deletearticle.php?id=<?= $article->id; ?>">Delete</a>  
    
  <?php else : ?>
  <p>  Article not found </p>
  <?php endif; ?>
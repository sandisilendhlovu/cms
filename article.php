<?php error_reporting(E_ALL); ini_set('display_errors', 1);

require 'includes/init.php';
require 'includes/header.php';
require 'includes/footer.php';

$conn = require 'includes/db.php';


if (isset($_GET['id'])) {

$article = Article::getWithCategories($conn, $_GET['id']);

} else {
    $article = null;
}

?>
 <?php if ($article): ?>
                    <article>
                    <h2><?= htmlspecialchars($article[0]['title']); ?></h2>

                    <?php if ($article[0]['category_name']) : ?>
                        <p>Categories:  
                            <?php foreach ($article as $a) : ?>
                                <?= htmlspecialchars($a['category_name']); ?>
                                <?php endforeach; ?> 
                             </p>
                            <?php endif; ?> 

                    <?php if ($article[0]['image_file']) : ?>
                        <img src="/uploads/<?= $article[0]['image_file']; ?>">
                    <?php endif; ?>    

                    <p><?= htmlspecialchars($article[0]['content']); ?></p>
                    </article>


                    
  <?php else : ?>
  <p>  Article not found </p>
  <?php endif; ?>
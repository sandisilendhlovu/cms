<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'includes/init.php';
require 'includes/header.php';
require 'includes/footer.php';

Auth::requireLogin();

$conn = require 'includes/db.php';

$paginator = new Paginator($_GET['page'] ?? 1, 3, Article::getTotal($conn));

$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);
?>

<?php if (empty($articles)): ?>
    <p>No articles found.</p>
<?php else: ?>
    <table>
        <thead>
            <th>Title</th>     
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
                <tr> 
                    <td>
                        <a href="article.php?id=<?= $article['id']; ?>">
                            <?= htmlspecialchars($article['title']); ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php require 'includes/pagination.php'; ?>      
        </tbody>
    </table>
<?php endif; ?>
                       


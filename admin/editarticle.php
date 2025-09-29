<?php error_reporting(E_ALL); ini_set('display_errors', 1);

require '../includes/init.php';

Auth::requireLogin();

require '../includes/header.php';
require '../includes/footer.php';


$conn = require '../includes/db.php';


if (isset($_GET['id'])) {

$article = Article::getByID($conn, $_GET['id']);

if ( ! $article) {
    die("article not found");

}

} else {

    die("id not supplied, article not found");
}

var_dump($article->getCategories($conn));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->published_at = $_POST['published_at'];

    if ($article->update($conn)) {
        Url::redirect("/admin/article.php?id={$article->id}");
    }

}

?>

<h2> Edit Article </h2>

<?php require 'includes/articleform.php'; ?>

<?php require '../includes/footer.php'; ?>
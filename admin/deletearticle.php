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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if ($article->delete($conn)) {

 Url::redirect("/admin/index.php");

}
} 


?>
<? require '../includes/header.php'; ?>

<h2> Delete Article </h2>

<form method="post"> 
    <p> Are you sure? </p>            
  <button>Delete</button> 
  <a href="article.php?id=<?= $article->id; ?>">Cancel</a>
  </form>  

<? require '../includes/footer.php'; ?>


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
    
   var_dump($_FILES);

  try {

    switch($_FILES['file']['error']) {
    case UPLOAD_ERR_OK:
    break;
    case UPLOAD_ERR_NO_FILE: 
    throw new Exception('No file uploaded');
    break;
    default: throw new Exception('An error occured');

  }
} catch (Exception $e) {
    echo $e->getMessage();
}

}

?>

<h2> Edit Article Image </h2>

<form method="post" enctype="multipart/form-data">
    <div>
    <label for="file"> Image files </label>
    <input type="file" name="file" id="file">
    </div>
    <button>Upload</button>
</form>

<?php require '../includes/footer.php'; ?>
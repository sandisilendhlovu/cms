<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'includes/init.php';
require 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = require 'includes/db.php';

    if (User::authentication($conn, $_POST['username'], $_POST['password'])) {
        Auth::login();
        Url::redirect('/');
    } else {
        $error = "Login Incorrect";
    }
}
?>

<h2>Login</h2>

<?php if (!empty($error)) : ?>
    <p><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="post">
    <div>
        <label for="username">Username</label>
        <input name="username" id="username">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <button>Login</button>
</form>

<?php require 'includes/footer.php'; ?>


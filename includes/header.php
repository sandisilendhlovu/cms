<!DOCTYPE hmtl>
<html>
<head>
<title> My Blog </title>
<meta charset="utf-8">
</head> 
<body>
<header>
    <h1> My Blog </h1> 
</header> 
<nav>
<ul>

<li><a href="/">Home</a></li>
<?php if (Auth::isLoggedIn()) :?>

<li><a href="/admin/">Admin</a></li>
<li><a href="/logout.php">Logout</a></li>

<?php else : ?>

<li><a href="/login.php">Log in</a></li>

<?php endif; ?>
</ul>
</nav>
<main>
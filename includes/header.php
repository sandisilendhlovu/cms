<!DOCTYPE hmtl>
<html>
<head>
<title> Bits & Balance - 👩🏽‍💻♥️</title>
<meta charset="utf-8">
</head> 
<body>
<header>
<h1 style="margin-bottom: 0.3rem;">Bits & Balance - 👩🏽‍💻♥️</h1>
<p style="margin-top: 0;"> Code Live Repeat </p>
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
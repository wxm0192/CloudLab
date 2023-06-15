<?php
//setcookie('username', $_GET['username']);
setcookie('username', $_POST['username']);
$submitted = !empty($_POST);
?>
<body>
<p>You are <?php echo $_COOKIE['username']; ?></p>
<p>Are you looking for a book? <?php echo (int) $lookingForBook;
?></p>
<p>The book you are looking for is</p>
<ul>
<li><b>Title</b>: <?php echo $_GET['title']; ?></li>
<li><b>Author</b>: <?php echo $_GET['author']; ?></li>
</ul>
</body>

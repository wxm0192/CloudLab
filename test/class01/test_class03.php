<?php 
$books = [
	[
		'title' => 'To Kill A Mockingbird',
		'author' => 'Harper Lee',
		'available' => true,
		'pages' => 336,
		'isbn' => 9780061120084
	],
	[
		'title' => '1984',
		'author' => 'George Orwell',
		'available' => true,
		'pages' => 267,
		'isbn' => 9780547249643
	],
	[
		'title' => 'One Hundred Years Of Solitude',
		'author' => 'Gabriel Garcia Marquez',
		'available' => false,
		'pages' => 457,
		'isbn' => 9785267006323
	],
	];
?>
<ul>
	<?php foreach ($books as $book): ?>
	<li>
	<i><?php echo $book['title']; ?></i>
	<?php echo $book['author']; ?>
	<?php if (!$book['available']): ?>
		<b>Not available</b>
		<?php endif; ?>
		</li>
	<?php endforeach; ?>
</ul>

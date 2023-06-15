<?php
include "book.php";

class Customer {
}
$book = new Book();

$book->title = "1984";
$book->author = "George Orwell";
$book->available = 0 ;
print("<pre>");
var_dump($book);

if ($book->getCopy()) {
		echo 'Here, your copy.';
	} else {
		echo 'I am afraid that book is not available.';
	}


var_dump($book);
print("</pre>");

?>



<?php 
//<?php endif;
/*
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
*/
$booksJson = file_get_contents('books.json');
$books = json_decode($booksJson, true);
foreach ($books as $book) 
{
 echo $book['title']; 
 echo  "<br>" ;
 echo $book['author']; 
 echo  "<br>" ;
 if (!$book['available'])
	{ echo "Not available</b>" ; 
	}
 echo  "<br>" ;
}
print("<pre>");
print_r($books);
print("</pre>");
 echo  "<br>" ;
 echo  $books[0]['title'];
 echo  "<br>" ;
 echo  $books[0]['author'];
 echo  "<br>" ;
 /*echo  "<br>" ;
 var_dump( $book['title'][0]);
 echo  "<br>" ;
 var_dump( $book['title'][2]);
 echo  "<br>" ;
 var_dump( $book['title'][3]);
*/
 //var_dump( $book[1]['title']);
?>


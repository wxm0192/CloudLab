<?php

$dbname   = 'shiyan';
$username = 'wxm';
$password = 'wxm123321';
$host = '10.102.161.40';
try {
    $pdo = new \PDO("mysql:host=$host;dbname=$dbname", $username,  $password);
} catch (Exception $e) {
    print $e->getMessage() . "\n";
}
print "OK\n";
?>


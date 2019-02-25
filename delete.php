<?php


$pdo = new PDO("mysql:host=localhost; dbname=as", "root","");

$sql = "DELETE FROM list";
$statement = $pdo->prepare($sql);
$result = $statement->execute();

header("Location: index.php");
exit;
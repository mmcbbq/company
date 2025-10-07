<?php



$conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
$sql = 'DELETE FROM employees where id = :id';
$id = $_GET['id'];
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
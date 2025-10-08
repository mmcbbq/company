<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
    $sql = 'SELECT * FROM department where id = :id';
    $id = $_GET['id'];
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <!doctype html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport'
              content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        <title>Document</title>
    </head>
    <body>
    <form action='' method='post'>
        <input type='text' name='name' value='<?= $result['name']?>'>
        <input type='hidden' name='id' value='<?= $result['id']?>'>
        <input type='submit'>
    </form>
    </body>
    </html>
    <?php
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
    $sql = 'UPDATE department set name = :name where id = :id';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    echo 'change';
    header('Location: read_department.php');
    exit();
}
?>


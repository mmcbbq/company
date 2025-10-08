<?php



if ($_SERVER['REQUEST_METHOD'] === 'GET'){
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
    <input type='text' name='name' value=''>
    <input type='submit'>
</form>
</body>
</html>
<?php
} elseif ($_SERVER['REQUEST_METHOD']){
    $name = $_POST['name'];
//    $lname = $_POST['lname'];

    $conn = new PDO('mysql:host=localhost;dbname=company','phpstorm','123456');
    $sql = "INSERT INTO department (name) values (:name)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name',$fname);
    $stmt->execute();
}




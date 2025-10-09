<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
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
        <label>Name:
            <input type='text' name='name' value=''>
        </label><br>
        <label>Hiring
            <input type='checkbox' name='is_hiring' value='1'>
        </label><br>
        <label>OnSite
            <input type='radio' name='work_mode' value='onsite' checked>
        </label><br>
        <label>Remote
            <input type='radio' name='work_mode' value='remote'>
        </label><br>
        <label>Hybrid
            <input type='radio' name='work_mode' value='hybrid'>
        </label><br>
        <input type='submit'>
    </form>
    </body>
    </html>
    <?php
} elseif ($_SERVER['REQUEST_METHOD']) {
    $name = $_POST['name'];
    $work_mode = $_POST['work_mode'] ?? false;
    $is_hiring = $_POST['is_hiring'] ?? 0;
    $conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
    $sql = "INSERT INTO department (name, is_hiring, work_mode) values (:name, :is_hiring, :work_mode)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':is_hiring', $is_hiring);
    $stmt->bindParam(':work_mode', $work_mode);
    $stmt->execute();
    header("Location: read.php");
    exit();
}


?>




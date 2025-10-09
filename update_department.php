<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
    $sql = 'SELECT * FROM department where id = :id';
    $id = $_GET['id'];
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result['is_hiring']){
        $checked = 'checked';
    }else{
        $checked = '';
    }
    $work_mode = $result['work_mode'];



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
            <input type='text' name='name' value='<?= $result['name'] ?>'>
        </label><br>
        <label>Hiring
            <input type='checkbox' name='is_hiring' value='1' <?= $checked ?>>
        </label><br>
        <label>OnSite
            <input type='radio' name='work_mode' value='onsite' <?= $work_mode === 'onsite' ?  'checked' : '' ?>>
        </label><br>
        <label>Remote
            <input type='radio' name='work_mode' value='remote'  <?= $work_mode === 'remote' ?  'checked' : '' ?>>
        </label><br>
        <label>Hybrid
            <input type='radio' name='work_mode' value='hybrid'  <?= $work_mode === 'hybrid' ?  'checked' : '' ?>>
        </label><br>
        <input type='hidden' name='id' value='<?= $result['id'] ?>'>
        <input type='submit'>
    </form>



    </body>
    </html>
    <?php
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
    $sql = 'UPDATE department set name = :name , is_hiring = :is_hiring, work_mode = :hallopeter where id = :id';
    $id = $_POST['id'];
    $name = $_POST['name'];
    $work_mode = $_POST['work_mode'];
    $is_hiring = $_POST['is_hiring'] ?? 0;
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':is_hiring', $is_hiring);
    $stmt->bindParam(':hallopeter', $work_mode);
    $stmt->execute();

    header('Location: read_department.php');
    exit();
}


$stamp = new DateTime('now');


?>


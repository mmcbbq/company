<?php
function createTable(array $data, array|false $ueberschrifeten = false, string $farbe_1 = 'blue', string $farbe_2 = 'red'): string
{
    $string = "<table>";
    $string .= "<tr>";
    foreach ($data[0] as $key => $value) {
        $string .= "<th>";
        $string .= "$key";
        $string .= "</th>";
    }
    $string .= "</tr>";


    foreach ($data as $index => $user) {
        if ($index % 2 == 0) {
            $color = $farbe_1;
        } else {
            $color = $farbe_2;
        }
        $string .= "<tr  style='background-color: $color'>";
        foreach ($user as $key => $item) {
            $string .= "<td>";
            if ($key === 'is_hiring') {
                if ($item === 0) {
                    $string .= '&#10060';
                } else {
                    $string .= '✔️';
                }
            }else{
                $string .= $item;
            }
            $string .= "</td>";
        }
        $string .= "<td class='link' style='background-color: white'>";
        $id = $user['id'];
        $string .= "<a href='delete_department.php?id=$id'>Delete</a>";
        $string .= "</td>";
        $string .= "<td class='link' style='background-color: white'>";
        $string .= "<a href='update_department.php?id=$id'>Update</a>";
        $string .= "</td>";
        $string .= "</tr>";
    }
    $string .= "</table>";
    return $string;
}

# Verbindung mit der Datenbank mit einem PDO Objekt
$conn = new PDO('mysql:host=localhost;dbname=company', 'phpstorm', '123456');
#Den Auszuführenden SQL Befehl
$sql = 'SELECT * FROM department';
#Erstellen eines PDOStatement Objektes "SQL Boten" und übergabe des SQL-Befehls mithilfe des PDO Objektes
$stmt = $conn->prepare($sql);
# Ausführen des SQL-Befehls
$stmt->execute();
# Das Ergebnis des SQLs in form eines nummerischen Arrays (fetchAll) mit assoziativen Arrays als Elementen (PDO::FETCH_ASSOC)  in eine variable
$array = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
var_dump($_SERVER);
echo "</pre>";


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
<?= createTable($array) ?>
</body>
</html>

<?php


$request = explode('/', $_SERVER["REQUEST_URI"]);
//var_dump(explode('/', $_SERVER["REQUEST_URI"]));
$entity = $request[1];
$method = $request[2];
$id = $request[3] ?? null;

if ($entity === 'department' and $method === 'create') {
    require_once "../src/department/create.php";

} elseif ($entity === 'department' and $method === 'read') {
    require_once '../src/department/read.php';

}elseif ($entity === 'department' and $method === 'delete'){
    require_once '../src/department/delete.php';
}elseif ($entity === 'department' and $method === 'update'){
    require_once '../src/department/update.php';
}
else {
    echo '404';
}

<?php
require_once '../config/loader.php';


$request = explode('/', $_SERVER["REQUEST_URI"]);

$entity = $request[1] ?? null;
$method = $request[2] ?? null;
$id = $request[3] ?? null;

if ($entity === "") {
    require_once '../view/index.php';
} elseif ($entity === 'department' and $method === 'create') {
    require_once "../src/department/create.php";

} elseif ($entity === 'department' and $method === 'read') {
    require_once '../src/department/read.php';

} elseif ($entity === 'department' and $method === 'delete') {
    require_once '../src/department/delete.php';
} elseif ($entity === 'department' and $method === 'update') {
    require_once '../src/department/update.php';
} elseif ($entity === 'employee' and $method === 'create') {
    require_once "../src/employee/create.php";

} elseif ($entity === 'employee' and $method === 'read') {
    require_once '../src/employee/read.php';

} elseif ($entity === 'employee' and $method === 'delete') {
    require_once '../src/employee/delete.php';
} elseif ($entity === 'employee' and $method === 'update') {
    require_once '../src/employee/update.php';
} else {
    http_response_code(404);
    require_once '../view/404.html';
}

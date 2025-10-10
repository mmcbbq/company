<?php


function dbcon(string $host = DB_HOST, string $dbname = DB_NAME, string $dbuser = DB_USER, string $dbpass = DB_PW): PDO
{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    return $conn;
}

/**
 * @return array[]
 */
function findAll(): array
{
// TODO
}

function remove(int $id): bool
{
// TODO
}

function create(): bool
{
// TODO
}


function findById(int $id): array
{
// TODO
}

function update(??)???
{
    //TODO
}

<?php

function get_roles() {
    global $db;

    $query = 'SELECT * FROM roles ORDER BY name';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}

function get_role_by_id($id) {
    global $db;

    $query = 'SELECT * FROM roles WHERE roles.id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue('id', $id);
    $statement->execute();
    return $statement->fetch();
}
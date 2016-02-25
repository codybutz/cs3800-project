<?php

function get_employees() {
    global $db;

    $query = 'SELECT * FROM employees ORDER BY name';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}

function get_employee_by_id($id) {
    global $db;

    $query = 'SELECT * FROM employees WHERE employees.id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue('id', $id);
    $statement->execute();
    return $statement->fetch();
}
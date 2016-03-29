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

function update_employee_by_id($id, $name, $email, $role_id, $admin, $comments) {
    global $db;

    $query = 'UPDATE employees SET name = :name, email = :email, role_id = :role_id, admin = :admin, comments = :comments WHERE id = :id';

    $statement = $db->prepare($query);
    $statement->bindValue('id', $id);
    $statement->bindValue('name', $name);
    $statement->bindValue('email', $email);
    $statement->bindValue('role_id', $role_id);
    $statement->bindValue('admin', $admin);
    $statement->bindValue('comments', $comments);
    $statement->execute();
}


function insert_employee_by_id($name, $email, $role_id, $admin, $comments) {
    global $db;

    $query = 'INSERT INTO employees (name, email, role_id, admin, comments) 
                    VALUES (:name, :email, :role_id, :admin, :comments)';

    $statement = $db->prepare($query);
    $statement->bindValue('name', $name);
    $statement->bindValue('email', $email);
    $statement->bindValue('role_id', $role_id);
    $statement->bindValue('admin', $admin);
    $statement->bindValue('comments', $comments);
    $statement->execute();

    return $db->lastInsertId();
}
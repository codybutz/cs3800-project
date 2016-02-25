<?php
    $dsn = 'mysql:host=localhost;dbname=employee_db';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>
<?php
    $dsn = 'mysql:host=localhost;dbname=butz';
    $username = 'butz';
    $password = 'privy!basted';

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('./errors/database_error.php');
        exit();
    }
?>
<?php

include_once('database.php');

include('views/header.php');

?>

    <main>
        <h1>Menu</h1>
        <ul>
            <li>
                <a href="/employees">View Employees</a>
            </li>
            <li>
                <a href="/clients">View Clients</a>
            </li>
        </ul>
    </main>

<?php
include('views/footer.php');
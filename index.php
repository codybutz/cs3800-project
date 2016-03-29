<?php

include_once('./models/database.php');

include('views/header.php');

?>

    <main>
        <h1>Menu</h1>
        <ul>
            <li>
                <a href="/~butz/employees">View Employees</a>
            </li>
            <li>
                <a href="/~butz/clients">View Clients</a>
            </li>
        </ul>
    </main>

<?php
include('views/footer.php');
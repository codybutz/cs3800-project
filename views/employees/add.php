<?php include '../views/header.php'; ?>
    <main>

        <h1>Add New Employee</h1>

        <form action="?action=add_employees_submit" method="post">
            <?php include '../views/employees/_form.php'; ?>

            <button type="submit">Add Employee</button>
        </form>
    </main>
<?php include '../views/footer.php'; ?>
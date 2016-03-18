<?php include '../views/header.php'; ?>
    <main>

        <h1>Edit <?php echo $employee['name']; ?></h1>

        <form action="?action=edit_employees_submit" method="post">
            <?php include '../views/employees/_form.php'; ?>

            <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
            <button type="submit">Update Employee</button>
        </form>
    </main>
<?php include '../views/footer.php'; ?>
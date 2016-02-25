<?php include '../views/header.php'; ?>
<main>
    <aside>
        <h1>Employees</h1>
        <nav>
            <ul>
                <?php foreach ($employees as $employee) : ?>
                    <li>
                        <a href="?employee_id=<?php echo $employee['id']; ?>">
                            <?php echo $employee['name']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>
    <section>
        <h1><?php echo $selectedEmployee['name']; ?></h1>

        <p>
            <b>Role: </b> <?php echo $selectedEmployee['role']['name'] ?>
        </p>
    </section>
</main>
<?php include '../views/footer.php'; ?>
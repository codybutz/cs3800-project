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

                    <li style="padding-top: 10px;">
                        <a href="?action=add_employee">
                            Add Employee
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <section>
            <h1><?php echo $selectedEmployee['name']; ?></h1>
            <a href="?action=edit_employee&id=<?php echo $selectedEmployee['id'] ?>">Edit</a>
            <p>
                <b>Email: </b> <?php echo $selectedEmployee['email'] ?>
            </p>
            <p>
                <b>Role: </b> <?php echo $selectedEmployee['role']['name'] ?>
            </p>

            <?php if (!empty($selectedEmployee['comments'])): ?>
                <p>
                    <b>Comments: </b> <br> <?php echo $selectedEmployee['comments'] ?>
                </p>
            <?php endif; ?>
        </section>
    </main>
<?php include '../views/footer.php'; ?>
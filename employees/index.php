<?php
include_once('../models/database.php');

require('../models/employees.php');
require('../models/roles.php');


$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'add_employee':

        $roles = get_roles();

        include('../views/employees/add.php');
        break;

    case 'add_employee_submit':

        $roles = get_roles();


        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $role = filter_input(INPUT_POST, 'role');
        $admin = filter_input(INPUT_POST, 'admin');
        $comments = filter_input(INPUT_POST, 'comments');

        $message = "";

        if(empty($name)) {
            $message .= "Invalid input for the name field.<br/>";
        }
        if(empty($email)) {
            $message .= "Invalid input for the email field.<br/>";
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message .= "Invalid format for the email field.<br/>";
        }
        if(empty($role)) {
            $message .= "Invalid input for the role field.<br/>";
        }

        if(empty($message)) {
            $id = insert_employee_by_id($name, $email, $role, $admin == "yes", $comments);

            $employees = get_employees()->fetchAll();
            $selectedEmployee = get_employee_by_id($id);
            $selectedEmployee['role'] = get_role_by_id($selectedEmployee['role_id']);

            include('../views/employees/list.php');

        } else {
            include('../views/employees/add.php');
        }
        break;

    case 'edit_employee':

        $id = filter_input(INPUT_GET, 'id');

        if(isset($id)) {
            $employee = get_employee_by_id($id);
            $roles = get_roles();

            include('../views/employees/edit.php');
        } else {
            die("Employee not found.");
        }
        break;

    case 'edit_employees_submit':

        $roles = get_roles();

        $id = filter_input(INPUT_POST, 'id');

        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $role = filter_input(INPUT_POST, 'role');
        $admin = filter_input(INPUT_POST, 'admin');
        $comments = filter_input(INPUT_POST, 'comments');

        $message = "";

        if(empty($name)) {
            $message .= "Invalid input for the name field.<br/>";
        }
        if(empty($email)) {
            $message .= "Invalid input for the email field.<br/>";
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message .= "Invalid format for the email field.<br/>";
        }
        if(empty($role)) {
            $message .= "Invalid input for the role field.<br/>";
        }

        if(empty($message)) {
            // Success!
            // Save employee
            update_employee_by_id($id, $name, $email, $role, $admin == "yes", $comments);

            $employees = get_employees()->fetchAll();
            $selectedEmployee = get_employee_by_id($id);
            $selectedEmployee['role'] = get_role_by_id($selectedEmployee['role_id']);

            include('../views/employees/list.php');

        } else {
            $employee = get_employee_by_id($id);

            include('../views/employees/edit.php');
        }

        break;
    case 'list_employees':
    default:
        $employees = get_employees()->fetchAll();

        $employee_id = filter_input(INPUT_GET, 'employee_id', FILTER_VALIDATE_INT);
        if ($employee_id == NULL || $employee_id == FALSE) {
            $employee_id = $employees[0]['id'];
        }

        $selectedEmployee = get_employee_by_id($employee_id);
        $selectedEmployee['role'] = get_role_by_id($selectedEmployee['role_id']);

        include('../views/employees/list.php');
        break;
}


<?php
include_once('../models/database.php');

require('../models/employees.php');
require('../models/roles.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_employees';
    }
}

if($action == 'list_employees') {
    $employees = get_employees()->fetchAll();

    $employee_id = filter_input(INPUT_GET, 'employee_id', FILTER_VALIDATE_INT);
    if ($employee_id == NULL || $employee_id == FALSE) {
        $employee_id = $employees[0]['id'];
    }

    $selectedEmployee = get_employee_by_id($employee_id);
    $selectedEmployee['role'] = get_role_by_id($selectedEmployee['role_id']);

    include('../views/employees/list.php');
}


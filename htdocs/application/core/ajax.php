<?php
include_once '../controllers/controller_department.php';
$action = $_POST['action'];
$item_id = $_POST['item_id'] ?? 0;
$class =  new Controller_Department();
switch ($action){
    case 'edit':
        $class->edit($item_id);
        break;
    case 'delete':
        break;
}
$class->edit($item_id);

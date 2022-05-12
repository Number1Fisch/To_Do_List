
<?php
require('model/database.php');


$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
$year = filter_input(INPUT_POST, 'year', FILTER_UNSAFE_RAW);
$model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
$price = filter_input(INPUT_POST, 'price', FILTER_UNSAFE_RAW);

$sort = filter_input(INPUT_POST, 'sort', FILTER_UNSAFE_RAW);
if(!$sort){
    $sort = filter_input(INPUT_GET, 'sort', FILTER_UNSAFE_RAW);
}


$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if(!$type_id){
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
}

$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if(!$class_id){
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
}

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if(!$make_id){
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
}







$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if(!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'list_vehicles_by_make';
    }
}

switch ($action) {
    case "makes":
        $makes = get_makes();
        include('view/admin/makes_list.php');
        break;
    case "customer":
        include("view/index.php");
        break;
    default:
        $types = get_types();
        $classes = get_classes();
        $makes = get_makes();
        $vehicles = get_vehicles($make_id,$class_id,$type_id,$sort);
        include('view/admin/admin_vehicle_list.php');
}

?>

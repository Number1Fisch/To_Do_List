
<?php
require('model/database.php');
require('model/vehicle.php');
require('model/make.php');
require('model/class.php');
require('model/type.php');

$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_UNSAFE_RAW);
$year = filter_input(INPUT_POST, 'year', FILTER_UNSAFE_RAW);
$price = filter_input(INPUT_POST, 'price', FILTER_UNSAFE_RAW);

$new_model = filter_input(INPUT_POST, 'new_model', FILTER_UNSAFE_RAW);
$new_year = filter_input(INPUT_POST, 'new_year', FILTER_VALIDATE_INT);
$new_price = filter_input(INPUT_POST, 'new_price', FILTER_VALIDATE_INT);
$new_type = filter_input(INPUT_POST, 'new_type', FILTER_UNSAFE_RAW);
$new_class = filter_input(INPUT_POST, 'new_class', FILTER_UNSAFE_RAW);
$new_make = filter_input(INPUT_POST, 'new_make', FILTER_UNSAFE_RAW);

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
    case "add_class":
        add_class($new_class);
        $action = "classes";
    case "delete_class":
        delete_class($class_id);
    case "classes":
        $classes = get_classes();
        include('view/admin/classes_list.php');
        break;
    case "add_type":
        add_type($new_type);
        $action = "types";
    case "delete_type":
        delete_type($type_id);
    case "types":
        $types = get_types();
        include('view/admin/types_list.php');
        break;
    case "add_make":
        add_make($new_make);
        $action = "makes";
    case "delete_make":
        delete_make($make_id);
    case "makes":
        $makes = get_makes();
        include('view/admin/makes_list.php');
        break;
    case "add_vehicle":
        add_vehicle($new_year, $new_model, $new_price, $new_type, $new_class, $new_make);
        $action = "admin";
        break;
    case "delete_vehicle":
        delete_vehicle($vehicle_id);
    case "admin":
        include('view/admin/admin_index.php');
        break;
    default:
        $types = get_types();
        $classes = get_classes();
        $makes = get_makes();
        $vehicles = get_vehicles($make_id,$class_id,$type_id,$sort);
        include('view/vehicle_list.php');
}

?>

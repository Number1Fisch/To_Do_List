
<?php
require('model/database.php');
require('model/items.php');
require('model/category.php');

$item_num = filter_input(INPUT_POST, 'item_num', FILTER_VALIDATE_INT);
$description = filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW);
$title = filter_input(INPUT_POST, 'title', FILTER_UNSAFE_RAW);

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
if(!$category_id) {
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
}
$category_name = filter_input(INPUT_POST, 'category_name', FILTER_UNSAFE_RAW);
if(!$category_name) {
    $category_name = filter_input(INPUT_GET, 'category_name', FILTER_UNSAFE_RAW);
}



$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if(!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = 'list_todos';
    }
}

switch ($action) {
    case "list_categories":
        $categories = get_categories();
        include('view/category_list.php');
        break;
    case "add_category":
        if($category_name){
        add_category($category_name);
        } else{
            $error = "Invalid category name. Check and try again.";
            include('view/error.php');
        }
        header("Location: .?action=list_categories");
        break;
    case "add_todo":
        if($category_id && $title && $description){
            add_item($category_id, $title, $description);
            header("Location: .?category_id=$category_id");
        } else {
            $error = "Invalid todo data. Check and try again.";
            include('view/error.php');
            exit();
        }
    case "delete_category":
        if($category_id){
            try{
                delete_category($category_id);
            }catch (PDOException $e){
                $error = "Cannot delete a category if items exist in the category.";
                include('view/error.php');
                exit();
            }
            header("Location: .?action=list_categories");
        }
        break;
    case "delete_todo":
        if($item_num){
            delete_item($item_num);
            header("Location: .?category_id=$category_id");
        } else {
            $error = "Missing or incorrect Item Num.";
        }

    default:
        $category_name = get_category_name($category_id);
        $categories = get_categories();
        $todos = get_items_by_category($category_id);
        include('view/to_do_list.php');
}

?>

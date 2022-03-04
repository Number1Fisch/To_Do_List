<?php
function get_items_by_category($category_id){
    global $conn;
    if($category_id){
        $query = 'SELECT todo.Title, todo.Description, todo.ItemNum FROM todoitems todo
                    Left JOIN categories on todo.categoryID = categories.categoryID
                    WHERE todo.categoryID = :category_id ORDER BY categories.categoryID';
    }
    else{
        $query = 'SELECT todo.Title, todo.Description, todo.ItemNum FROM todoitems todo
        Left JOIN categories on todo.categoryID = categories.categoryID ORDER BY categories.categoryID';
    }
    $statement = $conn->prepare($query);
    if($category_id){
        $statement->bindValue(':category_id', $category_id);
    }
    $statement->execute();
    $todo = $statement->fetchAll();
    $statement->closeCursor();
    return $todo;
}

function delete_item($item_num){
    global $conn;
    $query = 'DELETE FROM todoitems WHERE ItemNum = :item_num';
    $statement = $conn->prepare($query);
    $statement->bindValue(':item_num', $item_num);
    $statement->execute();
    $statement->closeCursor();
}

function add_item($category_id, $title, $description){
    global $conn;
    $query = 'INSERT INTO todoitems (Title, Description, categoryID) VALUES (:title, :descr, :category_id)';
    $statement = $conn->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':descr', $description);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}

?>
<?php

function get_categories(){
    global $conn;
    $query = 'SELECT * FROM categories ORDER BY categoryID';
    $statement = $conn->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}

function get_category_name($category_id){
    global $conn;
    if(!$category_id) {
        return "All Categories";
    }
    $query = 'SELECT * FROM categories WHERE categoryID = :category_id';
    $statement = $conn->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    $category_name = $category['categoryName'];
    return $category;
}

function delete_category($category_id){
    global $conn;
    $query = 'DELETE FROM categories WHERE categoryID = :category_id';
    $statement = $conn->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_category($category_name){
    global $conn;
    $query = 'INSERT INTO categories (categoryName) VALUES (:category_name)';
    $statement = $conn->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->execute();
    $statement->closeCursor();
}



?>
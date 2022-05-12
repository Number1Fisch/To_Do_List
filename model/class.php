<?php

function get_classes(){
    global $conn;
    $query = 'SELECT * FROM classes ORDER BY ID';
    $statement = $conn->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}



function delete_class($class_id){
    global $conn;
    $query = 'DELETE FROM classes WHERE ID = :class_id';
    $statement = $conn->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_class($new_class){
    global $conn;
    $query = 'INSERT INTO classes (Class) VALUES (:class_name)';
    $statement = $conn->prepare($query);
    $statement->bindValue(':class_name', $new_class);
    $statement->execute();
    $statement->closeCursor();
}



?>
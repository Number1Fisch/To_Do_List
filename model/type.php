<?php

function get_types(){
    global $conn;
    $query = 'SELECT * FROM types ORDER BY ID';
    $statement = $conn->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}


function delete_type($type_id){
    global $conn;
    $query = 'DELETE FROM types WHERE ID = :type_id';
    $statement = $conn->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_type($new_type){
    global $conn;
    $query = 'INSERT INTO types (Type) VALUES (:type_name)';
    $statement = $conn->prepare($query);
    $statement->bindValue(':type_name', $new_type);
    $statement->execute();
    $statement->closeCursor();
}



?>
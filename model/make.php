<?php

function get_makes(){
    global $conn;
    $query = 'SELECT * FROM makes ORDER BY ID';
    $statement = $conn->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function delete_make($make_id){
    global $conn;
    $query = 'DELETE FROM makes WHERE ID = :make_id';
    $statement = $conn->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_make($new_make){
    global $conn;
    $query = 'INSERT INTO makes (Make) VALUES (:make_name)';
    $statement = $conn->prepare($query);
    $statement->bindValue(':make_name', $new_make);
    $statement->execute();
    $statement->closeCursor();
}



?>
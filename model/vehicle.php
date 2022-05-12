<?php
function get_vehicles($make_id,$class_id,$type_id,$sort){
    global $conn;
    $conditions = array();
    $parameters = array();
    if(!$sort){
        $sort = "price";
    }

    $where = "";
   if($make_id){
        $conditions[] = " makes.ID = :make_id";
        $parameters[":make_id"] = $make_id;
    }
    if($type_id){
        $conditions[] = " types.ID = :type_id";
        $parameters[":type_id"] = $type_id;
                    
    }
    if($class_id){
        $conditions[] = " classes.ID = :class_id";
        $parameters[":class_id"] = $class_id;
    }

    if(count($conditions) > 0){
        $where = implode(' AND ', $conditions);
    }
   
    $query = 'SELECT * FROM vehicles vhc
    LEFT JOIN makes ON vhc.make_id = makes.ID 
    LEFT JOIN types on vhc.type_id = types.ID 
    LEFT JOIN classes on vhc.class_id = classes.ID' . 
    ($where != "" ? " WHERE $where" : "") . 
    " ORDER BY vhc.$sort DESC";

    $statement = $conn->prepare($query);
    $statement->execute($parameters);
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function delete_vehicle($vehicle_id){
    global $conn;
    $query = 'DELETE FROM vehicles WHERE ID = :vehicle_id';
    $statement = $conn->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($new_year, $new_model, $new_price, $new_type, $new_class, $new_make){
    global $conn;
    $query = 'INSERT INTO vehicles (year, model, price, type_id, class_id, make_id) 
                VALUES (:year, :model, :price, :t_id, :c_id, :m_id)';
    $statement = $conn->prepare($query);
    $statement->bindValue(':year', $new_year);
    $statement->bindValue(':model', $new_model);
    $statement->bindValue(':price', $new_price);
    $statement->bindValue(':t_id', $new_type);
    $statement->bindValue(':c_id', $new_class);
    $statement->bindValue(':m_id', $new_make);
    $statement->execute();
    $statement->closeCursor();
}

?>
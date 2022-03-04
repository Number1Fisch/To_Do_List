<?php
$dsn = 'mysql: host=localhost; dbname=todolist';
$username = 'root';
try{
$conn=new PDO($dsn, $username);
}
    catch (PDOException $e){
        $error = "Failed to connect to MySQL: ";
        $error .= $e->getMessage();
        include('view/error.php');
        exit();
    }
?>
    
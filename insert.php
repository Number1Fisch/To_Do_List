<!DOCTYPE html>
<html>
<head>
	<title>Entry Confirmation</title>
</head>

<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "todolist");
    
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    if(isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem'])){
        $delete = $_POST['deleteItem'];
        $sql = "DELETE FROM todoitems where ItemNum = '$delete'"; 
    }
    else{
        $title = $_POST['title'];
        $description = $_POST['description'];
        
        $sql = "INSERT INTO todoitems (Title, Description) VALUES ('$title','$description')";
    }
        
        if(mysqli_query($conn, $sql)){
            echo "<h3>All Good</h3>";
        } else{
            echo "ERROR: Request not Submitted\n $sql. "
                . mysqli_error($conn);
        }
    
        
        mysqli_close($conn);
        header("location: index.php");
        ?>
</body>

</html>

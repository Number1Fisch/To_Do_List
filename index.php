<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
<form action="insert.php" method="POST">
    <?php
    $con=mysqli_connect("localhost", "root", "", "todolist");
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $result = mysqli_query($con,"SELECT * FROM todoitems");
   if(!$row = mysqli_fetch_array($result)){
       echo "<h1>No Items in List</h1><br>";   
}
else{
    echo '<table>
    <tr ><div id="title">
    To Do List
    </div>
    </tr>';
    do{
        echo "<tr>";
        echo "<td><h2>" . $row['Title'] . "</h2>\n<h3>". $row['Description'] . 
        '</h3></td>';
        echo '<td id="delete"><button type="submit" text = "Check Off" name="deleteItem" value="'.$row['ItemNum'].'" />Delete</button>';
        echo "</tr>";
        }
    while($row = mysqli_fetch_array($result));
    
    echo "</table>";
    mysqli_close($con);
}
    ?>
    </form>
    <form action="insert.php" method="POST">
    <h2>Add Item</h2>     
    Title:<br><input type="text" name = "title" id="Title" /><br/>
    Dscription:<br> <input type="text" name = "description" id="Description" /><br/>
        <input type="submit"/>
</form>
</body>
</html>
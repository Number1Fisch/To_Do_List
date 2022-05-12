<?php include('header.php')?>
<section>
    <form action="insert.php" method="POST">
    <?php
   
    $result = mysqli_query($conn,"SELECT * FROM todoitems");
   if(!$row = mysqli_fetch_array($result)){?>
       <h1>No Items in List</h1><br>  
<?php } 
else{ ?>
    <table>
    <tr ><div id="listTitle">
    To Do List
    </div>
    </tr>
    <?php do{ ?>
        <tr>
        <td><h2><?=$row['Title']?></h2>
        <br>
        <h3><?=$row['Description']?>
        </h3></td>
        <td id="delete"><button type="submit" text = "Check Off" name="deleteItem" value=<?=$row['ItemNum']?>>Delete</button>
        </tr>
        <?php } 
    while($row = mysqli_fetch_array($result));?>
    
    </table>
   <?php 
    mysqli_close($conn);
}
    ?>
    </form>
</section>
<section>
    <form action="insert.php" method="POST">
        <input type="hidden" name="action" value = "insert">
        <h2>Add Item</h2>     
        <label for="title">Title:</label>
        <input type="text" name = "title" id="title" required>
        <label for="description">Dscription:</label>
        <input type="text" name = "description" id="description" required>
        <button>Submit</button>
    </form>
</section>
<?php include('footer.php')?>

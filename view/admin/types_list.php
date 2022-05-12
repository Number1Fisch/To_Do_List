<?php include ('view/header.php')?>

   
        <h1>Available Vehicles</h1>
        <table class="list_row list_header">
            <tr>
        <th>Types</th>

            </tr>
        <?php if($types) {
            foreach ($types as $type) :?>
            <tr>
                <td><?= $type['Type'] ?></td>

                <td>
                    <form action="." method = "post">
                        <input type="hidden" name="action" value="delete_type">
                        <input type="hidden" name= 'type_id' value="<?= $type['ID'] ?>">
                        <button class="remove-button">❌</button>                            
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </table>
            <?php } else {?>
                <br>
                    <p>No Types Exist</p>
                <?php } ?>
                <br>
            <form action="." method="POST">
                <input type="hidden" name="action" value = "add_type">
                <h2>Add Type</h2>     
                <label for="new_type">Type Name:</label>
                <input type="text" name = "new_type" id="new_type" required>
                <button>Submit</button>
            </form>
<p><a href=".?action=admin">View/Edit Vehicles</a></p>
<p><a href=".?action=makes">Edit/Add Makes</a></p>
<?php include('view/footer.php') ?>
<?php include ('view/header.php')?>

   
        <h1>Available Vehicles</h1>
        <table class="list_row list_header">
            <tr>
        <th>Makes</th>

            </tr>
        <?php if($makes) {
            foreach ($makes as $make) :?>
            <tr>
                <td><?= $make['Make'] ?></td>

                <td>
                    <form action="." method = "post">
                        <input type="hidden" name="action" value="delete_make">
                        <input type="hidden" name= 'make_id' value="<?= $make['ID'] ?>">
                        <button class="remove-button">❌</button>                            
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </table>
            <?php } else {?>
                <br>
                    <p>No Makes Exist</p>
                <?php } ?>
                <br>
            <form action="." method="POST">
                <input type="hidden" name="action" value = "add_make">
                <h2>Add Make</h2>     
                <label for="new_make">Make Name:</label>
                <input type="text" name = "new_make" id="new_make" required>
                <button>Submit</button>
            </form>
<p><a href=".?action=admin">View/Edit Vehicles</a></p>
<?php include('view/footer.php') ?>
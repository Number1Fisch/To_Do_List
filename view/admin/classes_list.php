<?php include ('view/header.php')?>

   
        <h1>Available Vehicles</h1>
        <table class="list_row list_header">
            <tr>
        <th>Classes</th>

            </tr>
        <?php if($classes) {
            foreach ($classes as $class) :?>
            <tr>
                <td><?= $class['Class'] ?></td>

                <td>
                    <form action="." method = "post">
                        <input type="hidden" name="action" value="delete_class">
                        <input type="hidden" name= 'class_id' value="<?= $class['ID'] ?>">
                        <button class="remove-button">❌</button>                            
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </table>
            <?php } else {?>
                <br>
                    <p>No Classes Exist</p>
                <?php } ?>
                <br>
            <section>
                <form action="." method="POST">
                    <input type="hidden" name="action" value = "add_class">
                    <h2>Add Class</h2>     
                    <label for="new_class">Class Name:</label>
                    <input type="text" name = "new_class" id="new_class" required>
                    <button>Submit</button>
                </form>
            </section>

<p><a href=".?action=admin">View/Edit Vehicles</a></p>
<p><a href=".?action=makes">Edit/Add Makes</a></p>
<p><a href=".?action=types">Edit/Add Types</a></p>

<?php include('view/footer.php') ?>
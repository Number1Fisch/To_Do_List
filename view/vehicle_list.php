<?php include ('view/header.php')?>

   
        <h1>Available Vehicles</h1>
        <form action="." method="GET" >
            <input type="hidden" name="action" value="list_vehicles">
            <select name="make_id" onchange=this.form.submit() required>
                <option value="0">View All Makes</option>
                <?php foreach ($makes as $make) :?>
                    <?php if ($make_id == $make['ID']) { ?>
                        <option value="<?= $make['ID'] ?>"selected>
                        <?php } else { ?>
                        <option value="<?=$make['ID']?>">
                        <?php } ?>
                        <?=$make['Make'] ?>
                        </option>
                    <?php endforeach; ?>
            </select>
            <br>
            <input type="hidden" name="action" value="list_vehicles">
            <select name="type_id" onchange=this.form.submit() required>
                <option value="0">View All Types</option>
                <?php foreach ($types as $type) :?>
                    <?php if ($type_id == $type['ID']) { ?>
                        <option value="<?= $type['ID'] ?>"selected>
                        <?php } else { ?>
                        <option value="<?=$type['ID']?>">
                        <?php } ?>
                        <?=$type['Type'] ?>
                        </option>
                    <?php endforeach; ?>
            </select>
            <br>
            <input type="hidden" name="action" value="list_vehicles">
            <select name="class_id" onchange=this.form.submit() required>
                <option value="0">View All Classes</option>
                <?php foreach ($classes as $class) :?>
                    <?php if ($class_id == $class['ID']) { ?>
                        <option value="<?= $class['ID'] ?>"selected>
                        <?php } else { ?>
                        <option value="<?=$class['ID']?>">
                        <?php } ?>
                        <?=$class['Class'] ?>
                        </option>
                    <?php endforeach; ?>
            </select>
            <br>
                <?php if($sort == "price"){ ?> 
                    <input type="radio" value=<?=$sort = "price"?> onchange=this.form.submit() checked>Price</input>
                    <input type="radio" value=<?=$sort = "year"?> onchange=this.form.submit()>Year</input>
                <?php } else{ ?>
                    <input type="radio" value=<?=$sort = "price"?> onchange=this.form.submit()>Price</input>
                    <input type="radio" value=<?=$sort = "year"?> onchange=this.form.submit() checked>Year</input>
                <?php } ?>

            </select>
        </form>
    <table class="list_row list_header">
        <tr>
         <th>Year</th>
         <th>Model</th>
         <th>Price</th>
         <th>Type</th>
         <th>Class</th>
         <th>Make</th>

         </tr>
        <?php if($vehicles) {
            foreach ($vehicles as $vehicle) :?>
            <tr>
                <td><?= $vehicle['year'] ?></td>
                <td><?= $vehicle['model']?></td>
                <td><?= $vehicle['price'] ?></td>
                <td><?= $vehicle['Type'] ?></td>
                <td><?= $vehicle['Class'] ?></td>
                <td><?= $vehicle['Make'] ?></td>
            </tr>
            <?php endforeach; ?>
            </table>
            <?php } else {?>
                <br>
                    <p>No Vehicles Exist</p>
                <?php } ?>
                <br>
<p><a href=".?action=admin">View/Edit Vehicles</a></p>
<?php include('view/footer.php') ?>
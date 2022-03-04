<?php include ('view/header.php')?>

<section id="list" class="list">
    <header class="lost_row list_header">
        <h1>To Do Items</h1>
        <form action="." method="GET" id="list_header_select" class="list_header_select">
            <input type="hidden" name="action" value="list_todo">
            <select name="category_id" required>
                <option value="0">View All</option>
                <?php foreach ($categories as $category) :?>
                    <?php if ($category_id == $category['categoryID']) { ?>
                        <option value="<?= $category['categoryID'] ?>"selected>
                        <?php } else { ?>
                        <option value="<?=$category['categoryID']?>">
                        <?php } ?>
                        <?=$category['categoryName'] ?>
                        </option>
                    <?php endforeach; ?>
            </select>
            <button class="add-button bold">GO</button>
            </form>
            </header>
        <?php if($todos) {
            foreach ($todos as $todo) :?>
                <div class="list_row">
                    <div class="list_todo">
                        <p class="bold"><?= $todo['Title'] ?></p>
                        <p><?= $todo['Description']?></p>
                    </div>
                    <div class="list_removeTodo">
                        <form action="." method = "post">
                            <input type="hidden" name="action" value="delete_todo">
                            <input type="hidden" name="item_num" value="<?= $todo['ItemNum'] ?>">
                            <button class="remove-button">❌</button>                            
                        </form>
                    </div>
            </div>
            <?php endforeach; ?>
            <?php } else {?>
                <br>
                <?php if($item_num) {?>}
                    <p>No Todo items Exist</p>
                <?php } ?>
                <br>
            <?php }?>
</section>

<section id="add" class="add">
    <h2>Add To Do Item</h2>
    <form action="." method="post" id="add_form" class="add_form">
        <input type="hidden" name="action" value="add_todo">
        <div class="add_inputs">
            <label>Category:</label>
            <select name="category_id" required>
                <option value="">Please select</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['categoryID'];?>">
                    <?= $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
                </select>
                <br><br>
                <label>Title</label>
                <br>
                <input type="text" name="title" maxlength="120" placeholder="Title" required> 
                <br><br>
                <label>Description</label>
                <br>
                <input type="text" name="description" maxlength="120" placeholder="Description" required> 
        </div>
        <br>
        <div class="add_addTodo">
            <button class= "add-button bold">Add</button>
        </div>
    </form>
</section>
<p><a href=".?action=list_categories">View/Edit Category</a></p>
<?php include('view/footer.php') ?>
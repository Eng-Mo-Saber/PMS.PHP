<?php require_once('inc/header.php'); ?>
<?php require_once('inc/nav.php'); ?>



<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center">Add Product</h2>
            <?php
            if (isset($_SESSION['errors'])) :
                foreach ($_SESSION['errors'] as $error) : ?>
                    <div class="alter alter-danger text-center">
                        <?= $error;  ?>
                    </div>
            <?php
                endforeach;
                unset($_SESSION['errors']);
            endif;
            ?>
            <form action="handelar/handelAddProduct.php" method="POST" class="border p-3">
                <div class="from group p-2 my-1">
                    <label for="id">Id Product</label>
                        <input type="number" name="id" class="from control" id="id">
                </div>
                <div class="from group p-2 my-1">
                    <label for="name"> Name Product</label>
                        <input type="name" name="name" class="from control" id="name">
                </div>
                <div class="from group p-2 my-1">
                    <label for="salary">Salary</label>
                        <input type="number" name="salary" class="from control" id="salary">
                </div>
                <div class="from group p-2 my-1">
                    <input type="submit" value="add Product" class="from control">
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once('inc/footer.php'); ?>
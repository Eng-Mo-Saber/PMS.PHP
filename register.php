<?php require_once('inc/header.php'); ?>
<?php require_once('inc/nav.php'); ?>



<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center">Register</h2>
            <?php
            if (isset($_SESSION['errors'])) :
                foreach ($_SESSION['errors'] as $error) : ?>
                    <div class="alter-danger text-center">
                        <?= $error;  ?>
                    </div>
            <?php
                endforeach;
                unset($_SESSION['errors']);
            endif;
            ?>
            <form action="handelar/landelRegister.php" method="POST" class="border p-3">
                <div class="from group p-2 my-1">
                    <label for="name">Name</label>
                        <input type="text" name="name" class="from control" id="name">
                </div>
                <div class="from group p-2 my-1">
                    <label for="email">Email</label>
                        <input type="email" name="email" class="from control" id="email">
                </div>
                <div class="from group p-2 my-1">
                    <label for="password">Password</label>
                        <input type="password" name="password" class="from control" id="password">
                </div>
                <div class="from group p-2 my-1">
                    <input type="submit" value="Register" class="from control">
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once('inc/footer.php'); ?>
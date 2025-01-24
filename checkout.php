<?php require_once('inc/header.php'); ?>
<?php require_once('inc/nav.php'); ?>


<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-4">

                <div class="border p-2">
                    <?php
                    
                    $totalSalary = $_SESSION['totalSalary'];
                    $file = fopen("data/filecart.csv", 'r');
                    while ($row = fgets($file)) {
                        $res = explode(',', $row);
                        $id = $res[0];
                        $name = $res[1];
                        $salary = $res[2];
                    ?>
                        <div class="products">
                            <ul class="list-unstyled">
                                <li class="border p-2 my-1"> <?= $name; ?> -
                                    <span class="text-success mx-2 mr-auto bold"><?php echo 1 . 'x' . $salary; ?></span>
                                </li>
                        </div>
                    <?php } ?>
                    <h3>Total : <?= $totalSalary; ?> $</h3>
                </div>
            </div>
            <div class="col-8">
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

                <form action="handelar/handelchackout.php" method="POST" class="form border my-2 p-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="phone" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Notes</label>
                            <input type="text" name="notes" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>
<?php require_once('inc/header.php'); ?>
<?php require_once('inc/nav.php'); ?>


<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <?php if (isset($_SESSION['success'])) {
                        echo $_SESSION['success'];
                    } ?>
                    <?php
                    $cunt_cart = 0;
                    $totalSalary = 0;
                    // $quantity = $_SESSION['quantity'];
                    $file = fopen("data/filecart.csv", 'r');
                    while ($row = fgets($file)) {
                        $res = explode(',', $row);
                        $id = $res[0];
                        $name = $res[1];
                        $salary = $res[2];
                        $cunt_cart += 1;
                    ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $id ?></th>
                                <td><?php echo $name ?></td>
                                <td><?php echo  '$', $salary ?></td>
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
                                <td>
                                    <input type="number" value="<?php echo 1 ?>" name="quantity">
                                </td>
                                <td><?php echo '$' . $salary * 1;
                                    $_SESSION['totalSalary'] = $totalSalary +=  $salary * 1;     ?></td>
                                <td>
                                    <a href="handelar/handelDelete.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <tr>
                            <?php  }
                        $_SESSION['cunt_cart'] = $cunt_cart;
                        fclose($file);
                            ?>
                            <td colspan="2">
                                Total Price
                            </td>
                            <td colspan="3">
                                <h3><?php echo '$' . $totalSalary;  ?></h3>
                            </td>
                            <td>
                                <a href="checkout.php" class="btn btn-primary">Checkout</a>
                            </td>
                            </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>
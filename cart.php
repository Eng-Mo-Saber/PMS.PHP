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
                    <?php
                    $totalSalary =0 ;
                    $quantity = $_SESSION['quantity'];
                    $idc = $_SESSION['idc'];
                    $file = fopen("data/filecart.csv", 'r');
                    while ($row = fgets($file)) {
                        $res = explode(',', $row);
                        $id = $res[0];
                        $name = $res[1];
                        $salary = $res[2];

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
                                <form action="handelar/handelCheck.php" method="POST">
                                    <td>
                                        <input type="number" value="<?php echo $quantity ?>" name="quantity">
                                        <button name="check">check</button>
                                    </td>

                                </form>
                                <td><?php echo '$'. $salary * $quantity ;
                                            $totalSalary +=  $salary * $quantity ;     ?></td>
                                <td>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <tr>
                            <?php } ?>
                            <td colspan="2">
                                Total Price
                            </td>
                            <td colspan="3">
                                <h3><?php echo '$'.$totalSalary ;  ?></h3>
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
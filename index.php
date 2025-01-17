<?php require_once('inc/header.php'); ?>
<?php require_once('inc/nav.php'); ?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php $file = fopen('data/filePro.csv', 'r');
            while ($row = fgets($file)) {

                $res = explode(',', $row);

                $id = $res[0];
                $name = $res[1];
                $salary = $res[2];
                $product = [$name, $salary];
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['salary'] = $salary;



            ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $res[1];
                                                        ?></h5>
                                <!-- Product price-->
                                <?php echo $res[2]  ?>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="handelar/addCart.php?id=<?php echo $res[0]; ?>">Add to cart</a></div>
                        </div>
                    </div>
                </div>
            <?php }
            fclose($file);
            ?>

        </div>
    </div>
</section>
<?php require_once('inc/footer.php'); ?>
<?php require_once('header.php'); ?>

<?php
if (!isset($_REQUEST['id'])) {
    header('location: index.php');
    exit;
} else {
    // Check the id is valid or not
    $statement = $pdo->prepare("SELECT * FROM tbl_vendor WHERE id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($total == 0) {
        header('location: index.php');
        exit;
    }
}

foreach ($result as $row) {
    $name = $row['name'];
    $Sname = $row['shopname'];
    $photo = $row['photo'];
    $address = $row['address'];
}

?>

<div class="row page">
    <div>
        <div class="row">


            <div class="col-12 col-md-3 pading ml">
                <div class="setleft">
                    <img src="assets/uploads/<?php echo $row['photo']; ?>" alt=""
                        style="border-radius: 20px; width: 100%;">
                </div>
            </div>
            <div class="col-12 col-md-6 ml">
                <div class="row">
                    <div class="col-8">
                        <h1 class="row2">
                            <?php echo $row['shopname']; ?>
                        </h1>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary row3">Follow</button>
                    </div>
                </div>
                <div class="row marginsettop">
                    <h4 class="mt2">Name:-
                        <?php echo $row['name']; ?>
                    </h4>
                    <h4 class="mt2">Address:-
                        <?php echo $row['address']; ?>
                    </h4>
                </div>
            </div>
        </div>



        <div class="product pt_70 pb_70">
            <h1 class="ml mt2">Product</h1>
            <br>
            <div class="container">


                <div class="row">
                    <div class="col-md-12">

                        <div class="product-carousel">

                            <?php

                            $sel_id = $_REQUEST['id'];

                            $q4 = "SELECT * FROM `tbl_product` WHERE `seller_id` = '" . $sel_id . "'";
                            $statement2 = $coon->query($q4);
                            $n2 = $statement2->num_rows;


                            for ($i = 0; $i < $n2; $i++) {
                                $row5 = $statement2->fetch_assoc();

                                ?>


                                <div class="item">
                                    <div class="thumb">
                                        <div class="photo"
                                            style="background-image:url(assets/uploads/<?php echo $row5['p_featured_photo']; ?>);">
                                        </div>
                                        <div class="overlay"></div>
                                    </div>

                                    <div class="text">
                                        <h3><a href="product.php?id=<?php echo $row5['p_id']; ?>"><?php echo $row5['p_name']; ?></a>
                                        </h3>
                                        <h4>
                                            $
                                            <?php echo $row5['p_current_price']; ?>
                                            <?php if ($row5['p_old_price'] != ''): ?>
                                                <del>
                                                    $
                                                    <?php echo $row5['p_old_price']; ?>
                                                </del>
                                            <?php endif; ?>
                                        </h4>


                                        <?php if ($row5['p_qty'] == 0): ?>
                                            <div class="out-of-stock">
                                                <div class="inner">
                                                    Out Of Stock
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <p><a href="product.php?id=<?php echo $row5['p_id']; ?>"><i
                                                        class="fa fa-shopping-cart"></i>
                                                    Add to Cart</a></p>
                                        <?php endif; ?>

                                    </div>

                                </div>


                                <?php

                            }

                            ?>

                        </div>

                    </div>
                </div>
           
            </div>
        </div>








    </div>


</div>

<?php require_once('footer.php'); ?>
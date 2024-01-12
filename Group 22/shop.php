<?php require_once('header.php'); ?>


<div class="page-banner" style="background-image: url(assets/uploads/banner_cart.jpg);">
    <div class="inner">
        <h1>
            Shops
        </h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <div class="product pt_70 pb_70" id="shop">
                    <div class="container">
                    
                        <div class="row">
                            <div class="col-md-12">

                                <div class="product-carousel">

                                    <?php
                                    $q4 = "SELECT * FROM `tbl_vendor`";
                                    $statement2 = $coon->query($q4);
                                    $n2 = $statement2->num_rows;
                                    for ($i = 0; $i < $n2; $i++) {
                                        $row5 = $statement2->fetch_assoc();
                                        ?>


                                        <div class="item" style="border: none;">
                                            <div class="thumb">
                                                <div class="photo"
                                                    style="background-image:url(assets/uploads/<?php echo $row5['photo']; ?>);border-radius: 500px;">
                                                </div>
                                                <div class="overlay"></div>
                                            </div>
                                            <div class="text" style="background-color: white;">
                                                <h3><a style="font-size: 22px;"
                                                        href="product.php?id=<?php echo $row5['id']; ?>"><?php echo $row5['shopname']; ?></a>
                                                </h3>


                                                <p><a href="vendorhome.php?id=<?php echo $row5['id']; ?>">
                                                        Visit Shop</a></p>

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
    </div>
</div>

<?php require_once('footer.php'); ?>
<?php require_once('header.php'); ?>

<section class="content-header">
	<h1>Dashboard</h1>
</section>

<?php
$ven_id =$_SESSION['vendor']['id'];

$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE seller_id ='".$ven_id."'");
$statement->execute();
$total_product = $statement->rowCount();
?>

<section class="content">
<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $total_product; ?></h3>

                  <p>Products</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-cart"></i>
                </div>
                
              </div>
            </div>
            <!-- ./col -->

				</div>
			  </div>


		  </div>
		  
</section>

<?php require_once('footer.php'); ?>
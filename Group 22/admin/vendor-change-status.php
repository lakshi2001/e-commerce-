<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_vendor WHERE id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	} else {
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result as $row) {
			$cust_status = $row['status'];
		}
	}
}
?>

<?php
if($cust_status == 0) {$final = "Active";} else {$final = 0;}
$statement = $pdo->prepare("UPDATE tbl_vendor SET `status`=? WHERE id=?");
$statement->execute(array($final,$_REQUEST['id']));

header('location: vendor.php');
?>
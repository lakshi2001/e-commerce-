<?php require_once('header.php'); ?>

<?php

// Check if the product is valid or not
if( !isset($_REQUEST['id']) ) {
    header('location: favourite.php');
    exit;
}

$i=0;
foreach($_SESSION['fa_p_id'] as $key => $value) {
    $i++;
    $arr_cart_p_id[$i] = $value;
}

$i=0;
foreach($_SESSION['fa_size_id'] as $key => $value) {
    $i++;
    $arr_cart_size_id[$i] = $value;
}

$i=0;
foreach($_SESSION['fa_size_name'] as $key => $value) {
    $i++;
    $arr_cart_size_name[$i] = $value;
}

$i=0;
foreach($_SESSION['fa_color_id'] as $key => $value) {
    $i++;
    $arr_cart_color_id[$i] = $value;
}

$i=0;
foreach($_SESSION['fa_color_name'] as $key => $value) {
    $i++;
    $arr_cart_color_name[$i] = $value;
}

$i=0;
foreach($_SESSION['fa_p_qty'] as $key => $value) {
    $i++;
    $arr_cart_p_qty[$i] = $value;
}

$i=0;
foreach($_SESSION['fa_p_current_price'] as $key => $value) {
    $i++;
    $arr_cart_p_current_price[$i] = $value;
}

$i=0;
foreach($_SESSION['fa_p_name'] as $key => $value) {
    $i++;
    $arr_cart_p_name[$i] = $value;
}

$i=0;
foreach($_SESSION['fa_p_featured_photo'] as $key => $value) {
    $i++;
    $arr_cart_p_featured_photo[$i] = $value;
}

unset($_SESSION['fa_p_id']);
unset($_SESSION['fa_size_id']);
unset($_SESSION['fa_size_name']);
unset($_SESSION['fa_color_id']);
unset($_SESSION['fa_color_name']);
unset($_SESSION['fa_p_qty']);
unset($_SESSION['fa_p_current_price']);
unset($_SESSION['fa_p_name']);
unset($_SESSION['fa_p_featured_photo']);

$k=1;
for($i=1;$i<=count($arr_cart_p_id);$i++) {
    if( ($arr_cart_p_id[$i] == $_REQUEST['id']) ) {
        continue;
    } else {
        $_SESSION['fa_p_id'][$k] = $arr_cart_p_id[$i];
        $_SESSION['fa_size_id'][$k] = $arr_cart_size_id[$i];
        $_SESSION['fa_size_name'][$k] = $arr_cart_size_name[$i];
        $_SESSION['fa_color_id'][$k] = $arr_cart_color_id[$i];
        $_SESSION['fa_color_name'][$k] = $arr_cart_color_name[$i];
        $_SESSION['fa_p_qty'][$k] = $arr_cart_p_qty[$i];
        $_SESSION['fa_p_current_price'][$k] = $arr_cart_p_current_price[$i];
        $_SESSION['fa_p_name'][$k] = $arr_cart_p_name[$i];
        $_SESSION['fa_p_featured_photo'][$k] = $arr_cart_p_featured_photo[$i];
        $k++;
    }
}
header('location: favourite.php');
?>
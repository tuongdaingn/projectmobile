<?php
if (isset($_GET['option'])) {
    switch ($_GET['option']) {
        case 'ordersuccess':
            include "view/ordersuccess.php";
            break;
        case 'order':
            include "view/order.php";
            break;
        case 'cart':
            include "view/cart.php";
            break;
        case 'showproducts':
            include "view/showproducts.php";
            break;
        case 'detail':
            include "view/productdetail.php";
            break;
        case 'home':
            include "view/home.php";
            break;
        case 'signin':
            include "view/signin.php";
            break;
        case 'register':
            include "view/register.php";
            break;
        case 'changepwd':
            include "view/changepwd.php";
            break;
        case 'logout':
            unset($_SESSION['member']);
            header("location:?option=home");
            break;
    }
} else {
    include "view/home.php";
}
?>
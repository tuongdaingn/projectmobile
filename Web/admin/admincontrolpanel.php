<?php
ob_start();
$chuaxuly = mysqli_num_rows($connect->query("select*from orders where status =1"));
$dangxuly = mysqli_num_rows($connect->query("select*from orders where status =2"));
$daxuly = mysqli_num_rows($connect->query("select*from orders where status =3"));
$huy = mysqli_num_rows($connect->query("select*from orders where status =4"));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap');

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 550px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
            margin-top: 20px;
        }

        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {
                height: auto;
            }
        }

        image {
            height: 500px;
        }

        div .icon {
            font-size: 35px;
            font-weight: 800;
            color: #ffff;
            cursor: pointer;
        }

        a:hover {
            background-color: yellow;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row content">
                <div class="col-sm-3 sidenav hidden-xs">
                    <div class="icon">VNK <b style="color:red">Mobile</b> </div>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="?option=brand">Hãng sản xuất <i class="fa-solid fa-tag"></i></a></li>
                        <li><a href="?option=product">Sản phẩm <i class="fa-solid fa-box"></i></a></li>
                    </ul><br>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            Đơn hàng
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li> <a href="?option=order&status=1" class="w3-bar-item w3-button">Đơn hàng chưa xử
                                    lý[<span style="color:red;">
                                        <?= $chuaxuly ?>
                                    </span>]</a></li>
                            <li> <a href="?option=order&status=2" class="w3-bar-item w3-button">Đơn hàng đang xử
                                    lý[<span style="color:red;">
                                        <?= $dangxuly ?>
                                    </span>]</a></li>
                            <li> <a href="?option=order&status=3" class="w3-bar-item w3-button">Đơn hàng đã xử lý[<span
                                        style="color:red;">
                                        <?= $daxuly ?>
                                    </span>]</a></li>
                            <li> <a href="?option=order&status=4" class="w3-bar-item w3-button">Đơn hàng hủy[<span
                                        style="color:red;">
                                        <?= $huy ?>
                                    </span>]</a></li>
                        </ul>
                    </div>
                </div>

                <br>
                <div class="col-sm-9">
                    <div class="well" style="text-align:center;">
                        <h1>Welcome to ADMIN Control Panel</h1>
                        <p>
                        <div style="font-weight:bold;">Hello:
                            <?= $_SESSION['admin'] ?> <a href="?option=logout">Logout</a>
                        </div>
                    </div>
                    <div>
                        <?php
                        if (isset($_GET['option'])) {
                            switch ($_GET['option']) {
                                case 'logout':
                                    unset($_SESSION['admin']);
                                    header("Location: .");
                                    break;
                                case 'brand':
                                    include("brands/branddetail.php");
                                    break;
                                case 'brandadd':
                                    include("brands/addbrand.php");
                                    break;
                                case 'brandupdate':
                                    include("brands/brandupdate.php");
                                    break;
                                case 'product':
                                    include("product/productdetail.php");
                                    break;
                                case 'productadd':
                                    include("product/productadd.php");
                                    break;
                                case 'productupdate':
                                    include("product/productupdate.php");
                                    break;
                                case 'order':
                                    include("order/showorder.php");
                                    break;
                                case 'orderdetail':
                                    include("order/orderdetail.php");
                                    break;
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/0158eeb5b4.js" crossorigin="anonymous"></script>
</body>

</html>
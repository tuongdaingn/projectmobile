<?php
$option = 'home';
$query = "select * from products where status =1";
if (isset($_GET['brandid'])) {
    $query .= " and brandid = " . $_GET['brandid'];
    $option = 'showproduc&brandid=' . $_GET['brandid'];
} elseif (isset($_GET['keyword'])) {
    $query .= " and name like '%" . $_GET['keyword'] . "%'";
    $option = 'showproduc&keyword=' . $_GET['keyword'];
} elseif (isset($_GET['range'])) {
    $query .= " and price<=" . $_GET['range'];
    $option = 'showproduc&range=' . $_GET['range'];
}
//xem các sản phẩm ở trang số bao nhiêu
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
//số lượng sản phẩm mỗi trang
$productperpage = 16;
//lấy số sản phẩm bắt đầu từ chỉ số bao nhiêu trong bảng(0 là từ bản ghi đầu tiên)
$from = ($page - 1) * $productperpage;
//lấy tổng số sản phẩm 
$totalproduct = $connect->query($query);
//tính tổng số trang có được
$totalpage = ceil(mysqli_num_rows($totalproduct) / $productperpage);
//lấy sản phẩm ở trang hiện thời
$query .= " limit $from,$productperpage";
$result = $connect->query($query);
//
$countpro = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="../JS/product.js" defer></script>
</head>

<body>
    <div class="container" style="margin-left:15px;">
        <div class="headline">
            <h3>Sản phẩm của chúng tôi</h3>
        </div>
        <?php foreach ($result as $item):
            $countpro++ ?>
            <div class="card">
                <div class="product-item">
                    <div class="product-infor">
                        <div class="image">
                            <a href="?option=detail&id=<?= $item['id'] ?>" class="product-thumb">
                                <img src="img/<?= $item['image'] ?>">
                            </a>
                        </div>
                        <p class="product-name">
                            <?= $item['name'] ?>
                        </p>
                        <p class="price" style="display: inline-block;">
                            <?= number_format($item['price'], 0, ',', '.') ?> VND
                        </p>
                        <p><input style="display: inline-block;" class="btn" type="button" value="Đặt mua"
                                onclick="location='?option=cart&action=add&id=<?= $item['id'] ?>';"></p>
                    </div>
                </div>
            </div>
            <?php if ($countpro % 4 == 0) {
                echo '<br>';
            } ?>
        <?php endforeach; ?>
    </div>
    <section style="text-align:center;">
        <?php for ($i = 1; $i <= $totalpage; $i++): ?>
            <a href="?option<?= $option ?>&page=<?= $i ?>"><?= $i ?></a>
        <?php endfor; ?>
    </section>
</body>


</html>
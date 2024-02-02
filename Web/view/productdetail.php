<?php
$id = $_GET['id'];
$query = "select*from products where id = $id";
$result = $connect->query($query);
$item = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .btn-cart {
  background-color: #4CAF50; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>
<body>
    <h1 style="text-align:center; padding-top:10px;">Thông tin sản phẩm</h1>
    <section class="product my-5 pt-5">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-12 col-12">
                <img class="img-fluid w-100" style="height:400px;width:200px;" src="img/<?= $item['image'] ?>">
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <h3>Tên:
                    <?= $item['name'] ?>
                </h3>
                <hr>
                <h4>Giá:
                    <?= number_format($item['price'], 0, ',', '.') ?>đ
                </h4>
                <hr>
                <h4>Mô tả:</h4>
                <span>
                    <?= $item['description'] ?>
                </span>
                <hr>
                <div class="cart-btn">
                    <input class="btn-cart" type="button" value="Đặt mua"  
                    onclick="location='?option=cart&action=add&id=<?= $item['id'] ?>';">
                </div>
            </div>
        </div>

    </section>
</body>

</html>
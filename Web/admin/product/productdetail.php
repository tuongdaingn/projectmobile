<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $product = $connect->query("select*from orderdetail where productid=$id");
  if (mysqli_num_rows($product) != 0) {
    $connect->query("update products set status=0 where id =$id");
  } else {
    $connect->query("delete from products where id = $id");
    unlink("../img/" . $_GET['image']);
  }
}
?>
<?php
$option = 'product';
$query = "select * from products";
$result = $connect->query($query);
?>

<!-- </?php
$option = 'product';
$query = "select * from products";
//$result = $connect->query($query);
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
?> -->
<!DOCTYPE html>
<html>

<head>
  <style>
    <?php include("../CSS/brandtable.css");
    ?>
  </style>
</head>

<body>
  <h1 style="text-align:center;">Sản phẩm</h1>
  <a style="text-align:center;" href="?option=productadd">
    <div class="panel panel-default">
      <div class="panel-heading">Thêm sản phẩm ở đây!!!</div>
    </div>
  </a>
</div>
  <table id="customers">
    <section style="text-align:center;">
    </section>
    <thead>
      <tr>
        <th>STT</th>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Ảnh</th>
        <th>Trạng thái</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $count = 1; ?>
      <?php foreach ($result as $items): ?>
        <tr>
          <td>
            <?= $count++ ?>
          </td>
          <td style="color:red;">
            <?= $items['id'] ?>
          </td>
          <td>
            <?= $items['name'] ?>
          </td>
          <td width="10%">
            <?= number_format($items['price'], 0, ',', '.') ?>
          </td>
          <td>
            <img src="../img/<?= $items['image'] ?>" height="150px" width="150px">
          </td>
          <td>
            <?= $items['status'] == 1 ? 'Active' : 'Unactive' ?>
          </td>
          <td>
            <a style="margin-right:20px;" class="btn btn-sm btn-info"
              href="?option=productupdate&id=<?= $items['id'] ?>">Update <span
                class="glyphicon glyphicon-pencil"></a></i>
            <a class="btn btn-sm btn-danger" href="?option=product&id=<?= $items['id'] ?>&image=<?= $items['image'] ?>"
              onclick="return confirm('Are you sure to delete')">Delete <i class="fa-solid fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <!-- <section style="text-align:center;">
    </?php for ($i = 1; $i <= $totalpage; $i++): ?>
      <a href="?option</?= $option ?>&page=</?= $i ?>"></?= $i ?></a>
    </?php endfor; ?>
  </section> -->
  <script src="https://kit.fontawesome.com/0158eeb5b4.js" crossorigin="anonymous"></script>
</body>

</html>
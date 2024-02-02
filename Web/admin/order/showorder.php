<?php 
    if(isset($_GET['id'])){
      $id=$_GET['id'];
        $connect->query("delete from orderdetail where orderid = $id"); 
        $connect->query("delete from orders where id = $id"); 
        header("Location: ?option=order&status=4");
      }
?>


<?php
$status=$_GET['status'];
$query = "select*from orders where status = $status";
$result = $connect->query($query);
?>
  <style>
    <?php include("../CSS/brandtable.css");?>
  </style>

<body>
<h1 style="text-align:center;">Đơn hàng <?=$status==1?'chưa xử lý': ($status==2?'đang xử lý':($status==3?'đã xử lý':'hủy'))?></h1>
  <table id="customers">
    <section style="text-align:center;">
    </section>
    <thead>
      <tr>
        <th>STT</th>
        <th>ID</th>
        <th>Ngày tạo</th>
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
            <?= $items['orderdate'] ?>
          </td>
          <td>
            <a style="margin-right:20px;" class="btn btn-sm btn-info" href="?option=orderdetail&id=<?=$items['id']?>">Detail</a>      
            <a style="display:<?=$status==4?'':'none'?>" class="btn btn-sm btn-danger" href="?option=order&id=<?=$items['id']?>"
             onclick="return confirm('Are you sure to delete')">Delete <i class="fa-solid fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <script src="https://kit.fontawesome.com/0158eeb5b4.js" crossorigin="anonymous"></script>
</body>

</html>
<?php 
    if(isset($_GET['id'])){
      $id=$_GET['id'];
      $product=$connect->query("select*from products where brandid=$id");
      if(mysqli_num_rows($product)!=0){
        $connect->query("update brand set status=0 where id =$id");
      }else{
        $connect->query("delete from brand where id = $id");
      }
    }


?>


<?php
$query = "select*from brand";
$result = $connect->query($query);

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    <?php include("../CSS/brandtable.css");
    ?>
  </style>
</head>

<body>
<h1 style="text-align:center;">Hãng sản xuất</h1>
<a style="text-align:center;" href="?option=brandadd">
    <div class="panel panel-default">
      <div class="panel-heading">Thêm thương hiệu ở đây!!</div>
    </div>
  </a>
  <table id="customers">
    <section style="text-align:center;">
    </section>
    <thead>
      <tr>
        <th>STT</th>
        <th>Mã Hãng</th>
        <th>Tên Hãng</th>
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
          <td>
            <?= $items['status'] == 1 ? 'Active' : 'Unactive' ?>
          </td>
          <td>
            <a style="margin-right:20px;" class="btn btn-sm btn-info" href="?option=brandupdate&id=<?=$items['id']?>">Update <span
                class="glyphicon glyphicon-pencil"></a></i>       
            <a class="btn btn-sm btn-danger" href="?option=brand&id=<?=$items['id']?>" onclick="return confirm('Are you sure to delete')">Delete <i class="fa-solid fa-trash"></i></a>

          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <script src="https://kit.fontawesome.com/0158eeb5b4.js" crossorigin="anonymous"></script>
</body>

</html>
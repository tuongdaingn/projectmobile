<?php
$query = "select * from brand where status";
$result = $connect->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/0158eeb5b4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="leftbar.css">
</head>
<body>
    <div class="sidenav">
        <h5>Hãng Điện Thoại</h5>
        <ul>
        <?php foreach ($result as $items): ?>
            <li><button><a href="?option=showproducts&brandid=<?= $items['id'] ?>"><?= $items['name'] ?></a></button></li>
            <?php endforeach; ?>
        </ul>
        
    </div>
</body>
</html>
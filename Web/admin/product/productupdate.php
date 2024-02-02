<?php $product = mysqli_fetch_array($connect->query("select* from products where id =" . $_GET['id']));

?>

<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $query = "select*from products where name ='$name' and id!=" . $product['id']; //check các giá trị trong db có trùng với tên nhập k
    if (mysqli_num_rows($connect->query($query)) != 0) {
        $alert = "Đã có sản phẩm trùng";
    } else {
        $brandid = $_POST['brandid'];
        $price = $_POST['price'];
        $description = $_POST['des'];
        $status = $_POST['status'];
        //===========================================================================
        $store = "../img/";
        $imagename = $_FILES['image']['name'];
        $imageTemp = $_FILES['image']['tmp_name'];
        $exp3 = substr($imagename, strlen($imagename) - 3);
        $exp4 = substr($imagename, strlen($imagename) - 4);
        if (
            $exp3 == 'jpg' || $exp3 == 'png' || $exp3 == 'bmp' || $exp3 == 'gif' || $exp3 == 'JPG' || $exp3 ==
            'PNG' || $exp3 == 'BMP' || $exp3 == 'GIF' || $exp4 == 'jpeg' || $exp4 == 'JPEG' || $exp4 == 'webp' || $exp4 == 'WEBP'
        ) { //check xem co phai la file anh k
            $imagename = time() . '_' . $imagename;
            move_uploaded_file($imageTemp, $store . $imagename);
            unlink($store . $product['image']);
        } else {
            $alert = "file đã chọn không phải file ảnh";
        }
        if (empty($imagename)) {
            $imagename = $product['image'];
        }
        $connect->query("update products set brandid='$brandid',name='$name',price='$price',image=
            '$imagename',description='$description',status='$status' where id =" . $product['id']);
        header("Location: ?option=product");
    }
}

?>
<?php $brand = $connect->query("select*from brand") ?>
<h1 style="text-align:center;">Thêm sản phẩm</h1>
<section style="color:red; font-weight:bold;">
    <?= isset($alert) ? $alert : '' ?>
</section>
<form method="post" enctype="multipart/form-data">
    <section class="form-group">
        <label>Tên hãng: </label>
        <select name="brandid" class="form-control">
            <option hidden>--Chọn hãng--</option>
            <?php foreach ($brand as $item): ?>
                <option value="<?= $item['id'] ?>" <?= $item['id'] == $product['brandid'] ? 'selected' : '' ?>><?= $item['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </section>
    <section class="form-group">
        <label>Tên sản phẩm: </label><input name="name" class="form-control" required value="<?= $product['name'] ?>">
    </section>
    <section class="form-group">
        <label>Giá: </label><input min="100000" name="price" class="form-control" value="<?= $product['price'] ?>">
    </section>
    <section class="form-group">
        <label>Ảnh: </label>
        <img src="../img/<?= $product['image'] ?>" width="50%">
        <input type="file" name="image" class="form-control">
    </section>
    <section class="form-group">
        <label>Mô tả: </label><textarea name="des" id="des"><?= $product['description'] ?></textarea>
        <script>CKEDITOR.replace("des");</script>
    </section>
    <section class="form-group">
        <label>Trạng thái: </label><input type="radio" name="status" value="1" <?= $product['status'] == 1 ? 'checked' : '' ?>>Active
        <input type="radio" name="status" value="0" <?= $product['status'] == 0 ? 'checked' : '' ?>>Unactive
    </section>
    <section class="form-group">
        <input type="submit" class="btn btn-primary" value="Update">
        <a href="?option=product"><input type="button" class="btn btn-danger" value="Quay lại"></a>
    </section>
</form>
</section>
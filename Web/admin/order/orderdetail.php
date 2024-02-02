<?php
if (isset($_GET['action'])) {
    $condition = " where orderid=" . $_GET['orderid'] . " and productid=" . $_GET['productid'];
    if ($_GET['type'] == 'asc') {

        $query = "update orderdetail set number=number+1" . $condition;
    } else {
        $query = "update orderdetail set number=number-1" . $condition;
    }
    $connect->query($query);
    header("Location: ?option=orderdetail&id=".$_GET['id']);
}
if (isset($_POST['status'])) {
    $connect->query("update orders set status=" . $_POST['status'] . " where id =" . $_GET['id']);
    header("Refresh:0");
    ob_end_flush();
}
?>
<?php
$query = "select a.fullname,a.phonenumber as 'phonemember',a.address as 'addressmember'
,a.email as 'emailmember',b.*,c.name as 'nameordermethod' from member a join orders b on 
a.id = b.memberid join ordermethod c on b.ordermethodid=c.id where b.id = 
" . $_GET['id'];
$order = mysqli_fetch_array($connect->query($query));
?>

<h1 style="text-align:center;">Chi tiết đơn hàng <br>(Mã đơn hàng:
    <?= $order['id'] ?>)
</h1>
<h2>Ngày tạo đơn</h2>
<section>
    <?= $order['orderdate'] ?>
</section>
<h2>Thông tin người đặt hàng</h2>
<table class="table">
    <tbody>
        <tr>
            <td>Họ tên</td>
            <td>
                <?= $order['fullname'] ?>
            </td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td>
                <?= $order['phonemember'] ?>
            </td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>
                <?= $order['addressmember'] ?>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <?= $order['emailmember'] ?>
            </td>
        </tr>
        <tr>
            <td>Ghi chú</td>
            <td>
                <?= $order['note'] ?>
            </td>
        </tr>
    </tbody>
</table>
<h2>Thông tin người nhận hàng</h2>
<table class="table">
    <tbody>
        <tr>
            <td>Họ tên</td>
            <td>
                <?= $order['name'] ?>
            </td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td>
                <?= $order['phonemember'] ?>
            </td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>
                <?= $order['address'] ?>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <?= $order['email'] ?>
            </td>
        </tr>
    </tbody>
</table>
<h2>Phương thức thanh toán</h2>
<section>
    <?= $order['nameordermethod'] ?>
</section>
<?php
$query = "select a.status,b.*,c.name,c.image from orders a join orderdetail b on a.id=b.orderid join products c 
on b.productid=c.id where a.id=" . $order['id'];
$orderdetail = $connect->query($query);
?>
<form method="post">
    <h2>Các sản phẩm đã mua</h2>
    <?php $count = 1; ?>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderdetail as $items): ?>
                <tr>
                    <td>
                        <?= $count++ ?>
                    </td>
                    <td>
                        <?= $items['name'] ?>
                    </td>
                    <td><img src="../img/<?= $items['image'] ?>" width="30%"></td>
                    <td>
                        <?= number_format($items['price'], 0, ',', '.') ?>
                    </td>
                    <td width="20%">
                        <?= $items['number'] ?>
                        <input type="button" value="+"
                            onclick="location='?option=orderdetail&id=<?= $_GET['id'] ?>&action=update&type=asc&orderid=<?= $items['orderid'] ?> &productid=<?= $items['productid'] ?>';">
                        <input type="button" <?=$items['number']==0?'disabled':''?> value="-"
                            onclick="location='?option=orderdetail&id=<?= $_GET['id'] ?>&action=update&type=desc&orderid=<?= $items['orderid'] ?> &productid=<?= $items['productid'] ?>';">
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <h2>Trạng thái đơn hàng</h2>
    <p style="display:<?= $order['status'] == 2 || $order['status'] == 3 ? 'none' : '' ?>"><input type="radio" name="status"
            value="1" <?= $order['status'] == 1 ? 'checked' : '' ?>> Chưa xử lý </p>
    <p style="display:<?= $order['status'] == 3 ? 'none' : '' ?>"><input type="radio" name="status" value="2"
            <?= $order['status'] == 2 ? 'checked' : '' ?>> Đang xử lý </p>
    <p><input type="radio" name="status" value="3" <?= $order['status'] == 3 ? 'checked' : '' ?>> Đã xử lý </p>
    <p style="display:<?= $order['status'] == 3 ? 'none' : '' ?>"><input type="radio" name="status" value="4"
            <?= $order['status'] == 4 ? 'checked' : '' ?>> Hủy </p>
    <section><input <?= $order['status'] == 3 ? 'disabled' : '' ?>type="submit" value="Update đơn hàng" class="btn btn-primary">
        <a href="?option=order&status=1" class="btn btn-outline-secondary"> Quay lại</a>
    </section>
</form>
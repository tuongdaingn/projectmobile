<?php
$query = "select*from member where username='" . $_SESSION['member'] . "'";
$member = mysqli_fetch_array($connect->query($query));
?>
<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $note = $_POST['note'];
    $ordermethodid = $_POST['ordermethodid'];
    $memberid = $member['id'];
    $query = "insert orders(ordermethodid,memberid,name,address,phone,email,note)
            values($ordermethodid,$memberid,'$name','$address','$phone','$email','$note')";
    $connect->query($query);
    $query = "select id from orders order by id desc limit 1";
    $orderid = mysqli_fetch_array($connect->query($query))['id'];
    foreach ($_SESSION['cart'] as $key => $value) {
        $productid = $key;
        $number = $value;
        $query = "select price from products where id =$key";
        $price = mysqli_fetch_array($connect->query($query))['price'];
        $query = "insert orderdetail values($productid,$orderid,$number,$price)";
        $connect->query($query);
    }
    unset($_SESSION['cart']);
    header("location: ?option=ordersuccess");
}
?>

<!doctype html>
<title>Order</title>
<style>
    .myForm {
        display: grid;
        grid-template-columns: auto 1fr 1fr;
        grid-auto-flow: row dense;
        grid-gap: .8em;
        background: #eee;
        padding: 1.2em;
    }

    .myForm>label {
        grid-column: 1;
        grid-row: auto;
    }

    .myForm>input,
    .myForm>button {
        grid-column: 2;
        grid-row: auto;
        padding: 1em;
        border: none;
    }

    .myForm textarea {
        min-height: calc(100% - 2em);
        width: 100%;
        border: none;
    }

    #comment-box {
        grid-column: 3;
        grid-row: span 3;
    }

    .myForm>button {
        grid-column: 2 / 4;
    }
</style>

<body>
    <header style="text-align:center;">
        <h1>ĐẶT HÀNG</h1>
        <h2>Thông tin người nhận hàng</h2>
    </header>


    <form class="myForm" method="post">
        <label for="customer_name">Tên: </label>
        <input name="name" value="<?= $member['username'] ?>">

        <label for="email_address">Email: </label>
        <input type="email" name="email" value="<?= $member['email'] ?>">

        <label for="email_address">Địa chỉ: </label>
        <input name="address" rows="3" value="<?= $member['address'] ?>">

        <label for="phone">Phone: </label>
        <input type="tel" name="phone" value="<?= $member['phonenumber'] ?>">

        <div id="comment-box">
            <label for="comments">Ghi chú: </label>
            <textarea name="note" id="comments" maxlength="500"></textarea>
        </div>
        <section>
            <h3>Chọn phương thức thanh toán</h3>
            <?php
            $query = "select*from ordermethod where status=1";
            $result = $connect->query($query);
            ?>
            <select name="ordermethodid" class="form-select">
                <?php
                foreach ($result as $items): ?>
                    <option value="<?= $items['id'] ?>"><?= $items['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <section style="padding-top: 10px;"><input type="submit"  class="btn btn-primary" value="Đặt Hàng"></section>
        </section>

    </form>

</body>
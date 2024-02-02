<?php
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (isset($_GET['action'])) {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    switch ($_GET['action']) {
        case 'add':
            if (array_key_exists($id, array_keys($_SESSION['cart']))) {
                $_SESSION['cart'][$id]++;
            } else {
                $_SESSION['cart'][$id] = 1;
            }
            header("location: ?option=cart");
            break;
        case 'delete':
            unset($_SESSION['cart'][$id]);
            break;
        case 'deleteall':
            unset($_SESSION['cart']);
            break;
        case 'update':
            if ($_GET['type'] == 'asc')
                $_SESSION['cart'][$id]++;
            else {
                if ($_SESSION['cart'][$id] > 1)
                    $_SESSION['cart'][$id]--;
            }
            header("location: ?option=cart");
            break;
        case 'order':
            if (isset($_SESSION['member'])) {
                header("location: ?option=order");
            } else {
                header("location: ?option=signin&order=1");
            }
            break;
    }
}
?>
<section class="cart" style="margin-top:20px;">
    <h1 style="margin-top:20px;text-align:center;">Giỏ Hàng</h1>
    <?php
    if (!empty($_SESSION['cart'])):
        $ids = implode(',', array_keys($_SESSION['cart']));
        $query = "select *from products where id in($ids)";
        $result = $connect->query($query);
        ?>
        <table class="table" style="text-align:center;">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Number</td>
                    <td>TotalPrice</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($result as $item):
                    ?>
                    <tr>
                        <td width="20%"><img width="125px" height="125px" src="img/<?= $item['image'] ?>"></td>
                        <td>
                            <div style="text-align:center;">
                                <?= $item['name'] ?>
                            </div><br>
                            <div style="text-align:center;">
                                <input type="button" value="Delete"
                                    onclick="location='?option=cart&action=delete&id=<?= $item['id'] ?>'">
                            </div>
                        </td>
                        <td>
                            <?= number_format($item['price'], 0, ',', '.') ?>
                        </td>
                        <td>
                            <?= $_SESSION['cart'][$item['id']] ?>
                            <input type="button" value="+"
                                onclick="location='?option=cart&action=update&type=asc&id=<?= $item['id'] ?>';">
                            <input type="button" value="-"
                                onclick="location='?option=cart&action=update&type=desc&id=<?= $item['id'] ?>';">
                        </td>
                        <td>
                            <?= number_format($subtotal = $item['price'] * $_SESSION['cart'][$item['id']], 0, ',', '.') ?>
                        </td>
                    </tr>
                    <?php $total += $subtotal; ?>

                    <?php
                endforeach;
                ?>
                <tr>
                    <td colspan="5">
                        <section> Tổng tiền của bạn là:
                            <?= number_format($total, 0, ',', '.') ?> vnđ
                        </section>
                        <section>
                            <input type="button" class="btn btn-danger" value="Delete Cart"
                                onclick="if(confirm('Are you sure?')) location='?option=cart&action=deleteall';">
                            <input type="button" class="btn btn-success" value="Đặt hàng"
                                onclick="location ='?option=cart&action=order';">
                        </section>
                    </td>
                </tr>
            </tbody>

        </table>
    <?php else:
        ?>
        <section style="text-align:center; color:red; font-weight:bold; font-size:25px;">Giỏ hàng trống!</section>
        <?php
    endif;
    ?>
</section>
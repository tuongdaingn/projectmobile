<?php
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "select*from member where username='$username' and password='$password'";
    $result = $connect->query($query);
    if (mysqli_num_rows($result) == 0) {
        $alert = "sai tên đăng nhập hoặc mật khẩu";
    } else {
        $result = mysqli_fetch_array($result);
        if ($result['status'] == 0) {
            $alert = "tài khoản của bạn đang bị khóa hoặc đang trong quá trình xử lý";
        } else {
            $_SESSION['member'] = $username;
            if (isset($_GET['order'])) {
                header("location: ?option=order");
            } else {
                header("location: ?option=home");
            }
        }
    }
}
?>
<!-- Latest compiled and minified CSS -->
<style>
    form {
        margin-left: auto;
        margin-right: auto;
    }
</style>

<body>
    <form method="post">
        <div class="float-right">
            <div class="container">
            <h1 style="text-align:center;">Đăng nhập tài khoản</h1>
                <section style="margin-left:200px;">
                <p style="color:red;"><?= isset($alert) ? $alert : "" ?></p>
                
                    <section class="col-md-8">                       
                        <label><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" required>
                        <label><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>
                        <input type="submit" class="btn" value="Login">
                    </section>
                </section>

            </div>
        </div>
    </form>
</body>

<style>
    <?php include("css/login.css") ?>
</style>
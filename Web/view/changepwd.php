
<!-- // if (isset($_POST['username'])) {
//     $id = "select id from member where username=" . $_POST['username'];
//     if (isset($_POST['change_pass'])) {
//         $oldpass = md5($_POST['oldpass']);
//         $newpass = md5($_POST['newpass']);
//         $repass = md5($_POST['repass']);
//         //check pass cũ có đúng k
//         $query = "select*from member where id=" . $id;
//         $result = $connect->query($query);
//         $row = mysqli_fetch_object($result);
//         if (password_verify($oldpass, $row->password)) {
//             //nếu pass hợp lệ
//             if ($newpass == $repass) {
//                 //đổi pass
//                 $query = "update member set password = " . $newpass . " where id= ". $id;
//                 $result = $connect->query($query);
//             } else {
//                 $alert= "<p>Mật khẩu nhập lại không đúng</p>";
//             }
//         } else {
//             $alert= "<p>Mật khẩu nhập lại không đúng</p>";
//         }
//     }
// } -->

<!-- Latest compiled and minified CSS -->
<!-- <style>
    form {
        margin-left: auto;
        margin-right: auto;
    }
</style>

<body>
    <form method="post">
        <div class="float-right">
            <div class="container">
                <h1 style="text-align:center;">Đổi mật khẩu</h1>
                <section style="margin-left:200px;">
                    <section class="col-md-8">
                        <label><b>Old password</b></label>
                        <input type="password" placeholder="Enter Old Password" name="oldpass" required>
                        <label><b>New Password</b></label>
                        <input type="password" placeholder="Enter New Password" name="newpass" required>
                        <label><b>Confirm New Password</b></label>
                        <input type="password" placeholder="Confirm New Password" name="repass" required>
                        <input type="submit" name="change_pass" class="btn" value="Change">
                    </section>
                </section>

            </div>
        </div>
    </form> -->
</body>

<style>
    <?php include("css/login.css") ?>
</style>
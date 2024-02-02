<?php
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $query = "select*from member where username='$username'";
    $result = $connect->query($query);
    if (mysqli_num_rows($result) != 0) {
        $alert = "tên đăng nhập đã tồn tại, vui lòng nhập lại";
    } else {
        $password = md5($_POST['password']);
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $query = "insert into member(username,password,fullname,phonenumber,address,email) 
                values('$username','$password','$fullname','$phone','$address','$email')";
        $connect->query($query);
        echo "<script>alert('đăng ký thành công, kết quả sẽ được xác thực bởi hệ thống!');location='?option=home';</script> ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
</head>

<body >
    <section class="regis">

    
    <div class="container">
    <div class="title">Registration</div>
        <section style="color:red">
            <?= isset($alert) ? $alert : ""; ?>
        </section>
        <form method="post" onsubmit="if(repassword.value!=password.value){
        alert('mật khẩu nhập lại không đúng, vui lòng thử lại'); return false;}">
        
            <div class="userdetail">
            <div class="input-box">
                    <span class="detail">FullName</span>
                    <input placeholder="Enter Fullname" type="text" name="fullname" required>
                </div>
                <div class="input-box">
                    <span class="detail">UserName</span>
                    <input placeholder="Enter UserName" type="text" name="username" required>
                </div>
                <div class="input-box">
                    <span class="detail">Password</span>
                    <input placeholder="Enter Password" type="password" name="password" required>
                </div>
                <div class="input-box">
                    <span class="detail">Re-Password</span>
                    <input placeholder="Enter Password" type="password" name="repassword" required>
                </div>
                
                <div class="input-box">
                    <span class="detail">PhoneNumber</span>
                    <input placeholder="Enter PhoneNumber" type="tel" name="phone" required pattern="(0|\+84)\d{9}">
                </div>
                <div class="input-box">
                    <span class="detail">Address</span>
                    <input placeholder="Enter Address" type="text" name="address" required>
                </div>
                <div class="input-box">
                    <span class="detail">Email</span>
                    <input placeholder="Enter Email" type="email" name="email" required>
                </div>
            </div>
            <section>
                <input class="register" type="submit" value="Đăng ký">
            </section>
        </form>
    </div>
    </section>
</body>

</html>
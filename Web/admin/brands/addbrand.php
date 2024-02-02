<?php 
    if(isset($_POST['name'])){
        $name=$_POST['name'];
        $query="select*from brand where name ='$name'";//check các giá trị trong db có trùng với tên nhập k
        if(mysqli_num_rows($connect->query($query))!=0){
            $alert="Tên hãng đã tồn tại";
        }else{
            $status=$_POST['status'];
            $query="insert brand(name,status) value('$name','$status')";
            $connect->query($query);
            header("Location: ?option=brand");
        }
    }

?>
<h1 style="text-align:center;">Thêm Hãng Sản Xuất</h1>
<section style="color:red; font-weight:bold;"><?=isset($alert)?$alert:''?></section>
<section>
    <form method="post">
        <section class="form-group">
            <label>Tên hãng: </label><input name="name" class="form-control">
        </section>
        <section class="form-group">
            <label>Trạng thái: </label><input type="radio" name="status" value="1"checked>Active
            <input type="radio" name="status" value="0">Unactive
        </section>
        <section class="form-group">
            <input type="submit" class="btn btn-primary" value="Thêm">
        </section>
    </form>
</section>
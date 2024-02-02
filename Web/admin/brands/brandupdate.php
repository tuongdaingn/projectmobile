<?php 
$brand=mysqli_fetch_array($connect->query("select *from brand where id =".$_GET['id']));

?>

<?php 
    if(isset($_POST['name'])){
        $name=$_POST['name'];
        $query="select*from brand where name ='$name' and id !=".$_GET['id'];//check các giá trị trong db có trùng với tên nhập k
        if(mysqli_num_rows($connect->query($query))!=0){
            $alert="Tên hãng đã tồn tại";
        }else{
            $status=$_POST['status'];
            $query="update brand set name='$name',status='$status'where id =".$_GET['id'];
            $connect->query($query);
            header("Location: ?option=brand");
        }
    }

?>
<h1 style="text-align:center;">Sửa thông tin hãng sản xuất</h1>
<section style="color:red; font-weight:bold;"><?=isset($alert)?$alert:''?></section>
<section class="col-md-6">
    <form method="post">
        <section class="form-group">
            <label>Tên hãng: </label><input name="name" value="<?=$brand['name']?>" class="form-control">
        </section>
        <section class="form-group">
            <label>Trạng thái: </label><input type="radio" name="status" value="1"<?=$brand['status']==1?'checked':''?>>Active
            <input type="radio" name="status" value="0" <?=$brand['status']==0?'checked':''?>>Unactive
        </section>
        <section class="form-group">
            <input type="submit" class="btn btn-primary" value="Update">
            <a href="?option=brand"><input type="button" class="btn btn-danger" value="Quay lại"></a>
            
        </section>
    </form>
</section>
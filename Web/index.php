<?php session_start(); ?>
<?php $connect = new MySQLi('localhost', 'root', '', 'pro_new'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <section class="wrapper">
        <header>
            <nav>
                <?php include("view/layout/menu-top.php"); ?>
            </nav>
        </header>
        <section class="body">
            <div class="row">
                <div class="col-sm-2" style="border:1px solid #111;border-bottom:none;">
                    <aside>
                        <?php include("view/layout/left.php"); ?>
                    </aside>
                </div>
                <div class="col-sm-8" style="border:1px solid #111; height:100%;border-bottom:none;border-right:none;border-left:none;">
                    <div >
                        <?php include("view/layout/article.php"); ?>
                    </div>
                </div>
                <div class="col-sm-2" style="border:1px solid #111;border-bottom:none;">
                    <aside>
                        <?php include("view/layout/right.php"); ?>
                    </aside>
                </div>
            </div>
        </section>
        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
        <footer class="footer">
            <?php include("view/layout/footer.php"); ?>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
</body>

</html>
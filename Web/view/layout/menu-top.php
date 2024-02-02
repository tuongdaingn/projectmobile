<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav.css">
    <script src="https://kit.fontawesome.com/0158eeb5b4.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <a href="?option=home" style="text-decoration: none">
            <div class="icon">VNK <b style="color:red">Mobile</b> </div>
        </a>
        <div class="search-box">
            <form>
                <input type="hidden" name="option" value="showproducts">
                <input type="search" placeholder="Search" aria-label="Search" style=" outline: none;" name="keyword"
                    value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : "" ?>">
                <input type="submit" class="btn-search" value="Search">
            </form>
        </div>
        <ol>
            <li>
                <a href="?option=home">Home</a>
            </li>
            <li>
                <a href="?option=cart">Cart</a>
            </li>
            <?php if (empty($_SESSION['member'])): ?>
                <li>
                    <a href="?option=signin">Sign In</a>
                </li>
                <li>
                    <a href="?option=register">Register</a>
                </li>
            <?php else: ?>
                <section style="margin:auto;"> hello:<span style="color:red;">
                        <?= $_SESSION['member'] ?>
                    </span>[<a href="?option=logout">logout</a>]
                </section>
            <?php endif; ?>
        </ol>
    </nav>

</body>

</html>
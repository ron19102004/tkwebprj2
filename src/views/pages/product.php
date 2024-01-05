<!DOCTYPE html>
<html lang="en">

<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/src/views/layouts/head.layout.php"); ?> 
    <title>Sản phẩm</title>
</head>

<body>
    <?php
    Helper::addLayout('header.layout.php');
    ?>
    <main class="p-3 space-y-3">
        <?php 
        if(isset($_GET['id'])){
            Helper::addComponent('product/details.php'); 
        } else {
            Helper::addComponent('product/products.php');
        }
        ?>
    </main>
    <?php Helper::addLayout('footer.layout.php'); ?>
</body>

</html>
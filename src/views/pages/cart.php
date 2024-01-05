<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require($_SERVER['DOCUMENT_ROOT'] . "/src/views/layouts/head.layout.php");
    if (AuthGuard::run() == false) {
        Helper::redirect(Helper::pages('auth/login.auth.php'));
    }
    ?>
    <title>Giỏ hàng</title>
</head>

<body>
    <?php
    Helper::addLayout('header.layout.php');
    ?>
    <main class="space-y-3">
        <?php
        Helper::addComponent('my-cart/cart.php');
        ?>
    </main>
</body>

</html>
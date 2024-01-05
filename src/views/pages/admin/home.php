<!DOCTYPE html>
<html lang="en">

<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/src/views/layouts/head.layout.php"); ?>

    <title>ADMIN</title>
</head>

<body>
    <?php Helper::addLayout('header-admin.layout.php');
    ?>
    <main>
        <?php
        if (isset($_GET['progress'])) {
            Helper::addAdminComponent('order/progress.php');
        } else {
            Helper::addAdminComponent('order/order.php');
        }
        ?>
    </main>

</body>

</html>
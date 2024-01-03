<!DOCTYPE html>
<html lang="en">

<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/src/views/layouts/head.layout.php"); ?>

    <title>ADMIN</title>
</head>

<body>
    <?php
    Helper::addLayout('header-admin.layout.php');
    ?>
    <main class="p-3 space-y-3">
        <?php 
        if(isset($_GET['edit']) && isset($_GET['id'])){
            Helper::addAdminComponent('color-size/edit.php'); 
        } else {
            Helper::addAdminComponent('color-size/color.php');
            Helper::addAdminComponent('color-size/size.php'); 
        }
        ?>
    </main>
</body>

</html>
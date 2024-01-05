<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require($_SERVER['DOCUMENT_ROOT'] . "/src/views/layouts/head.layout.php");
    if (AuthGuard::run() == false) {
        Helper::redirect(Helper::pages('auth/login.auth.php'));
        $userCurrent = json_decode($_SESSION['userCurrent'], true);
    }
    ?>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <title>Trang cá nhân</title>
</head>

<body>
    <?php
    Helper::addLayout('header.layout.php');
    if (isset($_GET['details_order'])) {
        Helper::addComponent('profile/details-order.php');
    } else {
        Helper::addComponent('profile/profile.php');
    }
    ?>
</body>

</html>
<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/enum.util.php");

class AdminGuard
{
    public static function run($callback)
    {
        if (isset($_SESSION['role']) == null) {
            echo 'to login';
            return;
        }
        if ($_SESSION['role'] == Role::USER) {
            echo 'page 403';
            return;
        }
        $callback();
    }
}

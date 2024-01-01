<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/enum.util.php");

class AdminGuard
{
    public static function run($callback = null)
    {
        if (isset($_SESSION['role']) == null) {
            Helper::redirect(Helper::pages('auth/login.auth.php'));
        }
        if ($_SESSION['role'] == Role::USER) {
            Helper::redirect(Helper::errors('forbidden.php'));
        }
        if ($callback != null) {
            $callback();
        }
    }
}

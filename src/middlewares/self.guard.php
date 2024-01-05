<?php

class SelfGuard
{
    public static function run($callback = null)
    {
        if (AuthGuard::run() == false) {
            Helper::redirect(Helper::pages('auth/login.auth.php'));
        }
        $user = json_decode($_SESSION['userCurrent'], true);
        if ($user['id'] != Validator::validate('id_user')) {
            Helper::redirect(Helper::errors('forbidden.php'));
        }
        if ($callback != null)
            $callback();
    }
}

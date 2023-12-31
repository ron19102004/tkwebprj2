<?php

class AuthGuard
{
    public static function run($callback = null)
    {
        if (isset($_SESSION['userCurrent']) == null) {
            return false;
        }
        if ($callback != null)
            $callback();
        return true;
    }
}

<?php
class ValidateException extends Exception
{
}
class CustomException extends PDOException
{
}

class Validator
{
    public static function validate($key, $filter = FILTER_SANITIZE_STRING)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $value = filter_input(INPUT_POST, $key, $filter);
            return ($value !== null) ? $value : throw new ValidateException("Lỗi dữ liệu đầu vào");
        }
        $value = filter_input(INPUT_GET, $key, $filter);
        return ($value !== null) ? $value : throw new ValidateException("Lỗi dữ liệu đầu vào");
    }

    public static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function comparePassword($password, $hashedPassword)
    {
        return password_verify($password, $hashedPassword);
    }
}

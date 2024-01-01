<?php
class Helper
{
    public static function env(string $value)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . "/env.json";
        $jsonString = file_get_contents($path);
        $phpArray = json_decode($jsonString, true);
        return $phpArray[$value];
    }
    public static function assets($path)
    {
        $baseUrl = self::env('http') . "://" . $_SERVER['HTTP_HOST'] . '/src/views/assets/';
        return $baseUrl . $path;
    }
    public static function pages($path)
    {
        $baseUrl = self::env('http') . "://" . $_SERVER['HTTP_HOST'] . '/src/views/pages/';
        return $baseUrl . $path;
    }
    public static function errors($fileName)
    {
        $baseUrl = self::env('http') . "://" . $_SERVER['HTTP_HOST'] . '/src/views/errors/';
        return $baseUrl . $fileName;
    }
    public static function routes($path)
    {
        $baseUrl = self::env('http') . "://" . $_SERVER['HTTP_HOST'] . '/src/routes/';
        return $baseUrl . $path;
    }
    public static function redirect($url)
    {
        header('Location: ' . $url);
    }
    public static function addLayout($path)
    {
        require($_SERVER['DOCUMENT_ROOT'] . "/src/views/layouts/" . $path);
    }
    public static function addPage($path)
    {
        require($_SERVER['DOCUMENT_ROOT'] . "/src/views/pages/" . $path);
    }
    public static function addAdminComponent($name)
    {
        require($_SERVER['DOCUMENT_ROOT'] . "/src/views/pages/admin/components/" . $name);
    }
    public static function addComponent($name)
    {
        require($_SERVER['DOCUMENT_ROOT'] . "/src/views/pages/components/" . $name);
    }
    public function to($url)
    {
        header('Location: ' . $url);
    }
    public static function toast($status, $message)
    {
        $toast = [
            "status" => $status,
            "message" => $message
        ];
        $_SESSION['toast'] = json_encode($toast);
        return new self();
    }
}

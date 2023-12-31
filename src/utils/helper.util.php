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
        echo $baseUrl . $path;
        return $baseUrl . $path;
    }
    public static function pages($path)
    {
        $baseUrl = self::env('http') . "://" . $_SERVER['HTTP_HOST'] . '/src/views/pages/';
        echo $baseUrl . $path;
        return $baseUrl . $path;
    }
    public static function errors($fileName)
    {
        $baseUrl = self::env('http') . "://" . $_SERVER['HTTP_HOST'] . '/src/views/errors';
        echo $baseUrl . $fileName;
        return $baseUrl . $fileName;
    }
    public static function routes($path)
    {
        $baseUrl = self::env('http') . "://" . $_SERVER['HTTP_HOST'] . '/src/routes/';
        echo $baseUrl . $path;
        return $baseUrl . $path;
    }
    public static function redirect($url){
        header('Location: ' . $url);
    }
    public function to($url){
        header('Location: ' . $url);
    }
    public static function toast($status, $message){
        $toast = [
            "status" => $status,
            "message" => $message
        ];
        $_SESSION['toast'] = json_encode($toast);
        return new self();
    }
}

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/color.controller.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/admin.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/color.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/color.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");

session_start();
class ColorRoute
{
    private $colorController;
    public function __construct()
    {
        $this->colorController = new ColorController();
    }
    public static function act($method_req)
    {
        if ($method_req == MethodRequest::POST) {
            if (Validator::validate('method') && Validator::validate('method') == 'add') {
                AdminGuard::run((new ColorRoute())->add());
                return;
            }
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'add') {
        }
    }
    public function add()
    {

    }
}
ColorRoute::act($_SERVER['REQUEST_METHOD']);

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/admin.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/product-color.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/product-color.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/file.util.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/product-color.controller.php");
session_start();
class ProductColorRoute
{
    private $productColorController;
    public function __construct()
    {
        $this->productColorController = new ProductColorController();
    }
    public  function act($method_req)
    {
        if ($method_req == MethodRequest::POST) {
            if (Validator::validate('method') && Validator::validate('method') == 'add') {
                AdminGuard::run($this->productColorController->add());
                return;
            }
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'delete') {
            AdminGuard::run($this->productColorController->delete());
            return;
        }
    }
}
(new ProductColorRoute())->act($_SERVER['REQUEST_METHOD']);

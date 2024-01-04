<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/admin.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/product-size.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/product-size.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/file.util.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/product-size.controller.php");
session_start();
class ProductSizeRoute
{
    private $producSizeController;
    public function __construct()
    {
        $this->producSizeController = new ProductSizeController();
    }
    public  function act($method_req)
    {
        if ($method_req == MethodRequest::POST) {
            if (Validator::validate('method') && Validator::validate('method') == 'add') {
                AdminGuard::run($this->producSizeController->add());
                return;
            }
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'delete') {
            AdminGuard::run($this->producSizeController->delete());
            return;
        }
    }
}
(new ProductSizeRoute())->act($_SERVER['REQUEST_METHOD']);

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/admin.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/product-image.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/product-image.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/file.util.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/product-image.controller.php");
session_start();
class ProductImageRoute
{
    private $productImageController;
    public function __construct()
    {
        $this->productImageController = new ProductImageController();
    }
    public  function act($method_req)
    {
        if ($method_req == MethodRequest::POST) {
            if (Validator::validate('method') && Validator::validate('method') == 'add') {
                AdminGuard::run($this->productImageController->add());
                return;
            }
        
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'delete') {
            AdminGuard::run($this->productImageController->delete());
            return;
        }
    }
}
(new ProductImageRoute())->act($_SERVER['REQUEST_METHOD']);

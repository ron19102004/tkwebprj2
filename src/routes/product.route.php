<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/admin.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/product.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/product.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/product-color.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/product-image.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/product-size.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/file.util.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/product.controller.php");
session_start();
class ProductRoute
{
    private $productController;
    public function __construct()
    {
        $this->productController = new ProductController();
    }
    public  function act($method_req)
    {
        if ($method_req == MethodRequest::POST) {
            if (Validator::validate('method') && Validator::validate('method') == 'changePriceAndDiscount') {
                AdminGuard::run($this->productController->changePriceAndDiscount());
                return;
            }
            if (Validator::validate('method') && Validator::validate('method') == 'changeDescription') {
                AdminGuard::run($this->productController->changeDescription());
                return;
            }
            if (Validator::validate('method') && Validator::validate('method') == 'changeName') {
                AdminGuard::run($this->productController->changeName());
                return;
            }

            if (Validator::validate('method') && Validator::validate('method') == 'changeBrand') {
                AdminGuard::run($this->productController->changeBrand());
                return;
            }
            if (Validator::validate('method') && Validator::validate('method') == 'changeWPolicy') {
                AdminGuard::run($this->productController->changeWPolicy());
                return;
            }
            if (Validator::validate('method') && Validator::validate('method') == 'add') {
                AdminGuard::run($this->productController->add());
                return;
            }
            if (Validator::validate('method') && Validator::validate('method') == 'edit') {
                AdminGuard::run($this->productController->edit());
                return;
            }
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'getAll') {
            $this->productController->index();
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'details') {
            $this->productController->details();
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'findById') {
            $this->productController->findById();
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'delete') {
            AdminGuard::run($this->productController->delete());
            return;
        }
    }
}
(new ProductRoute())->act($_SERVER['REQUEST_METHOD']);

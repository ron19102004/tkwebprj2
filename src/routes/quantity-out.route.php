<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/quantity-out.controller.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/admin.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/quantity-out.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/product.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/product.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/quantity_out.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");
session_start();
class QuantityOutRoute
{
    private $controller;
    public function __construct()
    {
        $this->controller = new QuantityOutController();
    }
    public  function act($method_req)
    {
        if ($method_req == MethodRequest::POST) {
            if (Validator::validate('method') && Validator::validate('method') == 'add') {
                AdminGuard::run($this->controller->add());
                return;
            }
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'findByIdProduct') {
            AdminGuard::run($this->controller->findByIdProduct());
            return;
        }
    }
}
(new QuantityOutRoute())->act($_SERVER['REQUEST_METHOD']);

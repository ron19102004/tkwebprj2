<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/quantity-in.controller.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/admin.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/quantity-in.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/product.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/product.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/quantity_in.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");
session_start();
class QuantityInRoute
{
    private $controller;
    public function __construct()
    {
        $this->controller = new QuantityInController();
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
        if (Validator::validate('method') && Validator::validate('method') == 'getAll') {
            $this->controller->index();
            return;
        }
    }
}
(new QuantityInRoute())->act($_SERVER['REQUEST_METHOD']);

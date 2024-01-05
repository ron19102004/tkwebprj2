<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/cart.controller.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/self.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/auth.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/cart.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/ship.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/ship.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/cart.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/file.util.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/enum.util.php");

session_start();
class CartRoute
{
    private $controller;
    public function __construct()
    {
        $this->controller = new CartController();
    }
    public  function act($method_req)
    {
        if ($method_req == MethodRequest::POST) {
            if (Validator::validate('method') && Validator::validate('method') == 'add') {
                SelfGuard::run($this->controller->add());
                return;
            }
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'findByIdUser') {
            SelfGuard::run($this->controller->findByIdUser());
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'findById') {
            SelfGuard::run($this->controller->findById());
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'delete') {
            SelfGuard::run($this->controller->delete());
            return;
        }
    }
}
(new CartRoute())->act($_SERVER['REQUEST_METHOD']);

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/order.controller.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/self.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/auth.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/admin.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/order.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/order.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/cart.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/cart.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/product.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/product.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/file.util.php");

session_start();
class OrderRoute
{
    private $controller;
    public function __construct()
    {
        $this->controller = new OrderController();
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
        if (Validator::validate('method') && Validator::validate('method') == 'getAll') {
            AdminGuard::run($this->controller->index());
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'finish') {
            AdminGuard::run($this->controller->finishedOrder());
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'findByIdUser') {
            SelfGuard::run($this->controller->findByIdUser());
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'findByIdOrder') {
            SelfGuard::run($this->controller->findByIdOrder());
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'findByIdOrderForAdmin') {
            AdminGuard::run($this->controller->findByIdOrder());
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'findByIdUserFinished') {
            SelfGuard::run($this->controller->findByIdUserAndOrderFinished());
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'delete') {
            SelfGuard::run($this->controller->delete());
            return;
        }
    }
}
(new OrderRoute())->act($_SERVER['REQUEST_METHOD']);

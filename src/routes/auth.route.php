<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/admin.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/auth.controller.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/user.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/user.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");

session_start();
class AuthRoute
{
    private $authController;
    public function __construct()
    {
        $this->authController = new AuthController();
    }
    public  function act($method_req)
    {
        if ($method_req == MethodRequest::POST) {
            if (Validator::validate('method') && Validator::validate('method') == 'register') {
                $this->authController->register();
                return;
            }
            if (Validator::validate('method') && Validator::validate('method') == 'login') {
                $this->authController->login();
                return;
            }
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'logout') {
            $this->authController->logout();
            return;
        }
    }
    public function add()
    {
    }
}
(new AuthRoute())->act($_SERVER['REQUEST_METHOD']);

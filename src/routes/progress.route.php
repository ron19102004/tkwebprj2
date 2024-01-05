<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/progress.controller.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/self.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/auth.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/admin.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/progress.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/progress.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/file.util.php");

session_start();
class ProgressRoute
{
    private $controller;
    public function __construct()
    {
        $this->controller = new ProgressController();
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
        if (Validator::validate('method') && Validator::validate('method') == 'getAllByIdOrder') {
            SelfGuard::run($this->controller->findByIdOrder());
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'getAllByIdOrderForAdmin') {
            AdminGuard::run($this->controller->findByIdOrder());
            return;
        }
    }
}
(new ProgressRoute())->act($_SERVER['REQUEST_METHOD']);

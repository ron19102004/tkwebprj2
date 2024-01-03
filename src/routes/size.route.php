<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/size.controller.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/admin.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/size.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/size.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");
session_start();
class SizeRoute
{
    private $sizeController;
    public function __construct()
    {
        $this->sizeController = new SizeController();
    }
    public  function act($method_req)
    {
        if ($method_req == MethodRequest::POST) {
            if (Validator::validate('method') && Validator::validate('method') == 'add') {
                AdminGuard::run($this->sizeController->add());
                return;
            }
            if (Validator::validate('method') && Validator::validate('method') == 'edit') {
                AdminGuard::run($this->sizeController->edit());
                return;
            }
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'getAll') {
            $this->sizeController->index();
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'delete') {
            AdminGuard::run($this->sizeController->delete());
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'findById') {
            $this->sizeController->findById();
            return;
        }
    }
}
(new SizeRoute())->act($_SERVER['REQUEST_METHOD']);

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/brand.controller.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/admin.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/brand.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/brand.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/file.util.php");
session_start();
class BrandRoute
{
    private $brandController;
    public function __construct()
    {
        $this->brandController = new BrandController();
    }
    public  function act($method_req)
    {
        if ($method_req == MethodRequest::POST) {
            if (Validator::validate('method') && Validator::validate('method') == 'add') {
                AdminGuard::run($this->brandController->add());
                return;
            }
            if (Validator::validate('method') && Validator::validate('method') == 'edit') {
                AdminGuard::run($this->brandController->edit());
                return;
            }
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'getAll') {
            $this->brandController->index();
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'findById') {
            $this->brandController->findById();
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'delete') {
            AdminGuard::run($this->brandController->delete());
            return;
        }
    }
}
(new BrandRoute())->act($_SERVER['REQUEST_METHOD']);

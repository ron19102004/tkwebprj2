<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/category.controller.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/admin.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/category.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/category.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/file.util.php");
session_start();
class CategoryRoute
{
    private $categoryController;
    public function __construct()
    {
        $this->categoryController = new CategoryController();
    }
    public  function act($method_req)
    {
        if ($method_req == MethodRequest::POST) {
            if (Validator::validate('method') && Validator::validate('method') == 'add') {
                AdminGuard::run($this->categoryController->add());
                return;
            }
            if (Validator::validate('method') && Validator::validate('method') == 'edit') {
                AdminGuard::run($this->categoryController->edit());
                return;
            }
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'getAll') {
            $this->categoryController->index();
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'findById') {
            $this->categoryController->findById();
            return;
        }
        if (Validator::validate('method') && Validator::validate('method') == 'delete') {
            AdminGuard::run($this->categoryController->delete());
            return;
        }
    }
}
(new CategoryRoute())->act($_SERVER['REQUEST_METHOD']);

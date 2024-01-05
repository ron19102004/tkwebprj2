<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/comment.controller.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/self.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/middlewares/auth.guard.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/services/comment.service.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/entities/comment.entity.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/repository.db.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/file.util.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/enum.util.php");

session_start();
class CommentRoute
{
    private $controller;
    public function __construct()
    {
        $this->controller = new CommentController();
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
        if (Validator::validate('method') && Validator::validate('method') == 'findByIdProduct') {
            $this->controller->findByIdProduct();
            return;
        }
    }
}
(new CommentRoute())->act($_SERVER['REQUEST_METHOD']);

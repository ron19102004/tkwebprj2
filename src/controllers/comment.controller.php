<?php
class CommentController
{
    private $commentService;

    public function __construct()
    {
        $this->commentService = new CommentService();
    }
    public function index()
    {
    }

    public function add()
    {
        try {
            $comment = new Comment();
            $comment->id_user = Validator::validate('id_user');
            $comment->id_product = Validator::validate('id_product');
            $comment->content = Validator::validate('content');
            $comment->id_comment_reply = Validator::validate('id_comment_reply');
            $this->commentService->save($comment);
            echo json_encode([
                "status" => "success",
                "message" => "Thêm thành công",
                "data" =>null
            ]);
        } catch (ValidateException $th) {
            echo json_encode([
                "status" => "error",
                "message" => $th->getMessage(),
                "data" => null
            ]);
        } catch (CustomException $th) {
            echo json_encode([
                "status" => "error",
                "message" => $th->getMessage(),
                "data" => null
            ]);
        }
    }


    public function findByIdProduct()
    {
        try {
            $data = $this->commentService->findByIdProduct(Validator::validate('id_product'));
            echo json_encode([
                "status" => "success",
                "message" => "Truy xuất thành công",
                "data" => $data
            ]);
        } catch (ValidateException $th) {
            echo json_encode([
                "status" => "error",
                "message" => $th->getMessage(),
                "data" => null
            ]);
        } catch (CustomException $th) {
            echo json_encode([
                "status" => "error",
                "message" => $th->getMessage(),
                "data" => null
            ]);
        }
    }
}

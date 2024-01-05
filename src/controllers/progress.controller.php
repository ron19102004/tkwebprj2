<?php
class ProgressController
{
    private $progressService;

    public function __construct()
    {
        $this->progressService = new ProgressService();
    }
    public function index()
    {
        
    }
    
    public function findByIdOrder(){
        $data = $this->progressService->findByIdOrder(Validator::validate('id_order'));
        echo json_encode($data);
    }
    public function add()
    {
        try {
            $progress = new Progress();
            $progress->content = Validator::validate('content');
            $progress->id_order = Validator::validate('id_order');
            $this->progressService->save($progress);
            echo json_encode([
                "status" => "success",
                "message" => "Thêm thành công",
                "data" => $progress->content
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
    public function delete()
    {
        try {
            echo json_encode([
                "status" => "error",
                "message" => "Xóa thất bại",
                "data" => null
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

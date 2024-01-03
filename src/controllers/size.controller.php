<?php
class SizeController
{
    private $sizeService;

    public function __construct()
    {
        $this->sizeService = new SizeService();
    }
    public function index()
    {
        $colors = $this->sizeService->findAll();
        echo json_encode($colors);
    }

    public function add()
    {
        try {
            $color = new Color();
            $color->import_form(Validator::validate('name'), Validator::validate('value'));
            $this->sizeService->save($color);
            echo json_encode([
                "status" => "success",
                "message" => "Thêm thành công",
                "data"=> null
            ]);
        }  catch (ValidateException $th) {
            echo json_encode([
                "status" => "error",
                "message" => $th->getMessage(),
                "data"=> null
            ]);
        } catch (CustomException $th) {
            echo json_encode([
                "status" => "error",
                "message" => $th->getMessage(),
                "data"=> null
            ]);
        }
    }

    public function edit()
    {
        try {
            $res = $this->sizeService->findById(Validator::validate('id'));
            if ($res == null) {
                Helper::toast('error', 'Không tìm thấy thực thể')->to(Helper::pages('admin/color-size.php'));
                return;
            }
            $size = new Size();
            $size->importDb($res);
            $size->import_form(Validator::validate('name'), Validator::validate('value'));
            $this->sizeService->update($size);
            Helper::toast('success', 'Cập nhật thành công')->to(Helper::pages('admin/color-size.php'));
        } catch (ValidateException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/color-size.php'));
        } catch (CustomException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/color-size.php'));
        }
    }
    public function findById()
    {
        try {
            $res = $this->sizeService->findById(Validator::validate('id'));
            $size = new Size();
            $size->importDb($res);
            echo json_encode([
                "status" => "success",
                "message" => "Truy xuất thành công",
                "data" => $size->toArray()
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
            $this->sizeService->delete(Validator::validate('id'));
            echo json_encode([
                "status" => "success",
                "message" => "Xóa thành công",
                "data"=> null
            ]);
        }  catch (ValidateException $th) {
            echo json_encode([
                "status" => "error",
                "message" => $th->getMessage(),
                "data"=> null
            ]);
        } catch (CustomException $th) {
            echo json_encode([
                "status" => "error",
                "message" => $th->getMessage(),
                "data"=> null
            ]);
        }

    }
}

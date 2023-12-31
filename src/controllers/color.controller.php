<?php
class ColorController
{
    private $colorService;

    public function __construct()
    {
        $this->colorService = new ColorService();
    }
    public function index()
    {
        $colors = $this->colorService->findAll();
        echo json_encode($colors);
    }

    public function add()
    {
        try {
            $color = new Color();
            $color->import_form(Validator::validate('name'), Validator::validate('value'));
            $this->colorService->save($color);
            echo json_encode([
                "status" => "success",
                "message" => "Thêm thành công",
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

    public function edit()
    {
        try {
            $res = $this->colorService->findById(Validator::validate('id'));
            if ($res == null) {
                Helper::toast('error', 'Không tìm thấy thực thể')->to(Helper::pages('admin/color-size.php'));
                return;
            }
            $color = new Color();
            $color->importDb($res);
            $color->import_form(Validator::validate('name'), Validator::validate('value'));
            $this->colorService->update($color);
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
            $res = $this->colorService->findById(Validator::validate('id'));
            $color = new Color();
            $color->importDb($res);
            echo json_encode([
                "status" => "success",
                "message" => "Truy xuất thành công",
                "data" => $color->toArray()
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
            $this->colorService->delete(Validator::validate('id'));
            echo json_encode([
                "status" => "success",
                "message" => "Xóa thành công",
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

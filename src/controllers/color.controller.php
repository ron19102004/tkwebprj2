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
            Helper::toast('success', 'Thêm màu thành công')->to(Helper::pages('admin/color-size.php'));
        }  catch (ValidateException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/color-size.php'));
        } catch (CustomException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/color-size.php'));
        }
    }

    public function edit()
    {
    }

    public function delete()
    {
        try {
            $this->colorService->delete(Validator::validate('id'));
            Helper::toast('success', 'Xóa màu thành công')->to(Helper::pages('admin/color-size.php'));
        }  catch (ValidateException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/color-size.php'));
        } catch (CustomException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/color-size.php'));
        }

    }
}

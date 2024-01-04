<?php
class ProductColorController
{
    private $productColorService;

    public function __construct()
    {
        $this->productColorService = new ProductColorService();
    }

    public function add()
    {
        try {
            $id_color = Validator::validate('id_color');
            $id_product = Validator::validate('id_product');
            $exist = DB::select('id')
                ->from('products_colors')
                ->where('id_color', "=", $id_color)
                ->andWhere('id_product', "=", $id_product)
                ->getOne();
            if ($exist) {
                echo json_encode([
                    "status" => "success",
                    "message" => "Màu đã tồn tại trong sản phẩm",
                    "data" => null
                ]);
                return;
            }
            $productColor = new ProductColor();
            $productColor->id_color = $id_color;
            $productColor->id_product = $id_product;
            $this->productColorService->save($productColor);
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
    public function findById()
    {
        try {

            echo json_encode([
                "status" => "success",
                "message" => "Truy xuất thành công",
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
    public function delete()
    {
        try {
            DB::delete("products_colors")
                ->where("id_product", "=", Validator::validate('id_product'))
                ->andWhere("id_color", "=", Validator::validate('id_color'))->execute();
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

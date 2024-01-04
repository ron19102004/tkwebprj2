<?php
class ProductSizeController
{
    private $productSizeService;

    public function __construct()
    {
        $this->productSizeService = new ProductSizeService();
    }

    public function add()
    {
        try {
            $id_size = Validator::validate('id_size');
            $id_product = Validator::validate('id_product');
            $exist = DB::select('id')
                ->from('products_sizes')
                ->where('id_size', "=", $id_size)
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
            $productSize = new ProductSize();
            $productSize->id_size = $id_size;
            $productSize->id_product = $id_product;
            $this->productSizeService->save($productSize);
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
            DB::delete("products_sizes")
                ->where("id_product", "=", Validator::validate('id_product'))
                ->andWhere("id_size", "=", Validator::validate('id_size'))
                ->execute();
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

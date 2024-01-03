<?php
class ProductImageController
{
    private $productImageService;

    public function __construct()
    {
        $this->productImageService = new ProductImageService();
    }

    public function add()
    {
        $id_product = 0;
        try {
            $id_product = Validator::validate('id_product');
            $productImage = new ProductImage();
            $productImage->id_product = Validator::validate('id_product');
            $file = $_FILES['file'];
            $upload = FileHandler::upload($file);
            if ($upload['status'] == true) {
                $path =  $upload['data'];
                $pathFile = preg_split("#/#", $path);
                $productImage->image = $pathFile[2];
                $this->productImageService->save($productImage);
                Helper::toast('success', 'Thêm thành công')->to(Helper::pages('admin/product.php?id='.$id_product));
            } else {
                Helper::toast('error', 'Thêm thất bại')->to(Helper::pages('admin/product.php?id='.$id_product));
            }
        } catch (ValidateException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/product.php?id='.$id_product));
        } catch (CustomException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/product.php?id='.$id_product));
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
            $this->productImageService->delete(Validator::validate('id'));
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

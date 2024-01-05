<?php
class QuantityOutController
{
    private $qOutService;
    private $productService;


    public function __construct()
    {
        $this->qOutService = new QuantityOutService();
        $this->productService = new ProductService();

    }

    public function index()
    {
        try {
            $data = $this->qOutService->findAll();
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

    public function add()
    {
        try {
            $data = $this->productService->findById(Validator::validate('id_product'));
            if($data == null){
                echo json_encode([
                    "status" => "success",
                    "message" => "Thêm thất bại,sản phẩm không tồn tại",
                    "data" => null
                ]);
                return;
            }
            $entity = new QuantityIn();
            $entity->id_product = Validator::validate('id_product');
            $entity->value = Validator::validate('value');
            $this->qOutService->save($entity);
            $product = new Product();
            $product->importDb($data);
            $product->available = $product->available - Validator::validate('value');
            $this->productService->update($product);
            Helper::toast('success', 'Khởi tạo thành công')->to(Helper::pages('admin/product.php'));
        } catch (ValidateException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/product.php'));
        } catch (CustomException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/product.php'));
        }
    }
    public function findByIdProduct()
    {
        try {
            $data = $this->qOutService->findByIdProduct(Validator::validate('id_product'));
            echo json_encode($data);
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

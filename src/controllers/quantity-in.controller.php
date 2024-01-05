<?php
class QuantityInController
{
    private $qInService;
    private $productService;

    public function __construct()
    {
        $this->qInService = new QuantityInService();
        $this->productService = new ProductService();
    }

    public function index()
    {
        try {
            $data = $this->qInService->findAll();
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
            $product = new Product();
            $product->importDb($data);
            $product->available = $product->available + Validator::validate('value');
            $this->productService->update($product);

            $entity = new QuantityIn();
            $entity->id_product = Validator::validate('id_product');
            $entity->value = Validator::validate('value');
            $this->qInService->save($entity);
           
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
}

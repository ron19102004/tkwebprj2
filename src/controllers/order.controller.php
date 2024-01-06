<?php
class OrderController
{
    private $orderService;
    private $cartService;
    private $productService;

    public function __construct()
    {
        $this->orderService = new OrderService();
        $this->cartService = new CartService();
        $this->productService = new ProductService();
    }
    public function finishedOrder()
    {
        try {
            $data = $this->orderService->findForFinished(Validator::validate('id_order'));
            if ($data == null) {
                echo json_encode([
                    "status" => "error",
                    "message" => "Đơn hàng đã được hoàn thành",
                    "data" => null,
                ]);
                return;
            }
            $order = new Order();
            $order->importDb($data);
            $order->finished = true;
            $this->orderService->update($order);
            DB::save('progress', [
                "content" => "Đơn hàng đã đến tay người dùng",
                "id_order" => Validator::validate('id_order')
            ])->execute();
            echo json_encode([
                "status" => "success",
                "message" => "Cập nhật thành công",
                "data" => null,
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
    public function index()
    {
        $data = $this->orderService->findAllForAdmin();
        echo json_encode($data);
    }
    public function findByIdUser()
    {
        $data = $this->orderService->findByIdUser(Validator::validate('id_user'));
        echo json_encode($data);
    }
    public function findByIdUserAndOrderFinished()
    {
        $data = $this->orderService->findByIdUserAndOrderFinished(Validator::validate('id_user'));
        echo json_encode($data);
    }
    public function findByIdOrder()
    {
        $data = $this->orderService->findByIdOrder(Validator::validate('id_order'));
        echo json_encode($data);
    }
    public function add()
    {
        try {
            $order = new Order();
            $order->id_cart = Validator::validate('id_cart');
            $order->id_ship = Validator::validate('id_ship');
            $order->id_discount = Validator::validate('id_discount');
            $this->orderService->save($order);

            $cartData = $this->cartService->findById(Validator::validate('id_cart'));
            $cart = new Cart();
            $cart->importDb($cartData);
            $cart->finished = true;

            $dataP = $this->productService->findById($cart->id_product);
            $product = new Product();
            $product->importDb($dataP);
            $product->available = $product->available - $cart->quantity;

            DB::save('quantity_out', [
                "value" => $cart->quantity,
                "id_product" => $product->id
            ]);

            $this->productService->update($product);
            $this->cartService->update($cart);
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


    public function delete()
    {
        try {
            $data = $this->orderService->findById(Validator::validate('id'));
            if ($data  != null) {
                $ship = new Ship();
                $ship->importDb($data);
                $ship->deleted = true;
                $this->orderService->update($ship);
                echo json_encode([
                    "status" => "success",
                    "message" => "Xóa thành công",
                    "data" => null
                ]);
                return;
            }
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

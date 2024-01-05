<?php
class CartController
{
    private $cartService;
    private $shipService;

    public function __construct()
    {
        $this->cartService = new CartService();
        $this->shipService = new ShipService();
    }

    public function add()
    {
        try {
            $data = $this->cartService->findByIdProductAndIdColorAndIdSize(
                Validator::validate('id_product'),
                Validator::validate('id_color'),
                Validator::validate('id_size')
            );
            $cart = new Cart();
            if ($data) {
                $cart->importDb($data);
                $cart->quantity = $cart->quantity + Validator::validate('quantity');
                $this->cartService->update($cart);
                echo json_encode([
                    "status" => "success",
                    "message" => "Thêm sản phẩm thành công",
                    "data" => null
                ]);
                return;
            }
            $cart->id_color = Validator::validate('id_color');
            $cart->id_size = Validator::validate('id_size');
            $cart->quantity = Validator::validate('quantity');
            $cart->id_product = Validator::validate('id_product');
            $cart->id_user = Validator::validate('id_user');
            $this->cartService->save($cart);
            echo json_encode([
                "status" => "success",
                "message" => "Thêm sản phẩm thành công",
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
    public function findByIdUser()
    {
        try {
            $ships = $this->shipService->findByIdUser(Validator::validate('id_user'));
            $data = $this->cartService->findByIdUser(Validator::validate('id_user'));
            echo json_encode([
                "status" => "success",
                "message" => "Truy xuất thành công",
                "data" => [
                    "carts" => $data,
                    "ships" => $ships
                ]
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
            $data = $this->cartService->findById(Validator::validate('id'));
            $cart = new Cart();
            $cart->importDb($data);
            echo json_encode([
                "status" => "success",
                "message" => "Truy xuất thành công",
                "data" => $cart->toArray()
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
            $data = $this->cartService->findById(Validator::validate('id'));
            if ($data  != null) {
                $cart = new Cart();
                $cart->importDb($data);
                $cart->deleted = true;
                $this->cartService->update($cart);
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

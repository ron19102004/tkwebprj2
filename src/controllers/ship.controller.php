<?php
class ShipController
{
    private $shipService;

    public function __construct()
    {
        $this->shipService = new ShipService();
    }
    public function index()
    {
        $ships = $this->shipService->findAll(Validator::validate('id_user'));
        echo json_encode($ships);
    }

    public function add()
    {
        try {
            $ship = new Ship();
            $ship->phoneNumber = Validator::validate('phoneNumber');
            $ship->id_user = Validator::validate('id_user');
            $ship->address = Validator::validate('address');
            $this->shipService->save($ship);
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
            $data = $this->shipService->findById(Validator::validate('id'));
            if ($data  != null) {
                $ship = new Ship();
                $ship->importDb($data);
                $ship->deleted = true;
                $this->shipService->update($ship);
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

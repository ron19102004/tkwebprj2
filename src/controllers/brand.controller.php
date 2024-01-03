<?php
class BrandController
{
    private $brandService;

    public function __construct()
    {
        $this->brandService = new BrandService();
    }
    public function index()
    {
        $brands = $this->brandService->findAll();
        echo json_encode($brands);
    }

    public function add()
    {
        try {
            $brand = new Brand();
            $brand->name = Validator::validate('name');
            $file = $_FILES['file'];
            $upload = FileHandler::upload($file);
            if ($upload['status'] == true) {
                $path =  $upload['data'];
                $pathFile = preg_split("#/#", $path);
                $brand->avatar = $pathFile[2];
                $this->brandService->save($brand);
                Helper::toast('success', 'Thêm thành công')->to(Helper::pages('admin/brand-category.php'));
            } else {
                Helper::toast('error', 'Thêm thất bại')->to(Helper::pages('admin/brand-category.php'));
            }
        } catch (ValidateException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/brand-category.php'));
        } catch (CustomException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/brand-category.php'));
        }
    }

    public function edit()
    {
        try {
            $data = $this->brandService->findById(Validator::validate('id'));
            $brand = new Brand();
            $brand->importDb($data);
            $brand->name = Validator::validate('name');
            $file = $_FILES['file'];
            $upload = FileHandler::upload($file);
            if($upload['status']==true){
                FileHandler::deleteFile('views/assets/'.$brand->avatar);
                $path =  $upload['data'];
                $pathFile = preg_split("#/#", $path);
                $brand->avatar = $pathFile[2];
            }
            $this->brandService->update($brand);
            Helper::toast('success', 'Cập nhật thành công')->to(Helper::pages('admin/brand-category.php'));
        } catch (ValidateException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/brand-category.php'));
        } catch (CustomException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/brand-category.php'));
        }
    }
    public function findById()
    {
        try {
            $data = $this->brandService->findById(Validator::validate('id'));
            $brand = new Brand();
            $brand->importDb($data);
            echo json_encode([
                "status" => "success",
                "message" => "Truy xuất thành công",
                "data" => $brand->toArray()
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
            $data = $this->brandService->findById(Validator::validate('id'));
            if ($data  != null) {
                $brand = new Brand();
                $brand->importDb($data);
                FileHandler::deleteFile("views/assets/" . $brand->avatar);
                $this->brandService->delete($brand->id);
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

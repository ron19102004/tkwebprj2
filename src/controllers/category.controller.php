<?php
class CategoryController
{
    private $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }
    public function index()
    {
        $brands = $this->categoryService->findAll();
        echo json_encode($brands);
    }

    public function add()
    {
        try {
            $category = new Category();
            $category->name = Validator::validate('name');
            $file = $_FILES['file'];
            $upload = FileHandler::upload($file);
            if ($upload['status'] == true) {
                $path =  $upload['data'];
                $pathFile = preg_split("#/#", $path);
                $category->image = $pathFile[2];
                $this->categoryService->save($category);
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
            $data = $this->categoryService->findById(Validator::validate('id'));
            $category = new Category();
            $category->importDb($data);
            $category->name = Validator::validate('name');
            $file = $_FILES['file'];
            $upload = FileHandler::upload($file);
            if ($upload['status'] == true) {
                FileHandler::deleteFile('views/assets/' . $category->image);
                $path =  $upload['data'];
                $pathFile = preg_split("#/#", $path);
                $category->image = $pathFile[2];
            }
            $this->categoryService->update($category);
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
            $data = $this->categoryService->findById(Validator::validate('id'));
            $category = new Category();
            $category->importDb($data);
            echo json_encode([
                "status" => "success",
                "message" => "Truy xuất thành công",
                "data" => $category->toArray()
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
            $data = $this->categoryService->findById(Validator::validate('id'));
            if ($data  != null) {
                $category = new Category();
                $category->importDb($data);
                FileHandler::deleteFile("views/assets/" . $category->image);
                $this->categoryService->delete($category->id);
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

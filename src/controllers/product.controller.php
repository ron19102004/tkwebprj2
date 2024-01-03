<?php
class ProductController
{
    private $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }
    public function changeBrand()
    {
        try {
            $res = $this->productService->findById(Validator::validate('id'));
            $product = new Product();
            $product->importDb($res);
            $product->id_brand = Validator::validate('id_brand');
            $this->productService->update($product);
            echo json_encode([
                "status" => "success",
                "message" => 'Cập nhật thương hiệu thành công',
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
    public function changeName()
    {
        try {
            $res = $this->productService->findById(Validator::validate('id'));
            $product = new Product();
            $product->importDb($res);
            $product->name = Validator::validate('name');
            $this->productService->update($product);
            echo json_encode([
                "status" => "success",
                "message" => 'Cập nhật tên thành công',
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
    public function changeDescription()
    {
        try {
            $res = $this->productService->findById(Validator::validate('id'));
            $product = new Product();
            $product->importDb($res);
            $product->description = $_POST['description'] ?? $product->description;
            $this->productService->update($product);
            echo json_encode([
                "status" => "success",
                "message" => 'Cập nhật mô tả thành công',
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

    public function changeWPolicy()
    {
        try {
            $res = $this->productService->findById(Validator::validate('id'));
            $product = new Product();
            $product->importDb($res);
            $product->warranty_policy = $_POST['w_policy'] ?? $product->warranty_policy;
            $this->productService->update($product);
            echo json_encode([
                "status" => "success",
                "message" => 'Cập nhật chính sách thành công',
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
    public function changePriceAndDiscount()
    {
        try {
            $res = $this->productService->findById(Validator::validate('id'));
            $product = new Product();
            $product->importDb($res);
            $product->price = Validator::validate('price');
            $product->discount = Validator::validate('discount');
            $this->productService->update($product);
            echo json_encode([
                "status" => "success",
                "message" => 'Cập nhật giá thành công',
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
    public function details()
    {
        try {
            $id = Validator::validate('id');
            $product = DB::select(Product::FILLABLE . ',brands.name as brand_name,categories.name as category_name')
                ->from(Product::ENTITY_NAME)
                ->join('categories', 'categories.id=' . Product::ENTITY_NAME . '.id_category')
                ->join('brands', 'brands.id=products.id_brand')
                ->where('products.id', '=', $id, 'id')
                ->getOne();
            $data_colors_products = DB::select(ProductColor::FILLABLE . ',colors.name,colors.value')
                ->from(ProductColor::ENTITY_NAME)
                ->join('colors', 'colors.id=' . ProductColor::ENTITY_NAME . '.id_color')
                ->where('products_colors.id_product', '=', $id, 'id')
                ->getMany();
            $data_sizes_products = DB::select(ProductSize::FILLABLE . ',sizes.name,sizes.value')
                ->from(ProductSize::ENTITY_NAME)
                ->join('sizes', 'sizes.id=' . ProductSize::ENTITY_NAME . '.id_size')
                ->where('products_sizes.id_product', '=', $id, 'id')
                ->getMany();
            $data_images_products = DB::select(ProductImage::FILLABLE)
                ->from(ProductImage::ENTITY_NAME)
                ->where('products_images.id_product', '=', $id, 'id')
                ->getMany();
            $data = [
                "colors" => $data_colors_products,
                "images" => $data_images_products,
                "sizes" => $data_sizes_products,
                "product" => $product
            ];
            // echo json_encode($data);
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
    public function index()
    {
        try {
            $data = DB::select(Product::FILLABLE . ',brands.name as brand_name,categories.name as category_name')
                ->from(Product::ENTITY_NAME)
                ->join('categories', 'categories.id=' . Product::ENTITY_NAME . '.id_category')
                ->join('brands', 'brands.id=products.id_brand')->getMany();
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

    public function edit()
    {
        try {

            Helper::toast('success', 'Cập nhật thành công')->to(Helper::pages('admin/color-size.php'));
        } catch (ValidateException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/color-size.php'));
        } catch (CustomException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('admin/color-size.php'));
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

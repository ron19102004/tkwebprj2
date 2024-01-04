<?php
if (isset($_SESSION['role']) && $_SESSION['role'] != Role::ADMIN) {
    Helper::redirect(Helper::pages('admin/home.php'));
}
Helper::addComponent('toast.component.php');
?>
<header class="w-full">
    <nav class="bg-white shadow-lg">
        <div class="md:flex items-center justify-between py-2 px-8 md:px-12">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-bold text-gray-800 md:text-3xl">
                    <a href="#">Brand Admin</a>
                </div>
                <div class="md:hidden">
                    <button id="menu-btn" type="button" class="block text-gray-800 hover:text-gray-700 focus:text-gray-700 focus:outline-none">
                        <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                            <path class="hidden" d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z" />
                            <path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
                        </svg>
                    </button>
                    <script>
                        $(() => {
                            $('#menu-btn').click(() => {
                                $('#list-menu').toggle('slow')
                            })
                        })
                    </script>
                </div>
            </div>
            <span class="hidden md:block" id="list-menu">
                <div class=" flex-col md:flex-row flex md:block -mx-2">
                    <a href="<?php echo Helper::pages('admin/home.php'); ?>" class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Trang chủ</a>

                    <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2 inline-flex flex items-center" type="button">Chỉnh sửa<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            <li>
                                <a href="<?php echo Helper::pages('admin/product.php'); ?>" class="block px-4 py-2 hover:bg-gray-100 text-gray-900">Sản phẩm</a>
                            </li>
                            <li>
                                <a href="<?php echo Helper::pages('admin/color-size.php'); ?>" class="block px-4 py-2 hover:bg-gray-100 text-gray-900">Màu sắc - Kích thước</a>
                            </li>

                            <li>
                                <a href="<?php echo Helper::pages('admin/brand-category.php'); ?>" class="block px-4 py-2 hover:bg-gray-100 text-gray-900">Thương hiệu - Loại</a>
                            </li>
                        </ul>
                    </div>

                    <a href="#" class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Mã giảm giá</a>
                    <a href="<?php echo Helper::routes('auth.route.php'); ?>/?method=logout" class="
                    text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Đăng xuất</a>
                </div>
            </span>
        </div>
    </nav>
</header>
<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == Role::ADMIN) {
    Helper::redirect(Helper::pages('admin/home.php'));
}
Helper::addComponent('toast.component.php');
$url = Helper::env('http') . $_SERVER['PHP_SELF'];
?>
<header class="w-full">
    <nav class="bg-white shadow-lg">
        <div class="md:flex items-center justify-between py-2 px-8 md:px-12">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-bold text-gray-800 md:text-3xl">
                    <a href="/"><?php echo Helper::env('app_name') ?> Brand</a>
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
            <span class="md:block hidden font-bold" id="list-menu">
                <div class=" flex-col md:flex-row flex -mx-2">
                    <a href="/" class="
                    <?php echo Helper::pages('home.php') === Helper::env('http') . $_SERVER['PHP_SELF'] ? 'bg-gray-900 text-gray-100' : '' ?>
                    text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span>
                            Trang chủ
                        </span>
                    </a>
                    <a href="<?php echo Helper::pages('product.php'); ?>" class="
                    <?php echo Helper::pages('product.php') === Helper::env('http') . $_SERVER['PHP_SELF'] ? 'bg-gray-900 text-gray-100' : '' ?>
                    text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
                        </svg>
                        <span> Sản phẩm</span>
                    </a>
                    <a href="<?php echo AuthGuard::run() ? Helper::pages('cart.php') : Helper::pages('auth/login.auth.php'); ?>" class="
                    <?php echo Helper::pages('cart.php') === Helper::env('http') . $_SERVER['PHP_SELF'] ? 'bg-gray-900 text-gray-100' : '' ?>
                    text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <span>Giỏ hàng</span>
                    </a>

                    <?php
                    if (AuthGuard::run()) {
                        $class = $url == Helper::pages('profile.php') ? 'bg-gray-900 text-gray-100' : '';
                        echo '<a href="' . Helper::pages('profile.php') . '" class="' . $class . '
                        text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        <span>Trang cá nhân</span>
                        </a>';
                        echo '<a href="' . Helper::routes('auth.route.php') . '/?method=logout" class="
                    text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Đăng xuất</a>';
                    } else {
                        echo '<a href="' . Helper::pages('auth/login.auth.php') . '" class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Đăng nhập</a>';
                    }
                    ?>
                </div>
            </span>
        </div>
    </nav>
</header>
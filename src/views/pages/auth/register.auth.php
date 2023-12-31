<!DOCTYPE html>
<html lang="en">

<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/src/views/layouts/head.layout.php");
    if (AuthGuard::run()) {
        Helper::redirect(Helper::pages('home.php'));
    } ?>

    <title>Đăng ký</title>
</head>

<body>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/src/views/pages/components/toast.component.php"); ?>
    <main>
        <section class="bg-white dark:bg-gray-900">
            <div class="flex justify-center min-h-screen">
                <div class="hidden bg-cover lg:block lg:w-2/5" style="background-image: url(<?php Helper::assets('bicycle-bg.jpg') ?>)">
                </div>

                <div class="flex items-center w-full max-w-3xl p-8 mx-auto lg:px-12 lg:w-3/5">
                    <div class="w-full">
                        <h1 class="text-2xl font-semibold tracking-wider text-gray-800 capitalize dark:text-white">
                            Nhận Ngay Tài Khoản Miễn Phí Của Bạn Ngay Bây Giờ.
                        </h1>

                        <p class="mt-4 text-gray-500 dark:text-gray-400">
                            Hãy để chúng tôi giúp bạn hoàn tất quá trình, để bạn có thể xác minh tài khoản cá nhân của mình và bắt đầu thiết lập hồ sơ của bạn.
                        </p>

                        <form action="<?php Helper::routes('auth.route.php'); ?>" method="post" class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2">
                            <input type="text" hidden name="method" value="register">
                            <div>
                                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Họ đệm</label>
                                <input type="text" placeholder="John" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" name="firstName" required />
                            </div>

                            <div>
                                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Tên</label>
                                <input type="text" placeholder="Snow" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" name="lastName" required />
                            </div>

                            <div>
                                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Số điện thoại</label>
                                <input type="tel" placeholder="XXX-XX-XXXX-XXX" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" name="phoneNumber" required />
                            </div>

                            <div>
                                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email</label>
                                <input type="email" placeholder="johnsnow@example.com" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" required name="email" />
                            </div>

                            <div>
                                <label class="mb-2 text-sm text-gray-600 dark:text-gray-200 flex items-center">
                                    <span class="hidden bg-green-500 rounded-full" id="check-pass">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </span>
                                    Mật khẩu
                                </label>
                                <input type="password" placeholder="Nhập mật khẩu của bạn" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" required name="password" id="password" />
                            </div>

                            <div>
                                <label class="flex items-center mb-2 text-sm text-gray-600 dark:text-gray-200">
                                    <span class="hidden bg-green-500 rounded-full" id="check-re-pass">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </span>
                                    Xác nhận mật khẩu
                                </label>
                                <input type="password" placeholder="Nhập lại mật khẩu của bạn" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" required name="re-password" id="re-password" />
                            </div>

                            <button disabled="true" class=" flex items-center justify-between w-full px-6 py-3 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50" id="btn-submit">
                                <span>Sign Up </span>

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 rtl:-scale-x-100" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
<script>
    $(() => {
        let password = $('#password').val();
        $('#password').change(() => {
            password = $('#password').val();
        })
        $('#re-password').change(() => {
            const re_password = $('#re-password').val();
            console.log(password, re_password);
            if (password.trim() === re_password.trim() && password.length >= 8) {
                $('#btn-submit').prop('disabled', false);
                $('#check-pass').removeClass('hidden');
                $('#check-re-pass').removeClass('hidden');

            } else {
                $('#btn-submit').prop('disabled', true);
                $('#check-pass').addClass('hidden');
                $('#check-re-pass').addClass('hidden');
            }
        })
    })
</script>

</html>
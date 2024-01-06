<!DOCTYPE html>
<html lang="en">

<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/src/views/layouts/head.layout.php"); ?>
    <title>HOME</title>
</head>

<body>
    <?php Helper::addLayout('header.layout.php'); ?>
    <input type="text" hidden value="<?php echo Helper::routes('product.route.php'); ?>" id="url-pd">
    <main>
        <section class="bg-white dark:bg-gray-900">
            <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                <div class="mr-auto place-self-center lg:col-span-7">
                    <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none md:text-5xl xl:text-6xl dark:text-white">Trải nghiệm tuyệt vời cùng với <?php echo Helper::env('app_name') ?> </h1>
                    <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                        Từ việc chọn lựa xe đạp đến giao dịch mượt mà, người yêu thể thao đạp xe trên khắp thế giới tin dùng <?php echo Helper::env('app_name') ?> để tối ưu hóa trải nghiệm mua sắm của họ.</p>
                    <a href="<?php echo Helper::pages('product.php') ?>" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        Bắt đầu
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
                <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                    <img src="<?php echo Helper::assets() ?>bg-home.png" alt="mockup">
                </div>
            </div>
        </section>
        <h1 class="text-center font-bold text-3xl text-gray-900">Khám phá thế giới</h1>
        <section class="p-4 flex md:flex-row flex-col justify-center items-center space-y-4 md:space-y-0 md:space-x-6 py-10" id="intro-product">
        </section>
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

    </main>
    <?php Helper::addLayout('footer.layout.php'); ?>
</body>
<script>
    function convertCurrencyFormat(inputString) {
        // Extract the numeric part from the input string
        const numericValue = parseFloat(inputString);

        // Check if the numeric value is a valid number
        if (!isNaN(numericValue)) {
            // Format the numeric value as currency with Vietnamese locale
            const formattedCurrency = numericValue.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });

            // Replace 'VND' with 'đ'
            const result = formattedCurrency.replace('VND', 'đ');

            return result;
        } else {
            // Handle invalid input
            console.error('Invalid input string');
            return inputString;
        }
    }
    const doLoad = () => {
        $(() => {
            $.get($('#url-pd').val(), {
                method: "getTakeSkip",
                take: 2,
                skip: 0
            }, (data) => {
                try {
                    const res = JSON.parse(data)
                    $('#intro-product').html(res?.data?.map((p) => {
                        const percent = (100 - ((parseInt(p?.discount) * 100) / parseInt(p?.price))).toFixed(2)
                        return `    
                        <div class="max-w-sm min-h-full bg-white border-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
                            <a class="overflow-hidden w-96 h-96 p-1" href="<?php echo Helper::pages('product.php') ?>?id=${p.id}">
                                <img class="rounded-t-lg w-96 h-96 object-cover hover:scale-110 transition-all " src="<?php echo Helper::assets() ?>${p.avatar}" alt=""
                                />
                            </a>
                            <div class="p-5 h-full">
                                <a href="<?php echo Helper::pages('product.php') ?>?id=${p.id}">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white line-clamp-2 text-ellipsis">${p.name}</h5>
                                </a>
                                <div class="flex items-center">
                                    <p class="mr-2 text-lg font-semibold text-blue-600 ">
                                    ${p?.discount === 0 ? convertCurrencyFormat(p?.price+"000VNĐ"):convertCurrencyFormat(p?.discount+"000VNĐ")}</p>
                                    <p class="text-base  font-medium text-red-500 line-through">
                                    ${p?.discount === 0 ? '':convertCurrencyFormat(p?.price+"000VNĐ")}
                                    </p>
                                    <p class="ml-auto text-base font-medium text-green-500">
                                        ${p?.discount > 0 ? `${percent ? '-'+percent+'%' : ''}`:''}
                                    </p>
                                 </div>
                            </div>
                        </div>
                        `;
                    }))
                } catch (error) {

                }
            })
        })
    }
    doLoad()
</script>

</html>
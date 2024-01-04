<?php
if (isset($_GET['id'])) {
    echo '<input type="text" hidden value="' . htmlspecialchars($_GET['id']) . '" id="id_product">';
}
?>
<input type="text" hidden id="url_product" value="<?php echo Helper::routes('product.route.php'); ?>">
<input type="text" hidden id="url_sys" value="<?php echo Helper::env('http'); ?>">

<section class="space-y-2">
    <div class="bg-indigo-700 text-indigo-200 md:text-center py-2 px-4" id="brand-intro">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div x-data="{ image: 1 }" x-cloak>
                    <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4" id="list-image">
                    </div>
                    <div class="flex -mx-2 mb-4" id="list-item-image">
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl" id="name-product"></h2>
                <p class="text-gray-500 text-sm">By <a href="#" id="brand-name" class="text-indigo-600 hover:underline"></a></p>

                <div class="flex items-center space-x-4 my-4">
                    <div>
                        <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                            <span class="font-bold text-indigo-600 text-3xl" id="price-product"></span>
                        </div>
                    </div>
                    <div class="flex-1" id="sale">
                        <p class="text-green-500 text-xl font-semibold">
                            <span class="font-bold text-indigo-600 text-3xl line-through" id="price-product-old"></span>
                        </p>
                        <p class="text-gray-400 text-sm" id="save-text"></p>
                    </div>
                </div>
                <div id="w-policy">
                    <h3 class="text-gray-800">Chính sách bảo hành</h3>
                    <div class="text-gray-500">
                        <p id="w-policy-text">
                        </p>
                    </div>
                </div>
                <div class="pt-4 space-y-2">
                    <ul class="items-center w-full text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-lg flex" id="colors-product">
                    </ul>
                    <ul class="items-center w-full text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-lg flex" id="sizes-product">
                    </ul>
                </div>
                <div class="flex py-4 space-x-4">
                    <div class="">
                        <div class="relative flex items-center max-w-[8rem]">
                            <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-14 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>
                            <input type="text" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-14 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5  " placeholder="1" required>
                            <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100  hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-14 focus:ring-gray-100  focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="button" class="h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
                        Thêm vào giỏ hàng
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="">
            <h1 class="font-bold text-xl">Mô tả chi tiết</h1>
            <div id="description"></div>
        </div>
    </div>
</section>
<script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>
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
    const url_product = document.getElementById('url_product').value
    const id_product = document.getElementById('id_product').value
    const url_sys = document.getElementById('url_sys').value
    var data$ = [];
    const renderDetails = () => {
        $(() => {
            $.get(url_product, {
                method: "details",
                id: id_product
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        const data = res.data;
                        data$ = data;
                        console.log(data);
                        $('#brand-intro').text(`Sản phẩm đến từ nhà ${data?.product?.brand_name}`)
                        $('#list-image').html(data?.images?.map((image, index) => {
                            return `
                            <div x-show="image === ${index+1}" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center relative">
                                 <div class="h-64 md:h-80  overflow-hidden object-cover ">
                                    <img
                                    class=" overflow-hidden object-cover w-full h-full"
                                    src="<?php echo Helper::assets(); ?>${image?.image}" alt="${image?.image}">
                                 </div>
                            </div>
                            `
                        }))
                        $('#list-item-image').html(data?.images?.map((image, index) => {
                            return `
                            <div class="flex-1 px-2">
                                    <button x-on:click="image = ${index+1}" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === ${index+1} }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                                        <div class="h-24 md:h-32 w-full border-2 rounded overflow-hidden object-cover ">
                                        <img
                                        class=" overflow-hidden object-cover min-w-full min-h-full"
                                        src="<?php echo Helper::assets(); ?>${image?.image}" alt="${image?.image}">
                                        </div>
                                    </button>
                             </div>
                            `
                        }))
                        $('#name-product').text(data?.product?.name)
                        $('#brand-name').text(data?.product?.brand_name)
                        $('#price-product').text(
                            parseInt(data?.product?.discount) > 0 ? convertCurrencyFormat(`${data?.product?.discount}000VNĐ`) : convertCurrencyFormat(`${data?.product?.price}000VNĐ`)
                        )
                        if (parseInt(data?.product?.discount) > 0) {
                            const percent = (parseInt(data?.product?.discount) * 100) / parseInt(data?.product?.price)
                            $('#price-product').removeClass('text-indigo-600')
                            $('#price-product').addClass('text-red-500')
                            $('#save-text').text(`Tiết kiệm ${(100-percent).toFixed(2)}%`)
                        }
                        $('#price-product-old').text(
                            parseInt(data?.product?.discount) > 0 ? convertCurrencyFormat(`${data?.product?.price}000VNĐ`) : ''
                        )
                        $('#w-policy-text').html(data?.product?.warranty_policy)
                        $('#description').html(data?.product?.description)
                        $('#colors-product').html(data?.colors?.map((color) => {
                            return `
                            <li class="w-full border-gray-200">
                                <div class="flex items-center ps-3">
                                    <input id="color-product" type="radio" value="${color?.id}" name="list-color-product" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2"
                                    style="background-color:${color?.value}"
                                    >
                                    <label for="color-product" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">${color?.name}</label>
                                </div>
                            </li>
                            `
                        }))
                        $('#sizes-product').html(data?.sizes?.map((size) => {
                            return `
                            <li class="w-full border-gray-200">
                                <div class="flex items-center ps-3">
                                    <input id="size-product" type="radio" value="${size?.id}" name="list-size-product" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2"
                                    >
                                    <label for="size-product" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">${size?.name}(${size?.value})</label>
                                </div>
                            </li>
                            `
                        }))
                    }
                } catch (error) {
                    window.location.href =url_sys+"/src/views/errors/not-found.php"
                }
            })
        })
    }
    renderDetails()
</script>
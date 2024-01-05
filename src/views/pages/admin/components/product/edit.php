<?php
if (isset($_GET['id'])) {
    echo '<input type="text" hidden value="' . htmlspecialchars($_GET['id']) . '" id="id_product">';
}
?>
<input type="text" hidden id="url_product" value="<?php echo Helper::routes('product.route.php'); ?>">
<input type="text" hidden id="url_product_image" value="<?php echo Helper::routes('product-image.route.php'); ?>">
<input type="text" hidden id="url_product_color" value="<?php echo Helper::routes('product-color.route.php'); ?>">
<input type="text" hidden id="url_product_size" value="<?php echo Helper::routes('product-size.route.php'); ?>">
<input type="text" hidden id="url_brand" value="<?php echo Helper::routes('brand.route.php'); ?>">
<input type="text" hidden id="url_color" value="<?php echo Helper::routes('color.route.php'); ?>">
<input type="text" hidden id="url_size" value="<?php echo Helper::routes('size.route.php'); ?>">
<section>
    <h1 class="font-bold text-xl">Kích thước của sản phẩm</h1>
    <div>
        <!-- Modal toggle -->

        <button data-modal-target="default-modal-size" data-modal-toggle="default-modal-size" type="button" class=" py-2.5 px-5 me-2 mb-2 text-sm font-medium focus:outline-none text-white rounded-lg border bg-gray-800   hover:bg-red-700  focus:z-10 focus:ring-4 focus:ring-gray-200 ">Thêm kích thuớc</button>

        <!-- Main modal -->
        <div id="default-modal-size" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                            Thêm màu sắc
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="default-modal-size">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <label for="sizes" class="block mb-2 text-sm font-medium text-gray-900 ">Chọn kích thước</label>
                            <select id="sizes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

                            </select>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                            <button id="addSize" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="min-w-full border-collapse block md:table max-h-screen overflow-auto">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th class="bg-gray-800  p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Mã kích thước</th>
                <th class="bg-gray-800  p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Tên kích thước</th>
                <th class="bg-gray-800  p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Giá trị</th>
                <th class="bg-gray-800  p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Chức năng</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group" id="data-size-product">
        </tbody>
    </table>
</section>
<section>
    <h1 class="font-bold text-xl">Màu sắc của sản phẩm</h1>
    <div>
        <!-- Modal toggle -->

        <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium tfocus:outline-none text-white rounded-lg border hover:bg-red-700 bg-gray-800   focus:z-10 focus:ring-4 focus:ring-gray-200">Thêm màu sắc</button>

        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                            Thêm màu sắc
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <label for="colors" class="block mb-2 text-sm font-medium text-gray-900 ">Chọn màu sắc</label>
                            <select id="colors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

                            </select>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                            <button id="addColor" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="min-w-full border-collapse block md:table max-h-screen overflow-auto">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th class="bg-gray-800  p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Mã màu</th>
                <th class="bg-gray-800  p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Tên màu</th>
                <th class="bg-gray-800  p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Giá trị</th>
                <th class="bg-gray-800  p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Chức năng</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group" id="data-color-product">
        </tbody>
    </table>
</section>
<section class="space-y-2">
    <h1 class="font-bold text-xl">Giả lập giao diện sản phẩm</h1>
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
                    <!-- xóa này ở user -->
                    <form action="<?php echo Helper::routes('product-image.route.php'); ?>" method="post" enctype="multipart/form-data" class="space-y-2">
                        <input type="text" hidden name="method" value="add">
                        <input type="text" hidden name="id_product" value="<?php echo htmlspecialchars($_GET['id']); ?>">
                        <input name="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="multiple_files" type="file" multiple>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Thêm ảnh</button>
                    </form>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl flex items-center">
                    <h2 class="pb-2" id="name-product"></h2>
                    <button id="save-name-product" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lưu tên sản phẩm</button>
                </h2>
                <p class="text-gray-500 text-sm flex items-center space-x-2">
                    <span>By </span>
                    <select id="change-brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </select>
                    <button id="change-brand-btn" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2 text-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lưu</button>
                </p>

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
                <!-- xóa ở u  -->
                <div class="pb-4">
                    <h1 id="change-price-discount" class="text-blue-500 hover:text-blue-600 cursor-pointer underline">Đổi giá</h1>
                    <div id="change-price-discount-form" class="hidden">
                    </div>
                    <button id="save-change-price-discount" type="button" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lưu thay đổi</button>
                </div>
                <h1 class="text-gray-800">Chính sách bảo hành</h1>
                <div id="w-policy">
                    <p id="w-policy-text">
                    </p>
                </div>
                <div class="pt-2">
                    <button id="save-w-policy" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lưu chính sách bảo hành</button>
                </div>
                <div class="pt-4 space-y-2">
                    <ul class="items-center w-full text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-lg flex" id="colors-product">
                    </ul>
                    <ul class="items-center w-full text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-lg flex" id="sizes-product">
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="pb-2">
            <button id="save-description" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Lưu mô tả</button>
        </div>
        <div class="max-h-96 overflow-auto">
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
    const url_product_image = document.getElementById('url_product_image').value
    const url_product_color = document.getElementById('url_product_color').value
    const url_product_size = document.getElementById('url_product_size').value
    const url_brand = document.getElementById('url_brand').value
    const url_color = document.getElementById('url_color').value
    const url_size = document.getElementById('url_size').value
    const id_product = document.getElementById('id_product').value
    var data$ = [];
    var description = "";
    var w_policy = ""
    const removeSizeProduct = (idSize) => {
        $(() => {
            $.get(url_product_size, {
                method: "delete",
                id_product: id_product,
                id_size: idSize
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        $.toast({
                            heading: 'Success',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'success'
                        })
                        location.reload()
                        return;
                    }
                    $.toast({
                        heading: 'Error',
                        text: res.message,
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                } catch (error) {
                    console.log(error);
                }
            })
        })
    }
    const removeColorProduct = (idColor) => {
        $(() => {
            $.get(url_product_color, {
                method: "delete",
                id_product: id_product,
                id_color: idColor
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        $.toast({
                            heading: 'Success',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'success'
                        })
                        location.reload()
                        return;
                    }
                    $.toast({
                        heading: 'Error',
                        text: res.message,
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                } catch (error) {
                    console.log(error);
                }
            })
        })
    }
    //xoa o user
    const deleteImageProduct = (idProductImage) => {
        $(() => {
            $.get(url_product_image, {
                method: "delete",
                id: idProductImage
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        $.toast({
                            heading: 'Success',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'success'
                        })
                        location.reload()
                        return;
                    }
                    $.toast({
                        heading: 'Error',
                        text: res.message,
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                } catch (error) {

                }
            })
        })
    }
    const setDefaultAvatar = (avatar) => {
        $(() => {
            $.post(url_product, {
                method: "changeAvatar",
                id: id_product,
                avatar: avatar
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        $.toast({
                            heading: 'Success',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'success'
                        })
                        return;
                    }
                    $.toast({
                        heading: 'Error',
                        text: res.message,
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                } catch (error) {

                }
            })
        })
    }
    const renderDetails = () => {
        $(() => {
            $.get(url_size, {
                method: "getAll"
            }, (data) => {
                try {
                    const colors = JSON.parse(data);
                    let html = `<option selected>Chọn kích thước</option>`;
                    html += colors.map((item) => {
                        return `<option value="${item?.id}">
                                    ${item?.name}-${item?.value}
                                </option>`
                    }).join('')
                    $('#sizes').html(html)
                } catch (error) {

                }
            })
            $.get(url_color, {
                method: "getAll"
            }, (data) => {
                try {
                    const colors = JSON.parse(data);
                    let html = `<option selected>Chọn màu sắc</option>`;
                    html += colors.map((item) => {
                        return `<option value="${item?.id}" style="background-color:${item?.value}">
                                    ${item?.name}
                                </option>`
                    }).join('')
                    $('#colors').html(html)
                } catch (error) {

                }
            })
            $.get(url_brand, {
                method: "getAll"
            }, (data) => {
                try {
                    const brands = JSON.parse(data);
                    let html = `<option selected>Chọn thương hiệu khác</option>`;
                    html += brands.map((item) => {
                        return `<option value="${item?.id}">${item?.name}</option>`
                    }).join('')
                    $('#change-brand').html(html)
                } catch (error) {

                }
            })
            $.get(url_product, {
                method: "details",
                id: id_product
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        const data = res.data;
                        data$ = data;
                        $('#data-size-product').html(data?.sizes?.map((size) => {
                            return `
                            <tr class="bg-gray-100 border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Mã màu</span>${size?.id}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Tên màu</span>${size?.name}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Giá trị</span>
                                    <div
                                    class="text-center"
                                    >${size?.value}</div>
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Chức năng</span>
                                    <button onclick="removeSizeProduct(${size?.id_size});" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Xóa</button>
                                </td>
                            </tr>
                            `;
                        }).join(''));
                        $('#data-color-product').html(data?.colors?.map((color) => {
                            return `
                            <tr class="bg-gray-100 border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Mã màu</span>${color?.id}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Tên màu</span>${color?.name}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Giá trị</span>
                                    <div
                                    class="text-center"
                                    style="background-color:${color?.value}"
                                    >${color?.value}</div>
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Chức năng</span>
                                    <button onclick="removeColorProduct(${color?.id_color});" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Xóa</button>
                                </td>
                            </tr>
                            `;
                        }).join(''));
                        $('#brand-intro').text(`Sản phẩm đến từ nhà ${data?.product?.brand_name}`)
                        $('#list-image').html(data?.images?.map((image, index) => {
                            return `
                            <div x-show="image === ${index+1}" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center relative">
                                 <div class="h-64 md:h-80  overflow-hidden object-cover ">
                                    <img
                                    class=" overflow-hidden object-cover w-full h-full"
                                    src="<?php echo Helper::assets(); ?>${image?.image}" alt="${image?.image}">
                                 </div>
                                 <div class="absolute top-1 right-0 ">
                                    <button onclick="setDefaultAvatar('${image?.image}');" type="button" class="text-white bg-blue-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">Đặt mặc định</button>
                                    <button onclick="deleteImageProduct(${image?.id});" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Xóa</button>
                                 </div>
                            </div>
                            `
                        }).join(''))
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
                        }).join(''))
                        $('#name-product').html(`
                             <input id="name-product-input" type="text" value="${data?.product?.name}"
                             class="rounded border-2 w-full"
                             >
                        `)
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
                        //xoa o user
                        $('#change-price-discount-form').html(`
                            <div class=" flex flex-col space-y-4 pb-4">
                                <label class="font-semibold">Giá hiện tại (Đơn vị VNĐ)</label>
                                <input type="number" value="${data?.product?.price}" id="change-price" class="rounded border font-bold">
                                <label class="font-semibold">Giá giảm (Đơn vị VNĐ)</label>
                                <input type="number" value="${data?.product?.discount}" id="change-discount" class="rounded border font-bold">
                            </div>
                        `)
                        //xoa o u
                        ClassicEditor
                            .create(document.querySelector('#w-policy'))
                            .catch(error => {
                                console.error(error);
                            }).then(editor => {
                                // Thiết lập dữ liệu ban đầu
                                editor.setData(data?.product?.warranty_policy);
                                editor.model.document.on('change:data', () => {
                                    w_policy = editor.getData()
                                });
                            });
                        ClassicEditor
                            .create(document.querySelector('#description'))
                            .catch(error => {
                                console.error(error);
                            }).then(editor => {
                                // Thiết lập dữ liệu ban đầu
                                editor.setData(data?.product?.description);
                                editor.model.document.on('change:data', () => {
                                    description = editor.getData()
                                });
                            });
                        $('#colors-product').html(data?.colors?.map((color) => {
                            return `
                            <li class="w-full border-gray-200">
                                <div class="flex items-center ps-3">
                                    <input id="colors-product" type="radio" value="${color?.id}" name="list-radio-clor" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2"
                                    style="background-color:${color?.value}"
                                    >
                                    <label for="colors-product" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">${color?.name}</label>
                                </div>
                            </li>
                            `
                        }).join(''))
                        $('#sizes-product').html(data?.sizes?.map((size) => {
                            return `
                            <li class="w-full border-gray-200">
                                <div class="flex items-center ps-3">
                                    <input id="sizes-product" type="radio" value="${size?.id}" name="list-radio-size" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500  focus:ring-2"
                                    >
                                    <label for="sizes-product" class="w-full py-3 ms-2 text-sm font-medium text-gray-900">${size?.name}(${size?.value})</label>
                                </div>
                            </li>
                            `
                        }).join(''))
                    }
                } catch (error) {

                }
            })
            $('#addSize').click(() => {
                $.post(url_product_size, {
                    method: "add",
                    id_size: $('#sizes').val(),
                    id_product: id_product
                }, (data) => {
                    try {
                        const res = JSON.parse(data);
                        if (res.status === 'success') {
                            $.toast({
                                heading: 'Success',
                                text: res.message,
                                showHideTransition: 'fade',
                                icon: 'success'
                            })
                            location.reload()
                            return;
                        }
                        $.toast({
                            heading: 'Error',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'error'
                        })
                    } catch (error) {

                    }
                })
            })
            $('#addColor').click(() => {
                $.post(url_product_color, {
                    method: "add",
                    id_color: $('#colors').val(),
                    id_product: id_product
                }, (data) => {
                    try {
                        const res = JSON.parse(data);
                        if (res.status === 'success') {
                            $.toast({
                                heading: 'Success',
                                text: res.message,
                                showHideTransition: 'fade',
                                icon: 'success'
                            })
                            location.reload()
                            return;
                        }
                        $.toast({
                            heading: 'Error',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'error'
                        })
                    } catch (error) {

                    }
                })
            })
            $('#change-brand-btn').click(() => {
                $.post(url_product, {
                    method: "changeBrand",
                    id_brand: $('#change-brand').val(),
                    id: id_product
                }, (data) => {
                    try {
                        const res = JSON.parse(data);
                        if (res.status === 'success') {
                            location.reload()
                            $.toast({
                                heading: 'Success',
                                text: res.message,
                                showHideTransition: 'fade',
                                icon: 'success'
                            })
                            return;
                        }
                        $.toast({
                            heading: 'Error',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'error'
                        })
                    } catch (error) {

                    }
                })
            })
            $('#save-name-product').click(() => {
                $.post(url_product, {
                    method: "changeName",
                    name: $('#name-product-input').val(),
                    id: id_product
                }, (data) => {
                    try {
                        const res = JSON.parse(data);
                        if (res.status === 'success') {
                            $.toast({
                                heading: 'Success',
                                text: res.message,
                                showHideTransition: 'fade',
                                icon: 'success'
                            })
                            return;
                        }
                        $.toast({
                            heading: 'Error',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'error'
                        })
                    } catch (error) {

                    }
                })
            })
            $('#save-description').click(() => {
                console.log(description);
                $.post(url_product, {
                    method: "changeDescription",
                    description: description,
                    id: id_product
                }, (data) => {
                    try {
                        const res = JSON.parse(data);
                        if (res.status === 'success') {
                            $.toast({
                                heading: 'Success',
                                text: res.message,
                                showHideTransition: 'fade',
                                icon: 'success'
                            })
                            return;
                        }
                        $.toast({
                            heading: 'Error',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'error'
                        })
                    } catch (error) {

                    }
                })
            })
            $('#save-w-policy').click(() => {
                $.post(url_product, {
                    method: "changeWPolicy",
                    w_policy: w_policy,
                    id: id_product
                }, (data) => {
                    try {
                        const res = JSON.parse(data);
                        if (res.status === 'success') {
                            $.toast({
                                heading: 'Success',
                                text: res.message,
                                showHideTransition: 'fade',
                                icon: 'success'
                            })
                            return;
                        }
                        $.toast({
                            heading: 'Error',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'error'
                        })
                    } catch (error) {

                    }
                })
            })
            //xoa o u 
            $('#change-price-discount').click(() => {
                $('#change-price-discount-form').toggle('slow')
                $('#save-change-price-discount').toggle('slow')
            })
            //xoa o u
            $('#save-change-price-discount').click(() => {
                const price = $('#change-price').val();
                const discount = $('#change-discount').val();
                if (parseInt(price) < parseInt(discount)) {
                    $.toast({
                        heading: 'Error',
                        text: 'Giá sản phẩm không thể nhỏ hơn giá giảm',
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                    return;
                }
                $.post(url_product, {
                    method: "changePriceAndDiscount",
                    price: price,
                    discount: discount,
                    id: id_product
                }, (data) => {
                    try {
                        const res = JSON.parse(data);
                        if (res.status === 'success') {
                            if (parseInt(discount) > 0) {
                                $('#price-product').text(convertCurrencyFormat(`${discount}000VNĐ`))
                                $('#price-product-old').text(convertCurrencyFormat(`${price}000VNĐ`))
                            } else {
                                $('#price-product').text(convertCurrencyFormat(`${price}000VNĐ`))
                                $('#price-product-old').text('')
                            }
                            $.toast({
                                heading: 'Success',
                                text: res.message,
                                showHideTransition: 'fade',
                                icon: 'success'
                            })
                            return;
                        }
                        $.toast({
                            heading: 'Error',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'error'
                        })
                    } catch (error) {

                    }
                })
            })
        })
    }
    renderDetails()
</script>
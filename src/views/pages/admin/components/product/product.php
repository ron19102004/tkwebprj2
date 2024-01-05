<input type="text" hidden id="url_brand" value="<?php echo Helper::routes('brand.route.php'); ?>">
<input type="text" hidden id="url_category" value="<?php echo Helper::routes('category.route.php'); ?>">

<section>
    <h1 class="font-bold text-xl">Sản phẩm</h1>
    <div>
        <!-- Modal toggle -->

        <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Khởi tạo sản phẩm</button>

        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Khởi tạo sản phẩm
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form action="<?php echo Helper::routes('product.route.php'); ?>" method="post" enctype="multipart/form-data">
                        <input type="text" name="method" hidden value="add">
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <div>
                                <label class="text-white font-bold text-lg">Tên sản phẩm</label>
                                <input type="text" name="name" id="name" required class="w-full rounded h-10" placeholder="Xe">
                            </div>
                            <div>
                                <label class="text-white font-bold text-lg">Giá</label>
                                <input type="number" name="price" id="price" required class="w-full rounded h-10" placeholder="2000">
                            </div>
                            <div>
                                <label class="text-white font-bold text-lg">Thương hiệu</label>
                                <select id="brands" name="id_brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                                </select>
                            </div>
                            <div>
                                <label class="text-white font-bold text-lg">Thể loại</label>
                                <select id="categories" name="id_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                                </select>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="text" hidden id="url_request" value="<?php echo Helper::routes('product.route.php'); ?>">
    <table class="min-w-full border-collapse block md:table max-h-screen overflow-auto">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Mã sản phẩm</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Tên sản phẩm</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Giá sản phẩm</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Số lượng có sẵn</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Giảm giá</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Mô tả</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Chính sách bảo hành</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Chức năng</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group " id="data">

        </tbody>
    </table>
</section>
<script>
    const url_request = document.getElementById('url_request').value;
    const url_brand = document.getElementById('url_brand').value;
    const url_category = document.getElementById('url_category').value;
    const remove = (id) => {
        $(() => {
            $.get(`${url_request}/?method=delete&id=${id}`, (data) => {
                try {
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        $.toast({
                            heading: 'Success',
                            text: res.message,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                        render();
                        return;
                    }
                    $.toast({
                        heading: 'Error',
                        text: res.message,
                        showHideTransition: 'fade',
                        icon: 'error'
                    })
                } catch (error) {}
            })

        })
    }
    const render = () => {
        $(() => {
            $.get(url_brand, {
                method: "getAll"
            }, (data) => {
                try {
                    const brands = JSON.parse(data);
                    let html = `<option selected>Chọn thương hiệu</option>`;
                    html += brands.map((item) => {
                        return `<option value="${item?.id}">${item?.name}</option>`
                    }).join('')
                    $('#brands').html(html)
                } catch (error) {

                }
            })
            $.get(url_category, {
                method: "getAll"
            }, (data) => {
                try {
                    const categories = JSON.parse(data);
                    let html = `<option selected>Chọn thể loại</option>`;
                    html += categories.map((item) => {
                        return `<option value="${item?.id}">${item?.name}</option>`
                    }).join('')
                    $('#categories').html(html)
                } catch (error) {

                }
            })
            $.get(`${url_request}/?method=getAll`, (data) => {
                try {
                    const res = JSON.parse(data);
                    const products = res?.data;
                    $('#data').html(products.map((p) => {
                        return `
                            <tr class="bg-gray-100 border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Mã sản phẩm</span>${p?.id}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Tên sản phẩm</span>${p?.name}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Giá sản phẩm</span>${p?.price}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Số lượng sẵn</span>${p?.available}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Giảm giá</span>
                                    ${p?.discount}
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Mô tả</span>
                                    <div class="max-h-60 overflow-auto">
                                        ${p?.description}
                                    </div>
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Chính sách bảo hành</span>
                                    <div class="max-h-60 overflow-auto">
                                            ${p?.warranty_policy}
                                     </div>   
                                </td>
                                <td class="md:border md:border-grey-500 text-left block md:table-cell md:flex md:flex-col md:justify-center md:items-center md:space-y-3">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Chức năng</span>
                                    <a href="?id=${p?.id}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 border border-blue-500 rounded">Chi tiết</a>
                                    <button onclick="remove(${p?.id});" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Xóa</button>
                                </td>
                            </tr>
                            `
                    }).join(' '));
                } catch (error) {

                }
            })
        })
    }
    render();
</script>
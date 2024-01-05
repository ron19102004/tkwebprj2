<section>
    <h1 class="font-bold text-xl">Thể loại/danh mục</h1>
    <div>
        <!-- Modal toggle -->

        <button data-modal-target="default-modal-c" data-modal-toggle="default-modal-c" type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Thêm danh mục</button>

        <!-- Main modal -->
        <div id="default-modal-c" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Thêm danh mục
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal-c">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form action="<?php echo Helper::routes('category.route.php'); ?>" method="post" enctype="multipart/form-data">
                        <input type="text" name="method" hidden value="add">
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <div>
                                <label class="text-white font-bold text-lg">Tên danh mục</label>
                                <input type="text" name="name" id="name" required class="w-full rounded h-10" placeholder="Xe đạp đua">
                            </div>
                            <div>
                                <label class="text-white font-bold text-lg">Ảnh đại diện</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="file">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPG, JPEG,PNG,GIF.</p>
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
    <input type="text" hidden id="url_request-c" value="<?php echo Helper::routes('category.route.php'); ?>">
    <table class="min-w-full border-collapse block md:table max-h-screen overflow-auto">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Mã danh mục</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Tên danh mục</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Ảnh đại diện / LOGO</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Chức năng</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group " id="data-c">
        </tbody>
    </table>
</section>
<script>
    const url_request_c = document.getElementById('url_request-c').value;
    const removeC = (id) => {
        $(() => {
            $.get(`${url_request_c}/?method=delete&id=${id}`, (data) => {
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
                    }
                } catch (error) {}
            })

        })
    }
    const renderC = () => {
        $(() => {
            $.get(`${url_request_c}/?method=getAll`, (data) => {
                try {
                    const cates = JSON.parse(data);
                    $('#data-c').html(cates.map((c) => {
                        return `
                            <tr class="bg-gray-100 border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Mã danh mục</span>${c?.id}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Tên danh mục</span>${c?.name}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">AVT/LOGO</span>
                                    <div class="max-w-full max-h-48 overflow-auto">
                                        <img src="<?php echo Helper::assets();?>${c?.image}" alt="${c?.name}"
                                        class="w-full h-full object-cover overflow-auto"
                                        >
                                    </div>
                                </td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell md:flex md:flex-col md:justify-center md:items-center md:space-y-3">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Chức năng</span>
                                    <a href="?edit=category&id=${c?.id}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Sửa</a>
                                    <button onclick="removeC(${c?.id});" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Xóa</button>
                                </td>
                            </tr>
                            `;
                    }).join(''));
                } catch (error) {

                }
            })
        })
    }
    renderC();
</script>

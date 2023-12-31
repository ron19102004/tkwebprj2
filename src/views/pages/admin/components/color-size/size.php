<section>
    <h1 class="font-bold text-xl">Màu Sắc</h1>
    <div>
        <!-- Modal toggle -->

        <button data-modal-target="default-modal-size" data-modal-toggle="default-modal-size" type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Thêm kích thước</button>

        <!-- Main modal -->
        <div id="default-modal-size" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Thêm kích thước
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <div>
                                <label class="text-white font-bold text-lg">Tên kích thước</label>
                                <input type="text" name="name" id="name-size" required class="w-full rounded h-10" placeholder="Vừa">
                            </div>
                            <div>
                                <label class="text-white font-bold text-lg">Giá trị</label>
                                <input type="text" name="value" id="value-size" required class="w-full rounded h-10" placeholder="M">
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button onclick="addSize()" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="text" hidden id="url_request_size" value="<?php echo Helper::routes('size.route.php'); ?>">
    <table class="min-w-full border-collapse block md:table max-h-screen overflow-auto">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Mã kích thước</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Tên kích thước</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Giá trị</th>
                <th class="bg-gray-800 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Chức năng</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group" id="data-size">
        </tbody>
    </table>
</section>
<script>
    const url_request_size = document.getElementById('url_request_size').value;
    const addSize = () => {
        $(() => {
            const name = $('#name-size').val();
            const value = $('#value-size').val();
            if (name.length === 0 || value.length === 0) {
                $.toast({
                    heading: 'Warning',
                    text: 'Tên và giá trị không được trống',
                    showHideTransition: 'plain',
                    icon: 'warning'
                })
                return
            }
            $.post(`${url_request_size}`, {
                method: "add",
                value: value,
                name: name,
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        $.toast({
                            heading: 'Success',
                            text: res.message,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                        removeSize();
                    }
                } catch (error) {}
            })
        })
    }
    const removeSize = (id) => {
        $(() => {
            $.get(`${url_request_size}/?method=delete&id=${id}`, (data) => {
                try {
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        $.toast({
                            heading: 'Success',
                            text: res.message,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                        renderSize();
                    }
                } catch (error) {}
            })

        })
    }
    const renderSize = () => {
        $(() => {
            $.get(`${url_request_size}/?method=getAll`, (data) => {
                try {
                    const sizes = JSON.parse(data);
                    $('#data-size').html(sizes.map((size) => {
                        return `
                            <tr class="bg-gray-100 border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Mã kích thước</span>${size?.id}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Tên kích thước</span>${size?.name}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Giá trị</span>${size?.value}</td>
                                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Chức năng</span>
                                    <a href="?edit=size&id=${size?.id}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Sửa</a>
                                    <button onclick="removeSize(${size?.id});" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Xóa</button>
                                </td>
                        </tr>
                            `;
                    }).join(''));
                } catch (error) {

                }
            })
        })
    }
    renderSize();
</script>
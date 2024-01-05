<?php
if (isset($_GET['progress'])) {
    echo '<input type="text" hidden value="' . htmlspecialchars($_GET['progress']) . '" id="id_order">';
}
?>
<input type="text" hidden value="<?php echo Helper::routes('order.route.php'); ?>" id="url_order">
<input type="text" hidden value="<?php echo Helper::routes('progress.route.php'); ?>" id="url_progress">

<section class="px-10 py-10 space-y-6">
    <div id="order"></div>
    <div>
        <h1 class="mb-4 text-center font-bold text-2xl text-gray-700">Tiến Độ Vận Chuyển</h1>
        <div class="flex flex-col justify-center items-center">
            <!-- Modal toggle -->
            <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Thêm tiến độ</button>
            <!-- Main modal -->
            <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Thêm tiến độ
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
                                    <label class="text-white font-bold text-lg">Nội dung</label>
                                    <textarea type="text" name="value" id="value" required class="w-full rounded h-10" placeholder="Nội dung tiến độ"></textarea>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button onclick="addProgress(null)" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Thêm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-4">
            <button type="button" onclick="addProgress('Đơn hàng đã được khởi tạo thành công')" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Khởi tạo</button>
            <button type="button" onclick="addProgress('Đơn hàng đã được shipper lấy hàng')" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Giao shipper</button>
            <button type="button" onclick="addProgress('Đơn hàng đã được vận chuyển')" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Đã vận chuyển</button>
            <button type="button" onclick="addProgress('Đơn hàng đang trong quá trình vận chuyển')" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Đang vận chuyển</button>
            <button type="button" onclick="addProgress('Xin lỗi, tạm hết hàng.Đơn hàng sẽ đến với bạn sớm nhất')" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Tạm hết hàng</button>
            <button type="button" onclick="addProgress('Đơn hàng đang được giao bởi shipper')" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Đang giao</button>
            <button type="button" onclick="addProgress('Đơn hàng đã ở trong kho khu vực bạn')" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900">Đến kho bạn</button>
            <button type="button" onclick="finish()" class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Kết thúc</button>

        </div>
        <div class="grid xl:grid-cols-6 gap-4" id="progress">

        </div>
    </div>
</section>
<script>
    const id_order = document.getElementById('id_order').value;
    const url_progress = document.getElementById('url_progress').value;
    const url_order = document.getElementById('url_order').value;
    const finish = () => {
        $(() => {
            $.get(url_order, {
                method: "finish",
                id_order: id_order
            }, (data) => {
                try {
                    console.log(data);
                    const res = JSON.parse(data);
                    if (res.status === 'success') {
                        $.toast({
                            heading: 'Success',
                            text: res.message,
                            showHideTransition: 'fade',
                            icon: 'success'
                        })
                        addProgress('Đơn hàng đã đến tay người dùng')
                    } else $.toast({
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
    const addProgress = (content) => {
        if (!$('#value').val() && content === null) {
            $.toast({
                heading: 'Error',
                text: 'Nội dung không được trống',
                showHideTransition: 'fade',
                icon: 'error'
            })
            return;
        }
        $(() => {
            $.post(url_progress, {
                method: "add",
                content: content === null ? $('#value').val() : content,
                id_order: id_order
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
                        doLoad();
                        $('#value').val('')
                    } else $.toast({
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
    const doLoad = () => {
        $(() => {
            $.get(url_order, {
                method: "findByIdOrderForAdmin",
                id_order: id_order
            }, (data) => {
                try {
                    const order = JSON.parse(data);
                    $('#order').html(`
                    <div class="md:flex items-strech py-4 md:py-7 lg:py-5 border-t border-gray-50 bg-gray-50 px-4 shadow-lg hover:shadow-xl">
                        <div class="md:w-4/12 2xl:w-2/4 w-full">
                            <img src="<?php echo Helper::assets() ?>${order.avatar}" alt="Gray Sneakers" class="h-full object-center object-cover md:block hidden rounded-md" />
                            <img src="<?php echo Helper::assets() ?>${order.avatar}" alt="Gray Sneakers" class="md:hidden w-full h-full object-center object-cover rounded-md" />
                        </div>
                        <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                            <p class="font-bold text-2xl">${order.product_name}</p>
                            <div class="text-lg">
                                 <h1>Số lượng: ${order.quantity}</h1>
                                <h1>Thương hiệu: ${order.brand_name}</h1>
                                <h1>Màu sắc: ${order.id_color}</h1>
                                <h1>Kích thước: ${order.id_size}</h1>
                            </div>
                            <div class="text-lg">
                                <h1>Địa chỉ nhận: ${order.address}</h1>
                                <h1>Số điện thoại nhận: ${order.phoneNumber}</h1>
                            </div>
                        </div>
                    </div>
                    `)
                } catch (error) {}
            })
            $.get(url_progress, {
                method: "getAllByIdOrderForAdmin",
                id_order: id_order,
            }, (data) => {
                try {
                    const res = JSON.parse(data);
                    $('#progress').html(res?.map((p, i) => {
                        return `
                        <div class="h-full text-center px-6 flex justify-center items-center ">
                            <div class="shadow-md hover:shadow-lg rounded-lg flex items-center justify-center border border-gray-200 p-3">
                                <div class=" flex flex-col items-center justify-center px-1 rounded-r-lg body-step">
                                    <h2 class="font-bold text-sm">${p.content}</h2>
                                    <p class="text-xs text-gray-600">
                                        ${p.time}
                                    </p>
                                </div>
                            </div>
                        </div>
                        ${i === res.length - 1 ? '': 
                        `<div class="rotate-90 md:rotate-0 flex-1 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M14 2h-7.229l7.014 7h-13.785v6h13.785l-7.014 7h7.229l10-10z" />
                            </svg>
                        </div>`}
                    `
                    }).join(' '))
                } catch (error) {

                }
            })
        })
    }
    doLoad();
</script>
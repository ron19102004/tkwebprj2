<?php
$userCurrent = json_decode($_SESSION['userCurrent'], true);
?>
<input type="text" hidden value="<?php echo Helper::routes('order.route.php'); ?>" id="url_order">
<input type="text" hidden value="<?php echo $userCurrent['id'] ?>" id="id_user">
<ul id="list-order" class="space-y-4">
</ul>
<script>
    const id_user = document.getElementById('id_user').value;
    const url_order = document.getElementById('url_order').value;
    $(() => {
        $.get(url_order, {
            method: "findByIdUser",
            id_user: id_user
        }, (data) => {
            try {
                const orders = JSON.parse(data);
                console.log(orders);
                $('#list-order').html(orders?.map((order) => {
                    return `
                    <div class="md:flex items-strech py-4 md:py-7 lg:py-5 border-t border-gray-50 bg-gray-50 px-4 shadow-lg hover:shadow-xl">
                        <div class="md:w-4/12 2xl:w-2/4 w-full">
                            <img src="<?php echo Helper::assets() ?>${order.avatar}" alt="Gray Sneakers" class="h-full object-center object-cover md:block hidden rounded-md" />
                            <img src="<?php echo Helper::assets() ?>${order.avatar}" alt="Gray Sneakers" class="md:hidden w-full h-full object-center object-cover rounded-md" />
                        </div>
                        <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                            <p class="font-bold">${order.product_name}</p>
                            <div class="">
                                 <h1>Số lượng: ${order.quantity}</h1>
                                <h1>Thương hiệu: ${order.brand_name}</h1>
                                <h1>Màu sắc: ${order.id_color}</h1>
                                <h1>Kích thước: ${order.id_size}</h1>
                            </div>
                            <div class="">
                                <h1>Địa chỉ nhận: ${order.address}</h1>
                                <h1>Số điện thoại nhận: ${order.phoneNumber}</h1>
                                <a href="?details_order=${order.id}" class="text-blue-600 hover:text-blue-700 underline cursor-pointer">Chi tiết vận chuyển</a>
                            </div>
                        </div>
                    </div>
                    `
                }).join(' '))
            } catch (error) {}
        })
    })
</script>